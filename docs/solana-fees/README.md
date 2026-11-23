# MyMI SOL service fees

Two separate charges, each priced on its own:

| Kind | Charged when | Price setting |
| --- | --- | --- |
| `transfer_processing` | each Secure Transfer send | `SOLANA_FEE_TRANSFER_LAMPORTS` |
| `payment_processing` | a payment flow that calls `SolanaFeeService::claim('payment_processing', ...)` | `SOLANA_FEE_PAYMENT_LAMPORTS` |

1 SOL = 1,000,000,000 lamports. A price of 0, or no treasury wallet, turns that fee off.

## How a fee is paid

1. The page shows the fee and the treasury wallet.
2. The user sends that amount from their own linked wallet to the treasury, in any Solana wallet app.
3. They paste the transaction signature. The server checks it with the Solana RPC (`getTransaction`, `confirmed`): the transaction succeeded, it is at most `SOLANA_FEE_MAX_AGE_SECONDS` old (default 3600), it was signed by the user's wallet, and it moved at least the fee to the treasury.
4. The receipt is stored in `bf_solana_fee_receipts`. One signature pays one charge. If the service then fails for another reason, the same user can retry with the same signature.

The fee and its signature are also written into the Secure Transfer investigation record with the transfer.

MyMI receives fees for its own services into its own wallet. It does not hold, convert or forward anyone else's money in this flow. Any future feature that moves money between users is a different legal question: get counsel's review (FinCEN money-transmitter rules and state licensing) before building it.

## Settings (`.env`)

| Setting | Meaning |
| --- | --- |
| `SOLANA_FEE_TREASURY` | Treasury wallet address (public key only, never a private key) |
| `SOLANA_FEE_TRANSFER_LAMPORTS` | Transfer processing fee |
| `SOLANA_FEE_PAYMENT_LAMPORTS` | Payment processing fee |
| `SOLANA_FEE_RPC` | RPC for checks. Defaults to `SOLANA_RPC_PRIMARY`. On staging use `https://api.devnet.solana.com` so tests use free devnet SOL |
| `SOLANA_FEE_CLUSTER` | `devnet` or `mainnet-beta` (worked out from the RPC when unset) |

## Activation

1. Run only `MIGRATE=2026-11-23-000200_CreateSolanaFeeReceipts`. While a transfer fee is priced and this table is missing, Secure Transfer stays off (404) instead of sending for free.
2. On staging, set the treasury, a price and the devnet RPC. Get free devnet SOL with `solana airdrop 1 <address> --url devnet`, or turn on devnet in Solflare (Settings, Network), then send a file and pay the fee.
3. Production needs a separate approval, the real treasury address and the mainnet RPC.

## Rollback

Set the fee lamports to 0 (charging stops at once). The receipts table stays; `down()` keeps it.
