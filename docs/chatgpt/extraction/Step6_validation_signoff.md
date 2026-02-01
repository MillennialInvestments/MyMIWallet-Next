<?php
/**
 * Step 6 — Validation & Sign-Off
 *
 * This document defines the standard process for validating that all
 * required work from a ChatGPT conversation has been completed correctly
 * and is ready to be considered DONE.
 *
 * Step 6 is the final gate before a chat, feature, or change is formally
 * signed off and closed.
 *
 * ---------------------------------------------------------------------
 * Required Preconditions
 * ---------------------------------------------------------------------
 *
 * Step 6 MUST NOT run unless ALL applicable prior steps are complete:
 *
 * - Step 1a — Chat Archive Creation
 * - Step 2a — AIOps Verification & Planning
 * - Step 2b — AIOps Execution (if automation/workers were required)
 * - Step 3  — Codex Execution & Code Review (if code changes were required)
 * - Step 4  — MySQL Database Verification & Creation (if DB was involved)
 * - Step 5  — Manual Requirements (if human actions were identified)
 *
 * If any required step is incomplete, validation MUST FAIL.
 *
 * ---------------------------------------------------------------------
 * Purpose
 * ---------------------------------------------------------------------
 *
 * Step 6 exists to:
 *
 * - Confirm that all planned work has been completed
 * - Verify that no required steps were skipped
 * - Validate system behavior after changes
 * - Formally approve the outcome of the conversation
 *
 * This step prevents partially completed work from being treated as done.
 *
 * ---------------------------------------------------------------------
 * Validation Checklist
 * ---------------------------------------------------------------------
 *
 * Validation MUST confirm the following, as applicable:
 *
 * - All files referenced in the archive exist
 * - Spark commands (if any) are discoverable and runnable
 * - AIOps automation (if any) is behaving as expected
 * - Database tables and schemas are correct
 * - No new errors are present in logs
 * - UI or dashboards affected load correctly
 *
 * Validation may be:
 * - Manual
 * - Automated
 * - Or a combination of both
 *
 * ---------------------------------------------------------------------
 * Sign-Off Criteria
 * ---------------------------------------------------------------------
 *
 * A chat may be signed off ONLY when:
 *
 * - All required steps are complete
 * - All validation checks pass
 * - Any manual requirements are completed or explicitly deferred
 * - No blocking issues remain
 *
 * ---------------------------------------------------------------------
 * Required Output
 * ---------------------------------------------------------------------
 *
 * Step 6 MUST produce:
 *
 * - A clear validation result:
 *     - PASSED
 *     - FAILED
 * - A brief summary of what was validated
 * - Any remaining risks or follow-up notes
 *
 * ---------------------------------------------------------------------
 * Documentation Enforcement
 * ---------------------------------------------------------------------
 *
 * The original chat archive MUST be updated to include:
 *
 * - Validation status (PASSED / FAILED)
 * - Date of validation
 * - Who validated (human or system)
 * - Any remaining notes or exceptions
 *
 * ---------------------------------------------------------------------
 * Stop Conditions
 * ---------------------------------------------------------------------
 *
 * Step 6 MUST FAIL if:
 *
 * - Any required step is incomplete
 * - Validation cannot be performed
 * - Errors are detected without resolution
 *
 * A failed validation means the chat remains OPEN.
 *
 * ---------------------------------------------------------------------
 * Outcome
 * ---------------------------------------------------------------------
 *
 * Step 6 provides formal closure and confidence that the conversation,
 * decisions, and resulting work are complete, correct, and production-ready.
 */
