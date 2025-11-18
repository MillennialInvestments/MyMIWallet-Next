# Adding a New Alert Source

Adding sources now follows a simple adapter pattern so scanners, manual forms, or 3rd-party feeds can share the same ingestion API.

## 1. Implement the interface

```php
namespace App\Alerts\Sources;

use App\Libraries\AlertSourceInterface;

class ExampleNewsSource implements AlertSourceInterface
{
    public function fetch(): array
    {
        // Return an array of canonical alert DTOs:
        // [ [ 'symbol' => 'AAPL', 'summary' => '...', 'metadata' => [] ], ... ]
    }
}
```

Each DTO should include:

- `symbol` (uppercase ticker)
- `detected_at` timestamp
- `source` string (for audit logs)
- any optional metadata (`category`, `segment`, `scanner_name`, etc.)

## 2. Register the source

Open `App\Libraries\MyMIAlerts` and update `getActiveSources()` to include your class.  Sources can be toggled by environment variables or config entries for quick experimentation.

```php
public function getActiveSources(): array
{
    return [
        new ThinkOrSwimEmailSource(...),
        new MarketAuxNewsSource(...),
        new ExampleNewsSource(...),
    ];
}
```

## 3. Enqueue work instead of processing inline

Sources should never write directly to `bf_investment_trade_alerts`.  Instead, call the queue helper:

```php
$queue = service('alertJobQueue');
foreach ($source->fetch() as $dto) {
    $payload = [
        'symbol'      => $dto['symbol'],
        'metadata'    => $dto['metadata'] ?? [],
        'description' => $dto['summary'] ?? '',
    ];
    $queue->enqueue('parse_alert', $payload);
}
```

The worker (or AlertsModel) handles ticker validation, trade creation, and alert history snapshots.

## 4. Document the source

Update `docs/alerts/architecture.md` and/or `docs/alerts/alerts_routes_inventory.md` if your source exposes a new API route.  Include any CRON or credential notes inside `docs/alerts/runbook.md` so operations can keep it healthy.

## 5. Test via the queue endpoint

Run the worker locally or via CRON:

```
php spark alerts:run-queue parse_alert
# or curl https://www.mymiwallet.com/index.php/API/Alerts/runQueue/parse_alert?key=...
```

Watch the logs for `processed`, `failed`, and `queued` counts to ensure your source behaves as expected before enabling it in production.
