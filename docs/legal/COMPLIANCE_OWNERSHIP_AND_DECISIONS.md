# MyMI Wallet — Legal Consent, Compliance Ownership & Regulatory Decisions

> **Document Status:** Authoritative Operating Standard  
> **Task Mapping:** `MYMI-GTM-057` (Wave 5: Customer Experience & Compliance Ownership)  
> **Human Gate:** `Gate G8: Legal and Financial Compliance` (Teddy / Legal Counsel)  
> **Operating Entity:** My Millennial Investments, LLC  
> **Primary Domain:** `https://www.mymiwallet.com`  
> **Last Updated:** 2026-11-23

---

## 1. Compliance Ownership & Governance Hierarchy

MyMI Wallet operates as a financial management, analytics, budgeting, and digital asset orchestration platform. Governance, legal risk oversight, and compliance policies are maintained under the following named roles:

| Governance Role | Designated Owner / Entity | Authority Scope | Review Cadence |
|---|---|---|---|
| **Managing Principal & Executive Sponsor** | Teddy (Managing Principal) | Final authorization for commercial agreements, partnerships, fee schedules, and platform go-live. | Continuous / Release Gates |
| **Legal Counsel** | Retained Regulatory Counsel | Legal terms review, arbitration/dispute resolution provisions, FinCEN money transmission thresholds, IP & licensing. | Bi-annual / Pre-Feature |
| **Chief Compliance Officer (Designated)** | Operations / Compliance Lead | KYC/AML program execution, OFAC sanctions screening adherence, suspicious activity escalation, law enforcement coordination. | Monthly / Event-driven |
| **Data Privacy Officer** | Security & Privacy Engineering Lead | GDPR/CCPA data subject access requests (DSAR), privacy policy disclosures, data retention, erasure execution (`bf_privacy_requests`). | Continuous / Automated |

---

## 2. Public Legal Surfaces & Current Canonical Policies

All users, registered principals, and API clients access the canonical, versioned legal documents via public, unauthenticated routes:

| Legal Document | Canonical URL | Aliases / Route Endpoints | Purpose & Enforceability |
|---|---|---|---|
| **Terms of Service** | `/Terms-Of-Service` | `/terms`, `/terms-of-service`, `/Legal/Terms-And-Conditions`, `/legal/terms-and-conditions`, `/terms-and-conditions` | Governs platform usage, user obligations, intellectual property, account suspension, dispute resolution, and limitation of liability. |
| **Privacy Policy** | `/Privacy-Policy` | `/privacy`, `/privacy-policy`, `/Legal/Privacy-Policy`, `/legal/privacy-policy` | Discloses collection, usage, third-party disclosure, data subject rights (export/erasure under GTM-045), and security safeguards. |
| **Risk Disclosures & Disclaimers** | `/disclaimer` | `/disclaimers`, `/legal/disclaimer`, `/disclosures` | Explicit financial disclaimers: analytical tools do not constitute financial advice; crypto asset volatility disclosures; no guarantee of returns. |
| **Crypto Customer Agreement** | `docs/legal/crypto_customer_agreement/` | Compiled via `tools/docs/build_legal_agreement.php` | Governs wallet connectivity, self-custody principles, Solana Pay transactions, and non-custodial processing. |

---

## 3. Versioned User Consent & Audit Record Standard

### 3.1 Registration Consent Capture Contract
1. **Notice on Registration:** Registration forms (`app/Views/Auth/register_form.php`) provide clear, conspicuous notice with direct, external links:  
   *"By registering an account, you agree to our Terms of Service and Privacy Policy."*
2. **Immutable Audit Persistence:** Upon successful registration execution in `app/Controllers/AuthController::attemptRegister()`, the platform commits versioned consent records into `bf_user_consent`:
   - `user_id`: Newly created account principal ID.
   - `consent_type`: `terms_of_service`, `privacy_policy`.
   - `version`: Version string (initial baseline `1.0`).
   - `ip_address`: Captured client IP from request headers.
   - `user_agent`: Sanitized client User-Agent string.
   - `consent_time` & `created_at`: Exact server UTC timestamp.
3. **Telemetry & Audit Logging:** Emits event `legal.consent_recorded` via `service('eventTracker')` and structured security log in `SecurityModel::recordUserConsent`.
4. **Checkout & Transaction Affirmation:** Checkout views (`app/Modules/User/Views/SolanaPay/index.php`) require affirmation before transaction initiation.

---

## 4. Financial Compliance Decision Matrices

### 4.1 KYC (Know Your Customer) Decision Framework
MyMI Wallet applies a tiered, risk-proportionate KYC framework:

```
[Tier 0: Public Visitor] -> [Tier 1: Basic Account] -> [Tier 2: Wallets & Swap] -> [Tier 3: Fund / MDIT]
  - No PII collected        - Email verified          - Identity verification       - Full accreditation
  - Public market data      - Password hash           - Sanctions screening         - KYC/AML manual review
  - Read-only blog/docs     - Versioned consent       - Device fingerprinting       - Operator audit sign-off
```

- **Tier 0 (Public Visitor):** Browsing public articles, public ticker pages, and help documentation. No PII required.
- **Tier 1 (Personal Budgeting & Watchlists):** Verified email, salted password hash (`Argon2id`/`Bcrypt`), capture of terms and privacy consent.
- **Tier 2 (Self-Custodial Wallet Connectivity & Payments):** Self-custodial connection (Phantom, Solflare). User signs transactions locally; MyMI never accesses or stores private keys (`PaymentHolesClosedTest`). Processing fees collected via standard recipient account.
- **Tier 3 (Alternative Assets & Fund Participation - MDIT / Projects):** Mandatory accreditation and identity verification under `bf_projects_fund_investor_profiles` (`kyc_status` = `approved`, `investor_eligibility` = `verified`). Requires signed fund agreement (`agreement_signed = 1`).

### 4.2 AML (Anti-Money Laundering) & Suspicious Activity Monitoring
1. **Self-Custody Demarcation:** MyMI does not pool or custody customer fiat or cryptocurrency balances. Solana Pay checkouts (`CreateSolanaPayRequests`) use one-time reference keys and deterministic recipient addresses to prevent transaction mixing.
2. **Velocity & Anomaly Thresholds:** High-frequency transaction attempts and repetitive failed requests trigger automated rate limiting (`RateLimiter`, `AiCostControls`) and security audit logging.
3. **Suspicious Activity Reporting (SAR):** When an account exhibits indicators of layering, smurfing, or automated exploitation:
   - System flags account for administrative review (`bf_security_log`).
   - Transfers and checkout session generation are restricted.
   - Designee reviews audit chain (`app/Libraries/SecureTransfer/AuditChain.php`) before law enforcement escalation.

### 4.3 OFAC & Sanctions Screening Protocol
1. **Geographic & Sanctions Boundaries:** MyMI Wallet prohibits access from comprehensively sanctioned jurisdictions (e.g., Cuba, Iran, North Korea, Syria, and occupied regions of Ukraine) in accordance with U.S. Department of the Treasury OFAC regulations.
2. **Denial & Freezing Logic:**
   - Any transaction attempt originating from an OFAC-blocked jurisdiction or associated with a known SDN wallet address is immediately rejected (`AUTH_FAIL: sanctions_block`).
   - The platform logs the attempted transaction hash, originating IP, and timestamp without fulfilling the checkout.
3. **Counsel Review:** No frozen assets or blocked transactions may be remediated or released without written instruction from legal counsel.

### 4.4 Transparent Fee Schedules & Consumer Disclosures
1. **No Hidden Fees:** All transaction fees, processing charges, and subscription fees must be disclosed to the user before they initiate payment or sign a transaction.
2. **Solana Pay Fee Standard:** Solana Pay transactions present the product amount (in USDC) and the network processing fee (in SOL) directly on the checkout card (`app/Modules/User/Views/SolanaPay/index.php`).
3. **Subscription Terms:** Memberships ($0 Free, Pro, Elite) clearly state billing frequency, renewal terms, cancellation procedures, and refund policy limitations in `themes/public/termsOfService.php`.

### 4.5 Financial Marketing Claims & Disclaimers
1. **No Financial Advice:**
   - Standard disclaimer banner: *"MyMI Wallet is a financial analysis and portfolio tracking software application. MyMI Wallet is not an investment advisor, broker-dealer, or registered financial planner. All tools, indicators, algorithms, and AI insights are provided for educational and analytical purposes only."*
2. **Past Performance Disclaimer:**
   - All historical return calculations, projections, and trade alert histories must feature the standard disclosure: *"Past performance is no guarantee of future returns. Investing involves risk of loss, including principal loss."*
3. **AI & Automated Insights:**
   - AI advisor suggestions (`AdvisorController`) and automated technical signals (`ApexRuleEngine`, `TopstepRuleEngine`) must be labeled as informational models, requiring independent user evaluation.

---

## 5. Verification & Audit Trail Summary

| Item | Technical Mechanism | Source Evidence Location |
|---|---|---|
| **Consent Persistence** | `bf_user_consent` migration & `SecurityModel` | `app/Database/Migrations/2026-11-23-000500_CreateUserConsentTable.php`<br>`app/Models/SecurityModel.php` |
| **Registration Hook** | `AuthController::attemptRegister()` | `app/Controllers/AuthController.php` |
| **Route Coverage** | Consolidated public legal routes | `app/Config/Routes.php` |
| **Disclaimers View** | `Home::disclaimer()` action | `app/Controllers/Home.php` |
| **Checkout Notice** | Solana Pay legal notice | `app/Modules/User/Views/SolanaPay/index.php` |
| **Gate G8 Status** | Readiness for Teddy / Legal sign-off | `docs/_aiops/gtm/HUMAN_GATES_COMPLETION_PACKET_2026-11-16.md` |
