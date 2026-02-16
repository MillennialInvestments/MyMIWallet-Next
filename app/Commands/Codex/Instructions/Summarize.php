<?php

namespace App\Commands\Codex\Instructions;

use App\Commands\SafeBaseCommand;
use CodeIgniter\CLI\CLI;

class Summarize extends SafeBaseCommand
{
    protected $group = 'Codex';
    protected $name = 'codex:instruct:summarize';
    protected $description = 'Generate structured AI documentation summary template';

    public function run(array $params)
    {
        $template = <<<TXT
You are analyzing a CI4 financial platform.

Return structured JSON:

{
  "completed_components": [],
  "working_systems": [],
  "detected_gaps": [],
  "security_risks": [],
  "performance_risks": [],
  "missing_tests": [],
  "documentation_missing": [],
  "next_actions": []
}

Be exhaustive.
TXT;

        file_put_contents(WRITEPATH . 'audit/instruction_template.txt', $template);

        CLI::write('Instruction template generated.');
    }
}
