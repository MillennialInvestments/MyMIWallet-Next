<?php

declare(strict_types=1);

namespace App\Commands\AIOps;

use App\Services\AIOps\CodeAnalyzerService;
use CodeIgniter\CLI\BaseCommand;
use CodeIgniter\CLI\CLI;
use Throwable;

class AnalyzeCode extends BaseCommand
{
    protected $group       = 'AIOps';
    protected $name        = 'aiops:analyze:code';
    protected $description = 'Analyze files or folders for security, UX, performance, maintainability, and backend efficiency risks.';
    protected $usage       = 'aiops:analyze:code --file="app/Config/Routes.php" [--json] [--no-ai]';

    protected $options = [
        '--file'      => 'Single file to analyze, relative to project root.',
        '--path'      => 'Directory path to analyze, relative to project root.',
        '--ext'       => 'Comma-separated file extensions for --path. Default: php,js,css',
        '--max-files' => 'Maximum files to analyze for --path. Default: 50',
        '--json'      => 'Also write a JSON report.',
        '--no-ai'     => 'Deterministic local-only analysis. Included for compatibility.',
    ];

    public function run(array $params)
    {
        $file     = CLI::getOption('file');
        $path     = CLI::getOption('path');
        $ext      = CLI::getOption('ext') ?: 'php,js,css';
        $maxFiles = (int) (CLI::getOption('max-files') ?: 50);
        $writeJson = CLI::getOption('json') !== null;

        if (! $file && ! $path) {
            CLI::error('Provide --file="..." or --path="...".');
            return EXIT_ERROR;
        }

        try {
            $service = new CodeAnalyzerService(ROOTPATH);

            $result = $service->analyze([
                'file'      => is_string($file) ? $file : null,
                'path'      => is_string($path) ? $path : null,
                'ext'       => is_string($ext) ? $ext : 'php,js,css',
                'max_files' => $maxFiles > 0 ? $maxFiles : 50,
                'json'      => $writeJson,
                'no_ai'     => CLI::getOption('no-ai') !== null,
            ]);

            $paths = $service->writeReports($result, $writeJson);

            CLI::write('AIOps Code Analysis complete.', 'green');
            CLI::write('Risk score: ' . $result['summary']['risk_score'] . ' / 100');
            CLI::write('Risk level: ' . strtoupper($result['summary']['risk_level']));
            CLI::write('Files scanned: ' . $result['summary']['files_scanned']);
            CLI::write('Findings: ' . $result['summary']['findings_count']);
            CLI::write('Markdown report: ' . $paths['markdown']);

            if (! empty($paths['json'])) {
                CLI::write('JSON report: ' . $paths['json']);
            }

            foreach (array_slice($result['findings'], 0, 10) as $finding) {
                CLI::write(sprintf(
                    '- [%s] %s:%s %s',
                    strtoupper($finding['severity']),
                    $finding['file'],
                    $finding['line'],
                    $finding['title']
                ));
            }

            if ($result['summary']['findings_count'] > 10) {
                CLI::write('...additional findings are in the report.');
            }

            return EXIT_SUCCESS;
        } catch (Throwable $e) {
            CLI::error($e->getMessage());
            log_message('error', 'aiops:analyze:code failed: {message}', [
                'message' => $e->getMessage(),
            ]);

            return EXIT_ERROR;
        }
    }
}
