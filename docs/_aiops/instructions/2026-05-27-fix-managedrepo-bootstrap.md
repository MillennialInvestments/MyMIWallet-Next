# Fix ManagedRepo Bootstrap for AIOps/Spark

Problem:
ManagedRepos/worktree clones repeatedly fail with missing vendor, missing .env, missing writable SQLite DB, or DB connection refused during Spark/AIOps commands.

Implement a permanent bootstrap flow:

1. Add script:
scripts/aiops/bootstrap-managedrepo.sh

Must:
- create .env from env/.env.ci.example if .env is missing or incomplete
- default CLI/AIOps DB to SQLite at writable/ci.sqlite
- create writable/ci.sqlite if missing
- install vendor using composer.phar if vendor/codeigniter4/framework/system/Boot.php is missing
- verify php spark list works
- verify php spark aiops commands are visible
- never overwrite real production secrets without creating timestamp backup
- print clear PASS/FAIL output

2. Add Spark command:
app/Commands/AIOps/BootstrapManagedRepo.php

Command:
php spark aiops:bootstrap-managedrepo

It should call/replicate the same checks and repair:
- .env
- writable/ci.sqlite
- vendor
- spark list
- aiops command visibility

3. Harden logger for CLI:
- MyMIDBLoggerHandler must not break Spark if DB is unavailable.
- On CLI DB failure, fall back to file/error_log only.
- No repeated DB connection spam.

4. Add docs:
docs/_aiops/reports/managedrepo-bootstrap/README.md
docs/_aiops/reports/managedrepo-bootstrap/VALIDATION.md

5. Validation:
- Fresh clone/worktree can run php spark list
- php spark aiops:ingest does not die during bootstrap
- php spark aiops:worker can reach command execution layer
- vendor missing scenario is handled
- .env missing scenario is handled
- DB unavailable scenario is handled gracefully

Do not modify unrelated marketing files.
