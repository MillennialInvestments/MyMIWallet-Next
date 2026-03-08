# Research Spark Commands

## Overview

This README documents Spark commands under `app/Commands/Research` and their operational dependencies.

## Operational Purpose

Provide operators and developers with command intent, dependencies, workflows, and recovery guidance.

## Command Inventory

- `research:alerts:cleanup` (Operational)
- `research:alerts:watchlist-import` (Operational)
- `research:data:compile` (Operational)
- `research:earnings:calendar` (Operational)
- `research:google:scan` (Operational)
- `research:google:scan` (Operational)
- `research:intelligence:signals` (Operational)
- `research:knowledge:build` (Operational)
- `research:news:collect` (Operational)
- `research:pipeline:run` (Automation)
- `research:reports:daily` (Operational)
- `research:reports:weekly` (Operational)
- `research:short-interest:scan` (Operational)

Indirect/supporting commands:
- `logs:summarize`
- `aiops:sql:check`

## Command Reference

### research:alerts:cleanup

**Purpose**  
No description provided.

**Usage**  
`php spark research:alerts:cleanup`

**Options**  
None documented.

**Services Used**  
None detected.

**Models Used**  
None detected.

**Tables Used**  
None detected.

**External APIs**  
None detected.

**Related Commands**  
`logs:summarize`, `aiops:sql:check`

**Expected Output**  
Command executes with status output and logs/errors based on runtime state.

**Example Execution**  
`php spark research:alerts:cleanup`

### research:alerts:watchlist-import

**Purpose**  
No description provided.

**Usage**  
`php spark research:alerts:watchlist-import`

**Options**  
None documented.

**Services Used**  
None detected.

**Models Used**  
None detected.

**Tables Used**  
`bf_watchlist_imports`, `bf_investment_trade_alerts`

**External APIs**  
None detected.

**Related Commands**  
`logs:summarize`, `aiops:sql:check`

**Expected Output**  
Command executes with status output and logs/errors based on runtime state.

**Example Execution**  
`php spark research:alerts:watchlist-import`

### research:data:compile

**Purpose**  
No description provided.

**Usage**  
`php spark research:data:compile`

**Options**  
None documented.

**Services Used**  
None detected.

**Models Used**  
None detected.

**Tables Used**  
`bf_market_snapshots`

**External APIs**  
`https://query1.finance.yahoo.com/v7/finance/quote?symbols=$symbol`

**Related Commands**  
`logs:summarize`, `aiops:sql:check`

**Expected Output**  
Command executes with status output and logs/errors based on runtime state.

**Example Execution**  
`php spark research:data:compile`

### research:earnings:calendar

**Purpose**  
Collect earnings calendar research items

**Usage**  
`php spark research:earnings:calendar`

**Options**  
None documented.

**Services Used**  
None detected.

**Models Used**  
None detected.

**Tables Used**  
None detected.

**External APIs**  
None detected.

**Related Commands**  
`logs:summarize`, `aiops:sql:check`

**Expected Output**  
Command executes with status output and logs/errors based on runtime state.

**Example Execution**  
`php spark research:earnings:calendar`

### research:google:scan

**Purpose**  
Scan Google for financial research links

**Usage**  
`php spark research:google:scan`

**Options**  
None documented.

**Services Used**  
None detected.

**Models Used**  
None detected.

**Tables Used**  
None detected.

**External APIs**  
`https://www.google.com/search?q=`

**Related Commands**  
`logs:summarize`, `aiops:sql:check`

**Expected Output**  
Command executes with status output and logs/errors based on runtime state.

**Example Execution**  
`php spark research:google:scan`

### research:google:scan

**Purpose**  
No description provided.

**Usage**  
`php spark research:google:scan`

**Options**  
None documented.

**Services Used**  
None detected.

**Models Used**  
None detected.

**Tables Used**  
None detected.

**External APIs**  
`https://www.google.com/search?q=`

**Related Commands**  
`logs:summarize`, `aiops:sql:check`

**Expected Output**  
Command executes with status output and logs/errors based on runtime state.

**Example Execution**  
`php spark research:google:scan`

### research:intelligence:signals

**Purpose**  
Generate trade-signal intelligence from research rankings and the financial knowledge graph

**Usage**  
`php spark research:intelligence:signals`

**Options**  
None documented.

**Services Used**  
None detected.

**Models Used**  
None detected.

**Tables Used**  
`bf_research_items`, `research`

**External APIs**  
None detected.

**Related Commands**  
`logs:summarize`, `aiops:sql:check`

**Expected Output**  
Command executes with status output and logs/errors based on runtime state.

**Example Execution**  
`php spark research:intelligence:signals`

### research:knowledge:build

**Purpose**  
Build financial knowledge graph

**Usage**  
`php spark research:knowledge:build`

**Options**  
None documented.

**Services Used**  
None detected.

**Models Used**  
None detected.

**Tables Used**  
`bf_investment_trade_alerts`, `bf_financial_news`, `bf_market_snapshots`

**External APIs**  
None detected.

**Related Commands**  
`logs:summarize`, `aiops:sql:check`

**Expected Output**  
Command executes with status output and logs/errors based on runtime state.

**Example Execution**  
`php spark research:knowledge:build`

### research:news:collect

**Purpose**  
No description provided.

**Usage**  
`php spark research:news:collect`

**Options**  
None documented.

**Services Used**  
`App\Services\Research\FinancialResearchService`

**Models Used**  
None detected.

**Tables Used**  
None detected.

**External APIs**  
`https://feeds.finance.yahoo.com/rss/2.0/headline?s=^GSPC`, `https://www.marketwatch.com/rss/topstories`, `https://www.reutersagency.com/feed/?best-topics=business-finance`

**Related Commands**  
`logs:summarize`, `aiops:sql:check`

**Expected Output**  
Command executes with status output and logs/errors based on runtime state.

**Example Execution**  
`php spark research:news:collect`

### research:pipeline:run

**Purpose**  
No description provided.

**Usage**  
`php spark research:pipeline:run`

**Options**  
None documented.

**Services Used**  
None detected.

**Models Used**  
None detected.

**Tables Used**  
None detected.

**External APIs**  
None detected.

**Related Commands**  
`logs:summarize`, `aiops:sql:check`

**Expected Output**  
Command executes with status output and logs/errors based on runtime state.

**Example Execution**  
`php spark research:pipeline:run`

### research:reports:daily

**Purpose**  
Generate daily market research report

**Usage**  
`php spark research:reports:daily`

**Options**  
None documented.

**Services Used**  
None detected.

**Models Used**  
None detected.

**Tables Used**  
`bf_financial_news`, `bf_investment_trade_alerts`, `bf_market_snapshots`

**External APIs**  
None detected.

**Related Commands**  
`logs:summarize`, `aiops:sql:check`

**Expected Output**  
Command executes with status output and logs/errors based on runtime state.

**Example Execution**  
`php spark research:reports:daily`

### research:reports:weekly

**Purpose**  
Generate weekly market research report

**Usage**  
`php spark research:reports:weekly`

**Options**  
None documented.

**Services Used**  
None detected.

**Models Used**  
None detected.

**Tables Used**  
`bf_financial_news`, `bf_investment_trade_alerts`

**External APIs**  
None detected.

**Related Commands**  
`logs:summarize`, `aiops:sql:check`

**Expected Output**  
Command executes with status output and logs/errors based on runtime state.

**Example Execution**  
`php spark research:reports:weekly`

### research:short-interest:scan

**Purpose**  
Scan short-interest candidates

**Usage**  
`php spark research:short-interest:scan`

**Options**  
None documented.

**Services Used**  
None detected.

**Models Used**  
None detected.

**Tables Used**  
None detected.

**External APIs**  
None detected.

**Related Commands**  
`logs:summarize`, `aiops:sql:check`

**Expected Output**  
Command executes with status output and logs/errors based on runtime state.

**Example Execution**  
`php spark research:short-interest:scan`

## Dependencies

| Relationship | Target | Type |
|---|---|---|
| `research:alerts:watchlist-import` | `bf_watchlist_imports` | Command → Table |
| `research:alerts:watchlist-import` | `bf_investment_trade_alerts` | Command → Table |
| `research:data:compile` | `bf_market_snapshots` | Command → Table |
| `research:data:compile` | `https://query1.finance.yahoo.com/v7/finance/quote?symbols=$symbol` | Command → API |
| `research:google:scan` | `https://www.google.com/search?q=` | Command → API |
| `research:google:scan` | `https://www.google.com/search?q=` | Command → API |
| `research:intelligence:signals` | `bf_research_items` | Command → Table |
| `research:intelligence:signals` | `research` | Command → Table |
| `research:knowledge:build` | `bf_investment_trade_alerts` | Command → Table |
| `research:knowledge:build` | `bf_financial_news` | Command → Table |
| `research:knowledge:build` | `bf_market_snapshots` | Command → Table |
| `research:news:collect` | `App\Services\Research\FinancialResearchService` | Command → Service |
| `research:news:collect` | `https://feeds.finance.yahoo.com/rss/2.0/headline?s=^GSPC` | Command → API |
| `research:news:collect` | `https://www.marketwatch.com/rss/topstories` | Command → API |
| `research:news:collect` | `https://www.reutersagency.com/feed/?best-topics=business-finance` | Command → API |
| `research:reports:daily` | `bf_financial_news` | Command → Table |
| `research:reports:daily` | `bf_investment_trade_alerts` | Command → Table |
| `research:reports:daily` | `bf_market_snapshots` | Command → Table |
| `research:reports:weekly` | `bf_financial_news` | Command → Table |
| `research:reports:weekly` | `bf_investment_trade_alerts` | Command → Table |

## Command Dependency Graph

```mermaid
graph TD
Research["Research Pipeline"]
Research --> research_alerts_cleanup["research:alerts:cleanup"]
Research --> research_alerts_watchlist_import["research:alerts:watchlist-import"]
Research --> research_data_compile["research:data:compile"]
Research --> research_earnings_calendar["research:earnings:calendar"]
Research --> research_google_scan["research:google:scan"]
Research --> research_google_scan["research:google:scan"]
Research --> research_intelligence_signals["research:intelligence:signals"]
Research --> research_knowledge_build["research:knowledge:build"]
Research --> research_news_collect["research:news:collect"]
Research --> research_pipeline_run["research:pipeline:run"]
Research --> research_reports_daily["research:reports:daily"]
Research --> research_reports_weekly["research:reports:weekly"]
```

## Execution Workflows

- `php spark research:alerts:cleanup`
- `php spark research:alerts:watchlist-import`
- `php spark research:data:compile`
- `php spark research:earnings:calendar`
- `php spark research:google:scan`
- `php spark research:google:scan`
- `php spark logs:summarize`
- `php spark aiops:sql:check`

## Operational Playbooks

**Investigate Application Failure**

- `php spark logs:doctor`
- `php spark ops:php:fpm:health`
- `php spark ops:server:nginx:status`
- `php spark spark:diagnose-503`

**Diagnose Database Issue**

- `php spark db:inventory`
- `php spark db:drift`
- `php spark aiops:sql:check`

## Troubleshooting

- Common failure: command not found in registry.
- Diagnostics: `php spark ops:commands:audit`, `php spark ops:commands:missing`.
- Recovery: repair namespace/PSR-4 and rerun command audit tools.

## Related Commands

- `aiops:sql:check`
- `logs:summarize`

## Console Registry Verification

- Console registry is auto-discovered in CI4; explicit `$commands` entries in `app/Config/Console.php` should be added for any commands that fail `ops:commands:missing`.
