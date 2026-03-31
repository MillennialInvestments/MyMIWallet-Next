<?php

namespace App\Services;

class AiopsActionService
{
    public function generateActionsFromErrors(array $errors): array
    {
        $actions = [];

        foreach ($errors as $error) {
            $line = (string) ($error['line'] ?? '');
            if ($line === '') {
                continue;
            }

            if (str_contains($line, 'Undefined array key')) {
                $actions[] = $this->buildAction('patch', 'Fix undefined array key', $error);
            }

            if (str_contains($line, 'Call to undefined method')) {
                $actions[] = $this->buildAction('patch', 'Missing method implementation', $error);
            }

            if (str_contains(strtolower($line), 'memory')) {
                $actions[] = $this->buildAction('optimize', 'Memory optimization required', $error);
            }
        }

        return $actions;
    }

    private function buildAction(string $type, string $description, array $error): array
    {
        return [
            'type'        => $type,
            'description' => $description,
            'source'      => $error,
        ];
    }
}
