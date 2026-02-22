# Endpoints

Base: `/API/Scanner`

- `GET /status`
  - provider health, recent jobs, queue depth estimate
- `POST /run`
  - enqueue/execute a scan job
  - body: `timeframe`, `symbols` OR `symbol_source`, optional `params`
- `GET /results`
  - latest results with filters (`signal`, `direction`, `timeframe`, `since`, `limit`, `offset`)
- `GET /results/{symbol}`
  - symbol-specific latest scanner rows
- `POST /universe/sync`
  - seed/update universe from `bf_investment_tickers`
