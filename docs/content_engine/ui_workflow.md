# Management UI workflow

Location: `Management` dashboard block rendered via `app/Modules/Management/Views/index.php` → `ContentEngine/index.php` view.

Features:
- Latest ingests list (id, scan name, quote time, status, row count, tier counts).
- `Generate Drafts` button: POST `/API/ContentEngine/processIngest/{id}`.
- `Preview Drafts` button: opens modal `Management/ContentEngine/previewPost/{postId}` using `dynamicModalLoader`.
- Tier tabs (Tier1/Tier2/Tier3/Avoid) fetch `/API/ContentEngine/topIdeas` to show scores and reasons.
- Global buttons: `Generate Drafts` for latest ingest and `Run Daily (CRON)` to POST `/API/ContentEngine/runDaily`.

Templates reside in `app/Libraries/ContentEngine/templates/*.php`; modal view is `app/Modules/Management/Views/ContentEngine/modals/post_preview.php`.

# UI Workflow

The Management dashboard (`/Management`) embeds the **Daily Scanner Content** card:

1. Lists latest ingests with status, row count, and tier counts.
2. Buttons:
   - **Generate Drafts** → `/API/ContentEngine/processIngest/{id}`
   - **Run Daily (CRON)** → `/API/ContentEngine/runDaily`
   - **Preview Drafts** → `/Management/ContentEngine/previewPost/{postId}` via `dynamicModalLoader()` when available.
3. Tier tabs load ideas with `/API/ContentEngine/topIdeas?ingest_id={id}&tier={tier}`.
4. Approve/Send actions call the API routes listed in `api_endpoints.md`.

Modal preview view: `app/Modules/Management/Views/ContentEngine/modals/post_preview.php` renders the draft payload + idea metadata for QA.