# API Integration Research Report

- Start URL: https://github.com/MemPalace/mempalace
- Pages Scraped: 1

## Core Findings

### Authentication

- LongMemEval — retrieval recall (R@5, 500 questions): Mode R@5 LLM required Raw (semantic search, no heuristics, no LLM) 96.6% None Hybrid v4, held-out 450q (tuned on 50 dev, not seen during training) 98.4% None Hybrid v4 + LLM rerank (full 500) ≥99% Any capable model The raw 96.6% requires no API key, no cloud, and no LLM at any stage.
- Requirements Python 3.9+ A vector-store backend (ChromaDB by default) ~300 MB disk for the default embedding model No API key is required for the core benchmark path.

### Base Urls

- https://github.com/MemPalace/mempalace.git

### Rate Limits

- No clear references found.

### Pagination

- See each project's own research page for their published numbers.
- Please reload this page.

### Webhooks

- No clear references found.

### Formats

- The current default is ChromaDB; the interface is defined in mempalace/backends/base.py and alternative backends can be dropped in without touching the rest of the system.
- Install pip install mempalace mempalace init ~/projects/myapp Quickstart # Mine content into the palace mempalace mine ~/projects/myapp # project files mempalace mine ~/.claude/projects/ --mode convos # Claude Code sessions (scope with --wing per project) # Search mempalace search "why did we switch to GraphQL" # Load context for a new session mempalace wake-up For Claude Code, Gemini CLI, MCP-compatible tools, and local models, see mempalaceofficial.com/guide/getting-started.
- Reproducing every result: git clone https://github.com/MemPalace/mempalace.git cd mempalace pip install -e ".[dev]" # see benchmarks/README.md for dataset download commands python benchmarks/longmemeval_bench.py /path/to/longmemeval_s_cleaned.json Knowledge graph MemPalace includes a temporal entity-relationship graph with validity windows — add, query, invalidate, timeline — backed by local SQLite.

### Errors

- LongMemEval — retrieval recall (R@5, 500 questions): Mode R@5 LLM required Raw (semantic search, no heuristics, no LLM) 96.6% None Hybrid v4, held-out 450q (tuned on 50 dev, not seen during training) 98.4% None Hybrid v4 + LLM rerank (full 500) ≥99% Any capable model The raw 96.6% requires no API key, no cloud, and no LLM at any stage.
- Other benchmarks (full results in benchmarks/BENCHMARKS.md): Benchmark Metric Score Notes LoCoMo (session, top-10, no rerank) R@10 60.3% 1,986 questions LoCoMo (hybrid v5, top-10, no rerank) R@10 88.9% Same set ConvoMem (all categories, 250 items) Avg recall 92.9% 50 per category MemBench (ACL 2025, 8,500 items) R@5 80.3% All categories We deliberately do not include a side-by-side comparison against Mem0, Mastra, Hindsight, Supermemory, or Zep.
- There was an error while loading.

### Sandbox

- No clear references found.

### Sdk

- Reproducing every result: git clone https://github.com/MemPalace/mempalace.git cd mempalace pip install -e ".[dev]" # see benchmarks/README.md for dataset download commands python benchmarks/longmemeval_bench.py /path/to/longmemeval_s_cleaned.json Knowledge graph MemPalace includes a temporal entity-relationship graph with validity windows — add, query, invalidate, timeline — backed by local SQLite.
- Requirements Python 3.9+ A vector-store backend (ChromaDB by default) ~300 MB disk for the default embedding model No API key is required for the core benchmark path.
- Docs Getting started → mempalaceofficial.com/guide/getting-started CLI reference → mempalaceofficial.com/reference/cli Python API → mempalaceofficial.com/reference/python-api Full benchmark methodology → benchmarks/BENCHMARKS.md Release notes → CHANGELOG.md Corrections and public notices → docs/HISTORY.md Contributing PRs welcome.
- mempalaceofficial.com/ Topics python ai memory mcp llm chromadb Resources Readme License MIT license Contributing Contributing Security policy Security policy Uh oh!
- Languages Python 89.0% HTML 4.5% CSS 3.1% Vue 1.4% JavaScript 0.9% Shell 0.8% TypeScript 0.3% Footer © 2026 GitHub, Inc.

## MyMI Wallet Application Notes

- Use Services::curlrequest() or a dedicated library wrapper for endpoint calls in CI4.
- Store credentials in .env, never hardcode keys in controllers or views.
- Create a dedicated library under app/Libraries for this integration.
- Add request/response logging to bf_error_logs or your unified logger for failures.
- Use CRON-safe retry logic and rate limiting for batch ingestion.
- This integration likely supports simple API key auth via header or query parameter.

## Source URLs

- https://github.com/MemPalace/mempalace
