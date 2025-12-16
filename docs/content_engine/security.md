# Security

- Ingest endpoint can be protected via `X-MYMI-TOKEN` (set `ContentEngine.ingestToken`).
- All other `/API/ContentEngine/*` endpoints require admin session or matching `X-MYMI-TOKEN`.
- Payload size guard: rejects payloads > `ContentEngine.maxPayloadBytes` (default 1MB) in `ScannerIngestService::guardPayloadSize()`.
- Raw ingest JSON is stored unchanged on `bf_content_scanner_rows.raw_json` for audit.
- Status workflow: ingest starts as `received`, becomes `processed` after scoring; failures mark `failed`.
- Database tables prefixed `bf_` with index coverage:
  - Unique `payload_hash` on `bf_content_scanner_ingest`
  - `(symbol, ingest_id)` on `bf_content_ideas`
  - `(platform, status)` on `bf_content_posts`
- Management UI requires auth (`Management/Config/Routes.php` uses `auth` filter).