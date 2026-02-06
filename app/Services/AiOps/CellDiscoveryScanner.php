<?php

declare(strict_types=1);

namespace App\Services\AiOps;

use App\Models\AiOpsReviewLedgerModel;
use App\Models\AiOpsScanStateModel;
use App\Models\AiOpsWorkQueueModel;
use RecursiveDirectoryIterator;
use RecursiveIteratorIterator;
use RuntimeException;

class CellDiscoveryScanner
{
    private string $scannerName = 'cell_discovery';
    private AiOpsScanStateModel $stateModel;
    private AiOpsWorkQueueModel $queueModel;
    private AiOpsReviewLedgerModel $ledgerModel;

    public function __construct(
        ?AiOpsScanStateModel $stateModel = null,
        ?AiOpsWorkQueueModel $queueModel = null,
        ?AiOpsReviewLedgerModel $ledgerModel = null
    ) {
        $this->stateModel = $stateModel ?? new AiOpsScanStateModel();
        $this->queueModel = $queueModel ?? new AiOpsWorkQueueModel();
        $this->ledgerModel = $ledgerModel ?? new AiOpsReviewLedgerModel();
    }

    public function scannerName(): string
    {
        return $this->scannerName;
    }

    public function reset(): void
    {
        $this->queueModel->clearScanner($this->scannerName);
        $state = $this->stateModel->getOrCreateScannerState($this->scannerName);
        $this->stateModel->update((int) $state['id'], [
            'status' => 'idle',
            'last_cursor' => null,
            'cycle_count' => 0,
            'last_run_at' => null,
            'notes' => 'State reset by operator',
            'updated_at' => date('Y-m-d H:i:s'),
        ]);
    }

    /**
     * @return array<string,mixed>
     */
    public function runCycle(array $config): array
    {
        $batch = max(1, (int) ($config['batch_size'] ?? 5));
        $dryRun = (bool) ($config['dry_run'] ?? true);
        $writePr = (bool) ($config['write_pr'] ?? false);
        $maxPrs = max(1, (int) ($config['max_prs_per_run'] ?? 1));
        $runDir = (string) ($config['run_dir'] ?? $this->prepareRunDir());

        $files = $this->discoverFiles();
        $queueAdded = 0;
        foreach ($files as $filePath) {
            $abs = ROOTPATH . $filePath;
            if (! is_file($abs)) {
                continue;
            }
            $hash = hash_file('sha256', $abs) ?: null;
            if ($hash === null) {
                continue;
            }
            if ($this->ledgerModel->wasReviewedWithHash($this->scannerName, $filePath, $hash)) {
                continue;
            }
            $this->queueModel->enqueueIfMissing($this->scannerName, $filePath, $hash, $this->resolvePriority($filePath));
            $queueAdded++;
        }

        $pending = $this->queueModel->nextPendingBatch($this->scannerName, $batch);
        if ($pending === []) {
            return [
                'run_dir' => $runDir,
                'files_discovered' => count($files),
                'queue_added' => $queueAdded,
                'processed' => 0,
                'candidates_found' => 0,
                'pending_left' => 0,
                'prs_created' => 0,
                'status_counts' => $this->queueModel->countByStatus($this->scannerName),
            ];
        }

        $analyses = [];
        $blockIndex = [];
        $candidatesFound = 0;
        $processedCount = 0;
        $batchCandidates = [];

        foreach ($pending as $item) {
            $queueId = (int) $item['id'];
            $filePath = (string) $item['file_path'];
            $hash = (string) ($item['file_hash'] ?? '');

            $this->queueModel->markProcessing($queueId);

            try {
                $analysis = $this->analyzeFile($filePath);
                $analysis['file_hash'] = $hash;
                $analysis['queue_id'] = $queueId;
                $analysis['candidate'] = false;
                $analyses[] = $analysis;
                $processedCount++;

                foreach ($analysis['blocks'] as $block) {
                    $blockHash = (string) ($block['hash'] ?? '');
                    if ($blockHash === '') {
                        continue;
                    }
                    $blockIndex[$blockHash][] = [
                        'file_path' => $filePath,
                        'block' => $block,
                    ];
                }
            } catch (\Throwable $e) {
                $this->queueModel->markFailed($queueId, $e->getMessage());
                $this->ledgerModel->recordDecision($this->scannerName, $filePath, $hash, 'failed', $e->getMessage());
            }
        }

        $duplicates = [];
        foreach ($blockIndex as $blockHash => $occurrences) {
            $filesWith = array_values(array_unique(array_map(static fn ($r) => $r['file_path'], $occurrences)));
            if (count($filesWith) < 2) {
                continue;
            }
            $duplicates[$blockHash] = [
                'count' => count($occurrences),
                'files' => $filesWith,
                'snippet' => $occurrences[0]['block']['snippet'] ?? '',
            ];
        }

        foreach ($analyses as &$analysis) {
            $filePath = (string) $analysis['file_path'];
            $hash = (string) $analysis['file_hash'];
            $queueId = (int) $analysis['queue_id'];
            $candidateBlocks = [];
            foreach ($analysis['blocks'] as $block) {
                $h = (string) ($block['hash'] ?? '');
                if ($h !== '' && isset($duplicates[$h])) {
                    $candidateBlocks[] = $block;
                }
            }

            $isCandidate = $candidateBlocks !== [];
            $analysis['candidate'] = $isCandidate;
            $analysis['candidate_blocks'] = $candidateBlocks;
            $this->writeFileArtifact($runDir, $filePath, $analysis);

            if ($isCandidate) {
                $candidatesFound++;
                $batchCandidates[] = [
                    'file_path' => $filePath,
                    'file_hash' => $hash,
                    'blocks' => $candidateBlocks,
                ];
                $this->ledgerModel->recordDecision($this->scannerName, $filePath, $hash, 'candidate', 'Duplicate blocks detected');
            } else {
                $this->ledgerModel->recordDecision($this->scannerName, $filePath, $hash, 'skipped', 'No duplicate blocks detected');
            }

            $this->queueModel->markCompleted($queueId);
        }
        unset($analysis);

        $prsCreated = 0;
        $prRefs = [];
        if ($writePr && ! $dryRun && $batchCandidates !== [] && $maxPrs > 0) {
            $result = $this->applyRefactorsAndDraftPr($batchCandidates, $duplicates, $runDir);
            if ($result !== null) {
                $prsCreated = 1;
                $prRefs[] = $result;
            }
        }

        $this->writeAggregateArtifacts($runDir, $analyses, $duplicates, $batchCandidates, $dryRun, $writePr, $prRefs);

        return [
            'run_dir' => $runDir,
            'files_discovered' => count($files),
            'queue_added' => $queueAdded,
            'processed' => $processedCount,
            'candidates_found' => $candidatesFound,
            'pending_left' => count($this->queueModel->nextPendingBatch($this->scannerName, 1)),
            'prs_created' => $prsCreated,
            'status_counts' => $this->queueModel->countByStatus($this->scannerName),
        ];
    }

    /** @return array<int,string> */
    private function discoverFiles(): array
    {
        $paths = [ROOTPATH . 'app/Views', ROOTPATH . 'app/Modules'];
        $files = [];
        foreach ($paths as $base) {
            if (! is_dir($base)) {
                continue;
            }
            $it = new RecursiveIteratorIterator(new RecursiveDirectoryIterator($base));
            foreach ($it as $fileInfo) {
                if (! $fileInfo->isFile()) {
                    continue;
                }
                $path = str_replace('\\', '/', $fileInfo->getPathname());
                if (! str_ends_with($path, '.php')) {
                    continue;
                }
                $rel = ltrim(str_replace(str_replace('\\', '/', ROOTPATH), '', $path), '/');
                if ($rel === '' || str_contains($rel, '/vendor/') || str_contains($rel, '/writable/') || str_contains($rel, '/docs/') || str_contains($rel, '/tests/')) {
                    continue;
                }
                if (str_starts_with($rel, 'app/Views/') || preg_match('#^app/Modules/.+/Views/.+\.php$#', $rel) === 1) {
                    $files[] = $rel;
                }
            }
        }

        sort($files);
        return array_values(array_unique($files));
    }

    /** @return array<string,mixed> */
    private function analyzeFile(string $filePath): array
    {
        $abs = ROOTPATH . $filePath;
        if (! is_file($abs)) {
            throw new RuntimeException('File missing: ' . $filePath);
        }

        $content = (string) file_get_contents($abs);
        $blocks = [];

        preg_match_all('/<div[^>]*class="[^"]*(?:nk-block|card|widget)[^"]*"[^>]*>.*?<\/div>/is', $content, $matches);
        $chunks = $matches[0] ?? [];

        if ($chunks === []) {
            preg_match_all('/<section[^>]*>.*?<\/section>/is', $content, $sectionMatches);
            $chunks = $sectionMatches[0] ?? [];
        }

        foreach ($chunks as $chunk) {
            $normalized = trim((string) preg_replace('/\s+/', ' ', $chunk));
            if ($normalized === '' || strlen($normalized) < 120) {
                continue;
            }
            $blocks[] = [
                'hash' => hash('sha256', $normalized),
                'length' => strlen($normalized),
                'snippet' => mb_substr($normalized, 0, 200),
                'contains_php' => str_contains($chunk, '<?'),
                'raw' => $chunk,
            ];
        }

        return [
            'file_path' => $filePath,
            'block_count' => count($blocks),
            'blocks' => $blocks,
        ];
    }

    private function writeFileArtifact(string $runDir, string $filePath, array $analysis): void
    {
        $name = str_replace(['/', '.php'], ['__', ''], $filePath);
        $path = $runDir . '/analysis_' . $name . '.json';
        file_put_contents($path, json_encode($analysis, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES));
    }

    /**
     * @param array<int,array<string,mixed>> $analyses
     * @param array<string,mixed> $duplicates
     * @param array<int,array<string,mixed>> $batchCandidates
     * @param array<int,string> $prRefs
     */
    private function writeAggregateArtifacts(string $runDir, array $analyses, array $duplicates, array $batchCandidates, bool $dryRun, bool $writePr, array $prRefs): void
    {
        $recommendations = [];
        foreach ($batchCandidates as $candidate) {
            $suggested = 'Shared' . ucfirst(substr(sha1((string) $candidate['file_path']), 0, 8)) . 'Cell';
            $recommendations[] = [
                'file_path' => $candidate['file_path'],
                'suggested_cell' => $suggested,
                'insertion' => "<?= view_cell('App\\Cells\\{$suggested}::render') ?>",
                'block_count' => count($candidate['blocks'] ?? []),
            ];
        }

        file_put_contents($runDir . '/recommendations.json', json_encode([
            'dry_run' => $dryRun,
            'write_pr' => $writePr,
            'recommendations' => $recommendations,
        ], JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES));

        file_put_contents($runDir . '/duplicates.json', json_encode($duplicates, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES));

        $summaryLines = [
            '# Cell Discovery Summary',
            '',
            '- Dry run: ' . ($dryRun ? 'yes' : 'no'),
            '- PR mode: ' . ($writePr ? 'enabled' : 'disabled'),
            '- Files analyzed: ' . count($analyses),
            '- Candidate files: ' . count($batchCandidates),
            '- Duplicate block groups: ' . count($duplicates),
            '- PR refs: ' . ($prRefs === [] ? 'none' : implode(', ', $prRefs)),
            '',
            '## Risk Notes',
            '- Complex PHP blocks are skipped from auto-refactor.',
            '- Proposed cells are recommendations unless --dry-run=0 --write-pr=1.',
            '',
        ];
        file_put_contents($runDir . '/summary.md', implode(PHP_EOL, $summaryLines));

        $draftLines = [
            '# PR Draft (Batch 1)',
            '',
            '## Candidate blocks',
        ];
        if ($recommendations === []) {
            $draftLines[] = '- None in this batch.';
        } else {
            foreach ($recommendations as $rec) {
                $draftLines[] = '- ' . $rec['file_path'] . ' => ' . $rec['suggested_cell'];
            }
        }
        $draftLines[] = '';
        $draftLines[] = '## Suggested insertion spots';
        foreach ($recommendations as $rec) {
            $draftLines[] = '- ' . $rec['file_path'] . ': `' . $rec['insertion'] . '`';
        }
        $draftLines[] = '';
        $draftLines[] = '## Risk notes';
        $draftLines[] = '- Validate rendered output after extraction.';
        $draftLines[] = '- Keep complex PHP logic in source views.';
        $draftLines[] = '';

        file_put_contents($runDir . '/PR_DRAFT_batch_1.md', implode(PHP_EOL, $draftLines));

        file_put_contents($runDir . '/report.json', json_encode([
            'files_scanned' => count($analyses),
            'candidates_found' => count($batchCandidates),
            'duplicates_map' => $duplicates,
            'queue_stats' => $this->queueModel->countByStatus($this->scannerName),
        ], JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES));

        $latest = '# Latest Cell Discovery Run' . PHP_EOL . PHP_EOL . '- Run directory: `' . str_replace(ROOTPATH, '', $runDir) . '`' . PHP_EOL;
        $latestPath = ROOTPATH . 'docs/_aiops/scans/cell_discovery/LATEST.md';
        if (! is_dir(dirname($latestPath))) {
            mkdir(dirname($latestPath), 0775, true);
        }
        file_put_contents($latestPath, $latest);
    }

    /**
     * @param array<int,array<string,mixed>> $batchCandidates
     * @param array<string,mixed> $duplicates
     */
    private function applyRefactorsAndDraftPr(array $batchCandidates, array $duplicates, string $runDir): ?string
    {
        $changes = 0;
        $ref = 'draft-only';
        foreach ($batchCandidates as $candidate) {
            $filePath = (string) $candidate['file_path'];
            $abs = ROOTPATH . $filePath;
            $source = (string) file_get_contents($abs);
            foreach (($candidate['blocks'] ?? []) as $block) {
                if (($block['contains_php'] ?? true) === true) {
                    continue;
                }
                $hash = (string) ($block['hash'] ?? '');
                if ($hash === '' || ! isset($duplicates[$hash])) {
                    continue;
                }

                $cellName = 'AutoCell' . ucfirst(substr($hash, 0, 8));
                $cellViewRel = 'app/Views/cells/' . strtolower($cellName) . '.php';
                $cellClassRel = 'app/Cells/' . $cellName . '.php';

                if (! is_dir(ROOTPATH . 'app/Views/cells')) {
                    mkdir(ROOTPATH . 'app/Views/cells', 0775, true);
                }
                if (! is_dir(ROOTPATH . 'app/Cells')) {
                    mkdir(ROOTPATH . 'app/Cells', 0775, true);
                }

                if (! is_file(ROOTPATH . $cellViewRel)) {
                    file_put_contents(ROOTPATH . $cellViewRel, (string) ($block['raw'] ?? ''));
                }
                if (! is_file(ROOTPATH . $cellClassRel)) {
                    $classContent = "<?php\n\nnamespace App\\Cells;\n\nclass {$cellName}\n{\n    public function render(array $params = []): string\n    {\n        return view('cells/" . strtolower($cellName) . "', $params);\n    }\n}\n";
                    file_put_contents(ROOTPATH . $cellClassRel, $classContent);
                }

                $replacement = "<?= view_cell('App\\\\Cells\\\\{$cellName}::render', []) ?>";
                $rawBlock = (string) ($block['raw'] ?? '');
                if ($rawBlock !== '' && str_contains($source, $rawBlock)) {
                    $source = str_replace($rawBlock, $replacement, $source);
                    $changes++;
                }
            }
            file_put_contents($abs, $source);
        }

        $branch = 'aiops/cell-discovery-' . date('Ymd-His');
        $prDir = ROOTPATH . 'docs/_aiops/pr';
        if (! is_dir($prDir)) {
            mkdir($prDir, 0775, true);
        }
        $prPath = $prDir . '/' . $branch . '.md';
        file_put_contents($prPath, "# PR Draft\n\nBranch: {$branch}\n\nChanges applied: {$changes}\n\nOpen PR manually from this branch if GitHub automation is unavailable.\n");

        if ($changes > 0) {
            $ref = $branch;
        }

        file_put_contents($runDir . '/phase2_result.json', json_encode(['branch' => $branch, 'changes' => $changes], JSON_PRETTY_PRINT));

        return $ref;
    }

    private function prepareRunDir(): string
    {
        $base = ROOTPATH . 'docs/_aiops/scans/cell_discovery';
        if (! is_dir($base)) {
            mkdir($base, 0775, true);
        }

        $runDir = $base . '/run-' . date('Ymd-His');
        if (! is_dir($runDir)) {
            mkdir($runDir, 0775, true);
        }

        return $runDir;
    }

    private function resolvePriority(string $filePath): int
    {
        if (str_contains($filePath, '/Dashboard/') || str_contains($filePath, '/Budget/')) {
            return 50;
        }

        return 100;
    }
}
