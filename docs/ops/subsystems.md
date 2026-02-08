# Subsystem Control Plane Runbook

## Commands
- `php spark aiops:status|audit|repair|self-heal|watch`
- `php spark aiops:n8n:start|stop|restart|logs --lines=200`
- `php spark chat:status|audit|repair|start|stop|restart|logs --lines=200`
- `php spark ops:subs:status|audit|repair|doctor`

## Runtime files
- `aiops/runtime/n8n.pid|n8n.lock|n8n.log|n8n.status.json`
- `chat/runtime/chat.pid|chat.lock|chat.log|chat.status.json`
- `aiops/runtime/selfheal.lock`

## Dashboard API
- `GET /API/Management/subsystems/status`
- `POST /API/Management/subsystems/action`

## Notes
- Commands support `--json=1`; mutating commands support `--dry-run=1`.
- No sudo/systemd required; wrappers use pid+port guards.
