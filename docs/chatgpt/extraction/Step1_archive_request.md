ARCHIVE THIS CHAT

Create a markdown archive for this conversation.

CRITICAL OUTPUT RULES (DO NOT VIOLATE):
- Respond with ONE continuous markdown document
- DO NOT use code fences (```), tables, or boxed formatting
- DO NOT split content into multiple responses
- DO NOT add UI sections, callouts, or visual containers
- The response MUST be directly copy/pasteable into a .md file as-is
- Start the document at the first line and end at the last line (no preamble, no epilogue)

STORAGE RULES:
- Store under /docs/chatgpt/chats/
- Use subdirectory based on ChatGPT Project name
- If no project applies, use /docs/chatgpt/chats/default/
- Use filename format: YYYY-MM-DD--Title_With_Underscores.md

TITLE NORMALIZATION RULE (FILENAME ONLY):
- Preserve Title Case capitalization
- Replace spaces with _
- Replace & with and
- Do NOT include "Chat_Summary" in the filename
- This rule applies ONLY to the filename, not the markdown content

CONTENT REQUIREMENTS:
The markdown document MUST include the following sections,
in this exact order, using standard markdown headings (#, ##):

# Chat Summary: <Human-Readable Title>

## Context
Why this conversation was started and what problem it addressed.

## Scope
What was explicitly in-scope and out-of-scope.

## Key Decisions
Bullet list of decisions made.

## Work Completed
Describe what was accomplished.

### Files Created or Modified
Plain bullet list of file paths.

### Functionality Added or Changed
Plain bullet list (no tables).

## Database Impact
### Tables Required / Verified
Plain bullet list indicating existing vs new.

### Migrations Needed
Yes / No, with brief explanation.

## Commands / Automation
Spark commands, dashboards, CRON, or AIOps references (plain text).

## Validation Status
Manual testing status, automated testing status, blockers if any.

## Open Items / Next Steps
Unchecked task list using "- [ ]" format.

## Follow-Up Automation
State whether AIOps and/or Codex follow-up is planned, executed, or skipped.

ENFORCEMENT:
- Documentation only
- NO code implementation
- NO automation
- NO workers
- NO infrastructure changes

Produce the archive now following these rules exactly.
