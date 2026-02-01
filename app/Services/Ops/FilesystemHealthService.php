<?php

declare(strict_types=1);

namespace App\Services\Ops;

class FilesystemHealthService
{
    /**
     * @param list<string> $paths
     * @return array{
     *   entries: list<array<string, mixed>>,
     *   warnings: list<string>,
     *   failures: list<string>
     * }
     */
    public function check(array $paths, bool $dryRun): array
    {
        $entries = [];
        $warnings = [];
        $failures = [];

        foreach ($paths as $path) {
            $status = [
                'path' => $path,
                'exists' => is_dir($path),
                'writable' => false,
                'created' => false,
                'message' => null,
            ];

            if (! $status['exists']) {
                if ($dryRun) {
                    $status['message'] = 'Missing (dry-run: would create)';
                    $warnings[] = sprintf('Missing directory (dry-run): %s', $path);
                } else {
                    $created = @mkdir($path, 0755, true);
                    $status['created'] = $created;
                    $status['exists'] = is_dir($path);

                    if (! $created && ! $status['exists']) {
                        $status['message'] = 'Missing and could not be created';
                        $failures[] = sprintf('Unable to create directory: %s', $path);
                    } else {
                        $status['message'] = 'Created';
                    }
                }
            }

            if ($status['exists']) {
                $status['writable'] = is_writable($path);
                if (! $status['writable']) {
                    $status['message'] = 'Not writable';
                    $failures[] = sprintf('Directory not writable: %s', $path);
                } elseif ($status['message'] === null) {
                    $status['message'] = 'OK';
                }
            }

            $entries[] = $status;
        }

        return [
            'entries' => $entries,
            'warnings' => $warnings,
            'failures' => $failures,
        ];
    }
}
