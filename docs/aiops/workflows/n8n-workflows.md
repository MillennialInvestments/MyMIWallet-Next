# n8n Workflows

## Gap Tracker Sync
- **Trigger:** `POST {AI_N8N_WEBHOOK_GAP_SYNC}`
- **Payload:**
```json
{
  "jobKey": "gap_sync",
  "subsystem": "selfhost_gap_sync",
  "userId": 123,
  "requestedAt": "2025-01-01T12:00:00Z",
  "signature": "sha256=...",
  "context": {"limit": 25, "priority": "P1"}
}
```
- **Result Webhook:** `POST /API/AiOps/receiveResult`
- **Notes:** calls spark `gap:sync` via `tools/aiops/run_gap_sync.sh`, attaches report path, and returns runtime stats.

## Marketing Draft Generator
- **Trigger:** `POST {AI_N8N_WEBHOOK_MARKETING_DRAFTS}`
- **Payload:**
```json
{
  "jobKey": "marketing_drafts",
  "subsystem": "selfhost_marketing_drafts",
  "userId": 123,
  "requestedAt": "2025-01-01T12:00:00Z",
  "signature": "sha256=...",
  "context": {"campaign": "product-update"}
}
```
- **Result Webhook:** `POST /API/AiOps/receiveResult`
- **Notes:** may call Ollama via `OllamaClient` for draft generation; still manually approved.

## PR Review Helper
- **Trigger:** `POST {AI_N8N_WEBHOOK_PR_REVIEW}`
- **Payload:**
```json
{
  "jobKey": "pr_review",
  "subsystem": "selfhost_pr_review",
  "userId": 123,
  "requestedAt": "2025-01-01T12:00:00Z",
  "signature": "sha256=...",
  "context": {"repo": "MyMIWallet", "branch": "feature/foo"}
}
```
- **Result Webhook:** `POST /API/AiOps/receiveResult`
- **Notes:** respects `aiGithubReviewEnabled` toggle and caps before execution.
