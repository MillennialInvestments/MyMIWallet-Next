# API Audit (api:audit)

## Overview
The `api:audit` Spark command reads the canonical API schematic (`docs/api/schematic.yaml`), runs a live in-process request for each eligible endpoint, and writes a structured health report for triage. The command is designed for AIOps-style monitoring while keeping API behavior unchanged.

Key behaviors:
- Loads endpoint metadata from the schematic file.
- Executes internal requests (no external curl or localhost calls).
- Captures status code, response time, response preview, and validation results.
- Classifies failures and suggests recommended fixes.
- Writes a JSON report to `writable/triage/` and prints a CLI table summary.

## How `schematic.yaml` Works
`docs/api/schematic.yaml` is a JSON-compatible YAML file that lists every API endpoint discovered from CodeIgniter routing. Each entry includes:
- `id`: stable slug for tracking
- `controller` / `method`: target handler
- `route` / `http_method`: inferred route path and HTTP method
- `auth_required`: inferred from route filters
- `expected_status_codes` / `expected_response_keys`: validation baselines
- `validation_rules`: optional validation metadata
- `test_strategy`: `smoke | deep | skip`
- `aiops_notes`: freeform notes for reviewers

Because this is YAML-compatible JSON, you can edit it manually or regenerate it through internal tooling. If a route is missing from `Routes.php`, it is still listed but marked `route: null` and skipped by audits.

## How to Add New APIs
1. Add the new endpoint route to `app/Config/Routes.php` (or module routes).
2. Update `docs/api/schematic.yaml` with a new entry or regenerate the schematic.
3. Fill in `expected_response_keys` and any `validation_rules` you want checked.
4. Run `php spark api:audit` and review the generated report.

## Future AIOps Integrations
`api:audit` is designed to integrate with the following workflows:
- **Nightly CRON**: schedule `php spark api:audit` and archive reports for trend analysis.
- **Discord alerts**: send summarized failures to a Discord channel after each run.
- **GitHub issue creation**: open issues for repeated failures with response previews.
- **Codex auto-fix tasks**: feed grouped failures into automated fix planning (via `ApiOpsService::generateFixPlan`).

## Running the Audit
```bash
php spark api:audit
```

Outputs:
- CLI table summary
- JSON report in `writable/triage/api-audit-{Y-m-d_His}.json`
