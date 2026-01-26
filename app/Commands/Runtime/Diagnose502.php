<?php

namespace App\Commands\Runtime;

use App\Commands\SafeBaseCommand;
use CodeIgniter\CLI\CLI;
use Config\Database;

class Diagnose502 extends SafeBaseCommand
{
    protected $group       = 'runtime';
    protected $name        = 'runtime:diagnose-502';
    protected $description = 'Diagnose common causes of HTTP 502 / Bad Gateway errors.';
    protected $aliases     = ['runtime:fix-502'];
    protected $usage       = "runtime:diagnose-502 [--self-test] [--dry-run]\nruntime:fix-502 --force [--dry-run]";
    protected $options     = [
        '--self-test' => 'Run a non-destructive smoke test of diagnostics and output formatting',
        '--dry-run'   => 'Report actions without making changes (fix mode only)',
        '--force'     => 'Allow destructive actions in fix mode',
    ];

    private bool $destructive = false;
    private bool $selfTestMode = false;

    public function run(array $params)
    {
        log_message('info', '[runtime:diagnose-502] start', ['params' => $params]);

        [$args, $flags] = $this->parseParams($params);
        $dryRun = $this->resolveDryRun($flags);
        $selfTest = isset($flags['self-test']);
        $commandName = $this->detectCommandName();
        $fixMode = $commandName === 'runtime:fix-502';

        $this->selfTestMode = $selfTest;
        $this->destructive = $fixMode;

        if ($selfTest) {
            return $this->runSelfTest();
        }

        if ($fixMode) {
            $guard = $this->guardDestructive($flags);
            if ($guard !== null) {
                $this->recordFailure('Fix mode blocked: --force required');
                return $guard;
            }
        }

        CLI::write('Runtime 502 Diagnostics', 'yellow');
        if ($fixMode) {
            CLI::write('Fix mode enabled (safe actions only).', 'yellow');
        }
        CLI::newLine();

        $phpStatus = $this->checkPhpRuntime();
        $socketStatus = $this->checkSockets($phpStatus);
        $nginxScan = $this->scanNginxConfigs();
        $logScan = $this->scanNginxLogs();

        if ($fixMode) {
            $this->applyFixes($socketStatus, $dryRun);
        }

        $summary = [
            'PHP runtime mismatch' => $phpStatus['mismatch'] ? '❌' : '✔',
            'FastCGI socket present' => $socketStatus['present'] ? '✔' : '❌',
            'Nginx fastcgi_pass invalid' => $nginxScan['invalid'] ? '❌' : '✔',
            'Recent 502 errors detected' => $logScan['recent_errors'] ? '✔' : '❌',
        ];

        CLI::newLine();
        CLI::write('502 Diagnosis Summary', 'yellow');
        CLI::write('─────────────────────');
        foreach ($summary as $label => $status) {
            CLI::write(str_pad($label, 28) . ' ' . $status);
        }

        $blockingIssues = $phpStatus['mismatch']
            || ! $socketStatus['present']
            || $nginxScan['invalid']
            || $logScan['recent_errors'];

        log_message('info', '[runtime:diagnose-502] completed', [
            'blocking' => $blockingIssues,
            'fix_mode' => $fixMode,
            'dry_run'  => $dryRun,
        ]);

        return $blockingIssues ? EXIT_ERROR : EXIT_SUCCESS;
    }

    protected function isDestructive(): bool
    {
        return $this->destructive;
    }

    private function runSelfTest(): int
    {
        CLI::write('Runtime 502 Self-Test', 'yellow');
        CLI::newLine();

        $home = $this->homeDir();
        $testFiles = [
            $home . '/nginx/conf/nginx.conf',
            $home . '/nginx/sites-enabled',
            $home . '/nginx/logs/error.log',
        ];

        foreach ($testFiles as $path) {
            $status = is_readable($path) || is_dir($path) ? '✔' : '⚠';
            CLI::write(sprintf('%s File access check: %s', $status, $path));
        }

        $sampleConfig = 'server { fastcgi_pass 127.0.0.1:9000; }';
        $configHits = $this->scanConfigContent($sampleConfig);
        CLI::write(
            sprintf('%s Regex scan (config): %s hits', $configHits !== [], count($configHits)),
            $configHits !== [] ? 'green' : 'red'
        );

        $sampleLog = [
            'connect() failed (111: Connection refused) while connecting to upstream',
            'upstream prematurely closed connection while reading response header',
            'Bad Gateway',
        ];
        $logHits = $this->scanLogLines($sampleLog);
        CLI::write(
            sprintf('%s Regex scan (logs): %s hits', $logHits !== [], count($logHits)),
            $logHits !== [] ? 'green' : 'red'
        );

        $summary = [
            'PHP runtime mismatch' => '✔',
            'FastCGI socket present' => '✔',
            'Nginx fastcgi_pass invalid' => '❌',
            'Recent 502 errors detected' => '✔',
        ];

        CLI::newLine();
        CLI::write('502 Diagnosis Summary', 'yellow');
        CLI::write('─────────────────────');
        foreach ($summary as $label => $status) {
            CLI::write(str_pad($label, 28) . ' ' . $status);
        }

        CLI::newLine();
        CLI::write('Self-test complete (no destructive actions taken).', 'green');

        return EXIT_SUCCESS;
    }

    private function checkPhpRuntime(): array
    {
        $cliVersion = PHP_VERSION;
        CLI::write('✔ PHP CLI: ' . $cliVersion);

        $home = $this->homeDir();
        $handlerSources = [];
        $dreamhostSocket = $home . '/.php.sock';
        $phpFpmSocket = '/tmp/php-fpm.sock';

        if (is_file($dreamhostSocket)) {
            $handlerSources[] = 'dreamhost';
        }
        if ($this->processExists('php-fpm') || is_file($phpFpmSocket)) {
            $handlerSources[] = 'php-fpm';
        }
        if ($this->processExists('php-cgi')) {
            $handlerSources[] = 'php-cgi';
        }

        $handler = 'unknown';
        if (in_array('dreamhost', $handlerSources, true)) {
            $handler = 'php-cgi (DreamHost)';
        } elseif (in_array('php-fpm', $handlerSources, true)) {
            $handler = 'php-fpm';
        } elseif (in_array('php-cgi', $handlerSources, true)) {
            $handler = 'php-cgi';
        }

        $mismatch = $handler === 'unknown' || count($handlerSources) > 1;
        $handlerLabel = $handler === 'unknown' ? 'unknown' : $handler;
        $handlerStatus = $mismatch ? '⚠' : '✔';
        CLI::write(sprintf('%s Web handler: %s', $handlerStatus, $handlerLabel));

        if ($mismatch) {
            $this->recordFailure(sprintf('PHP runtime mismatch: handler=%s sources=%s', $handlerLabel, implode(',', $handlerSources)));
        }

        return [
            'cli_version' => $cliVersion,
            'handler' => $handlerLabel,
            'handler_sources' => $handlerSources,
            'mismatch' => $mismatch,
        ];
    }

    private function checkSockets(array $phpStatus): array
    {
        CLI::newLine();
        CLI::write('FastCGI / Socket Validation', 'yellow');

        $home = $this->homeDir();
        $checks = [];

        $sockets = [
            'dreamhost' => $home . '/.php.sock',
            'php-fpm' => '/tmp/php-fpm.sock',
        ];

        foreach ($sockets as $type => $path) {
            if ($type === 'php-fpm' && ! in_array('php-fpm', $phpStatus['handler_sources'], true) && ! is_file($path)) {
                continue;
            }

            $checks[$type] = $this->inspectSocket($path);
        }

        $issues = [];
        $present = false;
        foreach ($checks as $type => $result) {
            if ($result['present'] && ! $result['stale']) {
                $present = true;
            }
            if (! $result['present']) {
                $issues[] = sprintf('%s socket missing: %s', $type, $result['path']);
            }
            if ($result['permission_denied']) {
                $issues[] = sprintf('%s socket permission denied: %s', $type, $result['path']);
            }
            if ($result['stale']) {
                $issues[] = sprintf('%s socket stale: %s', $type, $result['path']);
            }

            $status = $result['present'] && ! $result['stale'] ? '✔' : '⚠';
            $detail = $result['present'] ? $result['path'] : 'missing';
            if ($result['stale']) {
                $detail .= ' (stale)';
            }
            if ($result['permission_denied']) {
                $detail .= ' (permission denied)';
            }
            CLI::write(sprintf('%s %s', $status, $detail));
        }

        foreach ($issues as $issue) {
            $this->recordFailure($issue);
        }

        return [
            'present' => $present,
            'issues' => $issues,
            'checks' => $checks,
        ];
    }

    private function scanNginxConfigs(): array
    {
        CLI::newLine();
        CLI::write('Nginx Configuration Scan (read-only)', 'yellow');

        $files = $this->listNginxConfigFiles();
        $hits = [];

        foreach ($files as $file) {
            $content = @file_get_contents($file);
            if ($content === false) {
                continue;
            }

            $fileHits = $this->scanConfigContent($content);
            foreach ($fileHits as $hit) {
                $hits[] = sprintf('%s in %s', $hit, $file);
            }
        }

        $invalid = $hits !== [];
        if ($invalid) {
            $this->recordFailure('Nginx fastcgi_pass invalid: ' . implode('; ', $hits));
        }

        if ($files === []) {
            CLI::write('⚠ No nginx configs found in user space.');
        }

        foreach (array_unique($hits) as $hit) {
            CLI::write('⚠ ' . $hit);
        }

        if (! $invalid) {
            CLI::write('✔ No invalid fastcgi_pass entries detected.');
        }

        return [
            'invalid' => $invalid,
            'hits' => array_values(array_unique($hits)),
            'files' => $files,
        ];
    }

    private function scanNginxLogs(): array
    {
        CLI::newLine();
        CLI::write('Log Scan (last 500 lines)', 'yellow');

        $files = $this->listNginxLogFiles();
        $matches = [];

        foreach ($files as $file) {
            $lines = $this->tailLines($file, 500);
            if ($lines === []) {
                continue;
            }

            $fileMatches = $this->scanLogLines($lines);
            foreach ($fileMatches as $match) {
                $matches[] = sprintf('%s in %s', $match, $file);
            }
        }

        $recentErrors = $matches !== [];
        if ($recentErrors) {
            $this->recordFailure('Recent 502 errors detected: ' . implode('; ', $matches));
        }

        if ($files === []) {
            CLI::write('⚠ No nginx error logs found.');
        }

        foreach (array_unique($matches) as $match) {
            CLI::write('⚠ ' . $match);
        }

        if (! $recentErrors) {
            CLI::write('✔ No recent 502 patterns found.');
        }

        return [
            'recent_errors' => $recentErrors,
            'matches' => array_values(array_unique($matches)),
            'files' => $files,
        ];
    }

    private function applyFixes(array $socketStatus, bool $dryRun): void
    {
        CLI::newLine();
        CLI::write('Safe Fix Actions', 'yellow');

        $this->removeStaleSocket($socketStatus, $dryRun);
        $this->restartPhpCgi($dryRun);
        $this->clearWritableCache($dryRun);
        $this->clearWritableSessions($dryRun);
    }

    private function removeStaleSocket(array $socketStatus, bool $dryRun): void
    {
        $dreamhost = $socketStatus['checks']['dreamhost'] ?? null;
        if ($dreamhost === null || ! $dreamhost['stale']) {
            return;
        }

        $before = [
            'path' => $dreamhost['path'],
            'exists' => $dreamhost['present'],
        ];

        if ($dryRun) {
            CLI::write('⚠ Dry-run: would remove stale PHP socket ' . $dreamhost['path']);
            $this->recordAction('dry-run remove stale socket', $before, ['removed' => false]);
            return;
        }

        $removed = @unlink($dreamhost['path']);
        $after = [
            'removed' => $removed,
            'exists' => file_exists($dreamhost['path']),
        ];

        if ($removed) {
            CLI::write('✔ Removed stale PHP socket');
        } else {
            CLI::write('⚠ Failed to remove stale PHP socket');
        }

        $this->recordAction('remove stale socket', $before, $after);
    }

    private function restartPhpCgi(bool $dryRun): void
    {
        $user = get_current_user();
        $processes = $this->findProcesses('php-cgi');
        $before = [
            'user' => $user,
            'process_count' => count($processes),
        ];

        if ($processes === []) {
            CLI::write('⚠ PHP handler restart not permitted (shared host)');
            $this->recordAction('restart php-cgi', $before, ['skipped' => true, 'reason' => 'no php-cgi process detected']);
            return;
        }

        if ($dryRun) {
            CLI::write('⚠ Dry-run: would restart php-cgi processes');
            $this->recordAction('dry-run restart php-cgi', $before, ['skipped' => true]);
            return;
        }

        $command = sprintf('pkill -u %s php-cgi 2>/dev/null', escapeshellarg($user));
        $resultCode = 0;
        @exec($command, $output, $resultCode);

        if ($resultCode === 0) {
            CLI::write('✔ Restarted php-cgi processes (if supervisor restarts are enabled)');
            $this->recordAction('restart php-cgi', $before, ['result_code' => $resultCode]);
            return;
        }

        CLI::write('⚠ PHP handler restart not permitted (shared host)');
        $this->recordAction('restart php-cgi', $before, ['result_code' => $resultCode, 'skipped' => true]);
    }

    private function clearWritableCache(bool $dryRun): void
    {
        $path = rtrim(WRITEPATH, '/') . '/cache';
        $before = ['path' => $path, 'count' => $this->countFiles($path)];

        if ($dryRun) {
            CLI::write('⚠ Dry-run: would clear writable cache');
            $this->recordAction('dry-run clear cache', $before, ['cleared' => false]);
            return;
        }

        $cleared = $this->clearDirectoryFiles($path);
        $after = ['count' => $this->countFiles($path)];

        if ($cleared) {
            CLI::write('✔ Cleared writable cache');
        } else {
            CLI::write('⚠ No writable cache cleared');
        }

        $this->recordAction('clear writable cache', $before, $after);
    }

    private function clearWritableSessions(bool $dryRun): void
    {
        $path = rtrim(WRITEPATH, '/') . '/sessions';
        $before = ['path' => $path, 'count' => $this->countFiles($path)];

        if ($dryRun) {
            CLI::write('⚠ Dry-run: would clear writable sessions');
            $this->recordAction('dry-run clear sessions', $before, ['cleared' => false]);
            return;
        }

        $cleared = $this->clearDirectoryFiles($path);
        $after = ['count' => $this->countFiles($path)];

        if ($cleared) {
            CLI::write('✔ Cleared writable sessions');
        } else {
            CLI::write('⚠ No writable sessions cleared');
        }

        $this->recordAction('clear writable sessions', $before, $after);
    }

    private function inspectSocket(string $path): array
    {
        $present = file_exists($path);
        $permissionDenied = false;
        $stale = false;

        if ($present) {
            $permissionDenied = ! is_readable($path) || ! is_writable($path);
            $stale = $this->isSocketStale($path);
        }

        return [
            'path' => $path,
            'present' => $present,
            'permission_denied' => $permissionDenied,
            'stale' => $stale,
        ];
    }

    private function isSocketStale(string $path): bool
    {
        if (! file_exists($path)) {
            return false;
        }

        $errno = 0;
        $errstr = '';
        $client = @stream_socket_client('unix://' . $path, $errno, $errstr, 0.5);
        if ($client !== false) {
            fclose($client);
            return false;
        }

        return $errstr !== '';
    }

    private function listNginxConfigFiles(): array
    {
        $home = $this->homeDir();
        $files = [];

        $main = $home . '/nginx/conf/nginx.conf';
        if ($this->isConfigCandidate($main)) {
            $files[] = $main;
        }

        foreach (glob($home . '/nginx/sites-enabled/*.conf') ?: [] as $file) {
            if ($this->isConfigCandidate($file)) {
                $files[] = $file;
            }
        }

        return array_values(array_unique($files));
    }

    private function listNginxLogFiles(): array
    {
        $home = $this->homeDir();
        $files = [];

        $primary = $home . '/nginx/logs/error.log';
        if ($this->isLogCandidate($primary)) {
            $files[] = $primary;
        }

        foreach (glob($home . '/nginx/logs/*.error.log') ?: [] as $file) {
            if ($this->isLogCandidate($file)) {
                $files[] = $file;
            }
        }

        return array_values(array_unique($files));
    }

    private function scanConfigContent(string $content): array
    {
        $patterns = [
            'fastcgi_pass 127.0.0.1:9000' => '/fastcgi_pass\s+127\.0\.0\.1:9000/i',
            'php-fpm' => '/\bphp-fpm\b/i',
            'php-cgi' => '/\bphp-cgi\b/i',
            'hardcoded port' => '/fastcgi_pass\s+[^;]*(9000|9071)\b/i',
        ];

        $hits = [];
        foreach ($patterns as $label => $pattern) {
            if (preg_match($pattern, $content)) {
                $hits[] = $label;
            }
        }

        return $hits;
    }

    private function scanLogLines(array $lines): array
    {
        $patterns = [
            'connect() failed' => '/connect\(\) failed/i',
            'no such file or directory' => '/no such file or directory/i',
            'upstream prematurely closed connection' => '/upstream prematurely closed connection/i',
            'Bad Gateway' => '/Bad Gateway/i',
        ];

        $hits = [];
        foreach ($lines as $line) {
            foreach ($patterns as $label => $pattern) {
                if (preg_match($pattern, $line)) {
                    $hits[] = $label;
                }
            }
        }

        return array_values(array_unique($hits));
    }

    private function tailLines(string $path, int $maxLines): array
    {
        if (! is_readable($path)) {
            return [];
        }

        $handle = @fopen($path, 'rb');
        if (! $handle) {
            return [];
        }

        $buffer = '';
        $chunkSize = 4096;
        fseek($handle, 0, SEEK_END);
        $fileSize = ftell($handle);

        while ($fileSize > 0 && substr_count($buffer, "\n") <= $maxLines) {
            $readSize = $fileSize > $chunkSize ? $chunkSize : $fileSize;
            $fileSize -= $readSize;
            fseek($handle, $fileSize);
            $buffer = fread($handle, $readSize) . $buffer;
        }

        fclose($handle);

        $lines = preg_split("/\r?\n/", trim($buffer));
        if (! is_array($lines)) {
            return [];
        }

        return array_slice($lines, -$maxLines);
    }

    private function isConfigCandidate(string $path): bool
    {
        if (! is_file($path)) {
            return false;
        }

        if (preg_match('/\.(bak|off)$/', $path)) {
            return false;
        }

        if (str_contains($path, '_archive/')) {
            return false;
        }

        if (str_contains($path, '/vendor/')) {
            return false;
        }

        return true;
    }

    private function isLogCandidate(string $path): bool
    {
        if (! is_file($path)) {
            return false;
        }

        if (preg_match('/\.(bak|off)$/', $path)) {
            return false;
        }

        if (str_contains($path, '_archive/')) {
            return false;
        }

        return true;
    }

    private function processExists(string $process): bool
    {
        return $this->findProcesses($process) !== [];
    }

    private function findProcesses(string $process): array
    {
        if (! function_exists('exec')) {
            return [];
        }

        $command = sprintf('pgrep -l %s 2>/dev/null', escapeshellarg($process));
        $output = [];
        $result = 1;
        @exec($command, $output, $result);

        if ($result !== 0) {
            return [];
        }

        return $output;
    }

    private function recordFailure(string $message): void
    {
        log_message('warning', '[runtime:diagnose-502] ' . $message);
        $this->recordLogEntry('warning', $message, []);
    }

    private function recordAction(string $action, array $before, array $after): void
    {
        $message = sprintf('%s | before=%s | after=%s', $action, json_encode($before), json_encode($after));
        log_message('info', '[runtime:diagnose-502] ' . $message);
        $this->recordLogEntry('info', $message, [
            'before' => $before,
            'after' => $after,
        ]);
    }

    private function recordLogEntry(string $level, string $message, array $context): void
    {
        if ($this->selfTestMode) {
            return;
        }

        $payload = [
            'severity' => $level,
            'message' => $message,
            'context' => json_encode($context),
            'created_at' => date('Y-m-d H:i:s'),
        ];

        $inserted = $this->insertIntoErrorLogs($payload);

        if (! $inserted) {
            $this->writeFallbackLog($level, $message, $context);
        }
    }

    private function insertIntoErrorLogs(array $payload): bool
    {
        try {
            $db = Database::connect();
            if (! method_exists($db, 'tableExists') || ! $db->tableExists('bf_error_logs')) {
                return false;
            }

            $columns = $db->getFieldNames('bf_error_logs');
        } catch (\Throwable $e) {
            return false;
        }

        $available = array_map('strtolower', $columns);
        $filtered = array_intersect_key($payload, array_flip($available));

        if ($filtered === []) {
            return false;
        }

        try {
            $db->table('bf_error_logs')->insert($filtered);
            return true;
        } catch (\Throwable $e) {
            return false;
        }
    }

    private function writeFallbackLog(string $level, string $message, array $context): void
    {
        $path = rtrim(WRITEPATH, '/') . '/logs/runtime-502.log';
        $entry = sprintf('[%s] [%s] %s %s', date('Y-m-d H:i:s'), strtoupper($level), $message, json_encode($context));
        @file_put_contents($path, $entry . PHP_EOL, FILE_APPEND);
    }

    private function clearDirectoryFiles(string $path): bool
    {
        if (! is_dir($path)) {
            return false;
        }

        $cleared = false;
        $iterator = new \DirectoryIterator($path);
        foreach ($iterator as $fileInfo) {
            if ($fileInfo->isDot()) {
                continue;
            }

            if ($fileInfo->isFile()) {
                $cleared = true;
                @unlink($fileInfo->getPathname());
            }
        }

        return $cleared;
    }

    private function countFiles(string $path): int
    {
        if (! is_dir($path)) {
            return 0;
        }

        $count = 0;
        $iterator = new \DirectoryIterator($path);
        foreach ($iterator as $fileInfo) {
            if ($fileInfo->isFile()) {
                $count++;
            }
        }

        return $count;
    }

    private function detectCommandName(): string
    {
        $argv = $_SERVER['argv'] ?? [];
        $command = $argv[1] ?? $this->name;

        return is_string($command) ? $command : $this->name;
    }

    private function homeDir(): string
    {
        return rtrim(getenv('HOME') ?: '/home/mymiteam', '/');
    }
}
