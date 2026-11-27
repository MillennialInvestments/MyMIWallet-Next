# MYMI-XCHAIN-001 staging packet (staging.mymiwallet.com only)

Deploys **latest `main`** to staging on `gq-ai01`. Main already holds
XCHAIN-001 (#790), XCHAIN-002 (#798) and the review fixes (#802), so the old
`integration/mymi-xchain-001` branch is no longer used. Testnets only: the
switch script stops if staging's `CRYPTO_PAY_NETWORK` is not `testnet`.
Nothing here touches the live site, the live `.env` or the live database.

## 1. Deploy main with the named migrations

`AddGoldLedgerChainUniqueKey` comes right after `CreateGoldLedger`. Migrations
already applied on staging (for example `CreateCryptoPayRequests` from the XRP
and Ethereum tests) are skipped. The deploy runs them before staging switches
to the new release.

```bash
cd /apps/TBI/repos/mymiwallet-next
git fetch origin main
sudo MIGRATE='2026-04-01-000105_CreateMditPhase1Tables 2026-11-25-000100_CreateCryptoPayRequests 2026-11-25-000200_CreateGoldLedger 2026-11-26-000300_AddGoldLedgerChainUniqueKey 2026-11-25-000300_CreateBtcAddressPool 2026-11-25-000400_CreatePaperExchangeTables 2026-11-25-000500_CreateMyMICoinInterestTable 2026-11-26-000100_CreateUtxoAddressPool' bash scripts/ops/staging/mymi-staging.sh deploy main
```

PASS: the last lines say `done:` or `already applied:` for each name and
`staging is now <release>`. STOP: `NOT FOUND`, `FAILED`, or any `die` line;
staging stays on its previous release.

## 2. Turn on the staging switches and load the sanctions list

Backs up staging `shared/.env` to `.env.bak-xchain-<UTC time>`, sets the
XCHAIN-001 switches (Gold purchases, sanctions screening, swaps quote-only,
paper exchange, MyMI Coin offering, wallets), adds a daily 03:00 UTC sanctions
refresh in `/etc/cron.d/mymi-xchain-staging` and loads the list once. Safe to
run again. The existing every-minute `cryptopay:reconcile` cron stays as it is.

```bash
sudo bash /apps/TBI/www/mymiwallet-staging/current/scripts/ops/staging/mymi-xchain-staging-env.sh apply
```

PASS: `SEMANTIC_RESULT=PASS` and `PASS: sanctions list loaded`. A `WARN` about
an empty list means screening lets every address through until the list loads;
run the same command again later. STOP: `SEMANTIC_RESULT=BLOCKED_SAFETY`.

## 3. Smoke checks (read-only)

```bash
sudo bash /apps/TBI/www/mymiwallet-staging/current/scripts/ops/staging/mymi-xchain-smoke.sh /apps/TBI/www/mymiwallet-staging/current
```

```bash
sudo bash /apps/TBI/www/mymiwallet-staging/current/scripts/ops/staging/mymi-xchain-002-smoke.sh /apps/TBI/www/mymiwallet-staging/current
```

(The XCHAIN-002 smoke calls `sudo -u www-data` itself, so it runs under
`sudo`, not as `www-data`.)

PASS: each script ends with its "PASSED" banner. STOP: any failed check; send
the summary block.

## Rollback

1. Switches and cron: `sudo bash /apps/TBI/www/mymiwallet-staging/current/scripts/ops/staging/mymi-xchain-staging-env.sh rollback`
   restores the `.env` from before the first apply and removes the cron file.
2. Code: `sudo bash /apps/TBI/repos/mymiwallet-next/scripts/ops/staging/mymi-staging.sh deploy` with the previous
   release's commit, or leave staging on main with the switches off.
3. New tables stay (named migrations are not dropped automatically); with the
   switches off nothing reads them.
