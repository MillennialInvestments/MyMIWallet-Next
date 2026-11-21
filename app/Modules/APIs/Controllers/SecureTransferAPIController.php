<?php

declare(strict_types=1);

namespace App\Modules\APIs\Controllers;

use App\Controllers\BaseAPIController;
use App\Libraries\SecureTransfer\DbTransferStore;
use App\Libraries\SecureTransfer\SecureTransferService;
use Config\SecureTransfer as SecureTransferConfig;

/**
 * GET /API/v1/SecureTransfer/status (apiToken). Counts only: no wallets, ids,
 * manifests or user data. Read by the TBI AIOps MCP tool mymi_transfer_status.
 */
class SecureTransferAPIController extends BaseAPIController
{
    public function status()
    {
        $config = config(SecureTransferConfig::class);
        $db = db_connect();
        if (!$db->tableExists('bf_secure_transfers')) {
            return $this->respond(['ok' => true, 'enabled' => $config->enabled, 'protocol' => 'MST1', 'migrated' => false]);
        }
        $stats = (new SecureTransferService($config, new DbTransferStore($db)))->stats();
        $stats['migrated'] = true;
        $stats['limits'] = ['max_bytes' => $config->maxBytes, 'max_days' => $config->maxDays, 'max_recipients' => $config->maxRecipients];
        return $this->respond($stats);
    }
}
