# SQL Patch Notes

Migration: `2024-05-20-000000_FixContentEngineTables.php`

Creates/repairs tables:
- `bf_content_scanner_ingest` (unique `payload_hash`, indexes on `quote_ts`, `status`)
- `bf_content_scanner_rows` (FK ingest_id, indexes on `ingest_id`, `symbol`)
- `bf_content_ideas` (FK ingest_id, indexes on `ingest_id`, `symbol`, `(ingest_id, tier)`)
- `bf_content_posts` (FK idea_id, index on `(platform, status)`)

All foreign keys cascade on delete/update to keep related rows in sync.