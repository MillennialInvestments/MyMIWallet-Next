# MyMI test wallets (staging, test networks only)

A buyer wallet and a test treasury on Solana devnet, Sepolia, Base Sepolia, XRPL Testnet and Bitcoin Testnet4, for testing crypto checkout wallet to wallet without a browser wallet.

- Keys stay in one file on gq-ai01, mode 0600: `/apps/TBI/secrets/mymiwallet-staging/testnet-wallets/wallets.json` (override with `TESTNET_WALLETS_FILE`). Only addresses are ever printed.
- Every command checks that it is talking to a test network (Solana genesis hash, EVM chain id, XRPL network id, a testnet Esplora URL) and stops if not.
- Staging receives payments into the test treasury, and `sweep` sends them back to the buyer, so each wallet is funded once and reused.

## Setup (once, as your own user on gq-ai01)

```bash
sudo install -d -m 700 -o "$USER" /apps/TBI/secrets/mymiwallet-staging/testnet-wallets
mkdir -p ~/mymi-testnet-wallets
cp /apps/TBI/www/mymiwallet-staging/current/tools/testnet-wallets/{package.json,package-lock.json,wallets.mjs} ~/mymi-testnet-wallets/
cd ~/mymi-testnet-wallets && npm ci --ignore-scripts --no-audit --no-fund
node wallets.mjs create
node wallets.mjs fund
```

`create` prints the staging `.env` lines that point the test checkout at the test treasury. `fund` funds both XRPL wallets automatically and lists the faucets for the rest; those faucets need a browser.

## One test

```bash
cd /apps/TBI/www/mymiwallet-staging/current
sudo -u www-data php spark cryptopay:test-checkout --user=1 --chain=xrpl --usd=1 > ~/checkout.json
cd ~/mymi-testnet-wallets && node wallets.mjs pay ~/checkout.json
cd /apps/TBI/www/mymiwallet-staging/current && sudo -u www-data php spark cryptopay:reconcile
```

`--chain` is `solana`, `ethereum`, `base`, `xrpl` or `bitcoin`. Solana checkouts are confirmed by `solanapay:reconcile`. Use `node wallets.mjs balances` to see every balance, and `node wallets.mjs sweep` to send the treasury's test coins back to the buyer.
