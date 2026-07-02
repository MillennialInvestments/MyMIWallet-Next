#!/usr/bin/env bash
set -euo pipefail

ROOT_DIR="$(cd "$(dirname "${BASH_SOURCE[0]}")/.." && pwd)"
cd "$ROOT_DIR"

php spark security:csp:audit

if rg -n "unsafe-inline" app/Controllers app/Config app/Filters app/Views; then
  echo "CSP lint failed: unsafe-inline found."
  exit 1
fi

if rg --pcre2 -n "<script(?![^>]*\\bsrc=)(?![^>]*nonce=)" app/Views/errors app/Views/partials app/Views/blog app/Views/Dashboard app/Views/Auth app/Views/themes/public/layouts --glob '!*.js' --glob '!app/Views/themes/public/layouts/total-index.php' --glob '!app/Views/themes/public/layouts/_sitenav-new.php'; then
  echo "CSP lint failed: inline <script> without nonce found."
  exit 1
fi

if rg --pcre2 -n "<style(?![^>]*nonce=)" app/Views/errors app/Views/partials app/Views/blog app/Views/Dashboard app/Views/Auth app/Views/themes/public/layouts --glob '!*.js' --glob '!app/Views/themes/public/layouts/total-index.php' --glob '!app/Views/themes/public/layouts/_sitenav-new.php'; then
  echo "CSP lint failed: inline <style> without nonce found."
  exit 1
fi

if rg -n "\bon(?:click|change|load|submit|input)\s*=\s*['\"]" app/Views/errors app/Views/partials app/Views/blog app/Views/Dashboard app/Views/Auth app/Views/themes/public/layouts --glob '!*.js' --glob '!app/Views/themes/public/layouts/total-index.php' --glob '!app/Views/themes/public/layouts/_sitenav-new.php'; then
  echo "CSP lint failed: inline event handler found."
  exit 1
fi

if rg -n "\sstyle\s*=" app/Views/errors app/Views/partials app/Views/blog app/Views/Dashboard app/Views/Auth app/Views/themes/public/layouts --glob '!*.js' --glob '!app/Views/themes/public/layouts/total-index.php' --glob '!app/Views/themes/public/layouts/_sitenav-new.php'; then
  echo "CSP lint failed: style attribute found."
  exit 1
fi

echo "CSP lint passed."
