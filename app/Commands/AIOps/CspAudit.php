<?php

namespace App\Commands\AIOps;

use App\Commands\SafeBaseCommand;
use CodeIgniter\CLI\CLI;
use RecursiveDirectoryIterator;
use RecursiveIteratorIterator;

class CspAudit extends SafeBaseCommand
{
    protected $group = 'AIOps';
    protected $name = 'aiops:csp:audit';
    protected $description = 'Scans the repository for CSP violations and writes a dated audit report.';
    protected $usage = 'aiops:csp:audit';
    protected $options = [
        '--dry-run' => 'Scan and print summary without writing markdown report.',
    ];

    /**
     * @param array<int, string> $params
     */
    public function run(array $params)
    {
        [$args, $flags] = $this->parseParams($params);
        $dryRun = $this->resolveDryRun($flags);

        $patterns = [
            'style="' => '/\bstyle\s*=\s*["\"]/i',
            'onclick=' => '/\bonclick\s*=\s*["\"]/i',
            'onchange=' => '/\bonchange\s*=\s*["\"]/i',
            '<script>' => '/<script(?![^>]*\bsrc=)(?![^>]*\bcsp_script_nonce\s*\()/i',
            '<style>' => '/<style(?![^>]*\bcsp_style_nonce\s*\()/i',
        ];

        $excludedDirs = ['vendor', 'writable', '.git', 'node_modules', 'system', 'builds'];
        $allowedExt = ['php', 'html', 'htm', 'js', 'jsx', 'ts', 'tsx'];

        $findings = [];
        $iterator = new RecursiveIteratorIterator(
            new RecursiveDirectoryIterator(ROOTPATH, RecursiveDirectoryIterator::SKIP_DOTS)
        );

        foreach ($iterator as $file) {
            if (! $file->isFile()) {
                continue;
            }

            $relative = ltrim(str_replace(ROOTPATH, '', $file->getPathname()), DIRECTORY_SEPARATOR);
            if ($relative === '') {
                continue;
            }

            foreach ($excludedDirs as $excluded) {
                if (str_starts_with($relative, $excluded . DIRECTORY_SEPARATOR) || $relative === $excluded) {
                    continue 2;
                }
            }

            if (! in_array(strtolower($file->getExtension()), $allowedExt, true)) {
                continue;
            }

            $lines = @file($file->getPathname());
            if (! is_array($lines)) {
                continue;
            }

            foreach ($lines as $index => $line) {
                foreach ($patterns as $label => $regex) {
                    if (! preg_match($regex, $line)) {
                        continue;
                    }

                    $category = $this->categorize($relative);
                    $risk = $this->riskScore($relative, $category);

                    $findings[] = [
                        'file' => $relative,
                        'line' => $index + 1,
                        'type' => $label,
                        'category' => $category,
                        'risk' => $risk,
                    ];
                }
            }
        }

        usort($findings, static fn(array $a, array $b): int => [$a['file'], $a['line']] <=> [$b['file'], $b['line']]);

        CLI::write(sprintf('AIOps CSP audit findings: %d', count($findings)), count($findings) > 0 ? 'yellow' : 'green');

        $reportPath = 'docs/_aiops/audits/csp-audit-' . date('Ymd') . '.md';
        if (! $dryRun) {
            $this->writeReport($reportPath, $findings);
            CLI::write('Report written: ' . $reportPath, 'green');
        } else {
            CLI::write('Dry-run enabled: no report file written.', 'yellow');
        }

        return EXIT_SUCCESS;
    }

    private function categorize(string $path): string
    {
        $normalized = strtolower(str_replace('\\', '/', $path));

        if (str_contains($normalized, '/emails/') || str_contains($normalized, 'email')) {
            return 'email';
        }

        if (str_contains($normalized, '/blog/') || str_contains($normalized, '/blogs/')) {
            return 'blog';
        }

        if (str_contains($normalized, '/layouts/') || str_contains($normalized, '/layout')) {
            return 'layout';
        }

        return 'module';
    }

    private function riskScore(string $path, string $category): string
    {
        $normalized = strtolower(str_replace('\\', '/', $path));

        if (str_contains($normalized, 'exchange')) {
            return 'HIGH';
        }

        if (str_contains($normalized, 'wallet')) {
            return 'HIGH';
        }

        if (str_contains($normalized, 'marketing')) {
            return 'MEDIUM';
        }

        if (str_contains($normalized, 'dashboard') || str_contains($normalized, 'chart')) {
            return 'MEDIUM';
        }

        if ($category === 'blog') {
            return 'LOW';
        }

        if ($category === 'email') {
            return 'LOW';
        }

        return 'MEDIUM';
    }

    /**
     * @param array<int, array{file:string,line:int,type:string,category:string,risk:string}> $findings
     */
    private function writeReport(string $reportPath, array $findings): void
    {
        $byCategory = ['layout' => 0, 'module' => 0, 'email' => 0, 'blog' => 0];
        foreach ($findings as $finding) {
            $byCategory[$finding['category']] = ($byCategory[$finding['category']] ?? 0) + 1;
        }

        $content = [];
        $content[] = '# CSP Audit Report';
        $content[] = '';
        $content[] = '- Generated: ' . date('c');
        $content[] = '- Total findings: ' . count($findings);
        $content[] = '- Layout findings: ' . ($byCategory['layout'] ?? 0);
        $content[] = '- Module findings: ' . ($byCategory['module'] ?? 0);
        $content[] = '- Email findings: ' . ($byCategory['email'] ?? 0);
        $content[] = '- Blog findings: ' . ($byCategory['blog'] ?? 0);
        $content[] = '';
        $content[] = '## Findings';
        $content[] = '';
        $content[] = '| File | Line | Type | Category | Risk |';
        $content[] = '| --- | ---: | --- | --- | --- |';

        foreach ($findings as $finding) {
            $content[] = sprintf(
                '| `%s` | %d | `%s` | %s | %s |',
                $finding['file'],
                $finding['line'],
                $finding['type'],
                $finding['category'],
                $finding['risk']
            );
        }

        if ($findings === []) {
            $content[] = '| _none_ | - | - | - | - |';
        }

        $dir = dirname(ROOTPATH . $reportPath);
        if (! is_dir($dir)) {
            mkdir($dir, 0775, true);
        }

        file_put_contents(ROOTPATH . $reportPath, implode("\n", $content) . "\n");
    }

    protected function isDestructive(): bool
    {
        return false;
    }
}
