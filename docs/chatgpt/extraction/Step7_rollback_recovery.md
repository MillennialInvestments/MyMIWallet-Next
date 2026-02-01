<?php
/**
 * Step 7 — Rollback / Recovery
 *
 * This document defines the standard process for safely rolling back
 * or recovering from changes made as a result of a ChatGPT conversation.
 *
 * Step 7 exists because even well-planned changes can introduce risk.
 * This step ensures there is a defined, repeatable recovery path.
 *
 * ---------------------------------------------------------------------
 * Required Preconditions
 * ---------------------------------------------------------------------
 *
 * Step 7 may be invoked at any time AFTER Step 1a (Chat Archive Creation),
 * but it is most relevant after:
 *
 * - Step 2b (AIOps Execution) introduced automation/workers
 * - Step 3 (Codex Execution) introduced code changes
 * - Step 4 (MySQL Creation) introduced migrations/tables
 *
 * Step 7 MUST reference the archived chat as the source of truth.
 *
 * ---------------------------------------------------------------------
 * Purpose
 * ---------------------------------------------------------------------
 *
 * Step 7 exists to:
 *
 * - Provide an explicit rollback plan for code changes
 * - Provide an explicit rollback plan for DB migrations (when possible)
 * - Provide a disable/rollback plan for workers and automation
 * - Define recovery validation steps after rollback
 *
 * ---------------------------------------------------------------------
 * When to Trigger Rollback
 * ---------------------------------------------------------------------
 *
 * Rollback should be considered when any of the following occurs:
 *
 * - Production errors increase (500/503/504 spikes)
 * - Spark commands fail after deployment
 * - New database errors appear (missing columns, migration failures)
 * - UI/dashboard breaks or becomes unreliable
 * - Automation causes unexpected load or side effects
 * - Security issues are detected
 *
 * ---------------------------------------------------------------------
 * Rollback Strategy (Order of Operations)
 * ---------------------------------------------------------------------
 *
 * Rollback must follow this order unless explicitly overridden:
 *
 * 1) Disable automation/workers first (fastest risk reduction)
 * 2) Roll back code changes (revert commit(s))
 * 3) Roll back database changes (only if safe and explicitly planned)
 * 4) Clear caches and restart safe services (no-sudo safe approach)
 * 5) Validate stability and confirm metrics/logs normalize
 *
 * ---------------------------------------------------------------------
 * Automation / Worker Recovery Rules
 * ---------------------------------------------------------------------
 *
 * If workers/automation exist:
 *
 * - Provide a single toggle/flag to disable them immediately
 * - Prefer "disable" over "delete" to preserve forensic evidence
 * - Record the disable action in the chat archive
 *
 * Examples of disable mechanisms:
 * - Feature flag in config (recommended)
 * - Environment variable
 * - Cron disable (comment out / remove job)
 *
 * ---------------------------------------------------------------------
 * Code Rollback Rules
 * ---------------------------------------------------------------------
 *
 * Code rollback should be performed via Git revert:
 *
 * - Identify the commit(s) associated with the archived chat
 * - Revert only those commits where possible
 * - Avoid broad resets unless absolutely necessary
 *
 * Requirements:
 * - Rollback must be traceable to the chat archive
 * - Rollback action must be recorded in the archive
 *
 * ---------------------------------------------------------------------
 * Database Rollback Rules
 * ---------------------------------------------------------------------
 *
 * Database rollback is the highest risk and should be treated carefully.
 *
 * Rules:
 * - Prefer forward-fix migrations over destructive rollback
 * - If rollback is necessary, it must be explicitly approved
 * - Never drop tables or delete data without explicit approval
 *
 * If a rollback migration exists:
 * - Use the migration system and document the migration executed
 *
 * If no rollback migration exists:
 * - Create a forward-fix migration instead (preferred)
 *
 * ---------------------------------------------------------------------
 * Recovery Validation Checklist
 * ---------------------------------------------------------------------
 *
 * After rollback/recovery, validate:
 *
 * - Application loads without 500/503/504 errors
 * - Spark commands run successfully
 * - Critical dashboards load
 * - Email pipelines continue safely (if relevant)
 * - Logs show normalized error rates
 *
 * ---------------------------------------------------------------------
 * Documentation Enforcement
 * ---------------------------------------------------------------------
 *
 * The original chat archive MUST be updated with:
 *
 * - Rollback triggered: YES/NO
 * - Reason for rollback
 * - Actions taken (disable automation, revert commit(s), migrations)
 * - Validation results post-rollback
 * - Remaining issues or follow-up tasks
 *
 * ---------------------------------------------------------------------
 * Stop Conditions
 * ---------------------------------------------------------------------
 *
 * Rollback/recovery MUST STOP immediately if:
 *
 * - Data safety cannot be guaranteed
 * - Rollback requires destructive DB actions without approval
 * - Root cause is unclear and rollback could worsen the issue
 *
 * In these cases, the outcome must be:
 * - "Rollback Blocked" with explicit reasons and next steps
 *
 * ---------------------------------------------------------------------
 * Outcome
 * ---------------------------------------------------------------------
 *
 * Step 7 ensures every conversation-driven change has a safe, traceable,
 * and repeatable recovery plan to protect production stability.
 */
