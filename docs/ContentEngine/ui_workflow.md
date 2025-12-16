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
