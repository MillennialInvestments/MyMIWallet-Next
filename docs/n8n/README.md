# n8n Internal Orchestration Templates

## Import
1. Open n8n UI.
2. Go to **Workflows** → **Import from File**.
3. Select any JSON in `docs/n8n/templates/`.
4. Set credentials/environment variables, then activate.

## Required environment variables
- `MYMI_BASE_URL` (e.g. `https://www.mymiwallet.com`)
- `MYMI_INTERNAL_TOKEN` (same value as `INTERNAL_API_TOKEN` in the app `.env`)
- `DISCORD_WEBHOOK_URL`
- `SMTP_HOST`, `SMTP_PORT`, `SMTP_USER`, `SMTP_PASS`, `SMTP_FROM`, `SMTP_TO`

## Endpoint map
- `GET /API/Ops/healthcheck`
- `GET /API/AIOps/snapshot`
- `POST /API/AIOps/watch`
- `GET /API/Logs/summary`
- `POST /API/ContentEngine/run`
- `GET /API/Chat/health`
