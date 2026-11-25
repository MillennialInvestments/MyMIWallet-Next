#!/usr/bin/env python3
"""MyMI Wallet Platform & Operations MCP Server

Stdio JSON-RPC 2.0 MCP daemon for MyMI Wallet platform operations, diagnostics,
budget status, inbound alert webhooks, membership catalogs, schema health,
and architectural code audits.

Enables AI developer tools (Antigravity, Claude, ChatGPT, VS Code, Cursor) to
inspect and feed back MyMI Wallet system state with full provenance and zero mutation.

Governance Invariants:
- SOURCE_MUTATION=false
- Strictly READ-ONLY; no database mutations or arbitrary command execution.
- Provenance metadata attached to all outputs.
- Fail-closed IDOR security for user-specific data.
"""

import json
import os
import subprocess
import sys

REPO_ROOT = os.path.dirname(os.path.dirname(os.path.dirname(os.path.abspath(__file__))))
BRIDGE_SCRIPT = os.path.join(REPO_ROOT, "scripts", "mcp", "mymi_platform_bridge.php")

TOOLS = [
    {
        "name": "mymi.platform_status",
        "description": "Retrieve comprehensive runtime diagnostics: CodeIgniter version, PHP version, database connectivity, table count, applied migrations, emergency logs, and environment state.",
        "inputSchema": {
            "type": "object",
            "properties": {},
            "additionalProperties": False,
        },
    },
    {
        "name": "mymi.user_profile",
        "description": "Fetch sanitized profile metadata for a user (username, email, account status, creation date).",
        "inputSchema": {
            "type": "object",
            "properties": {
                "user_id": {
                    "type": "integer",
                    "description": "User ID to query (default: 3695 for staging tester)",
                },
            },
            "additionalProperties": False,
        },
    },
    {
        "name": "mymi.budget_summary",
        "description": "Retrieve active budget summary: active schedules, monthly income/expense estimates, net savings rate, and category allocation breakdown.",
        "inputSchema": {
            "type": "object",
            "properties": {
                "user_id": {
                    "type": "integer",
                    "description": "User ID to query (default: 3695)",
                },
            },
            "additionalProperties": False,
        },
    },
    {
        "name": "mymi.alerts_feed",
        "description": "Inspect registered 3rd-party webhook tokens (TradingView/TrendSpider/SMS), webhook URL endpoint, and recent inbound signal feed.",
        "inputSchema": {
            "type": "object",
            "properties": {
                "user_id": {
                    "type": "integer",
                    "description": "User ID to query (default: 3695)",
                },
                "limit": {
                    "type": "integer",
                    "description": "Maximum recent alerts to return (default: 10, max: 50)",
                },
            },
            "additionalProperties": False,
        },
    },
    {
        "name": "mymi.memberships_catalog",
        "description": "List all membership subscription tiers (Bronze, Silver, Gold, Platinum), pricing, feature flags, and supported payment gateways (PayPal, Solana Pay, CryptoPay).",
        "inputSchema": {
            "type": "object",
            "properties": {},
            "additionalProperties": False,
        },
    },
    {
        "name": "mymi.ai_copilot_telemetry",
        "description": "Query AI chat guest quota policies (5 questions/day/IP rate limiting) and test ticker intelligence extraction ($TICKER, CRYPTO/USD, OCC options symbology).",
        "inputSchema": {
            "type": "object",
            "properties": {
                "sample_text": {
                    "type": "string",
                    "description": "Optional text to parse for financial tickers and options symbols",
                },
            },
            "additionalProperties": False,
        },
    },
    {
        "name": "mymi.schema_inventory",
        "description": "Report database table inventory and row counts for core tables (bf_users, bf_users_budgeting, bf_user_alert_webhooks, bf_options_positions, etc.).",
        "inputSchema": {
            "type": "object",
            "properties": {},
            "additionalProperties": False,
        },
    },
    {
        "name": "mymi.form_certification_audit",
        "description": "Audit platform forms against the shrink-only ratchet baseline (tests/baseline/form-action-gaps.txt).",
        "inputSchema": {
            "type": "object",
            "properties": {},
            "additionalProperties": False,
        },
    },
    {
        "name": "mymi.model_limit_audit",
        "description": "Run the automated ops:model-limit:audit scanner and verify 100% compliance with bounded database query limits across all models and services.",
        "inputSchema": {
            "type": "object",
            "properties": {},
            "additionalProperties": False,
        },
    },
]


def run_bridge(tool_name: str, tool_args: dict) -> dict:
    cmd = ["php", BRIDGE_SCRIPT, tool_name, json.dumps(tool_args)]
    try:
        proc = subprocess.run(
            cmd,
            stdout=subprocess.PIPE,
            stderr=subprocess.PIPE,
            text=True,
            timeout=30,
            cwd=REPO_ROOT,
        )
        if proc.returncode != 0:
            err_msg = proc.stderr.strip() or f"Bridge process exited with code {proc.returncode}"
            return {
                "status": "error",
                "error": err_msg,
                "tool": tool_name,
                "read_only": True,
                "mutation_allowed": False,
            }
        output = proc.stdout.strip()
        try:
            return json.loads(output)
        except json.JSONDecodeError:
            return {
                "status": "error",
                "error": "Failed to parse bridge JSON output",
                "raw_stdout": output,
                "tool": tool_name,
            }
    except subprocess.TimeoutExpired:
        return {
            "status": "error",
            "error": "Bridge execution timed out after 30 seconds",
            "tool": tool_name,
        }
    except Exception as e:
        return {
            "status": "error",
            "error": str(e),
            "tool": tool_name,
        }


def send(msg: dict):
    sys.stdout.write(json.dumps(msg) + "\n")
    sys.stdout.flush()


def handle_request(req: dict):
    method = req.get("method")
    rid = req.get("id")

    if method == "initialize":
        send({
            "jsonrpc": "2.0",
            "id": rid,
            "result": {
                "protocolVersion": req.get("params", {}).get("protocolVersion", "2024-11-05"),
                "capabilities": {"tools": {}},
                "serverInfo": {
                    "name": "mymi-platform-mcp",
                    "version": "1.0.0",
                },
            },
        })
    elif method == "tools/list":
        send({
            "jsonrpc": "2.0",
            "id": rid,
            "result": {"tools": TOOLS},
        })
    elif method == "tools/call":
        params = req.get("params", {})
        tool_name = params.get("name")
        tool_args = params.get("arguments") or {}

        valid_names = {t["name"] for t in TOOLS}
        if tool_name not in valid_names:
            send({
                "jsonrpc": "2.0",
                "id": rid,
                "result": {
                    "content": [{"type": "text", "text": f"Error: Unknown tool '{tool_name}'"}],
                    "isError": True,
                },
            })
            return

        result = run_bridge(tool_name, tool_args)
        is_error = result.get("status") == "error"

        send({
            "jsonrpc": "2.0",
            "id": rid,
            "result": {
                "content": [
                    {
                        "type": "text",
                        "text": json.dumps(result, indent=2),
                    }
                ],
                "isError": is_error,
            },
        })
    elif method == "ping":
        send({"jsonrpc": "2.0", "id": rid, "result": {}})
    elif rid is not None:
        send({
            "jsonrpc": "2.0",
            "id": rid,
            "error": {"code": -32601, "message": f"Method not found: {method}"},
        })


def main():
    for line in sys.stdin:
        line = line.strip()
        if not line:
            continue
        try:
            req = json.loads(line)
            handle_request(req)
        except Exception as e:
            send({"jsonrpc": "2.0", "error": {"code": -32700, "message": str(e)}})


if __name__ == "__main__":
    main()
