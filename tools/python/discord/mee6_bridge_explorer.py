#!/usr/bin/env python3
"""Explore Discord roles/members to document how MEE6 can be mirrored by MyMIDiscord.

The script does not assume any private MEE6 API; it only uses the Discord REST API when a bot token is provided.
"""
import argparse
import json
import os
import sys
from typing import Any, Dict, List
from urllib import request, error

CONFIG_KEYS = {"discord_mymi_ai_bot_token", "discord_bot_token", "guild_id", "api_base", "cron_key"}


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


def fetch_roles(guild_id: str, bot_token: str) -> List[Dict[str, Any]]:
    url = f"https://discord.com/api/v10/guilds/{guild_id}/roles"
    req = request.Request(url, headers={"Authorization": f"Bot {bot_token}", "User-Agent": "mymi-mee6-bridge/1.0"})
    with request.urlopen(req, timeout=15) as resp:  # pragma: no cover - network dependent
        return json.loads(resp.read().decode("utf-8"))


def compare_roles(discord_roles: List[Dict[str, Any]], plan_map: Dict[str, str]) -> str:
    lines = ["🔎 MEE6 bridge role coverage"]
    keyed = {r.get("id"): r.get("name") for r in discord_roles}
    for plan, role_id in plan_map.items():
        name = keyed.get(role_id, "(missing)")
        lines.append(f"• {plan}: {role_id} → {name}")
    return "\n".join(lines)


def main() -> int:
    parser = argparse.ArgumentParser(description="Inspect Discord roles for MEE6 bridge planning")
    parser.add_argument("--config", default="config.json")
    parser.add_argument("--plan-map", default="{}", help="JSON string of plan→role_id mappings")
    parser.add_argument("--dry-run", action="store_true")
    args = parser.parse_args()

    cfg = load_config(args.config)
    bot_token = cfg.get("discord_mymi_ai_bot_token") or cfg.get("discord_bot_token")
    guild_id = cfg.get("guild_id")
    plan_map = json.loads(args.plan_map)

    if not bot_token or not guild_id:
        print("[warn] discord_mymi_ai_bot_token (or legacy discord_bot_token) and guild_id are required to query Discord; exiting.")
        return 0

    try:
        roles = fetch_roles(guild_id, bot_token)
        report = compare_roles(roles, plan_map)
        print(report)
    except Exception as exc:  # pragma: no cover - network dependent
        print(f"[error] failed to load roles: {exc}", file=sys.stderr)
        return 1
    return 0


if __name__ == "__main__":
    sys.exit(main())
