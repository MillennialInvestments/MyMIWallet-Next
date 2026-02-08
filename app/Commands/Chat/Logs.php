<?php

declare(strict_types=1);

namespace App\Commands\Chat;

use App\Commands\SafeBaseCommand;
use App\Commands\Support\SubsCommandTrait;
use CodeIgniter\CLI\CLI;

class Logs extends SafeBaseCommand
{
    use SubsCommandTrait;

    protected $group = 'Chat';
    protected $name = 'chat:logs';
    protected $description = 'Tail persisted chat logs from writable/logs/chat.';
    protected $options = [
        '--lines' => 'Number of lines to output (default: 200).',
        '--json' => 'Return JSON payload with per-file log sources.',
        '--since' => 'Filter by relative window (e.g. 5m, 2h, 1d).',
    ];

    public function run(array $params)
    {
        $this->parseParams($params);

        $lines = $this->optInt('lines', 200);
        $since = $this->optString('since');
        $json = $this->optBool('json');

        $result = $this->mgr()->tailLogs('chat.app', $lines, $json, $since);

        if ($json) {
            $this->emit($result, true);
            return ($result['ok'] ?? false) ? EXIT_SUCCESS : EXIT_ERROR;
        }

        foreach ($result['sources'] ?? [] as $source) {
            if (($source['missing'] ?? false) === true) {
                CLI::write('[missing] ' . ($source['file'] ?? 'unknown'), 'yellow');
                continue;
            }

            CLI::write('--- ' . ($source['file'] ?? 'log') . ' ---', 'green');
            foreach ($source['lines'] ?? [] as $line) {
                CLI::write((string) $line);
            }
        }

        return ($result['ok'] ?? false) ? EXIT_SUCCESS : EXIT_ERROR;
    }
}
