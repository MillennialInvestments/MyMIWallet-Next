# Troubleshooting

## Common Errors
- **"Invalid payload"** – ensure `scan_name`, `rows` array, and token (if configured) are present.
- **"Too many rows"** – default cap is 500 rows per ingest; trim exports before retrying.
- **Duplicate ingest** – identical payloads (order-insensitive) return the existing ingest ID; send `force=1` on `processIngest` to re-score if needed.
- **Missing template** – logged as a warning; drafts for that platform are skipped but others continue.
- **Distribution skipped** – occurs when `CONTENTENGINE_DISTRIBUTION_ENABLED` is false or no webhook/Discord is configured.

## Reprocessing
1. Call `/API/ContentEngine/processIngest/{id}?force=1` to re-score and regenerate drafts without creating new ingest rows.
2. Approve/Send posts again as needed.

## Purging a Bad Ingest
1. Delete rows in order: `bf_content_posts` → `bf_content_ideas` → `bf_content_scanner_rows` → `bf_content_scanner_ingest` for the target `ingest_id`.
2. Re-run the ingest with corrected data.

## Logs
- Ingest/scoring messages: `log_message('info', ...)` around scoring start/end.
- Distribution errors stored in `bf_content_posts.last_error`.
- Payload hash + ingest status can be queried directly on `bf_content_scanner_ingest`.
