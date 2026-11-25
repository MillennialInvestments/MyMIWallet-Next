# MyMI Wallet Platform

**Enterprise Fintech, Multi-Asset Budgeting & Options Trading Intelligence Platform**

- **Production URL:** [https://www.mymiwallet.com](https://www.mymiwallet.com)
- **Staging URL:** [https://staging.mymiwallet.com](https://staging.mymiwallet.com)
- **Centralized AIOps Gateway:** [https://aiops.timothyburks.com](https://aiops.timothyburks.com)
- **Runtime Target:** PHP 8.2 on Teddy's DreamHost VPS + `gq-ai01` execution stack
- **Framework:** CodeIgniter 4.7.6 full-stack with Shield RBAC, Myth auth compatibility, and Node.js chat daemon

---

## 1. System Architecture

MyMI Wallet delivers personal financial management, multi-asset digital wallets (checking, savings, credit, debt, crypto, investment), 12-metric options trading campaign analytics, real-world asset auctions, and subscription management.

```
┌────────────────────────────────────────────────────────────────────────┐
│                        MyMI Wallet Client Surfaces                     │
│    Web Views (CI4/Bootstrap)  •  Mobile App (Expo/React)  •  MCPs     │
└───────────────────────────────────┬────────────────────────────────────┘
                                    │ HTTP / WebSocket / stdio JSON-RPC
                 ┌──────────────────┴──────────────────┐
                 ▼                                     ▼
     ┌───────────────────────┐             ┌───────────────────────┐
     │    Web Controllers    │             │   MCP Agent Servers   │
     │   Shield/Myth RBAC    │             │  mymi-trading/platform│
     └───────────┬───────────┘             └───────────┬───────────┘
                 │                                     │ Fast CLI Bootstrap
                 ▼                                     ▼
     ┌─────────────────────────────────────────────────────────────┐
     │                Services & Business Logic Layer              │
     │  WalletService • OptionsScoring • Plaid • SolanaFeeReclaim │
     └──────────────────────────────┬──────────────────────────────┘
                                    │
                                    ▼
     ┌─────────────────────────────────────────────────────────────┐
     │                     Relational Database                     │
     │      MySQL 8.0 (Production)  /  SQLite (Fast Unit Tests)     │
     └─────────────────────────────────────────────────────────────┘
```

---

## 2. Core Operational & Release Invariants

These invariants are enforced by automated CI gates, pre-commit hooks, and deployment scripts:

1. **Never run plain `php spark migrate` in production:**
   - `ShieldIdentityBackfill` (`2026-10-26-180000`) is intentionally unapplied.
   - All migrations must be explicitly named via `MIGRATE='<names>' bash scripts/ops/deploy/mymi-release.sh activate <release_name>`.
2. **Form Action Gap Ratchet:**
   - [`tests/baseline/form-action-gaps.txt`](tests/baseline/form-action-gaps.txt) is an enforced **shrink-only ratchet**.
   - Verified via `bash tests/smoke/form-certification-smoke.sh` (current threshold: $\ge$ 300 PASS, $\le$ 17 FAIL).
3. **Zero Unsafe Database Queries:**
   - Every model query must specify deterministic limits (`->limit(...)` or `->paginate(...)`) on the same invocation line.
   - Verified via `php spark ops:model-limit:audit` (0 unsafe patterns required).
4. **Fail-Closed IDOR Protection:**
   - All mutation and private financial queries must resolve user identity strictly from the active session (`$this->cuID` or `auth()->id()`), never from client-supplied request bodies.
5. **Chat Service Permissions (`mymi-wallet-chat.service`):**
   - The Node.js chat service runs as a non-`www-data` user and requires directory readability (`o+rX`) and a symlinked `shared/chat.env` at `$R/chat/.env`.

---

## 3. Universal Model Context Protocol (MCP) Integration

MyMI Wallet includes native, stdio JSON-RPC 2.0 MCP servers that boot CodeIgniter 4 in **under 0.2 seconds** with strict `SOURCE_MUTATION=false` read-only guarantees:

- **`mymi-trading`** (`scripts/mcp/trading_mcp_server.py`): Market snapshots, options chain Greeks, scanner setups, strategy simulations, and 12-metric options campaign accounting.
- **`mymi-platform`** (`scripts/mcp/mymi_platform_mcp_server.py`): System runtime diagnostics, user telemetry, webhook alerts feed, membership catalogs, schema health, and architectural code audits.

### Supported Clients
Ready-to-paste configurations for **Google Antigravity, Anthropic Claude Desktop, OpenAI ChatGPT, VS Code, Cursor, and Cline** are fully documented in:
👉 [`docs/mcp/UNIVERSAL_MCP_INTEGRATION_GUIDE.md`](docs/mcp/UNIVERSAL_MCP_INTEGRATION_GUIDE.md)

---

## 4. Verification & Testing Suites

Execute test suites from the repository root:

```bash
# 1. MCP Unit Tests (14 tests, 115 assertions)
vendor/bin/phpunit tests/unit/Mcp/

# 2. Form Certification Smoke Suite & Ratchet Check
bash tests/smoke/form-certification-smoke.sh

# 3. Model Memory Safety & Limit Audit (0 findings)
php spark ops:model-limit:audit

# 4. Route Handlers Verification
php spark routes:verify-handlers

# 5. Schema & Migration Idempotency Lint (116 migrations, 240 models)
php scripts/ops/db/schema-migration-lint.php

# 6. Command Runtime Safety Audit
php spark ops:commands:audit && php spark ops:commands:lint
```

---

## 5. Deployment & Release Workflow

Deployments on `gq-ai01` follow an immutable release directory structure (`releases/<timestamp>-<sha>`) with automatic rollback and symlinked shared storage:

### Step 1: Deploy to Staging
```bash
sudo bash scripts/ops/staging/mymi-staging.sh deploy main
```

### Step 2: Run Staging Form Tests
```bash
sudo bash scripts/ops/staging/mymi-staging.sh form-test
```
*(Requires `FAIL 0` on live form submissions before proceeding to production).*

### Step 3: Build Production Release
```bash
sudo bash scripts/ops/deploy/mymi-release.sh build main
```

### Step 4: Activate Release
```bash
# Set MIGRATE only if new additive migrations are required:
sudo bash scripts/ops/deploy/mymi-release.sh activate <release_name>
```

---

## 6. Mobile Application (`mobile/`)

An Expo + React Native companion application is located under `mobile/`:

```bash
cd mobile
cp .env.example .env
npm install
npm run start
```
Refer to [`mobile/README.md`](mobile/README.md) for endpoint mappings and Expo authentication token workflows.

---

## 7. Centralized AIOps Configuration

MyMI Wallet integrates with Teddy's centralized AIOps gateway:

```dotenv
AIOPS_MODE=remote
AIOPS_BASE_URL=https://aiops.timothyburks.com
AIOPS_APP_KEY=mymiwallet
AIOPS_SHARED_SECRET=replace-with-shared-secret
AIOPS_REQUEST_TIMEOUT=30

OLLAMA_MODE=remote
OLLAMA_BASE_URL=https://ollama.timothyburks.com
OLLAMA_INTERNAL_BASE_URL=http://127.0.0.1:11434
OLLAMA_DEFAULT_CHAT_MODEL=qwen2.5-coder:0.5b
OLLAMA_DEFAULT_EMBED_MODEL=mxbai-embed-large:latest
```
