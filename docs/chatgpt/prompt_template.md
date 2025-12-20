# Prompt Templates (MyMI Phone-First Ops)
Last Updated: 2025-12-20
Purpose: Standard prompts for ChatGPT → Codex → GitHub → SSH/CRON workflows.

## Global Rules (Always prepend)
- Target Project:
- Environment: local | staging | prod
- Change Type: fix | feature | refactor | ops | docs | marketing | user_mgmt
- Blast Radius: module | shared library | global
- Constraints: (DreamHost no sudo, PHP version, CI4/Bonfire conventions, etc.)
- Deliverables required: (patches, scripts, docs, SQL)

---

## A) Daily Error Log Triage → Patch PR
**Use when:** you have `writable/logs/summary-YYYY-MM-DD.log`

Prompt:
Analyze the following CI4 summarized log for MyMI Wallet.

1) List the top 5 most urgent errors (severity + occurrences + core-module impact).
2) List all distinct errors (LEVEL, message, count).
3) Provide root-cause hypotheses and likely file/method locations.
4) Provide exact code patches (full file paths + insert/replace blocks).
5) If schema issues exist, generate docs/sql/mysql.md with raw SQL (no migrations).
6) Provide Today’s Fix Plan.

Here is the summarized log:
<<<PASTE SUMMARY LOG>>>

---

## B) “Fix this one error” Fast Patch
Prompt:
Fix this CI4 error in a repo-safe way:
- Error:
- Stack trace (if available):
- Route/endpoint:
- Expected behavior:

Output:
- Root cause
- Exact patch (file path + code block)
- Tests or smoke commands to validate
- Rollback steps

---

## C) Feature Spec → Implementation PR
Prompt:
Implement this feature in MyMI Wallet.

Feature spec:
<<<SPEC>>>

Constraints:
- Target module(s):
- Database tables impacted:
- Must add docs in /docs/features/
- Must add tests or smoke scripts if applicable
- Must include UI/UX notes if view changes

Deliverables:
- Code patches
- SQL (raw) if needed
- Updated docs
- “How to validate” steps

---

## D) Ops Script Request (Phone-safe)
Prompt:
Create a phone-safe bash script for DreamHost (no sudo) that:
- Goal:
- Required args:
- Safe defaults:
- Output must be machine-readable (JSON lines preferred)

Also provide:
- Where to place it (scripts/ops/)
- Example usage commands
- Failure modes + rollback

---

## E) Marketing Pipeline Run (Dry Run → Approve → Distribute)
Prompt:
Using our MyMIMarketing and stored summaries:
1) Generate a dry-run “Today’s Digest” (top 5 items).
2) Provide platform-specific drafts (Discord, LinkedIn, X, Blog snippet).
3) Include optional CTA variants.
4) Include a “Ready to publish?” checklist.
5) Output as JSON for ingestion.

Constraints:
- Skip items without title/url
- Keep within platform character limits
- Avoid sensitive claims; be factual

---

## F) User Audit + Spam Scrub Plan
Prompt:
Audit user accounts for suspicious patterns:
- Obfuscated Gmail dots
- Disposable domains
- High-risk IP patterns (if available)
- Unverified email + no activity for N days

Output:
- Rules (deterministic)
- Query plan
- Proposed UI toggle behavior
- Patches + SQL indexes (if needed)
- Safety: never delete by default; only flag/disable

---

## G) Release / Deploy Checklist (DreamHost-safe)
Prompt:
Generate a deploy plan for DreamHost (no sudo), CI4:
- Pull latest main
- Clear caches
- Run smoke routes
- Verify health endpoints
- Confirm error logs quiet

Output:
- Commands
- Expected outputs
- Rollback plan

---

## H) Docs Enforcement
Prompt:
Review /docs for drift and missing sections.
Output:
- Missing docs list
- Proposed doc file additions
- PR changes required
- Update /docs/projects/index.csv entries
