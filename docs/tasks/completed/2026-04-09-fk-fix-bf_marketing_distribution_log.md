# FK fix: bf_marketing_distribution_log (2026-04-09)

## summary
Standardized `bf_marketing_distribution_log.generated_content_id` to match `bf_marketing_generated_content.id`, then re-applied FK with `ON DELETE SET NULL` and `ON UPDATE CASCADE`.

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
1. Run `php spark migrate`.
2. Confirm FK exists in `information_schema.KEY_COLUMN_USAGE`.
3. Confirm delete/update behavior from parent table behaves as configured.

## known follow-ups
- Add a migration smoke test command that validates FK definitions in CI.
