# MYMI-GTM-003A + MYMI-GTM-006 — PR-diff secret scan and workflow lint gates

## Status

PROPOSED. Authored by Claude as a draft pull request while TBI AIOps tooling was
not reachable from the authoring session. Not an AIOps-governed mission and not
task completion. Adopt, re-run under AIOps, or close.

## Golden Task records

| Field | MYMI-GTM-003A (successor of 003) | MYMI-GTM-006 |
|---|---|---|
| Title | Blocking secret scan of new commits, including nested paths | Workflow syntax and action lint gate |
| Wave / priority | W0 / P0 | W0 / P0 |
| Dependencies | None for the PR-diff scope. Full MYMI-GTM-003 (whole-repo enforcement) still depends on MYMI-GTM-002. | MYMI-GTM-005 (ci-health.yml now parses on main 14b9ab5). |
| Source boundary | `.github/workflows/security-secret-scan.yml`, `scripts/ci/pr_diff_range.sh` | `.github/workflows/workflow-lint.yml`, `scripts/ci/pr_diff_range.sh` |
| Out of scope | Rotating credentials (MYMI-GTM-001), untracking `chat/.env` (MYMI-GTM-002), history rewrite, linting unchanged inherited workflows | Fixing existing actionlint findings in unchanged workflows |

## Acceptance contract

- Positive: a PR adding no secrets and no env files passes both jobs; this PR is the positive case.
- Negative (secrets): a PR commit adding a credential-shaped value fails `Gitleaks scan of commit range` with redacted output.
- Negative (env files): a PR adding `**/.env` or `**/.env.<name>` not ending in `.example/.sample/.template/.dist` fails `Block newly added env files`.
- Negative (workflow syntax): any malformed workflow YAML fails `YAML syntax of all workflows`.
- Negative (actionlint): a changed workflow with an actionlint error fails `actionlint on changed workflows`.
- Failure semantics: unresolved commit range exits non-zero (fail closed), never skips.
- Baseline: inherited `chat/.env` produces a warning annotation only, labelled report-only.

## Evidence

- Local (sandbox, no PHP/Docker tools): `scripts/ci/pr_diff_range.sh` passed range tests for PR with advanced base (resolves merge base), push with zero `before`, unsupported event (exit 2), unresolvable SHA (exit 3). Env-file filter matched `sub/.env` and `.env.local`, excluded `*.example`. All 18 workflow files parse with PyYAML; a malformed fixture fails.
- NOT run locally: gitleaks and actionlint (binary download blocked in the authoring sandbox). First evidence is this PR's CI run.
- Negative CI cases (secret, env file, bad workflow) are BLOCKED pending a throwaway PR; do not certify until run.

## Risks

- gitleaks default rules may false-positive on new fixtures; add a reviewed `.gitleaks.toml` allowlist entry rather than disabling the job.
- Container images are pinned by tag, not digest. Successor: pin by digest under MYMI-GTM-008.
- Does not detect secrets already on `main`; that remains MYMI-GTM-001/002/003.

## Rollback

Revert the PR. Both workflows are additive and change no application runtime code.
