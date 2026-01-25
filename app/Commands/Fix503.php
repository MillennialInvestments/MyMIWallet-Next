<?php

namespace App\Commands;

use App\Services\Triage\CommandRunner;
use CodeIgniter\CLI\CLI;

class Fix503 extends SafeBaseCommand
{
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

        $phpFpmRunning = $this->runPhpFpmStatus($runner);
        if (! $phpFpmRunning) {
            $rootCause = 'PHP-FPM not running';
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
            $restartResult = $runner->run('systemctl restart php8.2-fpm');
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

        $this->printReport($rootCause, $actionsTaken, $actionsNotTaken, $riskLevel, $recommendations);

        log_message('info', '[spark:fix:503] Completed', [
            'root_cause' => $rootCause,
            'risk_level' => $riskLevel,
            'log_path' => $this->logPath,
        ]);

        return EXIT_SUCCESS;
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
        $nginx = $runner->run('grep fastcgi_pass /etc/nginx/sites-enabled/*');
        $sockets = $runner->run('ls /run/php/');

        $fastcgiTargets = $this->extractFastCgiTargets($nginx['output']);
        $available = $sockets['output'];

        $missing = [];
        foreach ($fastcgiTargets as $target) {
            if (! str_starts_with($target, 'unix:')) {
                continue;
            }

            $socketPath = str_replace('unix:', '', $target);
            $socketName = basename($socketPath);
            if (! in_array($socketName, $available, true)) {
                $missing[] = $socketPath;
            }
        }

        $status = empty($missing) ? 'OK' : 'FAIL';
        $detail = empty($missing)
            ? 'fastcgi sockets available'
            : 'missing sockets: ' . implode(', ', $missing);

        $this->logStep('PHP-FPM-SOCKET', $status, $detail);
        $this->logOutput('PHP-FPM-SOCKET', $nginx['output']);
        $this->logOutput('PHP-FPM-SOCKET', $sockets['output']);

        return ! empty($missing);
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
