<?php

declare(strict_types=1);

namespace App\Commands;

use App\Config\ContentEngine as ContentEngineConfig;
use App\Libraries\ContentEngine\PostDraftService;
use App\Libraries\ContentEngine\ScannerIngestService;
use App\Libraries\ContentEngine\ScannerScoringService;
use App\Models\ContentPostModel;
use CodeIgniter\CLI\BaseCommand;
use CodeIgniter\CLI\CLI;

class ContentEngineSmoke extends BaseCommand
{
    protected $group = 'content';
    protected $name = 'contentengine:smoke';
    protected $description = 'End-to-end smoke test for the Content Engine ingest → scoring → drafts pipeline.';

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
        $postModel = model(ContentPostModel::class);

        CLI::write('Loading sample from ' . $path);
        $ingest = $ingestService->ingest($payload, 'cli_smoke');
        $ingestId = (int) $ingest['ingest_id'];
        CLI::write('Ingest #' . $ingestId . ' saved with ' . $ingest['row_count'] . ' rows.');

        $ideas = $scoringService->scoreIngest($ingestId, true);
        $drafts = $draftService->generateDrafts($ingestId, $ideas);

        $tierCounts = ['tier1' => 0, 'tier2' => 0, 'tier3' => 0, 'avoid' => 0];
        foreach ($ideas as $idea) {
            $tierCounts[$idea['tier']]++;
        }

        CLI::write('Tier counts: ' . json_encode($tierCounts));

        $top = array_slice($ideas, 0, 5);
        CLI::write('Top 5 picks:');
        foreach ($top as $idea) {
            CLI::write(sprintf('- %s | score %.2f | tier %s', $idea['symbol'], $idea['score_total'], $idea['tier']));
        }

        $platformCounts = [];
        foreach ($drafts as $draft) {
            $platformCounts[$draft['platform']] = ($platformCounts[$draft['platform']] ?? 0) + 1;
        }
        CLI::write('Draft counts by platform: ' . json_encode($platformCounts));

        $postTotal = $postModel->where('idea_id', $top[0]['id'] ?? null)->countAllResults();
        CLI::write('Preview drafts available for first idea: ' . $postTotal);
    }
}
