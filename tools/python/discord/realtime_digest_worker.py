#!/usr/bin/env python3
"""Summarize recent alerts and post digest messages to Discord webhooks.

This script is intentionally lightweight so it can run under CRON or a simple process supervisor.
It relies on a CI4 HTTP endpoint (or DB view) that exposes the most recent alerts.
"""
import argparse
import json
import os
import sys
import time
from datetime import datetime, timedelta
from typing import Any, Dict, List
from urllib import request, error

CONFIG_KEYS = {
    "api_base",
    "cron_key",
    "discord_webhook_digest",
    "lookback_minutes",
}


def load_config(path: str) -> Dict[str, Any]:
    data: Dict[str, Any] = {}
    if os.path.isfile(path):
        with open(path, "r", encoding="utf-8") as f:
            data.update(json.load(f))
    # simple env overrides
    for key in CONFIG_KEYS:
        env_key = f"DISCORD_{key.upper()}"
        if env_key in os.environ:
            data[key] = os.environ[env_key]
    return data


def fetch_alerts(api_base: str, lookback: int, cron_key: str | None = None) -> List[Dict[str, Any]]:
    url = f"{api_base}/API/Discord/feed/alerts-recent?minutes={lookback}"
    headers = {"User-Agent": "mymi-realtime-digest/1.0"}
    if cron_key:
        headers["X-CRON-KEY"] = cron_key
    req = request.Request(url, headers=headers)
    try:
        with request.urlopen(req, timeout=15) as resp:
            body = resp.read().decode("utf-8")
            payload = json.loads(body)
            return payload.get("alerts", []) if isinstance(payload, dict) else []
    except error.URLError as exc:  # pragma: no cover - network dependent
        print(f"[warn] failed to fetch alerts: {exc}", file=sys.stderr)
        return []


def build_digest(alerts: List[Dict[str, Any]], window: int) -> str:
    if not alerts:
        return f"No alerts in the last {window} minutes."

    grouped: Dict[str, List[Dict[str, Any]]] = {}
    for alert in alerts:
        sym = str(alert.get("ticker") or alert.get("symbol") or "?").upper()
        grouped.setdefault(sym, []).append(alert)

    lines = [f"🚀 Alerts last {window}m ({len(alerts)} events across {len(grouped)} symbols)"]
    for sym, items in grouped.items():
        latest = max(items, key=lambda a: a.get("created_at") or "")
        price = latest.get("price") or latest.get("last")
        ts = latest.get("created_at") or latest.get("triggered_at") or ""
        lines.append(f"• {sym}: {len(items)} alert(s) – last {price} @ {ts}")
    return "\n".join(lines)


def post_webhook(webhook_url: str, content: str, dry_run: bool = False) -> bool:
    if dry_run:
        print(f"[dry-run] would post to webhook: {content}")
        return True
    body = json.dumps({"content": content}).encode("utf-8")
    req = request.Request(webhook_url, data=body, headers={"Content-Type": "application/json"})
    try:
        with request.urlopen(req, timeout=10) as resp:
            return 200 <= resp.getcode() < 300
    except error.URLError as exc:  # pragma: no cover - network dependent
        print(f"[error] webhook post failed: {exc}", file=sys.stderr)
        return False


def main() -> int:
    parser = argparse.ArgumentParser(description="Post Discord alert digests")
    parser.add_argument("--config", default="config.json")
    parser.add_argument("--lookback", type=int, default=None, help="Override lookback minutes")
    parser.add_argument("--dry-run", action="store_true")
    args = parser.parse_args()

    cfg = load_config(args.config)
    api_base = cfg.get("api_base")
    webhook = cfg.get("discord_webhook_digest")
    lookback = args.lookback or int(cfg.get("lookback_minutes", 15))

    if not api_base or not webhook:
        print("[error] api_base and discord_webhook_digest are required in config", file=sys.stderr)
        return 1

    alerts = fetch_alerts(api_base, lookback, cfg.get("cron_key"))
    digest = build_digest(alerts, lookback)
    print(f"[info] built digest at {datetime.utcnow().isoformat()}Z:\n{digest}")

    ok = post_webhook(webhook, digest, dry_run=args.dry_run)
    print("[info] posted" if ok else "[warn] post failed")
    return 0 if ok else 2


if __name__ == "__main__":
    sys.exit(main())
