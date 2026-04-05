# Ollama Centralized Integration (Secondary/Fallback Infra)

## Architecture
Ollama is configured in remote-first mode for centralized infrastructure, with optional same-server internal fallback.

- Primary direct endpoint when needed: `https://ollama.timothyburks.com`
- Internal fallback endpoint: `http://127.0.0.1:11434`

## Required Environment Variables

```dotenv
OLLAMA_MODE=remote
OLLAMA_BASE_URL=https://ollama.timothyburks.com
OLLAMA_INTERNAL_BASE_URL=http://127.0.0.1:11434
OLLAMA_DEFAULT_CHAT_MODEL=qwen2.5-coder:0.5b
OLLAMA_DEFAULT_EMBED_MODEL=mxbai-embed-large:latest
OLLAMA_TIMEOUT=180
OLLAMA_MAX_TOKENS=100
```

## Config Resolution
`Config\\Ollama::getResolvedBaseUrl(bool $preferInternal = false)` resolves endpoint selection:

- `preferInternal=true` => use `OLLAMA_INTERNAL_BASE_URL` when present.
- `OLLAMA_MODE=local` => use internal base URL by default.
- otherwise => use `OLLAMA_BASE_URL`.

## CLI/Spark Guidance
- Same-server Spark jobs can use `--prefer-internal=1` and now default to preferring internal URL in `ollama:run`.
- For centralized-only execution, explicitly pass `--prefer-internal=0`.

## Logging Guidance
Debug logs include resolved URL, model, timeout, and token budget. Secrets are not logged.
