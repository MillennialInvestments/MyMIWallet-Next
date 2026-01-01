<?php

namespace App\Commands;

use App\Models\UserModel;
use App\Services\WalletSummaryService;
use CodeIgniter\CLI\BaseCommand;
use CodeIgniter\CLI\CLI;

class WalletsWarmSummaryCache extends BaseCommand
{
    protected $group       = 'wallets';
    protected $name        = 'wallets:warm-summary-cache';
    protected $description = 'Pre-warm the /API/Wallets/summary cache for active users.';
    protected $usage       = 'wallets:warm-summary-cache [--user 123]';

    private ?WalletSummaryService $summaryService = null;

    public function run(array $params)
    {
        $explicitUser = (int) (CLI::getOption('user') ?? 0);
        $userIds      = $explicitUser > 0 ? [$explicitUser] : $this->activeUserIds();

        if (empty($userIds)) {
            CLI::write('No active users found to warm cache for.', 'yellow');
            return;
        }

        CLI::write(sprintf('Warming wallet summary cache for %d user(s)...', count($userIds)));

        foreach ($userIds as $uid) {
            try {
                $this->service()->buildSummary($uid, true);
                CLI::write(" - user {$uid}: cached", 'green');
            } catch (\Throwable $e) {
                CLI::error(" - user {$uid}: " . $e->getMessage());
            }
        }

        CLI::write('Wallet summary cache warm complete.');
    }

    private function activeUserIds(): array
    {
        $model = new UserModel();

        return array_map(
            'intval',
            $model->where('active', 1)
                ->where('deleted_at', null)
                ->findColumn('id') ?? []
        );
    }

    private function service(): WalletSummaryService
    {
        if ($this->summaryService === null) {
            $this->summaryService = new WalletSummaryService();
        }

        return $this->summaryService;
    }
}
