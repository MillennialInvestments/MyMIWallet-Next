<?php

declare(strict_types=1);

namespace App\Commands\Docs\Architecture;

use App\Commands\SafeBaseCommand;
use CodeIgniter\CLI\CLI;

class Map extends SafeBaseCommand
{

    protected $group = 'Docs';
    protected $name = 'docs:architecture-map';
    protected $description = 'Generate architecture map of CI4 application';

    public function run(array $params)
    {

        CLI::write('Generating architecture map...', 'yellow');

        $map = [
            'controllers' => $this->scan(APPPATH . 'Controllers'),
            'models' => $this->scan(APPPATH . 'Models'),
            'services' => $this->scan(APPPATH . 'Services'),
            'commands' => $this->scan(APPPATH . 'Commands')
        ];

        file_put_contents(
            ROOTPATH . 'docs/_architecture_map.json',
            json_encode($map, JSON_PRETTY_PRINT)
        );

        CLI::write('Architecture map generated.', 'green');
    }

    private function scan(string $path): array
    {

        $files = [];

        if (!is_dir($path)) {
            return [];
        }

        foreach (glob($path . '/*.php') as $file) {
            $files[] = basename($file);
        }

        return $files;
    }
}