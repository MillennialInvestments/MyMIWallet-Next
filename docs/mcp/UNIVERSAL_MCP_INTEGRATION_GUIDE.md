# MyMI Wallet Universal Model Context Protocol (MCP) Integration Guide

Authoritative guide for connecting **MyMI Wallet Platform & Trading Intelligence MCP Servers** to external AI tools:
- **Google Antigravity**
- **Anthropic Claude (Desktop / CLI)**
- **OpenAI ChatGPT**
- **VS Code / Cursor / Cline / Roo Code**
- **TBI Solutions Centralized AIOps Gateway**

---

## 1. Architectural Architecture & Governance

MyMI Wallet implements a decoupled, high-performance MCP architecture utilizing CodeIgniter 4 CLI bootstrapping in under **0.2 seconds** with **strict zero-mutation guarantees**.

```
┌────────────────────────────────────────────────────────────────────────┐
│               External AI Assistants & Developer Environments           │
│   (Antigravity • Claude Desktop • ChatGPT • VS Code • Cursor • TBI)   │
└───────────────────────────────────┬────────────────────────────────────┘
                                    │ JSON-RPC 2.0 (stdio)
                 ┌──────────────────┴──────────────────┐
                 ▼                                     ▼
     ┌───────────────────────┐             ┌───────────────────────┐
     │      mymi-trading     │             │     mymi-platform     │
     │  trading_mcp_server   │             │ mymi_platform_mcp_srv │
     └───────────┬───────────┘             └───────────┬───────────┘
                 │ argv / fast bootstrap               │ argv / fast bootstrap
                 ▼                                     ▼
     ┌───────────────────────┐             ┌───────────────────────┐
     │  trading_bridge.php   │             │mymi_platform_bridge.php│
     └───────────┬───────────┘             └───────────┬───────────┘
                 │ CodeIgniter 4 Model Layer           │ CodeIgniter 4 Service Layer
                 ▼                                     ▼
     ┌─────────────────────────────────────────────────────────────┐
     │   MyMI Wallet Database, Options Pricing, Observability Logs  │
     │   (READ-ONLY • SOURCE_MUTATION=false • FAIL-CLOSED IDOR)    │
     └─────────────────────────────────────────────────────────────┘
```

### Core Invariants
1. **`SOURCE_MUTATION=false` & `read_only=true`:** Under no circumstances will any MCP tool execute database DDL/DML, file writes, or shell commands.
2. **Fail-Closed IDOR Protection:** User-scoped endpoints (budgets, profiles, wallets) strictly validate requested IDs and fail closed with zero information leakage if unauthenticated or invalid.
3. **Deterministic Memory Limits:** All model and database queries enforce row limits, eliminating out-of-memory risks.
4. **Data Provenance Contract:** Every tool response includes standardized provenance metadata (`provider`, `timestamp_utc`, `environment`, `read_only`, `mutation_allowed`).

---

## 2. Server Inventory & Capabilities

### Server A: `mymi-trading`
- **Location:** `scripts/mcp/trading_mcp_server.py`
- **Bridge:** `scripts/mcp/trading_bridge.php`
- **Purpose:** Financial market data, 12-metric options campaign accounting, options scanner, volatility analytics, and risk profiling.

| Tool Name | Parameters | Description |
|-----------|------------|-------------|
| `mymi.capabilities` | *none* | Discovers server capabilities, engine version, and market hours status. |
| `mymi.market_snapshot` | `symbols` (array) | Real-time / delayed quotes, bid/ask spreads, day ranges, volume. |
| `mymi.market_scan` | `min_iv_percentile`, `min_open_interest`, `max_dte`, `limit` | High-probability options trading setups from the scanner cache. |
| `mymi.options_chain` | `symbol`, `min_dte`, `max_dte`, `option_type` | Real-time options chains with Greeks (Delta, Gamma, Theta, Vega, IV). |
| `mymi.strategy_simulate` | `strategy`, `underlying_price`, `strikes`, `dte`, `iv` | P&L payoff curves and breakeven boundaries for option structures. |
| `mymi.portfolio_summary` | `user_id` | Account balance, buying power, open positions, net liquidating value. |
| `mymi.open_campaigns` | `user_id`, `status`, `limit` | Active 12-metric multi-leg option campaigns with recovered cash tracking. |
| `mymi.execution_history` | `user_id`, `symbol`, `limit` | Execution log and fills with OCC symbology disambiguation. |
| `mymi.campaign_performance` | `campaign_id` | Deep 12-metric audit ($C_{\text{rec}}$, $D_0$, $V_{\text{liq}}$, Net P&L). |
| `mymi.risk_check` | `user_id` | Portfolio Greeks exposure, concentration risk, and margin cushion. |
| `mymi.provider_health` | *none* | Latency and connection health of Polygon, Tradier, and DB backends. |

### Server B: `mymi-platform`
- **Location:** `scripts/mcp/mymi_platform_mcp_server.py`
- **Bridge:** `scripts/mcp/mymi_platform_bridge.php`
- **Purpose:** System runtime diagnostics, user telemetry, webhook alerts feed, membership tiers, database schema status, and architectural code audits.

| Tool Name | Parameters | Description |
|-----------|------------|-------------|
| `mymi.platform_status` | *none* | Runtime environment (CI4, PHP 8.2), database tables, migration status, emergency logs. |
| `mymi.user_profile` | `user_id` | Sanitized account status, username, email, creation date, and membership tier. |
| `mymi.budget_summary` | `user_id` | Active budget accounts, monthly planned vs actual cash flow, and categories. |
| `mymi.alerts_feed` | `limit`, `source` | Inbound trading webhook alerts (TradingView, custom signals, Discord/Telegram links). |
| `mymi.memberships_catalog` | *none* | Active membership tiers, subscription plans, pricing, and feature entitlements. |
| `mymi.ai_copilot_telemetry` | `user_id` | AI quota consumption, conversation counts, rate limits, and model routing. |
| `mymi.schema_inventory` | *none* | Full database schema health, migration inventory (116 files), model mapping (240 models). |
| `mymi.form_certification_audit` | *none* | Ratchet health of all 288 views, 270 forms, and 269 JS API endpoints. |
| `mymi.model_limit_audit` | *none* | Automated scan verifying 0 unbounded database model queries. |

---

## 3. Configuration by Client

Replace `/apps/TBI/repos/mymiwallet-next` with the absolute path to your repository clone on `gq-ai01` or your workstation.

### A. Google Antigravity
Config file location: `~/.gemini/antigravity/mcp_config.json` or `.agents/mcp_config.json`:

```json
{
  "mcpServers": {
    "mymi-trading": {
      "command": "python3",
      "args": ["/apps/TBI/repos/mymiwallet-next/scripts/mcp/trading_mcp_server.py"],
      "env": {}
    },
    "mymi-platform": {
      "command": "python3",
      "args": ["/apps/TBI/repos/mymiwallet-next/scripts/mcp/mymi_platform_mcp_server.py"],
      "env": {}
    }
  }
}
```

### B. Anthropic Claude Desktop
Config file location:
- **macOS:** `~/Library/Application Support/Claude/claude_desktop_config.json`
- **Linux:** `~/.config/Claude/claude_desktop_config.json`
- **Windows:** `%APPDATA%\Claude\claude_desktop_config.json`

```json
{
  "mcpServers": {
    "mymi-trading": {
      "command": "python3",
      "args": ["/apps/TBI/repos/mymiwallet-next/scripts/mcp/trading_mcp_server.py"]
    },
    "mymi-platform": {
      "command": "python3",
      "args": ["/apps/TBI/repos/mymiwallet-next/scripts/mcp/mymi_platform_mcp_server.py"]
    }
  }
}
```

### C. VS Code / Cursor / Cline / Roo Code
Config file location: `.vscode/mcp.json` or Cline Settings (`cline_mcp_settings.json`):

```json
{
  "mcpServers": {
    "mymi-trading": {
      "command": "python3",
      "args": ["${workspaceFolder}/scripts/mcp/trading_mcp_server.py"],
      "disabled": false,
      "autoApprove": [
        "mymi.capabilities",
        "mymi.market_snapshot",
        "mymi.market_scan",
        "mymi.provider_health"
      ]
    },
    "mymi-platform": {
      "command": "python3",
      "args": ["${workspaceFolder}/scripts/mcp/mymi_platform_mcp_server.py"],
      "disabled": false,
      "autoApprove": [
        "mymi.platform_status",
        "mymi.schema_inventory",
        "mymi.form_certification_audit",
        "mymi.model_limit_audit"
      ]
    }
  }
}
```

### D. OpenAI ChatGPT (Developer Actions / MCP Gateway)
For ChatGPT integrations via remote proxy or SSE relay:
Connect ChatGPT to your centralized AIOps gateway bridge (`https://aiops.timothyburks.com/mcp` or a local secure stdio-to-SSE tunnel) exposing the registered OpenAPI schemas generated by `mymi_platform_mcp_server.py`.

---

## 4. Verification & Health Checks

Run the automated test suite to ensure all bridges and servers are operational:

```bash
# 1. MCP Unit Test Suite (14 tests, 115 assertions)
vendor/bin/phpunit tests/unit/Mcp/

# 2. Direct CLI Bridge Verification
php scripts/mcp/mymi_platform_bridge.php mymi.platform_status '{}'
php scripts/mcp/trading_bridge.php mymi.capabilities '{}'

# 3. Model Limit Safety Check
php spark ops:model-limit:audit

# 4. Form Action Ratchet & Smoke Test
bash tests/smoke/form-certification-smoke.sh
```
