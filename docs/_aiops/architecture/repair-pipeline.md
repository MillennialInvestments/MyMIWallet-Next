# Repair Pipeline

`aiops:repair:run` executes the ungated repair path.

`aiops:repair:run_safe` executes:
- observability gates
- patch validation and hallucination checks
- rollback branch safety
- final PR handoff
