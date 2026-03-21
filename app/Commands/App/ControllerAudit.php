<?php

namespace App\Commands\App;

use App\Commands\SafeBaseCommand;
use CodeIgniter\CLI\CLI;
use RecursiveDirectoryIterator;
use RecursiveIteratorIterator;

class ControllerAudit extends SafeBaseCommand
{
    protected $group       = 'App';
    protected $name        = 'app:controller:audit';
    protected $description = 'Audit controllers for unsafe initController patterns, score severity, suggest patches, optional safe auto-fix, and regression diff.';

    /** @var array<int,array<string,mixed>> */
    protected $findings = [];

    public function run(array $params)
    {
        $opts = $this->parseOptions($params);

        CLI::write('🔍 Controller Audit Starting...', 'yellow');

        $paths = [
            APPPATH . 'Controllers',
            APPPATH . 'Modules',
        ];

        foreach ($paths as $path) {
            $this->scanDirectory($path, $opts);
        }

        $report = $this->buildReport($opts);

        // Always write latest JSON (helps AIOps)
        $this->ensureAuditDir();
        $latestPath   = WRITEPATH . 'audit/controller_audit_latest.json';
        $snapshotPath = WRITEPATH . 'audit/controller_audit_snapshot_' . date('Ymd_His') . '.json';

        $json = json_encode($report, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES);
        file_put_contents($latestPath, $json);
        file_put_contents($snapshotPath, $json);

        // Diff mode: compare against most recent snapshot (excluding "latest")
        if ($opts['diff']) {
            $diff = $this->diffAgainstPreviousSnapshot($snapshotPath);
            $mdPath = WRITEPATH . 'audit/controller_audit_regression_report.md';
            file_put_contents($mdPath, $this->renderRegressionMarkdown($diff, $snapshotPath));
        }

        // Console output
        $this->printConsoleSummary($report, $opts);

        // Optional JSON output to console
        if ($opts['json']) {
            CLI::newLine();
            CLI::write($json, 'white');
        }

        // Fail gate
        if ($opts['failOn'] !== null) {
            $threshold = strtoupper($opts['failOn']);
            $shouldFail = $this->shouldFailOnThreshold($report, $threshold);
            if ($shouldFail) {
                CLI::newLine();
                CLI::write("❌ Audit failed gate (--fail-on={$threshold}).", 'red');
                exit(1);
            }
        }

        CLI::newLine();
        CLI::write('✅ Controller Audit Complete.', 'green');
    }

    /**
     * Parse CLI options.
     */
    protected function parseOptions(array $params): array
    {
        // Spark passes options like ["--fix", "--diff", "--fail-on=HIGH"]
        $opts = [
            'fix'   => false,
            'diff'  => false,
            'json'  => false,
            'failOn'=> null, // LOW|MEDIUM|HIGH
        ];

        foreach ($params as $p) {
            if ($p === '--fix')  $opts['fix']  = true;
            if ($p === '--diff') $opts['diff'] = true;
            if ($p === '--json') $opts['json'] = true;

            if (strpos($p, '--fail-on=') === 0) {
                $opts['failOn'] = substr($p, strlen('--fail-on='));
            }
        }

        return $opts;
    }

    protected function scanDirectory(string $path, array $opts): void
    {
        if (!is_dir($path)) {
            return;
        }

        $iterator = new RecursiveIteratorIterator(
            new RecursiveDirectoryIterator($path)
        );

        foreach ($iterator as $file) {
            if (!$file->isFile()) continue;
            if ($file->getExtension() !== 'php') continue;

            $this->scanFile($file->getPathname(), $opts);
        }
    }

    protected function scanFile(string $filePath, array $opts): void
    {
        $content = @file_get_contents($filePath);
        if (!is_string($content) || $content === '') {
            return;
        }

        // Only interested in controllers-ish files
        $isController = (bool) preg_match('/class\s+\w+\s+extends\s+\w+Controller/i', $content)
            || (stripos($filePath, 'Controllers') !== false);

        if (!$isController) {
            return;
        }

        // Only interested if initController exists
        if (stripos($content, 'initController') === false) {
            return;
        }

        $relative = str_replace(APPPATH, 'app/', $filePath);

        $initBlock = $this->extractInitControllerBlock($content);
        if ($initBlock === null) {
            return;
        }

        // Rule 1: missing parent::initController
        if (stripos($initBlock, 'parent::initController') === false) {
            $this->addFinding($relative, 'MISSING_PARENT_INIT', 'HIGH', [
                'message' => 'initController() override does not call parent::initController()',
                'suggestedPatch' => $this->suggestPatchMissingParentInit($content),
                'autoFixable' => $this->isSafeToAutoFixMissingParentInit($content),
            ]);

            if ($opts['fix'] && $this->isSafeToAutoFixMissingParentInit($content)) {
                $fixed = $this->applyAutoFixMissingParentInit($filePath, $content);
                if ($fixed) {
                    $this->addFinding($relative, 'AUTO_FIX_APPLIED', 'LOW', [
                        'message' => 'Auto-fix applied: inserted parent::initController() call.',
                        'autoFixApplied' => true,
                    ]);
                }
            }
        }

        // Rule 2: direct auth/session probing inside initController
        $authProbes = [
            "service('authentication')",
            'Services::authentication',
        ];
        foreach ($authProbes as $needle) {
            if (stripos($initBlock, $needle) !== false) {
                $this->addFinding($relative, 'DIRECT_AUTH_PROBING', 'MEDIUM', [
                    'message' => "Direct auth probing found in initController(): {$needle}",
                    'suggestedPatch' => 'Prefer $this->resolveCurrentUserId() and/or HasUserContext. If auth gating is required, implement a Filter instead.',
                    'autoFixable' => false,
                ]);
                break;
            }
        }

        $sessionProbes = [
            "service('session')",
            'Services::session',
            'session(',
            'session()',
        ];
        foreach ($sessionProbes as $needle) {
            if (stripos($initBlock, $needle) !== false) {
                $this->addFinding($relative, 'DIRECT_SESSION_PROBING', 'MEDIUM', [
                    'message' => "Direct session probing found in initController(): {$needle}",
                    'suggestedPatch' => 'Prefer $this->resolveCurrentUserId() and/or HasUserContext. Session reads belong in user context resolver or filters.',
                    'autoFixable' => false,
                ]);
                break;
            }
        }

        // Rule 3: heavy DB/model calls inside initController
        if (preg_match('/\bmodel\s*\(\s*\\\\?App\\\\Models\\\\/i', $initBlock) ||
            preg_match('/\bnew\s+\\\\?App\\\\Models\\\\\w+/i', $initBlock)) {
            $this->addFinding($relative, 'MODEL_IN_INIT', 'MEDIUM', [
                'message' => 'Model instantiated inside initController(). This increases boot time and risk.',
                'suggestedPatch' => 'Move model instantiation to lazy init (method-level) or commonData(), not initController().',
                'autoFixable' => false,
            ]);
        }

        // crude DB-call heuristic inside initController
        if (preg_match('/->(insert|update|delete|save|query|getWhere|getRow|getResult|getResultArray|table)\b/i', $initBlock)) {
            $this->addFinding($relative, 'DB_CALL_IN_INIT', 'HIGH', [
                'message' => 'Potential DB call(s) found inside initController(). High risk for boot failures/memory issues.',
                'suggestedPatch' => 'Move DB-dependent logic out of initController() into method handlers or commonData() with caching.',
                'autoFixable' => false,
            ]);
        }

        // Rule 4: heavy app library calls inside initController (MyMI pattern)
        if (preg_match('/->getMyMI[A-Za-z0-9_]+\s*\(/', $initBlock)) {
            $this->addFinding($relative, 'HEAVY_LIBRARY_IN_INIT', 'HIGH', [
                'message' => 'MyMI heavy library getter invoked inside initController(). This can trigger expensive loads on every request.',
                'suggestedPatch' => 'Move heavy loads to commonData() with memoization or to the specific controller method that needs it.',
                'autoFixable' => false,
            ]);
        }

        // Rule 5: null-unsafe method calls heuristic (best-effort)
        // Example patterns: $this->userModel->getUserID() before $this->userModel is set.
        if (preg_match('/\$this->\w+\s*->\s*\w+\s*\(/', $initBlock)) {
            // We can’t prove nullness statically, but we can flag common footguns:
            if (preg_match('/\$this->(userModel|auth|session|request)\s*->/i', $initBlock)) {
                $this->addFinding($relative, 'NULL_UNSAFE_MEMBER_CALL', 'MEDIUM', [
                    'message' => 'Potential null-unsafe member calls in initController() (e.g., $this->userModel/$this->auth/$this->session/$this->request).',
                    'suggestedPatch' => 'Ensure parent::initController() is called and dependencies are created before use; prefer context resolvers.',
                    'autoFixable' => false,
                ]);
            }
        }
    }

    protected function extractInitControllerBlock(string $content): ?string
    {
        // Best-effort extraction: find "function initController(" and capture until matching braces.
        $pos = stripos($content, 'function initController');
        if ($pos === false) {
            return null;
        }

        $slice = substr($content, $pos);

        // Find first "{"
        $bracePos = strpos($slice, '{');
        if ($bracePos === false) {
            return null;
        }

        $block = substr($slice, 0, $bracePos + 1);
        $rest  = substr($slice, $bracePos + 1);

        $depth = 1;
        $i = 0;
        $len = strlen($rest);

        while ($i < $len) {
            $ch = $rest[$i];
            $block .= $ch;

            if ($ch === '{') $depth++;
            if ($ch === '}') $depth--;

            if ($depth === 0) {
                return $block;
            }

            $i++;
        }

        return null;
    }

    protected function addFinding(string $file, string $code, string $severity, array $meta = []): void
    {
        $this->findings[] = array_merge([
            'file'     => $file,
            'code'     => $code,
            'severity' => strtoupper($severity),
        ], $meta);
    }

    protected function buildReport(array $opts): array
    {
        $counts = [
            'HIGH' => 0,
            'MEDIUM' => 0,
            'LOW' => 0,
        ];

        foreach ($this->findings as $f) {
            $sev = $f['severity'] ?? 'LOW';
            if (isset($counts[$sev])) $counts[$sev]++;
        }

        return [
            'generated_at' => date('c'),
            'options' => $opts,
            'summary' => [
                'total_findings' => count($this->findings),
                'by_severity'    => $counts,
            ],
            'findings' => $this->groupFindingsByFile($this->findings),
        ];
    }

    protected function groupFindingsByFile(array $findings): array
    {
        $grouped = [];
        foreach ($findings as $f) {
            $file = $f['file'];
            if (!isset($grouped[$file])) {
                $grouped[$file] = [];
            }
            $grouped[$file][] = $f;
        }

        // stable ordering: HIGH -> MEDIUM -> LOW
        foreach ($grouped as $file => $items) {
            usort($items, function ($a, $b) {
                $rank = ['HIGH' => 0, 'MEDIUM' => 1, 'LOW' => 2];
                return ($rank[$a['severity']] ?? 9) <=> ($rank[$b['severity']] ?? 9);
            });
            $grouped[$file] = $items;
        }

        ksort($grouped);
        return $grouped;
    }

    protected function printConsoleSummary(array $report, array $opts): void
    {
        CLI::newLine();
        CLI::write('📊 Summary', 'yellow');
        CLI::write('Total findings: ' . $report['summary']['total_findings']);
        CLI::write('HIGH: ' . $report['summary']['by_severity']['HIGH'], 'light_red');
        CLI::write('MEDIUM: ' . $report['summary']['by_severity']['MEDIUM'], 'light_yellow');
        CLI::write('LOW: ' . $report['summary']['by_severity']['LOW'], 'light_green');

        if ($report['summary']['total_findings'] === 0) {
            return;
        }

        CLI::newLine();
        CLI::write('🧾 Findings', 'yellow');

        foreach ($report['findings'] as $file => $items) {
            CLI::newLine();
            CLI::write($file, 'white');

            foreach ($items as $f) {
                $sev = $f['severity'];
                $color = $sev === 'HIGH' ? 'light_red' : ($sev === 'MEDIUM' ? 'light_yellow' : 'light_green');
                CLI::write("  - [{$sev}] {$f['code']}: {$f['message']}", $color);

                if (!empty($f['autoFixApplied'])) {
                    CLI::write("    ↳ Auto-fix applied", 'light_green');
                } elseif (!empty($f['autoFixable'])) {
                    CLI::write("    ↳ Auto-fix available: run with --fix", 'light_blue');
                }

                if (!empty($f['suggestedPatch']) && $opts['json'] === false) {
                    // keep console readable; suggestions go to JSON snapshots
                    CLI::write("    ↳ Suggestion captured in JSON snapshot", 'light_blue');
                }
            }
        }
    }

    protected function shouldFailOnThreshold(array $report, string $threshold): bool
    {
        $counts = $report['summary']['by_severity'];
        $threshold = strtoupper($threshold);

        if ($threshold === 'HIGH') {
            return ($counts['HIGH'] ?? 0) > 0;
        }
        if ($threshold === 'MEDIUM') {
            return (($counts['HIGH'] ?? 0) + ($counts['MEDIUM'] ?? 0)) > 0;
        }
        if ($threshold === 'LOW') {
            return ($report['summary']['total_findings'] ?? 0) > 0;
        }

        return false;
    }

    // -------------------------
    // Auto-fix + Suggestions
    // -------------------------

    protected function suggestPatchMissingParentInit(string $content): string
    {
        // Generic patch guidance (not line-perfect, but actionable)
        return implode("\n", [
            "Insert the following as the first executable line inside initController():",
            "",
            "    parent::initController(\$request, \$response, \$logger);",
            "",
            "Do NOT perform heavy loads (DB/library) inside initController(); move them to commonData() or method-level logic."
        ]);
    }

    protected function isSafeToAutoFixMissingParentInit(string $content): bool
    {
        // Only auto-fix if:
        // - function initController exists
        // - NO parent::initController currently
        // - AND initController opens with "{" (standard)
        // - AND file appears to be a controller class (basic heuristic)
        if (stripos($content, 'function initController') === false) return false;
        if (stripos($content, 'parent::initController') !== false) return false;

        // If initController already has complex early returns before any call, avoid touching.
        $block = $this->extractInitControllerBlock($content);
        if (!$block) return false;

        // If block begins with any "return" before parent call, skip (too risky).
        $header = preg_replace('/\s+/', ' ', substr($block, 0, 500));
        if (stripos($header, 'return') !== false) {
            return false;
        }

        return true;
    }

    protected function applyAutoFixMissingParentInit(string $filePath, string $content): bool
    {
        $block = $this->extractInitControllerBlock($content);
        if (!$block) return false;

        // Find the "{" of initController in the source content
        $pos = stripos($content, 'function initController');
        if ($pos === false) return false;

        $bracePos = strpos($content, '{', $pos);
        if ($bracePos === false) return false;

        // Insert parent::initController right after opening brace with indentation
        $insertion = "\n        parent::initController(\$request, \$response, \$logger);\n";

        // Avoid double insert if whitespace variant exists
        if (stripos($content, 'parent::initController($request, $response, $logger)') !== false) {
            return false;
        }

        $new = substr($content, 0, $bracePos + 1) . $insertion . substr($content, $bracePos + 1);

        $ok = file_put_contents($filePath, $new) !== false;
        return $ok;
    }

    // -------------------------
    // Regression Diff Engine
    // -------------------------

    protected function ensureAuditDir(): void
    {
        $dir = WRITEPATH . 'audit';
        if (!is_dir($dir)) {
            @mkdir($dir, 0775, true);
        }
    }

    protected function diffAgainstPreviousSnapshot(string $currentSnapshotPath): array
    {
        $dir = WRITEPATH . 'audit';
        $files = glob($dir . '/controller_audit_snapshot_*.json');
        if (!$files) {
            return [
                'hasBaseline' => false,
                'baseline' => null,
                'current' => basename($currentSnapshotPath),
                'newHigh' => [],
                'newMedium' => [],
                'newLow' => [],
            ];
        }

        // Sort oldest -> newest
        sort($files);

        // Current snapshot is the newest we just wrote; baseline is the previous one.
        $currentBase = basename($currentSnapshotPath);
        $baselinePath = null;

        for ($i = count($files) - 1; $i >= 0; $i--) {
            if (basename($files[$i]) !== $currentBase) {
                $baselinePath = $files[$i];
                break;
            }
        }

        if (!$baselinePath) {
            return [
                'hasBaseline' => false,
                'baseline' => null,
                'current' => basename($currentSnapshotPath),
                'newHigh' => [],
                'newMedium' => [],
                'newLow' => [],
            ];
        }

        $baseline = json_decode(file_get_contents($baselinePath), true) ?: [];
        $current  = json_decode(file_get_contents($currentSnapshotPath), true) ?: [];

        $baselineSet = $this->fingerprintFindings($baseline['findings'] ?? []);
        $currentSet  = $this->fingerprintFindings($current['findings'] ?? []);

        $new = array_diff_key($currentSet, $baselineSet);

        $bucket = ['HIGH' => [], 'MEDIUM' => [], 'LOW' => []];
        foreach ($new as $fp => $meta) {
            $sev = $meta['severity'] ?? 'LOW';
            if (!isset($bucket[$sev])) $sev = 'LOW';
            $bucket[$sev][] = $meta;
        }

        return [
            'hasBaseline' => true,
            'baseline' => basename($baselinePath),
            'current' => basename($currentSnapshotPath),
            'newHigh' => $bucket['HIGH'],
            'newMedium' => $bucket['MEDIUM'],
            'newLow' => $bucket['LOW'],
        ];
    }

    protected function fingerprintFindings(array $groupedFindings): array
    {
        // groupedFindings: [file => [finding, finding...]]
        $set = [];

        foreach ($groupedFindings as $file => $items) {
            foreach ($items as $f) {
                $fp = sha1($file . '|' . ($f['code'] ?? '') . '|' . ($f['message'] ?? '') . '|' . ($f['severity'] ?? ''));
                $set[$fp] = [
                    'file' => $file,
                    'code' => $f['code'] ?? '',
                    'severity' => $f['severity'] ?? 'LOW',
                    'message' => $f['message'] ?? '',
                ];
            }
        }

        return $set;
    }

    protected function renderRegressionMarkdown(array $diff, string $currentSnapshotPath): string
    {
        $lines = [];
        $lines[] = '# Controller Audit Regression Report';
        $lines[] = '';
        $lines[] = 'Baseline: ' . ($diff['baseline'] ?? '(none)');
        $lines[] = 'Current: ' . basename($currentSnapshotPath);
        $lines[] = '';

        if (!$diff['hasBaseline']) {
            $lines[] = 'No baseline snapshot found yet. Run the command twice to enable regression diffs.';
            $lines[] = '';
            return implode("\n", $lines);
        }

        $lines[] = '## New HIGH findings';
        $lines[] = $this->renderRegressionList($diff['newHigh']);

        $lines[] = '';
        $lines[] = '## New MEDIUM findings';
        $lines[] = $this->renderRegressionList($diff['newMedium']);

        $lines[] = '';
        $lines[] = '## New LOW findings';
        $lines[] = $this->renderRegressionList($diff['newLow']);

        $lines[] = '';
        return implode("\n", $lines);
    }

    protected function renderRegressionList(array $items): string
    {
        if (empty($items)) {
            return "✅ None";
        }

        $out = [];
        foreach ($items as $it) {
            $out[] = "- {$it['file']} — {$it['code']} — {$it['message']}";
        }
        return implode("\n", $out);
    }
}
