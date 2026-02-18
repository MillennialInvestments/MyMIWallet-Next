<?php

namespace App\Commands\Ops;

use App\Commands\SafeBaseCommand;
use CodeIgniter\CLI\CLI;

class ModelLimitAudit extends SafeBaseCommand
{
    protected $group = 'ops';
    protected $name = 'ops:model-limit:audit';
    protected $description = 'Audit models/services/libraries for unbounded query patterns.';

    public function run(array $params)
    {
        $scanDirs = [
            APPPATH . 'Models',
            APPPATH . 'Libraries',
            APPPATH . 'Services',
        ];

        foreach (glob(APPPATH . 'Modules/*/Models', GLOB_ONLYDIR) ?: [] as $moduleModelDir) {
            $scanDirs[] = $moduleModelDir;
        }

        $skipMethodTokens = ['paginate', 'serverside', 'datatable', 'chunk', 'count', 'exists', 'sum', 'avg', 'min', 'max'];
        $findings = [];

        foreach ($scanDirs as $dir) {
            if (! is_dir($dir)) {
                continue;
            }

            $iterator = new \RecursiveIteratorIterator(new \RecursiveDirectoryIterator($dir));
            foreach ($iterator as $fileInfo) {
                if (! $fileInfo->isFile() || $fileInfo->getExtension() !== 'php') {
                    continue;
                }

                $path = $fileInfo->getPathname();
                $contents = file_get_contents($path);
                if ($contents === false) {
                    continue;
                }

                $lines = preg_split('/\R/', $contents) ?: [];
                $currentMethod = '';
                $braceDepth = 0;

                foreach ($lines as $index => $line) {
                    $lineNo = $index + 1;
                    if (preg_match('/function\s+([A-Za-z0-9_]+)\s*\(/', $line, $m) === 1) {
                        $currentMethod = strtolower($m[1]);
                        $braceDepth = 0;
                    }

                    if ($currentMethod !== '') {
                        $braceDepth += substr_count($line, '{') - substr_count($line, '}');
                        if ($braceDepth <= 0 && strpos($line, 'function') === false) {
                            $currentMethod = '';
                        }
                    }

                    if ($currentMethod !== '') {
                        foreach ($skipMethodTokens as $token) {
                            if (str_contains($currentMethod, $token)) {
                                continue 2;
                            }
                        }
                    }

                    $lineLower = strtolower($line);
                    if (str_contains($lineLower, 'count(') || str_contains($lineLower, 'sum(') || str_contains($lineLower, 'group by') || str_contains($lineLower, ' limit ')) {
                        continue;
                    }

                    $unsafePatterns = [
                        '->get()->getresultarray()' => 'get()->getResultArray() without limit',
                        '->get()->getresultobject()' => 'get()->getResultObject() without limit',
                        '->get()->getresult()' => 'get()->getResult() without limit',
                        '->findall()' => 'findAll() without limit',
                        '->get();' => 'get() without limit',
                    ];

                    foreach ($unsafePatterns as $pattern => $reason) {
                        if (str_contains($lineLower, $pattern) && ! str_contains($lineLower, 'limit(') && ! str_contains($lineLower, 'paginate(')) {
                            $findings[] = [
                                'file' => $this->relativePath($path),
                                'line' => $lineNo,
                                'reason' => $reason,
                                'snippet' => trim($line),
                            ];
                        }
                    }
                }
            }
        }

        if ($findings === []) {
            CLI::write('No unsafe model query patterns detected.', 'green');
            return EXIT_SUCCESS;
        }

        CLI::write('Unsafe query patterns detected: ' . count($findings), 'red');
        foreach ($findings as $finding) {
            CLI::write(sprintf('%s:%d %s', $finding['file'], $finding['line'], $finding['reason']), 'yellow');
            CLI::write('  ' . $finding['snippet']);
        }

        return EXIT_ERROR;
    }

    protected function isDestructive(): bool
    {
        return false;
    }

    private function relativePath(string $path): string
    {
        $root = rtrim(ROOTPATH, '/\\') . DIRECTORY_SEPARATOR;

        if (str_starts_with($path, $root)) {
            return ltrim(substr($path, strlen($root)), '/\\');
        }

        return $path;
    }
}
