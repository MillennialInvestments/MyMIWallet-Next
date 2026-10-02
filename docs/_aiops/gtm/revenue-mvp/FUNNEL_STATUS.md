# End-to-end funnel status (evidence at 80b9439)
| Stage | Status | Evidence / gap | Repair |
|---|---|---|---|
| Discovery / public demo | PARTIAL | `/Alerts/Preview/{symbol}`, `/Preview/Alert/{symbol}` (Routes 253-255, Home::previewAlert) | confirm free-vs-paid split (REV-S001) |
| Landing page for Alerts | MISSING | only generic `/Memberships`, home.php | REV-S007 |
| Offer/pricing | PARTIAL | `/Memberships` renders SiteSettings fees | REV-S007; OWNER pricing decision |
| Register | PARTIAL | `/register`, tests exist for auth only; GTM-017 | smoke only |
| Login | PARTIAL | `/login` | smoke |
| Terms/Privacy | PARTIAL | `/Legal/Terms-And-Conditions`, `/Legal/Privacy-Policy`, `/Privacy-Policy`, `/Terms-Of-Service` | smoke 200 |
| Checkout | BROKEN | beta mock card; client-set fee | REV-S004, EXTERNAL_PROVIDER_GATE |
| Payment success/failure | MISSING | no processor | REV-S004 |
| Membership/subscription record | UNKNOWN/MISSING | no writer found | REV-S004 |
| Entitlement | WORKING (read) | PremiumEntitlementService, premium_guard | REV-S003 add tests |
| Feature access | WORKING (gated) | AlertsController index/trades | REV-S003 |
| Data delivery | PARTIAL/REPAIRABLE | scanner, signals, ops job `alerts.process`; freshness display unverified | REV-S002/S005 |
| Alert delivery | CONNECTABLE | email/Discord processors exist; per-subscriber routing unverified | REV-S006 |
| Manage/cancel | MISSING | none found | REV-S004 |
| Failed payment | MISSING | | REV-S004 |
| Support/recovery | UNKNOWN | Support module exists, GTM-018 | smoke |
