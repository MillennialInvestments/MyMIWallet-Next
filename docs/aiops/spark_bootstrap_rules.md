# CI4 Spark Bootstrap Rules (Hard)

Spark dies silently if these are violated.

## Boot Files
Files:
- app/Config/Boot/development.php
- app/Config/Boot/production.php

Rules:
- NO service(), config(), helper(), or env() calls at file scope
- NO logging
- NO Kint usage
- NO exit(), die(), return
- ONLY define constants and ini settings
- Must be idempotent
- Must not depend on DB, cache, or filesystem

## Spark File
- Root `spark` file must remain stock CI4
- No edits allowed

## Failure Mode
- Any fatal in boot files kills Spark with zero output

## Enforcement
AIOps must:
- Diff Boot files against stock CI4 templates
- Flag or revert illegal changes
- Block PRs that modify boot files without approval
