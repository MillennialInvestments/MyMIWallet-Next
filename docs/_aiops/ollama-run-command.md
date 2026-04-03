# `ollama:run` Spark Command

`ollama:run` executes a prompt file against the local Ollama HTTP API and writes patch-job artifacts for AIOps workflows.

## Command

```bash
php spark ollama:run --file="./docs/_aiops/patch_jobs/20260403-104539-ingest-18/ollama_prompt.md"
```

## Supported Flags

- `--file="..."` Prompt file path.
- `--job-dir="..."` Patch-job directory. If `--file` is omitted, prompt defaults to `{job-dir}/ollama_prompt.md`.
- `--model="llama3.2:latest"` Override model. Defaults to `Config\Ollama::$defaultChatModel`.
- `--output="..."` Response output path. Defaults to prompt directory + `ollama_response.md`.
- `--profile="aiops"` Governance profile override.
- `--format="markdown"` Output format (currently markdown only).
- `--timeout=180` Request timeout in seconds.
- `--overwrite=1` Allow replacing existing output file.
- `--system="You are a repository patch planning assistant."` Optional Ollama system prompt.

## Output Files

Each run writes artifacts into the prompt/job directory:

- `ollama_response.md`
- `ollama_run.json`

Markdown structure:

```markdown
# Ollama Response

- Model: llama3.2:latest
- Profile: aiops
- Prompt File: ./docs/_aiops/patch_jobs/20260403-104539-ingest-18/ollama_prompt.md
- Generated At: 2026-04-03 10:45:39

---

[raw model response]
```

JSON sidecar captures run metadata including:

- command/profile/model/base URL
- prompt/output file paths
- timestamps and duration
- prompt/response SHA1
- response length
- Ollama metrics (`total_duration`, `load_duration`, `prompt_eval_count`, `eval_count`)
- `error_message` (null on success)

## Patch-Job Directory Convention

```text
docs/_aiops/patch_jobs/{job-id}/
  ollama_prompt.md
  ollama_response.md
  ollama_run.json
  codex_instructions.md
  patch_plan.md
```

## Governance Behavior

Profile resolution order:

1. `--profile`
2. `Config\Ollama::$governanceProfile`
3. fallback `default`

The resolved profile is validated in `Config\Ollama::$profiles`:

- requested model must exist in `allowed_models`
- token output is capped by profile `max_tokens`
- if `pii_redaction` is enabled, a placeholder redaction hook is invoked
- if `require_logging` is enabled, sidecar logging is forced

## Failure Modes

`ollama:run` exits non-zero and prints concise CLI errors for:

- missing/unreadable/empty prompt file
- missing governance profile
- model not allowed by profile
- Ollama unreachable
- non-200 API response
- invalid JSON response
- missing `response` in API payload
- output exists without `--overwrite=1`

When possible, `ollama_run.json` is still written on failure with `success=false`.

## Examples

Standard:

```bash
php spark ollama:run --file="./docs/_aiops/patch_jobs/20260403-104539-ingest-18/ollama_prompt.md"
```

Explicit model + output:

```bash
php spark ollama:run \
  --file="./docs/_aiops/patch_jobs/20260403-104539-ingest-18/ollama_prompt.md" \
  --model="llama3.2:latest" \
  --output="./docs/_aiops/patch_jobs/20260403-104539-ingest-18/ollama_response.md"
```

Job-dir based:

```bash
php spark ollama:run \
  --job-dir="./docs/_aiops/patch_jobs/20260403-104539-ingest-18" \
  --profile="aiops"
```
