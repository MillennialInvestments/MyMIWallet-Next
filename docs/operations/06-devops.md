# Environment, Deploy, Logs

## Overview
Covers DreamHost deployment configuration, logging posture, and post-release validation workflows.

## Inventory (Auto-collected)
- Generated on: 2025-10-06 21:17 UTC
- Tooling: grep/awk/php spark/composer/git

## Status Table
| Area / Item | Current Status | Action Needed | Priority | Notes |
|---|---|---|---|---|
| Runtime mode & baseURL | ⚙️ Needs Review | Align `.env` defaults with staging/production matrix and document CI_ENVIRONMENT toggles. | 🟡 Medium | `.env` forces production + baseURL but lacks staging overrides. |
| Log rotation & daily review plan | ❌ Broken/Unknown | Provision `writable/logs/` directory with rotation policy and automate daily check-ins. | 🔴 Critical | Writable logs directory missing in repo snapshot. |
| Repo-root .htaccess quarantine | ⚙️ Needs Review | Confirm Apache fallback rules remain necessary and documented. | 🟡 Medium | Legacy `.htaccess` enforces MIME/security headers even if nginx proxies requests. |
| /public as only web root | ⚙️ Needs Review | Keep nginx config updated and versioned for user-space deploy. | 🟡 Medium | Nginx upstream points to `/public` with proxy to PHP built-in server. |
| Git worktrees hygiene | ⚙️ Needs Review | Document deploy workflow and ensure no stray worktrees on DreamHost user home. | 🟡 Medium | No current checklist for `git status` / `rev-parse` verification post-deploy. |
| Test harness commands | ⚙️ Needs Review | Create automated smoke script for health + opcache resets. | 🟠 High | Manual curls only; no scripted verification pipeline. |

## Findings (Evidence)
- `.env` locks production mode with base URL forcing HTTPS but leaves no staging profile.【F:.env†L19-L60】
- `writable/logs` directory missing, indicating logging output may fail without manual creation.【ba86ed†L1-L2】
- Public `.htaccess` includes hardened MIME and security rules for Apache fallback usage.【F:public/.htaccess†L1-L160】
- Nginx site config proxies to PHP upstream and sets root to `/public`, confirming expected layout.【F:nginx/sites-available/mymiwallet.conf†L13-L68】
- PHP runtime currently 8.4 CLI; deployment target requires 8.2 alignment.【2d35f8†L1-L4】

## Required Fixes / Tasks
- [ ] Provision DreamHost deploy checklist including PHP version pinning and log directory creation (owner: Codex).
- [ ] Automate smoke test using curl + opcache reset, referencing [devops-smoke-test.md](../ops/runbooks/devops-smoke-test.md) (owner: Codex).
- [ ] Perform manual post-deploy smoke per runbook after next release (owner: Teddy/manual).

## Links & References
- `.env`, `public/.htaccess`, `nginx/sites-available/mymiwallet.conf`
- Deployment logs under `/home/mymiteam/`
- `docs/ops/runbooks/devops-smoke-test.md`
