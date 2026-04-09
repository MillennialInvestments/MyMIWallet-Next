# Schema hardening: marketing tables (2026-04-09)

## summary
Added production-safe schema guards and missing columns for `bf_marketing_distribution_log`, `bf_marketing_temp_scraper`, and `bf_marketing_scraper`.

## files changed
- `app/Database/Migrations/2026-04-09-130000_HardenMarketingNewsPipelineSchema.php`
- `app/Database/Migrations/2026-04-09-120000_EnhanceMarketingGenerationPipeline.php`

## migrations added
- `2026-04-09-130000_HardenMarketingNewsPipelineSchema`

## commands added
- None.

## routes added
- None.

## manual test steps
1. Run `php spark migrate` on a DB with partially-missing columns.
2. Verify required columns now exist in both temp/final tables.
3. Re-run `php spark migrate` to validate idempotency.

## known follow-ups
- Add automated schema drift checks for the new story/timeline columns.
