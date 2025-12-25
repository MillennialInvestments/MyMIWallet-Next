# MyMI Wallet Go-Live Checklist

This checklist maps directly to `go_live_checklist_tracker.csv` and the Excel tracker. Use it as the canonical description for each launch-readiness verification step.

| Category | Module | Step ID | Step Description | Route or Component | Expected Outcome | Severity | Status |
| --- | --- | --- | --- | --- | --- | --- | --- |
| Authentication | Register | GL-AUTH-REGISTER-001 | User can successfully register | /register | Account created without errors | P0 | Not Started |
| Authentication | Register | GL-AUTH-REGISTER-002 | Verification email delivered and link activates account | /register/verify | Email verification completes within 60 seconds | P0 | Not Started |
| Authentication | Login | GL-AUTH-LOGIN-001 | Existing user can log in and reach dashboard | /login | Dashboard loads for valid credentials | P0 | Not Started |
| Authentication | Login | GL-AUTH-LOGIN-002 | Invalid login attempts are throttled and logged | /login | Rate-limits after repeated failures | P1 | Not Started |
| Authentication | Access Control | GL-AUTH-ACCESS-001 | Premium-only routes enforce role gating | Premium gating | Non-premium users are redirected with guidance | P1 | Not Started |
| Authentication | Access Control | GL-AUTH-ACCESS-002 | Sessions expire and re-auth gracefully | Session handling | Expired sessions prompt login without data loss | P2 | Not Started |
| Dashboard | Home | GL-DASH-HOME-001 | Dashboard renders KPIs and loads within SLO | /dashboard | Core metrics visible without errors | P0 | Not Started |
| Dashboard | Navigation | GL-DASH-HOME-002 | Primary navigation routes to all modules | Shell navigation | Links reach modules without 404s | P1 | Not Started |
| Budget | Setup | GL-BUDGET-SETUP-001 | User can create a first budget and save categories | /budget | Budget saved and persists on reload | P0 | Not Started |
| Budget | Forecast | GL-BUDGET-SETUP-002 | Forecast adjustments persist with correct math | /budget/forecast | Projections update and store correctly | P1 | Not Started |
| Budget | Alerts | GL-BUDGET-INSIGHTS-003 | Budget anomalies trigger alerts | /budget/alerts | Alerts fire when thresholds exceeded | P2 | Not Started |
| Investments & Watchlists | Watchlists | GL-INV-WATCHLIST-001 | User can add and remove tickers | /watchlists | Watchlist updates immediately and persists | P1 | Not Started |
| Investments & Watchlists | Portfolio | GL-INV-PORTFOLIO-002 | Holdings import or manual entry saves | /portfolio | Portfolio totals and positions are accurate | P0 | Not Started |
| Investments & Watchlists | Insights | GL-INV-INSIGHTS-003 | Trade insights load with fresh data | /insights | Signals render without stale data | P1 | Not Started |
| Alerts & Insights | Pipeline | GL-ALERTS-PIPELINE-001 | Market data ingestion and ETL running | Alerts pipeline | Latest data available for alerts | P0 | Not Started |
| Alerts & Insights | Notifications | GL-ALERTS-DELIVERY-002 | Alert notifications deliver via email/Discord | /alerts | Users receive alerts within SLA | P0 | Not Started |
| Alerts & Insights | History | GL-ALERTS-HISTORY-003 | Alert history renders with pagination | /alerts/history | Users can review past alerts | P2 | Not Started |
| Marketing & Community | Automation | GL-MKT-AUTOMATION-001 | Email scrape pipeline sanitizes data | /marketing/automation | Sanitized contacts ready for campaigns | P1 | Not Started |
| Marketing & Community | Campaigns | GL-MKT-CAMPAIGNS-002 | Campaign preview modal shows generated content | /marketing/campaigns | Approvals happen before send | P1 | Not Started |
| Marketing & Community | Education | GL-MKT-COMMUNITY-003 | Community/education resources reachable | /community | Content loads and tracks engagement | P2 | Not Started |
| Support & Reliability | Error Handling | GL-SUPPORT-ERRORS-001 | Custom error pages render for 4xx/5xx | /errors | Users see branded fallback with guidance | P1 | Not Started |
| Support & Reliability | Logging | GL-SUPPORT-LOGGING-002 | Error and audit logs captured in database | Logging pipeline | Operators can query incidents | P0 | Not Started |
| Support & Reliability | Rescue | GL-SUPPORT-RESCUE-003 | Account recovery and support contact flow works | /support/recovery | Users reach support and regain access | P0 | Not Started |
| Management Module | Go-Live Dashboard | GL-MGMT-GOLIVE-001 | Admin dashboard mirrors checklist | /management/go-live | All steps visible with filters | P0 | Not Started |
| Management Module | CSV Sync | GL-MGMT-GOLIVE-002 | CSV import updates statuses after validation | /management/go-live/import | DB reflects imported tracker | P0 | Not Started |
| Management Module | CSV Sync | GL-MGMT-GOLIVE-003 | CSV export preserves headers and status | /management/go-live/export | Snapshot matches DB | P1 | Not Started |
| Management Module | Audit | GL-MGMT-GOLIVE-004 | All status changes are audit-logged | /management/go-live | Admins can trace updates | P1 | Not Started |
| Operational Readiness | Gate | GL-OPS-READINESS-001 | Go-live gate blocks when P0 unverified | /go-live | No launch if blockers remain | P0 | Not Started |
| Operational Readiness | Runbook | GL-OPS-READINESS-002 | Launch day timeline available to teams | /go-live/timeline | Owners know sequencing | P1 | Not Started |
| Operational Readiness | Monitoring | GL-OPS-POST-003 | Post-launch monitoring dashboards live | /monitoring | Errors and performance visible | P1 | Not Started |
