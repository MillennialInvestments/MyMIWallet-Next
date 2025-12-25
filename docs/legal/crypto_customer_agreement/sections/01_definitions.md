# Definitions

## What this means
Plain-language references used in this agreement.

## What we provide
- “MyMI Wallet” refers to the MyMI web applications and APIs.
- “Account” refers to your MyMI user profile and any linked wallets or funding sources.
- “MyMI Gold” and “MyMI Coin” refer to on-platform reward or credit balances tracked in the MyMI ledgers.
- “Connected Wallet” refers to self-custody wallets you link (e.g., Phantom, Solflare, MetaMask, Trust Wallet).
- “Spot trading” means buying or selling supported tokens for immediate settlement without leverage.

## What you agree
- These terms apply to all MyMI crypto tools you use, even when accessed through integrations.
- Definitions may evolve as features ship; you will review updates.

## Your responsibilities
- Keep track of which wallet or funding source you are using before submitting a request.
- Confirm whether an action affects on-chain assets, MyMI Gold balances, or both.

## Key limits & disclosures
- MyMI Gold/Coin balances are platform credits and not fiat currency or bank deposits.
- Connected Wallets remain self-custodied; you hold your keys.

<!-- INTERNAL:implementation-notes
- Ledger handling: app/Libraries/MyMIGold.php, app/Libraries/MyMICoin.php
- Wallet connectors: app/Libraries/MyMISolana.php, MyMIPhantom.php, MyMISolflare.php, MyMIMetaMask.php, MyMITrustWallet.php
- Exchange orchestration: app/Libraries/MyMIExchange.php
-->
