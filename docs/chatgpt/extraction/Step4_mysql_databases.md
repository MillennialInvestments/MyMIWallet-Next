<?php
/**
 * Step 3 — Codex Execution & Code Review
 *
 * This document defines the standard process for handing off
 * approved work to Codex for implementation or code review.
 *
 * Step 3 is the ONLY step where Codex may write or modify code,
 * and only after proper archival and AIOps planning or execution.
 *
 * ---------------------------------------------------------------------
 * Required Preconditions
 * ---------------------------------------------------------------------
 *
 * Step 3 MUST NOT run unless ALL of the following are true:
 *
 * - Step 1a (Chat Archive Creation) is complete
 * - Step 2a (AIOps Verification & Planning) is complete
 * - If automation or workers were required:
 *     - Step 2b (AIOps Execution) is complete
 *
 * If any prerequisite is missing, Codex MUST STOP.
 *
 * ---------------------------------------------------------------------
 * REQUIRED Trigger Phrase (User Input)
 * ---------------------------------------------------------------------
 *
 * CODEX HANDOFF REQUEST
 *
 * Using:
 * - The archived chat markdown
 * - The AIOps verification or execution output
 *
 * Perform the approved work only.
 *
 * ---------------------------------------------------------------------
 * Codex Execution Rules
 * ---------------------------------------------------------------------
 *
 * Codex MUST:
 *
 * - Follow existing project architecture and conventions
 * - Follow CI4, PSR-4, and repository standards
 * - Limit changes strictly to the approved scope
 * - Prefer additive or minimal changes over refactors
 * - Reuse existing services, libraries, and helpers where possible
 *
 * ---------------------------------------------------------------------
 * Forbidden Actions
 * ---------------------------------------------------------------------
 *
 * Codex MUST NOT:
 *
 * - Implement speculative features
 * - Refactor unrelated code
 * - Expand scope beyond the approved plan
 * - Introduce new automation without Step 2b approval
 * - Modify infrastructure or deployment configuration
 *
 * ---------------------------------------------------------------------
 * Error Handling & Stop Conditions
 * ---------------------------------------------------------------------
 *
 * Codex MUST STOP immediately if:
 *
 * - Spark commands fail
 * - Autoloading errors occur
 * - Dependency installation fails
 * - Tests fail unexpectedly
 * - Required files or schemas are missing
 *
 * In all stop cases, Codex must:
 * - Report the failure
 * - Identify the blocking issue
 * - Propose next steps
 * - NOT continue execution
 *
 * ---------------------------------------------------------------------
 * Required Outputs
 * ---------------------------------------------------------------------
 *
 * Codex MUST produce:
 *
 * - A clear list of files changed
 * - A summary of what was implemented or reviewed
 * - Validation status (manual and/or automated)
 * - Any new open items or follow-up recommendations
 *
 * ---------------------------------------------------------------------
 * Archive Update Requirement
 * ---------------------------------------------------------------------
 *
 * After Step 3 completes, the original chat archive MUST be updated
 * to include:
 *
 * - Files modified or added
 * - Code paths affected
 * - Validation performed
 * - Remaining open items
 *
 * ---------------------------------------------------------------------
 * Outcome
 * ---------------------------------------------------------------------
 *
 * Step 3 produces approved, traceable code changes that are
 * permanently linked to a documented chat, an AIOps plan,
 * and an explicit execution request.
 */
