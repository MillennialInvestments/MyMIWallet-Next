# AIOps / Ollama Task: Marketing Distribution & Zapier Orchestration Phase 2

## Objective

Build the next phase after Community Marketing Phase 1.

Create a safe, draft-only distribution orchestration layer that moves approved MyMI Wallet social/community content into a Zapier-ready and TBI Marketing-ready workflow.

## Required Flow

MyMI Wallet generated drafts
→ approval queue
→ export job
→ TBI Marketing queue
→ Zapier webhook payload
→ external platform workflow
→ Discord/community/website funnel tracking

## Required Database Tables

Create migration(s) for:

1. bf_social_webhooks
- id
- webhook_key
- display_name
- platform_key
- webhook_url_env_key
- enabled
- approval_required
- payload_template_json
- created_at
- updated_at

2. bf_social_export_jobs
- id
- generated_post_id
- destination_type: zapier|tbi_marketing|manual_json
- destination_key
- payload_json
- status: draft|approved|queued|sent|failed|skipped
- attempts
- last_error
- sent_at
- created_at
- updated_at

3. bf_social_delivery_logs
- id
- export_job_id
- generated_post_id
- platform_key
- destination_type
- status
- request_payload_hash
- response_code
- response_body_excerpt
- error
- created_at

4. bf_social_performance_events
- id
- generated_post_id
- platform_key
- event_type: impression|click|join|registration|upgrade|revenue
- event_value
- metadata_json
- occurred_at
- created_at

## Required Config

Add safe config/env placeholders only.

Do not hardcode secrets.

Expected env keys:

- ZAPIER_COMMUNITY_WEBHOOK_URL
- TBI_MARKETING_API_BASE
- TBI_MARKETING_API_KEY
- MYMI_MARKETING_EXPORT_ENABLED=false
- MYMI_ZAPIER_EXPORT_ENABLED=false

## Required Services

Create or update:

1. SocialExportService
- createExportJobFromGeneratedPost(int $generatedPostId, string $destinationType)
- buildZapierPayload(array $generatedPost): array
- buildTbiMarketingPayload(array $generatedPost): array
- queueApprovedDrafts(int $limit = 25): array
- markSent(int $jobId, array $response): bool
- markFailed(int $jobId, string $error): bool

2. ZapierWebhookService
- send(int $exportJobId): array
- must not send unless enabled config is true
- must not send unless status is approved or queued
- must log every attempt

3. TbiMarketingExportService
- exportApprovedDraft(int $generatedPostId): array
- batchExportApprovedDrafts(int $limit = 25): array
- must use config/env placeholders
- must fail closed if missing URL/key

## Required API Endpoints

Add API endpoints:

- GET/POST API/Management/createSocialExportJob/(:num)
- GET/POST API/Management/queueApprovedSocialExports
- GET/POST API/Management/sendZapierExport/(:num)
- GET/POST API/Management/sendTbiMarketingExport/(:num)
- GET API/Management/getSocialExportJobs
- GET API/Management/getSocialDeliveryLogs
- GET/POST API/Management/recordSocialPerformanceEvent

## Required Spark Commands

Create commands:

1. php spark marketing:social:export-approved
- queues export jobs for approved generated posts

2. php spark marketing:social:zapier-dispatch
- sends queued Zapier jobs only when enabled

3. php spark marketing:social:tbi-export
- sends approved content to TBI Marketing only when enabled

4. php spark marketing:social:orchestration-smoke-test
- validates Phase 2

## Required Docs

Create:

- docs/integrations/zapier/community_marketing_zapier_strategy.md
- docs/integrations/zapier/payload_contract.md
- docs/integrations/zapier/zapier_setup_checklist.md
- docs/integrations/tbi-marketing/mymiwallet_to_tbi_marketing_contract.md
- docs/integrations/tbi-marketing/status_sync_strategy.md
- docs/_aiops/reports/marketing-zapier-orchestration-phase2-report.md

## Safety Rules

- No external post is sent automatically.
- Zapier dispatch is disabled by default.
- TBI Marketing export is disabled by default.
- Every outbound request must require enabled config.
- Every outbound request must be logged.
- Missing secrets must fail closed.
- Approved/draft status must be enforced.
- Do not break current Community Marketing Phase 1.
- Do not remove existing marketing distribution features.

## Validation

Run:

- php -l on changed PHP files
- php spark migrate
- php spark routes
- php spark marketing:communities:smoke-test
- php spark marketing:social:orchestration-smoke-test
- php spark revenue:scan

Report PASS/FAIL, changed files, and remaining gaps.
