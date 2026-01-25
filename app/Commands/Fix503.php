<?php

namespace App\Commands;

use App\Services\Triage\CommandRunner;
use CodeIgniter\CLI\CLI;
use Config\Ops;

class Fix503 extends SafeBaseCommand
{
    private Ops $ops;
    private float $confidence = 0.0;

    protected $group = 'ops';
    protected $name = 'fix:503';
    protected $description = 'Diagnose and attempt safe auto-fixes for 503 errors.';
    protected $usage = 'fix:503';
    protected $options = [
        '--dry-run' => 'Run diagnostics without taking any corrective actions',
    ];

    private string $logPath;

    public function run(array $params)
    {
        log_message('info', '[spark:fix:503] Started', ['params' => $params]);
        CLI::write('Starting 503 triage...', 'yellow');

        [$args, $flags] = $this->parseParams($params);
        $dryRun = $this->resolveDryRun($flags);

        $this->initializeLog();
        $this->ops = config(Ops::class);
        $doctorPath = WRITEPATH . 'triage/503/envdoctor-' . date('Y-m-d-His') . '.json';
        $this->logStep('ENVDOCTOR', 'INFO', 'Will write: ' . $doctorPath);

        $runner = new CommandRunner();
        $autoFixAllowed = ! $dryRun;

        $actionsTaken = [];
        $actionsNotTaken = ['Nginx restart (manual required)'];
        $rootCause = 'Undetermined (see log)';
        $riskLevel = 'LOW';
        $recommendations = [
            'Review php-fpm pool config',
            'Add watchdog to detect worker death',
        ];

        $this->logStep('INIT', 'OK', 'Log created at ' . $this->logPath);
        $this->logStep('INIT', 'INFO', 'dry_run=' . ($dryRun ? 'true' : 'false'));

        $this->runWebReachability($runner);

        $diskIssue = $this->runDiskChecks($runner);
        if ($diskIssue) {
            $autoFixAllowed = false;
            $riskLevel = 'HIGH';
            $rootCause = 'Disk/inode usage above 90%';
            $actionsNotTaken[] = 'Auto-fix skipped due to disk/inode threshold';
        }

        $phpBackend = $this->runPhpBackendStatus($runner); // new
        if (! $phpBackend['healthy']) {
            $rootCause = $phpBackend['root_cause'] ?? 'PHP backend not running';
            $riskLevel = 'HIGH';
        }

        $socketMismatch = $this->runSocketCheck($runner);
        $restartQueued = false;
        if ($socketMismatch) {
            $rootCause = 'PHP-FPM socket mismatch';
            $riskLevel = 'MEDIUM';
            $restartQueued = true;
            $this->logStep('PHP-FPM-RESTART', 'INFO', 'Restart queued for phase 7');
        }

        $cliHealthy = $this->runCliHealth($runner);
        if (! $cliHealthy) {
            $rootCause = $rootCause === 'Undetermined (see log)' ? 'CI4 bootstrap failure' : $rootCause;
            $riskLevel = $riskLevel === 'LOW' ? 'MEDIUM' : $riskLevel;
            if ($autoFixAllowed) {
                $this->runCacheReset($runner);
                $actionsTaken[] = 'Cleared CI4 cache';
                $cliHealthy = $this->runCliHealth($runner, true);
            } else {
                $actionsNotTaken[] = 'Cleared CI4 cache (blocked by auto-fix guard)';
            }
        }

        $this->runComposerAutoload($runner);

        $permissionsFixed = $this->runWritablePermissions($runner, $autoFixAllowed);
        if ($permissionsFixed) {
            $actionsTaken[] = 'Adjusted writable permissions';
            if ($rootCause === 'Undetermined (see log)') {
                $rootCause = 'Writable permissions misconfigured';
                $riskLevel = 'MEDIUM';
            }
        }

        $this->runPhpFpmLogs($runner);

        if ($restartQueued && $autoFixAllowed) {
            if ($restartQueued) {
                $actionsNotTaken[] = 'Restarted php8.2-fpm (DreamHost: systemctl not available)';
                $recommendations[] = 'DreamHost panel: restart web server / toggle PHP handler for the domain to refresh backend';
                $recommendations[] = 'If using home-nginx, run: nginx -p ~/nginx -c conf/nginx.conf -t && nginx -p ~/nginx -c conf/nginx.conf -s reload';
            }

            $status = $restartResult['exit_code'] === 0 ? 'OK' : 'FAIL';
            $this->logStep('PHP-FPM-RESTART', $status, 'systemctl restart php8.2-fpm');
            $this->logOutput('PHP-FPM-RESTART', $restartResult['output']);

            if ($status === 'OK') {
                $actionsTaken[] = 'Restarted php8.2-fpm';
            } else {
                $actionsNotTaken[] = 'Restarted php8.2-fpm (restart failed)';
            }
        } elseif ($restartQueued) {
            $actionsNotTaken[] = 'Restarted php8.2-fpm (blocked by auto-fix guard)';
        }
        
        $this->confidence = $this->calculateConfidenceScore($rootCause);
        $recommendations[] = 'Confidence score: ' . number_format($this->confidence * 100, 0) . '%';

        $this->printReport($rootCause, $actionsTaken, $actionsNotTaken, $riskLevel, $recommendations);

        log_message('info', '[spark:fix:503] Completed', [
            'root_cause' => $rootCause,
            'risk_level' => $riskLevel,
            'log_path' => $this->logPath,
        ]);

        return EXIT_SUCCESS;
    }

    private function calculateConfidenceScore(string $rootCause): float
    {
        // Simple, deterministic scoring that you can tune later.
        return match ($rootCause) {
            'Disk/inode usage above 90%' => 0.95,
            'PHP-FPM socket mismatch' => 0.90,
            'Writable permissions misconfigured' => 0.80,
            'CI4 bootstrap failure' => 0.75,
            'PHP backend not running' => 0.70,
            default => 0.40,
        };
    }

    protected function isDestructive(): bool
    {
        return false;
    }

    private function initializeLog(): void
    {
        $directory = WRITEPATH . 'triage/503';
        if (! is_dir($directory)) {
            mkdir($directory, 0775, true);
        }

        $this->logPath = sprintf('%s/503-%s.log', rtrim($directory, '/'), date('Y-m-d-His'));
        file_put_contents($this->logPath, '');
    }

    private function logStep(string $step, string $status, string $detail): void
    {
        $line = sprintf('[%s] [%s] [%s] %s', date('H:i:s'), $step, $status, $detail);
        file_put_contents($this->logPath, $line . PHP_EOL, FILE_APPEND);
    }

    private function logOutput(string $step, array $lines): void
    {
        foreach ($lines as $line) {
            $this->logStep($step, 'INFO', $line);
        }
    }

    private function detectDreamHostSocket(CommandRunner $runner): array
    {
        $home = rtrim(getenv('HOME') ?: '/home/' . get_current_user(), '/');
        $candidates = $this->ops->dreamhostSocketCandidates ?? [];

        foreach ($candidates as $cand) {
            $path = str_replace('%HOME%', $home, $cand);
            // Avoid file_exists() on remote paths if perms are weird; use test -S
            $r = $runner->run('test -S ' . escapeshellarg($path) . ' && echo FOUND || echo MISSING');
            if (in_array('FOUND', $r['output'], true)) {
                return ['found' => true, 'path' => $path];
            }
        }

        // fallback scan (cheap)
        $scan = $runner->run('find ' . escapeshellarg($home) . ' -maxdepth 4 -name "*.sock" 2>/dev/null | head -n 25');
        $found = $scan['exit_code'] === 0 && ! empty($scan['output']);
        return ['found' => $found, 'path' => $found ? $scan['output'][0] : null, 'candidates_checked' => count($candidates)];
    }

    private function runPhpBackendStatus(CommandRunner $runner): array
    {
        $home = rtrim(getenv('HOME') ?: '/home/' . get_current_user(), '/');

        // DreamHost: php82.cgi is the reality; systemctl is a trap.
        if (($this->ops->platform ?? 'generic') === 'dreamhost') {
            $ps = $runner->run('ps aux | egrep "php82\\.cgi|php-cgi|spawn-fcgi|supervisord" | grep -v egrep');
            $sock = $this->detectDreamHostSocket($runner);

            $hasProc = $ps['exit_code'] === 0 && count($ps['output']) > 0;
            $hasSock = $sock['found'];

            $healthy = $hasProc || $hasSock;

            $this->logStep('PHP-BACKEND', $healthy ? 'OK' : 'FAIL', sprintf(
                'platform=dreamhost proc=%s sock=%s sock_path=%s',
                $hasProc ? 'true' : 'false',
                $hasSock ? 'true' : 'false',
                $sock['path'] ?? ''
            ));
            $this->logOutput('PHP-BACKEND', $ps['output']);

            return [
                'healthy' => $healthy,
                'root_cause' => $healthy ? null : 'DreamHost PHP backend not detected (no php-cgi process or socket found)',
                'socket' => $sock,
            ];
        }

        // Generic server path (non-DreamHost) — keep minimal, no auth prompts.
        $ps = $runner->run('ps aux | grep -E "php-fpm: master process|php-fpm: pool" | grep -v grep');
        $running = $ps['exit_code'] === 0 && count($ps['output']) > 0;

        $this->logStep('PHP-BACKEND', $running ? 'OK' : 'FAIL', 'platform=generic ps php-fpm');
        $this->logOutput('PHP-BACKEND', $ps['output']);

        return [
            'healthy' => $running,
            'root_cause' => $running ? null : 'php-fpm not running (no master/pool processes found)',
        ];
    }


    private function runWebReachability(CommandRunner $runner): void
    {
        $result = $runner->run('curl -I https://www.mymiwallet.com');
        $status = $result['exit_code'] === 0 ? 'OK' : 'FAIL';
        $detail = 'curl -I https://www.mymiwallet.com';

        $httpStatus = $this->extractHttpStatus($result['output']);
        $serverHeader = $this->extractHeader($result['output'], 'Server');

        if ($httpStatus !== null) {
            $detail .= ' status=' . $httpStatus;
        }

        if ($serverHeader !== null) {
            $detail .= ' server=' . $serverHeader;
        }

        $this->logStep('WEB-REACHABILITY', $status, $detail);
        $this->logOutput('WEB-REACHABILITY', $result['output']);
    }

    private function runDiskChecks(CommandRunner $runner): bool
    {
        $disk = $runner->run('df -h');
        $inode = $runner->run('df -i');

        $diskMax = $this->extractMaxPercent($disk['output']);
        $inodeMax = $this->extractMaxPercent($inode['output']);

        $diskWarn = $diskMax > 90;
        $inodeWarn = $inodeMax > 90;

        $status = ($disk['exit_code'] === 0 && $inode['exit_code'] === 0) ? 'OK' : 'FAIL';
        if ($diskWarn || $inodeWarn) {
            $status = 'WARN';
        }

        $detail = sprintf('disk_max=%d%% inode_max=%d%%', $diskMax, $inodeMax);
        $this->logStep('DISK', $status, $detail);
        $this->logOutput('DISK', $disk['output']);
        $this->logOutput('INODE', $inode['output']);

        return $diskWarn || $inodeWarn;
    }

    private function runPhpFpmStatus(CommandRunner $runner): bool
    {
        $systemctl = $runner->run('systemctl status php8.2-fpm');
        $ps = $runner->run('ps aux | grep php-fpm');

        $running = $systemctl['exit_code'] === 0;
        $workerCount = $this->countWorkers($ps['output']);

        $status = $running ? 'OK' : 'FAIL';
        $detail = sprintf('running=%s workers=%d', $running ? 'true' : 'false', $workerCount);
        $this->logStep('PHP-FPM-CHECK', $status, $detail);
        $this->logOutput('PHP-FPM-CHECK', $systemctl['output']);
        $this->logOutput('PHP-FPM-PROCESS', $ps['output']);

        return $running;
    }

    private function runSocketCheck(CommandRunner $runner): bool
    {
        // Goal: detect mismatch between nginx fastcgi_pass and the actual available socket
        $home = rtrim(getenv('HOME') ?: '/home/' . get_current_user(), '/');
        $platform = $this->ops->platform ?? 'generic';

        $expected = null;
        $detectedSock = null;

        if ($platform === 'dreamhost') {
            $sock = $this->detectDreamHostSocket($runner);
            $detectedSock = $sock['path'] ?? null;

            // Read home nginx site configs (your $HOME/nginx sites-enabled or conf)
            $ngPrefix = $this->ops->homeNginxPrefix ?? ($home . '/nginx');
            $grep = $runner->run('grep -R --line-number "fastcgi_pass" ' . escapeshellarg($ngPrefix) . ' 2>/dev/null | head -n 30');
            $fastcgiTargets = $this->extractFastCgiTargets($grep['output']);

            // If nginx points to unix socket, verify it matches detected sock
            $missing = [];
            foreach ($fastcgiTargets as $t) {
                $t = trim($t);
                if (str_starts_with($t, 'unix:')) {
                    $path = str_replace('unix:', '', $t);
                    $expected = $path;
                    if ($detectedSock && $path !== $detectedSock) {
                        $missing[] = $path . ' != ' . $detectedSock;
                    }
                }
            }

            $mismatch = ! empty($missing);

            $this->logStep('PHP-SOCKET', $mismatch ? 'FAIL' : 'OK', sprintf(
                'platform=dreamhost detected=%s expected=%s',
                (string) $detectedSock,
                (string) $expected
            ));
            $this->logOutput('PHP-SOCKET', $grep['output']);

            if ($mismatch) {
                // Generate a suggested nginx snippet (no sudo)
                $snippetPath = WRITEPATH . 'triage/503/nginx-fastcgi-fix-' . date('Y-m-d-His') . '.conf';
                $this->writeNginxFastCgiFixSnippet($snippetPath, $detectedSock);
                $this->logStep('NGINX-FIX-GEN', 'OK', 'Wrote suggested config: ' . $snippetPath);
            }

            return $mismatch;
        }

        // Generic minimal behavior: if we can't read system nginx, don't guess.
        $this->logStep('PHP-SOCKET', 'WARN', 'platform=generic socket check skipped (no privileged access)');
        return false;
    }

    private function writeNginxFastCgiFixSnippet(string $path, ?string $socketPath): void
    {
        $socketPath = $socketPath ?: '/home/USER/.php.sock';

        $content = <<<CONF
    # Suggested DreamHost nginx fastcgi_pass alignment
    # Replace your existing fastcgi_pass with the detected socket:
    #
    #   fastcgi_pass unix:{$socketPath};
    #
    # If your config uses an upstream block, ensure it references the same unix socket.

    CONF;

        if (! is_dir(dirname($path))) {
            mkdir(dirname($path), 0775, true);
        }
        file_put_contents($path, $content);
    }

    private function runCliHealth(CommandRunner $runner, bool $afterFix = false): bool
    {
        $result = $runner->run('php spark app:config');
        $status = $result['exit_code'] === 0 ? 'OK' : 'FAIL';
        $detail = $afterFix ? 'php spark app:config (post-fix)' : 'php spark app:config';

        $this->logStep('CI4-CLI', $status, $detail);
        $this->logOutput('CI4-CLI', $result['output']);

        return $result['exit_code'] === 0;
    }

    private function runCacheReset(CommandRunner $runner): void
    {
        $paths = [
            WRITEPATH . 'cache/*',
            WRITEPATH . 'debugbar/*',
            WRITEPATH . 'session/*',
        ];

        foreach ($paths as $path) {
            $result = $runner->run('rm -rf ' . $path);
            $status = $result['exit_code'] === 0 ? 'OK' : 'FAIL';
            $this->logStep('CACHE-RESET', $status, 'rm -rf ' . $path);
            $this->logOutput('CACHE-RESET', $result['output']);
        }
    }

    private function runComposerAutoload(CommandRunner $runner): void
    {
        $result = $runner->run('composer dump-autoload -o');
        $status = $result['exit_code'] === 0 ? 'OK' : 'WARN';

        $this->logStep('AUTOLOAD', $status, 'composer dump-autoload -o');
        $this->logOutput('AUTOLOAD', $result['output']);
    }

    private function runWritablePermissions(CommandRunner $runner, bool $autoFixAllowed): bool
    {
        $result = $runner->run('ls -ld writable');
        $this->logStep('PERMISSIONS', $result['exit_code'] === 0 ? 'OK' : 'FAIL', 'ls -ld writable');
        $this->logOutput('PERMISSIONS', $result['output']);

        $permissions = $this->extractPermissions($result['output']);
        if ($permissions === 'drwxrwxr-x') {
            return false;
        }

        if (! $autoFixAllowed) {
            $this->logStep('PERMISSIONS', 'WARN', 'Auto-fix blocked; expected drwxrwxr-x');
            return false;
        }

        $chmod = $runner->run('chmod -R 775 writable');
        $status = $chmod['exit_code'] === 0 ? 'OK' : 'FAIL';
        $this->logStep('PERMISSIONS', $status, 'chmod -R 775 writable');
        $this->logOutput('PERMISSIONS', $chmod['output']);

        return $chmod['exit_code'] === 0;
    }

    private function runPhpFpmLogs(CommandRunner $runner): void
    {
        $logFile = '/var/log/php8.2-fpm.log';
        if (! file_exists($logFile)) {
            $this->logStep('PHP-FPM-LOG', 'WARN', $logFile . ' not found');
            return;
        }

        $result = $runner->run('tail -n 200 ' . escapeshellarg($logFile));
        $status = $result['exit_code'] === 0 ? 'OK' : 'WARN';
        $this->logStep('PHP-FPM-LOG', $status, 'tail -n 200 ' . $logFile);
        $this->logOutput('PHP-FPM-LOG', $result['output']);
    }

    private function printReport(
        string $rootCause,
        array $actionsTaken,
        array $actionsNotTaken,
        string $riskLevel,
        array $recommendations
    ): void {
        CLI::newLine();
        CLI::write('==============================');
        CLI::write(' MyMI Wallet – 503 TRIAGE');
        CLI::write('==============================');
        CLI::newLine();
        CLI::write('Root Cause:');
        CLI::write('✔ ' . $rootCause);
        CLI::newLine();

        CLI::write('Actions Taken:');
        if (empty($actionsTaken)) {
            CLI::write('✖ None');
        } else {
            foreach ($actionsTaken as $action) {
                CLI::write('✔ ' . $action);
            }
        }
        CLI::newLine();

        CLI::write('Actions NOT Taken:');
        foreach ($actionsNotTaken as $action) {
            CLI::write('✖ ' . $action);
        }
        CLI::newLine();

        CLI::write('Risk Level:');
        CLI::write($riskLevel);
        CLI::newLine();

        CLI::write('Recommended Follow-Up:');
        foreach ($recommendations as $recommendation) {
            CLI::write('- ' . $recommendation);
        }
        CLI::newLine();
    }

    private function extractHttpStatus(array $lines): ?string
    {
        foreach ($lines as $line) {
            if (preg_match('/HTTP\\/[0-9.]+\\s+(\\d+)/', $line, $matches)) {
                return $matches[1];
            }
        }

        return null;
    }

    private function extractHeader(array $lines, string $header): ?string
    {
        $needle = strtolower($header) . ':';
        foreach ($lines as $line) {
            if (str_starts_with(strtolower($line), $needle)) {
                return trim(substr($line, strlen($needle)));
            }
        }

        return null;
    }

    private function extractMaxPercent(array $lines): int
    {
        $max = 0;

        foreach ($lines as $line) {
            if (! preg_match_all('/(\\d+)%/', $line, $matches)) {
                continue;
            }

            foreach ($matches[1] as $percent) {
                $value = (int) $percent;
                if ($value > $max) {
                    $max = $value;
                }
            }
        }

        return $max;
    }

    private function countWorkers(array $lines): int
    {
        $count = 0;

        foreach ($lines as $line) {
            if (str_contains($line, 'php-fpm: pool') || str_contains($line, 'php-fpm: master process')) {
                $count++;
            }
        }

        return $count;
    }

    private function extractFastCgiTargets(array $lines): array
    {
        $targets = [];

        foreach ($lines as $line) {
            if (preg_match('/fastcgi_pass\\s+([^;]+);/', $line, $matches)) {
                $targets[] = trim($matches[1]);
            }
        }

        return $targets;
    }

    private function extractPermissions(array $lines): ?string
    {
        foreach ($lines as $line) {
            $parts = preg_split('/\\s+/', trim($line));
            if (! empty($parts[0]) && str_starts_with($parts[0], 'd')) {
                return $parts[0];
            }
        }

        return null;
    }
}
