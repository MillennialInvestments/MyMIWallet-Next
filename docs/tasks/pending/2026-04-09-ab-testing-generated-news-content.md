# Pending: A/B testing generated news content

## remaining work
- Add variant generation for summaries/CTA/hashtags.
- Track per-platform engagement against content variants.

## blockers
- Engagement telemetry fields are inconsistent by platform.

## dependencies
- Distribution adapters and analytics ingestion.

## recommended next implementation order
1. Define variant schema.
2. Ship experiment assignment logic.
3. Build engagement attribution reporting.
