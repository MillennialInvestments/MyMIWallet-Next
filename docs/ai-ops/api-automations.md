# AI API Automations

Each automation uses the AI Ops wrappers, respects caps, and writes usage/events. Inputs should be normalized and cached when eligible to avoid duplicate spend.

## Marketing generation (subsystem: `chatgpt_marketing`)
- **Purpose:** Summaries, social posts, hashtags.
- **Inputs:** Cleaned content/summary text, desired tone/persona, target platforms.
- **Outputs:** JSON payload with post variants, hashtags, and CTA suggestions.
- **Caching rules:** Cache on prompt signature for 6–24 hours; skip generation if cache hit.
- **Token ceilings:** Apply global per-request ceiling; jobs should batch multiple posts.
- **Skip rules:** If subsystem disabled or cap exceeded, return allow/deny reason and skip API call.

## Alert summarization (subsystem: `chatgpt_alerts`)
- **Purpose:** Alert summaries and scripts for notifications.
- **Inputs:** Alert payloads, symbols, risk notes.
- **Outputs:** Brief summary + script blocks.
- **Caching rules:** TTL 30–120 minutes; key on alert payload + model + params.
- **Token ceilings:** Use per-request ceiling; batch small alerts to reduce overhead.
- **Skip rules:** Deny when subsystem disabled or cap exceeded; log event.

## Analytics and weekly digests (subsystem: `chatgpt_analytics`)
- **Purpose:** Weekly insight generation and rollups.
- **Inputs:** Aggregated metrics, KPI tables, charts references.
- **Outputs:** Insight paragraphs and bullet highlights.
- **Caching rules:** TTL 24 hours; cache per KPI set.
- **Token ceilings:** Respect per-request ceiling; prefer chunked prompts for long data.
- **Skip rules:** Weekly job can return allow/deny reason without failing CRON.

## Docs alignment scan (subsystem: `codex_docs_alignment`)
- **Purpose:** Review `/docs` content and generate alignment report or refactor suggestions.
- **Inputs:** Document excerpts and file metadata.
- **Outputs:** Alignment notes, action items, or suggested diffs.
- **Caching rules:** Disabled by default; optional 15m TTL when enabled.
- **Token ceilings:** Use per-request ceiling; heavy jobs gated by subsystem toggle and master switch.
- **Skip rules:** Disabled by default; must be manually enabled and capped.

## GitHub PR review assist (subsystem: `aiGithubReviews`)
- **Purpose:** Track automated review usage; if API calls are made, they must be metered.
- **Inputs:** PR diffs, comments.
- **Outputs:** Review suggestions or structured feedback.
- **Caching rules:** Cache optional; depends on PR hash and model.
- **Token ceilings:** Respect global ceilings; treat as non-metered unless API used.
- **Skip rules:** Controlled by `aiGithubReviewsEnabled`; record events for overrides.

## Codex codegen (subsystem: `codex_codegen`)
- **Purpose:** Scaffolds, refactors, and tests for PR-driven flows.
- **Inputs:** File snippets, instructions, test expectations.
- **Outputs:** Proposed code blocks or diffs.
- **Caching rules:** OFF by default; optional 15m TTL when enabled.
- **Token ceilings:** Enforce per-request ceilings; prefer chunked requests.
- **Skip rules:** Deny if cap exceeded; only run on-demand or PR-triggered.
