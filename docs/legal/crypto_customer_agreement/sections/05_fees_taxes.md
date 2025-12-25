# Fees & Taxes

## What this means
How we charge for services and how taxes apply.

## What we provide
- Transparent display of platform fees (if any) and estimated network fees before you submit a request.
- A Fee Schedule link (see `/docs/legal/fees.md` or the production Fees page) for current rates.
- Transaction history you can export to support your own tax reporting.

## What you agree
- You will review the Fee Schedule and in-app estimates before confirming transactions.
- You are responsible for all taxes arising from your activity (including income, gains, staking rewards when enabled, and airdrops).
- You consent to receive tax forms electronically when required (e.g., 1099 or equivalent).

## Your responsibilities
- Budget for network fees; actual on-chain costs may differ from estimates due to congestion.
- Keep records and consult your tax advisor; MyMI does not provide tax advice.
- Provide accurate W-9/W-8 or local equivalents when requested to determine withholding or reporting obligations.

## Key limits & disclosures
- Network fees are paid to validators/miners and are outside MyMI’s control.
- Some third parties (e.g., payment processors) may charge their own fees; those are passed through.
- MyMI Gold/Coin rewards may be taxable; valuation is your responsibility.

<!-- INTERNAL:implementation-notes
- Fee calculations: app/Services/RevenueService.php; app/Services/TransactionService.php
- Pricing data for tax estimates: app/Services/CoinGeckoService.php; app/Services/BirdeyeService.php
- Export/reporting: app/Modules/User/Controllers/WalletsController.php (history views); app/Modules/APIs/Controllers/WalletsController.php (exports)
-->
