<?php

namespace App\Services\Marketing;

class OcrService
{
    public function extractText(string $imagePath): string
    {
        if (!is_file($imagePath)) {
            return '';
        }

        $outputBase = tempnam(WRITEPATH, 'ocr_');
        if ($outputBase === false) {
            return '';
        }

        @unlink($outputBase);

        $command = sprintf(
            'tesseract %s %s --oem 3 --psm 6 2>/dev/null',
            escapeshellarg($imagePath),
            escapeshellarg($outputBase)
        );

        shell_exec($command);

        $txtFile = $outputBase . '.txt';
        if (!is_file($txtFile)) {
            return '';
        }

        $text = (string) file_get_contents($txtFile);
        @unlink($txtFile);

        return trim($text);
    }
}
