# Architecture

- `ScannerController`: API endpoint entrypoints.
- `ScannerService`: orchestrates jobs, symbols, provider fetch, signal engine, and persistence.
- `ProviderRouter`: primary/fallback provider selection + health snapshots.
- `SignalEngine`: deterministic/non-repainting latest completed bar signal logic.
- `ScannerModel`: DB persistence for jobs/results/universe.
- `RunScanner` spark command: cron/CLI execution path.

Flow:
1. Create scanner job row (`queued` -> `running`).
2. Resolve symbols (manual/watchlist/universe/tickers).
3. Pull OHLCV with cache and provider fallback.
4. Compute indicators + liquidity levels + events.
5. Persist signals fired on latest completed bar.
6. Mark job `completed`/`failed`.
