#!/usr/bin/env bash
set +e
APP_ROOT="$(cd "$(dirname "${BASH_SOURCE[0]}")/../../" && pwd)"
OUT_DIR="$APP_ROOT/writable/diagnostics/diag-$(date +%Y%m%d-%H%M%S)"
PHPBIN="${PHPBIN:-php}"

mkdir -p "$OUT_DIR"

echo "==> Collecting diagnostics into $OUT_DIR"

# 0) Basic stack info
{
  echo "### WHOAMI"
  whoami
  id
  uname -a
  echo
  echo "### PHP"
  which "$PHPBIN"
  "$PHPBIN" -v
  "$PHPBIN" -i | egrep 'opcache.enable|opcache.enable_cli|Loaded Configuration'
  echo
  echo "### Composer"
  composer --version
} > "$OUT_DIR/00_system.txt" 2>&1

# 1) CI about + routes (best effort)
"$PHPBIN" -d opcache.enable_cli=0 spark --help > "$OUT_DIR/10_spark_help.txt" 2>&1
"$PHPBIN" -d opcache.enable_cli=0 spark routes > "$OUT_DIR/11_routes.txt" 2>&1 || true
"$PHPBIN" -d opcache.enable_cli=0 spark namespaces > "$OUT_DIR/12_namespaces.txt" 2>&1 || true

# 2) Key config files (raw copies)
for f in app/Config/{App.php,Routes.php,Filters.php,Cookie.php,Security.php,Logger.php,Events.php}; do
  [ -f "$APP_ROOT/$f" ] && cp "$APP_ROOT/$f" "$OUT_DIR/$(basename "$f")"
done

# 3) ENV & server variables
if [ -f "$APP_ROOT/.env" ]; then
  sed -E 's/(APP_KEY|database.default.password|mail.password|SMTP_PASS|SCRAPEMAX_API_KEY|ALPHAVANTAGE_KEY|PLAiD_.*|ZAPier_.*)=[^ ]+/REDACTED=***REDACTED***/g' "$APP_ROOT/.env" > "$OUT_DIR/dotenv_redacted.txt"
fi

# 4) Web server front-controller & htaccess
[ -f "$APP_ROOT/public/index.php" ] && cp "$APP_ROOT/public/index.php" "$OUT_DIR/index.php"
[ -f "$APP_ROOT/public/.htaccess" ] && cp "$APP_ROOT/public/.htaccess" "$OUT_DIR/public_htaccess.txt"

# 5) Auth checks (grep summaries)
grep -RIn "redirect()->to\('/login" app > "$OUT_DIR/30_grep_login_redirects.txt" 2>/dev/null || true
grep -RIn "logged_in\(" app > "$OUT_DIR/31_grep_logged_in.txt" 2>/dev/null || true
grep -RIn "\['filter'\s*=>\s*'login" app/Config/Routes.php > "$OUT_DIR/32_grep_routes_loginfilter.txt" 2>/dev/null || true
grep -RIn "public \$globals" app/Config/Filters.php > "$OUT_DIR/33_filters_globals.txt" 2>/dev/null || true

# 6) Session & writable quick stats (no contents)
{
  echo "### writable perms"
  ls -ld writable
  find writable -maxdepth 2 -type d -printf '%M %u:%g %p\n' | sort
} > "$OUT_DIR/40_writable_perms.txt" 2>&1

# 7) Minimal runtime probe (optional)
echo "<?php echo json_encode(['uri'=>(string)service('request')->getUri(),'user'=>session('id')??null,'isLoggedIn'=>session('isLoggedIn')??false]);" \
  > "$OUT_DIR/probe.php"

echo "==> Diagnostics collected."
echo "-> Pack with: (cd \"$OUT_DIR/..\" && zip -r $(basename \"$OUT_DIR\").zip $(basename \"$OUT_DIR\"))"
