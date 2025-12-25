# Wallet Transfers

## What this means
How send/receive requests work and what happens when something goes wrong.

## What we provide
- Tools to initiate sends from your connected wallet or MyMI-managed Solana address (where you hold the keys).
- Transfer status updates and error messages when we detect network or compliance issues.
- Security prompts (MFA/device checks) before high-risk actions where supported.

## What you agree
- You own the addresses you submit or have permission to use them.
- Once a transfer is broadcast, it is generally irreversible; MyMI cannot claw back on-chain transactions.
- We may hold, pause, or cancel transfers for fraud, sanctions, or technical risk.

## Your responsibilities
- Double-check destination addresses, token mint, and network before sending; mistyped addresses can result in permanent loss.
- Maintain wallet security (MFA, device hygiene, anti-phishing).
- Monitor confirmations and resubmit only after checking for pending or failed status.

## Key limits & disclosures
- Network fees apply and may fluctuate; insufficient fees can delay or fail a transaction.
- Compliance reviews or funding-source checks may delay outgoing transfers.
- Received funds are not settled until the relevant network finalizes the transaction.

<!-- INTERNAL:implementation-notes
- Transfer endpoints: app/Modules/APIs/Controllers/SolanaController.php (transfer); app/Modules/Exchange/Controllers/SolanaController.php (wallet actions)
- Wallet libraries: app/Libraries/MyMISolana.php (send/receive helpers)
- Security checks: app/Services/AuthAuditService.php; app/Libraries/Abuse/RateLimiter.php
-->
