<?php

declare(strict_types=1);

namespace App\Commands\API;

use App\Libraries\ApiResearch\ApiDiffEngine;
use App\Libraries\ApiResearch\ApiReportWriter;
use App\Models\ApiResearchRunModel;
use App\Commands\SafeBaseCommand;
use CodeIgniter\CLI\CLI;

class ApiDiff extends SafeBaseCommand
{
    protected $group       = 'API';
    protected $name        = 'api:diff';
    protected $description = 'Compare the two most recent research runs for a provider.';
    protected $usage       = 'api:diff <provider_slug>';
    protected $arguments   = [
        'provider_slug' => 'Provider slug.',
    ];

    public function run(array $params)
    {
        $providerSlug = $params[0] ?? null;

        if (empty($providerSlug)) {
            CLI::error('Missing provider slug.');
            return;
        }

        $runModel = new ApiResearchRunModel();
        $runs = $runModel->where('provider_slug', $providerSlug)
            ->orderBy('id', 'DESC')
            ->findAll(2);

        if (count($runs) < 2) {
            CLI::error('Need at least two runs to compare.');
            return;
        }

        $engine = new ApiDiffEngine();
        $writer = new ApiReportWriter();

        $oldRun = $runs[1];
        $newRun = $runs[0];

        $oldSnapshot = $writer->readJsonFile((string) $oldRun['json_snapshot_path']);
        $newSnapshot = $writer->readJsonFile((string) $newRun['json_snapshot_path']);

        $diff = $engine->compare($oldSnapshot, $newSnapshot);

        $path = $writer->writeDiffReport($providerSlug, $diff);

        CLI::write('Diff complete.', 'green');
        CLI::write('Diff report: ' . $path);
    }
}