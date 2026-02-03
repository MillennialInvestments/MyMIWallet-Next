<?php

declare(strict_types=1);

namespace App\Commands\Ops;

use App\Commands\SafeBaseCommand;
use App\Models\AiOpsManualTodoModel;
use CodeIgniter\CLI\CLI;

class NextStepsSyncManual extends SafeBaseCommand
{
    protected $group = 'ops';
    protected $name = 'ops:next-steps:sync-manual';
    protected $description = 'Sync manual TODOs from docs/_aiops/next-steps.md into the database.';
    protected $usage = 'ops:next-steps:sync-manual [--dry-run]';
    protected $options = [
        '--dry-run' => 'Preview changes without writing to the database.',
    ];

    public function run(array $params)
    {
        [, $flags] = $this->parseParams($params);
        $dryRun = $this->resolveDryRun($flags);

        $path = ROOTPATH . 'docs/_aiops/next-steps.md';
        if (! is_file($path)) {
            CLI::error('next-steps.md not found.');
            return EXIT_ERROR;
        }

        $content = file_get_contents($path);
        if ($content === false) {
            CLI::error('Unable to read next-steps.md.');
            return EXIT_ERROR;
        }

        $manualSection = $this->extractManualSection($content);
        if ($manualSection === []) {
            CLI::write('No manual TODOs found.', 'yellow');
            return EXIT_SUCCESS;
        }

        if ($dryRun) {
            CLI::write('Dry-run enabled. Manual TODOs detected:', 'yellow');
            foreach ($manualSection as $todo) {
                CLI::write(sprintf('- [%s] %s', $todo['status'], $todo['content']));
            }
            return EXIT_SUCCESS;
        }

        $model = new AiOpsManualTodoModel();
        if (! $model->db->tableExists('bf_aiops_manual_todos')) {
            CLI::error('bf_aiops_manual_todos table not found.');
            return EXIT_ERROR;
        }

        foreach ($manualSection as $todo) {
            $model->upsertTodo($todo['content'], $todo['status'], 'docs_next_steps');
        }

        CLI::write('Manual TODOs synced.', 'green');

        return EXIT_SUCCESS;
    }

    /**
     * @return array<int, array{content: string, status: string}>
     */
    private function extractManualSection(string $content): array
    {
        $start = '<!-- AIOPS_MANUAL_TODOS_START -->';
        $end = '<!-- AIOPS_MANUAL_TODOS_END -->';

        $pattern = '/' . preg_quote($start, '/') . '(.*?)' . preg_quote($end, '/') . '/s';
        if (! preg_match($pattern, $content, $matches)) {
            return [];
        }

        $lines = preg_split('/\r\n|\r|\n/', trim($matches[1]));
        $todos = [];
        foreach ($lines as $line) {
            $line = trim($line);
            if ($line === '' || ! str_starts_with($line, '-')) {
                continue;
            }

            if (preg_match('/^- \[(x| )\]\s*(.+)$/i', $line, $match)) {
                $status = strtolower($match[1]) === 'x' ? 'done' : 'open';
                $todos[] = [
                    'content' => trim($match[2]),
                    'status' => $status,
                ];
                continue;
            }

            if (preg_match('/^- DONE:\s*(.+)$/i', $line, $match)) {
                $todos[] = [
                    'content' => trim($match[1]),
                    'status' => 'done',
                ];
            }
        }

        return $todos;
    }

    protected function isDestructive(): bool
    {
        return true;
    }
}
