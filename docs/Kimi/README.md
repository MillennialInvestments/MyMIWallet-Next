# Kimi AI Workspace

This directory centralizes Kimi-related documentation and AI-generated suggestions.

## Suggestions Pipeline
- Endpoint: `POST /Management/saveSuggestion`
- Payload:
  ```json
  {"title": "Short recommendation", "body": "Markdown body", "category": "marketing|alerts|engine|docs|..."}
  ```
- Backend helper: `App\Libraries\KimiSuggestions::saveSuggestion()` stores files under `docs/Kimi/suggestions/` using a timestamped slug.
- Access is admin-gated via `ManagementController::_remap` and `guardAdmin()`.

## Reviewing Suggestions
1. Pull new markdown files from `docs/Kimi/suggestions/`.
2. Promote accepted ideas into `/docs` or tickets.
3. Clean up stale suggestions after incorporation.

## Docs Index API
- `GET /API/Docs/index` lists all markdown files under `/docs` with titles/snippets.
- `GET /API/Docs/view?path=relative/path.md` returns the markdown content for AI agents.
- Powered by `App\Libraries\DocsIndex`.
