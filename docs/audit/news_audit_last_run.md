# News Audit - Last Run

Run timestamp: 2026-02-05 02:49:07
Duration (ms): 263
Memory peak: 18.00 MB

## Executive Summary
Audit status: FAIL (0% valid pipeline).
Temp scanned: 233 | Final scanned: 250 | Posts scanned: 0.
Skipped: 0% | Broken: 100%.

## Breakdown by Issue Category
- SCRAPER_SKIPPED_UNLOGGED: 483
- SUMMARY_TOO_SHORT: 178
- KEYWORDS_MISSING: 250
- TFIDF_VECTOR_EMPTY: 250
- SUMMARY_MISSING: 13

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