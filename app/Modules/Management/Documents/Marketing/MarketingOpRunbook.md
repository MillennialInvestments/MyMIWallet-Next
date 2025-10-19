# MyMI Wallet — Marketing Ops Runbook (Chat Starter)

**Goal:** Ship daily, platform-native content (free-first) using summaries from `bf_marketing_scraper`, render with `bf_marketing_social_templates`, queue to `bf_marketing_post_queue`, auto-distribute via CRON/Zapier/CI4.

## Canonical Inputs
- Summaries: `bf_marketing_scraper` (cleaned, titled items only)
- Templates: `bf_marketing_social_templates` (this repo seeds)
- Queue: `bf_marketing_post_queue` (CRON publisher consumes)
- Campaign rules: New Year 2025 theme; free budgeting CTA; 60% off annual; promote Solana Exchange, Trade Tracker, Portfolio Manager, Asset Creator (coming soon).

## Posting Priorities (Free-first)
1) LinkedIn (profile + company) — pro tone, longer copy
2) X (Twitter) — short signals/insights
3) Discord — Alerts + Daily Digest to channels
4) StockTwits — no links; signal-only
5) TikTok/YouTube Shorts — 30–60s scripts auto-generated

## Variables the generator must fill
- `{headline}`, `{summary}`, `{insight}`, `{ticker}`, `{signal}`, `{one_liner}`, `{plan}`, `{risk}`, `{hook}`, `{beat1}`, `{beat2}`, `{beat3}`, `{overlay}`, `{script}`, `{cta_link}`, `{cta_spoken}`, `{hashtags}`

> **CTA policy:** Always prefer Free Budgeting Tool; mention 60% off annual plan when appropriate.

## Quality Gates (must pass before queueing)
- Non-empty title + summary
- Platform limits respected (`max_length`)
- **StockTwits**: `allow_links = 0` ⇒ strip links
- Profanity/sensitivity filter
- Deduplicate vs. last 48h posts per platform

## Output Contract
For each selected summary:
- Resolve template → produce `payload_body` (+ optional `payload_media`)
- Insert into `bf_marketing_post_queue` with `status='queued'` and reasonable `scheduled_at`
- Log decision + mapping (template_id, summary_id)

## CRON Expectations
- Publisher selects eligible rows: `status='queued' AND (scheduled_at IS NULL OR scheduled_at <= NOW())`
- Attempts post; sets `posting`→`posted` or `failed` (with `error_message`)
- Retries ≤ 3 with backoff; noisy-fail to Discord #ops

## PR Workflow for Codex
1. Scan repo + CI4 module for drift
2. Add/modify templates or generators safely
3. Include migrations if schema change
4. Provide exact file paths, patch chunks, and route additions
5. Open PR titled `marketing:auto-queue <date>`, attach migration logs
