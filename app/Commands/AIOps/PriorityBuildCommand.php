<?php

namespace App\Commands\AIOps;

use App\Commands\SafeBaseCommand; // if you already have it; otherwise BaseCommand
use App\Services\AIOps\DocsScannerService;
use App\Services\AIOps\RepoVerifierService;
use App\Services\AIOps\OllamaCodeGenService;
use App\Services\AIOps\PriorityWriterService;
use CodeIgniter\CLI\CLI;
use Throwable;

class PriorityBuildCommand extends SafeBaseCommand
{
    protected $group       = 'AIOps - Audit';
    protected $name        = 'aiops:priority:build';
    protected $description = 'Scan /docs, detect gaps, verify repo, stage codegen artifacts for PR batching, and write /docs/priority outputs.';

    protected $aiOpsRunnable   = true;
    protected $defaultDryRun   = true;

    public function run(array $params)
    {
        $flags = $this->parseParams($params);

        $dryRun      = ($flags['dry-run'] ?? null) !== null ? (bool) $flags['dry-run'] : $this->defaultDryRun;
        $doCodegen   = ($flags['codegen'] ?? null) !== null ? (bool) $flags['codegen'] : false;
        $limitDocs   = (int) ($flags['limit-docs'] ?? 0);
        $limitGaps   = (int) ($flags['limit-gaps'] ?? 0);
        $priorityMin = (int) ($flags['min-priority'] ?? 1); // 1=highest
        $maxPrGroups = (int) ($flags['max-pr-groups'] ?? 5);

        CLI::write('AI Ops Priority Build', 'green');
        CLI::write('dryRun=' . ($dryRun ? 'true' : 'false') . ' codegen=' . ($doCodegen ? 'true' : 'false'));

        $docsScanner = service('aiopsDocsScanner');   /** @var DocsScannerService $docsScanner */
        $verifier    = service('aiopsRepoVerifier');  /** @var RepoVerifierService $verifier */
        $writer      = service('aiopsPriorityWriter');/** @var PriorityWriterService $writer */
        $codegen     = service('aiopsOllamaCodeGen'); /** @var OllamaCodeGenService $codegen */

        try {
            // 1) Scan docs and extract gaps
            $scan = $docsScanner->scanAllDocs(WRITEPATH . '../docs', $limitDocs);

            // 2) Verify repo existence for each gap item
            $verified = $verifier->verifyGapItems($scan->gapItems);

            // 3) Rank + filter into a NOW list
            $nowList = $writer->buildNowList($verified, $priorityMin, $limitGaps);

            // 4) Write docs/priority outputs
            if (! $dryRun) {
                $writer->writePriorityOutputs($scan, $nowList);
            }

            // 5) Optional: generate missing code into docs/Github/temporary
            if ($doCodegen) {
                $groups = $writer->groupGapItemsForPRs($nowList, $maxPrGroups);

                foreach ($groups as $groupName => $groupItems) {
                    CLI::write("PR Group: {$groupName} (items: " . count($groupItems) . ")", 'yellow');

                    if ($dryRun) {
                        CLI::write('dry-run: skipping codegen + staging');
                        continue;
                    }

                    $artifacts = $codegen->generateArtifactsForGroup($groupName, $groupItems);

                    $writer->stageArtifactsForPRGroup($groupName, $groupItems, $artifacts);
                }
            }

            CLI::write('Done.', 'green');
            return 0;

        } catch (Throwable $e) {
            CLI::error('Priority build failed: ' . $e->getMessage());
            return 1;
        }
    }
}
