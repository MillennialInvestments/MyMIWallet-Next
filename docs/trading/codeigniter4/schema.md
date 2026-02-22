# Schema

Migration creates:
- `bf_scanner_jobs`
- `bf_scanner_results`
- `bf_scanner_symbol_universe`

Indexes:
- results: `(symbol,timeframe,occurred_on)`, `(signal,direction,occurred_on)`, `(job_id)`
- jobs: `(status,created_on)`

Payloads:
- `params_json`: job-level signal configuration.
- `payload_json`: full computed per-symbol features.
