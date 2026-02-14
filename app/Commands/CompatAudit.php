<?php

declare(strict_types=1);

namespace App\Commands;

use CodeIgniter\CLI\CLI;

class CompatAudit extends SafeBaseCommand
{
    protected $group       = 'App';
    protected $name        = 'app:compat-audit';
    protected $description = 'Audit MyMI Wallet for CI4 + PHP compatibility issues.';
    protected $usage       = 'app:compat-audit [--fix] [--php=8.2] [--json=path] [--csv=path]';
    protected $options     = [
        '--fix'  => 'Attempt safe auto-fixes for deterministic replacements.',
        '--php'  => 'Target PHP version for forward-compat assessment (default: current).',
        '--json' => 'Write JSON report to path (default: writable/compat-audit-<timestamp>.json).',
        '--csv'  => 'Write CSV report to path (default: writable/compat-audit-<timestamp>.csv).',
    ];

    private const EXCLUDED_DIRS = [
        '.git',
        'build',
        'builds',
        'node_modules',
        'public/build',
        'vendor',
        'writable',
    ];

    /**
     * @var array<int, array<string, mixed>>
     */
    private $rules = [
        // CI3 -> CI4 migration risks
        [
            'id' => 'CI3_LOADER_USAGE',
            'severity' => 'Critical',
            'regex' => '/\$this->load->\w+\s*\(/',
            'title' => 'CI3 Loader usage detected.',
            'explanation' => 'CI4 removed $this->load. Use helper(), model(), view(), or service locators.',
            'replacement' => 'Replace with CI4 equivalent, e.g. helper("text"); $model = model(FooModel::class); return view("path", $data);',
            'safe_fix' => false,
        ],
        [
            'id' => 'CI3_INPUT_POST',
            'severity' => 'High',
            'regex' => '/\$this->input->post\s*\(/',
            'title' => 'CI3 input->post() usage detected.',
            'explanation' => 'CI4 request input API changed; input->post() does not exist in CI4.',
            'replacement' => '$value = $this->request->getPost("field");',
            'safe_fix' => true,
            'find' => '$this->input->post(',
            'replace' => '$this->request->getPost(',
        ],
        [
            'id' => 'CI3_SESSION_GETID',
            'severity' => 'High',
            'regex' => '/->getId\s*\(\s*\)/',
            'title' => 'Potential session getId() incompatibility.',
            'explanation' => 'Legacy code may call getId() on non-CI4 session objects. Validate session API usage.',
            'replacement' => '$sessionId = session_id(); // or $session = session(); $sessionId = $session->get("session_id") ?? session_id();',
            'safe_fix' => false,
        ],
        [
            'id' => 'CI3_DB_QUERY_STYLE',
            'severity' => 'Medium',
            'regex' => '/\$this->db->query\s*\(/',
            'title' => 'Raw CI3-style db->query() usage detected.',
            'explanation' => 'Use bound params or Query Builder to avoid SQL injection and portability issues.',
            'replacement' => '$db->query("SELECT * FROM table WHERE id = ?", [$id]);',
            'safe_fix' => false,
        ],
        [
            'id' => 'CI3_METHOD_GET_POST',
            'severity' => 'High',
            'regex' => '/\$this->input->(get|post|get_post|cookie|server)\s*\(/',
            'title' => 'Legacy CI3 input methods detected.',
            'explanation' => 'CI3 input helpers were replaced by CI4 request APIs.',
            'replacement' => 'Use $this->request->getGet()/getPost()/getCookie()/getServer().',
            'safe_fix' => false,
        ],
        [
            'id' => 'CI3_REMOVED_METHOD_REQUEST',
            'severity' => 'High',
            'regex' => '/\$this->request->(is_ajax_request|fetch_request_headers)\s*\(/i',
            'title' => 'Potential removed/renamed Request API usage.',
            'explanation' => 'Method names from CI3 can break in CI4 due to naming and API changes.',
            'replacement' => 'Use CI4 methods (e.g., isAJAX(), headers(), getHeaderLine()).',
            'safe_fix' => false,
        ],
        [
            'id' => 'CI3_REMOVED_METHOD_RESPONSE',
            'severity' => 'High',
            'regex' => '/\$this->response->set_header\s*\(/i',
            'title' => 'Potential removed Response method usage.',
            'explanation' => 'CI3 set_header() style should be replaced with CI4 response methods.',
            'replacement' => '$this->response->setHeader("Header-Name", "value");',
            'safe_fix' => false,
        ],

        // PHP 8.2+ forward compatibility
        [
            'id' => 'PHP_DYNAMIC_PROPERTY_ASSIGNMENT',
            'severity' => 'High',
            'regex' => '/\$[a-zA-Z_][a-zA-Z0-9_]*->([a-zA-Z_][a-zA-Z0-9_]*)\s*=\s*/',
            'title' => 'Possible dynamic property assignment.',
            'explanation' => 'PHP 8.2 deprecates dynamic properties unless allowed explicitly.',
            'replacement' => 'Declare property in class first (e.g., private ?string $newProperty = null;).',
            'safe_fix' => false,
        ],
        [
            'id' => 'PHP_NULL_TO_STRING_FUNCTION',
            'severity' => 'Medium',
            'regex' => '/\b(strlen|trim|ltrim|rtrim|strpos|strtolower|strtoupper|substr)\s*\(\s*\$[a-zA-Z_][a-zA-Z0-9_]*\s*\)/',
            'title' => 'Potential null-to-string implicit conversion risk.',
            'explanation' => 'Passing nullable variables to string functions may trigger deprecations/warnings.',
            'replacement' => 'Guard or cast explicitly, e.g. strlen((string) ($value ?? "")).',
            'safe_fix' => false,
        ],
        [
            'id' => 'PHP_DEPRECATED_INTERPOLATION',
            'severity' => 'Medium',
            'regex' => '/"\$\{[^}]+\}"/',
            'title' => 'Deprecated string interpolation syntax found.',
            'explanation' => '"${var}" style interpolation is deprecated in newer PHP versions.',
            'replacement' => 'Use "{$var}" interpolation syntax.',
            'safe_fix' => false,
        ],
        [
            'id' => 'PHP_FILTER_SANITIZE_STRING',
            'severity' => 'High',
            'regex' => '/FILTER_SANITIZE_STRING/',
            'title' => 'Deprecated FILTER_SANITIZE_STRING usage.',
            'explanation' => 'FILTER_SANITIZE_STRING is deprecated/removed in newer PHP versions.',
            'replacement' => 'Use FILTER_SANITIZE_FULL_SPECIAL_CHARS or explicit validation + escaping.',
            'safe_fix' => true,
            'find' => 'FILTER_SANITIZE_STRING',
            'replace' => 'FILTER_SANITIZE_FULL_SPECIAL_CHARS',
        ],
        [
            'id' => 'PHP_UTF8_ENCODE_DEPRECATED',
            'severity' => 'Medium',
            'regex' => '/\butf8_encode\s*\(/',
            'title' => 'utf8_encode() deprecated usage.',
            'explanation' => 'utf8_encode() is deprecated; conversion direction must be explicit.',
            'replacement' => 'Use mb_convert_encoding($value, "UTF-8", "ISO-8859-1").',
            'safe_fix' => false,
        ],
        [
            'id' => 'PHP_UTF8_DECODE_DEPRECATED',
            'severity' => 'Medium',
            'regex' => '/\butf8_decode\s*\(/',
            'title' => 'utf8_decode() deprecated usage.',
            'explanation' => 'utf8_decode() is deprecated; conversion direction must be explicit.',
            'replacement' => 'Use mb_convert_encoding($value, "ISO-8859-1", "UTF-8").',
            'safe_fix' => false,
        ],
        [
            'id' => 'PHP_REFLECTION_LEGACY_USAGE',
            'severity' => 'Low',
            'regex' => '/\bReflection(Parameter|Method|Property|Class)\b/',
            'title' => 'Reflection API usage requires forward-compat review.',
            'explanation' => 'Reflection internals/signatures evolve across PHP releases and may break assumptions.',
            'replacement' => 'Review against target PHP docs and add guards for missing methods/properties.',
            'safe_fix' => false,
        ],
        [
            'id' => 'PHP_FLOAT_TO_INT_COERCION_RISK',
            'severity' => 'Low',
            'regex' => '/\(int\)\s*\$[a-zA-Z_][a-zA-Z0-9_]*\s*\*\s*[0-9\.]+/',
            'title' => 'Potential implicit float-to-int conversion warning.',
            'explanation' => 'Math expressions cast to int may truncate unexpectedly under stricter checks.',
            'replacement' => 'Use round()/floor()/ceil() explicitly before cast to int.',
            'safe_fix' => false,
        ],

        // Fatal/security risk patterns
        [
            'id' => 'RISK_CHAINED_PROPERTY_ACCESS',
            'severity' => 'High',
            'regex' => '/\$[a-zA-Z_][a-zA-Z0-9_]*->\w+->\w+/',
            'title' => 'Potential null unsafe chained property access.',
            'explanation' => 'Intermediate null values can produce fatal errors.',
            'replacement' => 'Use nullsafe operator where possible: $obj?->child?->value.',
            'safe_fix' => false,
        ],
        [
            'id' => 'RISK_UNDEFINED_INDEX_ARRAY',
            'severity' => 'High',
            'regex' => '/\$[a-zA-Z_][a-zA-Z0-9_]*\s*\[\s*["\'][^"\']+["\']\s*\]/',
            'title' => 'Potential undefined index array access.',
            'explanation' => 'Direct keyed array access without guard may trigger notices/fatal logic failures.',
            'replacement' => '$value = $array["key"] ?? null; or guard with isset($array["key"]).',
            'safe_fix' => false,
        ],
        [
            'id' => 'RISK_SUPERGLOBAL_DIRECT_ACCESS',
            'severity' => 'High',
            'regex' => '/\$_(POST|GET|REQUEST|COOKIE|FILES|SERVER)\s*\[\s*["\'][^"\']+["\']\s*\]/',
            'title' => 'Direct superglobal access detected.',
            'explanation' => 'Bypasses CI4 request sanitation/validation flows and can cause undefined index warnings.',
            'replacement' => 'Use request methods with validation (e.g., $this->request->getPost("field")).',
            'safe_fix' => false,
        ],
        [
            'id' => 'RISK_METHOD_EXISTS_DYNAMIC',
            'severity' => 'Medium',
            'regex' => '/\bmethod_exists\s*\(\s*\$[a-zA-Z_][a-zA-Z0-9_]*\s*,\s*\$[a-zA-Z_][a-zA-Z0-9_]*\s*\)/',
            'title' => 'Dynamic method_exists() check detected.',
            'explanation' => 'Dynamic method names can hide dead paths and version incompatibilities.',
            'replacement' => 'Prefer explicit interface/type checks or whitelist allowed method names.',
            'safe_fix' => false,
        ],
        [
            'id' => 'RISK_UNGUARDED_SERVICE_CALL',
            'severity' => 'Medium',
            'regex' => '/\bservice\s*\(\s*["\'][^"\']+["\']\s*\)/',
            'title' => 'Service locator call detected.',
            'explanation' => 'Uncaught service resolution failures can throw and halt execution if not validated.',
            'replacement' => 'Wrap risky service calls with validation/fallback handling in critical execution paths.',
            'safe_fix' => false,
        ],
        [
            'id' => 'RISK_UNESCAPED_VIEW_OUTPUT',
            'severity' => 'High',
            'regex' => '/<\?=\s*\$[a-zA-Z_][a-zA-Z0-9_\[\]"\'\->]*\s*\?>/',
            'title' => 'Potential unescaped view output.',
            'explanation' => 'Raw echo in views may lead to XSS if output is user-controlled.',
            'replacement' => 'Use esc($value) in views: <?= esc($value) ?>.',
            'safe_fix' => false,
            'scope' => 'view',
        ],
        [
            'id' => 'RISK_UNCHECKED_REQUEST_INPUT',
            'severity' => 'Medium',
            'regex' => '/\$this->request->get(Post|Get|Var)\s*\(/',
            'title' => 'Request input read detected; ensure validation is present.',
            'explanation' => 'Input reads should be paired with validation/filter rules for fintech-grade safety.',
            'replacement' => 'Validate with $this->validate([...]) and sanitize/normalize before persistence.',
            'safe_fix' => false,
        ],
    ];

    public function run(array $params)
    {
        [, $flags] = $this->parseParams($params);

        $targetPhp = (string) ($flags['php'] ?? PHP_VERSION);
        $autoFix   = isset($flags['fix']);
        $timestamp = date('Ymd-His');
        $jsonPath  = (string) ($flags['json'] ?? (WRITEPATH . 'compat-audit-' . $timestamp . '.json'));
        $csvPath   = (string) ($flags['csv'] ?? (WRITEPATH . 'compat-audit-' . $timestamp . '.csv'));

        CLI::write('Running Compatibility Audit', 'yellow');
        CLI::write('Target PHP Version: ' . $targetPhp, 'cyan');

        $files = $this->scanPhpFiles(ROOTPATH);
        $issues = [];
        $fixedCount = 0;

        foreach ($files as $file) {
            $scan = $this->scanFile($file, $autoFix);
            $issues = array_merge($issues, $scan['issues']);
            $fixedCount += $scan['fixed'];
        }

        $frameworkDrift = $this->frameworkDrift($targetPhp);
        $summary = $this->buildSummary($issues, $fixedCount, count($files), $frameworkDrift);

        $this->renderConsoleSummary($summary, $issues, $frameworkDrift);
        $this->writeJsonReport($jsonPath, $summary, $issues, $frameworkDrift);
        $this->writeCsvReport($csvPath, $issues);

        CLI::write('JSON report: ' . $jsonPath, 'green');
        CLI::write('CSV report:  ' . $csvPath, 'green');
        CLI::write('Audit Complete.', 'green');

        return EXIT_SUCCESS;
    }

    /**
     * @return array<int, string>
     */
    private function scanPhpFiles(string $basePath): array
    {
        $rii = new \RecursiveIteratorIterator(
            new \RecursiveDirectoryIterator($basePath, \FilesystemIterator::SKIP_DOTS)
        );

        $files = [];
        foreach ($rii as $file) {
            if (! $file->isFile() || $file->getExtension() !== 'php') {
                continue;
            }

            $path = $file->getPathname();
            if ($this->isExcludedPath($path)) {
                continue;
            }

            $files[] = $path;
        }

        sort($files);

        return $files;
    }

    private function isExcludedPath(string $path): bool
    {
        $normalized = str_replace('\\', '/', $path);

        foreach (self::EXCLUDED_DIRS as $excluded) {
            if (str_contains($normalized, '/' . trim($excluded, '/') . '/')) {
                return true;
            }
        }

        return false;
    }

    /**
     * @return array{issues: array<int, array<string, mixed>>, fixed: int}
     */
    private function scanFile(string $filePath, bool $autoFix): array
    {
        $contents = (string) file_get_contents($filePath);
        $lines = preg_split('/\R/', $contents) ?: [];
        $relativePath = ltrim(str_replace(str_replace('\\', '/', ROOTPATH), '', str_replace('\\', '/', $filePath)), '/');
        $isViewPath = str_contains($relativePath, 'app/Views/');

        $issues = [];
        $fixedCount = 0;
        $modified = $contents;

        foreach ($this->rules as $rule) {
            if (($rule['scope'] ?? null) === 'view' && ! $isViewPath) {
                continue;
            }

            foreach ($lines as $lineNumber => $line) {
                if (! preg_match((string) $rule['regex'], $line)) {
                    continue;
                }

                $issues[] = [
                    'severity' => $rule['severity'],
                    'rule' => $rule['id'],
                    'file' => $relativePath,
                    'line' => $lineNumber + 1,
                    'snippet' => trim($line),
                    'title' => $rule['title'],
                    'explanation' => $rule['explanation'],
                    'replacement' => $rule['replacement'],
                    'autofix' => ($rule['safe_fix'] ?? false)
                        ? 'Safe auto-fix available'
                        : 'Manual review required',
                ];
            }

            if ($autoFix && ($rule['safe_fix'] ?? false) && isset($rule['find'], $rule['replace'])) {
                $count = 0;
                $modified = str_replace((string) $rule['find'], (string) $rule['replace'], $modified, $count);
                $fixedCount += $count;
            }
        }

        if ($autoFix && $modified !== $contents) {
            file_put_contents($filePath, $modified);
        }

        return [
            'issues' => $issues,
            'fixed' => $fixedCount,
        ];
    }

    /**
     * @return array<string, mixed>
     */
    private function frameworkDrift(string $targetPhp): array
    {
        $composerPath = ROOTPATH . 'composer.json';
        $lockPath = ROOTPATH . 'composer.lock';

        $composer = is_file($composerPath)
            ? (json_decode((string) file_get_contents($composerPath), true) ?: [])
            : [];
        $lock = is_file($lockPath)
            ? (json_decode((string) file_get_contents($lockPath), true) ?: [])
            : [];

        $phpConstraint = $composer['require']['php'] ?? null;
        $ciConstraint = $composer['require']['codeigniter4/framework'] ?? null;
        $installedCi = null;

        $allPackages = array_merge($lock['packages'] ?? [], $lock['packages-dev'] ?? []);
        $phpConstraintMismatches = [];

        foreach ($allPackages as $package) {
            if (($package['name'] ?? '') === 'codeigniter4/framework') {
                $installedCi = $package['version'] ?? null;
            }

            if (! isset($package['name'], $package['require']['php'])) {
                continue;
            }

            if ($this->isLikelyIncompatiblePhpConstraint((string) $package['require']['php'], $targetPhp)) {
                $phpConstraintMismatches[] = [
                    'package' => $package['name'],
                    'requires' => $package['require']['php'],
                ];
            }
        }

        return [
            'current_php' => PHP_VERSION,
            'target_php' => $targetPhp,
            'composer_php_requirement' => $phpConstraint,
            'composer_ci_requirement' => $ciConstraint,
            'installed_ci_version' => $installedCi,
            'dependency_php_risk_count' => count($phpConstraintMismatches),
            'dependency_php_risks' => array_slice($phpConstraintMismatches, 0, 50),
        ];
    }

    private function isLikelyIncompatiblePhpConstraint(string $constraint, string $targetPhp): bool
    {
        $targetMajorMinor = $this->majorMinor($targetPhp);
        if ($targetMajorMinor === '') {
            return false;
        }

        $normalized = strtolower(trim($constraint));

        if ($normalized === '' || $normalized === '*') {
            return false;
        }

        if (preg_match('/<\s*' . preg_quote($targetMajorMinor, '/') . '([\D]|$)/', $normalized)) {
            return true;
        }

        if (preg_match('/\^\s*([0-9]+\.[0-9]+)/', $normalized, $m)) {
            $caret = (string) ($m[1] ?? '');
            if ($caret !== '' && version_compare($targetMajorMinor, $caret, '<')) {
                return true;
            }
        }

        return false;
    }

    private function majorMinor(string $version): string
    {
        if (! preg_match('/^([0-9]+\.[0-9]+)/', $version, $m)) {
            return '';
        }

        return (string) ($m[1] ?? '');
    }

    /**
     * @param array<int, array<string, mixed>> $issues
     * @param array<string, mixed> $frameworkDrift
     * @return array<string, mixed>
     */
    private function buildSummary(array $issues, int $fixedCount, int $filesScanned, array $frameworkDrift): array
    {
        $severityCounts = [
            'Critical' => 0,
            'High' => 0,
            'Medium' => 0,
            'Low' => 0,
        ];

        foreach ($issues as $issue) {
            $severity = (string) ($issue['severity'] ?? 'Low');
            $severityCounts[$severity] = ($severityCounts[$severity] ?? 0) + 1;
        }

        return [
            'generated_at' => date('c'),
            'files_scanned' => $filesScanned,
            'issues_total' => count($issues),
            'severity_counts' => $severityCounts,
            'auto_fixes_applied' => $fixedCount,
            'framework_drift' => $frameworkDrift,
        ];
    }

    /**
     * @param array<string, mixed> $summary
     * @param array<int, array<string, mixed>> $issues
     * @param array<string, mixed> $frameworkDrift
     */
    private function renderConsoleSummary(array $summary, array $issues, array $frameworkDrift): void
    {
        CLI::newLine();
        CLI::write('=== Compatibility Audit Summary ===', 'yellow');
        CLI::write('Files scanned: ' . $summary['files_scanned']);
        CLI::write('Total issues:  ' . $summary['issues_total']);
        CLI::write('Critical:      ' . $summary['severity_counts']['Critical']);
        CLI::write('High:          ' . $summary['severity_counts']['High']);
        CLI::write('Medium:        ' . $summary['severity_counts']['Medium']);
        CLI::write('Low:           ' . $summary['severity_counts']['Low']);
        CLI::write('Auto-fixes:    ' . $summary['auto_fixes_applied']);

        CLI::newLine();
        CLI::write('=== Framework Drift ===', 'yellow');
        CLI::write('Current PHP:   ' . ($frameworkDrift['current_php'] ?? 'n/a'));
        CLI::write('Target PHP:    ' . ($frameworkDrift['target_php'] ?? 'n/a'));
        CLI::write('PHP Require:   ' . ($frameworkDrift['composer_php_requirement'] ?? 'n/a'));
        CLI::write('CI Require:    ' . ($frameworkDrift['composer_ci_requirement'] ?? 'n/a'));
        CLI::write('CI Installed:  ' . ($frameworkDrift['installed_ci_version'] ?? 'n/a'));
        CLI::write('Dep PHP Risks: ' . ($frameworkDrift['dependency_php_risk_count'] ?? 0));

        if ($issues === []) {
            return;
        }

        $rows = [];
        foreach (array_slice($issues, 0, 75) as $issue) {
            $rows[] = [
                $issue['severity'],
                $issue['rule'],
                $issue['file'] . ':' . $issue['line'],
                mb_strimwidth((string) $issue['snippet'], 0, 90, '...'),
            ];
        }

        CLI::newLine();
        CLI::table($rows, ['severity', 'rule', 'location', 'snippet']);

        if (count($issues) > 75) {
            CLI::write('Showing first 75 issues in terminal output. See JSON/CSV report for full details.', 'light_gray');
        }
    }

    /**
     * @param array<string, mixed> $summary
     * @param array<int, array<string, mixed>> $issues
     * @param array<string, mixed> $frameworkDrift
     */
    private function writeJsonReport(string $path, array $summary, array $issues, array $frameworkDrift): void
    {
        $payload = [
            'summary' => $summary,
            'framework_drift' => $frameworkDrift,
            'issues' => $issues,
        ];

        $this->ensureParentDirectory($path);
        file_put_contents($path, (string) json_encode($payload, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES));
    }

    /**
     * @param array<int, array<string, mixed>> $issues
     */
    private function writeCsvReport(string $path, array $issues): void
    {
        $this->ensureParentDirectory($path);

        $fp = fopen($path, 'wb');
        if ($fp === false) {
            CLI::error('Failed to open CSV report path: ' . $path);
            return;
        }

        fputcsv($fp, ['severity', 'rule', 'file', 'line', 'snippet', 'title', 'explanation', 'replacement', 'autofix']);

        foreach ($issues as $issue) {
            fputcsv($fp, [
                $issue['severity'] ?? '',
                $issue['rule'] ?? '',
                $issue['file'] ?? '',
                $issue['line'] ?? '',
                $issue['snippet'] ?? '',
                $issue['title'] ?? '',
                $issue['explanation'] ?? '',
                $issue['replacement'] ?? '',
                $issue['autofix'] ?? '',
            ]);
        }

        fclose($fp);
    }

    private function ensureParentDirectory(string $path): void
    {
        $directory = dirname($path);
        if (! is_dir($directory)) {
            mkdir($directory, 0775, true);
        }
    }
}
