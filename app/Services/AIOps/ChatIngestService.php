<?php

declare(strict_types=1);

namespace App\Services\AIOps;

use CodeIgniter\CLI\CLI;

class ChatIngestService
{
    private string $lastOutput = '';
    private ?int $lastInstructionId = null;

    public function sanitizeInput(string $text): string
    {
        return $this->normalizeWhitespace($this->stripEmojis($text));
    }

    public function stripEmojis(string $text): string
    {
        $text = preg_replace('/[\x{1F600}-\x{1F64F}]/u', '', $text) ?? $text;
        $text = preg_replace('/[\x{1F300}-\x{1F5FF}]/u', '', $text) ?? $text;
        $text = preg_replace('/[\x{1F680}-\x{1F6FF}]/u', '', $text) ?? $text;
        $text = preg_replace('/[\x{2600}-\x{26FF}]/u', '', $text) ?? $text;
        $text = preg_replace('/[\x{2700}-\x{27BF}]/u', '', $text) ?? $text;
        $text = preg_replace('/[\x{FE00}-\x{FE0F}]/u', '', $text) ?? $text;
        $text = preg_replace('/\x{200D}/u', '', $text) ?? $text;

        return $text;
    }

    public function normalizeWhitespace(string $text): string
    {
        $text = preg_replace('/\s+/', ' ', $text) ?? $text;

        return trim($text);
    }

    /**
     * @return array{status:string,output:string,instruction_id:int|null,command:string}
     */
    public function runIngest(string $cleanText): array
    {
        $command = 'aiops:ingest --text="' . addslashes($cleanText) . '"';
        $this->lastOutput = (string) CLI::run($command);

        if ($this->lastOutput === '') {
            $spark = ROOTPATH . 'spark';
            $shellCommand = 'php ' . escapeshellarg($spark) . ' aiops:ingest --text=' . escapeshellarg($cleanText) . ' 2>&1';
            $command = $shellCommand;
            $this->lastOutput = (string) shell_exec($shellCommand);
        }

        $this->lastInstructionId = $this->extractInstructionId($this->lastOutput);

        return $this->returnIngestResponse($command);
    }

    public function logInstruction(?int $id): void
    {
        if ($id === null) {
            log_message('warning', '[ChatIngestService] No instruction ID found in ingest output.');

            return;
        }

        log_message('info', '[ChatIngestService] Ingest instruction created: {id}', ['id' => $id]);
    }

    /**
     * @return array{status:string,output:string,instruction_id:int|null,command:string}
     */
    public function returnIngestResponse(string $command = ''): array
    {
        return [
            'status' => $this->lastOutput === '' ? 'error' : 'ok',
            'output' => $this->lastOutput,
            'instruction_id' => $this->lastInstructionId,
            'command' => $command,
        ];
    }

    private function extractInstructionId(string $output): ?int
    {
        if (preg_match('/instruction\s*(?:id)?\s*[:#]?\s*(\d+)/i', $output, $match) === 1) {
            return (int) $match[1];
        }

        if (preg_match('/\bID\s*[:#]?\s*(\d+)\b/i', $output, $match) === 1) {
            return (int) $match[1];
        }

        return null;
    }
}
