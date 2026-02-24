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