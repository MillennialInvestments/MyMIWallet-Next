<?php

declare(strict_types=1);

namespace App\Services\AIOps;

class PriorityWriterService
{
    public function buildNowList(array $verified, int $priorityMin = 1, int $limit = 0): array
    {
        $items = array_values(array_filter($verified, static fn ($item) => ! ($item->exists ?? false)));
        if ($limit > 0) {
            $items = array_slice($items, 0, $limit);
        }
        return $items;
    }

    public function writePriorityOutputs(DocsScanResult $scan, array $nowList): void
    {
        $dir = ROOTPATH . 'docs/_aiops';
        if (! is_dir($dir)) {
            mkdir($dir, 0775, true);
        }

        $payload = [
            'generated_at' => date('c'),
            'docs_read' => count($scan->readLog),
            'gaps_total' => count($scan->gapItems),
            'now_list_count' => count($nowList),
        ];
        file_put_contents($dir . '/priority-now.json', json_encode($payload, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES) . PHP_EOL);
    }

    public function groupGapItemsForPRs(array $nowList, int $maxGroups = 5): array
    {
        if ($nowList === []) {
            return [];
        }
        return ['group-1' => array_slice($nowList, 0, max(1, min(count($nowList), 20)))];
    }

    public function stageArtifactsForPRGroup(string $groupName, array $groupItems, array $artifacts): void
    {
        $dir = ROOTPATH . 'docs/_aiops/pr-groups';
        if (! is_dir($dir)) {
            mkdir($dir, 0775, true);
        }

        file_put_contents($dir . '/' . $groupName . '.md', "# {$groupName}\n\nItems: " . count($groupItems) . "\nArtifacts: " . count($artifacts) . PHP_EOL);
    }
}
