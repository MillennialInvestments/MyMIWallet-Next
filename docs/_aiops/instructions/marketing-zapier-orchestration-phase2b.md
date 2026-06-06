# Phase 2B: Social Export API + Queue UI Wiring

## Objective

Complete the practical wiring for the Phase 2 social export/Zapier/TBI Marketing orchestration foundation.

## Required Build

1. Add API endpoints:
- API/Management/createSocialExportJob/(:num)
- API/Management/queueApprovedSocialExports
- API/Management/sendZapierExport/(:num)
- API/Management/sendTbiMarketingExport/(:num)
- API/Management/getSocialExportJobs
- API/Management/getSocialDeliveryLogs
- API/Management/recordSocialPerformanceEvent

2. Add Management UI page:
- Management/Marketing/Social-Exports

UI must show:
- export jobs
- delivery logs
- payload preview
- status
- attempts
- last error
- manual JSON copy/export
- disabled-by-default Zapier/TBI send buttons

3. Add Spark commands:
- marketing:social:export-approved
- marketing:social:zapier-dispatch
- marketing:social:tbi-export

4. Safety:
- Zapier dispatch remains disabled unless MYMI_ZAPIER_EXPORT_ENABLED=true
- TBI export remains disabled unless MYMI_MARKETING_EXPORT_ENABLED=true
- missing secrets fail closed
- every attempt logs to bf_social_delivery_logs

5. Validation:
- php -l changed files
- php spark migrate
- php spark marketing:communities:smoke-test
- php spark marketing:social:orchestration-smoke-test
- php spark routes grep SocialExport/Zapier/TbiMarketing
- php spark revenue:scan

Write report:
- docs/_aiops/reports/marketing-zapier-orchestration-phase2b-report.md
