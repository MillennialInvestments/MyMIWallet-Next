 * Step 1a — Chat Archive Creation
 *
 * This document defines the standard process for archiving a completed
 * ChatGPT conversation into the repository.
 *
 * This step is documentation-only and must occur BEFORE any AIOps
 * or Codex follow-up work.
 *
 * ---------------------------------------------------------------------
 * Trigger Phrase (User Input)
 * ---------------------------------------------------------------------
 *
 * ARCHIVE THIS CHAT
 *
 * ---------------------------------------------------------------------
 * Archive Instructions (Standard)
 * ---------------------------------------------------------------------
 *
 * When the trigger phrase is received, create a markdown archive
 * for the completed conversation using the rules below.
 *
 * ---------------------------------------------------------------------
 * Storage Rules
 * ---------------------------------------------------------------------
 *
 * Base directory:
 *   /docs/chatgpt/chats/
 *
 * Subdirectory:
 *   - Use the ChatGPT Project name (slugged)
 *   - If no project applies, use:
 *     /docs/chatgpt/chats/default/
 *
 * ---------------------------------------------------------------------
 * Filename Rules (FILE TITLE ONLY)
 * ---------------------------------------------------------------------
 *
 * Format:
 *   YYYY-MM-DD--Title_With_Underscores.md
 *
 * Rules:
 *   - Preserve Title Case
 *   - Replace spaces with _
 *   - Replace & with and
 *   - Do NOT include "Chat_Summary" in the filename
 *   - These rules apply ONLY to the filename,
 *     not to the markdown content inside the file
 *
 * ---------------------------------------------------------------------
 * Required Archive Content
 * ---------------------------------------------------------------------
 *
 * The archive MUST include:
 *
 * - What the chat was about
 * - Scope (in-scope vs out-of-scope)
 * - Key decisions made
 * - Work completed
 *   - Files created or modified
 *   - Functionality added or changed
 * - Database impact
 *   - Tables required, verified, or assumed
 *   - Whether migrations are needed
 * - Commands or automation involved
 *   - Spark commands
 *   - CRON jobs
 *   - AIOps references
 * - Validation status
 * - Open items and next steps
 * - Follow-up automation intent (AIOps / Codex)
 *
 * ---------------------------------------------------------------------
 * Enforcement Rules
 * ---------------------------------------------------------------------
 *
 * - Documentation only
 * - NO code changes
 * - NO workers
 * - NO automation
 * - NO infrastructure changes
 *
 * ---------------------------------------------------------------------
 * Outcome
 * ---------------------------------------------------------------------
 *
 * This step produces the authoritative historical record
 * that all future AIOps and Codex actions must reference.
 */
