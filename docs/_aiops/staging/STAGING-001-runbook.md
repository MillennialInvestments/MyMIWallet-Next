# STAGING-001: staging.mymiwallet.com

Staging is a password-protected copy of MyMI Wallet on gq-ai01 with a scrubbed
copy of the live database. It is where forms get submitted for real, money
flows get tested with sandbox keys, and releases get tried before going live.

Script: `scripts/ops/staging/mymi-staging.sh` (run with sudo on gq-ai01).

## One-time setup

1. DNS: add a record for `staging.mymiwallet.com` pointing to the same place as
   `www.mymiwallet.com` (same A record, or a CNAME to www).
2. Storage gate: incidents #1783/#1784. `check` prints RAID state, kernel disk
   errors since boot and SMART health, and refuses to continue if any look bad.
   `STORAGE_OVERRIDE=1` skips that refusal only after you have checked by hand.
3. `sudo bash mymi-staging.sh check` (read-only), then `sudo bash mymi-staging.sh setup`.

`setup` does, in order: writes `/apps/TBI/www/mymiwallet-staging/shared/.env`,
loads the newest nightly backup into `mymiwallet_staging`, scrubs it, creates
two test accounts, builds `main` into `/apps/TBI/www/mymiwallet-staging/releases/`,
adds the nginx site with a password prompt and `noindex`, runs certbot if DNS
is up, and smoke-tests the home page.

All generated passwords are in `~/mymi-staging-credentials.txt` (mode 600).

## What staging never touches

- The live DB: staging has its own DB and its own MySQL user with rights only
  on `mymiwallet_staging`. The dump is loaded with every `USE` line and every
  live-DB-qualified name stripped.
- The live site folder, live `.env` and live nginx site (read only, to copy the
  PHP handler and safe app settings).

## Scrub

- Every `bf_users.email` becomes `user<id>@staging.invalid`; every other email
  column becomes `scrubbed-<hash>@staging.invalid`.
- Secrets are blanked in every table by column name: private keys, seeds,
  API keys and secrets, access/refresh/remember tokens, password and reset
  hashes, 2FA secrets, account/routing/card numbers, SSN/tax ids, webhook secrets.
- Personal fields are blanked: phone, address, zip, date of birth, IP,
  user agent, names.
- Tables emptied: sessions, sign-in tokens and logs, 2FA, mail queues, scraped
  inbox mail, payment claims, IP history, privacy requests.
- Every real account gets an unusable password.

## Staging .env

Only safe app settings are copied from live. No PayPal, Plaid, SnapTrade,
Robinhood, Discord, Postmark, AI or market-data keys. Mail goes to
127.0.0.1:2525, where nothing listens. Separate cookie names so a staging
login never touches a live session. `CI_ENVIRONMENT = staging` (errors hidden,
like production) and `AIOPS_FORM_TEST_ALLOWED_HOSTS = staging.mymiwallet.com`.

## Test accounts

- `staging-tester@staging.invalid`: normal member.
- `staging-admin@staging.invalid`: `role_id` 1 and the `admin` group if it exists.

## Day to day

- Your own test-account password: `sudo bash mymi-staging.sh set-password tester` (or `admin`); db-refresh keeps it.
- New release on staging: `sudo bash mymi-staging.sh deploy main` (or a branch).
  Add `MIGRATE='<names>'` to run named migrations on the staging DB only.
- Fresh data: `sudo bash mymi-staging.sh db-refresh` (reloads and re-scrubs;
  test accounts keep their passwords).
- Form run on staging, from the staging release folder:
  `php spark aiops:form:test --scan-all --submit --allow-destructive --approve`.
  The harness refuses live hosts, and skips every target on the destructive
  list in `FormSubmissionPolicy::DESTRUCTIVE_TARGETS` (money, mail, deletes,
  sign-in changes, admin jobs, outside providers), even on staging.

## Turning on a money switch (owner decision, Tim)

All five stay off on live until each one passes on staging with sandbox keys.

1. Staging `.env`: add PayPal **sandbox** REST keys
   `PAYPAL_REST_CLIENT_ID`, `PAYPAL_REST_SECRET`, `PAYPAL_REST_MODE = sandbox`,
   and the sandbox client id the PayPal buttons use.
2. Staging `.env`: set the one switch to `true`, for example
   `FEATURE_MYMIGOLD_PURCHASES = true`.
3. Signed in as `staging-tester`, buy with a PayPal sandbox buyer account.
   Check: one row in `bf_payment_claims` with status `verified`, the credit
   shows once, and replaying the same order id credits nothing.
4. Live `.env` (`/apps/TBI/www/mymiwallet/shared/.env`): add the **live**
   `PAYPAL_REST_CLIENT_ID` / `PAYPAL_REST_SECRET`, then set the same switch to
   `true`, then `php spark cache:clear` in the live release. Turning it back off
   is the same line set to `false`.

Solana trading, auctions and project investing also need their own provider
and escrow review before step 4; they have no sandbox path yet.
