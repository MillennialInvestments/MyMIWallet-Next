# Technology Investor Integrations (MyMI Wallet + CI4)

Last Updated Source Snapshot: 2025-12-29  
Purpose: Use “Technology Investor” category + growth signals (“Customer Increase”) to prioritize integrations that accelerate acquisition, onboarding, retention, and monetization inside MyMI Wallet.

---

## 1) What “Technology Investor” Data Means (in MyMI terms)

The dataset represents a catalog of technologies (CRMs, marketing automation, analytics, payment tools, widgets, etc.) with a “Customer Increase” metric over a chosen time period. In MyMI Wallet, we treat this as:

- **Market Signal**: which tools are growing fastest and likely adopted by our target users/partners
- **Integration Priority**: which providers to build first to increase distribution + conversion
- **Partnership Intelligence**: which ecosystems to join (marketplaces, partner programs, integration directories)

---

## 2) Where This Fits in the MyMI Wallet Ecosystem

### Primary Modules Impacted
- **Marketing**: campaign creation, drip sequences, newsletter distribution, UTM analytics, social scheduling
- **User/CRM**: lead capture, onboarding journeys, support tickets, lifecycle tags
- **Analytics**: attribution, cohort analysis, funnel conversion, event tracking
- **Alerts**: notifications + community distribution (Discord/email) tied to engagement events
- **Projects**: partner/investor pipeline (B2B) and referral programs

### Existing Libraries to Leverage
- `MyMIMarketing`: content generation + distribution pipelines
- `MyMIAnalytics`: event tracking + dashboards
- `MyMIAlerts`: alert pipelines, notifications, cron processing
- `MyMIUser`: user profile + identity utilities

---

## 3) Integration Architecture (CI4-friendly)

### A) Integration Styles We Support
1. **OAuth2 + REST API** (preferred)
   - Connect provider account → store tokens → sync contacts/events
2. **Webhooks** (preferred for real-time)
   - Provider pushes events → MyMI receives → stores → triggers automations
3. **Zapier / Make Bridge**
   - Used when the provider API is complex or we want faster rollout
4. **Email Parsing**
   - Useful for campaign reports, notification digests, or “no API” platforms
5. **CSV Import/Export**
   - Fallback for onboarding partner lists, legacy CRMs

### B) Storage + Processing Pattern
- **MySQL** is source of truth for integration connections and event logs
- **Redis** caches:
  - provider metadata (rate limits, schemas)
  - last sync cursors
  - common “connected accounts” lookups
- **Queue + CRON**
  - CRON schedules “sync jobs”
  - queue workers process provider calls under rate limits

---

## 4) Suggested MySQL Tables (Blueprint)

### `bf_integrations_accounts`
Stores connected provider accounts per user/org.
- id, user_id, provider (hubspot/salesforce/etc)
- auth_type (oauth2/api_key/webhook_only)
- access_token (encrypted), refresh_token (encrypted), expires_at
- scopes, status, last_connected_at, last_sync_at

### `bf_integrations_webhooks`
Stores webhook configuration + verification data.
- id, provider, secret_hash, status
- created_at, updated_at

### `bf_integrations_events`
Normalized event log (provider → MyMI).
- id, provider, event_type, external_id
- payload_json, user_id (nullable), email (nullable)
- received_at, processed_at, status, error_message

### `bf_integrations_sync_jobs`
Tracks scheduled and queued sync tasks.
- id, provider, user_id, job_type (contacts/deals/campaigns/events)
- cursor, status, attempts, next_run_at, started_at, finished_at

---

## 5) Category Integration Playbook

### Analytics & Tracking
Goal: know what users do, where they came from, and what converts.
- Add “event capture” endpoints in MyMI (`/API/Analytics/event`)
- Support UTM + referral code storage on registration
- Sync downstream conversions back to CRMs (lead status, lifecycle stage)

### CRM
Goal: unify leads, customers, partners into a single view.
- Map CRM objects into MyMI:
  - Contacts → MyMI Users/Leads
  - Deals → Subscriptions / partner contracts
  - Tickets → Support module (or bf_support_* tables)
- Enable two-way sync for lifecycle stage + tags

### Marketing Automation
Goal: onboarding and retention sequences triggered from MyMI.
- Trigger workflows from:
  - registration
  - budget completion
  - watchlist creation
  - premium upgrade
  - inactivity threshold
- Push tags/segments to provider (e.g., “BudgetComplete”, “InvestorToolsClicked”)

### Lead Generation
Goal: forms, landing pages, funnels.
- Capture leads into `bf_leads` (or integration events)
- Attach campaign + source metadata
- Sync to CRM and email platforms

### Personalization
Goal: personalize dashboards + messaging.
- Use events + tags to choose:
  - which features to highlight
  - which emails/alerts to send
  - which CTAs to show in dashboard

### Conversion Optimization / A/B Testing
Goal: improve signups and upgrades.
- Track funnel steps:
  - visit → register → onboard → budget → invest tools → upgrade
- Store experiment assignments and outcomes

### Email Hosting Providers (Transactional + Campaigns)
Goal: deliver reliable system email + campaigns.
- Transactional: registration, password reset, alerts
- Campaigns: newsletters, updates, onboarding sequence

### Widgets (chat, forms, push notifications)
Goal: increase engagement + support.
- Live chat: capture transcript + link to user
- Surveys/forms: capture feedback + route to support/marketing
- Push notifications: alerts, reminders, product announcements

### Payments
Goal: subscriptions and checkout.
- Provider integration should support:
  - recurring subscriptions
  - invoices/receipts
  - webhooks for payment success/failure
- MyMI uses events to:
  - enable premium features instantly
  - log billing state changes

---

## 6) Top “Technologies” Integration Notes (Provider-by-Provider)

> For each provider below: we support OAuth2/API auth, webhooks (if available), and scheduled sync jobs for contacts/events.

### ActiveCampaign
What: marketing automation + email + behavioral tracking.  
Integration:
- OAuth2/API key (depending on plan)
- Sync: contacts, tags, automations, campaign stats
MyMI Use:
- Push onboarding tags (“Registered”, “BudgetComplete”)
- Pull engagement metrics for churn risk scoring

### Salesforce
What: enterprise CRM + workflows.  
Integration:
- OAuth2 + REST APIs
- Webhooks via platform events (where applicable)
MyMI Use:
- Partner pipeline + enterprise sales (B2B)
- Sync “organizations” and “deals” to MyMI partner dashboards

### HubSpot
What: CRM + marketing + forms + automation.  
Integration:
- OAuth2 + webhooks
MyMI Use:
- Capture website leads → HubSpot
- Drive lifecycle stages based on MyMI engagement

### ClickFunnels
What: funnel builder for conversion.  
Integration:
- Webhooks / Zapier bridge / API (varies)
MyMI Use:
- Funnel → MyMI registration → tags → nurture
- Attribute conversions back into MyMI analytics

### Freshworks CRM
What: CRM and sales automation.  
Integration:
- API + webhooks (where supported)
MyMI Use:
- Support pipeline + partner sales funnel

### Drip
What: ecommerce CRM + personalization journeys.  
Integration:
- API + event tracking
MyMI Use:
- Behavioral journeys (e.g., “watched investing tools but didn’t subscribe”)

### Pardot (Salesforce Account Engagement)
What: B2B marketing automation.  
Integration:
- Salesforce ecosystem auth + APIs
MyMI Use:
- Enterprise onboarding sequences and attribution reporting

### Eloqua (Oracle)
What: enterprise marketing automation.  
Integration:
- API + scheduled sync
MyMI Use:
- Larger partners needing structured campaign analytics

### SuiteCRM (Open Source)
What: open-source CRM alternative.  
Integration:
- REST API integration; self-hosted variability
MyMI Use:
- “Bring-your-own-CRM” partners; implement adapter pattern

### Zoho CRM / Zoho Desk
What: CRM + customer support.  
Integration:
- OAuth2 + APIs + webhooks
MyMI Use:
- Tickets created from MyMI Support page
- Link ticket status to user notifications

### Clearbit
What: enrichment (company + person data).  
Integration:
- API key enrichment calls
MyMI Use:
- Enrich B2B leads and partner signups
- Improve segmentation and outreach

### Merge (Unified API)
What: one API to connect multiple CRMs/ticketing/accounting.  
Integration:
- OAuth2 + Merge SDK/API
MyMI Use:
- Reduce integration complexity across many CRMs
- Implement “provider adapters” through Merge when available

### Sprinklr (future)
What: enterprise social + experience management.  
Integration:
- API + webhooks
MyMI Use:
- Enterprise marketing operations and omni-channel reporting

---

## 7) Implementation Blueprint (How We’d Build This in CI4)

### Recommended Structure
- `app/Libraries/Integrations/`  
  - `ProviderInterface.php`
  - `AbstractProvider.php`
  - `Providers/HubSpotProvider.php`, `Providers/SalesforceProvider.php`, etc.
- `app/Modules/Integrations/Controllers/`
  - `IntegrationsController.php` (connect/disconnect/status)
  - `WebhooksController.php` (receive provider webhooks)
- `app/Models/`
  - `IntegrationsAccountModel.php`
  - `IntegrationsEventModel.php`
  - `IntegrationsSyncJobModel.php`

### Provider Adapter Pattern
Each provider implements:
- `authorizeUrl()`, `exchangeToken()`, `refreshToken()`
- `syncContacts($cursor)`, `syncEvents($cursor)`
- `handleWebhook($payload)`

### Rate Limits + Reliability
- Store provider rate-limit metadata
- Use queue batching + retry with exponential backoff
- Log failures into `bf_error_logs` and provider event status

---

## 8) Security & Compliance Notes
- Encrypt tokens at rest (CI4 Encryption or libsodium)
- Store only required scopes
- Verify webhook signatures
- Separate “user-level” vs “org-level” connections
- Audit logs for integration connects/disconnects and critical sync operations

---

## 9) Roadmap (Practical Rollout Order)
Phase 1 (fastest value):
- HubSpot OR ActiveCampaign + Zapier bridge
- Basic event tracking + lead capture + onboarding tags

Phase 2:
- Salesforce + Pardot for enterprise pipeline
- Clearbit enrichment

Phase 3:
- Merge unified connector
- Deep personalization + A/B testing harness

---

## Next Steps
- [ ] Build CI4 controllers/routes: `IntegrationsController`, `WebhooksController`, `/integrations/connect`, `/integrations/status`, `/integrations/webhooks/{provider}`
- [ ] Add models/migrations for `bf_integrations_accounts`, `bf_integrations_webhooks`, `bf_integrations_events`, `bf_integrations_sync_jobs`
- [ ] Configure env secrets: provider client IDs/secrets, webhook signing secrets, queue/cron toggles, Redis DSN
- [ ] Register provider webhooks: contacts/events for HubSpot, ActiveCampaign, Salesforce (platform events), Drip, Zoho; payment success/failure for checkout providers
- [ ] Add dashboards in Management → Marketing/Analytics: connection status, sync health, event volume, top segments/tags, funnel conversion, experiment outcomes
