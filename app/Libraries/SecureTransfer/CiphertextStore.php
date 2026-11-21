<?php

namespace App\Libraries\SecureTransfer;

/**
 * Ciphertext files, one per transfer, named by the 32-hex transfer id. The directory
 * is created 0700 and files 0600. Nothing here can be decrypted without a
 * recipient's device key, but the store is still kept outside the web root.
 */
final class CiphertextStore
{
    public function __construct(private string $root)
    {
    }

    private function file(string $transferId): ?string
    {
        if (!preg_match('/^[0-9a-f]{32}$/', $transferId)) {
            return null;
        }
        return rtrim($this->root, '/') . '/' . substr($transferId, 0, 2) . '/' . $transferId . '.mst1';
    }

    public function put(string $transferId, string $sourcePath): bool
    {
        $target = $this->file($transferId);
        if ($target === null || !is_file($sourcePath)) {
            return false;
        }
        $dir = dirname($target);
        if (!is_dir($dir) && !@mkdir($dir, 0700, true) && !is_dir($dir)) {
            return false;
        }
        $tmp = $dir . '/.' . $transferId . '.' . bin2hex(random_bytes(4)) . '.tmp';
        if (!@copy($sourcePath, $tmp)) {
            return false;
        }
        @chmod($tmp, 0600);
        // link() fails if the target exists, so a reused id can never overwrite another file.
        $ok = @link($tmp, $target);
        @unlink($tmp);
        return $ok;
    }

    public function path(string $transferId): ?string
    {
        $file = $this->file($transferId);
        return ($file !== null && is_file($file)) ? $file : null;
    }

    public function delete(string $transferId): void
    {
        $file = $this->file($transferId);
        if ($file !== null && is_file($file)) {
            @unlink($file);
        }
    }
}
