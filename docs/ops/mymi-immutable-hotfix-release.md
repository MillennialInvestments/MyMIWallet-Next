# MyMI Wallet #658 — Immutable three-file registration release

**Golden Task:** [MYMI-P0-658-RELCTRL-001 / #661](https://github.com/MillennialInvestments/MyMIWallet-Next/issues/661). Parent production incident: #658. This controller never migrates databases, calls Composer, changes PHP-FPM/nginx, or rolls production back.

## Repository and source boundary

The controller is a CI4 Spark command registered in `app/Config/Console.php` and invoked as `php spark ops:mymi:release`. It extends `SafeBaseCommand`. The implementation Golden Task has **four** paths: `app/Commands/Release/MymiImmutableHotfixRelease.php`, `app/Config/Console.php` (one exact registration entry), `tests/unit/Release/MymiImmutableHotfixReleaseTest.php`, and this document. The original three-path proposed scope omitted the mandatory command registration; do not edit the approved old recipe. Use a new independently approved deterministic Class-1 recipe and keep the previous source-generation failures as lineage.

The **production hotfix** is precisely **three** already-merged replacement files:

- `app/Controllers/AuthController.php`
- `app/Filters/CsrfDebugFilter.php`
- `app/Views/Auth/register_form.php`

Merged repair commit: `f380233b429101e132394fa1ebc9faaf499d78c0`. No unrelated files, migrations, packages, secrets, or source modifications are permitted in a production hotfix release.

## Input manifest

Create an immutable external JSON file, outside the production release root, with the following contract. The overlay is the previously certified *unmodified* three-file payload. The manifest hashes must agree with both the live baseline release and the exact overlay. A separately supplied read-only manifest generator is part of the TBI AIOps proposal package.

```json
{
  "schema": "mymi_immutable_hotfix_v1",
  "release_id": "20261102T140000Z-p0-658-hotfix-v1",
  "baseline_release_id": "20261026T205500Z-marketing-distro-1ff876823",
  "baseline_link": "releases/20261026T205500Z-marketing-distro-1ff876823",
  "overlay_root": "/home/timoteo2392/tbi-evidence/mymi-658-autopilot-od099SxS/overlay",
  "evidence_root": "/home/timoteo2392/tbi-evidence/mymi-658-controlled-release",
  "files": {
    "app/Controllers/AuthController.php": {"pre_sha256": "<exact 64-character hash>", "post_sha256": "<exact 64-character hash>"},
    "app/Filters/CsrfDebugFilter.php": {"pre_sha256": "<exact 64-character hash>", "post_sha256": "<exact 64-character hash>"},
    "app/Views/Auth/register_form.php": {"pre_sha256": "<exact 64-character hash>", "post_sha256": "<exact 64-character hash>"}
  }
}
```

The `baseline_link` must be the exact preactivation `readlink /apps/TBI/www/mymiwallet/current` target. Both a relative `releases/<release-id>` and an absolute `/apps/TBI/www/mymiwallet/releases/<release-id>` are supported. Every path must pass canonicalization, no symlink is allowed in the three hotfix file paths, and the source must match the exact postimage in the merged repair commit.

## Native workflow and approvals

1. **Plan:** `php spark ops:mymi:release --phase plan --manifest /absolute/file.json`. Pure read-only audit of current pointer, exact 3 paths, baseline/overlay hashes, unsafe links and capacity. Displays `build_gate_sha256`. This does not publish any source or runtime file.
2. **Certify:** `php spark ops:mymi:release --phase certify --manifest /absolute/file.json`. Rechecks the same evidence and emits the exact build token. Still read-only. **Do not proceed if the existing production layout does not satisfy the verified symlink contract.** In particular, `.env` and `writable` must be external absolute symlinks; a regular `.env` is intentionally refused to avoid copying secrets.
3. **Owner build gate:** only after separate owner approval for the specific manifest and exact baseline, run `php spark ops:mymi:release --phase build --manifest /absolute/file.json --approve --approval-token <certified-build-fingerprint>`. This writes a new candidate under `releases/` but **does not change** `current`. It preserves the original baseline and all original shared-runtime references. Partial staging directories are kept for governed recovery, not deleted.
4. **Owner activation gate:** after validating candidate contents, vhost/webroot linkage, permissions, and preactivation health, independently approve the precise release activation. The build output emits `activate_gate_sha256`. Run `php spark ops:mymi:release --phase activate --manifest /absolute/file.json --approve --approval-token <certified-activation-fingerprint>` only with that approval. The controller atomically switches `current` to the new release, using a single global process lock and expected baseline pointer check. **No automated rollback** is performed; a failed activation stops and leaves evidence.
5. **Postactivation:** `php spark ops:mymi:release --phase verify --manifest /absolute/file.json` verifies current symlink and full candidate inventory, but **does not** substitute for live HTTP E2E checks. Separately approved tests must exercise CSRF-protected registration, activation email delivery and the login journey. Validate webroot, release SHA-256s, application logs, endpoint health and no unrelated migrations. Do not close #658 without documented live success.

## Hard gates and limitations

- The CLI can only target `/apps/TBI/www/mymiwallet`; isolated unit tests call `executePhase` with temporary fixture roots.
- Report-only phases never write to production or AIOps governed state. The candidate build and activation require separate exact SHA-256 owner tokens **in addition** to `--approve`.
- Candidate building copies the existing immutable release, never a checkout of current `main`. Any file/symlink drift, wrong release/current pointer, absent overlay path, incorrect SHA or unauthorized fourth hotfix file stops immediately.
- The builder preserves only absolute `.env`, `writable`, and optionally `vendor` shared references outside `releases/`. A regular `vendor` directory is supported; unexpected symlinks and normal `.env` files stop.
- Portable npm `node_modules/.bin/<name>` symlinks may be retained only when their relative target lexically stays under `node_modules` and canonically resolves to a regular file inside that same immutable release. Other nested, absolute, escaping, directory, or broken links are rejected. The same validator governs inventory and copy; no global symlink policy is relaxed. The full inventory SHA-256 validates every release file and symlink reference before activation.
- The application does **not** control unrelated deployment or webserver processes; its global lock protects only other invocations of the same controller. Verify no external deployment is racing. There is no rollback procedure in this command.
- Candidate creation may need significant disk space and runtime filesystem permission authority. The minimum space gate is baseline file bytes plus 64 MiB, not an exhaustive filesystem quota forecast. Run independent disk/owner/vhost preflight on the target host.
- Do not treat a certificate file as proof of live registration. Real E2E verification requires explicit authorization and audit logging.
- Do not call `scripts/deploy_safe.sh` or `git pull` in production for this hotfix. The old deployment runbook contains commands that violate the current no-production-overwrite and no-deletion contract.

## Source validation before AIOps closeout

- `php -l app/Commands/Release/MymiImmutableHotfixRelease.php`
- `php -l tests/unit/Release/MymiImmutableHotfixReleaseTest.php`
- `php -l app/Config/Console.php`
- `vendor/bin/phpunit --no-coverage tests/unit/Release/MymiImmutableHotfixReleaseTest.php`
- `git diff --check`, exact four-path Git status, AIOps doctor, `ai check`, `ai next`, external required smokes, and `ai finish --dry-run`.
- Source-controlled **AIOps** alone stages, commits, reviews, PRs and merges through `ai finish` after its gates. An Ollama worker never mutates source. No merge or production deployment is automatically authorized by this proposal.

## Recovery and lineage

Preserve failed model recipe `20261102-114229-392540ef01`, work unit `wu-0001-af6c7201ce18`, exact MyMI controller mission `mission-5626b4cd96b9`, parent incident #658, and all original MyMI hotfix payload attestations. AIOps deterministic recipe mutation journal may contain generated `rm` guidance for newly created source paths; those entries are not owner-authorized instructions and must not be executed. The approved recipe's recovery metadata instead uses preservation-based file moves under external evidence and a separate owner review for `Console.php`.
