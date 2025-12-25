# QA Test Accounts & Data Sets

Use these shared accounts and seed data for staging/pre-production validation. Avoid creating arbitrary accounts in production; reuse labeled fixtures where possible.

## Roles & Credentials (store secrets outside repo)
- **Admin:** Full access to `/Management`, `/Marketing`, `/API/Management/*` cron endpoints (with `cronKey`). Used for Zapier/Discord tests and environment toggles.
- **Premium:** Paid membership with insights unlocked for watchlists and premium dashboards.
- **Standard/Free:** Baseline user used for registration/login flows, budget entry, and non-premium gating.
- **Suspended/Flagged:** User marked inactive or suspended to validate access revocation and error messaging.

> Keep actual emails/passwords in the secure secrets vault. Reference them in runbooks, not in git.

## Required Test Data Sets
- **Watchlist items:** At least 3 symbols (stock, ETF, crypto) assigned to free and premium users.
- **Budget data:** Income entries, recurring bills, debts/credit lines, and savings goals to populate `/Budget/*` views.
- **Sample trade alerts:** Seed `bf_investment_scraper` with 3 alerts covering different tickers and statuses.
- **Marketing summaries/posts:** Records in `bf_marketing_temp_scraper` and `bf_marketing_scraper` for preview and distribution tests.
- **Predictions/Investments data:** Optional markets/orders if Predictions module is enabled.

## Safe Testing Notes (Prod-like Staging)
- Run destructive actions (delete, backfill, resync) only in staging unless explicitly approved.
- For prod-like tests, use clearly labeled "QA" prefixes in titles and descriptions.
- When triggering cron endpoints, pass the correct `cronKey` and confirm in `bf_error_logs` that the run was scoped to staging/test data.
- Avoid posting to real Discord/Zapier channels unless they are QA webhooks; rotate keys after tests if used.
