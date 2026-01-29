# Next Steps

✅ Current Status Snapshot (2026-03-15T12:00:00Z)
- Environment: production (example-host)

🔥 P0 (Must fix now)

- None.

⚠️ P1 (Fix this week)

- **Update ops:work pipeline logging** (`ops`)
  - Add bf_aiops_task_runs logging for every worker execution.
  - Evidence: app/Commands/OpsWork.php

🧹 P2 (Cleanup/backlog)

- **Add chat env template CI validation** (`ops`)
  - Ensure staging/prod templates include all required keys.
  - Evidence: scripts/ci/check-chat-env.sh

🧠 AI Work Queue (things your worker can do safely)

- Add chat env template CI validation (codex)

📌 Copy/paste prompts for ChatGPT

**Update ops:work pipeline logging**
```
Summarize the missing logging requirements for ops:work and propose a safe patch plan.
```

🤖 Copy/paste prompts for Codex

**Add chat env template CI validation**
```
Add a CI script to validate chat env template keys and document the required keys.
```

✅ Completion checklist

- [ ] Update ops:work pipeline logging (P1)
- [ ] Add chat env template CI validation (P2)

Snapshot JSON: docs/next/snapshots/issues-2026-03-15.json
