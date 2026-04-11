# News Audit - Last Run

Run timestamp: 2026-04-11 18:43:45
Duration (ms): 179
Memory peak: 22.00 MB

## Executive Summary
Audit status: FAIL (0% valid pipeline).
Temp scanned: 250 | Final scanned: 250 | Posts scanned: 0.
Skipped: 0% | Broken: 100%.

## Breakdown by Issue Category
- SCRAPER_SOURCE_UNSUPPORTED: 248
- ROUTED_TO_INVESTMENT_QUEUE: 2
- SCRAPER_SKIPPED_UNLOGGED: 250
- SUMMARY_TOO_SHORT: 159
- KEYWORDS_MISSING: 222
- TFIDF_VECTOR_EMPTY: 222
- SUMMARY_MISSING: 9
- DUPLICATE_SOURCE_ID: 4

## Probable Root Causes
- Ingestion payloads missing normalized title/content fields or source identifiers.
- Summarization pipeline failing to persist summaries or keyword vectors.
- Post generator creating duplicate or orphaned posts without matching summaries.

## Files to Review
- app/Libraries/MyMIMarketing.php
- app/Services/MarketingService.php
- app/Models/MarketingModel.php
- app/Modules/Management/Controllers/MarketingController.php
- app/Commands/NewsAudit.php

## Recommended Fixes (Instructions Only)
- Verify ingestion sources populate title, content, source, and source_id for temp records.
- Ensure summaries and keyword arrays are stored for every eligible temp record.
- Enforce summary length bounds and keyword extraction success criteria.
- Add safeguards to prevent post generation when summaries are missing.
- De-duplicate posts by scraper_id and platform before inserting new posts.

> Do NOT auto-regenerate content or reprocess records during remediation.