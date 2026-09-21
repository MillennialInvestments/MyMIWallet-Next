# TBI AIOps Installation Handoff

This proposal was built from anonymous read access at baseline `8dfb2c3459a2e3be30f696c582bf2f930ebe0897`. The review environment does not have the canonical TBI repository, the `ai` command, authenticated GitHub write access, PHP, or Composer. That prevents governed installation and runtime certification; it does not prevent the read-only review.

Repository documentation identifies the canonical source path as:

```text
/apps/TBI/repos/mymiwallet-next
```

Production is separate:

```text
/apps/TBI/www/mymiwallet/current
```

Do not install into or edit the production path.

## Access needed to continue

- Shell access on the canonical TBI host with read access to `/apps/TBI/repos/mymiwallet-next`.
- The source-controlled TBI `ai` command and permission to run `ai check`, `ai next`, the returned `NEXT_COMMAND`, and `ai finish`.
- An AIOps-created objective/task and unique feature worktree authorized to add the contents of this bundle under `docs/_aiops/gtm/`.
- Existing task-scoped GitHub authentication to push the feature branch and create/update a pull request. Do not send a token in chat.
- PHP 8.2, Composer, and the isolated application test environment for subsequent runtime tasks.
- Separate named approval later for credential rotation, database/auth mutations, external sandbox calls, staging, deployment, rollback, or production verification.

## Paste-safe read-only preflight

Run this on the canonical TBI host and return the complete output. It does not edit application source or production:

```bash
set -euo pipefail
MYMI_REPO=/apps/TBI/repos/mymiwallet-next
test -d "$MYMI_REPO/.git"
cd "$MYMI_REPO"
git remote -v
git fetch --prune origin
git rev-parse HEAD
git rev-parse origin/main
git status --short
command -v ai
ai check
ai next
```

After that preflight, execute only the `NEXT_COMMAND` returned by TBI AIOps. If it assigns unrelated work, stop and create/request a dedicated objective named along the lines of `Install MyMI GTM completion program`. Do not reuse a stale branch or manually create a commit.

## Installation acceptance

The authorized task should:

1. Revalidate the P0 findings against current `origin/main`.
2. Add this bundle to the existing lowercase `docs/_aiops/gtm/` directory; never create a case-only `GTM` duplicate.
3. Preserve any newer task-registry data and reconcile it deliberately rather than overwriting it.
4. Run:

```bash
python3 docs/_aiops/gtm/scripts/mymi_gtm.py validate --repo .
python3 docs/_aiops/gtm/scripts/mymi_gtm.py audit --repo .
python3 docs/_aiops/gtm/scripts/mymi_gtm.py next --repo .
```

5. Use `ai finish` for the commit/push/PR handoff.
6. Do not merge, deploy, rotate credentials, rewrite history, or mutate any database as part of installation.

The first operational Golden Task should be `MYMI-GTM-001` because the tracked public credential file is an incident-containment prerequisite. The external rotations themselves require the relevant human owners.
