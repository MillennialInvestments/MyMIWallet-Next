# JSON contract (scanner ingest)

`POST /API/ContentEngine/ingestScanner`

Payload example:
```json
{
  "quote_ts": "2025-12-12T16:28:51-06:00",
  "scan_name": "Daily Top Gainers - >+5% %Change",
  "rows": [{
    "symbol": "TLRY",
    "stage": 5,
    "mark": 12.56,
    "mark_pct_change": 48.99,
    "pct_chng_5d": 65.31,
    "market_cap_m": 1409,
    "volume": 81089096,
    "dollar_vol_m": 919.96,
    "abvvol": 867.14,
    "vol_365": 5.31,
    "high_52w": 23.2,
    "low_52w": 3.507,
    "pct_1mo_chg": -1.22
  }]
}
```

Aliases are normalized via `app/Config/ContentEngine.php` → `ScannerIngestService::normalizeRow()`:
- `Mark %Change`, `% Change`, `Mark%Change` → `mark_pct_change`
- `$ Vol`, `Dollar Vol` → `dollar_vol_m`
- `5D % Change` → `pct_chng_5d`
- `52w High`/`52w Low` → `high_52w` / `low_52w`
- `1M %Change` → `pct_1mo_chg`
- `Volume`/`Vol` → `volume`
- `Stage`, `Sum` respected when present.

Rows may include extra keys; all raw JSON is persisted on `bf_content_scanner_rows.raw_json`. Numeric fields are coerced when possible; invalid numerics become `null`.
