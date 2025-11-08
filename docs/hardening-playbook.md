# MyMI Wallet – Hardening Playbook (Phase 1)

This doc collects the shell commands from the stability pass. Run them from `~/mymiwallet/site/current` unless noted. No sudo required. Safe and idempotent where possible.

> **Create a safety branch & tag**
```bash
cd ~/mymiwallet/site/current
git checkout -b hardening/stability-freeze
git add -A && git commit -m "chore: stability freeze before hardening"
git tag safety-freeze-$(date +%F)


Install dev tooling (local/dev only)

composer require --dev friendsofphp/php-cs-fixer phpstan/phpstan vimeo/psalm


Run code style & static analysis (non-blocking)

vendor/bin/php-cs-fixer fix --dry-run
vendor/bin/phpstan analyse app --level=max || true
vendor/bin/psalm --show-info=false || true


Quarantine stray backups out of autoload paths

mkdir -p _archive/app-config
# Move common backup patterns safely (ignore errors if none found)
git ls-files -z | xargs -0 -I{} bash -lc '[[ "{}" =~ \.bak\.|\.BAK\. ]] && git mv -f "{}" "_archive/app-config/$(basename "{}")" || true'
# Also move known root app backups if present
[[ -d app.bak.* ]] && git mv -f app.bak.* _archive/ || true
git add -A && git commit -m "chore: move backups out of autoload paths"


Verify health endpoints (after Codex adds them)

curl -sS https://www.mymiwallet.com/system/healthz | jq .
curl -sS https://www.mymiwallet.com/system/diag | jq .


Run smoke tests (if CIUnit configured)

vendor/bin/phpunit --testsuite default --colors=always


Format code (apply fixes)

vendor/bin/php-cs-fixer fix
git add -A && git commit -m "chore: apply php-cs-fixer formatting"


Rollback plan

# Revert to the safety tag if needed
git checkout safety-freeze-$(git tag --list 'safety-freeze-*' | tail -n1)


---

## Final step for Codex
Open a PR titled: **“Phase 1: Stability, Standards & Observability”** with a checklist in the description:

- [ ] Add standards configs (php-cs-fixer, phpstan, psalm)
- [ ] Add `App\Support\Http` facade and migrate Management/Alerts controllers to JSON contract
- [ ] Unify `Logger` config (file + db) with structured context
- [ ] Add `/system/healthz` and `/system/diag`
- [ ] Append missing `/API/Management/*` routes (stubs ok)
- [ ] Quarantine stray backups from autoload paths
- [ ] Add minimal smoke test
- [ ] Add ADR 0001
- [ ] Add `docs/hardening-playbook.md`

---

If you want me to also generate **exact controller diffs** for `ManagementController` and `AlertsController` in this same style (filenames + patches), say the word and I’ll include them next.


ChatGPT can make mistakes. Check imp
