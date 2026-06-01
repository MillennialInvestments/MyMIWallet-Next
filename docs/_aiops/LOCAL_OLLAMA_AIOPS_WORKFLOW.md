# Local Ollama AIOps Workflow

Use this workflow for all manual AIOps/Ollama instruction runs across MyMI Wallet and managed repositories.

## Required environment

```bash
export OLLAMA_MODE=local
export OLLAMA_BASE_URL=http://127.0.0.1:11434
export OLLAMA_INTERNAL_BASE_URL=http://127.0.0.1:11434
export OLLAMA_ENDPOINT=http://127.0.0.1:11434/api/generate
export OLLAMA_MODEL=qwen2.5-coder:1.5b
export OLLAMA_DEFAULT_CHAT_MODEL=qwen2.5-coder:1.5b
export OLLAMA_TIMEOUT=180
export OLLAMA_TIMEOUT_SECONDS=180
export OLLAMA_TOKEN_LIMIT=4096
export OLLAMA_MEMORY_LIMIT_MB=512
Standard run command
docs/_aiops/bin/aiops_ollama_run_instruction.sh docs/_aiops/instructions/YOUR-INSTRUCTION.md HIGH
Rules
Use local Ollama by default.
Use absolute instruction paths internally.
Create fresh run copies under docs/_aiops/instructions/runs.
Write large outputs to docs/_aiops/reports/aiops-runner.
Keep terminal output short.
Never commit writable/logs.
Clean generated docs/report noise before committing.
If aiops:ingest reports duplicate or near-duplicate and the worker has no runnable jobs, create a fresh instruction copy or patch ingest with a force-rerun option.
If a task modifies AIOps itself, the worker may block it as recursive. In that case, use Codex/manual review or a deterministic patch.
