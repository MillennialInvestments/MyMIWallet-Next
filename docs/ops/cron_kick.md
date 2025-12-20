# Cron Kick Helper

`cron_kick.sh` triggers CI4 cron/manual endpoints that expect the `cronKey` filter. It reads `CRON_SECRET` from the environment or `.env`, then sends requests defined in `scripts/cron_endpoints.json`.

## How it works
- Endpoints + headers live in `scripts/cron_endpoints.json` (path, method, and header placeholders).
- `CRON_SECRET` is pulled from the shell env, falling back to `.env`.
- Default base URL: `https://www.mymiwallet.com` (override with `--base`).
- Supports `--dry-run` to print the curl commands without executing.

## Usage
- Dry run: `./scripts/cron_kick.sh --dry-run`
- Target another host: `./scripts/cron_kick.sh --base https://staging.mymiwallet.com`
- Full execution (prod default base): `./scripts/cron_kick.sh`

## Current endpoints
- Marketing: `cronFetchAndGenerateNews`, `cronAnalyzeContent`, `cronAutoPublishGroupedDigest`
- Esports: `cronProcessJobs` (POST)

## Safety notes
- Ensure `.env` has `CRON_SECRET` for protected routes.
- HTTP 4xx responses are printed but do not halt the loop; review logs after failures.
- Use `--dry-run` first when testing new endpoints or tokens.
