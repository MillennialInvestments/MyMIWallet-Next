# Adding a New Delivery Channel

Delivery channels share the `AlertChannelInterface` contract so Discord, email, Zapier, and future platforms can be wired up in minutes.

## 1. Implement the channel

```php
namespace App\Alerts\Channels;

use App\Libraries\AlertChannelInterface;

class TwitterChannel implements AlertChannelInterface
{
    public function getName(): string
    {
        return 'twitter';
    }

    public function deliver(array $alert): bool
    {
        // Use $alert['summary'], $alert['ticker'], etc.
        // Return true when the post succeeds.
    }
}
```

## 2. Register the channel

In `MyMIAlerts` (or `MyMIMarketing` if it owns the fan-out) update `getDeliveryChannels()`:

```php
public function getDeliveryChannels(): array
{
    return [
        new DiscordChannel($this->discordClient),
        new EmailChannel($this->mailer),
        new TwitterChannel($this->twitterSdk),
    ];
}
```

Each channel reports its `getName()` so job payloads can simply specify `"channel": "twitter"`.

## 3. Enqueue distribution jobs

```php
$queue->enqueue('distribute_discord', [
    'alert_id' => $alertId,
    'channel'  => 'twitter'
]);
```

The queue worker resolves the channel by name and passes the hydrated alert (ticker, summary, prices, media package URLs).

## 4. Handle failures gracefully

- Return `false` or throw an exception when the API rejects the payload.
- The queue helper will retry up to `alerts.queue.maxAttempts` before marking the job as failed.
- Add rate-limit awareness when dealing with social APIs (headers like `x-rate-limit-remaining`).

## 5. Document + expose in UI

- Update `docs/alerts/architecture.md` to mention the new channel.
- Surface the channel inside the Management Alerts dashboard so Teddy can toggle or manually trigger it.
- If the channel requires secrets, capture those in the runbook (see `docs/alerts/runbook.md`).
