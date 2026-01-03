## NPM stack recommendations for MyMI Wallet automations (DreamHost VPS, CI4)

Environment assumptions: DreamHost VPS (no sudo, no Docker), CI4 + MySQL + Cron already in place. These packages are for small Node sidecars that complement CI4 (API/webhook relays, queues, chat/AI bridges). Each entry notes when to prefer CI4-native features, extra service requirements, and DreamHost viability.

### A) Runtime + Process Management
- **pm2** — Keep n8n/bridge/chat services alive; auto-restart on crash. Use when running any long-lived Node sidecar. Requires SSH access only; works without sudo.
- **dotenv** — Load `.env` files for custom Node services; unnecessary if only using n8n. No extra services needed; DreamHost-safe.
- **pino** or **winston** — Structured logging for Node services; prefer CI4 logging for PHP paths. No extra deps; good for log-forwarding to files/ELK.
- **pino-pretty** — Dev-only pretty printing; avoid in production to keep logs structured.

### B) HTTP + Webhooks + API Clients
- **axios** — Simple HTTP client for internal relays calling CI4 APIs; CI4’s native HTTP client still preferred in PHP controllers.
- **undici** — Faster, modern HTTP client with Node-native ergonomics; use for high-throughput fetchers.
- **express** or **fastify** — Tiny internal services, webhook relays, token gates. Use only when CI4 routing is not ideal (e.g., segregated secrets or Node-only middleware).
- **node-fetch** — Legacy compatibility when dependencies still expect it; Node 18+ already has `fetch`.

### C) Queues + Rate Limiting + Reliability
- **bullmq** — Redis-backed queues; best for batching API calls and throttled workloads (e.g., AlphaVantage). Requires Redis; verify DreamHost Redis availability or provision external Redis.
- **bottleneck** — Rate limiter; great for AlphaVantage/MarketAux limits without Redis (in-memory works).
- **p-queue** — Simple in-memory queue; low overhead if no Redis yet. For lightweight background tasks.
- **node-cron** — Node-managed schedules if you can’t rely on system cron. Prefer Linux cron when possible (already present on VPS).

### D) Realtime + Notifications
- **socket.io** — Realtime dashboards for “processing alerts” or marketing status. Needs persistent Node process; avoid if Nginx reverse-proxy setup is blocked.
- **ws** — Lightweight WebSocket server/client when you don’t need Socket.io features.
- **nodemailer** — Email sending from Node. Prefer CI4 email pipeline if already configured; otherwise okay with app passwords/SMTP.
- **discord.js** — Discord bot flows when n8n nodes are insufficient or you need fine-grained control. Requires Discord bot token management.

### E) Parsing + Scraping + Text Cleanup
- **cheerio** — HTML parsing/scraping; lighter than puppeteer. Good for email/news ingestion.
- **sanitize-html** — Clean HTML emails/newsletters before storing or rendering.
- **turndown** — Convert HTML → Markdown for summaries/docs.
- **pdf-parse** — Extract text from PDFs (statements/reports). No headless browser needed.
- **rss-parser** — Fast RSS ingestion; pair with cron + queue.

### F) Auth + Security
- **jsonwebtoken** — Sign/validate JWTs for internal service tokens (between Node sidecars and CI4).
- **helmet** — HTTP security headers if exposing express/fastify endpoints.
- **cors** — Enable CORS on Node APIs; only if public endpoints are exposed.
- **argon2** or **bcrypt** — Service-side credential hashing; prefer CI4 auth for user-facing flows.
- **rate-limiter-flexible** — Robust anti-abuse middleware; Redis option available, but memory store works if traffic is low.

### G) AI/LLM + Embeddings + Vector
*(Only if running custom Node “AI bridge” services; otherwise favor n8n’s built-in OpenAI nodes.)*
- **openai** — Official OpenAI SDK.
- **langchain** — Custom chains/outside-n8n orchestration; heavier dependency.
- **chromadb** client or **@qdrant/js-client-rest** — Vector DB integration; requires external ChromaDB/Qdrant service.
- **tiktoken** — Token estimation for cost control; install only on x64 (prebuilt binaries).
- **gpt-tokenizer** — Pure JS fallback token estimator (slower, but build-friendly on shared hosting).

### H) Database + Caching
- **mysql2** — Node ↔ MySQL integration; use when Node sidecar must read/write CI4 DB. Ensure DB credentials are scoped/readonly as needed.
- **ioredis** — Redis client for bullmq, caching, rate limits. Requires external Redis endpoint (DreamHost shared hosts may lack Redis).

### I) Observability
- **@opentelemetry/api** + Node SDK — Distributed tracing across CI4 + Node services; requires OTLP/collector endpoint (self-hosted or SaaS).
- **prom-client** — Expose Prometheus metrics for dashboards; needs scrape endpoint (Nginx location) and PM2/cron to keep service alive.

### DreamHost viability notes
- All listed packages are npm-installable without sudo. Packages needing Redis or external collectors assume managed services or external VPS. Avoid Docker-specific tooling. Keep memory footprints small due to shared-host limits.

### Minimal install set (starter, ≤10 pkgs)
- pm2, axios, express (or fastify), bottleneck, p-queue, node-cron (if you need in-Node schedules), pino, pino-pretty (dev only), openai (if doing AI bridge), mysql2 (if DB access needed).

### Expanded set (full capabilities)
- Add bullmq + ioredis, helmet, cors, jsonwebtoken, nodemailer, socket.io (or ws), langchain, tiktoken/gpt-tokenizer, sanitize-html, cheerio, rss-parser, prom-client, @opentelemetry/api, discord.js, pdf-parse, rate-limiter-flexible.

### Recommended directory layout for Node sidecars (alongside CI4 app)
- `~/mymiwallet/site/current/aiops/` — n8n + automation helpers (webhooks, queues, LLM guardrails).
- `~/mymiwallet/site/current/chat/` — Chat stack (e.g., OpenWebUI, chat relays).
- `~/mymiwallet/site/current/node-services/*` — Optional dedicated services (webhook relays, queue workers, metric exporters). Keep each service with its own `.env`, `ecosystem.config.js` for pm2, and `logs/` directory.
