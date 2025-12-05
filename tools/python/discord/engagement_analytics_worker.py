#!/usr/bin/env python3
"""Collect Discord engagement metrics and send summaries to CI4 or Discord.

This script intentionally keeps dependencies minimal; it can run with the stdlib only.
"""
import argparse
import json
import os
import sys
from collections import defaultdict
from datetime import datetime
from typing import Any, Dict, List
from urllib import request, error

CONFIG_KEYS = {
    "api_base",
    "cron_key",
    "discord_webhook_engagement",
    "discord_bot_token",
    "guild_id",
}


def load_config(path: str) -> Dict[str, Any]:
    data: Dict[str, Any] = {}
    if os.path.isfile(path):
        with open(path, "r", encoding="utf-8") as f:
            data.update(json.load(f))
    for key in CONFIG_KEYS:
        env_key = f"DISCORD_{key.upper()}"
        if env_key in os.environ:
            data[key] = os.environ[env_key]
    return data


def fetch_local_events(api_base: str, cron_key: str | None = None) -> List[Dict[str, Any]]:
    url = f"{api_base}/API/Discord/events"  # placeholder CI4 endpoint
    headers = {"User-Agent": "mymi-engagement-analytics/1.0"}
    if cron_key:
        headers["X-CRON-KEY"] = cron_key
    req = request.Request(url, headers=headers)
    try:
        with request.urlopen(req, timeout=15) as resp:
            payload = json.loads(resp.read().decode("utf-8"))
            return payload.get("events", []) if isinstance(payload, dict) else []
    except Exception as exc:  # pragma: no cover - network dependent
        print(f"[warn] falling back to empty events: {exc}", file=sys.stderr)
        return []


def summarize_events(events: List[Dict[str, Any]]) -> Dict[str, Any]:
    summary = defaultdict(int)
    for ev in events:
        chan = ev.get("channel_key") or "unknown"
        summary[f"messages:{chan}"] += 1
    total = sum(summary.values())
    return {"total_events": total, "per_channel": dict(summary)}


def format_summary(summary: Dict[str, Any]) -> str:
    lines = [f"📊 Engagement snapshot ({datetime.utcnow().isoformat()}Z)"]
    lines.append(f"Total events: {summary.get('total_events', 0)}")
    per_channel = summary.get("per_channel", {})
    for chan, count in per_channel.items():
        lines.append(f"• {chan.replace('messages:', '')}: {count} messages")
    return "\n".join(lines)


def post_webhook(webhook_url: str, content: str, dry_run: bool = False) -> bool:
    if dry_run:
        print(f"[dry-run] would post engagement summary: {content}")
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
    parser = argparse.ArgumentParser(description="Discord engagement analytics")
    parser.add_argument("--config", default="config.json")
    parser.add_argument("--dry-run", action="store_true")
    args = parser.parse_args()

    cfg = load_config(args.config)
    api_base = cfg.get("api_base")
    webhook = cfg.get("discord_webhook_engagement")

    if not api_base:
        print("[error] api_base is required", file=sys.stderr)
        return 1

    events = fetch_local_events(api_base, cfg.get("cron_key"))
    summary = summarize_events(events)
    text = format_summary(summary)

    if webhook:
        ok = post_webhook(webhook, text, dry_run=args.dry_run)
        print("[info] webhook post" if ok else "[warn] webhook failed")
    else:
        print(text)
    return 0


if __name__ == "__main__":
    sys.exit(main())
