# Phase 06B Patch Request — News Audit Placeholder Rejection Hardening

Generated UTC: 2026-06-12T11:42:45Z
Branch: feature/mymi-marketing-phase-06b-news-audit-placeholder-hardening
Target file: app/Commands/NewsAudit.php

## Objective
Patch news:audit so expected generic Thinkorswim all-symbol placeholder rejections are counted as expected rejections, not broken marketing-news pipeline records.

## Placeholder Subjects To Classify As Expected
- News alert for all symbols
- Press release alert for all symbols

## Current Problem
marketing:news:scrape is correctly rejecting generic all-symbol placeholders, but news:audit still reports those skipped records as SCRAPER_SKIPPED_LOGGED and fails the pipeline.

## Required Patch Behavior
1. Detect title/email_subject/subject matching the two generic placeholder subjects.
2. Treat those rows as expected placeholder rejections when source/sender metadata indicates Thinkorswim or tradealerts@mymiwallet.com.
3. Add an audit counter such as expected_placeholder_rejections.
4. Exclude those rows from broken record counts.
5. Keep true skipped/broken marketing-news records visible as failures.
6. Do not hide unrelated scraper issues.

## Validation Commands
- php -l app/Commands/NewsAudit.php
- php spark marketing:news:scrape --limit=10
- php spark news:audit
- php spark marketing:regression:smoke
- php spark marketing:daily-audit
- php spark marketing:audit:distribution
- php spark aiops:alerts-health
- php spark alerts:audit

## Protected Path
Do not delete or modify docs/01_Systematic_Standup/.
