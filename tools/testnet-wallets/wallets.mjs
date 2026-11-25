#!/usr/bin/env node
// MyMI staging test wallets for crypto checkout. TEST NETWORKS ONLY.
//
// Creates a buyer and a test treasury on Solana devnet, Sepolia, Base Sepolia,
// XRPL Testnet and Bitcoin Testnet4, keeps their keys in one file readable only
// by you (mode 0600), and prints only addresses. It can pay a staging checkout
// from the buyer and send the treasury's coins back to the buyer, so each
// wallet is funded once and reused. Every network call checks the chain is a
// test network first and stops if it is not.
//
//   node wallets.mjs create      make any wallets that are missing (never replaces one)
//   node wallets.mjs addresses   addresses + the staging .env lines for the test treasuries
//   node wallets.mjs balances    test-coin balances of every wallet
//   node wallets.mjs fund        free XRPL testnet XRP now; faucet links for the rest
//   node wallets.mjs pay <checkout.json>   pay a checkout printed by `php spark cryptopay:test-checkout`
//   node wallets.mjs sweep       send the treasuries' test coins back to the buyer

import fs from 'node:fs';
import path from 'node:path';
import crypto from 'node:crypto';
import { Keypair, Connection, PublicKey, Transaction, SystemProgram, LAMPORTS_PER_SOL } from '@solana/web3.js';
import { getAssociatedTokenAddress, createTransferCheckedInstruction, getAccount } from '@solana/spl-token';
import { ethers } from 'ethers';
import * as xrpl from 'xrpl';
import * as bitcoin from 'bitcoinjs-lib';
import { ECPairFactory } from 'ecpair';
import * as ecc from 'tiny-secp256k1';

const FILE = process.env.TESTNET_WALLETS_FILE || '/apps/TBI/secrets/mymiwallet-staging/testnet-wallets/wallets.json';

const NET = {
  solana: { rpc: process.env.TESTNET_SOLANA_RPC || 'https://api.devnet.solana.com', genesis: 'EtWTRABZaYq6iMfeYKouRu166VU2xqa1wcaWoxPkrZBG',
    usdc: '4zMMC9srt5Ri5X14GAgXhaHii3GnPAEERYPJgZJDncDU' },
  ethereum: { rpc: process.env.TESTNET_ETHEREUM_RPC || 'https://ethereum-sepolia-rpc.publicnode.com', chainId: 11155111n,
    usdc: '0x1c7D4B196Cb0C7B01d743Fbc6116a902379C7238' },
  base: { rpc: process.env.TESTNET_BASE_RPC || 'https://sepolia.base.org', chainId: 84532n,
    usdc: '0x036CbD53842c5426634e7929541eC2318f3dCF7e' },
  xrpl: { ws: process.env.TESTNET_XRPL_WS || 'wss://s.altnet.rippletest.net:51233', networkId: 1,
    faucet: 'https://faucet.altnet.rippletest.net/accounts' },
  bitcoin: { esplora: process.env.TESTNET_BITCOIN_ESPLORA || 'https://mempool.space/testnet4/api', network: bitcoin.networks.testnet },
};
const ERC20 = ['function transfer(address to, uint256 amount) returns (bool)', 'function balanceOf(address) view returns (uint256)'];
const ECPair = ECPairFactory(ecc);

function stop(msg) {
  console.error('STOP ' + msg);
  process.exit(2);
}

// ---------- key file ----------
function load() {
  if (!fs.existsSync(FILE)) return {};
  const st = fs.statSync(FILE);
  if ((st.mode & 0o077) !== 0) stop(`${FILE} is readable by others; run: chmod 600 ${FILE}`);
  return JSON.parse(fs.readFileSync(FILE, 'utf8'));
}
function save(data) {
  fs.mkdirSync(path.dirname(FILE), { recursive: true, mode: 0o700 });
  const tmp = FILE + '.tmp-' + process.pid;
  fs.writeFileSync(tmp, JSON.stringify(data, null, 2) + '\n', { mode: 0o600 });
  fs.renameSync(tmp, FILE);
}

// ---------- key makers (keys stay in the file; only addresses are printed) ----------
const makers = {
  solana: () => { const k = Keypair.generate(); return { address: k.publicKey.toBase58(), secret: Buffer.from(k.secretKey).toString('base64') }; },
  evm: () => { const w = ethers.Wallet.createRandom(); return { address: w.address, secret: w.privateKey }; },
  xrpl: () => { const w = xrpl.Wallet.generate(); return { address: w.classicAddress, secret: w.seed }; },
  bitcoin: () => {
    const k = ECPair.makeRandom({ network: NET.bitcoin.network, rng: (n) => crypto.randomBytes(n) });
    const { address } = bitcoin.payments.p2wpkh({ pubkey: Buffer.from(k.publicKey), network: NET.bitcoin.network });
    return { address, secret: k.toWIF() };
  },
};
const ROLES = ['buyer', 'treasury'];
const KINDS = ['solana', 'evm', 'xrpl', 'bitcoin'];

function create() {
  const data = load();
  let made = 0;
  for (const role of ROLES) {
    data[role] ??= {};
    for (const kind of KINDS) {
      if (!data[role][kind]) { data[role][kind] = makers[kind](); made++; }
    }
  }
  data.created_at ??= new Date().toISOString();
  data.note = 'TEST NETWORKS ONLY. Never send real coins to these addresses.';
  save(data);
  console.log(`CREATED=${made} FILE=${FILE}`);
  addresses();
}

function addresses() {
  const d = load();
  if (!d.buyer) stop('no wallets yet; run: node wallets.mjs create');
  console.log('\nBUYER (pays checkouts)');
  for (const k of KINDS) console.log(`  ${k.padEnd(8)} ${d.buyer[k].address}`);
  console.log('\nTEST TREASURY (receives payments on staging)');
  for (const k of KINDS) console.log(`  ${k.padEnd(8)} ${d.treasury[k].address}`);
  console.log('\nStaging .env lines for the test treasury:');
  console.log(`CRYPTO_PAY_EVM_RECIPIENT=${d.treasury.evm.address}`);
  console.log(`CRYPTO_PAY_XRPL_RECIPIENT=${d.treasury.xrpl.address}`);
  console.log(`CRYPTO_PAY_BITCOIN_RECIPIENT=${d.treasury.bitcoin.address}`);
  console.log(`SOLANA_FEE_TREASURY=${d.treasury.solana.address}`);
}

// ---------- test-network guards ----------
async function solanaConn() {
  const c = new Connection(NET.solana.rpc, 'confirmed');
  if ((await c.getGenesisHash()) !== NET.solana.genesis) stop('Solana RPC is not devnet');
  return c;
}
async function evmProvider(chain) {
  const p = new ethers.JsonRpcProvider(NET[chain].rpc);
  const { chainId } = await p.getNetwork();
  if (chainId !== NET[chain].chainId) stop(`${chain} RPC is chain ${chainId}, not the test network ${NET[chain].chainId}`);
  return p;
}
async function xrplClient() {
  const c = new xrpl.Client(NET.xrpl.ws);
  await c.connect();
  const info = await c.request({ command: 'server_info' });
  if (info.result.info.network_id !== NET.xrpl.networkId) { await c.disconnect(); stop('XRPL server is not Testnet (network_id 1)'); }
  return c;
}
async function esplora(p, init) {
  if (!/testnet|signet|regtest/.test(NET.bitcoin.esplora)) stop('Bitcoin API is not a test network');
  const r = await fetch(NET.bitcoin.esplora + p, init);
  if (!r.ok) throw new Error(`esplora ${p}: HTTP ${r.status} ${await r.text()}`);
  return r.headers.get('content-type')?.includes('json') ? r.json() : r.text();
}

// ---------- balances ----------
async function balances() {
  const d = load();
  const out = [];
  const tryRow = async (label, fn) => { try { out.push(`${label.padEnd(26)} ${await fn()}`); } catch (e) { out.push(`${label.padEnd(26)} unavailable (${e.message.slice(0, 60)})`); } };
  const sol = await solanaConn().catch(() => null);
  for (const role of ROLES) {
    const w = d[role];
    if (sol) {
      await tryRow(`${role} solana SOL`, async () => (await sol.getBalance(new PublicKey(w.solana.address))) / LAMPORTS_PER_SOL);
      await tryRow(`${role} solana USDC`, async () => {
        const ata = await getAssociatedTokenAddress(new PublicKey(NET.solana.usdc), new PublicKey(w.solana.address));
        return Number((await getAccount(sol, ata)).amount) / 1e6;
      });
    }
    for (const chain of ['ethereum', 'base']) {
      const p = await evmProvider(chain).catch(() => null);
      if (!p) { out.push(`${role} ${chain}`.padEnd(27) + 'unavailable'); continue; }
      await tryRow(`${role} ${chain} ETH`, async () => ethers.formatEther(await p.getBalance(w.evm.address)));
      await tryRow(`${role} ${chain} USDC`, async () => ethers.formatUnits(await new ethers.Contract(NET[chain].usdc, ERC20, p).balanceOf(w.evm.address), 6));
    }
    await tryRow(`${role} xrpl XRP`, async () => { const c = await xrplClient(); try { return await c.getXrpBalance(w.xrpl.address); } finally { await c.disconnect(); } });
    await tryRow(`${role} bitcoin BTC`, async () => {
      const a = await esplora(`/address/${w.bitcoin.address}`);
      return ((a.chain_stats.funded_txo_sum - a.chain_stats.spent_txo_sum + a.mempool_stats.funded_txo_sum - a.mempool_stats.spent_txo_sum) / 1e8).toFixed(8);
    });
  }
  console.log(out.join('\n'));
}

// ---------- funding ----------
async function fund() {
  const d = load();
  for (const role of ROLES) {
    try {
      const r = await fetch(NET.xrpl.faucet, { method: 'POST', headers: { 'Content-Type': 'application/json' }, body: JSON.stringify({ destination: d[role].xrpl.address }) });
      console.log(`XRPL ${role}: ${r.ok ? 'funded with testnet XRP' : 'faucet answered HTTP ' + r.status}`);
    } catch (e) {
      console.log(`XRPL ${role}: faucet unreachable (${e.message})`);
    }
  }
  console.log(`\nThe other faucets need a browser (captcha or sign-in). Fund the BUYER once:`);
  console.log(`  Solana devnet SOL   https://faucet.solana.com            ${d.buyer.solana.address}`);
  console.log(`  Solana devnet USDC  https://faucet.circle.com (Solana Devnet)  ${d.buyer.solana.address}`);
  console.log(`  Sepolia ETH (gas)   https://cloud.google.com/application/web3/faucet/ethereum/sepolia  ${d.buyer.evm.address}`);
  console.log(`  Base Sepolia ETH    https://www.alchemy.com/faucets/base-sepolia  ${d.buyer.evm.address}`);
  console.log(`  USDC on Sepolia and Base Sepolia  https://faucet.circle.com  ${d.buyer.evm.address}`);
  console.log(`  Bitcoin Testnet4    https://mempool.space/testnet4/faucet  ${d.buyer.bitcoin.address}`);
  console.log(`\nThe treasury only needs a little gas to send coins back (sweep): Solana and both EVM chains.`);
}

// ---------- paying a checkout ----------
async function pay(file) {
  if (!file) stop('usage: node wallets.mjs pay <checkout.json>');
  // The spark output has a banner line first; the checkout is the JSON line.
  const line = fs.readFileSync(file, 'utf8').split('\n').find((l) => l.trim().startsWith('{'));
  if (!line) stop(`no checkout JSON in ${file}`);
  const c = JSON.parse(line);
  const d = load();
  if (c.chain === 'solana' ? c.cluster !== 'devnet' : c.network !== 'testnet') stop('this checkout is not on a test network');
  let id;
  if (c.chain === 'solana') id = await paySolana(c, d.buyer.solana);
  else if (c.chain === 'ethereum' || c.chain === 'base') id = await payEvm(c, d.buyer.evm);
  else if (c.chain === 'xrpl') id = await payXrpl(c, d.buyer.xrpl);
  else if (c.chain === 'bitcoin') id = await payBitcoin(c.recipient, BigInt(c.amount_raw), d.buyer.bitcoin);
  else stop('unknown chain ' + c.chain);
  console.log(`PAID chain=${c.chain} reference=${c.reference} tx=${id}`);
}

async function paySolana(c, w) {
  const conn = await solanaConn();
  const kp = Keypair.fromSecretKey(Buffer.from(w.secret, 'base64'));
  const url = decodeURIComponent(c.url.replace(/^solana:/, ''));
  if (!/^https:\/\//.test(url)) stop('Solana Pay link is not an https transaction request');
  const r = await fetch(url, { method: 'POST', headers: { 'Content-Type': 'application/json' }, body: JSON.stringify({ account: kp.publicKey.toBase58() }) });
  const body = await r.json();
  if (!body.transaction) stop('checkout refused the transaction request: ' + JSON.stringify(body));
  const tx = Transaction.from(Buffer.from(body.transaction, 'base64'));
  tx.partialSign(kp);
  const sig = await conn.sendRawTransaction(tx.serialize());
  await conn.confirmTransaction(sig, 'confirmed');
  return sig;
}

async function payEvm(c, w) {
  const p = await evmProvider(c.chain);
  if (c.contract.toLowerCase() !== NET[c.chain].usdc.toLowerCase()) stop('checkout asks for a token that is not test USDC');
  const wallet = new ethers.Wallet(w.secret, p);
  const tx = await new ethers.Contract(NET[c.chain].usdc, ERC20, wallet).transfer(c.recipient, BigInt(c.amount_raw));
  await tx.wait(1);
  return tx.hash;
}

async function payXrpl(c, w) {
  const client = await xrplClient();
  try {
    const wallet = xrpl.Wallet.fromSeed(w.secret);
    const res = await client.submitAndWait({ TransactionType: 'Payment', Account: wallet.classicAddress, Destination: c.recipient,
      DestinationTag: Number(c.dest_tag), Amount: String(c.amount_raw) }, { wallet, autofill: true });
    if (res.result.meta.TransactionResult !== 'tesSUCCESS') stop('XRPL payment failed: ' + res.result.meta.TransactionResult);
    return res.result.hash;
  } finally {
    await client.disconnect();
  }
}

async function payBitcoin(to, sats, w, sweepAll = false) {
  const key = ECPair.fromWIF(w.secret, NET.bitcoin.network);
  const from = bitcoin.payments.p2wpkh({ pubkey: Buffer.from(key.publicKey), network: NET.bitcoin.network });
  const utxos = (await esplora(`/address/${from.address}/utxo`)).filter((u) => u.status.confirmed);
  const rate = 2n; // sat/vB, plenty on Testnet4
  const total = utxos.reduce((s, u) => s + BigInt(u.value), 0n);
  const vbytes = BigInt(11 + 68 * utxos.length + 31 * 2);
  const fee = rate * vbytes;
  const send = sweepAll ? total - fee : sats;
  const change = total - send - fee;
  if (send <= 546n || change < 0n) stop(`not enough confirmed test BTC (have ${total} sats)`);
  const psbt = new bitcoin.Psbt({ network: NET.bitcoin.network });
  for (const u of utxos) psbt.addInput({ hash: u.txid, index: u.vout, witnessUtxo: { script: from.output, value: u.value } });
  psbt.addOutput({ address: to, value: Number(send) });
  if (change > 546n) psbt.addOutput({ address: from.address, value: Number(change) });
  psbt.signAllInputs({ publicKey: Buffer.from(key.publicKey), sign: (h) => Buffer.from(key.sign(h)) });
  psbt.finalizeAllInputs();
  return esplora('/tx', { method: 'POST', body: psbt.extractTransaction().toHex() });
}

// ---------- send the treasury's test coins back to the buyer ----------
async function sweep() {
  const d = load();
  const t = d.treasury;
  const b = d.buyer;
  const step = async (label, fn) => { try { console.log(`${label}: ${await fn()}`); } catch (e) { console.log(`${label}: skipped (${e.message.slice(0, 80)})`); } };
  await step('solana USDC', async () => {
    const conn = await solanaConn();
    const kp = Keypair.fromSecretKey(Buffer.from(t.solana.secret, 'base64'));
    const mint = new PublicKey(NET.solana.usdc);
    const src = await getAssociatedTokenAddress(mint, kp.publicKey);
    const amount = (await getAccount(conn, src)).amount;
    if (amount === 0n) return 'nothing to send';
    const dst = await getAssociatedTokenAddress(mint, new PublicKey(b.solana.address));
    const tx = new Transaction().add(createTransferCheckedInstruction(src, mint, dst, kp.publicKey, amount, 6));
    return conn.sendTransaction(tx, [kp]);
  });
  await step('solana SOL', async () => {
    const conn = await solanaConn();
    const kp = Keypair.fromSecretKey(Buffer.from(t.solana.secret, 'base64'));
    const keep = 0.01 * LAMPORTS_PER_SOL; // gas for the next sweep
    const lamports = (await conn.getBalance(kp.publicKey)) - keep;
    if (lamports <= 0) return 'nothing to send';
    return conn.sendTransaction(new Transaction().add(SystemProgram.transfer({ fromPubkey: kp.publicKey, toPubkey: new PublicKey(b.solana.address), lamports })), [kp]);
  });
  for (const chain of ['ethereum', 'base']) {
    await step(`${chain} USDC`, async () => {
      const wallet = new ethers.Wallet(t.evm.secret, await evmProvider(chain));
      const usdc = new ethers.Contract(NET[chain].usdc, ERC20, wallet);
      const bal = await usdc.balanceOf(wallet.address);
      if (bal === 0n) return 'nothing to send';
      return (await usdc.transfer(b.evm.address, bal)).hash;
    });
  }
  await step('xrpl XRP', async () => {
    const client = await xrplClient();
    try {
      const wallet = xrpl.Wallet.fromSeed(t.xrpl.secret);
      const drops = BigInt(xrpl.xrpToDrops(await client.getXrpBalance(wallet.classicAddress))) - 12_000_000n; // keep the 10 XRP reserve + fees
      if (drops <= 0n) return 'nothing to send';
      const res = await client.submitAndWait({ TransactionType: 'Payment', Account: wallet.classicAddress, Destination: b.xrpl.address, Amount: String(drops) }, { wallet, autofill: true });
      return res.result.hash;
    } finally {
      await client.disconnect();
    }
  });
  await step('bitcoin BTC', async () => payBitcoin(b.bitcoin.address, 0n, t.bitcoin, true));
}

const [cmd, arg] = process.argv.slice(2);
const commands = { create, addresses, balances, fund, pay: () => pay(arg), sweep };
if (!commands[cmd]) {
  console.log('usage: node wallets.mjs create|addresses|balances|fund|pay <checkout.json>|sweep');
  process.exit(cmd ? 2 : 0);
}
await commands[cmd]();
