# scripts/import_and_categorize.js

## Purpose
Auto-categorize exported ChatGPT conversations into markdown files grouped by topic, embedding simple task lists and keyword summaries.

## How to run
```bash
node scripts/import_and_categorize.js ./chatgpt-export/conversations.json
```

## Inputs/Outputs
- **Inputs**: Path to `conversations.json` export (default `./chatgpt-export/conversations.json`).
- **Outputs**: Markdown files written to `docs/categorized/<category>/` and an updated `docs/processed_index.json`.
- **Exit codes**: Exits 1 on errors; 0 on success. Logs each created file.

## Dependencies
- Node.js runtime (ESM). Required packages: `slugify`, `natural`, `@xenova/transformers` (downloads model weights on first run), built-in `fs/path`.

## Risks found
- No shebang or help text; must be invoked with `node` explicitly.
- Downloads transformer model at runtime; can be slow or blocked on restricted hosts.
- Uses process-wide memory for embeddings; large exports may exhaust memory on small VPS instances.
- No rate limiting or retry when reading/writing many files.

## Suggested improvements
- Add CLI help with flags for `--input`, `--output-root`, and `--model` to allow offline/local model paths.
- Add progress logging, simple batching, and a max-file limit to protect memory/CPU on shared hosts.
- Detect missing dependencies early with a friendly message and exit code.

## Proposed patch summary
- Switch to `commander` or manual `yargs` parsing for flags + help, plus sanity checks on input size.
- Accept `TRANSFORMERS_CACHE`/`MODEL_PATH` envs to reuse cached models and avoid network pulls.

## Owner Notes
- Consider running on a workstation first to warm the model cache, then copy outputs to the repo to avoid heavy compute on DreamHost.
