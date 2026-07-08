# GT-002-03B Dashboard Workflow GET Route Classification

## Status

REVIEW_REQUIRED

## Finding

The following GET paths returned 404 during guest smoke:

- `/Dashboard/setup`
- `/Dashboard/onboarding/profile`
- `/Dashboard/account-completion`

## Required classification

For each path, determine whether it is:

1. A real user-facing GET page that should redirect to login for guests, or
2. A POST/workflow-only endpoint that should not be included in future public/guest page smoke matrices.

## Expected outcome

If user-facing:

- Create a remediation Golden Task to add protected GET behavior.

If workflow-only:

- Update GT-002 dashboard smoke standards to exclude these paths from GET page certification.

## Safety

Do not implement in this certification lane.

Do not submit login POST.

Do not create accounts.

Do not mutate production database.

Do not rollback production.
