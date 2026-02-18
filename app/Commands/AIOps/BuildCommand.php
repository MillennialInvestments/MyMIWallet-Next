<?php

namespace App\Commands\AIOps;

use App\Commands\SafeBaseCommand;
use CodeIgniter\CLI\CLI;
use App\Services\AIOpsService;
use App\Services\CommandBuilderService;

class BuildCommand extends SafeBaseCommand
{
    protected $group       = 'AIOps - Commands';
    protected $name        = 'aiops:build-command';
    protected $description = 'Generate a Spark command from text logic using AIOps';

    protected $usage       = 'aiops:build-command "text logic here"';
    protected $arguments   = [
        'text' => 'Natural language logic definition'
    ];

    public function run(array $params)
    {
        $text = $params[0] ?? null;

        if (!$text) {
            CLI::error('Text logic is required.');
            return;
        }

        CLI::write("Contacting AIOps...");

        $aiops = new AIOpsService();
        $definition = $aiops->generateCommandDefinition($text);

        if (!$definition) {
            CLI::error('Failed to generate command definition.');
            return;
        }

        $builder = new CommandBuilderService();
        $result = $builder->build($definition);

        if ($result) {
            CLI::write("Command created successfully.", 'green');
        } else {
            CLI::error("Command build failed.");
        }
    }
}
