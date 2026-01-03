# Chat Runtime Cost Controls Runbook

Use this guide to control chat.mymiwallet.com behavior without redeploying code.

## Disable chat instantly
1. Edit `chat/config.runtime.json` and set `"enabled": false`.
2. Save the file. The API will return HTTP 503 with `"Chat temporarily disabled"` until re-enabled.

## Downgrade the AI model
1. Update `provider` and `providerModel` in `chat/config.runtime.json`.
   - Example (OpenAI, cheaper): `"provider": "openai"`, `"providerModel": "gpt-3.5-turbo"`.
   - Example (Ollama): `"provider": "ollama"`, `"providerModel": "llama3"`.
2. Save the file to switch models immediately (no restart required).

## Reset usage for a new month
1. Open `chat/usage.json`.
2. Set `"month"` to the new month key (e.g., `"2026-02"`) and `"totalUsd": 0`, `"lastAlertSent": 0`.
3. Save the file. The server also auto-resets when the month changes.

## Emergency-stop spending
1. Lower `"hardStopPercent"` or `"monthlyBudgetUsd"` in `chat/config.runtime.json`, or set `"enabled": false` for a hard kill switch.
2. Requests will receive HTTP 429 (`"Monthly AI budget exhausted"`) once the hard stop threshold is hit.

## Alerting behavior
- Soft alert triggers when spending reaches `alertThresholdPercent` of `monthlyBudgetUsd` (floor-rounded). An email is sent to `team@mymiwallet.com` when available; otherwise the alert is logged and forwarded to the MyMI usage webhook when configured.
- Hard stop blocks traffic at `hardStopPercent` of `monthlyBudgetUsd`.

## Usage estimation and storage
- Costs are estimated before provider calls using `JSON.stringify(messages).length / 4` tokens and per-model pricing.
- Usage is stored at `chat/usage.json` with the shape `{ "month": "YYYY-MM", "totalUsd": number, "lastAlertSent": number }` so DreamHost file storage remains the single source of truth.
