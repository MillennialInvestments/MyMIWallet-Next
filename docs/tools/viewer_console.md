# Management Viewer Console

## Purpose
Unified admin-only console for previewing CodeIgniter views, static assets, pasted snippets, and inspecting HTTP APIs. All endpoints require admin auth, CSRF, and rate limits.

## Routes
- `GET /Management/Viewer` – UI
- `GET /Management/Viewer/list` – allowlisted file listing
- `POST /Management/Viewer/preview` – preview file or pasted content (safe/trusted)
- `POST /Management/Viewer/request` – API inspector (allowlisted hosts only)
- `POST /Management/Viewer/snapshots/save` – store snapshot to `bf_viewer_snapshots`
- `GET /Management/Viewer/snapshots/{id}` – load snapshot

## Security & Constraints
- Admin-only routes guarded by `role:admin` filter.
- CSRF required on POSTs.
- Rate limits: previews (30/min per user/IP), requests (10/min per user/IP).
- Path rules: no traversal, null bytes, or stream wrappers. Only these roots are allowed:
  - `APPPATH/Views/`
  - `ROOTPATH/themes/public/`
  - `APPPATH/Modules/*/Views/` (safe mode only; trusted render limited to app/views + themes)
- File size limit: 512 KB per preview.
- Safe mode strips PHP tags for PHP content and skips execution.
- Trusted mode renders CI views only when rooted in allowlisted view paths.
- API inspector only allows configured hosts (base URL + selected external APIs). Responses are truncated to 1MB.
- Snapshots are stored for audit/history; table SQL in `docs/sql/bf_viewer_snapshots.md`.

## Preview Behavior
Inputs: `source_type` (file|paste), `content_type` (html|view|css|js|json|md|txt|php|py|sql), `preview_mode` (safe|trusted), `file_path` or `content`, optional `options` JSON (strip_php, sandbox, highlight).
Outputs: `render_type` (iframe|code), `html` or `code`, `meta` (resolved path, bytes, warnings).

## API Inspector
Inputs: method, url, headers_json, body_raw, auth_type, bearer_token, timeout_ms, follow_redirects.
Outputs: request metadata, response status/headers/body (with pretty JSON when possible), generated cURL command, truncation warning.

## Formatter
Client-side helpers for JSON pretty, basic HTML indent, and SQL whitespace normalization. Use the Formatter tab when you only need local formatting.
