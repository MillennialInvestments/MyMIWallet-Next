# AI Code Review (CI4)

## Overview
The AI Code Review workflow runs an automated CodeIgniter 4-focused review for MyMI Wallet pull requests and nightly audits. It extracts a diff, sends it to OpenAI, and posts a single summarized review comment back to GitHub. The workflow is designed to be safe for CI and cost-controlled for large diffs.

## When It Runs
- **Pull requests:** On PR open, update (synchronize), or reopen.
- **Nightly audit:** Every day at 05:00 UTC via cron.

## What It Checks
The reviewer is prompted to focus on CI4-specific architecture and risk areas, including:
- Controllers, services, models, routes, namespaces, filters, and constructors.
- Separation of concerns (controller vs service) and avoidance of business logic in views.
- Performance risks (query efficiency, batching, denormalized fields, N+1 patterns).
- Safety and edge cases (null guards, rate limiting).
- Automation safety (CRON, idempotency).
- Dashboard integrity (avoid blocking external calls, Fetch API, DataTables compatibility).
- Documentation consistency.

## How It Works
1. GitHub Actions checks out the repository.
2. For PRs, it generates `pr.diff` between base and HEAD.
3. The AI review script chunks the diff (100 KB per chunk, max 400 KB total).
4. It sends each chunk to OpenAI and combines responses into a single review.
5. A single comment is posted to the PR:
   - **Title:** 🤖 AI Code Review (CI4)
   - **Body:** Structured summary with risk levels and recommendations.

Nightly audits scan the last 24 hours of diffs in Controllers, Models, Routes, and CRON-related code and post a commit comment rather than a PR comment.

## Manual Trigger
You can trigger the workflow by opening or updating a PR. For nightly audits, trigger the workflow manually via the GitHub Actions UI or run it on a schedule as configured.

## Disable Temporarily
- Remove or comment out the workflow in `.github/workflows/ai-code-review.yml`.
- Or remove the `OPENAI_API_KEY` secret to disable the OpenAI call without failing CI.

## Cost Controls & Safety
- **Chunk size cap:** 100 KB per chunk.
- **Total diff cap:** 400 KB per run.
- **Token budget:** 1200 max tokens per model response.
- **Timeout handling:** 30s per OpenAI/GitHub API request.
- **No-fail CI:** Errors are logged but do not fail the workflow.

## Secrets Required
In **Settings → Secrets → Actions**, ensure:
- `OPENAI_API_KEY` is set to a valid OpenAI key.
- `GITHUB_TOKEN` is provided automatically by GitHub Actions.

## Optional (Stubbed) Modes
The script detects labels but does not enable custom behavior yet:
- `ai-review:adversarial`
- `ai-review:performance`
- `ai-review:docs`
