# Ollama Spark Command Catalog

This command family provides operator-grade Ollama control for CI4 Spark.

## Global options

Each command supports `--json=1`, `--timeout=30`, and `--base-url=http://127.0.0.1:11434`.
Destructive or state-changing commands also support `--dry-run=1` where meaningful.

Structured exit codes:

- `0` ok
- `10` warning
- `20` error
- `30` critical

## Implemented commands

### Connectivity / Diagnostics
- `php spark ollama:health --json=1`
- `php spark ollama:version --json=1`
- `php spark ollama:ping --retries=3 --sleep-ms=250 --json=1`
- `php spark ollama:diagnose --json=1 --include-env=1`

### Model lifecycle
- `php spark ollama:models:list --json=1`
- `php spark ollama:models:show llama3.2:latest --json=1`
- `php spark ollama:models:pull llama3.2:latest --json=1 --progress=1`
- `php spark ollama:models:rm llama3.2:latest --force=1 --json=1`
- `php spark ollama:models:prune --keep=llama3.2:latest,mxbai-embed-large:latest --json=1`
- `php spark ollama:models:ensure --profile=aiops --json=1`

### Inference
- `php spark ollama:generate --model=llama3.2:latest --prompt="ping" --json=1`
- `php spark ollama:chat --model=llama3.2:latest --session=abc123 --system="You are concise" --user="hello" --save-session=1 --json=1`
- `php spark ollama:embed --model=mxbai-embed-large:latest --input="hello" --json=1`

### Queue / policy / docs
- `php spark ollama:queue:push --type=generate --model=llama3.2:latest --payload-file=writable/ollama/payload.json --json=1`
- `php spark ollama:queue:work --once --json=1`
- `php spark ollama:queue:stats --json=1`
- `php spark ollama:policy:check --profile=aiops --json=1`
- `php spark ollama:docs:sync --profile=aiops --json=1`

## How to test

1. `php spark ollama:health --json=1`
2. `php spark ollama:models:list --json=1`
3. `php spark ollama:generate --model=llama3.2:latest --prompt="ping" --json=1`
4. `php spark ollama:queue:push ...` then `php spark ollama:queue:work --once`
5. `php spark ollama:docs:sync`
