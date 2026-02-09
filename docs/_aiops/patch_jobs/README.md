# AIOPS Patch Job Format

All patch jobs consumed by `OllamaPatchRunner` must use this structure:

```md
# PATCH JOB
ID: 2026-02-09-001

## TARGET FILES
- app/Services/EventTracker.php
- app/Controllers/AuthController.php

## CONSTRAINTS
- Output unified diff only
- Do not modify files not listed
- Do not add new dependencies
- Do not change method signatures

## INSTRUCTIONS
<explicit step-by-step change instructions written by AIOPS>
```

Only `## CONSTRAINTS` and `## INSTRUCTIONS` content is forwarded to Ollama.
