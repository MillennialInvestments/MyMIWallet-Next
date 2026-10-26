<?php

declare(strict_types=1);

namespace App\Services\Marketing;

class VoiceoverService
{
    private string $scriptsPath;
    private string $publicUploadsDir;
    private string $webBaseUrl;

    public function __construct()
    {
        $this->scriptsPath = ROOTPATH . 'scripts/generate_voiceover.py';
        $this->publicUploadsDir = ROOTPATH . 'public/uploads/audio/voiceovers/';
        $this->webBaseUrl = rtrim((string) (config('App')->baseURL ?? '/'), '/') . '/uploads/audio/voiceovers/';

        if (! is_dir($this->publicUploadsDir)) {
            @mkdir($this->publicUploadsDir, 0775, true);
        }
    }

    /**
     * Synthesize narration text into an MP3 file.
     *
     * @param string $script Voiceover narration text
     * @param string|null $filename Custom filename without extension
     * @return array{success:bool,file_path:?string,file_url:?string,size_bytes:int,duration_est:float,chunks:int,word_count:int,error:?string}
     */
    public function generate(string $script, ?string $filename = null): array
    {
        $script = trim(strip_tags($script));
        if ($script === '') {
            return [
                'success' => false,
                'file_path' => null,
                'file_url' => null,
                'size_bytes' => 0,
                'duration_est' => 0.0,
                'chunks' => 0,
                'word_count' => 0,
                'error' => 'Voiceover script text is empty.',
            ];
        }

        $baseName = $filename ? preg_replace('/[^a-zA-Z0-9_\-]/', '_', $filename) : 'vo_' . date('Ymd_His') . '_' . bin2hex(random_bytes(4));
        $outputFile = $this->publicUploadsDir . $baseName . '.mp3';

        // Prefer python3 executable
        $python = $this->resolvePythonBinary();
        $scriptArg = escapeshellarg($script);
        $outputArg = escapeshellarg($outputFile);
        $pyScriptArg = escapeshellarg($this->scriptsPath);

        $command = "{$python} {$pyScriptArg} {$scriptArg} {$outputArg} 2>&1";
        $output = [];
        $exitCode = 0;
        exec($command, $output, $exitCode);
        $rawOutput = implode("\n", $output);

        if ($exitCode === 0 && file_exists($outputFile) && filesize($outputFile) > 0) {
            $parsed = json_decode($rawOutput, true);
            $size = (int) filesize($outputFile);
            $duration = is_array($parsed) && isset($parsed['duration_seconds_est'])
                ? (float) $parsed['duration_seconds_est']
                : round($size / 8000.0, 2);
            $words = is_array($parsed) && isset($parsed['word_count'])
                ? (int) $parsed['word_count']
                : count(preg_split('/\s+/', $script));

            return [
                'success' => true,
                'file_path' => $outputFile,
                'file_url' => $this->webBaseUrl . basename($outputFile),
                'relative_url' => '/uploads/audio/voiceovers/' . basename($outputFile),
                'size_bytes' => $size,
                'duration_est' => $duration,
                'chunks' => (int) ($parsed['chunks_processed'] ?? 1),
                'word_count' => $words,
                'error' => null,
            ];
        }

        return [
            'success' => false,
            'file_path' => null,
            'file_url' => null,
            'size_bytes' => 0,
            'duration_est' => 0.0,
            'chunks' => 0,
            'word_count' => 0,
            'error' => 'TTS synthesis failed: ' . ($rawOutput ?: "exit code {$exitCode}"),
        ];
    }

    private function resolvePythonBinary(): string
    {
        $candidates = ['/usr/bin/python3', '/usr/local/bin/python3', 'python3'];
        foreach ($candidates as $bin) {
            if ($bin[0] === '/' && is_executable($bin)) {
                return $bin;
            }
        }
        return 'python3';
    }
}
