<?php

namespace App\Services\Docs;

class DocsParserService
{

    public function parseDocsDirectory($docsPath)
    {

        $files = $this->scanDirectory($docsPath);

        $intent = [
            'routes' => [],
            'tables' => [],
            'controllers' => [],
            'services' => [],
            'configs' => [],
            'tasks' => []
        ];

        foreach ($files as $file) {

            $content = file_get_contents($file);

            $intent = $this->extractIntent($content, $intent);
        }

        return [
            'files_scanned' => count($files),
            'required_changes' => $intent
        ];
    }

    private function scanDirectory($dir)
    {

        $rii = new \RecursiveIteratorIterator(
            new \RecursiveDirectoryIterator($dir)
        );

        $files = [];

        foreach ($rii as $file) {

            if ($file->isDir()) {
                continue;
            }

            if ($file->getExtension() === 'md') {
                $files[] = $file->getPathname();
            }
        }

        return $files;
    }

    private function extractIntent($content, $intent)
    {

        preg_match_all('/Route:\s*(.*)/i', $content, $routes);
        preg_match_all('/Table:\s*(.*)/i', $content, $tables);
        preg_match_all('/Controller:\s*(.*)/i', $content, $controllers);
        preg_match_all('/Service:\s*(.*)/i', $content, $services);

        $intent['routes'] = array_merge($intent['routes'], $routes[1] ?? []);
        $intent['tables'] = array_merge($intent['tables'], $tables[1] ?? []);
        $intent['controllers'] = array_merge($intent['controllers'], $controllers[1] ?? []);
        $intent['services'] = array_merge($intent['services'], $services[1] ?? []);

        return $intent;
    }

}