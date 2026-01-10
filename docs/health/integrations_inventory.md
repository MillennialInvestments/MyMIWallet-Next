# Integrations Inventory

This inventory lists external/internal integration touchpoints found in the repo, with base URLs, env keys, and evidence paths.

## AlphaVantage (Financial API)
- Base URL(s):
  - `https://www.alphavantage.co/query` (primary queries)
  - `https://alphavantageapi.co/timeseries/analytics` (analytics)
- Env keys:
  - `ALPHA_VANTAGE_API_KEYS`, `ALPHA_VANTAGE_API_KEY`, `ALPHA_VANTAGE_API_KEY_A/B/C/D/E`
- Timeout/rate-limit logic:
  - Rate limiter via cache, `rateLimitPerMinute=70`, with `hasRateLimitCapacity()` and `getAlphaVantageResponse()` rotation logic.
- Evidence:
  - `app/Libraries/MyMIAlphaVantage.php`
  - `app/Models/AlertsModel.php` (AlphaVantage backfills)
  - `app/Libraries/MyMIAlerts.php` (AlphaVantage fetch via `file_get_contents`)

## MarketAux (News API)
- Base URL: `https://api.marketaux.com/v1/news/all`
- Env keys: `MARKETAUX_API_KEY`
- Timeout/retry: uses CI4 `curlrequest` (no explicit retry).
- Evidence:
  - `app/Libraries/MyMIMarketAux.php`

## Solana RPC
- Base URLs: configured via env (`SOLANA_RPC_PRIMARY`, `SOLANA_RPC_FALLBACKS`, `SOLANA_WS_PRIMARY`).
- Env keys: `SOLANA_RPC_PRIMARY`, `SOLANA_RPC_FALLBACKS`, `SOLANA_WS_PRIMARY`, `SOLANA_COMMITMENT`
- Timeout/retry: Guzzle client timeout 10s, circuit breaker for endpoint failures.
- Evidence:
  - `app/Services/SolanaService.php`
  - `app/Models/SolanaModel.php` (curlrequest usage)

## Discord (Webhooks + Queue)
- Webhook delivery and queue-based dispatch.
- Env/config: Discord config with webhook URLs; CRON token for queue processing.
- Evidence:
  - `app/Libraries/MyMIDiscord.php` (dispatch + webhook send)
  - `app/Modules/APIs/Controllers/DiscordController.php` (queue processing w/ `CRON_SHARED_KEY`)
  - `app/Models/DiscordModel.php` (queue + history tables)

## Zapier (Marketing distribution)
- Webhook endpoint: `ZAPIER_APPROVED_WEBHOOK` (expects Zapier URL)
- Env keys: `ZAPIER_APPROVED_WEBHOOK`, `OPENAI_API_KEY`
- Timeout: 15s for Zapier; 30s for OpenAI enrichment.
- Evidence:
  - `app/Services/ZapierService.php`

## SMTP / Email
- Primary provider: SMTP via CI4 Email service.
- Env keys:
  - `mail.driver`, `mail.provider`, `email.protocol`, `mail.from.email`, `mail.from.name`
- Evidence:
  - `app/Services/MailService.php`
  - `app/Libraries/Mail/SmtpProvider.php`

## Redis / Cache
- Redis handler supported in `app/Config/Cache.php`.
- Session support via `CodeIgniter\Session\Handlers\RedisHandler`.
- Evidence:
  - `app/Config/Cache.php`
  - `app/Config/Session.php`
  - `app/Controllers/System/HealthController.php` (cache check)

## HTTP Clients / Web Scraping
- Guzzle usage:
  - Marketing service uses Guzzle with timeout=5s.
  - Solana service uses Guzzle with timeout=10s.
- CI4 curlrequest:
  - AlphaVantage, MarketAux, SolanaModel, Zapier.
- Evidence:
  - `app/Services/MarketingService.php`
  - `app/Services/SolanaService.php`
  - `app/Libraries/MyMIAlphaVantage.php`
  - `app/Libraries/MyMIMarketAux.php`
  - `app/Services/ZapierService.php`

## Cron/CLI Integration Triggers
- Alerts, marketing, Discord, and predictions controllers expose cron-style endpoints.
- Evidence:
  - `app/Modules/APIs/Controllers/AlertsController.php`
  - `app/Modules/APIs/Controllers/MarketingController.php`
  - `app/Modules/APIs/Controllers/DiscordController.php`
  - `app/Modules/APIs/Controllers/PredictionsController.php`
  - `app/Commands/OpsWork.php` (ops queue)
