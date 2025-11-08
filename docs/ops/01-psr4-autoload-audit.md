# PSR-4 Autoload Audit (2025-10-07)

This runbook documents the initial Composer autoload hardening pass for the MyMI Wallet CodeIgniter 4 application. Use it to verify PSR-4 compliance whenever new modules, migrations, or libraries are introduced.

## Objectives

- Normalize Composer's PSR-4 configuration so only canonical `App\` classes are autoloaded.
- Exclude archived and quarantined code from Composer's optimized autoloader.
- Provide tooling to locate namespace/path mismatches and automatically quarantine duplicate class definitions.
- Capture outstanding fixes that still need follow-up renames.

## Composer Autoload Configuration

Composer now loads the application namespace strictly from `app/` and ignores archived or quarantined folders:

```json
{
  "autoload": {
    "psr-4": {
      "App\\": "app/"
    },
    "exclude-from-classmap": [
      "app/_archive/**",
      "app/_quarantine/**"
    ]
  }
}
```

Regenerate optimized autoloaders after pulling this change:

```bash
COMPOSER_MEMORY_LIMIT=-1 php composer.phar dump-autoload -o
```

> **Note:** `composer install` currently fails on hosts without the `ext-gmp` extension because `bitcoin-php/bitcoin-ecdsa` requires it. Re-run with `--ignore-platform-req=ext-gmp` on systems where GMP cannot be enabled (e.g., DreamHost shared PHP) or install the extension locally when possible.

## PSR-4 Audit Tooling

### `tools/psr4-audit.php`

Usage:

```bash
php tools/psr4-audit.php
```

The script scans `app/` (excluding `_archive`, `_quarantine`, `Views`, and `ThirdParty`) and reports any file whose path does not match the namespace/class it declares. Exit code `2` indicates mismatches were found.

Current audit output (2025-10-07):

| Class | Current Path | Expected Path |
| --- | --- | --- |
| `App\Modules\Predictions\Controllers\API\PredictionsApiController` | `app/Modules/Predictions/Controller/API/PredictionsAPIController.php` | `app/Modules/Predictions/Controllers/API/PredictionsApiController.php` |
| `App\Modules\Blog\Controllers\FeaturesController` | `app/Modules/Advertise/Controllers/FeaturesController.php` | `app/Modules/Blog/Controllers/FeaturesController.php` |
| `App\Modules\Users\Controllers\TradeTracker` | `app/Modules/User/Controllers/TradeTracker.php` | `app/Modules/Users/Controllers/TradeTracker.php` |
| `App\Modules\Users\Models\UserModuleModel` | `app/Modules/User/Models/UserModuleModel.php` | `app/Modules/Users/Models/UserModuleModel.php` |
| `App\Libraries\MyMIEsportsStartGG` | `app/Libraries/MyMIESportsStartGG.php` | `app/Libraries/MyMIEsportsStartGG.php` |
| `App\Libraries\MyMIEsports` | `app/Libraries/MyMIESports.php` | `app/Libraries/MyMIEsports.php` |
| `Config\Earnings\Oct302024` | `app/Config/Earnings/Oct282024.php` | `app/Config/Earnings/Oct302024.php` |
| `App\Database\Migrations\Onboarding` | `app/Database/Migrations/2025-09-02-000110_Onboarding.php` | `app/Database/Migrations/Onboarding.php` |
| `App\Database\Migrations\CreateUserSessions` | `app/Database/Migrations/2025-09-09-000000_CreateUserSessions.php` | `app/Database/Migrations/CreateUserSessions.php` |
| `App\Database\Migrations\CreateRbacTables` | `app/Database/Migrations/2025-09-02-000010_CreateRbacTables.php` | `app/Database/Migrations/CreateRbacTables.php` |
| `App\Database\Migrations\PrivacyAndAudit` | `app/Database/Migrations/2025-09-02-000030_PrivacyAndAudit.php` | `app/Database/Migrations/PrivacyAndAudit.php` |
| `App\Database\Migrations\QueueIdempotencyBreaker` | `app/Database/Migrations/2025-09-02-000060_QueueIdempotencyBreaker.php` | `app/Database/Migrations/QueueIdempotencyBreaker.php` |
| `App\Database\Migrations\FinanceCore` | `app/Database/Migrations/2025-09-02-000090_FinanceCore.php` | `app/Database/Migrations/FinanceCore.php` |
| `App\Database\Migrations\FeatureFlags` | `app/Database/Migrations/2025-09-02-000040_FeatureFlags.php` | `app/Database/Migrations/FeatureFlags.php` |
| `App\Database\Migrations\AddProjectsFundingPipeline` | `app/Database/Migrations/2025-10-04-000001_add_projects_funding_pipeline.php` | `app/Database/Migrations/AddProjectsFundingPipeline.php` |
| `App\Database\Migrations\SearchFulltext` | `app/Database/Migrations/2025-09-02-000070_SearchFulltext.php` | `app/Database/Migrations/SearchFulltext.php` |
| `App\Database\Migrations\CreateUserSecurityTables` | `app/Database/Migrations/2025-09-02-000001_CreateUserSecurityTables.php` | `app/Database/Migrations/CreateUserSecurityTables.php` |
| `App\Database\Migrations\PushSubscriptions` | `app/Database/Migrations/2025-09-02-000080_PushSubscriptions.php` | `app/Database/Migrations/PushSubscriptions.php` |
| `App\Database\Migrations\SearchLogs` | `app/Database/Migrations/2025-09-02-000071_SearchLogs.php` | `app/Database/Migrations/SearchLogs.php` |
| `App\Database\Migrations\BackupsLifecycle` | `app/Database/Migrations/2025-09-02-000100_BackupsLifecycle.php` | `app/Database/Migrations/BackupsLifecycle.php` |
| `App\Database\Migrations\AntiAbuse` | `app/Database/Migrations/2025-09-02-000050_AntiAbuse.php` | `app/Database/Migrations/AntiAbuse.php` |
| `App\Database\Migrations\ApiKeysAndWebhooks` | `app/Database/Migrations/2025-09-02-000020_ApiKeysAndWebhooks.php` | `app/Database/Migrations/ApiKeysAndWebhooks.php` |
| `App\HTTP\SafeSiteURI` | `app/HTTP/SafeSiteURL.php` | `app/HTTP/SafeSiteURI.php` |
| `App\Exceptions\Gateway\RevenueException` | `app/Exceptions/Gateway/RevenueExceptions.php` | `app/Exceptions/Gateway/RevenueException.php` |

Use this table as a to-do list for future renames and migration normalisation.

### `tools/find-duplicate-classes.php`

Usage examples:

```bash
# Detect duplicates without moving anything
php tools/find-duplicate-classes.php --src app --dry-run

# Move older duplicates into app/_quarantine/dupes (default behaviour)
php tools/find-duplicate-classes.php --src app --move-to app/_quarantine/dupes
```

The script keeps the newest file (based on modification time) and moves older copies into the quarantine directory while preserving their relative folder structure.

## Quarantined Files (2025-10-07)

| Class | Source File | Quarantine Target |
| --- | --- | --- |
| `App\Exceptions\Gateway\GatewayTimeoutException` | `app/Exceptions/Gateway/TimeoutException.php` | `app/_quarantine/dupes/Exceptions/Gateway/TimeoutException.php` |

## Next Steps

- Rename the files listed in the audit table to their expected PSR-4 paths.
- Re-run `php tools/psr4-audit.php` until it exits successfully with no mismatches.
- After renames, execute `COMPOSER_MEMORY_LIMIT=-1 php composer.phar dump-autoload -o` to refresh the optimized autoloader.
- Monitor the quarantined folder and remove obsolete duplicates once confirmed no longer needed.
