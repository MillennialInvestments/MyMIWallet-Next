# GT-001D-A1 Marketing Owner Decisions

## Objective

Document owner decisions for Marketing API routes that require confirmation before guard implementation.

This slice is documentation-only. It does not edit routes, controllers, filters, policies, or production behavior.

## Baseline

GT-001D-A classified 192 Marketing API_TOKEN backlog routes:

- 115 MUTATION_API_TOKEN_CANDIDATE
- 57 READ_API_TOKEN_CANDIDATE
- 11 OWNER_REVIEW_REQUIRED
- 9 HIGH_RISK_MUTATION_API_TOKEN_CANDIDATE

## Owner Decision Rule

All listed Marketing routes are non-public API routes. Until proven otherwise, they should not be treated as public website endpoints.

Recommended owner policy:

1. OWNER_REVIEW_REQUIRED routes require explicit owner confirmation before route edits.
2. HIGH_RISK_MUTATION_API_TOKEN_CANDIDATE routes require API-token protection plus owner review before route edits.
3. GET routes that create, save, reject, schedule, or mutate state must be treated as mutation routes even if the HTTP verb is GET.
4. DELETE routes are high-risk mutation routes.
5. No public route exception is approved in this slice.

## Proposed Route Decision Buckets

### Owner-review reads / ambiguous operations

These require owner confirmation before choosing final guard behavior:

- API/Marketing/getVideoQueue
- API/Marketing/getTemplates
- API/Marketing/saveTemplate
- API/Marketing/Campaigns
- API/Marketing/scheduleNewsletters
- API/Marketing/Email-Templates/create
- API/Marketing/Email-Queue
- API/Marketing/Email-Queue/create
- API/Marketing/getPlatforms
- API/Marketing/getPlatformRules/([^/]+)
- API/Marketing/listSuggestions/([^/]+)/([^/]+)

### High-risk mutation routes

These should receive API-token guard treatment after owner approval:

- API/Marketing/Reject-Content/([0-9]+)
- API/Marketing/archiveVideoContent/([0-9]+)
- API/Marketing/rejectBufferItem/([0-9]+)
- API/Marketing/deleteScrape/([0-9]+)
- API/Marketing/deleteTemplate/([0-9]+)
- API/Marketing/deletePlatform/([0-9]+)
- API/Marketing/deletePlatformRule/([0-9]+)
- API/Marketing/deleteTaxonomy/([0-9]+)
- API/Marketing/deleteSuggestion/([0-9]+)

## Approved Next Implementation Slices

After this document is approved:

- GT-001D-A2: apply high-risk Marketing mutation API-token guards.
- GT-001D-A3: apply owner-approved Marketing read/ambiguous API-token guards.
- GT-001D-A4: rerun Marketing API_TOKEN residual report and update GTM score.

## Safety

- No production mutation.
- No route edits.
- No controller edits.
- No filter edits.
- No database changes.
- No rollback required for this documentation-only slice.
