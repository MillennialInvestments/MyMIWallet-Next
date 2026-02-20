<?php

namespace App\Commands\AIOps;

use App\Commands\SafeBaseCommand;
use CodeIgniter\CLI\CLI;
use App\Models\AIOpsDependencyModel;

class DepsAdd extends SafeBaseCommand
{
    protected $group = 'AIOps - Run';
    protected $name  = 'aiops:deps:add';
    protected $description = 'Add dependency link: instruction depends on another instruction';
    protected $usage = 'aiops:deps:add --id=123 --depends=122';

    public function run(array $params)
    {
        $argv = $_SERVER['argv'] ?? [];
        $id = $this->getArgvInt($argv, 'id', 0);
        $dep = $this->getArgvInt($argv, 'depends', 0);

        if ($id < 1 || $dep < 1) {
            CLI::error('Usage: php spark aiops:deps:add --id=123 --depends=122');
            return;
        }

        $m = new AIOpsDependencyModel();
        $m->insert(['instruction_id' => $id, 'depends_on' => $dep], true);
        CLI::write("✅ Added dependency: {$id} depends on {$dep}");
    }

    private function getArgvInt(array $argv, string $key, int $default): int
    {
        $needleEq = '--' . $key . '=';
        $needle   = '--' . $key;

        foreach ($argv as $i => $arg) {
            if (str_starts_with($arg, $needleEq)) {
                $val = (int) substr($arg, strlen($needleEq));
                return $val > 0 ? $val : $default;
            }
            if ($arg === $needle) {
                $next = $argv[$i + 1] ?? null;
                if ($next !== null && !str_starts_with($next, '--')) {
                    $val = (int) $next;
                    return $val > 0 ? $val : $default;
                }
            }
        }
        return $default;
    }
}