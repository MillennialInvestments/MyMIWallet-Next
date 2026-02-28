# Temporary Patch Artifact - Ollama Patch Pipeline Fallback

This artifact tracks the fallback behavior for empty/invalid Ollama patch output:
- Raw model outputs are persisted under `docs/_aiops/debug/`.
- Structured fallback plan is persisted under `docs/_aiops/patch_jobs_failed/`.
