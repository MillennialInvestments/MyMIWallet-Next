Kimi-K2 AI Integration for MyMI Wallet
======================================

This guide explains how to enable, configure, and extend the Kimi-K2 AI system across MyMI Wallet modules, including Investments, Alerts, Marketing, Budgeting, Dashboard widgets, and the Advisor suite.

## 1. Enabling Kimi-K2
1) Edit your `.env` (or `.env.example`) and set:

```
AI_ENABLE_KIMI_K2=true
KIMI_API_KEY="your_moonshot_api_key"
KIMI_API_BASE="https://api.moonshot.ai/v1"
KIMI_MODEL="kimi-k2-turbo-preview"
```

2) Clear caches so the toggle propagates:

```
php spark cache:clear
```

When enabled, AI endpoints register, Advisor routes load, and UI buttons appear automatically.

## 2. API Configuration
- The Kimi client reads `KIMI_API_KEY`, `KIMI_API_BASE`, and `KIMI_MODEL` from the environment via `App\Config\Kimi`.
- All requests use Moonshot's OpenAI-style `/chat/completions` endpoint with tool-calling support.
- If the toggle is off or the key is missing, calls throw a runtime exception.

## 3. Testing the Endpoints
- Health check (disabled state):
  - Visit `/API/AI/Chat` or any Advisor route while `AI_ENABLE_KIMI_K2=false` to receive `{ "status": "disabled" }`.
- Live chat smoke test:
  - Run `php spark tinker` and execute `service('kimiClient')->simple('ping', 'hello world');`.
- Advisor flows:
  - POST `/Advisor/generateInsight` with `user_id` to receive a markdown insight.
  - POST `/Advisor/generateStoryboard` to get a Coffee & Stocks storyboard.
  - POST `/Advisor/tradeAnalysis/{alertId}` to generate structured alert commentary.

## 4. Advisor System Overview
- **Dashboard entry:** A sidebar link to `/Advisor` appears only when Kimi is enabled.
- **AdvisorController** guards every method with `aiKimiEnabled()` and returns `{status: "disabled"}` when off.
- **Insight generation:** Combines budget, portfolio, and active alert summaries, then calls `KimiClient->chat()` for holistic guidance.
- **Storyboard:** Pulls recent `bf_marketing_scraper` news rows to craft Coffee & Stocks bulletins.
- **Trade analysis:** Ingests an alert record and returns thesis, entries/exits, stop-loss, macro forces, risk score, and alternatives.
- **Modal UX:** `dynamicModalLoader('/Advisor/generateInsight', { user_id })` loads a Summernote-enabled modal with copy/save actions.

## 5. Architecture & Module Wiring
- **Config & helper:** `App\Config\SiteSettings` exposes `enableKimiK2`; `ai_helper.php` provides `aiKimiEnabled()` for routes, controllers, and views.
- **Client:** `service('kimiClient')` (wrapper around Moonshot's `/chat/completions`) enforces the toggle and API key presence.
- **Modules:**
  - `MyMIBudget::getBudgetSummaryForAI($userId)` supplies cash flow and allocations.
  - `MyMIInvestments::getPortfolioSummaryForAI($userId)` returns positions, allocation, and risk snapshots.
  - `MyMIAlerts::getOpenAlertsSummaryForAI($userId)` provides active alert context for trade analysis.
  - `MyMIMarketing` prefers AI summaries when the toggle is on, bypassing TF-IDF.
- **Advisor endpoints:**
  - `POST /Advisor/generateInsight` → financial health, portfolio, budget, and alerts.
  - `POST /Advisor/generateStoryboard` → Coffee & Stocks storyboard from `bf_marketing_scraper` rows.
  - `POST /Advisor/tradeAnalysis/{alertId}` → thesis, entries/exits, stops, macro, risk.
- **Example responses:**
  - Disabled: `{ "status": "disabled", "message": "Kimi AI Services are currently disabled by SiteSettings." }`.
  - Successful insight: `{ "status": "ok", "content": "<markdown>", "data": { ... raw Kimi response ... } }`.

## 6. Creating Additional AI Features
- Wrap every new route, controller, button, and modal with `aiKimiEnabled()` checks.
- Use `service('kimiClient')->chat($messages, $tools, $toolChoice, $options)` to add AI-powered steps.
- Prefer markdown responses for quick rendering inside dashboards or emails.
- For Marketing, `MyMIMarketing` automatically prefers Kimi summaries when enabled (disables TF-IDF).
- For Alerts, `MyMIAlerts` upgrades Discord commentary with Kimi trade narratives when available.

## 7. Example Prompts
- Portfolio health: "Summarize my portfolio allocation and flag top 3 risks plus 2 hedging ideas."
- Budget coaching: "Review my monthly cash flow and propose a 30/50/20 adjustment."
- Alert QA: "Explain the trade thesis, entry/exit logic, and macro drivers for this alert JSON."
- Marketing: "Turn this article into 3 social bullets, 1 CTA, and a 50-word email blurb."
- Storyboard: "Draft a Coffee & Stocks storyboard with timestamps, tickers, and headlines from the latest news rows."

## 8. Troubleshooting
- **"disabled" response:** Set `AI_ENABLE_KIMI_K2=true` and clear cache.
- **No output:** Verify `KIMI_API_KEY` and network egress to `api.moonshot.ai`.
- **Slow calls:** Add Redis caching on the caller; the client supports tool outputs to reduce retries.
- **Legacy TF-IDF noise:** Ensure the toggle is on; TF-IDF is bypassed automatically when Kimi is active.

## 9. Adding New Tools
- Build tool schemas per OpenAI spec and pass them via the `$tools` argument to `KimiClient->chat()`.
- Implement the tool execution in your controller/service, then feed tool results back into follow-up messages.
- Keep tools idempotent and ensure they honor the same `aiKimiEnabled()` gate.

## 10. Extending the Advisor Module
- Add new Advisor endpoints inside the `Advisor` route group guarded by `aiKimiEnabled()`.
- Reuse `KimiClient` for:
  - **Budget drills:** ask for savings or debt payoff plans.
  - **Portfolio tilts:** request sector/asset-class rebalancing guidance.
  - **Alert hygiene:** generate stop-loss or TP adjustments for stale alerts.
- Update the dashboard modal or cards to surface the new responses, always wrapping UI in the toggle check.

## 11. MyMIMarketing AI Flows
- New endpoints (toggle-aware via `_remap`):
  - `GET /Marketing/generateKimiSummaries` → wraps `MyMIMarketing::generateSummaryWithKimi()` against recent `bf_marketing_temp_scraper` rows.
  - `GET /Marketing/generateKimiPosts` → calls `MyMIMarketing::generateSocialPostsWithKimi()` from stored summaries.
- UI buttons in Marketing dashboard (“Kimi AI Summaries”, “Kimi Social Posts”) appear only when `aiKimiEnabled()` is true and render JSON output in a panel.
- `.env` toggle: `AI_ENABLE_KIMI_K2=true` is required; without it, methods fall back to legacy summarizers.

## 12. Alerts AI Commentary
- Endpoints:
  - `GET /Alerts/generateAlertCommentary/{id}` → `MyMIAlerts::generateAlertCommentaryWithKimi()` returns thesis/risk JSON.
  - `POST /Alerts/generateAlertBatchCommentary` with `{ "ids": [1,2] }` batches commentary.
  - `GET /Alerts/generateAlertSocialCopy/{id}` → short-form social text.
- The Alerts dashboard adds a “Kimi AI Breakdown” button per alert row (modal) when Kimi is enabled.

## 13. Using /docs as Kimi’s Roadmap
- Library `App\Libraries\DocsIndex` scans `/docs` for `.md` files and extracts title/snippet.
- API endpoints:
  - `GET /API/Docs/index` → list of docs with metadata.
  - `GET /API/Docs/view?path=relative/path.md` → returns raw markdown for orchestration tools.
- Place AI-facing suggestions in `/docs/Kimi/suggestions/` (see `docs/Kimi/README.md`).