<?php

declare(strict_types=1);

namespace App\Commands\Ops;

use App\Commands\SafeBaseCommand;
use CodeIgniter\CLI\CLI;
use SebastianBergmann\Diff\Differ;
use SebastianBergmann\Diff\Output\UnifiedDiffOutputBuilder;

class Diff extends SafeBaseCommand
{
    protected $group       = 'Ops';
    protected $name        = 'ops:diff';
    protected $description = 'Compare two files and persist AIOps diff artifact.';
    protected $usage       = 'ops:diff <fileA> <fileB> [--label=name]';
    protected $arguments   = [
        'fileA' => 'First file path (relative to project root)',
        'fileB' => 'Second file path (relative to project root)',
    ];
    protected $options     = [
        '--label' => 'Optional label for diff folder',
    ];

    public function run(array $params)
    {
        if (count($params) < 2) {
            CLI::error('Two file paths required.');
            return EXIT_ERROR;
        }

        $fileAPath = ROOTPATH . $params[0];
        $fileBPath = ROOTPATH . $params[1];

        if (! is_file($fileAPath) || ! is_file($fileBPath)) {
            CLI::error('One or both files do not exist.');
            return EXIT_ERROR;
        }

        $contentA = file_get_contents($fileAPath);
        $contentB = file_get_contents($fileBPath);

        $shaA = hash('sha256', $contentA);
        $shaB = hash('sha256', $contentB);

        $builder = new UnifiedDiffOutputBuilder("--- {$params[0]}\n+++ {$params[1]}\n");
        $differ  = new Differ($builder);

        $diff = $differ->diff($contentA, $contentB);

        $timestamp = gmdate('Y-m-d H:i:s');
        $dateFolder = gmdate('Y-m-d');
        $label = CLI::getOption('label') ?? 'ops_diff';

        $baseDir = ROOTPATH . "docs/_aiops/diffs/{$dateFolder}--{$label}/";
        if (! is_dir($baseDir)) {
            mkdir($baseDir, 0775, true);
        }

        $fileName = basename($params[0]) . '.diff';

        $mdPath = $baseDir . $fileName . '.md';
        $jsonPath = $baseDir . $fileName . '.json';

        $linesAdded = substr_count($diff, "\n+");
        $linesRemoved = substr_count($diff, "\n-");
        $totalChanges = $linesAdded + $linesRemoved;

        $riskScore = $this->calculateRiskScore($totalChanges);

        $markdown = $this->buildMarkdownReport(
            $timestamp,
            $params[0],
            $params[1],
            $shaA,
            $shaB,
            $diff,
            $riskScore
        );

        file_put_contents($mdPath, $markdown);

        file_put_contents($jsonPath, json_encode([
            'generated_at' => $timestamp,
            'file_a' => $params[0],
            'file_b' => $params[1],
            'sha256_a' => $shaA,
            'sha256_b' => $shaB,
            'lines_added' => $linesAdded,
            'lines_removed' => $linesRemoved,
            'total_changes' => $totalChanges,
            'risk_score' => $riskScore,
            'identical' => trim($diff) === '',
        ], JSON_PRETTY_PRINT));

        CLI::write("Diff artifact created:", 'green');
        CLI::write($mdPath);
        CLI::write($jsonPath);

        return trim($diff) === '' ? EXIT_SUCCESS : EXIT_ERROR;
    }

    private function calculateRiskScore(int $changes): string
    {
        if ($changes === 0) return 'NONE';
        if ($changes < 20) return 'LOW';
        if ($changes < 100) return 'MEDIUM';
        if ($changes < 300) return 'HIGH';
        return 'CRITICAL';
    }

    private function buildMarkdownReport(
        string $timestamp,
        string $fileA,
        string $fileB,
        string $shaA,
        string $shaB,
        string $diff,
        string $riskScore
    ): string {
        return <<<MD
        # AIOps Diff Report

        Generated: {$timestamp} UTC  
        File A: {$fileA}  
        File B: {$fileB}  

        SHA256 A: {$shaA}  
        SHA256 B: {$shaB}  

        Risk Score: {$riskScore}

        ---

        ## Unified Diff

        ```diff
        {$diff}

        MD;
    }
}