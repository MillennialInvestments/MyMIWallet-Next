<?php

declare(strict_types=1);

namespace App\Services\Marketing\Distribution\Adapters;

use App\Services\Marketing\Distribution\DestinationSendResult;
use Config\Database;
use Config\MarketingDistribution;

final class EmailDestinationAdapter implements DestinationAdapterInterface
{
    public function __construct(private MarketingDistribution $distributionConfig)
    {
    }

    public function send(array $target, array $payload): DestinationSendResult
    {
        $db = Database::connect();
        $recipients = $this->distributionConfig->internalEmailRecipients;
        if ($recipients === []) {
            return new DestinationSendResult(false, null, false, 'config_missing_recipients', null, 'No internal email recipients configured');
        }

        $inserted = 0;
        foreach ($recipients as $recipient) {
            $db->table('bf_email_outbox')->insert([
                'user_id' => null,
                'to_email' => $recipient,
                'subject' => (string) ($payload['title'] ?? 'Marketing distribution update'),
                'type' => 'marketing_internal_distribution',
                'status' => 'queued',
                'error_message' => null,
                'provider' => 'smtp',
                'meta_json' => json_encode([
                    'generated_content_id' => (int) ($target['generated_content_id'] ?? 0),
                    'summary' => $payload['summary'] ?? '',
                    'destination' => 'email',
                ]),
                'created_at' => date('Y-m-d H:i:s'),
                'sent_at' => null,
            ]);
            $inserted++;
        }

        return new DestinationSendResult(true, 200, false, null, null, 'queued_emails:' . $inserted, date('Y-m-d H:i:s'));
    }
}
