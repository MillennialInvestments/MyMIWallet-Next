# Documentation Inventory

Commands used to generate this inventory:

```bash
# List all docs
find docs -type f -name '*.md' -print | sort

# Per-directory counts
find docs -type d | while read d; do
  c=$(find "$d" -maxdepth 1 -type f -name '*.md' | wc -l | tr -d ' ')
  printf "%4s  %s\n" "$c" "$d"
done
```

## All Markdown Files
```
docs/CRON.md
docs/OVERVIEW.md
docs/README.md
docs/adr/0001-standards-and-response-contract.md
docs/adr/_index.md
docs/auctions/_index.md
docs/auctions/auction-schema.md
docs/bitcoin-standardization.md
docs/budget/UI-Suggestions.md
docs/budget/_index.md
docs/budget/budget-controller.md
docs/budgeting/_index.md
docs/budgeting/architecture.md
docs/csp-and-commondata.md
docs/discord/_index.md
docs/discord/discord_schema_v3.sql.md
docs/discord/discord_seed_v3.sql.md
docs/discord_schema.sql.md
docs/discord_seed.sql.md
docs/esports_preflight.md
docs/exports_schema.md
docs/hardening-playbook.md
docs/logs/_index.md
docs/logs/log-2025-10-06.md
docs/marketing/01-mymi-gold-and-coin.md
docs/marketing/02-budgeting-and-investments-libraries.md
docs/marketing/03-mymiexchange-solana.md
docs/marketing/04-mymialerts-premium.md
docs/marketing/05-memberships-and-custom-plans.md
docs/marketing/06-referrals-rewards.md
docs/marketing/07-myprojects-real-estate.md
docs/marketing/08-mymi-apis-self-host.md
docs/marketing/09-discord-coffee-and-stocks.md
docs/marketing/10-linkedin-groups-guide.md
docs/marketing/11-facebook-groups-guide.md
docs/marketing/12-discord-no-links-guide.md
docs/marketing/13-x-twitter-guide.md
docs/marketing/14-stocktwits-guide.md
docs/marketing/15-youtube-guide.md
docs/marketing/16-tiktok-guide.md
docs/marketing/README.md
docs/marketing/_assets/README.md
docs/marketing/_index.md
docs/marketing/_templates/CAMPAIGN_TEMPLATE.md
docs/marketing/index.md
docs/nginx/01-structure.md
docs/nginx/README.md
docs/nginx/_index.md
docs/nginx/config-nginx.md
docs/nginx/mymiwallet.md
docs/nginx/nginx.md
docs/operations/01-foundation.md
docs/operations/01-foundation.report.md
docs/operations/02-libraries.md
docs/operations/03-controllers.md
docs/operations/04-cron-automation.md
docs/operations/05-database.md
docs/operations/06-devops.md
docs/operations/07-marketing-growth.md
docs/operations/08-security-compliance.md
docs/operations/09-frontend-ui.md
docs/operations/10-roadmap.md
docs/operations/_index.md
docs/ops/01-foundation.report.md
docs/ops/01-psr4-autoload-audit.md
docs/ops/500-audit.md
docs/ops/502-playbook.md
docs/ops/_index.md
docs/ops/_inventory.docs.toc.md
docs/ops/_inventory.docs.tree.md
docs/ops/runbooks/alphavantage-rotation-playbook.md
docs/ops/runbooks/database-log-review.md
docs/ops/runbooks/devops-smoke-test.md
docs/ops/runbooks/env-baseline-keys.md
docs/ops/runbooks/marketing-cron-playbook.md
docs/ops/runbooks/routes-audit-playbook.md
docs/ops/runbooks/ui-error-uat.md
docs/ops/unexpected-token-lt-audit.md
docs/predictions/README.md
docs/predictions/_index.md
docs/predictions/mysql-migrations.md
docs/resolutions/2025-10-07-psr4-fixes.md
docs/resolutions/2025-10-09-docs-alignment-kickoff.md
docs/resolutions/PR-128-resolution.md
docs/resolutions/_index.md
docs/search/README.md
docs/search/_index.md
docs/security/2025-10-remediation.md
docs/security/_index.md
docs/tasks/_index.md
docs/wallets/_index.md
docs/wallets/wallets-index.md
```

## Per-Directory Markdown Counts
```
10  docs
   2  docs/logs
   2  docs/adr
   3  docs/discord
   2  docs/search
  12  docs/operations
   2  docs/security
   6  docs/nginx
  19  docs/marketing
   1  docs/marketing/_templates
   1  docs/marketing/_assets
   3  docs/predictions
   8  docs/ops
   7  docs/ops/runbooks
   2  docs/auctions
   2  docs/budgeting
   1  docs/tasks
   4  docs/resolutions
   2  docs/wallets
   3  docs/budget
```
