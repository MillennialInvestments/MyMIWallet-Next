<?php

declare(strict_types=1);

namespace App\Commands\Alerts;

use App\Commands\SafeBaseCommand;
use App\Services\AlertService;
use CodeIgniter\CLI\CLI;

class Evaluate extends SafeBaseCommand
{
    protected $group       = 'Alerts';
    protected $name        = 'alerts:evaluate';
    protected $description = 'Evaluate open trade alerts against current market snapshot prices and update target/stop status.';
    protected $usage       = 'alerts:evaluate [--limit=50] [--json]';
    protected $options     = [
        '--limit' => 'Max number of alerts to evaluate (default: 50)',
        '--json'  => 'Emit raw JSON result',
    ];

    public function run(array $params)
    {
        [, $flags] = $this->parseParams($params);
        $json = isset($flags['json']) || $this->optBool($flags, 'json');
        $limit = $this->optInt($flags, 'limit', 50);
        if ($limit <= 0) {
            $limit = 50;
        }

        /** @var AlertService $service */
        $service = service('alertService');
        $summary = $service->evaluateActiveAlerts($limit);

        if ($json) {
            CLI::write(json_encode($summary, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES));
            return EXIT_SUCCESS;
        }

        CLI::write('====================================================', 'yellow');
        CLI::write('             MYMI ALERT EVALUATION AUDIT            ', 'yellow');
        CLI::write('====================================================', 'yellow');
        CLI::write("Evaluated:    {$summary['evaluated_count']}");
        CLI::write("Targets Hit:  {$summary['targets_hit']}", 'green');
        CLI::write("Stops Hit:    {$summary['stops_hit']}", 'red');
        CLI::write("Active Left:  {$summary['active_count']}", 'yellow');
        CLI::newLine();

        if (! empty($summary['details'])) {
            CLI::write('Evaluation Details:', 'white');
            foreach ($summary['details'] as $detail) {
                $eval = $detail['evaluation'] ?? 'ACTIVE';
                $color = match ($eval) {
                    'TARGET_HIT' => 'green',
                    'STOP_HIT'   => 'red',
                    default      => 'yellow',
                };
                $sym = $detail['symbol'] ?? 'UNKNOWN';
                $cur = isset($detail['current_price']) ? number_format((float) $detail['current_price'], 2) : 'N/A';
                $tgt = isset($detail['target_price']) ? number_format((float) $detail['target_price'], 2) : 'N/A';
                $stp = isset($detail['stop_loss']) ? number_format((float) $detail['stop_loss'], 2) : 'N/A';
                CLI::write(sprintf("  [%s] %-6s Cur: %-8s Tgt: %-8s Stp: %-8s Status: %s", $eval, $sym, $cur, $tgt, $stp, $detail['new_status'] ?? 'Opened'), $color);
            }
        }

        return EXIT_SUCCESS;
    }

    protected function isDestructive(): bool
    {
        return false;
    }
}
