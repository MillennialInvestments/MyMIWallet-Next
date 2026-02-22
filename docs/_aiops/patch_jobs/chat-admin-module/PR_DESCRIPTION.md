# Chat Admin Module Patch

## Included Changes
- Added `ChatAdminController` with admin auth checks, CSRF-backed POST flow, response JSON, and 5-second throttle.
- Added reusable `ChatIngestService` for emoji stripping, whitespace normalization, ingest execution, and instruction ID parsing.
- Added `AIOpsChatAdminModel` for optional chat persistence.
- Added migration `CreateAiopsChatAdminTable` for `bf_aiops_chat_admin`.
- Added management admin UI at `app/Modules/Management/Views/admin/chat.php`.
- Injected routes under existing `Management -> Admin` group:
  - `GET Management/Admin/Chat`
  - `POST Management/Admin/Chat/submit`
  - `GET Management/Admin/Chat/history`

## Security Controls
- Admin-only route protection (`permission:admin.access` + controller check)
- CSRF token field on form
- Output displayed as JSON text in `<pre>` block
- Basic 5-second session throttle
- Error logging fallback into `bf_error_logs`

## Validation Checklist
- `php spark routes` should include the new Management/Admin/Chat endpoints.
- Emoji-heavy submissions should be sanitized before ingest.
- Ingest output and parsed instruction ID are returned as JSON.
