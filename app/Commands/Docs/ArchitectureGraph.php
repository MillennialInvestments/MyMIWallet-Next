<?php

namespace App\Commands\Docs;

use App\Commands\SafeBaseCommand;
use CodeIgniter\CLI\CLI;

class ArchitectureGraph extends SafeBaseCommand
{
    protected $group = 'Docs';
    protected $name = 'docs:architecture:graph';
    protected $description = 'Generate CI4 architecture graph';

    public function run(array $params)
    {

        $graph = [
            'controllers' => $this->scan(APPPATH . 'Controllers'),
            'models' => $this->scan(APPPATH . 'Models'),
            'services' => $this->scan(APPPATH . 'Services'),
            'commands' => $this->scan(APPPATH . 'Commands'),
            'modules' => $this->scanModules(),
        ];

        file_put_contents(
            ROOTPATH . 'docs/_ci4_architecture_graph.json',
            json_encode($graph, JSON_PRETTY_PRINT)
        );

        CLI::write('Architecture graph generated.', 'green');
    }

    private function scan($path)
    {
        if (!is_dir($path)) return [];

        $files = glob($path . '/*.php');

        return array_map('basename', $files);
    }

    private function scanModules()
    {
        $modules = glob(APPPATH . 'Modules/*', GLOB_ONLYDIR);

        return array_map('basename', $modules);
    }
}