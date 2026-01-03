# Chat Service Ops Runbook

## Start/stop
```bash
cd ~/mymiwallet/site/current/chat
./start-chat.sh   # starts with nvm + nohup, writes chat.pid
./stop-chat.sh    # stops the PID and removes chat.pid
```

## Health checks
```bash
curl -I http://127.0.0.1:8300/health
curl -I http://chat.mymiwallet.com:8300/health
curl -I https://chat.mymiwallet.com/health
```

## Logs and sockets
```bash
tail -n 100 logs/chat.log
ss -ltnp | egrep ':8300'
```

## Runtime config
- Edit `config.runtime.json` and set `"enabled": false` to quickly disable the service.
- File is re-read every ~10s, so no restart is required for toggling the kill switch or adjusting limits.

## Basic troubleshooting
- Ensure `.env` has correct `OPENAI_API_KEY` and matches the desired `OPENAI_MODEL`.
- If usage caps trigger unexpectedly, review `usage.json` and reset counters if needed.
- CORS failures indicate a mismatch between the browser `Origin` and `APP_BASE_URL`.
