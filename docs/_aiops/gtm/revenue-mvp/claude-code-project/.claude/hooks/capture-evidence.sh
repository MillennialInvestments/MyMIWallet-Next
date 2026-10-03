#!/usr/bin/env bash
# PostToolUse (Bash): append command + exit status to the evidence log. Never blocks, never fails the tool.
INPUT="$(cat)"
EV="${MYMI_EVIDENCE_DIR:-/tmp/mymi-revenue-mvp/evidence/claude-session}"
mkdir -p "$EV" 2>/dev/null
printf '%s' "$INPUT" | python3 -c '
import json,sys,datetime
try: d=json.load(sys.stdin)
except Exception: sys.exit(0)
c=(d.get("tool_input") or {}).get("command","")
r=d.get("tool_response") or {}
rc=r.get("exit_code", r.get("returnCode","?")) if isinstance(r,dict) else "?"
print(json.dumps({"ts":datetime.datetime.utcnow().isoformat()+"Z","cmd":c[:500],"rc":rc}))
' >>"$EV/commands.jsonl" 2>/dev/null
exit 0
