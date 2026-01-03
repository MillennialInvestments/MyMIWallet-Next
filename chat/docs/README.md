# MyMI Wallet Chat Service

Self-hosted Express service that fronts OpenAI for MyMI Wallet support and research chat. The service ships with hard usage caps, a basic HTML UI, and a runtime kill switch.

## Features
- Basic authentication guard with CORS allow-list
- Runtime kill switch via `config.runtime.json` (polled every 10 seconds)
- Daily and monthly usage tracking with alerting threshold and hard stop
- OpenAI chat completion adapter (ready for future provider adapters)
- Lightweight HTML/JS frontend suitable for DreamHost
- Start/stop helper scripts that use `nvm` and log to `logs/chat.log`

## Prerequisites
- Node.js 20+ (tested with nvm 22)
- OpenAI API key with access to the configured model

## Setup
1. Copy `.env.example` to `.env` and update credentials and keys.
2. Review `config.runtime.json` for budget limits and provider choice.
3. Install dependencies:
   ```bash
   cd ~/mymiwallet/site/current/chat
   npm install
   ```
4. Start the service:
   ```bash
   ./start-chat.sh
   ```
5. Visit `http://<server>:8300` and authenticate with the basic auth credentials.

## Configuration notes
- `APP_BASE_URL` controls the allowed origin for browser calls.
- `BASIC_AUTH_ACTIVE=false` disables basic auth (not recommended in production).
- `config.runtime.json` supports a fast disable by setting `enabled` to `false`.
- Usage limits use a rough token-to-USD mapping (`0.00015` per 1K tokens). Adjust `COST_PER_KTOKEN_USD` in `server.js` when pricing changes.

## Files
- `server.js`: Express app and provider adapter
- `public/`: static UI assets
- `start-chat.sh` / `stop-chat.sh`: process helpers
- `usage.json`: rolling usage totals (auto-reset daily/monthly)
- `logs/chat.log`: runtime logs
