# AIOPS INGEST JOB #10

## Goal
Analyze the instruction and produce minimal CI4-compatible code changes.

## Governance Context
- Risk Level: HIGH
- Governance Score: 95
- Manual Review Required: YES

## Targeting Hints (best-effort)
- app/Commands/Ollama/Health.php
- app/Commands/Ollama/Version.php
- app/Commands/Ollama/Ping.php
- app/Commands/Ollama/Diagnose.php
- app/Commands/Ollama/Models/ListModels.php
- app/Commands/Ollama/Models/ShowModel.php
- app/Commands/Ollama/Models/PullModel.php
- app/Commands/Ollama/Models/RmModel.php
- app/Commands/Ollama/Models/PruneModels.php
- app/Commands/Ollama/Models/EnsureModels.php
- app/Commands/Ollama/Generate.php
- app/Commands/Ollama/Chat.php
- app/Commands/Ollama/Embed.php
- app/Commands/Ollama/Queue/Push.php
- app/Commands/Ollama/Queue/Work.php
- app/Commands/Ollama/Queue/Stats.php
- app/Commands/Ollama/Policy/Check.php
- app/Commands/Ollama/Docs/Sync.php
- app/Config/Console.php
- app/Services/LLM/OllamaClient.php
- app/Config/Ollama.php
- app/Models/OllamaRunModel.php
- app/Models/OllamaQueueModel.php
- app/Models/OllamaSessionModel.php
- app/Commands/
- app/Models/
- app/Services/
- app/Services/AIOps/
- app/Database/Migrations/
- app/Views/
- app/Config/Logger.php


## Output Contract (STRICT)
Write outputs into:
- docs/_aiops/pr_ready/10/
Include:
- pr.md (title, summary, rationale, rollback, tests)
- patch/ (full replacement files OR unified diffs per file)
- risks.md
- tests.md

## Instruction
Spark Command Catalog: Full Ollama Control
Namespace / grouping

Command group label: Ollama - Control

Command prefix: ollama:*

All commands must support:

--json=1 for machine output

--timeout=30 (override per command)

--base-url=http://127.0.0.1:11434 (or from .env)

--dry-run=1 where meaningful

structured exit codes: 0 ok, 10 warning, 20 error, 30 critical

1) Connectivity + Health + Diagnostics
ollama:health

Checks endpoint reachability and returns readiness.

Usage: php spark ollama:health [--base-url=...] [--timeout=...] [--json=1]

Output: status, latency_ms, server_version (if available), last_error

ollama:version

Reports Ollama server/client version info (via HTTP headers or API).

Usage: php spark ollama:version [--json=1]

ollama:ping

Low-level ping to verify TCP + HTTP response; includes retry loop.

Usage: php spark ollama:ping [--retries=3] [--sleep-ms=250] [--json=1]

ollama:diagnose

One-shot operator report:

base-url, DNS/IP, port open, response codes, model dir, disk free, memory, CI env markers

Usage: php spark ollama:diagnose [--json=1] [--include-env=1]

ollama:logs

Shows last N lines of Ollama service logs as seen by your app (not systemd).

Usage: php spark ollama:logs [--tail=200] [--source=file|table] [--json=1]

2) Model Inventory + Lifecycle
ollama:models:list

Lists installed models.

Usage: php spark ollama:models:list [--json=1]

Output: name, digest, size, modified_at

ollama:models:show

Shows metadata for one model.

Usage: php spark ollama:models:show llama3.2:latest [--json=1]

ollama:models:pull

Pulls a model; streams progress; supports resumable behavior.

Usage: php spark ollama:models:pull llama3.2:latest [--json=1] [--progress=1]

ollama:models:rm

Removes a model locally.

Usage: php spark ollama:models:rm llama3.2:latest [--force=1] [--json=1]

ollama:models:prune

Removes unused/old models based on policy (age/disk threshold/allowlist).

Usage: php spark ollama:models:prune [--older-than-days=30] [--keep=llama3.2:latest,mxbai-embed-large:latest] [--max-disk-gb=20] [--json=1]

ollama:models:ensure

Ensures your required model set exists (pull missing).

Usage: php spark ollama:models:ensure [--profile=default|aiops|marketing|alerts] [--json=1]

Intended to back your “full control” ops flows.

ollama:models:export

Exports inventory to docs (and optionally DB) for governance.

Usage: php spark ollama:models:export [--to=docs|db|both] [--path=docs/_aiops/ollama/models.md]

3) Inference: Generate / Chat
ollama:generate

Single prompt → single response (optionally streamed).

Usage:

php spark ollama:generate --model=llama3.2:latest --prompt=... [--stream=1] [--temperature=0.2] [--top-p=0.9] [--max-tokens=800] [--json=1]

Output: text, token counts, latency, model, params, truncation flags

ollama:chat

Chat completion with messages; supports session IDs.

Usage:

php spark ollama:chat --model=llama3.2:latest --session=abc123 --system=... --user=... [--json=1]

php spark ollama:chat --model=... --messages-file=writable/ollama/messages.json [--json=1]

Options: --save-session=1, --load-session=1, --reset=1

ollama:stream

A “tee” style command: streams tokens to console and writes full transcript to file/DB.

Usage: php spark ollama:stream --model=... --prompt=... --out=writable/ollama/runs/<id>.txt

ollama:bench

Measures latency and throughput for a fixed prompt set (for capacity planning).

Usage: php spark ollama:bench --model=... --runs=10 --prompt-file=docs/_aiops/ollama/bench_prompts.txt [--json=1]

4) Embeddings + Retrieval Helpers
ollama:embed

Text → embedding vector.

Usage: php spark ollama:embed --model=mxbai-embed-large:latest --input=... [--json=1]

Output: vector_dim, vector_preview, latency_ms, token_count

ollama:embed:file

Embeds lines/sections from a file, writes vectors to DB (for your internal RAG).

Usage: php spark ollama:embed:file --model=... --file=docs/_inventory.md --chunk=800 --overlap=100 --store=db --json=1

ollama:rag:query

Given a query, returns top K chunks from your vector store + optionally runs a final answer call.

Usage: php spark ollama:rag:query --q=... --topk=8 [--answer=1 --model=llama3.2:latest] [--json=1]

5) Sessions + State + Governance
ollama:sessions:list

Lists recent sessions stored by your app.

Usage: php spark ollama:sessions:list [--limit=50] [--json=1]

ollama:sessions:show

Shows one session transcript + metadata.

Usage: php spark ollama:sessions:show abc123 [--json=1]

ollama:sessions:rm

Deletes a session record (DB) but not models.

Usage: php spark ollama:sessions:rm abc123 [--force=1]

ollama:policy:check

Validates that all calls comply with your governance rules:

allowed models, max tokens, PII redaction toggles, logging requirements

Usage: php spark ollama:policy:check [--profile=aiops] [--json=1]

ollama:policy:export

Writes current policy to docs for audit.

Usage: php spark ollama:policy:export --path=docs/_aiops/ollama/policy.md

6) Queue + Rate Limit + Reliability (Production Control)
ollama:queue:push

Queues a job (generate/chat/embed) into DB queue.

Usage: php spark ollama:queue:push --type=generate --model=... --payload-file=... [--priority=5] [--json=1]

ollama:queue:work

Worker that consumes queue jobs with concurrency controls.

Usage: php spark ollama:queue:work [--once] [--max=25] [--concurrency=2] [--lease-seconds=120] [--json=1]

ollama:queue:retry

Retries failed jobs.

Usage: php spark ollama:queue:retry [--older-than-minutes=10] [--limit=50]

ollama:queue:stats

Shows queue depth, failure rates, average latency, last errors.

Usage: php spark ollama:queue:stats [--json=1]

ollama:circuit:status

Shows circuit breaker state (open/half-open/closed), last trip reason.

Usage: php spark ollama:circuit:status [--json=1]

ollama:circuit:reset

Resets the breaker manually.

Usage: php spark ollama:circuit:reset [--force=1]

7) Model Authoring / Modelfiles / Registry Ops (Optional but “full control”)

If you intend to create custom models from Modelfiles:

ollama:modelfile:validate

Validates a Modelfile you store in repo.

Usage: php spark ollama:modelfile:validate --file=docs/_aiops/ollama/modelfiles/my_model.Modelfile

ollama:models:create

Creates a model from a Modelfile (calls Ollama create endpoint/CLI wrapper).

Usage: php spark ollama:models:create --name=mymiwallet-ops:latest --file=... [--json=1]

ollama:models:push

Pushes a model to a registry (if you use one).

Usage: php spark ollama:models:push myregistry/mymiwallet-ops:latest [--json=1]

8) Documentation + Inventory Integration
ollama:docs:sync

Regenerates docs under docs/_aiops/ollama/:

models inventory, policy, bench results, endpoint status

Usage: php spark ollama:docs:sync [--profile=aiops] [--json=1]

ollama:docs:inventory

Reads /docs/** and writes an embedding/metadata manifest for future RAG.

Usage: php spark ollama:docs:inventory [--path=docs] [--out=docs/_aiops/ollama/docs_manifest.json]

✅ What This Accomplishes

Defines a complete operator-grade command layer for Ollama: health, models, inference, embeddings, sessions, queues, policy, and docs/governance.

Makes Ollama controllable the same way you’re controlling AIOps/Chat: repeatable, logged, PR-friendly, and automatable.

Establishes a consistent CLI contract (--json, --timeout, exit codes) so AIOps can orchestrate it safely.

⚠️ Assumptions / Risks

Assumes your Ollama access is via HTTP base URL (recommended on DreamHost/no sudo). If you’re running Ollama elsewhere (LAN box), you’ll rely on OLLAMA_BASE_URL.

“Push/create” commands depend on whether you actually use a model registry and whether Ollama in your environment supports those operations.

Embedding + RAG commands assume you want a DB-backed vector store; if not, you can stub these as “docs only” until storage is ready.

Instructions for AIOPS to Complete This

Use this as the AIOps patch job content (paste into aiops:ingest --text=... style). Keep it as one objective with numbered tasks.

Create command tree

Add Spark commands under:

app/Commands/Ollama/Health.php

app/Commands/Ollama/Version.php

app/Commands/Ollama/Ping.php

app/Commands/Ollama/Diagnose.php

app/Commands/Ollama/Models/ListModels.php

app/Commands/Ollama/Models/ShowModel.php

app/Commands/Ollama/Models/PullModel.php

app/Commands/Ollama/Models/RmModel.php

app/Commands/Ollama/Models/PruneModels.php

app/Commands/Ollama/Models/EnsureModels.php

app/Commands/Ollama/Generate.php

app/Commands/Ollama/Chat.php

app/Commands/Ollama/Embed.php

app/Commands/Ollama/Queue/Push.php

app/Commands/Ollama/Queue/Work.php

app/Commands/Ollama/Queue/Stats.php

app/Commands/Ollama/Policy/Check.php

app/Commands/Ollama/Docs/Sync.php

Register them in app/Config/Console.php.

Implement a single client abstraction

Create:

app/Services/LLM/OllamaClient.php

supports: health(), listModels(), showModel(), pull(), rm(), generate(), chat(), embed()

HTTP: CI4 CURLRequest or Guzzle (your choice), strict timeouts, retries.

Logging: every call logs to bf_error_logs via your logger handler, with run_uuid.

Add config + env contract

.env keys:

OLLAMA_BASE_URL=http://127.0.0.1:11434

OLLAMA_DEFAULT_CHAT_MODEL=llama3.2:latest

OLLAMA_DEFAULT_EMBED_MODEL=mxbai-embed-large:latest

OLLAMA_TIMEOUT=30

OLLAMA_MAX_TOKENS=1200

OLLAMA_GOV_PROFILE=aiops

Add Config/Ollama.php with defaults + profiles: default|aiops|marketing|alerts.

Add DB tables (for “full control” features)

Migration(s):

bf_ollama_runs (id, run_uuid, type, model, params_json, prompt_hash, status, started_at, finished_at, latency_ms, token_in, token_out, error)

bf_ollama_sessions (session_id, title, model, messages_json, created_at, updated_at)

bf_ollama_queue (job_id, type, priority, payload_json, status, attempts, last_error, lease_until, created_at, updated_at)

Optional: bf_ollama_embeddings (doc_id, chunk_id, text, vector_json, dim, hash, created_at)

Ensure indexes for status, created_at, model.

Docs + governance

Write docs:

docs/_aiops/ollama/README.md (all commands and examples)

docs/_aiops/ollama/policy.md

docs/_aiops/ollama/models.md (auto-generated by ollama:models:export)

Add a “policy check” step AIOps can run before heavy jobs.

Acceptance checks (AIOps must run)

php spark ollama:health --json=1

php spark ollama:models:list --json=1

php spark ollama:generate --model=... --prompt=ping --json=1

php spark ollama:queue:push ... then php spark ollama:queue:work --once

php spark ollama:docs:sync

Instructions to Give Codex Simultaneously

Give Codex this exact scope and constraints:

Implement all Spark commands listed in “Spark Command Catalog”

Each command must:

use OllamaClient

accept --base-url, --timeout, --json

write a row in bf_ollama_runs for inference/embedding commands

log errors via log_message('error', ...) with run_uuid

Implement core files

app/Services/LLM/OllamaClient.php

app/Config/Ollama.php

app/Models/OllamaRunModel.php

app/Models/OllamaQueueModel.php

app/Models/OllamaSessionModel.php

Migrations for tables described above

docs/_aiops/ollama/README.md documenting every command with examples

CI4 + DreamHost constraints

No shelling out to ollama binary by default; use HTTP API.

If a CLI fallback is provided, it must be behind --allow-cli=1 and disabled by default.

PR output requirements

Place all new/changed files in correct app paths.

Provide a single PR that includes:

commands + services + models + migrations + docs

a short “How to test” section with the acceptance commands above

Quality gates

All commands must return non-zero exit code on failure.

--json=1 must always output valid JSON (even on errors).

No hardcoded paths; everything from config/env.

🔜 Next Actions (Codex-Independent)

Decide the base URL strategy you’re using in production:

Local Ollama on VPS (127.0.0.1:11434) or remote Ollama host on LAN/WAN.

Add these .env entries now (even before code) so the implementation is deterministic:

OLLAMA_BASE_URL

OLLAMA_DEFAULT_CHAT_MODEL

OLLAMA_DEFAULT_EMBED_MODEL

OLLAMA_TIMEOUT

OLLAMA_MAX_TOKENS

Run a quick reality check on your server to confirm Ollama is reachable from PHP:

curl -sS http://127.0.0.1:11434/api/tags (or your base URL)

Feed AIOps the build job using the “Instructions for AIOPS” section above as the ingest payload.