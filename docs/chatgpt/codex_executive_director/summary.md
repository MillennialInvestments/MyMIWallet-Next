## MyMI Codex Executive Director Project Summary

## Link to conversation:
## https://chatgpt.com/g/g-p-6875906cfa3881919a12c511a6d46ad0-mymi-codex-executive-director-engineer/c/69469882-15ec-8328-920f-733ccb021eb3

Category,Subcategory,Component,Description,Status,Primary Files / Modules,Notes / Next Actions
Platform,Core,MyMI Wallet,CI4-based fintech platform for budgeting investing alerts marketing automation,Active,CI4 App Core,Central system
Platform,Architecture,CodeIgniter 4,Primary framework PHP 8.2 DreamHost VPS,Active,app/,PSR-4 compliant
Platform,Infrastructure,DreamHost VPS,Nginx PHP 8.2 no sudo constraints,Active,nginx configs,Optimize memory and cron
Platform,Database,MySQL,Primary datastore bf_* tables,Active,Database\Migrations,Indexing & cleanup ongoing
Platform,Caching,Redis,Query and response caching strategy,Planned,Services Cache,Add rate-limit cache keys
Platform,Logging,DatabaseLoggerHandler,All log_message() into bf_error_logs,Active,App\Log\Handlers,Harden loop protection

Budgeting,Core,MyMIBudget,Monthly budgeting forecasting and annual overview,Active,MyMIBudget.php,Future 5–30 yr forecaster
Budgeting,Data,bf_users_credit_accounts,Credit account tracking,Active,Database,Due date validation
Budgeting,Data,bf_users_debt_accounts,Debt tracking and repayment logic,Active,Database,Default missing due_date
Budgeting,UI,Budget Dashboard,Fetch API powered charts and tables,Active,BudgetController.js,Shared JS state

Investments,Core,MyMIInvestments,Stocks ETFs crypto tools and watchlists,Active,MyMIInvestments.php,Expand option spreads
Investments,Watchlist,bf_users_watchlist,Symbol tracking with insights button,Active,DB Table,Attach prediction data
Investments,Forecasting,Fractal Analyzer,Fractal volatility and trend detection,Active,MyMIFractalAnalyzer.php,Marketing tie-in
Investments,API,AlphaVantage,Market data ingestion with rate limits,Active,MyMIAlphaVantage.php,Detect limit messages
Investments,API,CoinGecko,Crypto pricing and metadata,Active,MyMICoin.php,Cache responses
Investments,Trading,Option Spread Engine,Backend-only calculation engine,Planned,Service Layer,Reverse outcome view

Alerts,Core,MyMIAlerts,Automated trade alert pipeline,Active,MyMIAlerts.php,Queue optimization
Alerts,Ingestion,Email Scraper,Email → trade alerts workflow,Active,bf_investment_scraper,Mark processed
Alerts,Data,bf_investment_trade_alerts,Processed trade alerts table,Active,DB Table,10k+ record scaling
Alerts,History,bf_investment_alert_history,Market snapshots per alert,Active,DB Table,Prune old data
Alerts,Distribution,Discord Alerts,Chart links and notifications,Active,MyMIDiscord,Prevent duplicates
Alerts,Automation,CRON Processing,processAlerts scheduled jobs,Active,AlertsController,Backend queue needed

Marketing,Core,MyMIMarketing,Centralized scraping summarization distribution engine,Active,MyMIMarketing.php,Memory optimized
Marketing,Ingestion,Email News Scraper,HTML-heavy email processing,Active,bf_marketing_temp_scraper,Skip invalid records
Marketing,Processing,Summarization Engine,TF-IDF summarization and keywords,Active,TextProcessor Trait,Guards added
Marketing,Data,bf_marketing_scraper,Final summarized content,Active,DB Table,Top 5 daily selection
Marketing,Automation,Zapier Distribution,Multi-platform social posting,Active,MarketingService,Manual trigger UI
Marketing,UI,Marketing Dashboard,Generate preview and distribute modals,Active,ManagementController,Live mode toggle

Projects,Core,MyMIProjects,Projects commitments payouts system,Active,MyMIProjects.php,Fix missing tables
Projects,Data,bf_project_commitments,Investment commitments tracking,Active,DB Table,Soft delete added
Projects,Data,bf_project_payouts,Payout tracking table,Active,DB Table,Reconcile sums
Projects,Future,Patent Purchases,Patent acquisition automation,Planned,MyMIProjects API,USPTO integration
Projects,Future,Business Acquisition,Buy businesses automation,Planned,MyMIProjects API,Marketplace APIs
Projects,Future,Real Estate Acquisition,Residential and commercial properties,Planned,MyMIProjects API,Zillow LoopNet APIs

Wallets,Core,MyMIWallets,User wallets savings crypto fiat,Active,MyMIWallets.php,Missing view fix
Wallets,Blockchain,Solana Integration,Token and wallet support,Active,MyMISolana.php,403 handling
Wallets,Token,MyMI Coin,In-app utility token,Active,MyMICoin.php,Stable USD parity
Wallets,Token,MyMI Gold,Premium token system,Active,MyMIGold.php,Access gating

Security,Core,Auth Audit Service,Registration and login throttling,Active,AuthAuditService.php,Fix cache key chars
Security,Protection,CSRF XSS SQLi,Security hardening checklist,Active,Config\Security,Audit quarterly
Security,Users,Spam Detection,Obfuscated email scrubbing,Active,MyMIUser.php,Admin toggle
Security,Errors,Custom Error Pages,403 404 500 504 with logging,Active,Views/Errors,Email alerts enabled

Automation,Core,Codex Integration,Automated CI4 development assistant,Active,Docs + Instructions,Task-based commits
Automation,Docs,Docs Alignment Review,Scan /docs for gaps and mismatches,Active,Codex Tasks,Auto-generate missing MDs
Automation,Scripts,Smoke Tests,Route and endpoint smoke tests,Active,scripts/smoke_routes.sh,Daily use
Automation,Scripts,Daily Ops Scripts,Manual ignition scripts for tasks,Planned,scripts/,Define new scripts
Automation,CI/CD,Automated Reviews,ChatGPT-assisted refactors,Planned,GitHub Actions,Add pipeline

UX,Core,Dynamic Modal Loader,Unified modal system,Active,JS Helpers,Used across dashboards
UX,Tables,DataTables Server Side,Optimized table loading,Active,JS + Controllers,Prevent spinner loops
UX,Charts,ChartJS Visualizations,Budget investments alerts charts,Active,JS Fetch API,Central state

Content,Media,Video Automation,Short-form recap videos,Planned,Marketing Engine,Script generation ready
Content,Media,Streaming Integration,Coffee & Stocks weekly streams,Active,YouTube Twitch,Auto descriptions
Content,Brand,MyMI Wallet Army,Meme and GIF campaigns,Active,Marketing Assets,Soaring To The Moon sets

Operations,Monitoring,Log Summarizer,Daily CI4 error log scanning,Planned,CLI Command,Docs output
Operations,Maintenance,Memory Optimization,Prevent exhaustion in CRON jobs,Active,MarketingController,Split workloads
Operations,Performance,API Rate Limiting,AlphaVantage and others,Active,Service Layer,Queue batching
Operations,Scaling,Queue System,Backend job queue,Planned,Service Layer,Redis-based

Roadmap,Short Term,Stability Phase,Zero critical errors achieved,Completed,System-wide,Maintain baseline
Roadmap,Mid Term,Automation Expansion,More CRON and scripts,In Progress,Automation Layer,Reduce manual ops
Roadmap,Long Term,Self-Optimizing Platform,Predictive and autonomous workflows,Planned,All Modules,Executive AI
