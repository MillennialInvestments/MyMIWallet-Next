<?php

declare(strict_types=1);

namespace App\Commands\GigHop;

use App\Commands\Base\BaseAiopsCommand;

class Health extends BaseAiopsCommand
{
    protected $group = 'GigHop';
    protected $name = 'gighop:health';
    protected $description = 'Checks GigHop operational health (drivers, gigs, queue).';

    public function run(array $params): int
    {
        return $this->safeRun(function (): int {
            helper(['aiops', 'cli']);
            $aiops = service('aiopsService');

            $snapshot = $aiops->statusSnapshot();
            $checks = [
                'active_drivers' => 'OK (integration placeholder)',
                'active_gigs'    => 'OK (integration placeholder)',
                'queue_load'     => 'OK (integration placeholder)',
            ];

            $this->writeOutput('GigHop Health Snapshot @ ' . aiops_now(), 'info');
            foreach ($checks as $label => $status) {
                $this->writeOutput(sprintf('- %s: %s', $label, $status), 'success');
            }
            $this->logCommandEvent('gighop_health', ['snapshot' => $snapshot, 'checks' => $checks]);

            return EXIT_SUCCESS;
        });
    }
}
