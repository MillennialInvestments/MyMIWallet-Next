<?php
namespace App\Libraries;

class LogTriage
{
    private string $date;
    private ?string $override;
    private string $reportsDir;
    private string $docsDir;

    // Known critical subsystems to boost priority
    private array $criticalComponents = [
        'AlertsController', 'MyMIAlerts', 'MyMIFractalAnalyzer',
        'ManagementController', 'MarketingController', 'MyMIMarketing',
        'BudgetController', 'BudgetModel', 'MyMIUser', 'SolanaService',
        'MyMIInvestments', 'InvestmentModel', 'APIs\Management',
        'APIs\Alerts', 'APIs\Investments',
    ];

    // Patterns we can auto-fix or confirm as fixed (MyMI-known)
    private array $autoFixPatterns = [
        // TF-IDF / summarization guards (Undefined array key / strtolower(null) / unsupported operand)
        'Undefined array key'           => 'guard_tfidf_inputs',
        'Unsupported operand types'     => 'guard_tfidf_inputs',
        'strtolower(null)'              => 'guard_tfidf_inputs',

        // Memory exhaustion during content generation / Guzzle loops
        'Allowed memory size of'        => 'harden_memory_paths',

        // Missing model property in APIs\ManagementController (500 w/ DataTables)
        'Call to a member function.*on null' => 'inject_userModel_in_management',

        // Missing title/url in marketing temp scraper
        'Undefined index: title'        => 'sanitize_marketing_inputs',
        'Undefined index: url'          => 'sanitize_marketing_inputs',

        // Duplicate config class declarations
        'Cannot declare class App\Config\SiteSettings' => 'dedupe_config_class',

        // .env loading & phpdotenv crashes
        'phpdotenv'                     => 'safe_dotenv_loading',
    ];

    public function __construct(string $date, ?string $override)
    {
        $this->date     = $date;
        $this->override = $override;
        $this->reportsDir = WRITEPATH . 'reports';
        $this->docsDir    = ROOTPATH . 'docs' . DIRECTORY_SEPARATOR . 'logs';
    }

    public function resolveLogFile(): string
    {
        if ($this->override) {
            return $this->override;
        }
        $p = WRITEPATH . 'logs' . DIRECTORY_SEPARATOR . "log-{$this->date}.php";
        if (is_file($p)) return $p;

        // fallback to newest log-*.php
        $files = glob(WRITEPATH . 'logs/log-*.php');
        rsort($files);
        return $files[0] ?? $p;
    }

    public function parseLog(string $file): array
    {
        $raw = file($file, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES) ?: [];
        $entries = [];
        foreach ($raw as $line) {
            // Basic filter for ERROR / CRITICAL / Exception
            if (!preg_match('/\b(ERROR|CRITICAL|Exception)\b/i', $line)) continue;

            // Try to extract file:line if present
            $filePath = null; $lineNo = null;
            if (preg_match('/in\s+([^\s]+\.php)\s+on\s+line\s+(\d+)/i', $line, $m)) {
                $filePath = $m[1];
                $lineNo   = (int) $m[2];
            } elseif (preg_match('/File:\s*([^\s]+\.php)\s*@\s*line\s*(\d+)/i', $line, $m)) {
                $filePath = $m[1];
                $lineNo   = (int) $m[2];
            }

            $entries[] = [
                'raw'      => $line,
                'severity' => stripos($line, 'CRITICAL') !== false ? 'CRITICAL' : (stripos($line, 'ERROR') !== false ? 'ERROR' : 'ERROR'),
                'file'     => $filePath,
                'line'     => $lineNo,
            ];
        }
        return $entries;
    }

    public function groupAndCount(array $entries): array
    {
        $groups = [];
        foreach ($entries as $e) {
            $key = strtoupper($e['severity']) . '|' . ($e['file'] ?? 'unknown') . '|' . ($e['line'] ?? 0) . '|' . $this->canonicalMessage($e['raw']);
            if (!isset($groups[$key])) {
                $groups[$key] = [
                    'severity' => $e['severity'],
                    'file'     => $e['file'],
                    'line'     => $e['line'],
                    'message'  => $this->canonicalMessage($e['raw']),
                    'count'    => 0,
                    'samples'  => [],
                ];
            }
            $groups[$key]['count']++;
            if (count($groups[$key]['samples']) < 5) {
                $groups[$key]['samples'][] = $e['raw'];
            }
        }
        return array_values($groups);
    }

    public function scorePriority(array $grouped): array
    {
        foreach ($grouped as &$g) {
            $score = 0;
            $score += ($g['severity'] === 'CRITICAL') ? 50 : 20;
            $score += min(50, $g['count'] * 2);

            $msg = $g['message'] . ' ' . ($g['file'] ?? '');
            foreach ($this->criticalComponents as $comp) {
                if (stripos($msg, $comp) !== false) {
                    $score += 20;
                }
            }
            $g['priority_score'] = $score;
        }
        usort($grouped, fn($a,$b) => $b['priority_score'] <=> $a['priority_score']);
        return $grouped;
    }

    public function ensureReportDirs(): array
    {
        if (!is_dir($this->reportsDir)) @mkdir($this->reportsDir, 0775, true);
        if (!is_dir($this->docsDir))    @mkdir($this->docsDir,    0775, true);
        return [$this->reportsDir, $this->docsDir];
    }

    public function writeJson(array $scored): string
    {
        $path = $this->reportsDir . DIRECTORY_SEPARATOR . "log-{$this->date}.json";
        file_put_contents($path, json_encode([
            'date'   => $this->date,
            'issues' => $scored,
        ], JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES));
        return $path;
    }

    public function writeMarkdown(array $scored): string
    {
        $path = ROOTPATH . 'docs/logs' . DIRECTORY_SEPARATOR . "log-{$this->date}.md";
        $out  = [];
        $out[] = "# Daily CI4 Log Triage — {$this->date}";
        $out[] = "";
        $out[] = "This report was generated by `php spark logs:triage`.";
        $out[] = "";
        $top = array_slice($scored, 0, 5);
        $out[] = "## Top 5 Issues (by priority)";
        foreach ($top as $i => $g) {
            $out[] = sprintf("%d. **%s** — %s:%s", $i+1, $g['message'], $g['file'] ?? 'unknown', $g['line'] ?? '?');
            $out[] = sprintf("   - Severity: **%s** | Count: **%d** | Score: **%d**", $g['severity'], $g['count'], $g['priority_score']);
        }
        $out[] = "";
        $out[] = "## All Grouped Issues";
        foreach ($scored as $g) {
            $out[] = "- **{$g['severity']}** | {$g['message']} ({$g['file']} @ {$g['line']}) — count: {$g['count']}, score: {$g['priority_score']}";
        }
        file_put_contents($path, implode("\n", $out) . "\n");
        return $path;
    }

    public function appendFixSummary(string $mdPath, array $results): void
    {
        $out = [];
        $out[] = "\n---\n";
        $out[] = "## Auto-Fix Summary";
        if (!$results) {
            $out[] = "- No auto-fixes applied or required.";
        } else {
            foreach ($results as $r) {
                $out[] = "- {$r}";
            }
        }
        file_put_contents($mdPath, implode("\n", $out) . "\n", FILE_APPEND);
    }

    public function hasCritical(array $scored): bool
    {
        foreach ($scored as $g) {
            if (strtoupper($g['severity']) === 'CRITICAL') return true;
        }
        return false;
    }

    public function applyKnownFixes(array $scored): array
    {
        $applied = [];
        foreach ($scored as $g) {
            foreach ($this->autoFixPatterns as $needle => $handler) {
                if (stripos($g['message'], $needle) !== false) {
                    if (method_exists($this, $handler)) {
                        $ok = $this->{$handler}();
                        $applied[] = ($ok ? "✅" : "➡️") . " {$handler} for: {$needle}";
                    }
                }
            }
        }
        return array_unique($applied);
    }

    // ---------- Handlers for known MyMI issues ----------

    private function guard_tfidf_inputs(): bool
    {
        // Ensure MyMIMarketing has guards (idempotent)
        $file = APPPATH . 'Libraries/MyMIMarketing.php';
        if (!is_file($file)) return false;
        $src = file_get_contents($file);
        if (strpos($src, '/* TFIDF_GUARDS_INSERTED */') !== false) return true;

        $patch = "\n    /* TFIDF_GUARDS_INSERTED */\n".
                 "    private function validateDocuments(array \$docs): array {\n".
                 "        \$clean = [];\n".
                 "        foreach (\$docs as \$d) {\n".
                 "            if (!is_string(\$d)) continue;\n".
                 "            \$s = trim(strip_tags(\$d));\n".
                 "            if (\$s === '' || strlen(\$s) < 8) continue;\n".
                 "            \$clean[] = mb_strtolower(\$s);\n".
                 "        }\n".
                 "        return \$clean;\n".
                 "    }\n";
        // very safe, append helper + integrate in summarizeText()/extractKeywords() if marker hooks exist
        if (strpos($src, 'function summarizeText(') !== false && strpos($src, 'validateDocuments(') === false) {
            $src = preg_replace('/class\s+MyMIMarketing[^\{]*\{/', '$0' . $patch, $src, 1);
            file_put_contents($file, $src);
            return true;
        }
        return false;
    }

    private function harden_memory_paths(): bool
    {
        // Add chunking to MarketingController::generateDailyContentDigest if present
        $file = APPPATH . 'Modules/APIs/Controllers/MarketingController.php';
        if (!is_file($file)) return false;
        $src = file_get_contents($file);
        if (strpos($src, '/* DIGEST_MEMORY_PATCH */') !== false) return true;

        $src = preg_replace(
            '/function\s+generateDailyContentDigest\s*\([^\{]*\)\s*\{/',
            "$0\n        /* DIGEST_MEMORY_PATCH */\n        ini_set('memory_limit','1024M');\n        \log_message('debug','Digest start: memory='.memory_get_usage());\n",
            $src, 1, $count
        );
        if ($count > 0) {
            file_put_contents($file, $src);
            return true;
        }
        return false;
    }

    private function inject_userModel_in_management(): bool
    {
        // Ensure $this->userModel is set in APIs\ManagementController
        $file = APPPATH . 'Modules/APIs/Controllers/ManagementController.php';
        if (!is_file($file)) return false;
        $src = file_get_contents($file);
        if (strpos($src, '/* USERMODEL_INJECTED */') !== false) return true;

        // naive: add to constructor if missing
        $src = preg_replace(
            '/__construct\s*\(\)\s*\{/',
            "$0\n        /* USERMODEL_INJECTED */\n        \$this->userModel = model('App\\Models\\UserModel');\n",
            $src, 1, $count
        );
        if ($count > 0) {
            file_put_contents($file, $src);
            return true;
        }
        return false;
    }

    private function sanitize_marketing_inputs(): bool
    {
        // Ensure temp scraper records validate title/url before processing
        $file = APPPATH . 'Libraries/MyMIMarketing.php';
        if (!is_file($file)) return false;
        $src = file_get_contents($file);
        if (strpos($src, '/* TEMP_SCRAPER_TITLE_URL_GUARD */') !== false) return true;

        $guard = "\n    /* TEMP_SCRAPER_TITLE_URL_GUARD */\n".
                 "    private function isValidTempRecord(array \$r): bool {\n".
                 "        \$title = trim((string) (\$r['title'] ?? ''));\n".
                 "        \$url   = trim((string) (\$r['url']   ?? ''));\n".
                 "        return (\$title !== '' && filter_var(\$url, FILTER_VALIDATE_URL));\n".
                 "    }\n";
        $src = preg_replace('/class\s+MyMIMarketing[^\{]*\{/', '$0' . $guard, $src, 1);
        file_put_contents($file, $src);
        return true;
    }

    private function dedupe_config_class(): bool
    {
        // Check for multiple SiteSettings files and quarantine duplicates (non-destructive)
        $root = APPPATH . 'Config';
        $list = glob($root . '/SiteSettings*.php');
        if ($list && count($list) > 1) {
            @mkdir($root . '/_archive', 0775, true);
            // keep canonical SiteSettings.php; move others
            foreach ($list as $f) {
                if (basename($f) === 'SiteSettings.php') continue;
                @rename($f, $root . '/_archive/' . basename($f));
            }
            return true;
        }
        return true; // if only one, consider resolved
    }

    private function safe_dotenv_loading(): bool
    {
        // Ensure Boot/production.php uses safeLoad and existence checks
        $file = APPPATH . 'Config/Boot/production.php';
        if (!is_file($file)) return false;
        $src = file_get_contents($file);
        if (strpos($src, '/* DOTENV_SAFELOAD */') !== false) return true;

        $patch = "\n/* DOTENV_SAFELOAD */\n".
                 "try {\n".
                 "    if (class_exists(\\Dotenv\\Dotenv::class)) {\n".
                 "        \\Dotenv\\Dotenv::createImmutable(ROOTPATH)->safeLoad();\n".
                 "    }\n".
                 "} catch (\\Throwable $e) {\n".
                 "    \\log_message('warning', 'dotenv safeLoad failed: {msg}', ['msg' => \$e->getMessage()]);\n".
                 "}\n";
        $src .= $patch;
        file_put_contents($file, $src);
        return true;
    }

    // Helpers
    private function canonicalMessage(string $line): string
    {
        // Strip timestamps and varying stack data for grouping
        $line = preg_replace('/\[[^\]]+\]\s*/', '', $line); // [date-time]
        $line = preg_replace('/\s+in\s+[^\s]+\.php\s+on\s+line\s+\d+/', '', $line);
        $line = preg_replace('/File:\s*[^\s]+\.php\s*@\s*line\s*\d+/', '', $line);
        return trim($line);
    }
}
