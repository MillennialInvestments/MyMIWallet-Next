<?php

namespace App\Services\Env;

use Config\Ops;

class EnvInspector
{
    private Ops $ops;

    public function __construct()
    {
        $this->ops = config(Ops::class);
    }

    public function inspect(): array
    {
        $checks = [];
        $findings = [];
        $recommendations = [];

        $addCheck = function (string $key, string $status, string $message, array $data = []) use (&$checks, &$findings, &$recommendations): void {
            $checks[] = [
                'key' => $key,
                'status' => $status,
                'message' => $message,
                'data' => $data,
            ];

            if ($status !== 'ok') {
                $findings[] = [
                    'key' => $key,
                    'status' => $status,
                    'message' => $message,
                    'data' => $data,
                ];
            }

            $recommendation = $this->recommendationFor($key, $status, $data);
            if ($recommendation !== null) {
                $recommendations[] = $recommendation;
            }
        };

        $home = rtrim(env('HOME') ?: WRITEPATH, '/');
        $bashrcPath = $home . '/.bashrc';
        $bashrcExists = is_file($bashrcPath);
        $bashrcContent = $bashrcExists ? file_get_contents($bashrcPath) : '';

        $addCheck(
            'shell.bashrc_exists',
            $bashrcExists ? 'ok' : 'warning',
            $bashrcExists ? '.bashrc found.' : '.bashrc missing.',
            ['path' => $bashrcPath]
        );

        $daemonLines = $this->detectDaemonLines($bashrcContent);
        $addCheck(
            'shell.bashrc_daemons',
            empty($daemonLines) ? 'ok' : 'warning',
            empty($daemonLines) ? 'No daemon launches detected in .bashrc.' : 'Daemon launch commands found in .bashrc.',
            ['lines' => $daemonLines]
        );

        $mymiToolsPath = $home . '/.mymi-tools.sh';
        $mymiToolsSourced = $bashrcExists && $this->isFileSourced($bashrcContent, $mymiToolsPath);
        $addCheck(
            'shell.mymi_tools_sourced',
            $mymiToolsSourced ? 'ok' : 'warning',
            $mymiToolsSourced ? '.mymi-tools.sh sourced.' : '.mymi-tools.sh not sourced in .bashrc.',
            ['path' => $mymiToolsPath]
        );

        $cron = $this->runCommand('crontab -l');
        $cronOutput = $cron['output'];
        $cronOk = $cron['exit_code'] === 0;
        $addCheck(
            'cron.crontab_listed',
            $cronOk ? 'ok' : 'warning',
            $cronOk ? 'crontab -l captured.' : 'Unable to read crontab.',
            ['output' => $cronOutput]
        );

        $cronHasSupervisor = $this->containsPattern($cronOutput, '/@reboot\s+.*supervis/i');
        $addCheck(
            'cron.supervisor_reboot',
            $cronHasSupervisor ? 'ok' : 'warning',
            $cronHasSupervisor ? '@reboot supervisor job detected.' : 'No @reboot supervisor job detected (DreamHost panel can also manage this).',
            ['matched' => $cronHasSupervisor, 'panel_note' => 'DreamHost panel cron or web restart can substitute if @reboot is unavailable.']
        );

        $supervisorConfig = $this->discoverSupervisorConfig($home);
        $supervisorConfigPath = $supervisorConfig['path'] ?? null;
        $addCheck(
            'supervisor.config_exists',
            $supervisorConfigPath !== null ? 'ok' : 'warning',
            $supervisorConfigPath !== null ? 'Supervisor config found.' : 'Supervisor config not found under ~/supervisor.',
            $supervisorConfig
        );

        $supervisorRunning = $this->commandHasProcess('supervisord');
        $supervisorCleanStop = $supervisorConfigPath !== null && $this->configHasAutostartDisabled($supervisorConfigPath);
        $supervisorStatus = ($supervisorRunning || $supervisorCleanStop) ? 'ok' : 'warning';
        $supervisorMessage = $supervisorRunning
            ? 'Supervisor process running.'
            : ($supervisorCleanStop ? 'Supervisor cleanly stopped (autostart disabled).' : 'Supervisor not running.');
        $addCheck(
            'supervisor.process',
            $supervisorStatus,
            $supervisorMessage,
            ['running' => $supervisorRunning, 'clean_stop' => $supervisorCleanStop]
        );

        $addCheck(
            'php.cli_version',
            'ok',
            'CLI PHP version detected.',
            ['version' => PHP_VERSION]
        );

        $phpSockets = $this->discoverPhpSockets($home);
        $phpSocketStatus = empty($phpSockets) ? 'warning' : 'ok';
        $addCheck(
            'php.socket_presence',
            $phpSocketStatus,
            empty($phpSockets) ? 'No PHP socket files detected.' : 'PHP socket files detected.',
            ['sockets' => $phpSockets]
        );

        $socketConflict = count($phpSockets) > 1;
        $addCheck(
            'php.socket_conflicts',
            $socketConflict ? 'warning' : 'ok',
            $socketConflict ? 'Multiple PHP sockets detected; verify active handler.' : 'No PHP socket conflicts detected.',
            ['count' => count($phpSockets)]
        );

        $phpBackend = $this->detectPhpBackend($phpSockets);
        $backendStatus = $phpBackend['healthy'] ? 'ok' : 'warning';
        $addCheck(
            'php.backend_detected',
            $backendStatus,
            $phpBackend['healthy'] ? 'PHP backend detected via process or socket.' : 'PHP backend not detected (no php-cgi/php82.cgi process or socket).',
            $phpBackend
        );

        [$activeServer, $serverData] = $this->detectWebServer();
        $serverStatus = $activeServer !== 'none' ? 'ok' : 'warning';
        $addCheck(
            'web.active_server',
            $serverStatus,
            $activeServer !== 'none' ? "Active server detected: {$activeServer}." : 'No active web server process detected.',
            $serverData
        );

        $nginxConfig = $this->discoverNginxConfig($home);
        $nginxConfigStatus = $nginxConfig !== null ? 'ok' : ($activeServer === 'nginx' ? 'warning' : 'ok');
        $addCheck(
            'web.nginx_config',
            $nginxConfigStatus,
            $nginxConfig !== null ? 'Nginx config discovered.' : 'Nginx config not found in user-space paths.',
            ['path' => $nginxConfig]
        );

        $nginxTest = $this->runNginxConfigTest($home);
        $nginxTestStatus = $nginxTest['status'] ?? 'warning';
        $addCheck(
            'web.nginx_config_test',
            $nginxTestStatus,
            $nginxTest['message'] ?? 'Nginx config test not run.',
            $nginxTest
        );

        $fastcgiValid = $nginxConfig !== null ? $this->configHasFastcgi($nginxConfig) : null;
        $fastcgiStatus = $fastcgiValid === false && $activeServer === 'nginx' ? 'warning' : 'ok';
        $addCheck(
            'web.fastcgi_validation',
            $fastcgiStatus,
            $fastcgiValid === false ? 'fastcgi_pass/proxy_pass missing from nginx config.' : 'fastcgi handler configuration looks present.',
            ['valid' => $fastcgiValid]
        );

        $apacheHandlerValid = $this->apacheHandlerValidation();
        $apacheStatus = $apacheHandlerValid === false && $activeServer === 'apache' ? 'warning' : 'ok';
        $addCheck(
            'web.apache_handler',
            $apacheStatus,
            $apacheHandlerValid === false ? 'Apache PHP handler not detected.' : 'Apache handler configuration looks present.',
            ['valid' => $apacheHandlerValid]
        );

        $publicIndex = ROOTPATH . 'public/index.php';
        $publicIndexExists = is_file($publicIndex);
        $addCheck(
            'ci4.public_index',
            $publicIndexExists ? 'ok' : 'critical',
            $publicIndexExists ? 'public/index.php present.' : 'public/index.php missing.',
            ['path' => $publicIndex]
        );

        $writableOk = is_dir(WRITEPATH) && is_writable(WRITEPATH);
        $addCheck(
            'ci4.writable_permissions',
            $writableOk ? 'ok' : 'critical',
            $writableOk ? 'writable/ permissions OK.' : 'writable/ is not writable.',
            ['path' => WRITEPATH]
        );

        $cacheDirs = $this->validateCacheDirs();
        $cacheStatus = $cacheDirs['ok'] ? 'ok' : 'critical';
        $addCheck(
            'ci4.cache_dirs',
            $cacheStatus,
            $cacheDirs['ok'] ? 'Writable cache/session/debugbar dirs OK.' : 'One or more cache/session/debugbar dirs are missing or not writable.',
            $cacheDirs
        );

        $maintenanceActive = $this->maintenanceModeDetected();
        $addCheck(
            'ci4.maintenance_mode',
            $maintenanceActive ? 'warning' : 'ok',
            $maintenanceActive ? 'Maintenance mode appears active.' : 'Maintenance mode not detected.',
            ['active' => $maintenanceActive]
        );

        $logSummary = $this->latestLogSummary();
        $logStatus = $logSummary['error_count'] > 0 ? 'warning' : 'ok';
        $addCheck(
            'ci4.latest_log_errors',
            $logStatus,
            $logSummary['error_count'] > 0 ? 'Recent log errors detected.' : 'No recent log errors detected.',
            $logSummary
        );

        $disk = $this->diskUsage(ROOTPATH);
        $diskStatus = $disk['free_percent'] <= 5 ? 'critical' : ($disk['free_percent'] <= 10 ? 'warning' : 'ok');
        $addCheck(
            'system.disk_usage',
            $diskStatus,
            'Disk usage captured.',
            $disk
        );

        $memory = $this->memoryUsage();
        $memoryStatus = $memory['available_percent'] <= 10 ? 'critical' : ($memory['available_percent'] <= 20 ? 'warning' : 'ok');
        $addCheck(
            'system.memory',
            $memoryStatus,
            'Memory usage captured.',
            $memory
        );

        $listening = $this->listeningPorts();
        $addCheck(
            'system.listening_ports',
            'ok',
            'Listening ports captured.',
            $listening
        );

        $processes = $this->processSummary();
        $procStatus = ($processes['php'] === 0 && $processes['nginx'] === 0 && $processes['apache'] === 0) ? 'warning' : 'ok';
        $addCheck(
            'system.processes',
            $procStatus,
            'Process summary captured.',
            $processes
        );

        $summary = $this->summarizeChecks($checks);
        $summary['score'] = $this->calculateScoreFromSummary($summary);

        return [
            'status' => $summary['status'],
            'generated_at' => date('c'),
            'summary' => $summary,
            'checks' => $checks,
            'findings' => $findings,
            'recommendations' => $this->uniqueList($recommendations),
            'meta' => [
                'hostname' => gethostname() ?: 'unknown',
                'user' => get_current_user() ?: 'unknown',
                'app_path' => ROOTPATH,
                'php_version' => PHP_VERSION,
                'ci_version' => class_exists(\CodeIgniter\CodeIgniter::class) ? \CodeIgniter\CodeIgniter::CI_VERSION : null,
            ],
        ];
    }

    public function formatMarkdown(array $report): string
    {
        $summary = $report['summary'] ?? [];
        $counts = $summary['counts'] ?? ['ok' => 0, 'warning' => 0, 'critical' => 0];
        $score = $summary['score'] ?? 0;
        $lines = [];

        $lines[] = '# Env Doctor Report';
        $lines[] = '';
        $lines[] = '## Summary';
        $lines[] = '- Status: **' . strtoupper($report['status'] ?? 'unknown') . '**';
        $lines[] = '- Health score: **' . $score . '/100**';
        $lines[] = '- Checks: ' . $counts['ok'] . ' ok / ' . $counts['warning'] . ' warning / ' . $counts['critical'] . ' critical';
        $lines[] = '- Generated at: ' . ($report['generated_at'] ?? 'n/a');

        $lines[] = '';
        $lines[] = '## Findings';
        if (!empty($report['findings'])) {
            foreach ($report['findings'] as $finding) {
                $lines[] = '- [' . strtoupper($finding['status']) . '] ' . $finding['message'] . ' (' . $finding['key'] . ')';
            }
        } else {
            $lines[] = '- None.';
        }

        $lines[] = '';
        $lines[] = '## Recommendations';
        if (!empty($report['recommendations'])) {
            foreach ($report['recommendations'] as $recommendation) {
                $lines[] = '- ' . $recommendation;
            }
        } else {
            $lines[] = '- None.';
        }

        $lines[] = '';
        $lines[] = '## Snapshot metadata';
        $meta = $report['meta'] ?? [];
        $lines[] = '- Hostname: ' . ($meta['hostname'] ?? 'unknown');
        $lines[] = '- User: ' . ($meta['user'] ?? 'unknown');
        $lines[] = '- App path: ' . ($meta['app_path'] ?? 'unknown');
        $lines[] = '- PHP version: ' . ($meta['php_version'] ?? 'unknown');
        $lines[] = '- CI4 version: ' . ($meta['ci_version'] ?? 'unknown');

        return implode("\n", $lines) . "\n";
    }

    public function persistReport(array $report, string $markdown, bool $pack = false): array
    {
        $directory = rtrim(WRITEPATH, '/') . '/triage/envdoctor';
        if (!is_dir($directory)) {
            mkdir($directory, 0775, true);
        }

        $stamp = date('Y-m-d-His');
        $jsonPath = $directory . "/envdoctor-{$stamp}.json";
        $mdPath = $directory . "/envdoctor-{$stamp}.md";

        file_put_contents($jsonPath, json_encode($report, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES));
        file_put_contents($mdPath, $markdown);

        $packPath = null;
        if ($pack) {
            $packPath = $this->createPack($directory, $jsonPath, $mdPath, $stamp);
        }

        return [
            'json' => $jsonPath,
            'markdown' => $mdPath,
            'pack' => $packPath,
        ];
    }

    public function loadLatestReport(): ?array
    {
        $directory = rtrim(WRITEPATH, '/') . '/triage/envdoctor';
        if (!is_dir($directory)) {
            return null;
        }

        $files = glob($directory . '/envdoctor-*.json') ?: [];
        if ($files === []) {
            return null;
        }

        usort($files, static fn($a, $b) => filemtime($b) <=> filemtime($a));
        $latest = $files[0];
        $payload = file_get_contents($latest);
        if ($payload === false) {
            return null;
        }

        $decoded = json_decode($payload, true);
        if (! is_array($decoded)) {
            return null;
        }

        return [
            'report' => $decoded,
            'path' => $latest,
            'modified_at' => date('c', (int) (filemtime($latest) ?: time())),
        ];
    }

    public function topFindings(array $report, int $limit = 5): array
    {
        $findings = $report['findings'] ?? [];
        if ($findings === []) {
            return [];
        }

        usort($findings, static function (array $a, array $b): int {
            $rank = ['critical' => 0, 'warning' => 1, 'ok' => 2];
            return ($rank[$a['status']] ?? 3) <=> ($rank[$b['status']] ?? 3);
        });

        return array_slice($findings, 0, $limit);
    }

    private function recommendationFor(string $key, string $status, array $data): ?string
    {
        if ($status === 'ok') {
            return null;
        }

        $recommendations = [
            'shell.bashrc_exists' => 'Create a ~/.bashrc with safe shell initialization (no daemons).',
            'shell.bashrc_daemons' => 'Remove daemon/service launches from ~/.bashrc; move them to a supervisor/cron.',
            'shell.mymi_tools_sourced' => 'Ensure ~/.mymi-tools.sh exists and is sourced in ~/.bashrc.',
            'cron.crontab_listed' => 'Verify crontab exists and is readable under the app user.',
            'cron.supervisor_reboot' => 'Add an @reboot supervisor start entry to crontab for resiliency.',
            'supervisor.config_exists' => 'Add a user-space supervisor config (e.g., ~/.config/supervisor/supervisord.conf).',
            'supervisor.process' => 'Start supervisord if it should be running, or set autostart=false if intentionally stopped.',
            'php.socket_presence' => 'Confirm PHP-FPM or php-cgi is running and sockets are created.',
            'php.socket_conflicts' => 'Disable extra PHP sockets and ensure nginx/apache points to the correct one.',
            'php.backend_detected' => 'Ensure php-cgi/php82.cgi or supervisord processes are running and sockets exist.',
            'web.active_server' => 'Start nginx/apache user-space process or verify hosting service status.',
            'web.nginx_config' => 'Ensure nginx.conf exists in user-space path and is loaded.',
            'web.nginx_config_test' => 'Run nginx -t in your user-space nginx home and fix config errors.',
            'web.fastcgi_validation' => 'Add fastcgi_pass (or proxy_pass) for PHP handling in nginx config.',
            'web.apache_handler' => 'Configure Apache PHP handler (SetHandler/ProxyPassMatch) if using Apache.',
            'ci4.public_index' => 'Restore public/index.php from the CI4 deployment bundle.',
            'ci4.writable_permissions' => 'Fix writable/ permissions for the web user.',
            'ci4.cache_dirs' => 'Ensure writable/cache, writable/session, and writable/debugbar are writable by the web user.',
            'ci4.maintenance_mode' => 'Disable maintenance mode when deployments complete.',
            'ci4.latest_log_errors' => 'Review recent log errors and resolve recurring issues.',
            'system.disk_usage' => 'Free disk space or expand storage when below 10% free.',
            'system.memory' => 'Reduce memory usage or increase limits when available memory is low.',
            'system.processes' => 'Ensure php/nginx/apache processes are running as expected.',
        ];

        return $recommendations[$key] ?? null;
    }

    private function detectDaemonLines(string $content): array
    {
        if ($content === '') {
            return [];
        }

        $lines = preg_split('/\r\n|\r|\n/', $content) ?: [];
        $patterns = '/(nohup|systemctl|service|supervisord|daemon|php-fpm|nginx|apache|httpd|pm2|redis|memcached|node|forever|screen|tmux)/i';
        $matches = [];

        foreach ($lines as $line) {
            $trimmed = trim($line);
            if ($trimmed === '' || str_starts_with($trimmed, '#')) {
                continue;
            }
            if (preg_match($patterns, $trimmed)) {
                $matches[] = $trimmed;
            }
        }

        return $matches;
    }

    private function isFileSourced(string $content, string $filePath): bool
    {
        $short = basename($filePath);
        $patterns = [
            '/\bsource\s+' . preg_quote($filePath, '/') . '\b/',
            '/\b\.\s+' . preg_quote($filePath, '/') . '\b/',
            '/\bsource\s+~\/' . preg_quote($short, '/') . '\b/',
            '/\b\.\s+~\/' . preg_quote($short, '/') . '\b/',
        ];

        foreach ($patterns as $pattern) {
            if (preg_match($pattern, $content)) {
                return true;
            }
        }

        return false;
    }

    private function runCommand(string $command): array
    {
        $output = [];
        $exitCode = 0;
        exec($command . ' 2>&1', $output, $exitCode);

        return [
            'output' => $output,
            'exit_code' => $exitCode,
        ];
    }

    private function containsPattern(array $lines, string $pattern): bool
    {
        foreach ($lines as $line) {
            if (preg_match($pattern, $line)) {
                return true;
            }
        }

        return false;
    }

    private function isSocket(string $path): bool
    {
        if (! file_exists($path)) {
            return false;
        }

        return filetype($path) === 'socket';
    }

    private function discoverSupervisorConfig(string $home): array
    {
        $homeSupervisorDir = rtrim($home, '/') . '/supervisor';
        $paths = [
            $homeSupervisorDir . '/supervisord.conf',
            $homeSupervisorDir . '/supervisord.ini',
            $home . '/.config/supervisor/supervisord.conf',
            $home . '/etc/supervisord.conf',
            $home . '/supervisord.conf',
        ];

        foreach ($paths as $path) {
            if (is_file($path)) {
                return [
                    'path' => $path,
                    'in_home_supervisor' => str_starts_with($path, $homeSupervisorDir),
                ];
            }
        }

        return [
            'path' => null,
            'in_home_supervisor' => false,
        ];
    }

    private function configHasAutostartDisabled(?string $path): bool
    {
        if ($path === null || !is_file($path)) {
            return false;
        }

        $content = file_get_contents($path) ?: '';
        return str_contains($content, 'autostart=false');
    }

    private function commandHasProcess(string $pattern): bool
    {
        $result = $this->runCommand('pgrep -f ' . escapeshellarg($pattern));
        return $result['exit_code'] === 0 && $result['output'] !== [];
    }

    private function discoverPhpSockets(string $home): array
    {
        $dirs = [
            '/tmp',
            '/var/run',
            $home . '/.php',
            $home . '/.php-fpm',
            $home . '/tmp',
            $home . '/.local/phpcgi/run',
        ];

        $sockets = [];
        $candidates = $this->ops->dreamhostSocketCandidates ?? [];
        foreach ($candidates as $candidate) {
            $candidate = str_replace('%HOME%', $home, $candidate);
            if (str_contains($candidate, '*')) {
                foreach (glob($candidate) ?: [] as $match) {
                    if ($this->isSocket($match)) {
                        $sockets[] = $match;
                    }
                }
            } elseif ($this->isSocket($candidate)) {
                $sockets[] = $candidate;
            }
        }

        foreach ($dirs as $dir) {
            if (!is_dir($dir)) {
                continue;
            }
            foreach (glob($dir . '/*.sock') ?: [] as $file) {
                if (!preg_match('/php|fpm|cgi/i', $file)) {
                    continue;
                }
                $sockets[] = $file;
            }
        }

        return array_values(array_unique($sockets));
    }

    private function detectPhpBackend(array $phpSockets): array
    {
        $ps = $this->runCommand('ps aux | egrep "php82\\.cgi|php-cgi|supervisord" | grep -v egrep');
        $procDetected = $ps['exit_code'] === 0 && $ps['output'] !== [];
        $socketDetected = $phpSockets !== [];

        return [
            'healthy' => $procDetected || $socketDetected,
            'process_detected' => $procDetected,
            'socket_detected' => $socketDetected,
            'process_output' => $ps['output'],
            'sockets' => $phpSockets,
        ];
    }

    private function runNginxConfigTest(string $home): array
    {
        $prefix = $this->ops->homeNginxPrefix ?: ($home . '/nginx');
        $prefix = rtrim($prefix, '/');
        $nginxBin = $prefix . '/sbin/nginx';
        $configPath = 'conf/nginx.conf';

        if (! is_file($nginxBin)) {
            return [
                'status' => 'warning',
                'message' => 'Nginx binary not found in user-space prefix.',
                'binary' => $nginxBin,
                'prefix' => $prefix,
            ];
        }

        $command = sprintf(
            '%s -t -p %s -c %s',
            escapeshellarg($nginxBin),
            escapeshellarg($prefix),
            escapeshellarg($configPath)
        );
        $result = $this->runCommand($command);

        return [
            'status' => $result['exit_code'] === 0 ? 'ok' : 'warning',
            'message' => $result['exit_code'] === 0 ? 'nginx -t succeeded.' : 'nginx -t failed.',
            'command' => $command,
            'output' => $result['output'],
            'prefix' => $prefix,
        ];
    }

    private function validateCacheDirs(): array
    {
        $paths = [
            'cache' => WRITEPATH . 'cache',
            'session' => WRITEPATH . 'session',
            'debugbar' => WRITEPATH . 'debugbar',
        ];

        $details = [];
        $ok = true;

        foreach ($paths as $key => $path) {
            $exists = is_dir($path);
            $writable = $exists && is_writable($path);
            $details[$key] = [
                'path' => $path,
                'exists' => $exists,
                'writable' => $writable,
            ];

            if (! $exists || ! $writable) {
                $ok = false;
            }
        }

        return [
            'ok' => $ok,
            'dirs' => $details,
        ];
    }

    private function detectWebServer(): array
    {
        $nginx = $this->commandHasProcess('nginx');
        $apache = $this->commandHasProcess('apache2|httpd');

        $active = 'none';
        if ($nginx && $apache) {
            $active = 'nginx+apache';
        } elseif ($nginx) {
            $active = 'nginx';
        } elseif ($apache) {
            $active = 'apache';
        }

        return [$active, ['nginx' => $nginx, 'apache' => $apache]];
    }

    private function discoverNginxConfig(string $home): ?string
    {
        $paths = [
            $home . '/nginx/conf/nginx.conf',
            $home . '/.nginx/conf/nginx.conf',
            $home . '/etc/nginx/nginx.conf',
            $home . '/nginx.conf',
        ];

        foreach ($paths as $path) {
            if (is_file($path)) {
                return $path;
            }
        }

        return null;
    }

    private function configHasFastcgi(string $path): bool
    {
        $content = file_get_contents($path) ?: '';
        return (bool) preg_match('/fastcgi_pass|proxy_pass/i', $content);
    }

    private function apacheHandlerValidation(): ?bool
    {
        $publicHtaccess = ROOTPATH . 'public/.htaccess';
        if (!is_file($publicHtaccess)) {
            return null;
        }

        $content = file_get_contents($publicHtaccess) ?: '';
        return (bool) preg_match('/SetHandler|AddHandler|ProxyPassMatch/i', $content);
    }

    private function maintenanceModeDetected(): bool
    {
        $paths = [
            rtrim(WRITEPATH, '/') . '/.maintenance',
            rtrim(WRITEPATH, '/') . '/maintenance',
            ROOTPATH . 'public/maintenance.php',
        ];

        foreach ($paths as $path) {
            if (is_file($path)) {
                return true;
            }
        }

        return false;
    }

    private function latestLogSummary(): array
    {
        $logDir = rtrim(WRITEPATH, '/') . '/logs';
        $files = is_dir($logDir) ? glob($logDir . '/*.log') : [];

        if ($files === [] || $files === false) {
            return [
                'latest_log' => null,
                'error_count' => 0,
                'recent_errors' => [],
            ];
        }

        usort($files, static fn($a, $b) => filemtime($b) <=> filemtime($a));
        $latest = $files[0];
        $lines = file($latest, FILE_IGNORE_NEW_LINES) ?: [];
        $tail = array_slice($lines, -200);
        $errors = array_values(array_filter($tail, static fn($line) => str_contains($line, 'ERROR')));

        return [
            'latest_log' => basename($latest),
            'error_count' => count($errors),
            'recent_errors' => array_slice($errors, -5),
        ];
    }

    private function diskUsage(string $path): array
    {
        $total = (float) (disk_total_space($path) ?: 0);
        $free = (float) (disk_free_space($path) ?: 0);
        $freePercent = $total > 0 ? round(($free / $total) * 100, 2) : 0.0;

        return [
            'path' => $path,
            'total_bytes' => $total,
            'free_bytes' => $free,
            'free_percent' => $freePercent,
        ];
    }

    private function memoryUsage(): array
    {
        $meminfo = is_file('/proc/meminfo') ? file('/proc/meminfo', FILE_IGNORE_NEW_LINES) : [];
        $data = [];
        foreach ($meminfo as $line) {
            if (preg_match('/^(\w+):\s+(\d+)/', $line, $matches)) {
                $data[$matches[1]] = (int) $matches[2];
            }
        }

        $total = $data['MemTotal'] ?? 0;
        $available = $data['MemAvailable'] ?? 0;
        $availablePercent = $total > 0 ? round(($available / $total) * 100, 2) : 0.0;

        return [
            'total_kb' => $total,
            'available_kb' => $available,
            'available_percent' => $availablePercent,
        ];
    }

    private function listeningPorts(): array
    {
        $command = 'ss -ltn';
        $result = $this->runCommand($command);
        if ($result['exit_code'] !== 0) {
            $command = 'netstat -lnt';
            $result = $this->runCommand($command);
        }

        return [
            'command' => $command,
            'output' => $result['output'],
        ];
    }

    private function processSummary(): array
    {
        $phpCount = $this->countProcess('php');
        $nginxCount = $this->countProcess('nginx');
        $apacheCount = $this->countProcess('apache2|httpd');

        return [
            'php' => $phpCount,
            'nginx' => $nginxCount,
            'apache' => $apacheCount,
        ];
    }

    private function countProcess(string $pattern): int
    {
        $result = $this->runCommand('pgrep -fc ' . escapeshellarg($pattern));
        if ($result['exit_code'] !== 0 || $result['output'] === []) {
            return 0;
        }

        return (int) ($result['output'][0] ?? 0);
    }

    private function summarizeChecks(array $checks): array
    {
        $counts = ['ok' => 0, 'warning' => 0, 'critical' => 0];
        foreach ($checks as $check) {
            $status = $check['status'] ?? 'ok';
            if (!isset($counts[$status])) {
                $counts[$status] = 0;
            }
            $counts[$status]++;
        }

        $status = 'ok';
        if ($counts['critical'] > 0) {
            $status = 'critical';
        } elseif ($counts['warning'] > 0) {
            $status = 'warning';
        }

        return [
            'status' => $status,
            'counts' => $counts,
        ];
    }

    private function calculateScoreFromSummary(array $summary): int
    {
        $counts = $summary['counts'] ?? ['warning' => 0, 'critical' => 0];
        $score = 100;
        $score -= ((int) ($counts['warning'] ?? 0)) * 10;
        $score -= ((int) ($counts['critical'] ?? 0)) * 25;
        return max(0, min(100, $score));
    }

    private function uniqueList(array $items): array
    {
        $filtered = array_values(array_filter($items, static fn($item) => is_string($item) && $item !== ''));
        return array_values(array_unique($filtered));
    }

    private function createPack(string $directory, string $jsonPath, string $mdPath, string $date): ?string
    {
        $packPath = $directory . "/envdoctor-pack-{$date}.tar.gz";
        $tarPath = $directory . "/envdoctor-pack-{$date}.tar";

        if (file_exists($packPath)) {
            unlink($packPath);
        }
        if (file_exists($tarPath)) {
            unlink($tarPath);
        }

        if (class_exists(\PharData::class)) {
            $tar = new \PharData($tarPath);
            $tar->addFile($jsonPath, basename($jsonPath));
            $tar->addFile($mdPath, basename($mdPath));
            $tar->compress(\Phar::GZ);
            unset($tar);
            if (file_exists($tarPath)) {
                unlink($tarPath);
            }
            if (file_exists($tarPath . '.gz')) {
                rename($tarPath . '.gz', $packPath);
                return $packPath;
            }
        }

        $result = $this->runCommand('tar -czf ' . escapeshellarg($packPath) . ' -C ' . escapeshellarg($directory) . ' ' . escapeshellarg(basename($jsonPath)) . ' ' . escapeshellarg(basename($mdPath)));
        if ($result['exit_code'] === 0 && file_exists($packPath)) {
            return $packPath;
        }

        return null;
    }
}
