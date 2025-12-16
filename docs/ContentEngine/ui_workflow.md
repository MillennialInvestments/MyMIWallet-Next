# Management UI workflow

Location: `Management` dashboard block rendered via `app/Modules/Management/Views/index.php` → `ContentEngine/index.php` view.

Features:
- Latest ingests list (id, scan name, quote time, status, row count, tier counts).
- `Generate Drafts` button: POST `/API/ContentEngine/processIngest/{id}`.
- `Preview Drafts` button: opens modal `Management/ContentEngine/previewPost/{postId}` using `dynamicModalLoader`.
- Tier tabs (Tier1/Tier2/Tier3/Avoid) fetch `/API/ContentEngine/topIdeas` to show scores and reasons.
- Global buttons: `Generate Drafts` for latest ingest and `Run Daily (CRON)` to POST `/API/ContentEngine/runDaily`.

Templates reside in `app/Libraries/ContentEngine/templates/*.php`; modal view is `app/Modules/Management/Views/ContentEngine/modals/post_preview.php`.
