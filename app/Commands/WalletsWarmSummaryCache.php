<?php

namespace App\Commands;

use App\Models\UserModel;
use App\Services\WalletSummaryService;
use App\Commands\SafeBaseCommand;
use CodeIgniter\CLI\CLI;

class WalletsWarmSummaryCache extends SafeBaseCommand
{
    protected string $group       = 'wallets';
    protected string $name        = 'wallets:warm-summary-cache';
    protected $description = 'Pre-warm the /API/Wallets/summary cache for active users.';
    protected $usage       = 'wallets:warm-summary-cache [user-id] [--dry-run]';
    protected $arguments   = [
        'user-id' => 'Optional user ID to warm (default: all active).',
    ];
    protected $options     = [
        '--dry-run' => 'Preview actions without warming cache',
    ];

    private ?WalletSummaryService $summaryService = null;

    public function run(array $params)
    {
        log_message('info', '[spark:wallets:warm-summary-cache] Started', ['params' => $params]);
        [$args, $flags] = $this->parseParams($params);
        $dryRun = $this->resolveDryRun($flags);
        $explicitUser = (int) ($args[0] ?? 0);
        $userIds      = $explicitUser > 0 ? [$explicitUser] : $this->activeUserIds();

        if (empty($userIds)) {
            CLI::write('No active users found to warm cache for.', 'yellow');
            log_message('info', '[spark:wallets:warm-summary-cache] Completed', ['users' => 0, 'dry_run' => $dryRun]);
            return EXIT_SUCCESS;
        }

        CLI::write(sprintf('Warming wallet summary cache for %d user(s)...', count($userIds)));

        if ($dryRun) {
            CLI::write('Dry-run enabled. Cache warm skipped.', 'yellow');
            log_message('info', '[spark:wallets:warm-summary-cache] Completed', [
                'users' => count($userIds),
                'dry_run' => true,
            ]);
            return EXIT_SUCCESS;
        }

        foreach ($userIds as $uid) {
            try {
                $this->service()->buildSummary($uid, true);
                CLI::write(" - user {$uid}: cached", 'green');
            } catch (\Throwable $e) {
                CLI::error(" - user {$uid}: " . $e->getMessage());
            }
        }

        CLI::write('Wallet summary cache warm complete.');
        log_message('info', '[spark:wallets:warm-summary-cache] Completed', [
            'users' => count($userIds),
            'dry_run' => false,
        ]);

        return EXIT_SUCCESS;
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

    protected function isDestructive(): bool
    {
        return false;
    }
}
