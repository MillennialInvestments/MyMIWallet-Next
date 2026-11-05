<?php

declare(strict_types=1);

namespace App\Commands\AIOps;

use CodeIgniter\CLI\BaseCommand;
use CodeIgniter\CLI\CLI;
use RuntimeException;
use Throwable;
use ZipArchive;

/**
 * Fail-closed ZIP intake: output is always a fresh private directory in /tmp.
 * Never extracts into a repository, production root, or existing destination.
 */
final class Unzip extends BaseCommand
{
    protected $group = 'AIOps';
    protected $name = 'aiops:unzip';
    protected $description = 'Validate a ZIP archive and extract it into a new private temporary directory.';
    protected $usage = 'aiops:unzip <archive.zip> [--list] [--sha256=<64-character-hash>]';
    protected $arguments = ['archive.zip' => 'ZIP archive path, typically /tmp/name.zip.'];
    protected $options = [
        '--list' => 'Validate and list contents without extracting.',
        '--sha256' => 'Optional SHA-256 verification before extraction.',
    ];

    private const MAX_ARCHIVE_BYTES = 52428800;
    private const MAX_EXTRACTED_BYTES = 67108864;
    private const MAX_FILES = 500;
    private const MAX_RATIO = 400;

    public function run(array $params): int
    {
        try {
            $source = trim((string) ($params[0] ?? ''));
            if ($source === '') {
                throw new RuntimeException('archive_path_required');
            }
            $expected = CLI::getOption('sha256');
            if ($expected !== null && ! is_string($expected)) {
                throw new RuntimeException('sha256_invalid');
            }
            $listed = CLI::getOption('list') !== null;
            $result = $this->processArchive($source, $listed, $expected);
            CLI::write('===== TBI AIOPS SAFE UNZIP =====');
            CLI::write('STATUS: PASS');
            CLI::write('MODE: ' . ($listed ? 'list_only' : 'extract_to_private_tmp'));
            CLI::write('ARCHIVE_SHA256: ' . $result['sha256']);
            CLI::write('ENTRY_COUNT: ' . $result['entries']);
            CLI::write('TOTAL_UNCOMPRESSED_BYTES: ' . $result['bytes']);
            CLI::write('EXTRACTED_DIR: ' . ($result['directory'] ?? '(not extracted)'));
            foreach ($result['names'] as $name) {
                CLI::write('FILE: ' . $name);
            }
            CLI::write('REPOSITORY_MUTATED: false');
            CLI::write('PRODUCTION_MUTATED: false');
            CLI::write('EXTRACTED_CODE_EXECUTED: false');
            return EXIT_SUCCESS;
        } catch (Throwable $e) {
            CLI::error('STATUS: BLOCKED');
            CLI::error('REASON: ' . $e->getMessage());
            return EXIT_ERROR;
        }
    }

    /**
     * @return array{sha256:string,entries:int,bytes:int,names:list<string>,directory?:string}
     */
    public function processArchive(string $source, bool $listOnly = false, ?string $expectedSha = null): array
    {
        if (! class_exists(ZipArchive::class)) {
            throw new RuntimeException('php_zip_extension_missing');
        }
        $path = realpath($source);
        if ($path === false || ! is_file($path) || ! is_readable($path) || is_link($source)) {
            throw new RuntimeException('archive_not_regular_readable_file');
        }
        if (strtolower(pathinfo($path, PATHINFO_EXTENSION)) !== 'zip') {
            throw new RuntimeException('zip_extension_required');
        }
        $size = filesize($path);
        if ($size === false || $size < 1 || $size > self::MAX_ARCHIVE_BYTES) {
            throw new RuntimeException('archive_size_out_of_bounds');
        }
        $sha = hash_file('sha256', $path);
        if (! is_string($sha)) {
            throw new RuntimeException('archive_hash_unavailable');
        }
        if ($expectedSha !== null) {
            $expectedSha = strtolower(trim($expectedSha));
            if (preg_match('/^[a-f0-9]{64}$/', $expectedSha) !== 1 || ! hash_equals($expectedSha, $sha)) {
                throw new RuntimeException('archive_sha256_mismatch');
            }
        }

        $zip = new ZipArchive();
        if ($zip->open($path, ZipArchive::RDONLY) !== true) {
            throw new RuntimeException('archive_open_failed');
        }
        try {
            $count = $zip->numFiles;
            if ($count < 1 || $count > self::MAX_FILES) {
                throw new RuntimeException('archive_entry_count_out_of_bounds');
            }
            $entries = [];
            $names = [];
            $total = 0;
            $seen = [];
            for ($i = 0; $i < $count; $i++) {
                $stat = $zip->statIndex($i);
                if (! is_array($stat) || ! is_string($stat['name'] ?? null)) {
                    throw new RuntimeException('archive_entry_metadata_invalid');
                }
                $name = $stat['name'];
                $directory = str_ends_with($name, '/');
                $safe = self::safeEntryName($name);
                $key = strtolower($safe);
                if (isset($seen[$key])) {
                    throw new RuntimeException('archive_case_colliding_entry');
                }
                $seen[$key] = true;
                $os = 0;
                $attributes = 0;
                if (! $zip->getExternalAttributesIndex($i, $os, $attributes)) {
                    throw new RuntimeException('archive_entry_attributes_unavailable');
                }
                if ($os === ZipArchive::OPSYS_UNIX) {
                    $mode = ($attributes >> 16) & 0xf000;
                    if ($mode !== 0 && $mode !== ($directory ? 0x4000 : 0x8000)) {
                        throw new RuntimeException('archive_symlink_or_special_file_rejected');
                    }
                }
                if ((int) ($stat['encryption_method'] ?? 0) !== 0) {
                    throw new RuntimeException('encrypted_archive_rejected');
                }
                $bytes = (int) ($stat['size'] ?? -1);
                $compressed = (int) ($stat['comp_size'] ?? -1);
                if ($bytes < 0 || $compressed < 0 || ($directory && $bytes !== 0)) {
                    throw new RuntimeException('archive_size_metadata_invalid');
                }
                if (! $directory) {
                    $total += $bytes;
                    if ($total > self::MAX_EXTRACTED_BYTES || ($bytes > 0 && ($compressed < 1 || $bytes > self::MAX_RATIO * $compressed))) {
                        throw new RuntimeException('archive_expansion_limit_exceeded');
                    }
                }
                $entries[] = [$name, $safe, $directory, $bytes, (int) ($stat['crc'] ?? -1)];
                $names[] = $safe . ($directory ? '/' : '');
            }
            $out = ['sha256' => $sha, 'entries' => $count, 'bytes' => $total, 'names' => $names];
            if ($listOnly) {
                return $out;
            }
            $temp = realpath(sys_get_temp_dir());
            if ($temp === false || ! is_dir($temp)) {
                throw new RuntimeException('temporary_root_unavailable');
            }
            $dest = $temp . '/tbi-aiops-unzip-' . gmdate('Ymd-His') . '-' . bin2hex(random_bytes(6));
            if (! mkdir($dest, 0700) || ! is_dir($dest) || is_link($dest)) {
                throw new RuntimeException('private_destination_creation_failed');
            }
            foreach ($entries as [$name, $safe, $directory, $bytes, $crc]) {
                $target = $dest . '/' . $safe;
                $parent = $directory ? $target : dirname($target);
                if (! is_dir($parent) && ! mkdir($parent, 0700, true) && ! is_dir($parent)) {
                    throw new RuntimeException('entry_directory_creation_failed');
                }
                if ($directory) {
                    continue;
                }
                if (file_exists($target) || is_link($target)) {
                    throw new RuntimeException('entry_target_exists');
                }
                $input = $zip->getStream($name);
                if (! is_resource($input)) {
                    throw new RuntimeException('entry_stream_unreadable');
                }
                $output = fopen($target, 'xb');
                if ($output === false) {
                    fclose($input);
                    throw new RuntimeException('entry_target_unwritable');
                }
                $written = 0;
                $hash = hash_init('crc32b');
                try {
                    while (! feof($input)) {
                        $chunk = fread($input, 65536);
                        if ($chunk === false || ($chunk === '' && ! feof($input))) {
                            throw new RuntimeException('entry_read_failed');
                        }
                        $written += strlen($chunk);
                        if ($written > $bytes) {
                            throw new RuntimeException('entry_length_mismatch');
                        }
                        hash_update($hash, $chunk);
                        $length = strlen($chunk);
                        for ($offset = 0; $offset < $length;) {
                            $n = fwrite($output, substr($chunk, $offset));
                            if ($n === false || $n === 0) {
                                throw new RuntimeException('entry_write_failed');
                            }
                            $offset += $n;
                        }
                    }
                } finally {
                    fclose($input);
                    fclose($output);
                }
                if ($written !== $bytes || ($crc >= 0 && strtolower(sprintf('%08x', $crc)) !== hash_final($hash))) {
                    throw new RuntimeException('entry_integrity_failed');
                }
                chmod($target, 0600);
            }
            $out['directory'] = $dest;
            return $out;
        } finally {
            $zip->close();
        }
    }

    /** Reject traversal, absolute paths, Windows paths, empty segments and controls. */
    public static function safeEntryName(string $name): string
    {
        if ($name === '' || strlen($name) > 1024 || str_starts_with($name, '/')
            || str_contains($name, '\\') || preg_match('/[\x00-\x1f\x7f]/', $name) === 1
            || preg_match('/^[a-z]:/i', $name) === 1) {
            throw new RuntimeException('archive_entry_path_rejected');
        }
        $name = rtrim($name, '/');
        $segments = explode('/', $name);
        foreach ($segments as $segment) {
            if ($segment === '' || $segment === '.' || $segment === '..' || str_contains($segment, ':')) {
                throw new RuntimeException('archive_entry_path_rejected');
            }
        }
        return implode('/', $segments);
    }
}
