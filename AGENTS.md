# Repository Agent Instructions

## Repository Context

- **Repository name:** MyMI Wallet
- **Repository key:** `mymiwallet`
- **Primary domain:** `https://www.mymiwallet.com`
- **Application type:** fintech / budgeting / investment workflow platform
- **Framework:** CodeIgniter 4
- **Runtime target:** PHP 8.2 on Teddy's DreamHost VPS stack unless a task states otherwise
- **Centralized AIOps endpoint:** `https://aiops.timothyburks.com`

This repository participates in Teddy's centralized Codex ⇄ AIOps workflow. Codex and AIOps agents should coordinate through repository files without changing runtime application behavior unless the current task explicitly requires it.

## Agent Workflow Rules

1. Codex should complete requested code and documentation tasks when it can do so safely.
2. When work remains, Codex must create or update structured AIOps handoff task files under `docs/_aiops/tasks/`.
3. AIOps consumes queued handoff files from `docs/_aiops/tasks/`, builds repository context, may use Ollama for patch generation or review, and works on its own branch.
4. No agent should auto-merge pull requests or deploy changes.
5. No agent should commit secrets, production credentials, tokens, private keys, or sensitive customer data.
6. No agent should delete working functionality, migrations, routes, controllers, views, models, services, auth flows, dashboard behavior, or frontend layouts without explicit approval.
7. Existing CodeIgniter 4 conventions, project structure, Spark command safety patterns, and documentation conventions must be preserved.
8. Keep changes scoped to the requested task and prefer additive, low-risk updates with clear rollback paths.
9. All pull requests must include:
   - Tests and checks run.
   - Known risks.
   - Rollback notes.
   - AIOps follow-up status, including whether any files were queued in `docs/_aiops/tasks/`.

## CodeIgniter / Web App Expectations

- Application code primarily lives under `app/`.
- Spark commands should follow existing command conventions and safety requirements.
- Database changes must use CodeIgniter migrations and defensive schema guards.
- Do not assume sudo access or production database privileges.
- Do not modify `.env` with real secrets; document required variables instead.
- Operational artifacts and AIOps reports belong under `docs/_aiops/` unless an existing workflow specifies another generated-artifact path.

## Form & Route Certification Guidelines

- **CI4 Route Case-Sensitivity:** Route definitions and route groups in CodeIgniter 4 are case-sensitive. Form and JS actions must match route casing exactly, or provide explicit lowercase aliases in `app/Config/Routes.php`.
- **Absolute Paths in Views:** All `fetch()`, `$.ajax()`, `axios`, and `<form action="...">` paths must use leading slashes (e.g., `/Subscribe/Submit`) or `site_url(...)`. Relative URLs break when rendered on nested subpaths and fail audit checks.
- **HTTP Methods & Verbs:** In CI4.5+, `$request->getMethod()` returns uppercase (`POST`, `GET`). Form actions receiving POST submissions must be registered with `post()` or `match(['GET', 'POST'])`.
- **Browser UI vs. API Token Guards:** Endpoints called by browser UIs (including admin dashboards) must use session/role filters (e.g., `role:admin,team`, `permission:admin.access`, `login`), never token-only filters (`apiToken`, `cronKey`) which reject browser sessions.
- **Form Action Gap Ratchet:** `tests/baseline/form-action-gaps.txt` is an enforced shrink-only ratchet. Never add lines to get tests green; remove lines only as real route fixes land. Verify with `bash tests/smoke/form-certification-smoke.sh`.
- **IDOR Prevention on Mutations:** Any mutation handler (wallets, budgets, investments, projects) must resolve user identity strictly from the active session (`$this->cuID` or `auth()->id()`), never trusting `$request->getPost('user_id')`.

## Environments & Execution Safety

- **Canonical Repo (`/apps/TBI/repos/mymiwallet-next` on `gq-ai01`):** Lacks production DB credentials. Safe for dry-runs and PHPUnit tests. Do not run live submit tests here.
- **Staging Site (`https://staging.mymiwallet.com` on `gq-ai01`):** Deployed via `sudo bash scripts/ops/staging/mymi-staging.sh deploy <ref>`. Safe for live form submissions and destructive tests: run with `sudo -u www-data php -d display_errors=1 spark aiops:form:test --scan-all --submit --allow-destructive --approve`.
- **Production (`/apps/TBI/www/mymiwallet/current`):** Strictly read-only for agents. No direct file edits or unverified migrations.

