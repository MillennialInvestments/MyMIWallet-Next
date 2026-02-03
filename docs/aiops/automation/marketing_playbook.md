# Marketing Automation Playbook

## Pipeline Tables
- `bf_marketing_temp_scraper` (raw marketing/news scrape staging)
- `bf_marketing_scraper` (normalized marketing/news records)
- `bf_marketing_posts` or `bf_marketing_generated_posts` (generated content drafts)
- `bf_marketing_discord_queue` (if enabled) / Discord job queues

## Spark Commands
- `php spark marketing:automation-audit` (audit automation expectations)
- `php spark news:audit` (validate news ingestion + summary generation)

## Definition of Done
- News/marketing emails or feeds land in `bf_marketing_temp_scraper`.
- Records are normalized into `bf_marketing_scraper`.
- Drafts are generated in the posts table with status fields updated.
- AIOps audit shows no missing stages.

## Dedupe Rules
- Deduplicate by source URL + title + published date.
- Prevent re-posting with platform-specific dedupe keys in outbound queues.

## Rate Limiting / Pacing
- Use batch sizes in scheduled jobs to prevent large bursts.
- Do not send more than one marketing post per channel per run unless explicitly configured.

## Platform Constraints
- Discord: max 2000 characters per message.
- LinkedIn: keep posts under ~1,300 characters for optimal delivery.
- X (Twitter): stay within 280 characters; include link shorteners if required.
- Facebook: avoid rapid posting; stagger posts with at least 10–15 minutes between.
