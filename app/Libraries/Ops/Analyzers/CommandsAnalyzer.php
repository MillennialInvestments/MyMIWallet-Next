<?php

declare(strict_types=1);

namespace App\Libraries\Ops\Analyzers;

use App\Commands\Ops\CommandConstructorScanner;
use App\Libraries\Ops\Issue;

class CommandsAnalyzer
{
    /**
     * @return array<int, array<string, mixed>>
     */
    public function analyze(): array
    {
        $scanner = new CommandConstructorScanner();
        $entries = $scanner->scan(ROOTPATH . 'app/Commands');

        $illegal = array_values(array_filter($entries, static fn (array $entry): bool => (bool) $entry['illegal']));
        if ($illegal === []) {
            return [];
        }

        $results = [];
        foreach ($illegal as $entry) {
            $results[] = Issue::build([
                'domain' => 'ops',
                'severity' => 'P0',
                'title' => sprintf('Illegal Spark command constructor: %s', $entry['class']),
                'evidence' => [
                    'file' => $entry['file'],
                    'constructor_line' => $entry['constructorLine'],
                ],
                'suggested_fix' => [
                    'Remove the __construct() from the command class.',
                    'Ensure the command extends SafeBaseCommand.',
                    'Re-run ops:commands:audit.',
                ],
                'ai_prompt' => sprintf('Remove illegal constructor from %s (Spark command).', $entry['class']),
                'owner' => 'human',
                'status' => 'open',
            ]);
        }

        return $results;
    }
}
