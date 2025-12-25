# MyMI Wallet Crypto Customer Agreement

**Not legal advice; draft pending counsel review.**

This draft explains how MyMI Wallet offers crypto tools, what you agree to when using them, and where MyMI’s responsibilities stop. Each section below is written in plain English with “What we do / What you agree / Your responsibilities / Key limits & disclosures.”

The agreement assumes you are using the MyMI Wallet web apps, APIs, and integrations (including Solana connectivity, MyMI Gold balances, and connected wallets like Phantom, Solflare, MetaMask, and Trust Wallet). If a feature is still in development, it appears in commented `FEATURE` blocks for easy review by counsel.

For the most current, feature-flagged version, run `php tools/docs/build_legal_agreement.php` to generate `compiled_agreement.md`.

# Preamble

## What this means
We want you to understand how MyMI Wallet handles crypto tools, connected wallets, and MyMI Gold credits before you use them. This is a draft and may change after counsel review.

## What we provide
- Access to self-directed crypto tools (currently focused on Solana connectivity and MyMI Gold credits) inside the MyMI Wallet web app.
- Documentation that explains how features work and which parts are still in development.

## What you agree
- You are using these tools on your own initiative and will review each section to understand risks and limits.
- You accept that this draft is not legal advice and may change when counsel finalizes it.

## Your responsibilities
- Read the entire agreement and keep a copy for your records.
- Check announcements in the app for updates or effective dates before you transact.

## Key limits & disclosures
- MyMI Wallet is not a bank or broker-dealer; crypto balances are not FDIC or SIPC insured.
- Feature flags may hide in-development services until they are production-ready.

<!-- INTERNAL:implementation-notes
- Routing & access control: app/Config/Routes.php (Wallets, Exchange, API)
- Core controllers: app/Modules/User/Controllers/WalletsController.php; app/Modules/Exchange/Controllers/SolanaController.php
- Feature flags for docs: docs/legal/crypto_customer_agreement/feature_flags.yml
-->

# Definitions

## What this means
Plain-language references used in this agreement.

## What we provide
- “MyMI Wallet” refers to the MyMI web applications and APIs.
- “Account” refers to your MyMI user profile and any linked wallets or funding sources.
- “MyMI Gold” and “MyMI Coin” refer to on-platform reward or credit balances tracked in the MyMI ledgers.
- “Connected Wallet” refers to self-custody wallets you link (e.g., Phantom, Solflare, MetaMask, Trust Wallet).
- “Spot trading” means buying or selling supported tokens for immediate settlement without leverage.

## What you agree
- These terms apply to all MyMI crypto tools you use, even when accessed through integrations.
- Definitions may evolve as features ship; you will review updates.

## Your responsibilities
- Keep track of which wallet or funding source you are using before submitting a request.
- Confirm whether an action affects on-chain assets, MyMI Gold balances, or both.

## Key limits & disclosures
- MyMI Gold/Coin balances are platform credits and not fiat currency or bank deposits.
- Connected Wallets remain self-custodied; you hold your keys.

<!-- INTERNAL:implementation-notes
- Ledger handling: app/Libraries/MyMIGold.php, app/Libraries/MyMICoin.php
- Wallet connectors: app/Libraries/MyMISolana.php, MyMIPhantom.php, MyMISolflare.php, MyMIMetaMask.php, MyMITrustWallet.php
- Exchange orchestration: app/Libraries/MyMIExchange.php
-->

# Account Eligibility

## What this means
Who can use MyMI crypto tools and the checks we must run first.

## What we provide
- Identity, sanctions, and fraud screening before enabling crypto actions.
- Configurable security controls (multi-factor prompts, device checks) when you connect wallets or request transfers.

## What you agree
- You must be legally able to use crypto services in your jurisdiction and meet any age or residency requirements we publish.
- You will complete required KYC/KYB steps and keep your profile information accurate.
- You will notify us if your regulatory status changes (e.g., sanctions exposure, residency changes).

## Your responsibilities
- Use your own identity; do not create accounts for others.
- Keep login credentials and device security up to date; enable MFA where offered.
- Respond quickly to any verification or source-of-funds requests.

## Key limits & disclosures
- We may deny or suspend access if we cannot verify your identity, if you appear on sanctions lists, or if your jurisdiction restricts crypto activity.
- Additional documentation may be required for higher transaction limits or business accounts.

<!-- INTERNAL:implementation-notes
- Onboarding & verification: app/Services/OnboardingService.php; app/Modules/User/Controllers/AccountController.php
- Auth and device checks: app/Config/Filters.php (login), app/Controllers/AuthController.php
- Fraud/abuse controls: app/Libraries/Abuse/RateLimiter.php
-->

# Services Overview

## What this means
Snapshot of the crypto capabilities you can access through MyMI Wallet today and what is planned.

## What we provide
- **Self-directed spot activity:** Tools to submit spot buy/sell or conversion requests on supported networks (currently centered on Solana) using your connected wallets or MyMI Gold credits when applicable.
- **Wallet connectivity:** Flows to link and manage self-custody wallets (Phantom, Solflare, MetaMask, Trust Wallet) for balance visibility and transactions.
- **Wallet transfers:** Ability to request sends/receives to on-chain addresses you supply, subject to security checks and network availability.
- **Fiat on/off-ramp support:** Funding and withdrawal options through supported payment rails (e.g., PayPal, Apple Pay) where available.
- **MyMI Gold/Coin usage:** Platform credit tools for rewards, settlements inside MyMI modules, and selected payment flows.















## What you agree
- You initiate all crypto actions; MyMI does not provide discretionary management or investment advice.
- Availability depends on network health, partner status, and your completed verifications.

## Your responsibilities
- Confirm the right wallet, address, and network before submitting any transaction.
- Maintain updated wallets; ensure you can sign transactions where self-custody is required.
- Review live status banners for Solana or other networks before trading or transferring.

## Key limits & disclosures
- Service availability can change without notice during maintenance, outages, or compliance reviews.
- We may pause features (including transfers) if we detect risk, compliance flags, or network instability.
- No FDIC/SIPC coverage; crypto values can drop to zero.

<!-- INTERNAL:implementation-notes
- Solana connectivity: app/Services/SolanaService.php; app/Libraries/MyMISolana.php
- Wallet connectors: app/Libraries/MyMIPhantom.php; MyMISolflare.php; MyMIMetaMask.php; MyMITrustWallet.php
- Exchange flows & routing: app/Libraries/MyMIExchange.php; app/Modules/Exchange/Controllers/SolanaController.php; app/Services/JupiterService.php (swap routing)
- Fiat rails: app/Services/PayPalService.php; app/Services/ApplePayService.php
- Gold/Coin usage: app/Libraries/MyMIGold.php; app/Libraries/MyMICoin.php
-->

# Orders, Pricing & Execution

## What this means
How MyMI routes spot requests, sources prices, and handles execution timing.

## What we provide
- Self-directed order tools for supported assets; we do not provide recommendations.
- Pricing sourced from third-party market data (e.g., CoinGecko, Birdeye) and on-chain quotes where applicable.
- Disclosures of network fees, estimated totals, and any platform fees before you submit.
- Execution on a commercially reasonable efforts basis; we surface confirms or errors in-app.

## What you agree
- You understand on-chain execution depends on network conditions, liquidity, and your ability to sign/approve transactions.
- You accept that quoted prices may change until confirmed on-chain.
- You authorize MyMI to use reasonable routing (including partner venues) to complete your request.

## Your responsibilities
- Review quotes, fees, and slippage warnings before confirming.
- Monitor transaction status and retry only after checking for partial fills or pending network state.
- Use correct network and token mint addresses to avoid failed or misrouted requests.

## Key limits & disclosures
- We may cancel or reject orders for compliance reasons or if pricing becomes stale.
- Final settlement values are determined by the executed transaction, not the initial quote.
- Network congestion can delay inclusion; we do not control validator performance.

<!-- INTERNAL:implementation-notes
- Pricing sources: app/Services/CoinGeckoService.php; app/Services/BirdeyeService.php
- Routing/execution: app/Services/ExchangeService.php; app/Services/JupiterService.php (Solana swap quotes)
- Controllers: app/Modules/Exchange/Controllers/ExchangeController.php; app/Modules/Exchange/Controllers/SolanaController.php
-->

# Fees & Taxes

## What this means
How we charge for services and how taxes apply.

## What we provide
- Transparent display of platform fees (if any) and estimated network fees before you submit a request.
- A Fee Schedule link (see `/docs/legal/fees.md` or the production Fees page) for current rates.
- Transaction history you can export to support your own tax reporting.

## What you agree
- You will review the Fee Schedule and in-app estimates before confirming transactions.
- You are responsible for all taxes arising from your activity (including income, gains, staking rewards when enabled, and airdrops).
- You consent to receive tax forms electronically when required (e.g., 1099 or equivalent).

## Your responsibilities
- Budget for network fees; actual on-chain costs may differ from estimates due to congestion.
- Keep records and consult your tax advisor; MyMI does not provide tax advice.
- Provide accurate W-9/W-8 or local equivalents when requested to determine withholding or reporting obligations.

## Key limits & disclosures
- Network fees are paid to validators/miners and are outside MyMI’s control.
- Some third parties (e.g., payment processors) may charge their own fees; those are passed through.
- MyMI Gold/Coin rewards may be taxable; valuation is your responsibility.

<!-- INTERNAL:implementation-notes
- Fee calculations: app/Services/RevenueService.php; app/Services/TransactionService.php
- Pricing data for tax estimates: app/Services/CoinGeckoService.php; app/Services/BirdeyeService.php
- Export/reporting: app/Modules/User/Controllers/WalletsController.php (history views); app/Modules/APIs/Controllers/WalletsController.php (exports)
-->

# Custody, Title & Control

## What this means
Who holds keys, who controls assets, and how MyMI handles balances.

## What we provide
- Connectivity to self-custody wallets; you sign transactions with your own keys.
- Optional creation of default Solana wallets for convenience, still under your control.
- On-platform ledgers for MyMI Gold/Coin balances used inside MyMI modules.

## What you agree
- You keep and secure your private keys; MyMI does not take possession of your on-chain assets.
- MyMI Gold/Coin balances are platform credits, not deposits or custodial accounts.
- You authorize MyMI to debit/credit MyMI Gold/Coin ledgers when you use in-app features that rely on those credits.

## Your responsibilities
- Store seed phrases and private keys securely; MyMI cannot recover them.
- Verify addresses and token mints before approving any transaction.
- Monitor your balances and reconcile on-chain holdings with any in-app displays.

## Key limits & disclosures
- MyMI is not a qualified custodian and does not provide FDIC or SIPC insurance.
- If you lose your keys, we cannot restore access to on-chain assets.
- Displayed balances may lag during network issues; on-chain state is authoritative.

<!-- INTERNAL:implementation-notes
- Wallet creation & reads: app/Libraries/MyMISolana.php; app/Modules/Exchange/Controllers/SolanaController.php
- Wallet connectors: app/Libraries/MyMIPhantom.php; MyMISolflare.php; MyMIMetaMask.php; MyMITrustWallet.php
- Gold/Coin ledger: app/Libraries/MyMIGold.php; app/Libraries/MyMICoin.php
-->

# Wallet Transfers

## What this means
How send/receive requests work and what happens when something goes wrong.

## What we provide
- Tools to initiate sends from your connected wallet or MyMI-managed Solana address (where you hold the keys).
- Transfer status updates and error messages when we detect network or compliance issues.
- Security prompts (MFA/device checks) before high-risk actions where supported.

## What you agree
- You own the addresses you submit or have permission to use them.
- Once a transfer is broadcast, it is generally irreversible; MyMI cannot claw back on-chain transactions.
- We may hold, pause, or cancel transfers for fraud, sanctions, or technical risk.

## Your responsibilities
- Double-check destination addresses, token mint, and network before sending; mistyped addresses can result in permanent loss.
- Maintain wallet security (MFA, device hygiene, anti-phishing).
- Monitor confirmations and resubmit only after checking for pending or failed status.

## Key limits & disclosures
- Network fees apply and may fluctuate; insufficient fees can delay or fail a transaction.
- Compliance reviews or funding-source checks may delay outgoing transfers.
- Received funds are not settled until the relevant network finalizes the transaction.

<!-- INTERNAL:implementation-notes
- Transfer endpoints: app/Modules/APIs/Controllers/SolanaController.php (transfer); app/Modules/Exchange/Controllers/SolanaController.php (wallet actions)
- Wallet libraries: app/Libraries/MyMISolana.php (send/receive helpers)
- Security checks: app/Services/AuthAuditService.php; app/Libraries/Abuse/RateLimiter.php
-->



# Risk Disclosures

## What this means
Crypto involves material risks; this section highlights key ones.

## What we provide
- Status indicators for network health (especially Solana) where available.
- Notices when we pause services due to volatility, forks, maintenance, or partner outages.
- Educational prompts about address accuracy, slippage, and irreversible transfers.

## What you agree
- You understand crypto prices are volatile and may drop to zero.
- You accept that forks, airdrops, or unsupported assets may not be delivered or supported.
- You accept service interruptions during maintenance, outages, or risk events.

## Your responsibilities
- Monitor market conditions and network status before transacting.
- Back up wallets and keep enough funds for network fees and potential retries.
- Review any fork or airdrop announcements and understand that unsupported assets may not be credited.

## Key limits & disclosures
- MyMI does not control underlying blockchains, validators, or miners.
- Service downtime (planned or unplanned) may block trading or transfers temporarily.
- Unsupported forked assets, spam tokens, or malicious contracts may be blocked or discarded.

<!-- INTERNAL:implementation-notes
- Network status: app/Services/SolanaService.php (health checks); app/Libraries/MyMISolana.php (network status reporting)
- Outage/maintenance flags: app/Modules/User/Controllers/WalletsController.php (status badges); app/Modules/Exchange/Controllers/SolanaController.php (error surfaces)
- Market data: app/Services/CoinGeckoService.php; app/Services/BirdeyeService.php
-->

# Compliance, Sanctions & Law Enforcement

## What this means
Our obligations under law and how we respond to official requests.

## What we provide
- Screening against sanctions, fraud, and abuse indicators before enabling transactions.
- Logging and audit trails to support investigations and required reporting.
- A channel to handle lawful requests from regulators or law enforcement.

## What you agree
- You will not use MyMI for sanctioned activity, illicit finance, or prohibited jurisdictions.
- You consent to our sharing of information when required by law, subpoena, court order, or regulatory inquiry.
- You will respond promptly to compliance outreach and provide requested documentation.

## Your responsibilities
- Keep your profile current and truthful.
- Avoid mixing funds from illicit sources; ensure origin/destination addresses comply with applicable laws.
- Notify us if you suspect your account was compromised or used without authorization.

## Key limits & disclosures
- We may freeze, delay, or cancel activity to comply with sanctions, AML, or fraud obligations.
- We may report suspicious activity to regulators without notice where permitted or required.
- We may be unable to disclose details of certain investigations or holds.

<!-- INTERNAL:implementation-notes
- Audit and security logging: app/Services/AuthAuditService.php; app/Libraries/Abuse/RateLimiter.php
- Compliance gating: app/Services/CommonDataService.php (risk flags surfaced to views); app/Modules/APIs/Controllers/SolanaController.php (transfer checks)
- Legal request handling: app/Modules/Support/Controllers/SupportController.php (intake), escalation via app/Config/Routes.php
-->

# Account Security & Unauthorized Activity

## What this means
How to keep your account safe and what to do if something looks wrong.

## What we provide
- Login protections (session controls, optional MFA prompts) and device/session monitoring.
- Alerts for key actions (new device, wallet connection, password change) where configured.
- Support channels to report suspicious activity.

## What you agree
- You will maintain strong passwords, enable MFA where available, and secure your devices and browsers.
- You will not share credentials or sign transactions you do not understand.
- You will notify us immediately if you suspect unauthorized access.

## Your responsibilities
- Review account activity regularly and revoke wallet connections you no longer use.
- Keep your software up to date and avoid signing blind transactions.
- Follow recovery steps we provide, including resetting credentials and confirming device ownership.

## Key limits & disclosures
- On-chain transactions you sign are final; we cannot reverse them.
- MyMI is not liable for losses resulting from compromised devices, phishing, or unauthorized access if you failed to follow security best practices.
- We may temporarily lock your account while investigating security alerts.

<!-- INTERNAL:implementation-notes
- Security audits & alerts: app/Services/AuthAuditService.php
- Session/login flow: app/Controllers/AuthController.php; app/Config/Filters.php (login)
- Wallet connection management: app/Modules/Exchange/Controllers/SolanaController.php; app/Modules/Exchange/Controllers/MetaMaskController.php; app/Modules/Exchange/Controllers/DigiByteController.php
-->

# Suspension & Termination

## What this means
When and how access can be limited or ended.

## What we provide
- Notice (when permitted) if we suspend features or terminate access.
- Steps to address certain holds (e.g., additional verification) where remediation is possible.

## What you agree
- We may limit, pause, or terminate access at our discretion for risk, compliance, operational, or contractual reasons.
- We may retain records as required by law even after termination.
- Outstanding obligations (fees, tax forms, investigations) may continue after account closure.

## Your responsibilities
- Resolve outstanding issues (identity checks, chargebacks, disputed transfers) promptly.
- Export any records you need before closure when access is available.
- Cease using MyMI services after termination except as required to complete pending obligations.

## Key limits & disclosures
- We may block transfers or trading during a suspension; balances may be unavailable until holds clear.
- We may be unable to provide full detail about regulatory holds or investigations.

<!-- INTERNAL:implementation-notes
- Admin controls: app/Modules/Management/Controllers/UsersController.php; app/Modules/Management/Controllers/WalletsController.php
- Feature gating & flags: app/Database/Migrations/FeatureFlags.php; app/Services/CommonDataService.php
- User-facing notifications: app/Modules/User/Controllers/AccountController.php; app/Modules/User/Controllers/WalletsController.php
-->

# Disclaimers, Limitation of Liability & Indemnity

## What this means
Important limits on warranties and liability.

## What we provide
- Services on an “as-is” and “as-available” basis with commercially reasonable uptime and safeguards.
- Disclosure of known outages or degradations when feasible.

## What you agree
- You use MyMI at your own risk; we disclaim implied warranties (merchantability, fitness for a particular purpose, non-infringement) to the fullest extent permitted by law.
- We are not liable for indirect, incidental, consequential, or punitive damages, loss of profits, lost data, or loss of goodwill.
- You will indemnify MyMI for claims arising from your misuse of the services, violation of law, or breach of this agreement.

## Your responsibilities
- Use the services in compliance with applicable law and this agreement.
- Protect your devices and credentials; review transactions before signing.

## Key limits & disclosures
- We are not responsible for failures of third-party networks, validators, custodians, payment processors, or data providers.
- Force majeure events (e.g., outages, cyberattacks, regulatory actions, natural disasters) may disrupt service without liability.
- No FDIC or SIPC insurance covers crypto or MyMI Gold/Coin balances.

<!-- INTERNAL:implementation-notes
- Error handling: app/Libraries/ProductionExceptionHandler.php; app/Services/AuthAuditService.php (security incidents)
- Third-party data/providers: app/Services/CoinGeckoService.php; app/Services/BirdeyeService.php; app/Services/JupiterService.php
- Logging for incident response: app/Log/Handlers/DatabaseLoggerHandler.php
-->

# Dispute Resolution & Arbitration (Draft for Counsel)

## What this means
How we propose to handle disputes; final language will depend on counsel review.

## What we provide
- A support path for informal resolution before escalation.
- A draft approach for binding arbitration and class-action waiver, subject to legal approval.

## What you agree
- Attempt informal resolution with MyMI support before filing claims.
- If arbitration is finalized by counsel, disputes would be resolved individually through arbitration rather than court, and class actions would be waived (subject to final legal terms).

## Your responsibilities
- Contact us promptly with any dispute and provide details so we can investigate.
- Follow any specified timelines or notice requirements once finalized.

## Key limits & disclosures
- This section is a draft and may change; do not rely on it until counsel finalizes and we publish an effective date.
- Small-claims or statutory rights may apply depending on your jurisdiction.

<!-- INTERNAL:implementation-notes
- Support intake: app/Modules/Support/Controllers/SupportController.php
- User communications: app/Modules/User/Controllers/AccountController.php (notifications); app/Modules/User/Controllers/WalletsController.php (in-app banners)
-->

# Communications & E-Sign Consent

## What this means
How we deliver notices and collect your consent electronically.

## What we provide
- Electronic delivery of agreements, updates, receipts, tax forms, and support responses.
- In-app notices and email alerts for important account events.

## What you agree
- You consent to receive communications electronically (email, in-app, SMS where enabled) and to use electronic signatures where applicable.
- You will keep your contact information current and monitor messages for updates.

## Your responsibilities
- Whitelist MyMI sender addresses and monitor spam filters.
- Update your email/phone promptly when it changes.
- Download or print records you need for personal archiving.

## Key limits & disclosures
- If you withdraw e-sign or electronic delivery consent, some services may become unavailable.
- Delivery depends on third-party providers; outages can delay notices.

<!-- INTERNAL:implementation-notes
- Email delivery: app/Services/MailService.php; app/Modules/APIs/Controllers/EmailController.php
- Notifications: app/Services/NotificationService.php; app/Modules/User/Controllers/AccountController.php (preference management)
- E-sign records: app/Services/AuthAuditService.php (audit logs)
-->

# Miscellaneous, Governing Law & Changes

## What this means
Catch-all terms about how this agreement works and how we update it.

## What we provide
- Notice of material changes (e.g., new fees, added features, updated dispute terms) through the app or email.
- A governing-law statement: this draft assumes Delaware law applies, without regard to conflict-of-law rules, subject to counsel confirmation.

## What you agree
- Continued use of the services after an effective date means you accept updated terms.
- If any provision is unenforceable, the rest remains in effect.
- We may assign our rights and obligations as permitted by law; you may not transfer your rights without our consent.

## Your responsibilities
- Review change notices promptly and stop using the services if you do not agree.
- Keep a copy of the agreement and any updates for your records.

## Key limits & disclosures
- Certain features may have additional terms; if they conflict, the more specific terms govern for that feature.
- Translations are for convenience; the English version controls.
- Change cadence and effective dates will be posted in-app or on the legal site.

<!-- INTERNAL:implementation-notes
- Site metadata & legal links: app/Config/SiteSettings.php
- Change notices: app/Modules/User/Controllers/AccountController.php (announcements); app/Modules/User/Controllers/WalletsController.php (dashboard banners)
- Build artifact: docs/legal/crypto_customer_agreement/compiled_agreement.md (regenerated by tools/docs/build_legal_agreement.php)
-->
