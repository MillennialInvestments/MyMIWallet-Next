<?php

namespace App\Services\Marketing;

use Config\Marketing;

class OcrService
{
    private Marketing $marketingConfig;

    public function __construct(?Marketing $marketingConfig = null)
    {
        $this->marketingConfig = $marketingConfig ?? config('Marketing');
    }

    public function extractText(string $imagePath): string
    {
        if (! is_file($imagePath)) {
            return '';
        }

        $outputBase = tempnam(WRITEPATH, 'ocr_');
        if ($outputBase === false) {
            return '';
        }

        @unlink($outputBase);

        $ocr = $this->marketingConfig->ocr;
        $command = sprintf(
            '%s %s %s --oem %d --psm %d 2>/dev/null',
            escapeshellcmd((string) ($ocr['binary'] ?? 'tesseract')),
            escapeshellarg($imagePath),
            escapeshellarg($outputBase),
            (int) ($ocr['engine_mode'] ?? 3),
            (int) ($ocr['page_segmentation_mode'] ?? 6),
        );

        shell_exec($command);

        $txtFile = $outputBase . '.txt';
        if (! is_file($txtFile)) {
            return '';
        }

        $text = (string) file_get_contents($txtFile);
        @unlink($txtFile);

        return trim($text);
    }
}
