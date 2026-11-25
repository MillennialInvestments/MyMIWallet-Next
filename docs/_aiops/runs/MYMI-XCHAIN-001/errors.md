# MYMI-XCHAIN-001 Error Ledger

Columns:
`#` | Time (UTC) | Wave/Task | Class | Command | Symptom | Suspected Cause | Resolution Status

Class values: `CORRECTABLE_LOCAL`, `RETRYABLE_TRANSIENT`, `BLOCKED_SAFETY`, `EXPECTED_GATE`, `FAILED`.

| # | Time (UTC) | Wave/Task | Class | Command | Symptom | Suspected Cause | Resolution Status |
|---|------------|-----------|-------|---------|---------|-----------------|-------------------|
| 1 | 2026-11-25 22:48:00 | W0 / MCP | EXPECTED_GATE | mcp tool `chatroom_checkin` | Tool `chatroom_checkin` not in current tbi-aiops MCP schema | Remote chatroom endpoint not exposed as registered MCP tool in current daemon; logged as expected capability gate | LOGGED_OPEN (Gate G-CHATROOM) |
| 2 | 2026-11-25 23:01:00 | W1 / Alerts | CORRECTABLE_LOCAL | `vendor/bin/phpunit tests/unit/CryptoPay/UnderpaymentAlertTest.php` | Fake account_tx response rejected | Test fixture omitted `'status' => 'success'` required by XRPL client | RESOLVED (Added `'status' => 'success'` to test fixture) |
| 3 | 2026-11-25 23:26:00 | W5 / Swaps | CORRECTABLE_LOCAL | `vendor/bin/phpunit tests/unit/Swaps/SwapServiceTest.php` | `Call to undefined function bcmul()` | PHP CLI environment does not have ext-bcmath enabled | RESOLVED (Replaced bcmul with standard 64-bit integer/float arithmetic) |
| 4 | 2026-11-25 23:30:00 | W6 / Exchange | CORRECTABLE_LOCAL | `vendor/bin/phpunit tests/unit/Exchange/PaperExchangeTest.php` | `Access level to $db must be protected` | `$db` was declared `private` conflicting with `CIUnitTestCase::$db` | RESOLVED (Changed property visibility to `protected`) |
| 5 | 2026-11-25 23:37:00 | W9 / Smoke | CORRECTABLE_LOCAL | `bash scripts/ops/staging/mymi-xchain-smoke.sh` | Missing command: `cryptopay:reconcile` | Stale `writable/cache/FileLocatorCache` hid freshly added spark commands | RESOLVED (Added `rm -f FileLocatorCache` before spark list in smoke script and deploy packet) |
