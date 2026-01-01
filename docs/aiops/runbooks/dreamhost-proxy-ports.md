# DreamHost Proxy Ports and Runtime Layout

DreamHost only proxies ports **8000–65535**, so the AI Ops services must avoid low defaults (e.g., n8n 5678, chat 3000) when running behind Nginx on the VPS.

## Proxy entries
- **mymiwallet.com → 9010** (CI4 main app)
- **aiops.mymiwallet.com → 8500** (n8n workflows)
- **chat.mymiwallet.com → 8300** (AI Ops chat UI)

## Directory deployment targets
- `mymiwallet/site/current/aiops` (n8n runtime, env files, scripts)
- `mymiwallet/site/current/chat` (chat UI runtime)

Keep TLS termination on Nginx, enforce basic auth on admin surfaces, and store `.env` files outside the web root when possible.
