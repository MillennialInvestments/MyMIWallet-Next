# AIOps Form Tests

This subsystem enables:
- Scanning forms from URL/file/raw HTML
- Extracting action/method/inputs
- Mapping route → controller handler (best-effort)
- Generating test payload
- Submitting request
- Capturing response + log snapshot
- Creating patch job markdown under docs/_aiops/patch_jobs/
- (Optional) Calling `php spark aiops:ingest --job-file=...`

## Run Examples

### URL
php spark aiops:form:test --url="/Budget/Account-Manager"

### Local file
php spark aiops:form:test --file="/home/mymiteam/mymiwallet/site/current/app/Modules/User/Views/Budget/addAccount.php"

### Raw HTML
php spark aiops:form:test --text="<form method='post' action='/Budget/Account-Manager'>...</form>"

### Skip ingest
php spark aiops:form:test --url="/Budget/Account-Manager" --no-ingest

## Output
- Stores a record in `bf_aiops_form_tests`
- If errors detected: creates patch job in `docs/_aiops/patch_jobs/FORM_TEST_*.md`
## Form Debug + Seeder Audit (CI4 Spark)

New command:

```bash
php spark aiops:form:test --scan-all --dry-run
```

Capabilities:
- Accepts a seeder class/file with `--seeder=SeederName` and runs it only when dry-run is off (scan-all mode).
- Discovers forms in `app/Views` and `app/Modules`.
- Reviews detected form inputs/action/method and maps route info via existing form intelligence service.
- Evaluates likely table seed sufficiency using tokenized form/action/input heuristics against current table row counts.
- Provides seeder recommendations (existing seeder match or a new-seeder hint).
- Optionally executes submissions only when all are provided: `--submit --allow-destructive --approve` and dry-run is disabled.

Safety defaults:
- Dry-run is enabled by default.
- No live form submissions unless explicitly enabled.

Reports:
- Markdown: `docs/_aiops/form-tests/form-debug-seeder-audit-*.md`
- JSON: `writable/aiops/form-tests/form-debug-seeder-audit-*.json`
