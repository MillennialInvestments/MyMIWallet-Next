# Phase 3A: Multi-Platform Social Content Generation Engine

## Objective

Build the content generation engine that turns a source idea/news item/alert/summary into native platform-ready drafts for:

- YouTube
- TikTok
- Twitch
- Discord
- Facebook
- LinkedIn
- X
- StockTwits

## Required Build

1. Add service:
- app/Services/SocialContentGenerationService.php

Required methods:
- generatePack(array $source): array
- generateForPlatform(string $platformKey, array $source): array
- saveGeneratedPack(array $pack, string $sourceType, int $sourceId = 0): array
- generateFromManualInput(string $topic, string $audience = 'beginner'): array

2. Use existing:
- bf_social_platforms
- bf_social_post_templates
- bf_social_generated_posts
- SocialPostFormatter

3. Add Spark commands:
- marketing:social:generate-pack
- marketing:social:generate-sample-pack
- marketing:social:generation-smoke-test

4. Add API endpoints:
- API/Management/generateSocialContentPack
- API/Management/generateSocialSamplePack
- API/Management/getGeneratedSocialPosts

5. Add Management UI:
- Management/Marketing/Social-Generator

UI should provide:
- topic input
- audience selector
- CTA selector
- generate preview
- save drafts
- list latest generated social posts

6. Safety:
- Save as draft only
- Never post externally
- Never queue to Zapier automatically
- Never assume investment advice; label outputs as educational content

7. Validation:
- php -l changed files
- php spark migrate
- php spark marketing:communities:smoke-test
- php spark marketing:social:orchestration-smoke-test
- php spark marketing:social:generation-smoke-test
- php spark revenue:scan

Write:
- docs/_aiops/reports/marketing-content-generation-phase3a-report.md
