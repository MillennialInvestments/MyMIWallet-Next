🔁 MASTER INSTRUCTIONS
“Full Project Extraction & Standardized Summary”

Use these exact instructions inside each ChatGPT Project you’ve created.

✅ STEP 1 — ENTER THE PROJECT CONTEXT

Open the ChatGPT Project you want to document.

Start a new conversation in that project and paste:

You are operating ONLY within the context of this ChatGPT Project.

Your task is to:
- Review the entire conversation history
- Review all uploaded files
- Review all instructions, manifests, and system-level guidance
- Infer architecture, goals, workflows, and unfinished tasks

Do NOT rely on memory from other projects.
Treat this project as a self-contained system.

✅ STEP 2 — REQUEST A COMPLETE PROJECT INVENTORY

Paste exactly this:

Perform a full inventory of this project.

Identify and list:
1. The project’s purpose and long-term goal
2. Core systems or modules
3. Data sources (APIs, files, databases)
4. Automation workflows (CRON, scripts, pipelines)
5. UI or user-facing components
6. Background services or jobs
7. Security, logging, and monitoring mechanisms
8. Known bugs, technical debt, or blockers
9. Planned features or roadmap items
10. Any external integrations (APIs, platforms, tools)

Do not summarize yet.
First, identify everything that exists or is implied.

✅ STEP 3 — NORMALIZE INTO THE STANDARD STRUCTURE

Paste after Step 2 completes:

Normalize this project into the following standard categories:

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
Content / Media (if applicable)
Operations & Maintenance
Roadmap (Short / Mid / Long Term)

Ensure every item fits into one of these categories.
If something does not fit, create a new category and justify it.

✅ STEP 4 — GENERATE THE CSV MASTER SUMMARY

Paste this verbatim:

Generate a CSV-style master summary using the following columns:

Category,
Subcategory,
Component,
Description,
Status (Active | Planned | Deprecated | Blocked),
Primary Files / Modules,
Notes / Next Actions

Rules:
- Each row = one atomic responsibility or feature
- Status must be explicit
- Notes must include what is missing or next
- Output must be valid CSV
- No markdown tables
- No commentary outside the CSV

This CSV must be directly usable in a text editor.

✅ STEP 5 — VALIDATION PASS (CRITICAL)

Paste after CSV is produced:

Validate the CSV:

- Ensure no major subsystem is missing
- Ensure statuses are realistic
- Ensure Notes include actionable next steps
- Ensure terminology is consistent internally

If gaps exist, regenerate the CSV with corrections.

✅ STEP 6 — OPTIONAL DERIVATIVE OUTPUTS (RUN AS NEEDED)

You can optionally run any of these, one at a time:

📄 Convert to Markdown Tasks
Convert each CSV row into an individual markdown task file.

Use:
- Title = Component
- Body = Description + Notes
- Status badge
- Save path suggestion: /docs/not-complete/{component}.md

🗃️ Convert to SQL Import
Generate SQL to store this CSV into a table named project_task_registry.

Include:
- project_name
- category
- component
- status
- notes
- created_at

📊 Convert to Kanban CSV
Convert this CSV into a Kanban-friendly CSV with columns:

Backlog,
In Progress,
Blocked,
Completed

Distribute items based on Status.

✅ STEP 7 — NAME AND STORE THE OUTPUT

When finished, tell the project:

Name this output using the convention:

{ProjectName}_Master_Summary_{YYYY-MM-DD}

Confirm that this summary represents the full known scope of the project.

🧠 WHY THIS WORKS (IMPORTANT)

This process guarantees:

✅ Consistency across all projects

✅ No reliance on ChatGPT cross-project memory

✅ Importable into tools (Sheets, MySQL, Jira, GitHub, Notion)

✅ Codex-readable

✅ Future-proof documentation

It also lets you:

Compare projects side-by-side

Detect overlap or redundancy

Decide what to merge, archive, or accelerate

Feed everything into a single executive dashboard

🚀 NEXT (OPTIONAL, HIGH-VALUE)

If you want, I can:

Create a master index CSV that links all project summaries

Generate a script or prompt that auto-runs this process

Design a MyMI “Project Control Center” dashboard using this data

Create a Docs Enforcement Policy so no project drifts undocumented