# Crypto Customer Agreement (Draft)

> **Top banner:** Not legal advice; draft pending counsel review.

This folder holds the working draft of the MyMI Wallet Crypto Customer Agreement. The agreement is broken into individually editable section files under `sections/` so Product, Legal, and Engineering can collaborate safely. A simple build script assembles a compiled version with feature-flag controls for future services.

## How to toggle features

Feature availability is controlled by `feature_flags.yml`:

```yaml
features:
  spot_trading: true
  wallet_transfers: true
  staking: false
  fiat_onramp_offramp: true
  dex_swaps: false
  margin: false
  derivatives: false
  lending_borrow: false
  nft: false
  api_trading: false
```

Set a value to `true` to include the related content or `false` to strip the `<!-- FEATURE:... -->` block during the build step.

## How to build the compiled agreement

1. From the repo root run:
   ```bash
   php tools/docs/build_legal_agreement.php
   ```
2. The compiled output will be written to `docs/legal/crypto_customer_agreement/compiled_agreement.md`.
3. The script reads `agreement.md` followed by the numerically ordered files in `sections/` (e.g., `00_preamble.md` through `16_misc_governing_law_changes.md`).

## Where to update the fee schedule link

* The Fees & Taxes section links to the Fee Schedule placeholder at `/docs/legal/fees.md` (or your production URL once live).
* Update that reference in both `sections/05_fees_taxes.md` and the compiled output if you are editing manually without the build script.

## Editing tips

* Keep future services inside `<!-- FEATURE:name --> ... <!-- /FEATURE:name -->` blocks so they can be toggled cleanly.
* Each section ends with an `Implementation Notes` comment mapping to controllers, services, or libraries—please keep those current when code changes.
* Remember the top banner: “Not legal advice; draft pending counsel review.”
