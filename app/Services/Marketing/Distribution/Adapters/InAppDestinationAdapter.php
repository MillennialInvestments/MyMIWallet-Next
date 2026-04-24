<?php

declare(strict_types=1);

namespace App\Services\Marketing\Distribution\Adapters;

use App\Services\Marketing\Distribution\DestinationSendResult;
use Config\Database;

final class InAppDestinationAdapter implements DestinationAdapterInterface
{
    public function send(array $target, array $payload): DestinationSendResult
    {
        $db = Database::connect();
        $db->table('bf_marketing_in_app_notifications')->insert([
            'generated_content_id' => (int) ($target['generated_content_id'] ?? 0),
            'target_group' => (string) ($payload['target_group'] ?? 'internal_team'),
            'title' => (string) ($payload['title'] ?? 'Marketing update available'),
            'message' => (string) ($payload['summary'] ?? ''),
            'status' => 'sent',
            'created_on' => date('Y-m-d H:i:s'),
            'modified_on' => date('Y-m-d H:i:s'),
        ]);

        return new DestinationSendResult(true, 200, false, null, (string) $db->insertID(), 'in_app_sent', date('Y-m-d H:i:s'));
    }
}
