<?php

namespace App\Commands;

use App\Helpers\TriageSanitizer;
use App\Commands\Support\ArtifactHelper;
use App\Services\Triage\CommandRunner;
use App\Services\Triage\HostingModeDetector;
use App\Services\Ops\EnvDoctorService;
use CodeIgniter\CLI\CLI;
use Config\Ops;

class Fix503 extends SafeBaseCommand
{
    private Ops $ops;
    private float $confidence = 0.0;
    private string $artifactDir;

    protected $group = 'ops';
    protected $name = 'fix:503';
    protected $description = 'Diagnose and attempt safe auto-fixes for 503 errors.';
    protected $usage = 'fix:503 [--dry-run] [--approve]';
    protected $options = [
        '--dry-run' => 'Run diagnostics without taking any corrective actions',
        '--approve' => 'Acknowledge and apply corrective actions',
    ];

    private string $logPath;
    private string $summaryPath;
    private string $reportTimestamp;

    public function run(array $params)
    {
        log_message('info', '[spark:fix:503] Started', ['params' => $params]);
        CLI::write('Starting 503 triage...', 'yellow');

        [$args, $flags] = $this->parseParams($params);
        $dryRun = $this->resolveDryRun($flags);

        $resolved = ArtifactHelper::resolveArtifactDirs($this->name, null);
        if (isset($resolved['error'])) {
            CLI::error($resolved['error']);
            return EXIT_ERROR;
        }

        $this->artifactDir = $resolved['dir'];
        $this->reportTimestamp = $resolved['timestamp'];
        $this->initializeLog();
        $this->ops = config(Ops::class);

        $runner = new CommandRunner();
        $autoFixAllowed = ! $dryRun;

        $actionsTaken = [];
        $actionsNotTaken = ['Web server restart (manual required)'];
        $rootCause = 'Undetermined (see log)';
        $riskLevel = 'LOW';
        $recommendations = [
            'Review PHP handler configuration in your DreamHost panel.',
            'Add watchdogs/alerts to detect backend worker failures.',
        ];
        $manualRestartCommands = [];
        $gitWarnings = [];

        $this->logStep('INIT', 'OK', 'Log created at ' . $this->logPath);
        $this->logStep('INIT', 'OK', 'Summary created at ' . $this->summaryPath);
        $this->logStep('INIT', 'INFO', 'dry_run=' . ($dryRun ? 'true' : 'false'));

        $envDoctor = new EnvDoctorService();
        $envRun = $envDoctor->run(false);
        $envSummary = $envDoctor->summarizeReport($envRun['report']);
        $envPaths = $envRun['paths'];
        $this->logStep('ENVDOCTOR', 'OK', sprintf(
            'status=%s score=%s json=%s md=%s',
            $envSummary['status'] ?? 'unknown',
            (string) ($envSummary['score'] ?? 0),
            $envPaths['json'] ?? 'n/a',
            $envPaths['markdown'] ?? 'n/a'
        ));

        $hostingStatus = $this->runHostingModeDetection($runner);
        $manualRestartCommands = $this->suggestManualRestartCommands($runner, $hostingStatus);
        if (($hostingStatus['php_mode'] ?? 'unknown') === 'unknown' || (int) ($hostingStatus['php_workers'] ?? 0) === 0) {
            $rootCause = 'No php handler detected — you must restart the PHP handler (hosting specific)';
            $riskLevel = 'HIGH';
        }

        $gitWarnings = $this->runGitSafetyCheck($runner);
        if ($gitWarnings !== []) {
            $this->logStep('GIT-SAFETY', 'WARN', implode('; ', $gitWarnings));
            $recommendations[] = 'Git safety warning: ' . implode('; ', $gitWarnings);
        }

        $this->runWebReachability($runner);

        $diskIssue = $this->runDiskChecks($runner);
        if ($diskIssue) {
            $autoFixAllowed = false;
            $riskLevel = 'HIGH';
            $rootCause = 'Disk/inode usage above 90%';
            $actionsNotTaken[] = 'Auto-fix skipped due to disk/inode threshold';
        }

        $phpBackend = $this->runPhpBackendStatus($runner, $hostingStatus);
        if (! $phpBackend['healthy']) {
            $rootCause = $phpBackend['root_cause'] ?? 'PHP backend not running';
            $riskLevel = 'HIGH';
            $recommendations[] = 'Verify php-cgi/php-fpm processes or supervisor (if applicable) are running.';
        }

        $socketCheck = $this->runSocketCheck($runner, $hostingStatus);
        $socketMismatch = $socketCheck['mismatch'] ?? false;
        if ($socketMismatch) {
            $rootCause = 'PHP backend socket mismatch';
            $riskLevel = 'MEDIUM';
            $actionsNotTaken[] = 'Restart PHP handler (DreamHost panel required)';
            if (! empty($socketCheck['snippet_path'])) {
                $recommendations[] = 'Apply nginx fastcgi_pass fix: ' . $socketCheck['snippet_path'];
            }
        }

        $envExists = $this->runEnvPresence();
        $publicIndexExists = $this->runPublicIndexCheck();
        $vendorAutoloadExists = $this->runVendorAutoloadCheck();

        $cliEnvOk = $this->runCliEnv($runner);
        $cliRoutesOk = $this->runCliRoutes($runner);
        $ci4BootOk = $cliEnvOk && $cliRoutesOk;
        if (! $ci4BootOk) {
            $rootCause = $rootCause === 'Undetermined (see log)' ? 'CI4 bootstrap failure' : $rootCause;
            $riskLevel = $riskLevel === 'LOW' ? 'MEDIUM' : $riskLevel;
            if ($autoFixAllowed) {
                $this->runCacheReset($runner, $autoFixAllowed);
                $actionsTaken[] = 'Cleared CI4 cache';
                $cliEnvOk = $this->runCliEnv($runner, true);
                $cliRoutesOk = $this->runCliRoutes($runner, true);
                $ci4BootOk = $cliEnvOk && $cliRoutesOk;
            } else {
                $actionsNotTaken[] = 'Cleared CI4 cache (blocked by auto-fix guard)';
            }
        }

        $this->runComposerAutoload($runner, $autoFixAllowed);

        $permissionsFixed = $this->runWritablePermissions($runner, $autoFixAllowed);
        if ($permissionsFixed) {
            $actionsTaken[] = 'Adjusted writable permissions';
            if ($rootCause === 'Undetermined (see log)') {
                $rootCause = 'Writable permissions misconfigured';
                $riskLevel = 'MEDIUM';
            }
        }

        $this->runPhpFpmLogs($runner);

        $envSnapshot = $this->writeEnvSnapshot();

        if ($socketMismatch) {
            $recommendations[] = 'Panel action: DreamHost > Websites > Manage Domains > Toggle PHP version or restart web server.';
            $recommendations[] = 'Panel action: DreamHost > Websites > Manage Domains > Restart the site if PHP handler is stuck.';
            $recommendations[] = 'If using home-nginx, run: nginx -p ~/nginx -c conf/nginx.conf -t && nginx -p ~/nginx -c conf/nginx.conf -s reload';
        }

        foreach ($manualRestartCommands as $command) {
            $recommendations[] = 'Manual restart: ' . $command;
        }

        $this->confidence = $this->calculateConfidenceScore($rootCause);
        $recommendations[] = 'Confidence score: ' . number_format($this->confidence * 100, 0) . '%';
        $recommendations[] = 'EnvDoctor summary: status=' . ($envSummary['status'] ?? 'unknown') . ' score=' . ($envSummary['score'] ?? 0);
        $recommendations[] = 'EnvDoctor JSON: ' . ($envPaths['json'] ?? 'n/a');
        $recommendations[] = 'EnvDoctor Markdown: ' . ($envPaths['markdown'] ?? 'n/a');

        $appLogTail = $this->readAppLogTail(50);

        $reportData = [
            'root_cause' => $rootCause,
            'risk_level' => $riskLevel,
            'hosting_mode' => $hostingStatus['hosting_mode'] ?? 'UNKNOWN',
            'web_server' => $hostingStatus['web_server'] ?? 'unknown',
            'php_mode' => $hostingStatus['php_mode'] ?? 'unknown',
            'php_workers' => $hostingStatus['php_workers'] ?? 0,
            'fastcgi_upstream' => $hostingStatus['fastcgi_upstream'] ?? null,
            'ports' => $hostingStatus['ports'] ?? [],
            'sockets' => $hostingStatus['sockets'] ?? [],
            'php_backend_healthy' => $phpBackend['healthy'] ?? false,
            'ci4_env_ok' => $cliEnvOk ?? false,
            'ci4_routes_ok' => $cliRoutesOk ?? false,
            'ci4_boot_ok' => $ci4BootOk ?? false,
            'env_exists' => $envExists ?? false,
            'public_index_exists' => $publicIndexExists ?? false,
            'vendor_autoload_exists' => $vendorAutoloadExists ?? false,
            'actions_taken' => $actionsTaken,
            'actions_not_taken' => $actionsNotTaken,
            'manual_restart_commands' => $manualRestartCommands,
            'recommendations' => $recommendations,
            'env_snapshot_path' => $envSnapshot,
            'app_log_tail' => $appLogTail,
        ];

        $summary = $this->buildSummary($reportData);
        $report = array_merge([
            'command' => $this->name,
            'timestamp' => $this->reportTimestamp,
            'artifact_dir' => $this->artifactDir,
            'log_path' => $this->logPath,
            'summary_path' => $this->summaryPath,
        ], $reportData);

        if (! ArtifactHelper::writeArtifacts($this->artifactDir, $summary, $report)) {
            return EXIT_ERROR;
        }

        $this->logStep('SUMMARY', 'OK', 'Wrote summary: ' . $this->summaryPath);

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
            'PHP backend socket mismatch' => 0.90,
            'Writable permissions misconfigured' => 0.80,
            'CI4 bootstrap failure' => 0.75,
            'PHP backend not running' => 0.70,
            'No php handler detected — you must restart the PHP handler (hosting specific)' => 0.85,
            default => 0.40,
        };
    }

    protected function isDestructive(): bool
    {
        return true;
    }

    private function initializeLog(): void
    {
        ArtifactHelper::ensureArtifactDir($this->artifactDir);

        $this->logPath = rtrim($this->artifactDir, '/') . '/fix-503.log';
        $this->summaryPath = rtrim($this->artifactDir, '/') . '/summary.md';

        ArtifactHelper::safeWrite($this->logPath, '');
    }

    private function logStep(string $step, string $status, string $detail): void
    {
        $detail = TriageSanitizer::sanitizeText($detail);
        $line = sprintf('[%s] [%s] [%s] %s', date('H:i:s'), $step, $status, $detail);
        ArtifactHelper::safeAppend($this->logPath, $line . PHP_EOL);
    }

    private function logOutput(string $step, array $lines): void
    {
        foreach (TriageSanitizer::sanitizeLines($lines) as $line) {
            $this->logStep($step, 'INFO', $line);
        }
    }

    private function runPhpBackendStatus(CommandRunner $runner, array $hostingStatus): array
    {
        $phpMode = $hostingStatus['php_mode'] ?? 'unknown';
        $phpWorkers = (int) ($hostingStatus['php_workers'] ?? 0);
        $sockets = $hostingStatus['sockets'] ?? [];

        $healthy = $phpMode !== 'unknown' && ($phpWorkers > 0 || $sockets !== []);

        if (! $healthy) {
            $pgrep = $runner->run('pgrep -af \"php-fpm|php-cgi|cgi-fcgi|lsphp\"');
            $hasProc = ($pgrep['exit_code'] ?? 1) === 0 && ! empty($pgrep['output']);
            if ($hasProc) {
                $healthy = true;
            }
            $this->logOutput('PHP-BACKEND', $pgrep['output'] ?? []);
        }

        $this->logStep('PHP-BACKEND', $healthy ? 'OK' : 'FAIL', sprintf(
            'mode=%s workers=%d sockets=%d',
            $phpMode,
            $phpWorkers,
            is_array($sockets) ? count($sockets) : 0
        ));

        return [
            'healthy' => $healthy,
            'root_cause' => $healthy ? null : 'PHP backend not detected (no php handler process or socket found)',
            'mode' => $phpMode,
            'workers' => $phpWorkers,
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

    private function runSocketCheck(CommandRunner $runner, array $hostingStatus): array
    {
        // Goal: detect mismatch between nginx fastcgi_pass and available sockets (no sudo)
        $webServer = $hostingStatus['web_server'] ?? 'unknown';
        if ($webServer !== 'nginx') {
            $this->logStep('PHP-SOCKET', 'WARN', 'web_server=' . $webServer . ' socket check skipped');
            return [
                'mismatch' => false,
                'expected' => null,
                'detected' => null,
                'snippet_path' => null,
            ];
        }

        $fastcgiTargets = $hostingStatus['fastcgi_targets'] ?? [];
        $detectedSockets = $hostingStatus['sockets'] ?? [];

        $expectedSockets = [];
        foreach ($fastcgiTargets as $target) {
            if (str_starts_with($target, 'unix:')) {
                $expectedSockets[] = str_replace('unix:', '', $target);
            }
        }

        $expectedSockets = array_values(array_unique($expectedSockets));
        $detectedSockets = is_array($detectedSockets) ? $detectedSockets : [];

        $mismatch = false;
        if ($expectedSockets !== []) {
            $matches = array_intersect($expectedSockets, $detectedSockets);
            $mismatch = $matches === [];
        }

        $snippetPath = null;
        $detectedSock = $detectedSockets[0] ?? null;
        $expected = $expectedSockets[0] ?? null;

        $this->logStep('PHP-SOCKET', $mismatch ? 'FAIL' : 'OK', sprintf(
            'expected=%s detected=%s',
            (string) $expected,
            (string) $detectedSock
        ));

        if ($mismatch && $detectedSock) {
            $snippetPath = rtrim($this->artifactDir, '/') . '/snippets/nginx-fastcgi-fix.conf';
            $this->writeNginxFastCgiFixSnippet($snippetPath, $detectedSock);
            $this->logStep('NGINX-FIX-GEN', 'OK', 'Wrote suggested config: ' . $snippetPath);
        }

        return [
            'mismatch' => $mismatch,
            'expected' => $expected,
            'detected' => $detectedSock,
            'snippet_path' => $snippetPath,
        ];
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

        ArtifactHelper::safeWrite($path, $content);
    }

    private function runHostingModeDetection(CommandRunner $runner): array
    {
        $detector = new HostingModeDetector($runner);
        $status = $detector->detect();

        $this->logStep('HOSTING-MODE', $status['overall'] ?? 'WARN', sprintf(
            'web_server=%s php_mode=%s hosting_mode=%s',
            $status['web_server'] ?? 'unknown',
            $status['php_mode'] ?? 'unknown',
            $status['hosting_mode'] ?? 'UNKNOWN'
        ));
        $this->logStep('HOSTING-MODE', 'INFO', 'ports=' . implode(',', $status['ports'] ?? []));
        if (! empty($status['fastcgi_targets'])) {
            $this->logOutput('HOSTING-MODE', $status['fastcgi_targets']);
        }

        return $status;
    }

    private function suggestManualRestartCommands(CommandRunner $runner, array $hostingStatus): array
    {
        $commands = [];

        $systemctl = $runner->run('command -v systemctl');
        if (($systemctl['exit_code'] ?? 1) === 0) {
            $commands[] = 'systemctl restart php-fpm (or php8.2-fpm)';
        }

        $service = $runner->run('command -v service');
        if (($service['exit_code'] ?? 1) === 0) {
            $commands[] = 'service php-fpm restart';
        }

        if (($hostingStatus['php_mode'] ?? '') === 'fpm') {
            $commands[] = 'killall -USR2 php-fpm';
        }

        if (($this->ops->platform ?? '') === 'dreamhost') {
            $commands[] = 'DreamHost panel: Websites > Manage Domains > Toggle PHP version to restart php-cgi';
        }

        if (($hostingStatus['web_server'] ?? '') === 'nginx') {
            $commands[] = 'nginx -t && nginx -s reload (user-space nginx)';
        }

        return array_values(array_unique($commands));
    }

    private function runGitSafetyCheck(CommandRunner $runner): array
    {
        $warnings = [];

        $status = $runner->run('git status --porcelain');
        $this->logStep('GIT-SAFETY', $status['exit_code'] === 0 ? 'OK' : 'WARN', 'git status --porcelain');
        $this->logOutput('GIT-SAFETY', $status['output']);

        $trackedWritable = $runner->run('git ls-files writable');
        if (! empty($trackedWritable['output'])) {
            $warnings[] = 'writable/ has tracked files; do NOT commit and update .gitignore to ignore writable/**';
        }

        return $warnings;
    }

    private function runEnvPresence(): bool
    {
        $envPath = ROOTPATH . '.env';
        $exists = is_file($envPath);
        $this->logStep('ENV-FILE', $exists ? 'OK' : 'FAIL', 'path=' . $envPath);
        return $exists;
    }

    private function runPublicIndexCheck(): bool
    {
        $path = ROOTPATH . 'public/index.php';
        $exists = is_file($path);
        $this->logStep('PUBLIC-INDEX', $exists ? 'OK' : 'FAIL', 'path=' . $path);
        return $exists;
    }

    private function runVendorAutoloadCheck(): bool
    {
        $path = ROOTPATH . 'vendor/autoload.php';
        $exists = is_file($path);
        $this->logStep('VENDOR-AUTOLOAD', $exists ? 'OK' : 'FAIL', 'path=' . $path);
        return $exists;
    }

    private function writeEnvSnapshot(): ?string
    {
        $envPath = ROOTPATH . '.env';
        if (! is_file($envPath)) {
            $this->logStep('ENV-SNAPSHOT', 'WARN', 'env file missing; snapshot skipped');
            return null;
        }

        $lines = file($envPath, FILE_IGNORE_NEW_LINES) ?: [];
        $values = [
            'APP_ENV' => 'unknown',
            'APP_DEBUG' => 'false',
            'OPENAI_API_KEY' => 'MISSING',
            'DISCORD_TOKEN' => 'MISSING',
            'DATABASE_HOST' => 'MISSING',
            'DATABASE_PASSWORD' => 'MISSING',
        ];

        foreach ($lines as $line) {
            $line = trim($line);
            if ($line === '' || str_starts_with($line, '#') || ! str_contains($line, '=')) {
                continue;
            }

            [$key, $value] = explode('=', $line, 2);
            $key = trim($key);
            $value = trim($value);

            if (! array_key_exists($key, $values)) {
                continue;
            }

            if (in_array($key, ['APP_ENV', 'APP_DEBUG'], true)) {
                $values[$key] = $value;
            } else {
                $values[$key] = 'PRESENT';
            }
        }

        $snapshotPath = rtrim($this->artifactDir, '/') . '/env-summary.txt';

        $output = [];
        foreach ($values as $key => $value) {
            $output[] = $key . '=' . $value;
        }

        ArtifactHelper::safeWrite($snapshotPath, implode(PHP_EOL, $output) . PHP_EOL);
        $this->logStep('ENV-SNAPSHOT', 'OK', 'Wrote sanitized env snapshot: ' . $snapshotPath);

        return $snapshotPath;
    }

    /**
     * @return string[]
     */
    private function readAppLogTail(int $lines = 50): array
    {
        $logDir = WRITEPATH . 'logs';
        if (! is_dir($logDir)) {
            $this->logStep('APP-LOG', 'WARN', 'writable/logs not found');
            return [];
        }

        $files = glob($logDir . '/*.log') ?: [];
        if ($files === []) {
            $this->logStep('APP-LOG', 'WARN', 'No log files found');
            return [];
        }

        usort($files, static fn(string $a, string $b): int => filemtime($b) <=> filemtime($a));
        $latest = $files[0];
        $content = file($latest, FILE_IGNORE_NEW_LINES) ?: [];
        $tail = array_slice($content, -1 * $lines);

        $this->logStep('APP-LOG', 'OK', 'tail ' . $lines . ' ' . $latest);

        return TriageSanitizer::sanitizeLines($tail);
    }

    private function buildSummary(array $data): string
    {
        $lines = [
            '# 503 Forensic Report',
            '',
            '## Root Cause + Next Steps',
            '',
            '- **Root Cause:** ' . ($data['root_cause'] ?? 'unknown'),
            '- **Risk Level:** ' . ($data['risk_level'] ?? 'unknown'),
            '',
            '## Hosting Mode Detection',
            '',
            '- **Hosting Mode:** ' . ($data['hosting_mode'] ?? 'UNKNOWN'),
            '- **Web Server:** ' . ($data['web_server'] ?? 'unknown'),
            '- **PHP Mode:** ' . ($data['php_mode'] ?? 'unknown'),
            '- **PHP Workers:** ' . (string) ($data['php_workers'] ?? 0),
            '- **FastCGI Upstream:** ' . ($data['fastcgi_upstream'] ?? 'n/a'),
            '- **Ports Listening:** ' . implode(', ', $data['ports'] ?? []),
            '',
            '## PHP Handler Presence',
            '',
            '- **PHP Backend Healthy:** ' . (($data['php_backend_healthy'] ?? false) ? 'yes' : 'no'),
            '- **Sockets:** ' . implode(', ', $data['sockets'] ?? []),
            '',
            '## CI4 Boot Status',
            '',
            '- **.env exists:** ' . (($data['env_exists'] ?? false) ? 'yes' : 'no'),
            '- **public/index.php exists:** ' . (($data['public_index_exists'] ?? false) ? 'yes' : 'no'),
            '- **vendor/autoload.php exists:** ' . (($data['vendor_autoload_exists'] ?? false) ? 'yes' : 'no'),
            '- **php spark env:** ' . (($data['ci4_env_ok'] ?? false) ? 'ok' : 'fail'),
            '- **php spark routes:** ' . (($data['ci4_routes_ok'] ?? false) ? 'ok' : 'fail'),
            '- **CI4 boot status:** ' . (($data['ci4_boot_ok'] ?? false) ? 'ok' : 'fail'),
            '',
            '## Actions',
            '',
            '### Taken',
        ];

        foreach ($data['actions_taken'] ?? [] as $action) {
            $lines[] = '- ' . $action;
        }
        if (($data['actions_taken'] ?? []) === []) {
            $lines[] = '- None';
        }

        $lines[] = '';
        $lines[] = '### Not Taken';
        foreach ($data['actions_not_taken'] ?? [] as $action) {
            $lines[] = '- ' . $action;
        }

        $lines[] = '';
        $lines[] = '## Manual Restart Commands';
        if (($data['manual_restart_commands'] ?? []) === []) {
            $lines[] = '- None';
        } else {
            foreach ($data['manual_restart_commands'] as $command) {
                $lines[] = '- ' . $command;
            }
        }

        $lines[] = '';
        $lines[] = '## Recommendations';
        foreach ($data['recommendations'] ?? [] as $recommendation) {
            $lines[] = '- ' . $recommendation;
        }

        if (! empty($data['env_snapshot_path'])) {
            $lines[] = '';
            $lines[] = '## Sanitized Env Snapshot';
            $lines[] = '- ' . $data['env_snapshot_path'];
        }

        $lines[] = '';
        $lines[] = '## App Log Tail (last 50 lines)';
        $lines[] = '```';
        foreach ($data['app_log_tail'] ?? [] as $line) {
            $lines[] = $line;
        }
        $lines[] = '```';

        $content = implode(PHP_EOL, TriageSanitizer::sanitizeLines($lines));

        return $content . PHP_EOL;
    }

    private function runCliEnv(CommandRunner $runner, bool $afterFix = false): bool
    {
        $result = $runner->run('php spark env');
        $status = $result['exit_code'] === 0 ? 'OK' : 'FAIL';
        $detail = $afterFix ? 'php spark env (post-fix)' : 'php spark env';

        $this->logStep('CI4-ENV', $status, $detail);
        $this->logOutput('CI4-ENV', $result['output']);

        return $result['exit_code'] === 0;
    }

    private function runCliRoutes(CommandRunner $runner, bool $afterFix = false): bool
    {
        $result = $runner->run('php spark routes');
        $status = $result['exit_code'] === 0 ? 'OK' : 'FAIL';
        $detail = $afterFix ? 'php spark routes (post-fix)' : 'php spark routes';

        $this->logStep('CI4-ROUTES', $status, $detail);
        $this->logOutput('CI4-ROUTES', $result['output']);

        return $result['exit_code'] === 0;
    }

    private function runCacheReset(CommandRunner $runner, bool $autoFixAllowed): void
    {
        $paths = [
            WRITEPATH . 'cache/*',
            WRITEPATH . 'debugbar/*',
            WRITEPATH . 'session/*',
        ];

        foreach ($paths as $path) {
            if (! str_starts_with($path, WRITEPATH)) {
                $this->logStep('CACHE-RESET', 'WARN', 'Skipped unsafe path: ' . $path);
                continue;
            }
            if (! $autoFixAllowed) {
                $this->logStep('CACHE-RESET', 'SKIP', 'dry_run or auto-fix disabled: ' . $path);
                continue;
            }
            $result = $runner->run('rm -rf ' . $path);
            $status = $result['exit_code'] === 0 ? 'OK' : 'FAIL';
            $this->logStep('CACHE-RESET', $status, 'rm -rf ' . $path);
            $this->logOutput('CACHE-RESET', $result['output']);
        }
    }

    private function runComposerAutoload(CommandRunner $runner, bool $autoFixAllowed): void
    {
        if (! $autoFixAllowed) {
            $this->logStep('AUTOLOAD', 'SKIP', 'dry_run or auto-fix disabled');
            return;
        }

        $available = $runner->run('command -v composer');
        if (($available['exit_code'] ?? 1) !== 0) {
            $this->logStep('AUTOLOAD', 'SKIP', 'composer not available');
            return;
        }

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

        CLI::write('Artifacts:');
        CLI::write('Log: ' . $this->logPath);
        CLI::write('Summary: ' . $this->summaryPath);
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
