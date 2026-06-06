# MyMI Wallet to TBI Marketing Phase 4D Authenticated HTTP Handoff

Status: validated.

Validated:
- MyMI Wallet created a direct approved TBI Marketing export job.
- MyMI Wallet sent the export over authenticated HTTP to https://marketing.timothyburks.com/API/Marketing/importDraft.
- TBI Marketing returned HTTP 200.
- MyMI Wallet marked the export job as sent.
- MyMI Wallet wrote a sent delivery log.
- Export was disabled immediately after the controlled test.
- No Zapier dispatch.
- No external social posting.

Evidence:
- `bf_social_export_jobs` contained a sent `tbi_marketing` job.
- `bf_social_delivery_logs` contained a sent delivery log with response code 200.
- `MYMI_MARKETING_EXPORT_ENABLED=false` after test.

Safety:
- Keep `MYMI_MARKETING_EXPORT_ENABLED=false` outside controlled dispatch windows.
