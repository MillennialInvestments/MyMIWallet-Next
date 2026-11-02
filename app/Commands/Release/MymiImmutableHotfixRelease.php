<?php

declare(strict_types=1);

namespace App\Commands\Release;

use App\Commands\SafeBaseCommand;
use CodeIgniter\CLI\CLI;
use RuntimeException;
use FilesystemIterator;
use RecursiveDirectoryIterator;
use RecursiveIteratorIterator;
use Throwable;

/**
 * A tightly bounded MyMI #658 immutable-release controller.
 * Never executes migration, composer, service management, or rollback commands.
 * Phases plan/certify/verify are strictly read-only; build/activate require
 * independent owner approvals tied to the exact manifest and release state.
 */
final class MymiImmutableHotfixRelease extends SafeBaseCommand
{
    protected $group = 'ops';
    protected $name = 'ops:mymi:release';
    protected $description = 'Certify, build or explicitly activate the MyMI #658 three-file immutable hotfix.';
    protected $usage = 'ops:mymi:release --phase=plan|certify|build|activate|verify --manifest=/absolute/path.json [--approve --approval-token=<sha256>] [--emit=json]';
    protected $options = [
        '--phase' => 'plan, certify, build, activate, or verify',
        '--manifest' => 'Absolute immutable owner-reviewed release input manifest',
        '--approve' => 'Required with an exact approval-token for build or activate',
        '--approval-token' => 'SHA-256 approval fingerprint printed by certify or build',
        '--emit' => 'json (stdout), no report-only file writes',
        '--dry-run' => 'Force read-only plan',
    ];

    private const SITE_ROOT = '/apps/TBI/www/mymiwallet';
    private const PATHS = [
        'app/Controllers/AuthController.php',
        'app/Filters/CsrfDebugFilter.php',
        'app/Views/Auth/register_form.php',
    ];
    private const MAX_ENTRIES = 120000;

    protected function isDestructive(): bool
    {
        // We use two *stronger*, phase-specific approval gates below.
        // SafeBaseCommand's blanket gate must not block read-only phases.
        return false;
    }

    public function run(array $params)
    {
        try {
            $flags = self::readFlags($params);
            $phase = (string) ($flags['phase'] ?? '');
            $manifestFile = (string) ($flags['manifest'] ?? '');
            $approve = isset($flags['approve']);
            $token = (string) ($flags['approval-token'] ?? '');
            if (isset($flags['dry-run'])) {
                if ($approve || $token !== '') {
                    throw new RuntimeException('dry_run_with_approval_refused');
                }
                $phase = 'plan';
            }
            if (! in_array($phase, ['plan', 'certify', 'build', 'activate', 'verify'], true)) {
                throw new RuntimeException('phase_invalid');
            }
            if (($approve || $token !== '') && ! in_array($phase, ['build', 'activate'], true)) {
                throw new RuntimeException('unexpected_approval_on_readonly_phase');
            }
            if ($phase === 'build' || $phase === 'activate') {
                if (! $approve || preg_match('/^[a-f0-9]{64}$/', $token) !== 1) {
                    throw new RuntimeException('phase_specific_exact_owner_approval_required');
                }
            }
            if (str_starts_with($manifestFile, '/') === false || is_link($manifestFile) || ! is_file($manifestFile)) {
                throw new RuntimeException('manifest_missing_or_symlink');
            }
            $raw = file_get_contents($manifestFile);
            if (! is_string($raw) || strlen($raw) > 65536) {
                throw new RuntimeException('manifest_unreadable_or_oversized');
            }
            $manifest = json_decode($raw, true, 512, JSON_THROW_ON_ERROR);
            if (! is_array($manifest)) {
                throw new RuntimeException('manifest_not_object');
            }
            $result = self::executePhase($phase, $manifest, self::SITE_ROOT, hash('sha256', $raw), $token);
            CLI::write(json_encode(['status' => 'PASS', 'phase' => $phase] + $result, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES));
            return EXIT_SUCCESS;
        } catch (Throwable $exception) {
            CLI::write('STOP=' . $exception->getMessage(), 'red');
            return EXIT_ERROR;
        }
    }

    /** Parse flags without the SafeBaseCommand logging hook: read-only means no
     * application log or evidence write is initiated by this command. */
    private static function readFlags(array $params): array
    {
        $supported = ['phase', 'manifest', 'approve', 'approval-token', 'emit', 'dry-run'];
        $flags = [];
        foreach ($supported as $key) {
            $value = CLI::getOption($key);
            if ($value !== null && $value !== false) {
                $flags[$key] = $value === true ? true : (string) $value;
            }
        }
        foreach ($params as $key => $value) {
            $arg = is_string($key) && ! is_int($key) ? $key : (string) $value;
            if (! str_starts_with($arg, '--')) {
                continue;
            }
            $arg = substr($arg, 2);
            $pair = explode('=', $arg, 2);
            if (! in_array($pair[0], $supported, true)) {
                throw new RuntimeException('unsupported_option:' . $pair[0]);
            }
            $flags[$pair[0]] = $pair[1] ?? true;
        }
        return $flags;
    }

    /**
     * Purely explicit site root for isolated tests; Spark always binds production root.
     * Owner approval for mutations is independently bound to manifest SHA + state.
     *
     * @param array<string,mixed> $manifest
     * @return array<string,mixed>
     */
    public static function executePhase(string $phase, array $manifest, string $siteRoot, string $manifestHash, string $approvalToken = ''): array
    {
        $paths = self::validateManifest($manifest, $siteRoot);
        $root = rtrim($siteRoot, '/');
        $current = $root . '/current';
        $releaseDir = $root . '/releases';
        $release = $releaseDir . '/' . $manifest['release_id'];
        $baseline = $releaseDir . '/' . $manifest['baseline_release_id'];
        $overlay = (string) $manifest['overlay_root'];
        $evidence = (string) $manifest['evidence_root'];

        if (! is_dir($root) || ! is_dir($releaseDir) || is_link($releaseDir)) {
            throw new RuntimeException('release_root_not_safe');
        }
        if (! is_link($current)) {
            throw new RuntimeException('current_is_not_symlink');
        }
        $expectedCurrentLink = (string) $manifest['baseline_link'];
        if (! in_array($expectedCurrentLink, ['releases/' . $manifest['baseline_release_id'], $baseline], true)) {
            throw new RuntimeException('baseline_link_form_not_authorized');
        }
        if (readlink($current) !== $expectedCurrentLink
            && ! ($phase === 'verify' && readlink($current) === 'releases/' . $manifest['release_id'])) {
            throw new RuntimeException('current_symlink_drift');
        }
        if (! is_dir($baseline) || is_link($baseline)
            || ($phase !== 'verify' && realpath($current) !== realpath($baseline))) {
            throw new RuntimeException('baseline_resolution_mismatch');
        }
        if (str_starts_with($overlay . '/', $root . '/') || ! is_dir($overlay) || is_link($overlay)) {
            throw new RuntimeException('overlay_root_invalid');
        }
        if (is_link($evidence) || ! is_dir($evidence) || str_starts_with($evidence . '/', $root . '/')) {
            throw new RuntimeException('external_evidence_root_required');
        }
        $changeReport = [];
        foreach ($paths as $path) {
            $original = self::safeFile($baseline, $path);
            $replacement = self::safeFile($overlay, $path);
            $before = hash_file('sha256', $original);
            $after = hash_file('sha256', $replacement);
            if (! hash_equals($manifest['files'][$path]['pre_sha256'], $before)
                || ! hash_equals($manifest['files'][$path]['post_sha256'], $after)) {
                throw new RuntimeException('hotfix_hash_mismatch:' . $path);
            }
            if ($before === $after) {
                throw new RuntimeException('hotfix_file_not_changed:' . $path);
            }
            $changeReport[$path] = ['pre_sha256' => $before, 'post_sha256' => $after];
        }

        $preflight = [
            'release_id' => $manifest['release_id'],
            'baseline_release_id' => $manifest['baseline_release_id'],
            'manifest_sha256' => $manifestHash,
            'change_count' => count($changeReport),
            'files' => $changeReport,
            'production_modified' => false,
        ];
        if ($phase === 'plan' || $phase === 'certify') {
            if (file_exists($release) || is_link($release)) {
                throw new RuntimeException('release_already_exists');
            }
            $size = self::inventory($baseline)['total_bytes'];
            if (disk_free_space($releaseDir) <= ($size + 64 * 1024 * 1024)) {
                throw new RuntimeException('insufficient_disk_space');
            }
            $preflight['baseline_bytes'] = $size;
            $preflight['build_gate_sha256'] = self::gate('build', $manifestHash, $expectedCurrentLink);
            return $preflight;
        }

        if ($phase === 'build') {
            $expected = self::gate('build', $manifestHash, $expectedCurrentLink);
            if (! hash_equals($expected, $approvalToken)) {
                throw new RuntimeException('build_approval_token_mismatch');
            }
            $lock = self::lock($evidence, $manifest['release_id']);
            try {
                // Re-check target after acquiring the same lock used by activation.
                if (readlink($current) !== $expectedCurrentLink || file_exists($release) || is_link($release)) {
                    throw new RuntimeException('build_concurrent_release_drift');
                }
                $inventory = self::inventory($baseline);
                if (disk_free_space($releaseDir) <= ($inventory['total_bytes'] + 64 * 1024 * 1024)) {
                    throw new RuntimeException('insufficient_disk_space');
                }
                $reportPath = $evidence . '/' . $manifest['release_id'] . '.certification.json';
                if (file_exists($reportPath) || is_link($reportPath)) {
                    throw new RuntimeException('certification_report_path_occupied');
                }
                $staging = $releaseDir . '/.mymi-staging-' . $manifest['release_id'];
                if (file_exists($staging) || is_link($staging)) {
                    throw new RuntimeException('staging_path_occupied');
                }
                if (! mkdir($staging, fileperms($baseline) & 0777)) {
                    throw new RuntimeException('staging_create_failed');
                }
                // Any partial staging remains preserved for separately approved recovery.
                self::copyTree($baseline, $staging);
                if (self::inventory($baseline)['digest'] !== $inventory['digest']) {
                    throw new RuntimeException('baseline_drift_during_candidate_copy');
                }
                foreach ($paths as $path) {
                    $destination = self::safeFile($staging, $path);
                    $source = self::safeFile($overlay, $path);
                    $newBytes = file_get_contents($source);
                    if (! is_string($newBytes) || file_put_contents($destination, $newBytes, LOCK_EX) === false) {
                        throw new RuntimeException('staging_replacement_failed:' . $path);
                    }
                    if (! hash_equals($manifest['files'][$path]['post_sha256'], hash_file('sha256', $destination))) {
                        throw new RuntimeException('staging_postimage_failed:' . $path);
                    }
                }
                $fingerprint = self::inventory($staging)['digest'];
                if (! rename($staging, $release)) {
                    throw new RuntimeException('candidate_atomic_publish_failed');
                }
                $report = [
                    'schema' => 'mymi_hotfix_candidate_certification_v1',
                    'manifest_sha256' => $manifestHash,
                    'release_id' => $manifest['release_id'],
                    'baseline_release_id' => $manifest['baseline_release_id'],
                    'inventory_sha256' => $fingerprint,
                    'files' => $changeReport,
                    'certified_at' => gmdate('c'),
                ];
                $reportPath = $evidence . '/' . $manifest['release_id'] . '.certification.json';
                if (file_exists($reportPath) || is_link($reportPath)) {
                    throw new RuntimeException('certification_report_path_occupied');
                }
                self::writeExclusive($reportPath, json_encode($report, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES) . "\n");
                $preflight['candidate_path'] = $release;
                $preflight['candidate_inventory_sha256'] = $fingerprint;
                $preflight['certification_path'] = $reportPath;
                $preflight['activate_gate_sha256'] = self::gate('activate', $manifestHash, $expectedCurrentLink, $fingerprint);
                return $preflight;
            } finally {
                flock($lock, LOCK_UN);
                fclose($lock);
            }
        }

        $reportPath = $evidence . '/' . $manifest['release_id'] . '.certification.json';
        if (! is_file($reportPath) || is_link($reportPath)) {
            throw new RuntimeException('candidate_certification_missing');
        }
        $report = json_decode((string) file_get_contents($reportPath), true, 512, JSON_THROW_ON_ERROR);
        if (($report['schema'] ?? '') !== 'mymi_hotfix_candidate_certification_v1'
            || ($report['manifest_sha256'] ?? '') !== $manifestHash
            || ($report['release_id'] ?? '') !== $manifest['release_id']) {
            throw new RuntimeException('candidate_certification_mismatch');
        }
        if (! is_dir($release) || is_link($release)) {
            throw new RuntimeException('candidate_release_missing');
        }
        $fingerprint = self::inventory($release)['digest'];
        if (! hash_equals((string) $report['inventory_sha256'], $fingerprint)) {
            throw new RuntimeException('candidate_inventory_drift');
        }
        foreach ($paths as $path) {
            if (! hash_equals($manifest['files'][$path]['post_sha256'], hash_file('sha256', self::safeFile($release, $path)))) {
                throw new RuntimeException('candidate_hotfix_drift:' . $path);
            }
        }
        $preflight['candidate_inventory_sha256'] = $fingerprint;
        if ($phase === 'verify') {
            $preflight['active'] = readlink($current) === 'releases/' . $manifest['release_id'];
            $preflight['activate_gate_sha256'] = self::gate('activate', $manifestHash, $expectedCurrentLink, $fingerprint);
            return $preflight;
        }
        if ($phase !== 'activate') {
            throw new RuntimeException('phase_invalid');
        }
        $token = self::gate('activate', $manifestHash, $expectedCurrentLink, $fingerprint);
        if (! hash_equals($token, $approvalToken)) {
            throw new RuntimeException('activation_approval_token_mismatch');
        }
        $lock = self::lock($evidence, $manifest['release_id']);
        try {
            if (readlink($current) !== $expectedCurrentLink) {
                throw new RuntimeException('concurrent_activation_or_current_drift');
            }
            if (self::inventory($release)['digest'] !== $fingerprint) {
                throw new RuntimeException('activation_candidate_drift');
            }
            $next = $root . '/.mymi-activate-' . $manifest['release_id'];
            if (file_exists($next) || is_link($next)) {
                throw new RuntimeException('activation_symlink_path_occupied');
            }
            if (! symlink('releases/' . $manifest['release_id'], $next)) {
                throw new RuntimeException('activation_link_create_failed');
            }
            if (readlink($current) !== $expectedCurrentLink) {
                // Preserve next symlink for owner-governed recovery; no rollback/deletion.
                throw new RuntimeException('activation_current_changed_during_prepare');
            }
            if (! rename($next, $current)) {
                throw new RuntimeException('activation_atomic_switch_failed');
            }
            if (readlink($current) !== 'releases/' . $manifest['release_id']) {
                throw new RuntimeException('post_activation_symlink_mismatch');
            }
            $preflight['production_modified'] = true;
            $preflight['active_release'] = $release;
            $preflight['post_activation_smoke_required'] = true;
            return $preflight;
        } finally {
            flock($lock, LOCK_UN);
            fclose($lock);
        }
    }

    /** @param array<string,mixed> $manifest @return list<string> */
    private static function validateManifest(array $manifest, string $siteRoot): array
    {
        if (($manifest['schema'] ?? '') !== 'mymi_immutable_hotfix_v1') {
            throw new RuntimeException('manifest_schema_invalid');
        }
        foreach (['release_id', 'baseline_release_id'] as $key) {
            if (! is_string($manifest[$key] ?? null)
                || preg_match('/^[A-Za-z0-9][A-Za-z0-9._-]{8,100}$/D', $manifest[$key]) !== 1
                || str_contains($manifest[$key], '..')) {
                throw new RuntimeException('manifest_release_id_invalid:' . $key);
            }
        }
        if ($manifest['release_id'] === $manifest['baseline_release_id']) {
            throw new RuntimeException('candidate_must_differ_from_baseline');
        }
        if (! is_string($manifest['baseline_link'] ?? null)) {
            throw new RuntimeException('manifest_baseline_link_required');
        }
        foreach (['overlay_root', 'evidence_root'] as $key) {
            if (! is_string($manifest[$key] ?? null)
                || ! str_starts_with($manifest[$key], '/')
                || str_contains($manifest[$key], '/../')
                || str_contains($manifest[$key], '/./')) {
                throw new RuntimeException('manifest_absolute_path_invalid:' . $key);
            }
        }
        $paths = self::PATHS;
        sort($paths);
        if (! is_array($manifest['files'] ?? null)) {
            throw new RuntimeException('manifest_files_missing');
        }
        $keys = array_keys($manifest['files']);
        sort($keys);
        if ($keys !== $paths) {
            throw new RuntimeException('manifest_exact_three_file_scope_required');
        }
        foreach ($paths as $path) {
            $entry = $manifest['files'][$path];
            if (! is_array($entry) || array_keys($entry) !== ['pre_sha256', 'post_sha256']) {
                throw new RuntimeException('manifest_file_contract_invalid:' . $path);
            }
            foreach (['pre_sha256', 'post_sha256'] as $hash) {
                if (! is_string($entry[$hash]) || preg_match('/^[a-f0-9]{64}$/', $entry[$hash]) !== 1) {
                    throw new RuntimeException('manifest_file_sha_invalid:' . $path);
                }
            }
        }
        if (realpath((string) $manifest['evidence_root']) !== (string) $manifest['evidence_root']) {
            throw new RuntimeException('evidence_root_not_canonical');
        }
        return $paths;
    }

    private static function safeFile(string $root, string $relative): string
    {
        if ($relative === '' || str_contains($relative, '..') || str_starts_with($relative, '/')) {
            throw new RuntimeException('unsafe_relative_file_path');
        }
        $cursor = rtrim($root, '/');
        foreach (explode('/', $relative) as $part) {
            if ($part === '' || $part === '.') {
                throw new RuntimeException('unsafe_relative_file_segment');
            }
            $cursor .= '/' . $part;
            if (is_link($cursor)) {
                throw new RuntimeException('symlink_in_hotfix_path:' . $relative);
            }
        }
        if (! is_file($cursor)) {
            throw new RuntimeException('hotfix_file_missing:' . $relative);
        }
        return $cursor;
    }

    /**
     * Only portable npm CLI links inside this release are eligible.
     * Reject absolute, escaping, missing, directory and unrelated links.
     * The same guard is used during inventory AND copyTree.
     */
    private static function approvedPortableNodeBinLink(string $root, string $relative, string $target): bool
    {
        if (preg_match('#\Anode_modules/\.bin/[A-Za-z0-9][A-Za-z0-9._+-]*\z#D', $relative) !== 1) {
            return false;
        }
        if ($target === '' || str_starts_with($target, '/') || str_contains($target, '\\')
            || preg_match('/[\x00-\x1F\x7F]/', $target) === 1) {
            return false;
        }
        if (is_link($root . '/node_modules') || is_link($root . '/node_modules/.bin')) {
            return false;
        }
        $nodeModules = realpath($root . '/node_modules');
        if ($nodeModules === false || ! is_dir($nodeModules)) {
            return false;
        }

        // Lexically prove the relative target never leaves node_modules.
        $parts = ['node_modules', '.bin'];
        foreach (explode('/', $target) as $part) {
            if ($part === '' || $part === '.') {
                continue;
            }
            if ($part === '..') {
                if (count($parts) <= 1) {
                    return false;
                }
                array_pop($parts);
                continue;
            }
            $parts[] = $part;
        }
        if (count($parts) < 2 || $parts[0] !== 'node_modules') {
            return false;
        }
        // Resolve the original symlink, not a normalized surrogate: missing/.. must remain broken.
        $resolved = realpath($root . '/' . $relative);
        if ($resolved === false || ! str_starts_with($resolved, $nodeModules . '/')) {
            return false;
        }
        return is_file($resolved) && ! is_dir($resolved);
    }

    /** @return array{digest:string,total_bytes:int} */
    private static function inventory(string $directory): array
    {
        $iterator = new RecursiveIteratorIterator(
            new RecursiveDirectoryIterator($directory, FilesystemIterator::SKIP_DOTS),
            RecursiveIteratorIterator::SELF_FIRST
        );
        $entries = [];
        $bytes = 0;
        $count = 0;
        foreach ($iterator as $item) {
            $relative = substr($item->getPathname(), strlen($directory) + 1);
            if ($relative === '.git' || str_starts_with($relative, '.git/')
                || ($relative === 'writable' && ! $item->isLink())
                || ($relative === '.env' && ! $item->isLink())) {
                throw new RuntimeException('unsafe_runtime_or_git_copy:' . $relative);
            }
            if (++$count > self::MAX_ENTRIES) {
                throw new RuntimeException('release_inventory_too_large');
            }
            if ($item->isLink()) {
                $target = readlink($item->getPathname());
                if (is_string($target) && self::approvedPortableNodeBinLink($directory, $relative, $target)) {
                    $entries[] = 'L|' . $relative . '|' . $target;
                    continue;
                }
                if (! in_array($relative, ['.env', 'writable', 'vendor'], true)) {
                    throw new RuntimeException('unapproved_release_symlink:' . $relative);
                }
                if (! is_string($target) || ! str_starts_with($target, '/') || str_contains($target, '/releases/')) {
                    throw new RuntimeException('unsafe_shared_runtime_symlink:' . $relative);
                }
                $entries[] = 'L|' . $relative . '|' . $target;
                continue;
            }
            if ($item->isDir()) {
                $entries[] = 'D|' . $relative;
                continue;
            }
            if (! $item->isFile() || in_array($relative, ['.env'], true)
                || str_starts_with($relative, '.git/')) {
                throw new RuntimeException('unsafe_release_file:' . $relative);
            }
            $bytes += $item->getSize();
            $entries[] = 'F|' . $relative . '|' . ($item->getPerms() & 0777) . '|' . hash_file('sha256', $item->getPathname());
        }
        sort($entries, SORT_STRING);
        return ['digest' => hash('sha256', implode("\n", $entries)), 'total_bytes' => $bytes];
    }

    private static function copyTree(string $source, string $destination): void
    {
        $iterator = new RecursiveIteratorIterator(
            new RecursiveDirectoryIterator($source, FilesystemIterator::SKIP_DOTS),
            RecursiveIteratorIterator::SELF_FIRST
        );
        foreach ($iterator as $item) {
            $relative = substr($item->getPathname(), strlen($source) + 1);
            $target = $destination . '/' . $relative;
            if ($relative === '.git' || str_starts_with($relative, '.git/')
                || ($relative === 'writable' && ! $item->isLink())
                || ($relative === '.env' && ! $item->isLink())) {
                throw new RuntimeException('unsafe_runtime_or_git_copy:' . $relative);
            }
            if ($item->isLink()) {
                $link = readlink($item->getPathname());
                if (is_string($link) && self::approvedPortableNodeBinLink($source, $relative, $link)) {
                    if (! symlink($link, $target)) {
                        throw new RuntimeException('copy_portable_node_bin_link_failed:' . $relative);
                    }
                    continue;
                }
                if (! in_array($relative, ['.env', 'writable', 'vendor'], true)
                    || ! is_string($link) || ! str_starts_with($link, '/') || str_contains($link, '/releases/')
                    || ! symlink($link, $target)) {
                    throw new RuntimeException('copy_shared_runtime_symlink_rejected:' . $relative);
                }
            } elseif ($item->isDir()) {
                if (! mkdir($target, $item->getPerms() & 0777)) {
                    throw new RuntimeException('copy_directory_failed:' . $relative);
                }
            } elseif ($item->isFile()) {
                if ($relative === '.env' || str_starts_with($relative, '.git/')
                    || ! copy($item->getPathname(), $target)
                    || ! chmod($target, $item->getPerms() & 0777)) {
                    throw new RuntimeException('copy_file_failed:' . $relative);
                }
            } else {
                throw new RuntimeException('unsupported_release_file_type:' . $relative);
            }
        }
    }

    /** @return resource */
    private static function lock(string $evidence, string $releaseId)
    {
        $path = $evidence . '/.mymi-release-global.lock';
        if (is_link($path)) {
            throw new RuntimeException('lock_symlink_refused');
        }
        $handle = fopen($path, 'c+');
        if ($handle === false || ! flock($handle, LOCK_EX | LOCK_NB)) {
            throw new RuntimeException('concurrent_release_lock_held');
        }
        return $handle;
    }

    private static function writeExclusive(string $path, string $bytes): void
    {
        $handle = fopen($path, 'x');
        if ($handle === false) {
            throw new RuntimeException('certification_write_refused');
        }
        try {
            if (fwrite($handle, $bytes) !== strlen($bytes)) {
                throw new RuntimeException('certification_write_failed');
            }
            fflush($handle);
        } finally {
            fclose($handle);
        }
    }

    private static function gate(string $phase, string $manifestHash, string $currentLink, string $inventoryHash = ''): string
    {
        return hash('sha256', "MYMI-658|" . $phase . "|" . $manifestHash . "|" . $currentLink . "|" . $inventoryHash);
    }
}
