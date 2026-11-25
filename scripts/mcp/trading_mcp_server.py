#!/usr/bin/env python3
"""MyMI Wallet Trading Intelligence MCP Server

Stdio JSON-RPC 2.0 MCP daemon for MyMI Wallet research and trading intelligence.
Allows authorized AI clients (Antigravity, Claude, ChatGPT, etc.) to query market
snapshots, two-sided options scans, 100-pt research breakdowns, 12-metric campaign
accounting, residual runner risk, and authorized read-only portfolios.

Governance Invariants:
- SOURCE_MUTATION=false
- Strictly READ-ONLY; no financial execution, orders, transfers, or db mutations.
- Residual runners are economically funded, never reported as risk-free.
- User identity fail-closed IDOR security.
"""

import json
import os
import subprocess
import sys

REPO_ROOT = os.path.dirname(os.path.dirname(os.path.dirname(os.path.abspath(__file__))))
BRIDGE_SCRIPT = os.path.join(REPO_ROOT, "scripts", "mcp", "trading_bridge.php")

TOOLS = [
    {
        "name": "mymi.capabilities",
        "description": "Report MyMI Trading Intelligence MCP capabilities, supported asset classes, licensed providers (Alpha Vantage Premium, Finnhub, Stooq, FRED), and safety invariants (read-only, no trade execution).",
        "inputSchema": {
            "type": "object",
            "properties": {},
            "additionalProperties": False,
        },
    },
    {
        "name": "mymi.market_snapshot",
        "description": "Retrieve real-time market quote, 14D ATR, 20D RVOL, 5-day range, and price displacement efficiency for a stock or ETF.",
        "inputSchema": {
            "type": "object",
            "properties": {
                "ticker": {
                    "type": "string",
                    "description": "Ticker symbol (e.g. SPY, NVDA, TSLA, AAPL)",
                },
            },
            "required": ["ticker"],
            "additionalProperties": False,
        },
    },
    {
        "name": "mymi.market_scan",
        "description": "Scan weekly options universe with 5-part research breakdown (Technical Setup, Catalyst Quality, Execution Liquidity, Risk/Reward, Capital Suitability). Fails closed to NO TRADE below 70.0 score.",
        "inputSchema": {
            "type": "object",
            "properties": {
                "universe": {
                    "type": "array",
                    "items": {"type": "string"},
                    "description": "List of tickers to scan (default: NVDA, TSLA, AMD, COIN, SPY, QQQ, IWM)",
                },
                "strategy": {
                    "type": "string",
                    "enum": ["strangle", "straddle"],
                    "description": "Options strategy structure (default: strangle)",
                },
                "target_profit": {
                    "type": "number",
                    "description": "Target net profit in USD (default: 200.0)",
                },
                "call_debit": {
                    "type": "number",
                    "description": "Target debit per call share (default: 0.95)",
                },
                "put_debit": {
                    "type": "number",
                    "description": "Target debit per put share (default: 0.95)",
                },
                "min_rvol": {
                    "type": "number",
                    "description": "Minimum relative volume ratio (default: 1.2)",
                },
                "max_iv_rv": {
                    "type": "number",
                    "description": "Maximum IV/RV ratio (default: 1.8)",
                },
                "min_score": {
                    "type": "number",
                    "description": "Minimum composite score threshold for TRADE status (default: 70.0)",
                },
                "require_catalyst": {
                    "type": "boolean",
                    "description": "If true, rejects candidates lacking news/earnings catalyst",
                },
            },
            "additionalProperties": False,
        },
    },
    {
        "name": "mymi.options_chain",
        "description": "Retrieve options chain strikes around ATM with bids, asks, IV, delta, and Greeks estimates for a ticker and expiration.",
        "inputSchema": {
            "type": "object",
            "properties": {
                "ticker": {
                    "type": "string",
                    "description": "Underlying ticker symbol",
                },
                "expiry": {
                    "type": "string",
                    "description": "Expiration date (YYYY-MM-DD, default 5 days)",
                },
            },
            "required": ["ticker"],
            "additionalProperties": False,
        },
    },
    {
        "name": "mymi.strategy_simulate",
        "description": "Simulate two-sided options strategy sizing ($100 Call / $100 Put = $200 target balance), debit, breakeven moves, and profit reachability.",
        "inputSchema": {
            "type": "object",
            "properties": {
                "ticker": {
                    "type": "string",
                    "description": "Underlying ticker symbol",
                },
                "strategy": {
                    "type": "string",
                    "enum": ["strangle", "straddle"],
                    "description": "Strategy structure",
                },
                "call_strike": {
                    "type": "number",
                    "description": "Specific call strike (optional)",
                },
                "put_strike": {
                    "type": "number",
                    "description": "Specific put strike (optional)",
                },
                "call_debit": {
                    "type": "number",
                    "description": "Call debit per share (default: 0.95)",
                },
                "put_debit": {
                    "type": "number",
                    "description": "Put debit per share (default: 0.95)",
                },
                "target_profit": {
                    "type": "number",
                    "description": "Target net profit in USD (default: 200.0)",
                },
            },
            "required": ["ticker"],
            "additionalProperties": False,
        },
    },
    {
        "name": "mymi.portfolio_summary",
        "description": "Authorized read-only portfolio metrics (total positions, cost basis, market value, unrealized P&L). Scoped strictly to authenticated user_id.",
        "inputSchema": {
            "type": "object",
            "properties": {
                "user_id": {
                    "type": "integer",
                    "description": "Authorized user ID",
                },
            },
            "required": ["user_id"],
            "additionalProperties": False,
        },
    },
    {
        "name": "mymi.open_campaigns",
        "description": "Query active two-sided options campaigns with 12-metric accounting (debit, cash recovered, unrecovered net cost, liquidation value, net P&L, recovery %, and residual runner tracking).",
        "inputSchema": {
            "type": "object",
            "properties": {
                "user_id": {
                    "type": "integer",
                    "description": "Authorized user ID",
                },
            },
            "required": ["user_id"],
            "additionalProperties": False,
        },
    },
    {
        "name": "mymi.execution_history",
        "description": "Read normalized execution records and broker import transactions (Schwab, OCC options, equities) for an authorized user.",
        "inputSchema": {
            "type": "object",
            "properties": {
                "user_id": {
                    "type": "integer",
                    "description": "Authorized user ID",
                },
                "limit": {
                    "type": "integer",
                    "description": "Max records to return (default: 20)",
                },
                "symbol": {
                    "type": "string",
                    "description": "Filter by ticker symbol (optional)",
                },
            },
            "required": ["user_id"],
            "additionalProperties": False,
        },
    },
    {
        "name": "mymi.campaign_performance",
        "description": "Analyze aggregate campaign performance, debit committed, cash recovered, recovery percentages, and residual runner counts.",
        "inputSchema": {
            "type": "object",
            "properties": {
                "user_id": {
                    "type": "integer",
                    "description": "Authorized user ID",
                },
            },
            "required": ["user_id"],
            "additionalProperties": False,
        },
    },
    {
        "name": "mymi.risk_check",
        "description": "Audit portfolio risk exposure against $200 campaign budget limits, unrecovered capital at risk, and verify that residual runners are accounted as carrying full loss risk.",
        "inputSchema": {
            "type": "object",
            "properties": {
                "user_id": {
                    "type": "integer",
                    "description": "Authorized user ID",
                },
                "proposed_debit": {
                    "type": "number",
                    "description": "Proposed entry debit in USD to evaluate against limits",
                },
            },
            "required": ["user_id"],
            "additionalProperties": False,
        },
    },
    {
        "name": "mymi.provider_health",
        "description": "Check health, latency, token configuration, and licensed tier across data providers (Alpha Vantage Premium, Finnhub, Stooq).",
        "inputSchema": {
            "type": "object",
            "properties": {},
            "additionalProperties": False,
        },
    },
]


def run_bridge(tool_name: str, args: dict) -> dict:
    """Execute tool call via php scripts/mcp/trading_bridge.php."""
    cmd = ["php", BRIDGE_SCRIPT, tool_name, json.dumps(args)]
    try:
        proc = subprocess.run(
            cmd,
            cwd=REPO_ROOT,
            stdout=subprocess.PIPE,
            stderr=subprocess.PIPE,
            text=True,
            timeout=45,
        )
        if proc.returncode != 0:
            return {
                "status": "error",
                "error": f"PHP Bridge returned exit code {proc.returncode}: {proc.stderr.strip()}",
                "provenance": {
                    "provider": "TradingBridge Error",
                    "timestamp_utc": "",
                    "read_only": True,
                },
            }

        stdout = proc.stdout.strip()
        # Find first '{' in case of any trailing messages
        idx = stdout.find("{")
        if idx != -1:
            stdout = stdout[idx:]
        return json.loads(stdout)
    except subprocess.TimeoutExpired:
        return {
            "status": "error",
            "error": "Tool execution timed out after 45 seconds.",
            "provenance": {"provider": "TradingBridge Timeout", "read_only": True},
        }
    except Exception as e:
        return {
            "status": "error",
            "error": f"Failed to execute bridge: {str(e)}",
            "provenance": {"provider": "TradingBridge Exception", "read_only": True},
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
                    "name": "mymi-trading-intelligence",
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
