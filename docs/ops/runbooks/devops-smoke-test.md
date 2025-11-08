# DevOps Smoke Test

## Purpose
Manual checklist to verify deployment health on DreamHost after pushing changes.

## Prereqs
- SSH access to deployment user.
- Knowledge of current release tag or commit hash.

## Steps (CLI)
1. Confirm git worktree state: `git status --short` and `git rev-parse HEAD`.
2. Validate PHP runtime: `php -v` (expect 8.2) and `php -m | grep sodium`.
3. Check nginx service: `ps -ef | grep nginx` and ensure config points to `/public` root.
4. Tail latest log directory: `ls -ltrh writable/logs` (create if missing) and `tail -n 100 writable/logs/*`.
5. Run application smoke endpoints:
   - `curl -s https://www.mymiwallet.com/healthz`
   - `curl -s https://www.mymiwallet.com/_ops/opcache-reset -H 'X-OPCACHE-RESET: <token>'`
6. Record findings in `/home/mymiteam/logs/devops-smoke-$(date +%F).md`.

## Validation
- Health endpoints return HTTP 200 with expected JSON/body.
- Logs directory writable and rotates daily.
- PHP version matches targeted runtime.

## Rollback
- If git state diverges, run `git reset --hard origin/main` (or tracked branch) and redeploy.
- Restore nginx config from backup and reload service if smoke fails.
- Notify stakeholders with captured log output for follow-up.
