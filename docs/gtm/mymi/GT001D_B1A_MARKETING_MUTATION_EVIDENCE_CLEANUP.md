# GT-001D-B1A Marketing Mutation Evidence Cleanup

## Objective

Close the GT-001D-B1 post-merge reconciliation gap by adding exact route-line verification evidence and normalizing the B1 discovery CSV line endings.

## Scope

Documentation/evidence only.

## Findings

GT-001D-B1 successfully applied `apiToken` guards to 25 Marketing mutation-candidate API routes.

The original final verifier used substring matching, which caused false positives for route names or handlers that are prefixes of other route names or handlers, including:

- `fetchGeneratedSummaries`
- `generateFromSimilar`
- `generatePostsFromSummary`

GT-001D-B1A verifies each B1 route by exact expected route line inside the API/Marketing route group only.

## Evidence

- `docs/gtm/mymi/evidence/gt001d/marketing/b1a/marketing-b1-exact-route-verification.csv`
- `docs/gtm/mymi/evidence/gt001d/marketing/b1/marketing-mutation-candidate-batch-discovery.csv`

## Result

- VERIFIED: 25
- REVIEW_REQUIRED: 0

## Safety

- Documentation/evidence only.
- No route edits.
- No controller edits.
- No filter edits.
- No model edits.
- No database changes.
- No production mutation before PR merge/sync.
- No rollback required beyond reverting this documentation PR.
