# JSON Contract

`ingestScanner` accepts normalized keys **or** raw pasted aliases. The payload must include:

```json
{
  "scan_name": "Daily Top Gainers",
  "quote_ts": "2024-05-20 15:45:00",
  "rows": [ { ... row objects ... } ]
}
```

## Supported Keys
- `symbol` (aliases: `Symbol`, `Ticker`)
- `mark_pct_change` (aliases: `Mark %Change`, `Mark % Change`, `Mark%Change`, `%Change`, `% Change`, `MarkChg%`)
- `dollar_vol_m` (aliases: `$ Vol`, `$Vol`, `Dollar Vol`)
- `market_cap_m` (aliases: `Market Cap (M)`, `Market Cap`, `MarketCap`)
- `abvvol` (aliases: `ABV`, `ABVVol`, `AbvVol`)
- `pct_chng_5d` (aliases: `5D %Change`, `5D % Change`, `%Chng 5 D`)
- `high_52w` (aliases: `52w High`, `52High`)
- `low_52w` (aliases: `52w Low`, `52Low`)
- `pct_1mo_chg` (aliases: `pct_1_Mo_Chg`, `pct_1_Mo_Chng`, `1M %Change`, `1M % Change`)

Missing numeric values are stored as `NULL`. Raw rows are always saved in `raw_json`.

## Validation
- Payload must include `scan_name` and at least one row.
- Max payload size: 1MB; max rows: 500.
- `payload_hash` prevents duplicate ingests (order-independent hash).
