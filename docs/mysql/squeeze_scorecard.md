# Short Squeeze Scorecard + Fade Strategy (MySQL)

## Tables + Purpose
- **bf_squeeze_universe**: Stores daily/intraday raw float/short metrics snapshots per symbol.
- **bf_squeeze_scorecards**: Stores computed score outputs (squeeze + sustainability + risk).
- **bf_squeeze_zoomout**: Stores structural “zoom out” analysis (trend, dilution, fundamentals).
- **bf_squeeze_fade_setups**: Stores post-squeeze fade setups and risk rules.

## Table Definitions
### bf_squeeze_universe
| Column | Type | Notes |
| --- | --- | --- |
| id | BIGINT PK AI | Primary key |
| symbol | VARCHAR(16) | Required |
| as_of_date | DATE | Required |
| source | VARCHAR(32) | manual\|fidelity\|marketdata |
| float_shares | BIGINT | Nullable |
| shares_out | BIGINT | Nullable |
| short_interest_shares | BIGINT | Nullable |
| short_interest_pct | DECIMAL(10,2) | Nullable |
| days_to_cover | DECIMAL(10,2) | Nullable |
| cost_to_borrow | DECIMAL(10,2) | Nullable |
| utilization_pct | DECIMAL(10,2) | Nullable |
| avg_volume_30d | BIGINT | Nullable |
| volume_today | BIGINT | Nullable |
| price | DECIMAL(12,4) | Nullable |
| open | DECIMAL(12,4) | Nullable |
| high | DECIMAL(12,4) | Nullable |
| low | DECIMAL(12,4) | Nullable |
| prev_close | DECIMAL(12,4) | Nullable |
| created_at | DATETIME | Required |

Indexes:
- UNIQUE uq_symbol_date (symbol, as_of_date)
- idx_date (as_of_date)
- idx_symbol (symbol)

### bf_squeeze_scorecards
| Column | Type | Notes |
| --- | --- | --- |
| id | BIGINT PK AI | Primary key |
| symbol | VARCHAR(16) | Required |
| as_of_datetime | DATETIME | Required |
| score_total | INT | 0-100 |
| score_squeeze | INT | Positive squeeze drivers |
| score_sustainability | INT | Sustainability vs risk |
| score_risk | INT | Risk score |
| flags_json | LONGTEXT | JSON flags |
| inputs_json | LONGTEXT | JSON inputs |
| created_at | DATETIME | Required |

Indexes:
- idx_symbol_dt (symbol, as_of_datetime)
- idx_score_total (score_total)

### bf_squeeze_fade_setups
| Column | Type | Notes |
| --- | --- | --- |
| id | BIGINT PK AI | Primary key |
| symbol | VARCHAR(16) | Required |
| as_of_datetime | DATETIME | Required |
| setup_grade | VARCHAR(2) | A/B/C/D |
| entry_type | VARCHAR(32) | VWAP fail, HOD reclaim fail, gap fill, etc. |
| entry_price | DECIMAL(12,4) | Nullable |
| stop_price | DECIMAL(12,4) | Nullable |
| target1 | DECIMAL(12,4) | Nullable |
| target2 | DECIMAL(12,4) | Nullable |
| risk_notes | VARCHAR(255) | Nullable |
| logic_json | LONGTEXT | JSON logic |
| created_at | DATETIME | Required |

Indexes:
- idx_symbol_dt (symbol, as_of_datetime)

### bf_squeeze_zoomout
| Column | Type | Notes |
| --- | --- | --- |
| id | BIGINT PK AI | Primary key |
| symbol | VARCHAR(16) | Required |
| as_of_date | DATE | Required |
| trend_state | VARCHAR(32) | downtrend\|range\|uptrend |
| dilution_risk | VARCHAR(16) | high\|med\|low |
| fundamentals_state | VARCHAR(32) | weak\|mixed\|strong |
| narrative | TEXT | Narrative output |
| evidence_json | LONGTEXT | JSON evidence |
| created_at | DATETIME | Required |

Indexes:
- UNIQUE uq_symbol_date (symbol, as_of_date)

## Example Queries
```sql
SELECT symbol, score_total, score_squeeze, score_sustainability
FROM bf_squeeze_scorecards
WHERE as_of_datetime >= NOW() - INTERVAL 1 DAY
ORDER BY score_total DESC;
```

```sql
SELECT *
FROM bf_squeeze_zoomout
WHERE symbol = 'DRCT'
ORDER BY as_of_date DESC
LIMIT 1;
```

```sql
SELECT *
FROM bf_squeeze_fade_setups
WHERE symbol = 'DRCT'
AND DATE(as_of_datetime) = CURDATE();
```

## Example Curl Commands
```bash
curl -X POST https://www.mymiwallet.com/api/squeeze/run \
  -H "Content-Type: application/json" \
  -d '{
    "symbol":"DRCT",
    "float_shares":1270000,
    "short_interest_pct":389,
    "volume_today":100852905,
    "avg_volume_30d":838800,
    "price":3.99,
    "prev_close":2.31,
    "cost_to_borrow":120,
    "days_to_cover":4.2
  }'
```

```bash
curl "https://www.mymiwallet.com/api/squeeze/scorecard?symbol=DRCT"
```

```bash
curl "https://www.mymiwallet.com/api/squeeze/zoomout?symbol=DRCT"
```

```bash
curl "https://www.mymiwallet.com/api/squeeze/fade?symbol=DRCT"
```
