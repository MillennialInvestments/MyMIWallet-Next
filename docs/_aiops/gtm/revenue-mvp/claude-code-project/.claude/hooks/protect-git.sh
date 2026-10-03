#!/usr/bin/env bash
# PreToolUse guard for Bash. Blocks destructive git/file operations. Exit 2 = block.
INPUT="$(cat)"
RESULT="$(printf '%s' "$INPUT" | python3 -c '
import json,re,sys
try: d=json.load(sys.stdin)
except Exception: print("ALLOW"); sys.exit(0)
if d.get("tool_name")!="Bash": print("ALLOW"); sys.exit(0)
c=(d.get("tool_input") or {}).get("command","")
rules=[
 (r"\bgit\s+(-\S+\s+)*reset\s+.*--hard","git reset --hard"),
 (r"\bgit\s+(-\S+\s+)*clean\b","git clean"),
 (r"\bgit\s+(-\S+\s+)*stash\b","git stash"),
 (r"\bgit\s+(-\S+\s+)*push\b.*(\s--force\S*|\s-f\b|\s\+\S+)","force push"),
 (r"\bgit\s+(-\S+\s+)*(rebase|filter-branch|filter-repo)\b","history rewrite"),
 (r"\bgit\s+(-\S+\s+)*commit\b.*--amend","history rewrite (amend)"),
 (r"\brm\s+(-\S*[rR]\S*[fF]|-\S*[fF]\S*[rR]|-[rR]\s+-[fF]|-[fF]\s+-[rR]|--recursive\s+--force|--force\s+--recursive)","rm -rf"),
 (r"\bfind\b.*\s-delete\b","find -delete"),
]
for rx,name in rules:
    if re.search(rx,c): print("DENY "+name); sys.exit(0)
print("ALLOW")
')"
case "$RESULT" in
  DENY*) echo "BLOCKED by protect-git: ${RESULT#DENY }. Use TBI AIOps governed recovery; destructive recovery is forbidden." >&2; exit 2;;
  *) exit 0;;
esac
