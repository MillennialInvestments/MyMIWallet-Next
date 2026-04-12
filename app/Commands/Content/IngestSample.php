<?php

declare(strict_types=1);

namespace App\Commands\Content;

use Config\ContentEngine as ContentEngineConfig;
use App\Libraries\ContentEngine\PostDraftService;
use App\Libraries\ContentEngine\ScannerIngestService;
use App\Libraries\ContentEngine\ScannerScoringService;
use App\Commands\SafeBaseCommand;
use CodeIgniter\CLI\CLI;

class IngestSample extends SafeBaseCommand
{
    protected $group = 'content';
    protected $name = 'content:ingest-sample';
    protected $description = 'Load sample Daily Top Gainers JSON, ingest, score, and print the top 5 ideas.';
    protected $options = [
        '--dry-run' => 'Preview actions without writing ingest data',
    ];

    public function run(array $params)
    {
        log_message('info', '[spark:content:ingest-sample] Started', ['params' => $params]);
        [$args, $flags] = $this->parseParams($params);
        $dryRun = $this->resolveDryRun($flags);

        $config = config(ContentEngineConfig::class);
        $path = WRITEPATH . 'samples/daily_gainers.json';
        if (! is_file($path)) {
            CLI::error('Sample file missing: ' . $path);
            log_message('error', '[spark:content:ingest-sample] Failed', ['reason' => 'Sample file missing']);
            return EXIT_ERROR;
        }

        if ($dryRun) {
            CLI::write('Dry-run enabled. Ingest will not be executed.', 'yellow');
            log_message('info', '[spark:content:ingest-sample] Completed', ['dry_run' => true]);
            return EXIT_SUCCESS;
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

        log_message('info', '[spark:content:ingest-sample] Completed', [
            'ingest_id' => $ingest['ingest_id'] ?? null,
            'dry_run' => false,
        ]);

        return EXIT_SUCCESS;
    }

    protected function isDestructive(): bool
    {
        return false;
    }
}
