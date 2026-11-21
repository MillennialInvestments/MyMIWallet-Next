// Cross-language check for MST1, driven by tests/unit/SecureTransfer/SecureTransferInteropTest.php.
//   node mst1-interop.cjs seal <recipientWallet> <recipientKeyB64> <now>  -> JSON {manifest, signature, ciphertext, sender}
//   node mst1-interop.cjs open <inputJsonFile>                         -> JSON {plain, meta, signature_ok}
const path = require('path');
const fs = require('fs');
// The repo's package.json says "type": "module", so load these browser files as CommonJS by hand.
function load(rel, deps) {
  const mod = { exports: {} };
  const src = fs.readFileSync(path.join(__dirname, '../..', rel), 'utf8');
  new Function('module', 'exports', 'require', src)(mod, mod.exports, (name) => deps[name] || require(name));
  return mod.exports;
}
const nacl = load('public/assets/vendor/tweetnacl/nacl-fast.min.js', {});
const MST1 = load('public/assets/js/secure-transfer/mst1.js', { tweetnacl: nacl });

const ALPHABET = '123456789ABCDEFGHJKLMNPQRSTUVWXYZabcdefghijkmnopqrstuvwxyz';
function base58(bytes) {
  const digits = [];
  for (const byte of bytes) {
    let carry = byte;
    for (let j = 0; j < digits.length; j++) { carry += digits[j] << 8; digits[j] = carry % 58; carry = (carry / 58) | 0; }
    while (carry > 0) { digits.push(carry % 58); carry = (carry / 58) | 0; }
  }
  let out = '';
  for (let k = 0; k < bytes.length && bytes[k] === 0; k++) out += '1';
  for (let q = digits.length - 1; q >= 0; q--) out += ALPHABET[digits[q]];
  return out;
}

(async () => {
  const mode = process.argv[2];
  if (mode === 'seal') {
    const [, , , wallet, key, now] = process.argv;
    const sender = nacl.sign.keyPair();
    const senderWallet = base58(sender.publicKey);
    const device = nacl.box.keyPair();
    const plain = new Uint8Array(70000).map((_, i) => (i * 7) & 255);
    const { ciphertext, manifest } = await MST1.seal(plain, 'from-node.bin', 'application/octet-stream', senderWallet,
      MST1.b64(device.publicKey), [{ wallet, transfer_key: key }], Number(now) + 3600, Number(now));
    const msg = await MST1.manifestMessage(manifest);
    const signature = MST1.b64(nacl.sign.detached(new TextEncoder().encode(msg), sender.secretKey));
    process.stdout.write(JSON.stringify({ manifest, signature, ciphertext: MST1.b64(ciphertext), sender: senderWallet,
      sender_device: MST1.b64(device.publicKey) }));
  } else if (mode === 'open') {
    const input = JSON.parse(fs.readFileSync(process.argv[3], 'utf8'));
    const pair = { publicKey: MST1.unb64(input.device_public), secretKey: MST1.unb64(input.device_secret) };
    const res = await MST1.open(MST1.unb64(input.ciphertext), input.manifest, input.wallet, pair);
    const ok = MST1.verifyWalletSignature(input.manifest.sender_wallet, await MST1.manifestMessage(input.manifest), input.signature);
    process.stdout.write(JSON.stringify({ plain: MST1.b64(res.plain), meta: res.meta, signature_ok: ok,
      canonical: MST1.canonicalJson(input.manifest) }));
  }
})().catch((e) => { process.stdout.write(JSON.stringify({ error: String(e.message || e) })); process.exit(1); });
