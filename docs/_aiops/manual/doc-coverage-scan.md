## AIOps: Documentation Coverage Scan

Objective:
Identify all production PHP files that do not map to an existing documentation artifact.

Steps:
1. Scan app/Modules recursively
2. Ignore:
   - Views older than 18 months
   - *.orig.php
   - test pages
3. For each file:
   - Determine type (Controller | Model | Service | View)
   - Attempt fuzzy match against:
     - docs/modules/**
     - docs/controllers/**
     - docs/models/**
     - docs/services/**
4. If no match:
   - Append entry to docs/_aiops/gaps/doc-coverage.csv

CSV Columns:
- module
- file_path
- file_type
- suggested_doc_path
- priority (high if API or AIOps)
- confidence_score

Output:
- docs/_aiops/gaps/doc-coverage.csv
- docs/_aiops/reports/doc-coverage-summary.md
