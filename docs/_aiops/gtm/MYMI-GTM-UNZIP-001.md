# MYMI-GTM-UNZIP-001 — Safe ZIP intake Spark command

Status: implementation proposed; draft PR, not merged or deployed.

## Atomic scope

- Command: `app/Commands/AIOps/Unzip.php`
- Tests: `tests/unit/AIOps/UnzipCommandTest.php`
- CLI: `php spark aiops:unzip /tmp/archive.zip`
- Read-only preview: `php spark aiops:unzip /tmp/archive.zip --list`
- Optional SHA-256 pinning: `--sha256=<hex digest>`

## Acceptance

1. CI4 discovers exactly the `aiops:unzip` command.
2. Valid ZIPs extract into a newly allocated, private `/tmp/tbi-aiops-unzip-*` directory, with no overwrite or user-controlled destination.
3. Reject ZIP traversal, symlinks and special members, encrypted files, case-colliding paths, oversized or expansion-bomb entries; verify extracted length and CRC.
4. Never execute extracted content, mutate repositories, production paths, databases, or credentials.
5. PHP lint and `./vendor/bin/phpunit --no-coverage tests/unit/AIOps/UnzipCommandTest.php` PASS with ZIP extension.
6. Exact-head CI, independent code review, and explicit owner approval before merging.

## Governance

Work only in `feature/aiops-safe-unzip-20261016-001`; no deletion, reset, production mutation, or implicit branch cleanup.
Continue MyMI-GTM-004 independently; PR #637 already merged the two workflow command corrections on MyMI main.
Rollback, if authorized, is a new reviewed revert PR. Do not rollback production.
