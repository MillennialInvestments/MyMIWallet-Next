🧠 MyMI Unified Automation & Collaboration Framework
(Phone-First · Codex-Driven · GitHub-Backed · SSH-Controlled)

This framework defines how projects describe themselves, how work is executed, and how changes reach production — regardless of device.

🎯 ULTIMATE GOAL (NON-NEGOTIABLE)

“I can manage development, fixes, deployments, marketing, and users from my iPhone.”

That means:

No IDE required unless desired

No desk required

No manual diffing

No undocumented changes

No one-off fixes

Everything reproducible, scriptable, and auditable

SECTION 1 — SELF-TARGETING PROJECT EXTRACTION (FOUNDATION)

This replaces Step 1–3 permanently.

🔐 MASTER INSTRUCTIONS v3

(Self-Targeting + Collaboration-Aware)

Paste this into any ChatGPT Project to force it to describe itself and how it will be operated.

✅ STEP 1 — PROJECT IDENTITY + OPERATING CONTRACT
You are operating ONLY within the context of THIS ChatGPT Project.

You must:
- Review ONLY the conversation history in THIS project
- Review ONLY files uploaded in THIS project
- Review ONLY instructions and manifests present in THIS project

Hard rules:
- Do NOT rely on memory from other projects
- Do NOT assume shared infrastructure unless stated here
- Treat THIS project as a self-contained system

Deliverables for Step 1:

1. Project Identity
   - Project Name
   - Purpose (1 sentence)
   - Long-term Goal

2. Source of Truth
   - What in THIS project is authoritative
   - What is implied but not yet implemented
   - What is explicitly out of scope

3. Operating Contract (MANDATORY)
   Define how work happens in THIS project:
   - Allowed output types (code patches, SQL, scripts, docs, PRs)
   - Definition of Done
   - How errors are reported and fixed
   - How changes reach production
   - What automation is expected by default

Do NOT summarize the entire project yet.

✅ STEP 2 — COMPLETE INVENTORY (GROUND TRUTH)
Perform a full inventory of THIS project.

List EVERYTHING that exists or is implied, including:

- Systems / modules
- APIs and integrations
- Data stores and tables
- CRON jobs and scripts
- UI components
- Admin or user workflows
- Security mechanisms
- Logging and monitoring
- Marketing workflows
- User management workflows
- Known bugs or technical debt
- Planned or implied features

Rules:
- Do NOT judge or prioritize
- Do NOT merge items
- Mark each item with Status:
  Active | Planned | Deprecated | Blocked | Implied
- If a file or path is unknown, state “Not specified in project”

✅ STEP 3 — NORMALIZATION + COLLABORATION STANDARDS
Normalize THIS project into the following categories:

Platform
Architecture
Core Modules
Data Models / Tables
APIs & Integrations
Automation & CRON
UI / UX
Security
Logging & Monitoring
Performance & Scaling
Content / Media
Operations & Maintenance
Roadmap (Short / Mid / Long)
Collaboration Standards (REQUIRED)

Collaboration Standards MUST define:
- Codex workflow
- GitHub PR conventions
- SSH/phone-first operations
- Documentation standards
- Incident response flow
- Deployment strategy
- Security & secrets handling


This produces:

inventory.md

standards.md

the operating contract for that project

SECTION 2 — PHONE-FIRST OPERATING MODEL (THE CORE SHIFT)

This is the real transformation.

📱 Device Independence Standard

Everything must be operable via:

iPhone (ChatGPT + SSH)

Laptop (ChatGPT + SSH)

VS Code (optional, not required)

If a task cannot be done from a phone, it is incomplete.

🔁 Standard Execution Flow (ALWAYS)
Prompt (Phone)
   ↓
ChatGPT (analysis + instructions)
   ↓
Codex (code changes + docs)
   ↓
GitHub PR
   ↓
Automated or manual merge
   ↓
SSH / CRON / CI endpoint
   ↓
Live system

SECTION 3 — CONTROL PLANE (SSH + CRON + SCRIPTS)
🧠 Rule

Scripts are the API to your platform.

📂 REQUIRED SCRIPT STRUCTURE
scripts/
  ops/
    health_check.sh
    log_summarize_and_diff.sh
    deploy_pull_restart.sh
    run_cron_endpoint.sh
    create_codex_task.sh
  marketing/
    run_daily_marketing.sh
    generate_posts.sh
  users/
    audit_users.sh
    scrub_spam.sh


All scripts must:

Be runnable via SSH

Accept env vars

Be idempotent

Print machine-readable output

🔐 Auth & Safety

CRON endpoints use signed tokens

Scripts never expose secrets

Rate limits enforced

Read-only defaults where possible

SECTION 4 — CODEX AS YOUR ENGINEERING ARM
🧩 Codex Rules

Every change:

Starts with a Codex task

Results in a PR

Updates documentation

Is reversible

Is traceable

📁 REQUIRED DOC STRUCTURE
docs/
  ops/
    runbooks.md
    incidents.md
  codex/
    task_templates.md
    active_tasks.md
  sql/
    mysql.md
  projects/
    index.csv

🧠 Codex Playbooks (STANDARDIZED)

Codex must support:

Fix error from log summary

Add feature from spec

Refactor module safely

Generate tests

Update docs

Create PR

Validate deployment

SECTION 5 — MARKETING & USER MANAGEMENT (AUTOMATABLE)

Marketing and user ops are first-class citizens, not afterthoughts.

Marketing

CRON-driven ingestion

Manual override from phone

Preview → approve → distribute

Scriptable social distribution

Users

Audit scripts

Spam detection

Role enforcement

Metrics & alerts

SECTION 6 — THE PROJECT CONTROL CENTER (END STATE)

Once all projects follow this framework, you get:

A single registry of all projects

A single task table

A single dashboard

A single operating model

That’s your Base44-level control — but custom, owned, and extensible.

✅ WHAT WE DO NEXT (EXECUTION PLAN)
Phase 1 — Lock the framework

Apply this to one project (recommend: MyMI Daily Error Log & Analysis)

Phase 2 — Build the script pack

Health checks

Log diffing

CRON triggers

Deploy scripts

Phase 3 — Codex enforcement

Auto-docs

Auto-PRs

Auto-SQL

Phase 4 — Control Center UI

Project index

Task registry

Ops dashboard

🔒 SECTION 7 — ACCURACY, DRIFT PREVENTION & SAFETY RAILS (RECOMMENDED)

This section exists to prevent hallucinations, ambiguity, and undocumented divergence as scale increases.

7.1 Project Scope Guardrails (Critical)

Every task, response, or Codex instruction MUST explicitly declare:

Target Project Name

Target Environment (local | staging | prod)

Change Type (fix | feature | refactor | docs | ops | marketing)

Blast Radius (single module | shared lib | global)

If any of the above are missing, the task is considered invalid and must be re-issued.

7.2 Assumption Disclosure Rule

If ChatGPT or Codex must infer anything not explicitly stated in the project:

It must be labeled ASSUMPTION

It must list the evidence from the project

It must state how to validate or falsify it

No silent assumptions are allowed.

7.3 Unknowns Are First-Class Citizens

When information is missing, responses must say:

“Unknown (not specified in project)”

—not guess.

Unknowns should be logged as:

Planned

Blocked

Requires confirmation

This keeps inventories honest and auditable.

🧪 SECTION 8 — VERIFICATION & CONFIDENCE LEVELS

This ensures accuracy over speed.

8.1 Confidence Tagging (Required)

Each major output must include one of:

High confidence – directly supported by project artifacts

Medium confidence – implied but consistent

Low confidence – assumption pending validation

This is especially important when working from mobile.

8.2 “Dry Run First” Rule

Before any action that:

touches production

deploys code

modifies schemas

sends marketing content

affects users

There must be a dry-run output, showing:

What will change

Files affected

Commands that would run

Rollback path

🔁 SECTION 9 — ROLLBACK & RECOVERY STANDARD (NON-OPTIONAL)

Phone-first operations require instant reversibility.

9.1 Rollback Requirement

Every change must define:

How to undo it

How to restore last-known-good state

How to validate recovery

If rollback is not defined → change is incomplete.

9.2 Incident Auto-Escalation

Any of the following automatically trigger an incident workflow:

Repeated errors after deploy

CRON failures

Auth failures

API rate-limit exhaustion

Memory exhaustion

User-facing 500/504 errors

Incidents must:

Log

Notify

Create a Codex task

Generate a remediation PR

📱 SECTION 10 — MOBILE-FIRST COMMAND PATTERNS

This formalizes how you actually work from your phone.

10.1 One-Line Command Philosophy

Every operation should be triggerable via:

one SSH command
or

one HTTP endpoint
or

one Codex task prompt

If a task requires multiple manual steps, it must be scripted.

10.2 Canonical Prompt Templates (Recommended)

Examples you’ll reuse constantly:

“Analyze yesterday’s log summary and generate fix PR”

“Trigger marketing pipeline dry-run for today”

“Audit users and report anomalies”

“Deploy latest approved PR to prod”

These should live in:

docs/chatgpt/prompt_templates.md

🧭 SECTION 11 — GOVERNANCE & EVOLUTION OF THIS DOCUMENT

This ensures the framework itself stays accurate.

11.1 Versioning

This document should include:

Version number

Last updated date

Change summary

Example:

Version: 1.0.0
Last Updated: 2025-12-20

11.2 Change Control

Any modification to this framework must:

Be proposed as a Codex task

Be reviewed for conflicts

Be versioned

Be logged

No silent edits.

✅ TL;DR — ARE YOU “DONE”?

Yes — architecturally.
No — operationally (by design).

What you now have is:

A self-describing project system

A phone-first operating model

A Codex + GitHub execution pipeline

Guardrails against hallucination, drift, and chaos

A foundation for Base44-level control — but yours

🔥 WHAT I RECOMMEND NEXT (HIGH CONFIDENCE)

Append Sections 7–11 exactly as above

Create:

docs/chatgpt/prompt_templates.md


Run this framework on one project:
👉 MyMI Daily Error Log & Analysis

Then we build:

the first real script pack

the task registry table

the Project Control Center