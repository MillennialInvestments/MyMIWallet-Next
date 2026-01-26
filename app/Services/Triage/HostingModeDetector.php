<?php

namespace App\Services\Triage;

use Config\Ops;
use PharData;

class HostingModeDetector
{
    private CommandRunner $runner;
    private string $snapshotDir;
    private Ops $ops;

    public function __construct(?CommandRunner $runner = null, ?string $snapshotDir = null)
    {
        $this->runner = $runner ?? new CommandRunner();
        $this->snapshotDir = $snapshotDir ?? WRITEPATH . 'triage/server-snapshots';
        $this->ops = config(Ops::class);
    }

    /**
     * @return array<string, mixed>
     */
    public function detect(): array
    {
        $psLines = $this->loadSnapshotLines('ps-aux.txt', 'ps aux');
        $pgrepLines = $this->loadPgrepLines();
        $processLines = $pgrepLines !== [] ? array_merge($pgrepLines, $psLines) : $psLines;

        $ssLines = $this->loadSnapshotLines('ss-ltnp.txt', 'ss -ltnp');

        $webServer = $this->detectWebServer($processLines);
        $ports = $this->detectListeningPorts($ssLines);
        $phpMode = $this->detectPhpMode($processLines, $webServer);
        $phpWorkers = $this->countPhpWorkers($processLines, $phpMode);
        $fastcgiTargets = $this->discoverFastCgiTargets();
        $socketPaths = $this->discoverSockets($fastcgiTargets);

        $hostingMode = $this->resolveHostingMode($webServer, $phpMode, $processLines);
        $overall = $this->determineOverall($webServer, $phpMode, $ports);

        return [
            'web_server' => $webServer,
            'php_mode' => $phpMode,
            'php_workers' => $phpWorkers,
            'fastcgi_upstream' => $fastcgiTargets[0] ?? null,
            'fastcgi_targets' => $fastcgiTargets,
            'sockets' => $socketPaths,
            'ports' => $ports,
            'hosting_mode' => $hostingMode,
            'overall' => $overall,
        ];
    }

    /**
     * @return string[]
     */
    private function loadSnapshotLines(string $fileName, string $fallbackCommand): array
    {
        $path = rtrim($this->snapshotDir, '/') . '/' . $fileName;
        if (is_file($path)) {
            $lines = file($path, FILE_IGNORE_NEW_LINES);
            return $lines ?: [];
        }

        $result = $this->runner->run($fallbackCommand);
        return $result['output'] ?? [];
    }

    /**
     * @return string[]
     */
    private function loadPgrepLines(): array
    {
        $result = $this->runner->run('pgrep -af \"nginx|apache2|httpd|litespeed|openlitespeed|php-fpm|php8.2-fpm|php82-fpm|ea-php82-php-fpm|lsphp|php-cgi|cgi-fcgi\"');
        return $result['output'] ?? [];
    }

    /**
     * @param string[] $psLines
     */
    private function detectWebServer(array $psLines): string
    {
        $haystack = implode("\n", $psLines);
        if ($this->contains($haystack, ['nginx'])) {
            return 'nginx';
        }
        if ($this->contains($haystack, ['apache2', 'httpd'])) {
            return 'apache';
        }
        if ($this->contains($haystack, ['litespeed', 'openlitespeed'])) {
            return 'litespeed';
        }

        return 'unknown';
    }

    /**
     * @param string[] $psLines
     */
    private function detectPhpMode(array $psLines, string $webServer): string
    {
        $haystack = implode("\n", $psLines);

        if ($this->contains($haystack, ['php-fpm', 'php8.2-fpm', 'php82-fpm', 'ea-php82-php-fpm', 'lsphp'])) {
            return 'fpm';
        }

        if ($this->contains($haystack, ['php-cgi', 'cgi-fcgi'])) {
            return 'cgi';
        }

        if ($webServer === 'apache') {
            return 'mod_php';
        }

        return 'unknown';
    }

    /**
     * @param string[] $psLines
     */
    private function countPhpWorkers(array $psLines, string $phpMode): int
    {
        $count = 0;

        foreach ($psLines as $line) {
            $line = strtolower($line);
            if ($phpMode === 'fpm' && str_contains($line, 'php-fpm')) {
                $count++;
                continue;
            }
            if ($phpMode === 'cgi' && (str_contains($line, 'php-cgi') || str_contains($line, 'cgi-fcgi'))) {
                $count++;
            }
        }

        return $count;
    }

    /**
     * @param string[] $ssLines
     * @return int[]
     */
    private function detectListeningPorts(array $ssLines): array
    {
        $ports = [];

        foreach ($ssLines as $line) {
            if (! preg_match_all('/:(80|443|8080|8443)\b/', $line, $matches)) {
                continue;
            }

            foreach ($matches[1] as $port) {
                $ports[] = (int) $port;
            }
        }

        $ports = array_values(array_unique($ports));
        sort($ports);

        return $ports;
    }

    /**
     * @return string[]
     */
    private function discoverFastCgiTargets(): array
    {
        $targets = [];

        foreach ($this->readFastCgiFromArchive() as $target) {
            $targets[] = $target;
        }

        foreach ($this->readFastCgiFromUserPaths() as $target) {
            $targets[] = $target;
        }

        return array_values(array_unique($targets));
    }

    /**
     * @return string[]
     */
    private function readFastCgiFromArchive(): array
    {
        $targets = [];
        $tgzPath = rtrim($this->snapshotDir, '/') . '/home-nginx.tgz';
        if (! is_file($tgzPath)) {
            return $targets;
        }

        try {
            $tarPath = preg_replace('/\.tgz$/', '.tar', $tgzPath);
            if ($tarPath && ! is_file($tarPath)) {
                $phar = new PharData($tgzPath);
                $phar->decompress();
            }

            if (! $tarPath || ! is_file($tarPath)) {
                return $targets;
            }

            $tar = new PharData($tarPath);
            foreach (new \RecursiveIteratorIterator($tar) as $file) {
                if (! $file->isFile()) {
                    continue;
                }

                $content = $file->getContent();
                if ($content === '') {
                    continue;
                }

                foreach ($this->extractFastCgiTargets([$content]) as $target) {
                    $targets[] = $target;
                }
            }
        } catch (\Throwable $e) {
            return $targets;
        }

        return $targets;
    }

    /**
     * @return string[]
     */
    private function readFastCgiFromUserPaths(): array
    {
        $home = rtrim(getenv('HOME') ?: '/home/' . get_current_user(), '/');
        $paths = [
            $home . '/nginx',
            $home . '/conf',
            $home . '/site',
            $this->ops->homeNginxPrefix ?? '',
        ];

        $targets = [];
        foreach ($paths as $path) {
            if ($path === '' || ! is_dir($path)) {
                continue;
            }

            $result = $this->runner->run('rg --no-heading --line-number "fastcgi_pass" ' . escapeshellarg($path) . ' 2>/dev/null | head -n 50');
            if (($result['exit_code'] ?? 1) !== 0 && empty($result['output'])) {
                continue;
            }

            $targets = array_merge($targets, $this->extractFastCgiTargets($result['output']));
        }

        return array_values(array_unique($targets));
    }

    /**
     * @param string[] $lines
     * @return string[]
     */
    private function extractFastCgiTargets(array $lines): array
    {
        $targets = [];

        foreach ($lines as $line) {
            if (preg_match('/fastcgi_pass\s+([^;]+);/i', $line, $matches)) {
                $targets[] = trim($matches[1]);
            }
        }

        return $targets;
    }

    /**
     * @param string[] $fastcgiTargets
     * @return string[]
     */
    private function discoverSockets(array $fastcgiTargets): array
    {
        $sockets = [];
        foreach ($fastcgiTargets as $target) {
            if (str_starts_with($target, 'unix:')) {
                $sockets[] = str_replace('unix:', '', $target);
            }
        }

        foreach (['/run/php/*.sock', '/var/run/php/*.sock'] as $globPattern) {
            $matches = glob($globPattern) ?: [];
            foreach ($matches as $match) {
                $sockets[] = $match;
            }
        }

        $sockets = array_values(array_unique($sockets));
        sort($sockets);

        return $sockets;
    }

    private function resolveHostingMode(string $webServer, string $phpMode, array $psLines): string
    {
        if ($webServer === 'nginx' && $phpMode === 'fpm') {
            return 'NGINX+PHP-FPM';
        }

        if ($webServer === 'nginx' && $phpMode === 'cgi') {
            return 'NGINX+PHP-CGI';
        }

        if ($webServer === 'apache' && $phpMode === 'mod_php') {
            return 'APACHE+MOD_PHP';
        }

        $haystack = implode("\n", $psLines);
        if ($webServer === 'litespeed' && $this->contains($haystack, ['lsphp'])) {
            return 'LITESPEED+LSPHP';
        }

        return 'UNKNOWN';
    }

    private function determineOverall(string $webServer, string $phpMode, array $ports): string
    {
        if ($webServer === 'unknown') {
            return 'FAIL';
        }

        if ($phpMode === 'unknown') {
            return 'WARN';
        }

        if ($ports === []) {
            return 'WARN';
        }

        return 'PASS';
    }

    /**
     * @param string $haystack
     * @param string[] $needles
     */
    private function contains(string $haystack, array $needles): bool
    {
        foreach ($needles as $needle) {
            if (str_contains(strtolower($haystack), strtolower($needle))) {
                return true;
            }
        }

        return false;
    }
}
