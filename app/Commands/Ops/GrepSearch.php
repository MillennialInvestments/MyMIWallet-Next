<?php

namespace App\Commands\Ops;

use App\Commands\SafeBaseCommand;
use CodeIgniter\CLI\CLI;

class GrepSearch extends SafeBaseCommand
{
    protected $group = 'Ops-Terminal';
    protected $name = 'ops:grep';
    protected $description = 'Search codebase or DB schema for a string';

    public function run(array $params)
    {
        $dir = $params[0] ?? APPPATH;
        $text = $params[1] ?? null;

        if (!$text) {
            CLI::error('Usage: php spark ops:grep [dir] [text]');
            return;
        }

        CLI::write("🔍 Searching in: {$dir}");
        CLI::write("🧠 Looking for: {$text}\n");

        $cmd = "grep -Rni '{$text}' {$dir} 2>/dev/null";

        $output = shell_exec($cmd);

        if (!$output) {
            CLI::write("❌ No matches found.");
            return;
        }

        CLI::write($output);
    }
}