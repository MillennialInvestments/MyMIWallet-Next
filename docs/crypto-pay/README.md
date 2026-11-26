# MyMI crypto checkout: Ethereum, Base, XRP Ledger, Bitcoin

Buy MyMI products (Gold, membership, auction balance, fund units) from your own wallet on:

| Chain | Asset | How a payment is matched | Test network |
| --- | --- | --- | --- |
| Ethereum | USDC | Exact amount: price + fee in USDC, plus a tag under one cent | Sepolia |
| Base | USDC | Same as Ethereum | Base Sepolia |
| XRP Ledger | XRP | Destination tag per checkout; the delivered amount must cover the quote | XRPL Testnet |
| Bitcoin | BTC | Exact amount: sats rounded to 100, plus a 1-99 sat tag | Testnet4 |

Solana keeps its own checkout (`docs/solana-pay/`). Both share the products, the fulfillers, `bf_payment_claims` and the audit chain. The same page, `/Pay/Solana` or `/Pay/Crypto`, offers every chain that is turned on.

## Fees

The MyMI processing fee is part of the same payment (owner decision 2026-11-25). The page shows the price, the fee and the total; the buyer sends the total in one transfer. The product is delivered for the price only; the fee is recorded on the payment claim (`detail.fee_cents`).

## Prices for XRP and BTC

The USD price comes from public exchange tickers (Coinbase, then Kraken, then Bitstamp). When two answer, they must agree within 3%, and the lower one is used, so the buyer never sends less than the price. If no source answers, checkout says the price is unavailable. A quote holds for the checkout's 15 minutes.

## Settings (`.env`)

Crypto checkout is off unless all of these hold: `CRYPTO_PAY_ENABLED=true`, `CRYPTO_PAY_NETWORK` set to exactly `mainnet` or `testnet` (there is no default, so production never accepts test coins by accident), and a receiving address for the chain.

| Setting | Meaning |
| --- | --- |
| `CRYPTO_PAY_ENABLED` | `true` turns it on |
| `CRYPTO_PAY_NETWORK` | `mainnet` or `testnet` |
| `CRYPTO_PAY_EVM_RECIPIENT` | Receiving address for both Ethereum and Base (0x...) |
| `CRYPTO_PAY_ETHEREUM_RECIPIENT`, `CRYPTO_PAY_BASE_RECIPIENT` | Per-chain override of the EVM address |
| `CRYPTO_PAY_XRPL_RECIPIENT` | Receiving XRP address (r...) |
| `CRYPTO_PAY_BITCOIN_RECIPIENT` | Receiving BTC address (bc1... on mainnet, tb1... on testnet) |
| `CRYPTO_PAY_FEE_CENTS` | MyMI processing fee in US cents on every chain (default 0) |
| `CRYPTO_PAY_<CHAIN>_FEE_CENTS` | Per-chain fee override |
| `CRYPTO_PAY_<CHAIN>_RPC` | Comma-separated endpoints, tried in order. Put a dedicated keyed endpoint first (e.g. Alchemy, Infura, QuickNode); public endpoints stay as fallbacks. Adapters automatically fail over to the next endpoint if the first fails or responds with an invalid chain id |
| `CRYPTO_PAY_ALERT_WEBHOOK` | Webhook URL (Discord/AIOps) for operational alerts: reconcile failures, late payments, underpayments, and endpoint network refusals |
| `COMPLIANCE_SANCTIONS_ENABLED` | Set `true` to refuse checkouts/claims from addresses listed in `writable/compliance/sanctions-addresses.txt` |
| `CRYPTO_PAY_<CHAIN>_CONFIRMATIONS` | Confirmations before delivery (defaults: mainnet ETH 3, Base 5, BTC 2; testnet 1) |
| `CRYPTO_PAY_TTL_SECONDS` | How long a checkout stays open (900) |

`<CHAIN>` is `ETHEREUM`, `BASE`, `XRPL` or `BITCOIN`. Receiving addresses are public addresses only, never keys.

## Database and cron

Run only `MIGRATE=2026-11-25-000100_CreateCryptoPayRequests`. Then add the sweep, which confirms payments even when the buyer closed the page:

```
* * * * * cd /apps/TBI/www/mymiwallet/current && php spark cryptopay:reconcile >/dev/null 2>&1
```

`cryptopay:reconcile` prints `SEMANTIC_RESULT=PASS CHAINS=... CHECKED=n` and a count per status.

## Safety rules the code enforces

- One payment settles one checkout (unique `payment_id`: chain, transaction and output/log index).
- Two open checkouts never share an amount or destination tag (unique `match_key`, cleared when the checkout closes).
- An endpoint is used only after it proves it is on the configured network (EVM `eth_chainId`, XRPL `server_info` network id, Bitcoin genesis block), so a test-network RPC in `.env` can never settle a mainnet order.
- A payment older than the checkout never counts (read from the checkout's starting block, ledger or Bitcoin block height).
- A payment the chain dates more than 10 minutes (XRP) or 2 hours (Bitcoin) after the checkout expired is not delivered at the old rate; it goes to support (`late_payment`) to finish or refund.
- The scan position is saved only after every payment found was handled; a database error is retried, never taken as "already paid".
- EVM: the newest 20 blocks are always read again, and one sweep takes the head and the logs from the same endpoint, so a lagging public node cannot hide a payment.
- XRPL: a flood of tiny payments cannot stall the scan; each sweep moves past the ledgers it read in full. Confirmations are always 1 (a validated ledger is final).
- XRP counts the delivered amount, never the requested one, so a partial payment cannot pass as full; tokens are ignored.
- EVM: only the real USDC contract's Transfer logs to MyMI's address, not removed by a reorg.
- Delivery waits for the configured confirmations; the page shows "Payment seen; waiting for confirmations".
- A checkout is only expired after a complete read of the chain; an RPC outage never expires a paid checkout.
- Delivery runs once; an interrupted delivery goes to support (`interrupted_check_delivery`), never twice.
- At most 5 unpaid checkouts per user.

## DigiByte

DigiByte is off: `/Exchange/DigiByte/*` returns 404 and wallet lookups skip it until `FEATURE_DIGIBYTE=true`. Its library does not load yet (it declares an interface it does not implement), so turning the flag on needs that fixed first.

## Rollback

Set `CRYPTO_PAY_ENABLED=false`: the page stops offering the chains at once, and the sweep stops. The table stays; `down()` keeps it.
