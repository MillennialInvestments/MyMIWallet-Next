# Security Hardening Checklist

- Enable **basic auth** on n8n/Open WebUI proxies and require TLS.
- Apply **IP allowlists** for admin surfaces (Nginx allow/deny rules or WAF).
- Store secrets in environment files or secret managers; avoid logging secrets.
- Rotate **API keys and shared secrets** regularly (AI_OPS_SHARED_SECRET, webhook tokens).
- Protect **Ollama**: keep port `11434` private, bind to localhost/private network only.
- Enable **HMAC validation** for inbound webhooks (`X-MyMI-Signature`).
- Harden servers with timely OS/package updates and minimal privileges.
