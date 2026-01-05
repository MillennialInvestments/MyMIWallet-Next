# Deployment

## Safe deploy steps
1. Pull code: `cd ~/mymiwallet/site/current && git pull`
2. Install Node deps if needed: `cd chat && npm ci`
3. Copy env: `cp chat/.env.example chat/.env` and update secrets/ports.
4. Restart chat: `cd chat && ./stop-chat.sh && ./start-chat.sh`
5. Run migrations for audit log: `php spark migrate -n App\\Database\\Migrations --all` (or `php spark migrate` if global).

## Post-deploy verification
- Health: `curl -sS https://chat.mymiwallet.com/health | jq .`
- Routes: `curl -I https://chat.mymiwallet.com/m` and `/u`
- Profile proxy: `curl -i https://chat.mymiwallet.com/api/me`
- Tool test: `curl -sS -X POST https://chat.mymiwallet.com/api/chat -H 'Content-Type: application/json' -d '{"mode":"management","tool":"ops_status"}' | jq .`

## Nginx and timeouts
- Ensure upstream points to port defined by `PORT` (default 8500).
- Static assets are served for `/`, `/m`, `/u`; asset paths are relative to those prefixes.
- Keep proxy_read_timeout ≥ 60s for LLM replies; tool calls are short (<10s).

## Rollback
1. `cd ~/mymiwallet/site/current && git checkout HEAD~1` (or target revision).
2. `cd chat && ./stop-chat.sh && ./start-chat.sh`
3. If migration introduced issues, roll back: `php spark migrate:rollback --batches 1` to drop `bf_chat_tool_runs`.
4. Tail logs to confirm stability: `tail -n 200 chat/logs/chat.log`.
