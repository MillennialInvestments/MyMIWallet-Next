<?php
/**
 * Step 2a — AIOps Verification & Planning
 *
 * This document defines the standard AIOps process that runs
 * AFTER a chat has been archived using Step 1a.
 *
 * Step 2a is strictly verification and planning only.
 * NO execution, NO workers, and NO automation may occur in this step.
 *
 * ---------------------------------------------------------------------
 * Trigger Condition
 * ---------------------------------------------------------------------
 *
 * Step 2a is triggered AFTER:
 * - A chat archive markdown file has been created
 * - The archive represents a completed discussion
 *
 * Step 2a MUST NOT run unless Step 1a has completed.
 *
 * ---------------------------------------------------------------------
 * AIOps Follow-Up Task (Input Contract)
 * ---------------------------------------------------------------------
 *
 * AIOPS FOLLOW-UP TASK
 *
 * Based on the archived chat you just created:
 *
 * 1. Verify that all required files exist and are referenced correctly
 * 2. Verify Spark commands are discoverable and executable
 * 3. Identify any missing:
 *    - guards
 *    - validation
 *    - logging
 *    - config flags
 * 4. Identify any database tables that:
 *    - must exist
 *    - are assumed but not verified
 *    - require schema hardening
 *
 * Produce:
 * - A checklist of verification steps
 * - A list of recommended automated or semi-automated fixes
 * - NO code changes
 *
 * This output will be used as an AIOps execution plan.
 *
 * ---------------------------------------------------------------------
 * Allowed Actions (Step 2a)
 * ---------------------------------------------------------------------
 *
 * - File existence verification
 * - Path and namespace validation
 * - Spark command discovery checks
 * - Configuration and feature-flag inspection
 * - Database table and schema inspection (read-only)
 * - Identification of risks, gaps, or missing safeguards
 * - Identification of potential automation opportunities
 *
 * ---------------------------------------------------------------------
 * Forbidden Actions (Step 2a)
 * ---------------------------------------------------------------------
 *
 * - Creating workers
 * - Creating CRON jobs
 * - Writing or modifying code
 * - Running database migrations
 * - Writing to the database
 * - Executing background processes
 * - Enabling automation of any kind
 *
 * ---------------------------------------------------------------------
 * Required Output
 * ---------------------------------------------------------------------
 *
 * Step 2a MUST produce:
 *
 * - A verification checklist
 * - A prioritized list of recommendations
 * - Clear status indicating:
 *   - SAFE TO PROCEED
 *   - or BLOCKED (with reasons)
 *
 * ---------------------------------------------------------------------
 * Enforcement Rules
 * ---------------------------------------------------------------------
 *
 * - Planning only
 * - Documentation only
 * - NO execution
 * - NO workers
 * - NO automation
 *
 * ---------------------------------------------------------------------
 * Outcome
 * ---------------------------------------------------------------------
 *
 * Step 2a produces the authoritative AIOps planning artifact
 * that governs whether Step 2b (execution) may be requested.
 */
