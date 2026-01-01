# Self-Hosted Stack Overview

## Components
- **Ollama**: Local model runner for secure inference.
- **Open WebUI**: Optional front-end UI for Ollama.
- **n8n**: Workflow orchestrator for inbound/outbound automations.
- **Redis**: Queue/cache backing service for n8n and app caching.
- **Postgres**: n8n metadata database; MySQL remains primary CI4 DB.

## Port Map & Reverse Proxy (placeholders)
- Ollama: `11434` (must stay private; reverse proxy with basic auth if exposed internally).
- Open WebUI: `3000` (proxy via Nginx with auth/IP allowlists).
- n8n: `5678` (proxy with HTTPS and signed webhook checks).
- Redis: `6379` (LAN-only; never exposed to the internet).
- Postgres: `5432` (LAN-only; managed security groups/firewall).

> Replace placeholders with your environment’s actual ports/hosts and enforce TLS/zero-trust controls before production.

## Privacy Requirements
- **Never expose Ollama (11434) publicly.** Bind to localhost or private VLAN and protect reverse proxies with auth + IP allowlists.
- Keep secrets in environment files or secret managers; do not log payloads or prompts.
- Limit outbound internet for self-hosted nodes when possible.
