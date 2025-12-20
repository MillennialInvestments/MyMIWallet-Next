#!/usr/bin/env bash
set -euo pipefail

ROOT="$(cd "$(dirname "$0")/.." && pwd)"
ENDPOINTS_FILE="$ROOT/scripts/cron_endpoints.json"
BASE_URL="https://www.mymiwallet.com"
DRY_RUN=0

while [[ $# -gt 0 ]]; do
  case "$1" in
    --base)
      BASE_URL="${2:-$BASE_URL}"
      shift 2
      ;;
    --dry-run)
      DRY_RUN=1
      shift
      ;;
    *)
      echo "Unknown argument: $1"
      exit 1
      ;;
  esac
done

if [[ ! -f "$ENDPOINTS_FILE" ]]; then
  echo "Endpoints file not found: $ENDPOINTS_FILE"
  exit 1
fi

CRON_SECRET_VALUE="${CRON_SECRET:-}"
if [[ -z "$CRON_SECRET_VALUE" && -f "$ROOT/.env" ]]; then
  CRON_SECRET_VALUE="$(php -r ' $path=getenv("ENV_PATH"); if (!is_file($path)) {exit(0);} $data=parse_ini_file($path,false,INI_SCANNER_RAW); if(isset($data["CRON_SECRET"])) echo $data["CRON_SECRET"];' ENV_PATH="$ROOT/.env" || true)"
fi
if [[ -z "$CRON_SECRET_VALUE" ]]; then
  echo "Warning: CRON_SECRET not set. Protected cron endpoints may reject requests."
fi

export CRON_SECRET_VALUE

echo "Using base URL: $BASE_URL"
[[ $DRY_RUN -eq 1 ]] && echo "(dry-run mode)"

mapfile -t endpoints < <(php -r '
  $file = $argv[1];
  $secret = getenv("CRON_SECRET_VALUE");
  if (!file_exists($file)) { fwrite(STDERR, "Missing endpoints file\n"); exit(1); }
  $json = json_decode(file_get_contents($file), true);
  if (!isset($json["endpoints"]) || !is_array($json["endpoints"])) { fwrite(STDERR, "Invalid endpoints file\n"); exit(1); }
  foreach ($json["endpoints"] as $ep) {
    $name = $ep["name"] ?? "unnamed";
    $method = strtoupper($ep["method"] ?? "GET");
    $path = $ep["path"] ?? "/";
    $headers = [];
    if (isset($ep["headers"]) && is_array($ep["headers"])) {
      foreach ($ep["headers"] as $k => $v) {
        $val = $v === "{{CRON_SECRET}}" ? $secret : $v;
        $headers[] = $k . ": " . $val;
      }
    }
    echo $name . "|" . $method . "|" . $path . "|" . implode(";;", $headers) . PHP_EOL;
  }
' "$ENDPOINTS_FILE")

for entry in "${endpoints[@]}"; do
  IFS='|' read -r name method path headers <<< "$entry"
  url="${BASE_URL%/}/${path#/}"
  echo "-> $name ($method $url)"

  header_args=()
  if [[ -n "$headers" ]]; then
    IFS=';;' read -ra hdrs <<< "$headers"
    for h in "${hdrs[@]}"; do
      [[ -n "$h" ]] && header_args+=(-H "$h")
    done
  fi

  if [[ $DRY_RUN -eq 1 ]]; then
    echo "   curl -X $method ${header_args[*]} \"$url\""
    continue
  fi

  status=$(curl -s -o /dev/null -w "%{http_code}" -X "$method" "${header_args[@]}" "$url" || true)
  echo "   status: $status"
  if [[ "$status" =~ ^[0-9]+$ ]]; then
    if [[ "$status" -ge 400 ]]; then
      echo "   ❌ Failed call for $name"
    fi
  else
    echo "   ❌ Request did not complete cleanly"
  fi
done
