<?php

declare(strict_types=1);

namespace App\Services\AIOps;

/**
 * GT-FORM-HARNESS-001: decides whether the form harness may send a live request.
 *
 * Default is deny. A live submission needs all of:
 *  - the three explicit operator flags (--submit --allow-destructive --approve)
 *  - a non-production environment
 *  - a target host that is listed in AIOPS_FORM_TEST_ALLOWED_HOSTS
 *  - a target host that is not a production host
 *
 * The allowlist is empty unless an operator sets it, so a fresh checkout can
 * never submit anything.
 */
final class FormSubmissionPolicy
{
    /** Hosts that are never a valid submission target, whatever the allowlist says. */
    public const PRODUCTION_HOSTS = ['mymiwallet.com', 'www.mymiwallet.com'];

    /**
     * @param list<string> $allowedHosts
     *
     * @return array{allowed: bool, reason: string, host: string}
     */
    public static function evaluate(
        bool $submit,
        bool $allowDestructive,
        bool $approve,
        string $environment,
        string $targetUrl,
        array $allowedHosts
    ): array {
        $host = strtolower((string) (parse_url($targetUrl, PHP_URL_HOST) ?? ''));

        if (! $submit || ! $allowDestructive || ! $approve) {
            return ['allowed' => false, 'reason' => 'flags_missing', 'host' => $host];
        }

        if (strtolower(trim($environment)) === 'production') {
            return ['allowed' => false, 'reason' => 'production_environment', 'host' => $host];
        }

        if ($host === '') {
            return ['allowed' => false, 'reason' => 'target_host_unknown', 'host' => $host];
        }

        if (in_array($host, self::PRODUCTION_HOSTS, true)) {
            return ['allowed' => false, 'reason' => 'production_host', 'host' => $host];
        }

        $allowed = array_values(array_filter(array_map(
            static fn ($h) => strtolower(trim((string) $h)),
            $allowedHosts
        ), static fn ($h) => $h !== ''));

        if (! in_array($host, $allowed, true)) {
            return ['allowed' => false, 'reason' => 'host_not_allowlisted', 'host' => $host];
        }

        return ['allowed' => true, 'reason' => 'approved', 'host' => $host];
    }

    /**
     * STAGING-001 destructive-form skip list. Even on an approved staging run
     * the harness never submits to these targets: they move money, send mail or
     * messages to real people, call outside providers, change sign-in
     * credentials, delete data, or start admin jobs. Matched against the
     * action path, case-insensitive. Label => regex.
     */
    public const DESTRUCTIVE_TARGETS = [
        'deletes or unlinks data'      => '~(^|/|-|_)(delete|remove|unlink|destroy|purge|erase|deactivate|close-?account|cancel)~i',
        'signs the user out'           => '~(^|/)logout~i',
        'changes sign-in credentials'  => '~(password|reset|2fa|two-?factor|/security|/auth/|activate)~i',
        'privacy request (erasure)'    => '~privacy~i',
        'moves money or crypto'        => '~(solana|exchange|auction|swap|transfer|mint|token/|purchase|paypal|checkout|payment|deposit|withdraw|redemption|mdit|submitcommit|submitinvest|submitsell|placeorder|predictions|mymigold|memberships/)~i',
        'sends mail or messages'       => '~(email|campaign|massresend|distro|sendall|send-?alert|broadcast|discord|zapier|social|notify|invite)~i',
        'calls an outside provider'    => '~(plaid|snaptrade|robinhood|link-|connect-url|webhook)~i',
        'starts an admin job'          => '~(^|/)(management|api/management)(/|$)|cron|run-?daily|spam|ban|block-user|backfill|generate~i',
    ];

    /** Returns why a target is on the skip list, or null when it may be submitted. */
    public static function destructiveReason(string $action): ?string
    {
        $path = (string) (parse_url($action, PHP_URL_PATH) ?? $action);
        $path = '/' . ltrim(preg_replace('~^/?index\.php~i', '', $path) ?? $path, '/');

        foreach (self::DESTRUCTIVE_TARGETS as $label => $regex) {
            if (preg_match($regex, $path) === 1) {
                return $label;
            }
        }

        return null;
    }

    /** @return list<string> */
    public static function allowedHostsFromEnv(): array
    {
        $raw = (string) (getenv('AIOPS_FORM_TEST_ALLOWED_HOSTS') ?: ($_SERVER['AIOPS_FORM_TEST_ALLOWED_HOSTS'] ?? ''));

        return array_values(array_filter(array_map('trim', explode(',', $raw)), static fn ($h) => $h !== ''));
    }

    /**
     * Report directory for harness output. Never inside the source tree, except
     * WRITEPATH (git-ignored). AIOPS_FORM_REPORT_DIR overrides the default.
     */
    public static function reportDir(?string $override = null): string
    {
        $dir = $override ?: (string) (getenv('AIOPS_FORM_REPORT_DIR') ?: '');
        $dir = $dir !== '' ? rtrim($dir, '/') : rtrim(WRITEPATH, '/') . '/aiops/form-tests';

        if (! self::isAllowedReportDir($dir)) {
            throw new \RuntimeException('Report directory must be outside the source tree (or under WRITEPATH): ' . $dir);
        }

        return $dir;
    }

    public static function isAllowedReportDir(string $dir, ?string $rootPath = null, ?string $writePath = null): bool
    {
        $root  = rtrim(self::normalisePath($rootPath ?? ROOTPATH), '/') . '/';
        $write = rtrim(self::normalisePath($writePath ?? WRITEPATH), '/') . '/';
        $dir   = rtrim(self::normalisePath($dir), '/') . '/';

        if (str_starts_with($dir, $write)) {
            return true;
        }

        return ! str_starts_with($dir, $root);
    }

    private static function normalisePath(string $path): string
    {
        $real = realpath($path);
        if ($real !== false) {
            return $real;
        }

        // Resolve "." and ".." for paths that do not exist yet.
        $parts = [];
        foreach (explode('/', str_replace('\\', '/', $path)) as $part) {
            if ($part === '' || $part === '.') {
                continue;
            }
            if ($part === '..') {
                array_pop($parts);
                continue;
            }
            $parts[] = $part;
        }

        return '/' . implode('/', $parts);
    }
}
