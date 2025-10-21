#!/usr/bin/env bash
set -euo pipefail

REPO_ROOT="${REPO_ROOT:-$(git rev-parse --show-toplevel)}"
cd "$REPO_ROOT"

BRANCH="fix/views-normalization"
TS="$(date +%F-%H%M%S)"
REPORT="codex-view-fixes-report.$TS.txt"

RG_EXCLUDES=(
  --glob '!vendor/*'
  --glob '!node_modules/*'
  --glob '!public/*'
  --glob '!.git/*'
  --glob '!archive/*'
  --glob '!storage/*'
  --glob '!build/*'
  --glob '!*.BAK*'
)

GREP_EXCLUDES=(
  --exclude-dir=vendor
  --exclude-dir=node_modules
  --exclude-dir=public
  --exclude-dir=.git
  --exclude-dir=archive
  --exclude-dir=storage
  --exclude-dir=build
  --exclude-dir='*BAK*'
)

rg_wrap() {
  local pattern="$1"
  if command -v rg >/dev/null 2>&1; then
    rg --pcre2 -n --no-heading -S "${RG_EXCLUDES[@]}" -g "*.php" -e "$pattern" app || true
  else
    grep -RInE "${GREP_EXCLUDES[@]}" "$pattern" app || true
  fi
}

echo "== View misuse report (dry-run) : $TS" | tee "$REPORT"

echo -e "\n[Backslash in view()]" | tee -a "$REPORT"
rg_wrap "view\(\s*'[^']*\\[^']*'\s*(,|\))" | tee -a "$REPORT"

echo -e "\n[Mixed / and \\ in view()]" | tee -a "$REPORT"
rg_wrap "view\(\s*'[^']*\\[^']*/[^']*'\s*(?:,|\))" | tee -a "$REPORT"
rg_wrap "view\(\s*'[^']*/[^']*\\[^']*'\s*(?:,|\))" | tee -a "$REPORT"

echo -e "\n[.php in view()]" | tee -a "$REPORT"
rg_wrap "view\(\s*'[^']*\\.php'\s*(,|\))" | tee -a "$REPORT"

echo -e "\n[app/Views prefix in view()]" | tee -a "$REPORT"
rg_wrap "view\(\s*'app/Views/[^']*'\s*(,|\))" | tee -a "$REPORT"

echo -e "\n[Module/Views prefix in view()]" | tee -a "$REPORT"
rg_wrap "view\(\s*'(UserModule|ManagementModule|SupportModule|ExchangeModule|BlogModule)/Views/[^']*'\s*(,|\))" | tee -a "$REPORT"

echo -e "\n[Extra parens after view()]" | tee -a "$REPORT"
rg_wrap "view\([^)]*\)\){2,}" | tee -a "$REPORT"

if ! git rev-parse --verify "$BRANCH" >/dev/null 2>&1; then
  git checkout -b "$BRANCH" >/dev/null 2>&1
else
  git checkout "$BRANCH" >/dev/null 2>&1
fi

mkdir -p app.BACKUPS
cp -a app "app.BACKUPS/app.$TS"

python - <<'PY'
import re
from pathlib import Path

SKIP_NAMES = {'vendor', 'node_modules', 'public', '.git', 'archive', 'storage', 'build'}
SKIP_CONTAINS = ('BAK', 'app.BACKUPS')
MODULE_PREFIX_REGEX = re.compile(r"^(?:UserModule|ManagementModule|SupportModule|ExchangeModule|BlogModule)/Views/?")

pattern = re.compile(r"view\(\s*'([^']*)'(\s*[,)])")

for path in Path('app').rglob('*.php'):
    if any(name in SKIP_NAMES for name in path.parts):
        continue
    posix = path.as_posix()
    if any(token in posix for token in SKIP_CONTAINS):
        continue

    text = path.read_text()

    def normalize(raw: str) -> str:
        updated = raw.replace('\\', '/')
        updated = re.sub(r'/+', '/', updated)
        if updated.endswith('.php'):
            updated = updated[:-4]
        if updated.startswith('app/Views/'):
            updated = updated[len('app/Views/'):]
        updated = MODULE_PREFIX_REGEX.sub('', updated)
        return updated.strip('/')

    def replacer(match: re.Match) -> str:
        normalized = normalize(match.group(1))
        return f"view('{normalized}'{match.group(2)}"

    new_text = pattern.sub(replacer, text)
    new_text = re.sub(r"(view\([^)]*\))\)+(\s*;)", r"\1\2", new_text)
    new_text = re.sub(r"(view\([^)]*\))\)+(\s*\?>)", r"\1\2", new_text)

    if new_text != text:
        path.write_text(new_text)
PY

echo -e "\n== Post-fix verification" | tee -a "$REPORT"

echo -e "\n[Still has backslashes]" | tee -a "$REPORT"
rg_wrap "view\(\s*'[^']*\\[^']*'\s*(,|\))" | tee -a "$REPORT"

echo -e "\n[Still has mixed slashes]" | tee -a "$REPORT"
rg_wrap "view\(\s*'[^']*\\[^']*/[^']*'\s*(?:,|\))" | tee -a "$REPORT"
rg_wrap "view\(\s*'[^']*/[^']*\\[^']*'\s*(?:,|\))" | tee -a "$REPORT"

echo -e "\n[Still has .php]" | tee -a "$REPORT"
rg_wrap "view\(\s*'[^']*\\.php'\s*(,|\))" | tee -a "$REPORT"

echo -e "\n[Still has app/Views prefix]" | tee -a "$REPORT"
rg_wrap "view\(\s*'app/Views/[^']*'\s*(,|\))" | tee -a "$REPORT"

echo -e "\n[Still has Module/Views prefix]" | tee -a "$REPORT"
rg_wrap "view\(\s*'(UserModule|ManagementModule|SupportModule|ExchangeModule|BlogModule)/Views/[^']*'\s*(,|\))" | tee -a "$REPORT"

echo -e "\n[Still has extra parens]" | tee -a "$REPORT"
rg_wrap "view\([^)]*\)\){2,}" | tee -a "$REPORT"

echo -e "\n== PHP lint (errors only)" | tee -a "$REPORT"
find app -type f -name "*.php" -print0 | xargs -0 -n1 php -l | grep -v "No syntax errors" | tee -a "$REPORT" || true

git add -A
git commit -m "Normalize view() calls: slashes, no .php, drop app/Views & Module/Views prefixes; remove extra parens. Report: $REPORT" || true

echo -e "\n✅ Done. See report: $REPORT"
