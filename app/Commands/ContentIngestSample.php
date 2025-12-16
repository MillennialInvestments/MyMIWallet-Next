<?php

declare(strict_types=1);

namespace App\Commands;

use App\Config\ContentEngine as ContentEngineConfig;
use App\Libraries\ContentEngine\PostDraftService;
use App\Libraries\ContentEngine\ScannerIngestService;
use App\Libraries\ContentEngine\ScannerScoringService;
use CodeIgniter\CLI\BaseCommand;
use CodeIgniter\CLI\CLI;

class ContentIngestSample extends BaseCommand
{
    protected $group = 'content';
    protected $name = 'content:ingest-sample';
    protected $description = 'Load sample Daily Top Gainers JSON, ingest, score, and print the top 5 ideas.';

    public function run(array $params)
    {
        $config = config(ContentEngineConfig::class);
        $path = WRITEPATH . 'samples/daily_gainers.json';
        if (! is_file($path)) {
            CLI::error('Sample file missing: ' . $path);
            return;
        }

        $payload = json_decode((string) file_get_contents($path), true);
        $ingestService = new ScannerIngestService($config);
        $scoringService = new ScannerScoringService($config);
        $draftService = new PostDraftService($config);

        $ingest = $ingestService->ingest($payload, 'cli_sample');
        $ideas = $scoringService->scoreIngest((int) $ingest['ingest_id']);
        $draftService->generateDrafts((int) $ingest['ingest_id'], $ideas);

        CLI::write('Ingest #' . $ingest['ingest_id'] . ' processed. Top ideas:');
        foreach (array_slice($ideas, 0, 5) as $idea) {
            CLI::write(sprintf('- %s | score %.2f | tier %s', $idea['symbol'], $idea['score_total'], $idea['tier']));
        }
    }
}