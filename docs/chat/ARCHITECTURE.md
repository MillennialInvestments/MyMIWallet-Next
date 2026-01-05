# Chat Architecture

## Current state
- Express server in `/chat/server.js` serves static UI, rate limiting, cost controls, and `/api/chat` for LLM responses.
- UI in `/chat/public` posts chat payloads and renders streaming messages.
- CI4 is upstream authority for authentication and premium access; Node never reads MySQL directly.

## Target state (dual-mode)
- **User mode (/u):** Personalized budgeting, portfolio overview, premium trade alerts, and market Q&A. Tool calls are proxied to CI4.
- **Management mode (/m):** RBAC-guarded operations (ops status, latest errors, cron trigger). CI4 enforces admin/ops/manager roles before any action.
- **Shared flows:** All privileged calls go through CI4 controllers; Node only orchestrates and renders responses.

## Auth flow
1. Browser loads `/m` or `/u` → UI calls `GET /api/me`.
2. `/api/me` proxies to CI4 `GET /API/Chat/me`, forwarding `Authorization` + cookies.
3. CI4 returns `{status,data:{userId,roles[],tier}}` or 401. Management UI is blocked without admin/ops/manager.

## Data flow (Node ↔ CI4)
- LLM chat: UI sends `{messages:[...]}` → `/api/chat` → provider (OpenAI/Ollama) → reply stored only in memory.
- Tool chat: UI sends `{mode,tool,message?,context?}` → `/api/chat` → `POST {CI4_BASE_URL}{CI4_TOOL_ENDPOINT}` → CI4 executes tool, applies RBAC/tier gates, logs audit row, and returns JSON.
- Node logs every proxy failure to `chat/logs/chat.log`; CI4 logs every tool invocation to `bf_chat_tool_runs`.

## Premium gating design
- CI4 `ChatController::tool` enforces premium tiers for `trade_alerts` (requires BASIC/PREMIUM/GOLD).
- Management mode checks roles admin/ops/manager before any tool runs.
- Node never bypasses these checks; it simply forwards auth headers/cookies.

## Tool registry concept
- User tools: `budget_snapshot`, `portfolio_overview`, `trade_alerts` (premium), `market_question` (ticker/range context).
- Management tools: `ops_status`, `latest_errors`, `run_cron` (ack only; actual cron dispatch remains whitelisted).
- Registry lives in `ChatController::dispatchTool` and is documented in `docs/chat/CI4_INTEGRATION.md`.
