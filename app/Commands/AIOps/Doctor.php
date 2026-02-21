<?php

declare(strict_types=1);

namespace App\Commands\AIOps;

use App\Commands\SafeBaseCommand;
use CodeIgniter\CLI\CLI;

class Doctor extends SafeBaseCommand
{
    protected $group = 'AIOps - Audit';
    protected $name = 'aiops:doctor';
    protected $description = 'Validate AIOps service wiring, namespace casing, and Spark helper migration state.';

    public function run(array $params)
    {
        $checks = [];

        $requiredClasses = [
            \App\Services\AIOps\ObservabilityStateService::class,
            \App\Services\AIOps\FingerprintService::class,
            \App\Services\AIOps\RegressionEvaluator::class,
            \App\Services\AIOps\PRComposerService::class,
            \App\Services\AIOps\ReleaseNotesService::class,
            \App\Services\AIOps\PriorityWriterService::class,
        ];

        foreach ($requiredClasses as $fqcn) {
            $ok = class_exists($fqcn);
            $checks[] = [$ok, "class_exists {$fqcn}"];
        }

        $serviceMethods = [
            'aiopsDocsScanner', 'aiopsRepoVerifier', 'aiopsPriorityWriter', 'aiopsOllamaCodeGen',
            'aiopsOllamaPatchRunner', 'aiopsManualRunNotifier', 'aiopsPublicPagesPipeline',
            'aiopsObservabilityState', 'aiopsFingerprint', 'aiopsRegressionEvaluator', 'aiopsPRComposer', 'aiopsReleaseNotes',
        ];

        foreach ($serviceMethods as $serviceName) {
            try {
                $instance = service($serviceName);
                $checks[] = [is_object($instance), "service('{$serviceName}')"];
            } catch (\Throwable $e) {
                $checks[] = [false, "service('{$serviceName}') => " . $e->getMessage()];
            }
        }

        $aiopsRefs = [];
        exec("rg -n 'App\\\\Services\\\\AiOps|namespace App\\\\Services\\\\AiOps' app 2>/dev/null", $aiopsRefs);
        $checks[] = [count($aiopsRefs) === 0, 'No App\\Services\\AiOps casing references in app/'];

        $runSparkRefs = [];
        exec("rg -n 'runSpark\\(' app/Commands/AIOps 2>/dev/null", $runSparkRefs);
        $checks[] = [count($runSparkRefs) === 0, 'No runSpark(...) usage in app/Commands/AIOps'];

        $passed = 0;
        foreach ($checks as [$ok, $label]) {
            CLI::write(($ok ? '[PASS] ' : '[FAIL] ') . $label, $ok ? 'green' : 'red');
            if ($ok) {
                $passed++;
            }
        }

        $total = count($checks);
        $report = "# AIOps Doctor Report\n\n";
        $report .= '- Generated: ' . date('c') . "\n";
        $report .= "- Summary: {$passed}/{$total} checks passed\n\n";
        foreach ($checks as [$ok, $label]) {
            $report .= '- ' . ($ok ? 'PASS' : 'FAIL') . ': ' . $label . "\n";
        }
        if ($aiopsRefs !== []) {
            $report .= "\n## AiOps References\n```\n" . implode("\n", $aiopsRefs) . "\n```\n";
        }
        if ($runSparkRefs !== []) {
            $report .= "\n## runSpark References\n```\n" . implode("\n", $runSparkRefs) . "\n```\n";
        }

        $reportPath = ROOTPATH . 'docs/_aiops/doctor/report.md';
        @mkdir(dirname($reportPath), 0775, true);
        file_put_contents($reportPath, $report);

        $okAll = $passed === $total;
        $this->nextStep($okAll ? 'aiops:priority:build' : 'aiops:health:full', $okAll ? 'Doctor passed; continue with priority build.' : 'Doctor failed; gather more diagnostics before retry.', ['docs/_aiops/doctor/report.md']);

        return $okAll ? EXIT_SUCCESS : EXIT_ERROR;
    }
}
