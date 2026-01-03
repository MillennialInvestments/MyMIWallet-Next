# n8n Workflows for AIOps Guardrails

> CI4 handles validation, dedupe, caching, budgeting, and persistence. n8n orchestrates retries, routing, and scheduling. All LLM calls must be gated by CI4’s policy check.

## Shared conventions

- **Endpoints:** `/API/AIOps/health`, `/policy/check`, `/usage/log`, `/cache/store`, `/cache/get`, `/toggle`, `/test/policy`.
- **request_id:** Always propagate the `request_id` returned by `policy/check` through every node and into usage/log + cache/store calls.
- **cache_key:** Computed by CI4; on `CACHE_HIT`, route to the cached-path without LLM calls.
- **Budget handling:** If `reason` is `HARD_STOP`, skip LLM and optionally notify operators.

## Workflow 1: “AIOPS - Guarded LLM Call Template”

**Nodes (in order)**
1. **Trigger** (Webhook/Cron/Manual)
2. **HTTP Request → CI4**  
   - `POST /API/AIOps/policy/check` with payload:  
     ```json
     {
       "workflow_slug": "<slug>",
       "subsystem": "<subsystem>",
       "source_type": "<type>",
       "title": "...",
       "content": "...",
       "source_id": "<id>",
       "cache_scope": "summary:email"
     }
     ```
3. **IF node**  
   - If `allowed != true`: stop or route to “blocked” handler.  
   - If `reason == CACHE_HIT`: route to “use cached payload”.
4. **LLM Node** (only inside allowed path)  
   - Uses the input content.  
   - Carries `request_id` and `cache_key` forward.
5. **HTTP Request → CI4 usage log**  
   - `POST /API/AIOps/usage/log` with the `request_id`, provider/model/tokens/cost, workflow/subsystem, and `meta`.
6. **HTTP Request → CI4 cache store**  
   - `POST /API/AIOps/cache/store` with `cache_key`, `scope`, `source_hash`, payload, and `ttl_seconds`.
7. **HTTP Request → CI4 downstream storage**  
   - Call existing CI4 endpoints to persist final artifacts (e.g., marketing tables, alert tables).

**Cache hit handling**
- When `CACHE_HIT`, use `cache_key` + returned payload to bypass LLM and continue to storage/logging as needed.

## Workflow 2: “Marketing - Daily Digest (guarded)”

- **Trigger:** Cron (hourly/daily).
- **Fetch candidates:** `GET /API/Marketing/candidates?limit=25` (or existing CI4 marketing fetch endpoint).
- **Loop:** For each record:
  - Call the **Guarded LLM Call Template** with:
    ```json
    {
      "workflow_slug": "marketing_daily_digest",
      "subsystem": "marketing",
      "source_type": "email",
      "title": "<email subject>",
      "content": "<email body>",
      "source_id": "<email id>",
      "cache_scope": "summary:email"
    }
    ```
- **On cache hit:** Reuse cached summary/keywords.
- **On hard stop:** Skip LLM and log/alert.

## Workflow 3: “Alerts - Rate-Limited Enrichment”

- **Trigger:** CI4 webhook or cron batch.
- **Queue source:** CI4 endpoint supplies batch of alerts to enrich.
- **Guard:** Call `policy/check` per alert with `subsystem=alerts`, `source_type=alert`.
- **LLM path:** Only when allowed; then log usage and cache/store results.
- **Hard stop:** Skip enrichment and push to retry queue or notify ops.

## Workflow 4: “Ops - Error Escalation”

- **Trigger:** Webhook from CI4 on severe error.
- **Guard:** Optional policy check to ensure budget adherence.
- **Routes:** Notify via email/Discord/Zapier depending on severity; LLM steps (e.g., summarization) only allowed when policy check passes.

## Request/response mapping

- **request_id propagation:** From `policy/check` → LLM node → `usage/log` → `cache/store` → downstream persistence.
- **cache_key usage:** Use `cache_key` from policy response; on cache hit, skip LLM and call downstream storage directly with cached payload.
- **Dedupe handling:** If `reason=DEDUPED`, stop processing or mark record as already handled.
- **Hard stop handling:** Route to an ops notification node and stop LLM.

## Example payloads

- **Policy check:**  
  ```json
  {
    "workflow_slug": "alerts_enrichment",
    "subsystem": "alerts",
    "source_type": "news",
    "title": "Tesla beats earnings expectations",
    "content": "Full article text...",
    "source_id": "news-123",
    "cache_scope": "summary:marketaux"
  }
  ```
- **Usage log:**  
  ```json
  {
    "request_id": "<from policy>",
    "provider": "openai",
    "model": "gpt-4.1-mini",
    "tokens_in": 900,
    "tokens_out": 200,
    "cost_est": 0.0075,
    "workflow_slug": "alerts_enrichment",
    "subsystem": "alerts",
    "meta": { "latency_ms": 1800 }
  }
  ```
- **Cache store:**  
  ```json
  {
    "cache_key": "<from policy>",
    "scope": "summary:marketaux",
    "source_hash": "<content_hash>",
    "payload": { "summary": "...", "keywords": ["tsla", "earnings"] },
    "ttl_seconds": 43200
  }
  ```

## What to do on cache/stop conditions

- **CACHE_HIT:** Use cached payload; skip LLM; still persist downstream if needed.
- **DEDUPED:** Stop or mark record as handled.
- **HARD_STOP:** Stop LLM; notify ops; optionally reschedule after budget reset.
- **DISABLED:** Stop; notify operators to re-enable `aiops_enabled`/`aiops_llm_enabled`.

## Observability

- CI4 `health` endpoint returns toggle states and today’s budget snapshot.
- n8n should surface `reason` codes in its runs for quick triage.
- Alert email fires once per day at 80% budget utilization.
