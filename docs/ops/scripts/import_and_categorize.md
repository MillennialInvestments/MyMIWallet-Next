# import_and_categorize.js

## Purpose
Process ChatGPT conversation exports into categorized Markdown task files using TF-IDF keywords and embedding similarity.

## How to run
- `node scripts/import_and_categorize.js ./chatgpt-export/conversations.json`

## Inputs / outputs
- **Inputs**: Positional path to `conversations.json` (defaults to `./chatgpt-export/conversations.json`).
- **Outputs**: Markdown files under `docs/categorized/<category>/`; updates/creates `docs/processed_index.json`.

## Dependencies
- Node.js (ESM). Packages: `slugify`, `natural`, `@xenova/transformers` (downloads model on first run).

## Risks found
- No CLI help; long model download may exceed operator expectations.
- No timeout or retry around embedding downloads; process may hang on network issues.
- Writes processed index without locking—parallel runs could corrupt state.

## Suggested improvements
- Add `--help`, `--model-cache`, and `--limit` flags plus progress logging for downloads.
- Implement file lock or temp-file swap when writing `processed_index.json`.
- Provide `--dry-run` to inspect categories without writing files.

## Proposed patch summary
- Add argument parser (yargs) for options, include graceful handling of missing dependencies, and wrap writes via atomic rename.
- Emit summary counts and skipped conversations for quick verification.

## Owner Notes
- Requires network for first-time model pull; ensure DreamHost allows outbound HTTPS. Avoid running concurrently.
