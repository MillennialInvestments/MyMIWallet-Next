# GT-002-01 Defensive Fix Summary

## Confirmed defect

The public homepage returned `HTTP/1.1 500 Internal Server Error`.

## Root-cause candidate

Production logs repeatedly showed `ErrorIngestService` trying to insert into missing table `system_errors`.

## Fix

`ErrorIngestService::capture()` now defensively:

- checks whether `system_errors` exists before inserting
- catches `Throwable` so telemetry ingestion cannot trigger a secondary app failure
- checks whether `error_heatmap` exists before writing heatmap data
- logs debug skip messages instead of throwing

## Production mutation

No production database mutation was performed.

No production rollback was performed.

## Post-deploy smoke required

After merge/deploy, run read-only public smoke against:

- `https://www.mymiwallet.com/`
- `https://mymiwallet.com/`
