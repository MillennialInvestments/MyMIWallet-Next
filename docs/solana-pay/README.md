# Solana Pay checkout

Buyers pay for MyMI products in USDC on Solana from their own wallet. One signed transaction carries both the price (USDC to MyMI) and the SOL payment-processing fee (`payment_processing` in `docs/solana-fees`). MyMI never holds keys or anyone else's funds: it sells its own products and is the merchant.

| Purpose | Delivers | Feature switch |
| --- | --- | --- |
| `mymigold` | MyMI Gold (same math as the PayPal path) | `mymigold_purchases` |
| `membership` | Membership plan via `MembershipFulfillmentService` | `membership_purchases` |
| `auction_topup` | Auction balance in MyMI Gold cents | `auctions` |
| `fund_units` | Project fund units via `issueUnitsAtNav` | `project_investing` |

## Flow

1. `POST Pay/Solana/Checkout` (signed in). The server sets the price from its own config, creates a random 32-byte reference and returns a `solana:` transaction-request link and its QR code.
2. The wallet calls `GET/POST API/SolanaPay/Tx/{reference}` (no session; the reference is unguessable). The server returns an unsigned transaction for the wallet's account with these instructions:
   - a compute-unit limit;
   - a priority fee at the 75th percentile of recent fees, clamped;
   - USDC `transferChecked` for exactly the price, carrying the reference;
   - the SOL fee to the treasury;
   - a memo.
3. The buyer signs and sends in their wallet.
4. The page polls `GET Pay/Solana/Status/{reference}`, and cron runs `php spark solanapay:reconcile` every minute so a paid order is delivered even if the buyer closed the page (a reload also resumes the open checkout). The server finds the transaction by its reference and checks it on-chain:
   - it succeeded;
   - it pays the exact amount, in the right token, to MyMI's USDC account;
   - a signer authorised it.

   It then moves the checkout from pending to confirmed in one conditional update, claims the fee once (`bf_solana_fee_receipts`) from the same verified transaction, records a verified `bf_payment_claims` row (`provider=solana`), delivers the order once, and writes `payment_confirmed` to the investigation record.

If the price arrived without the fee, the checkout goes to `review` and nothing is delivered. If delivery fails after a valid payment, it goes to `unfulfilled` for support.

RPC calls try each endpoint in turn: `SOLANA_PAY_RPC` (comma-separated), otherwise the fee RPC followed by `SOLANA_RPC_FALLBACKS`.

## Settings (`.env`)

```
SOLANA_PAY_ENABLED=true
SOLANA_PAY_RECIPIENT=<wallet>            # defaults to SOLANA_FEE_TREASURY
SOLANA_PAY_USDC_ACCOUNT=<token account>  # optional; looked up from the recipient wallet
SOLANA_PAY_RPC=<url>,<url>               # optional
SOLANA_PAY_USDC_MINT=<mint>              # optional; devnet/mainnet USDC by cluster
```

The recipient wallet must already hold a USDC token account; checkout refuses with `recipient_usdc_account_missing` until it does. Use devnet on staging (`SOLANA_FEE_RPC=https://api.devnet.solana.com` sets the cluster).

## Database

Named migration: `2026-11-23-000400_CreateSolanaPayRequests` (`bf_solana_pay_requests`; unique reference and signature). It also needs `bf_payment_claims` from `2026-11-15-000300_CreateFormFeatureTables`.

## Cron

Run the sweep every minute as the web user, from the release's `current` directory:

```
* * * * * cd /apps/TBI/www/mymiwallet/current && php spark solanapay:reconcile >/dev/null 2>&1
```

It does nothing while Solana Pay is off or the table is missing, and each checkout is delivered at most once.
