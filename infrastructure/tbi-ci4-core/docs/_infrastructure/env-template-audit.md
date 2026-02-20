# Env Template Audit

## Status
The generated `.env.template` includes required key families:
- feature.*
- integration.*
- redis.*
- email.*
- aiops.*
- chat.*
- python.*
- governance.*
- logging.*
- debug.*
- security.*
- cron.*

## Notes
- Keys are intentionally disabled by default for safe drop-in behavior.
- Per-provider secrets remain blank and must be provided at deploy time.
