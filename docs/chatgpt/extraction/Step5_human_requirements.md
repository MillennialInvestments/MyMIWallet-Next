<?php
/**
 * Step 5 — Manual Requirements (Human-Required Actions)
 *
 * This document defines the standard process for identifying,
 * tracking, and completing any actions that REQUIRE human
 * involvement based on a completed ChatGPT conversation.
 *
 * Step 5 exists because not all work can or should be automated.
 * This step ensures human decisions, approvals, and external
 * actions are explicitly captured and not forgotten.
 *
 * ---------------------------------------------------------------------
 * Required Preconditions
 * ---------------------------------------------------------------------
 *
 * Step 5 MUST NOT run unless ALL of the following are true:
 *
 * - Step 1a (Chat Archive Creation) is complete
 * - Step 2a (AIOps Verification & Planning) is complete
 *
 * Optional but recommended:
 * - Step 3 (Codex Execution & Code Review) is complete
 * - Step 4 (MySQL Database Verification & Creation) is complete
 *
 * ---------------------------------------------------------------------
 * Purpose
 * ---------------------------------------------------------------------
 *
 * Step 5 exists to identify and document all tasks that:
 *
 * - Cannot be automated safely
 * - Require human judgment or approval
 * - Involve external systems, vendors, or services
 * - Require credentials, access, or permissions
 * - Require review, sign-off, or validation by a human
 *
 * This step prevents silent blockers and incomplete workflows.
 *
 * ---------------------------------------------------------------------
 * Manual Requirement Categories
 * ---------------------------------------------------------------------
 *
 * Manual requirements may include, but are not limited to:
 *
 * - Business or product decisions
 * - Legal or compliance review
 * - Security approvals
 * - Infrastructure or hosting changes
 * - Third-party account setup or configuration
 * - API key creation or rotation
 * - DNS, email, or domain changes
 * - UI/UX review and acceptance
 * - Data validation or sanity checks
 * - Go-live approval
 *
 * ---------------------------------------------------------------------
 * Identification Process
 * ---------------------------------------------------------------------
 *
 * Based on the archived chat, identify any tasks that:
 *
 * - Were discussed but not automated
 * - Were explicitly deferred to a human
 * - Were implied but not yet actioned
 * - Require confirmation before proceeding
 *
 * Each manual requirement MUST be explicitly listed.
 *
 * ---------------------------------------------------------------------
 * Required Output
 * ---------------------------------------------------------------------
 *
 * Step 5 MUST produce:
 *
 * - A clear list of manual action items
 * - For each item:
 *     - Description of the required action
 *     - Reason it requires human involvement
 *     - Who is responsible (if known)
 *     - Dependencies or prerequisites
 *     - Completion criteria
 *
 * ---------------------------------------------------------------------
 * Forbidden Actions
 * ---------------------------------------------------------------------
 *
 * - Automating manual requirements
 * - Creating workers or CRON jobs
 * - Writing or modifying code
 * - Making infrastructure or database changes
 *
 * Step 5 is documentation and accountability only.
 *
 * ---------------------------------------------------------------------
 * Documentation Enforcement
 * ---------------------------------------------------------------------
 *
 * All identified manual requirements MUST be recorded
 * in the original chat archive under a clearly labeled
 * section (e.g. "Manual Requirements" or "Human Actions").
 *
 * If no manual requirements exist, this MUST be explicitly stated.
 *
 * ---------------------------------------------------------------------
 * Completion Criteria
 * ---------------------------------------------------------------------
 *
 * Step 5 is considered complete when:
 *
 * - All manual requirements are listed
 * - Ownership is clear
 * - Completion criteria are defined
 *
 * Actual execution of manual tasks occurs OUTSIDE this step.
 *
 * ---------------------------------------------------------------------
 * Outcome
 * ---------------------------------------------------------------------
 *
 * Step 5 ensures that human responsibilities are visible,
 * intentional, and tracked alongside automated work,
 * preventing gaps between conversation and reality.
 */
