<?php

declare(strict_types=1);

namespace App\Libraries\Ops;

class OpsReportWriter
{
    public function write(string $jobKey, string $markdown, ?string $dateString = null): string
    {
        $date = $dateString ?: date('Y-m-d');
        $baseDir = ROOTPATH . 'docs' . DIRECTORY_SEPARATOR . 'ops' . DIRECTORY_SEPARATOR . 'reports';
        $targetDir = $baseDir . DIRECTORY_SEPARATOR . $date;

        if (! is_dir($targetDir)) {
            mkdir($targetDir, 0775, true);
        }

        $fileSafeKey = preg_replace('/[^a-zA-Z0-9_.-]+/', '-', $jobKey) ?: 'report';
        $path = $targetDir . DIRECTORY_SEPARATOR . $fileSafeKey . '.md';

        $header = "# {$jobKey} report\nGenerated at " . date('c') . "\n\n";
        $body = str_starts_with(trim($markdown), '#') ? $markdown : $header . $markdown;

        file_put_contents($path, $body);

        return $path;
    }
}
