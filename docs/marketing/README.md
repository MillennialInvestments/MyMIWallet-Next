# Marketing Reference Library

This directory houses the authoritative reference library that fuels the MyMI Marketing automations. Every document here feeds the scrape → summarize → generate → distribute workflows that power campaign production and the executive dashboards.

## How to Use the Templates
1. Duplicate the campaign template in `_templates/CAMPAIGN_TEMPLATE.md` for any new initiative.
2. Populate the required YAML front-matter so dashboards and automations can ingest the metadata without manual mapping.
3. Complete each section with factual data sourced from the referenced modules, dashboards, and datasets.
4. Store screenshots, design assets, and downloadable files inside `_assets/` and link to them from the appropriate campaign doc sections.

## Update Cadence
Review every campaign doc at least once per month and after any major feature release. Update the `updated` field in the front-matter whenever revisions are made so the Management Dashboard can surface stale entries.

## Dashboard Integrations
The Management Dashboard and Marketing Engine ingest these docs at:
- `/management/marketing/campaigns`
- `/management/marketing/content-generator`
- `/management/marketing/distribution`
- `/management/marketing/compliance`

Ensure every doc remains consistent with those dashboard modules to keep automation outputs aligned with current messaging and compliance requirements.
