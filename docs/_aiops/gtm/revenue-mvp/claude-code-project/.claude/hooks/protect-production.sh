#!/usr/bin/env bash
# PreToolUse guard (Bash + Edit/Write). Reads hook JSON on stdin. Exit 2 = block (stderr shown to Claude).
# Blocks: any reference to production path in a mutating context; writes to AIOps state JSON.
INPUT="$(cat)"
RESULT="$(printf '%s' "$INPUT" | python3 -c '
import json,re,sys
try: d=json.load(sys.stdin)
except Exception: print("ALLOW"); sys.exit(0)
t=d.get("tool_name",""); i=d.get("tool_input",{}) or {}
PROD="/apps/TBI/www/mymiwallet/current"
STATE=[r"docs/_aiops/_execution_state\.json", r"docs/_aiops/_repair_queue\.(json|md)", r"docs/_aiops/aiops-state/", r"docs/_aiops/_aiops_all\.(json|md)", r"docs/_aiops/_patch_plan\.(json|md)"]
WRITE=re.compile(r"(>|>>|\btee\b|\bsed\s+-i|\bmv\b|\bcp\b|\brm\b|\btruncate\b|\bdd\b|\bperl\s+-i|\bpython3?\b.*open\(|\bjq\b.*(>|\-i))")
if t in ("Edit","Write","MultiEdit","NotebookEdit"):
    p=i.get("file_path") or i.get("notebook_path") or ""
    if p.startswith("/apps/TBI/www/") or PROD in p: print("DENY production path edit: "+p); sys.exit(0)
    for s in STATE:
        if re.search(s,p): print("DENY manual edit of AIOps state: "+p); sys.exit(0)
elif t=="Bash":
    c=i.get("command","")
    if PROD in c or re.search(r"/apps/TBI/www/(?!\S*\.log)",c): print("DENY command references production tree"); sys.exit(0)
    for s in STATE:
        if re.search(s,c) and WRITE.search(c): print("DENY write to AIOps state via shell"); sys.exit(0)
print("ALLOW")
')"
case "$RESULT" in
  DENY*) echo "BLOCKED by protect-production: ${RESULT#DENY }. Production is read-only and AIOps state is owned by TBI AIOps." >&2; exit 2;;
  *) exit 0;;
esac
