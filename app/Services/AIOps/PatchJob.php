<?php

declare(strict_types=1);

namespace App\Services\AIOps;

final class PatchJob
{
    /** @param array<int,string> $targetFiles @param array<int,string> $constraints */
    public function __construct(
        public string $jobId,
        public string $jobFile,
        public array $targetFiles,
        public array $constraints,
        public string $instructions,
    ) {
    }

    public static function fromMarkdown(string $jobFile, string $markdown): self
    {
        preg_match('/^ID:\s*(.+)$/mi', $markdown, $idMatch);
        $jobId = trim((string) ($idMatch[1] ?? pathinfo($jobFile, PATHINFO_FILENAME)));

        $targetFiles = [];
        if (preg_match('/##\s*TARGET FILES\s*(.+?)(\n##\s|\z)/is', $markdown, $match)) {
            preg_match_all('/^-\s+(.+)$/m', trim($match[1]), $targetMatch);
            $targetFiles = array_values(array_filter(array_map('trim', $targetMatch[1] ?? [])));
        }

        $constraints = [];
        if (preg_match('/##\s*CONSTRAINTS\s*(.+?)(\n##\s|\z)/is', $markdown, $match)) {
            preg_match_all('/^-\s+(.+)$/m', trim($match[1]), $constraintMatch);
            $constraints = array_values(array_filter(array_map('trim', $constraintMatch[1] ?? [])));
        }

        $instructions = '';
        if (preg_match('/##\s*INSTRUCTIONS\s*(.+?)(\n##\s|\z)/is', $markdown, $match)) {
            $instructions = trim($match[1]);
        }

        return new self($jobId, ltrim($jobFile, '/'), $targetFiles, $constraints, $instructions);
    }

    /** @return array<int,string> */
    public function validate(): array
    {
        $errors = [];
        if ($this->jobId === '') {
            $errors[] = 'Missing job ID';
        }
        if ($this->targetFiles === []) {
            $errors[] = 'Missing target files';
        }
        if ($this->instructions === '') {
            $errors[] = 'Missing instructions';
        }

        return $errors;
    }
}
