# BitcoinJS Standardization (MyMI)

## Why
One canonical copy to avoid version drift and broken pages.

## Loader
- Layout includes `bitcoin.js`, `bitcoin-adapter.js`, `btc-send-flow.js`.
- Never add per-view includes.

## Library & Services
- `MyMIBitcoin.php` does not inject scripts; delegates to `BitcoinService`.
- Endpoints: `/API/Bitcoin/buildUnsignedPsbt`, `/API/Bitcoin/broadcastSignedTx`.

## Adapters & Flow
- Use `window.MyMIBitcoin` for validation/signing helpers.
- Use `MyMIBTCFlow.attach({...})` to wire forms/buttons.

## Guardrails
- CI script `tools/ci/check-bitcoin-paths.sh` fails on non-canonical paths.

## Migration Checklist
- [ ] No per-view bitcoin includes.
- [ ] Views extend dashboard layout or include `partials/bitcoin-scripts.php`.
- [ ] BTC send views call `MyMIBTCFlow.attach`.
- [ ] Smoke page `/Dev/BitcoinTest` passes.
