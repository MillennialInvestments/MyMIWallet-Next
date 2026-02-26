# AIOPS INGEST JOB #7

## Goal
Analyze the instruction and produce minimal CI4-compatible code changes.

## Governance Context
- Risk Level: HIGH
- Governance Score: 80
- Manual Review Required: YES

## Targeting Hints (best-effort)
- app/Commands/Ops/Work.php
- app/Libraries/CacheKeySanitizer.php
- app/Config/Routes.php
- app/Commands/
- app/Controllers/
- app/Models/
- app/Services/
- app/Services/AIOps/
- app/Views/
- app/Config/Cache.php


## Output Contract (STRICT)
Write outputs into:
- docs/_aiops/pr_ready/7/
Include:
- pr.md (title, summary, rationale, rollback, tests)
- patch/ (full replacement files OR unified diffs per file)
- risks.md
- tests.md

## Instruction
AIOPS MASTER INSTRUCTION
Fix 2026-02-24 Log Summary Critical + Error Issues

Objective:
Eliminate all CRITICAL and ERROR-level issues from 2026-02-24 summarized logs and reduce WARNING-level deprecations that impact PHP 8.2+ compatibility.

AIOps must:

Parse log summary

Categorize by severity

Map each error to responsible file(s)

Generate patch diffs

Generate mysql.md

Generate PR description

Group all changes into a single cohesive PR

PHASE 1 — ANALYSIS MODE

Run:

php spark aiops:priority:build --source=logs --date=2026-02-24

Then:

Identify CRITICAL entries

Identify ERROR entries

Ignore DEBUG/INFO

Identify deprecations under WARNING

Target issues to fix:

PageNotFoundException (35 occurrences)

Cache key contains reserved characters {}()/@:

Missing table bf_squeeze_scorecards

Duplicate entry in bf_user_ip_history

str_starts_with(null) deprecation in app/Commands/Ops/Work.php

Store structured report in:

/docs/_aiops/reports/2026-02-24-log-review.md

PHASE 2 — CODE GENERATION REQUIREMENTS

AIOps must instruct Ollama to generate the following:

A. Cache Key Sanitization Layer

Create:
app/Libraries/CacheKeySanitizer.php

Modify:

DashboardController

BudgetController

Any service generating cache keys

Replace direct cache key usage with sanitized keys.

B. Database Table Creation

Generate mysql.md:

/docs/Github/temporary/mysql.md

With CREATE TABLE statement for:

bf_squeeze_scorecards

Using MySQL 8 compatible syntax.

C. Duplicate Insert Handling

Modify:
UserIpHistoryModel or related insert logic.

Use:
INSERT IGNORE
or
->ignore(true)

D. Deprecation Fix

Patch:

app/Commands/Ops/Work.php

Wrap str_starts_with calls with is_string guard.

E. Route Hardening

Add route aliases in:

app/Config/Routes.php

For:

Legal/Terms-And-Conditions

Legal/Privacy-Policy

Customer-Support

How-To-Guides

Premium-Features/*

Redirect to canonical controllers.

PHASE 3 — OLLAMA PROMPT FOR PATCH GENERATION

AIOps must send the following structured prompt to Ollama:

OLLAMA INSTRUCTION — PATCH GENERATION

You are generating a production-safe CodeIgniter 4 patch.

Context:
Fix CRITICAL and ERROR log issues from 2026-02-24.

Application:
MyMI Wallet
Framework: CodeIgniter 4.7
PHP: 8.2
Environment: DreamHost VPS (no sudo)
Database: MySQL 8

Required fixes:

Create CacheKeySanitizer library

Refactor DashboardController and BudgetController to sanitize cache keys

Add INSERT IGNORE handling for bf_user_ip_history

Fix str_starts_with(null) deprecation

Add Routes aliases for missing marketing/legal URLs

Generate mysql.md with bf_squeeze_scorecards CREATE TABLE

Constraints:

Do not modify unrelated logic

Do not introduce new dependencies

Use minimal diff footprint

Maintain PSR-4 compliance

Do not remove existing logging

Maintain existing services structure

Provide unified diffs grouped by file

Output clean file contents (not explanations)

Output format:

File Path

Full file contents (if new file)

Unified diff (if patch)

mysql.md content

PR description (Markdown)

PR title:
Fix: