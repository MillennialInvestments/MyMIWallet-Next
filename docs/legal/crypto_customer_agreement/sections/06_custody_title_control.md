# Custody, Title & Control

## What this means
Who holds keys, who controls assets, and how MyMI handles balances.

## What we provide
- Connectivity to self-custody wallets; you sign transactions with your own keys.
- Optional creation of default Solana wallets for convenience, still under your control.
- On-platform ledgers for MyMI Gold/Coin balances used inside MyMI modules.

## What you agree
- You keep and secure your private keys; MyMI does not take possession of your on-chain assets.
- MyMI Gold/Coin balances are platform credits, not deposits or custodial accounts.
- You authorize MyMI to debit/credit MyMI Gold/Coin ledgers when you use in-app features that rely on those credits.

## Your responsibilities
- Store seed phrases and private keys securely; MyMI cannot recover them.
- Verify addresses and token mints before approving any transaction.
- Monitor your balances and reconcile on-chain holdings with any in-app displays.

## Key limits & disclosures
- MyMI is not a qualified custodian and does not provide FDIC or SIPC insurance.
- If you lose your keys, we cannot restore access to on-chain assets.
- Displayed balances may lag during network issues; on-chain state is authoritative.

<!-- INTERNAL:implementation-notes
- Wallet creation & reads: app/Libraries/MyMISolana.php; app/Modules/Exchange/Controllers/SolanaController.php
- Wallet connectors: app/Libraries/MyMIPhantom.php; MyMISolflare.php; MyMIMetaMask.php; MyMITrustWallet.php
- Gold/Coin ledger: app/Libraries/MyMIGold.php; app/Libraries/MyMICoin.php
-->
