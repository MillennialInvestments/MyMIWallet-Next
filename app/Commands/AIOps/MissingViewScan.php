<?php

declare(strict_types=1);

namespace App\Commands\AIOps;

use App\Commands\SafeBaseCommand;
use CodeIgniter\CLI\CLI;

class MissingViewScan extends SafeBaseCommand
{
    protected $group = 'AIOps';
    protected $name = 'aiops:views:missing';
    protected $description = 'Scan controllers for view()/renderTheme() references and report missing views.';

    public function run(array $params)
    {
        $issues = [];
        $controllers = glob(APPPATH . 'Controllers/*.php') ?: [];

        foreach ($controllers as $file) {
            $contents = (string) file_get_contents($file);
            if (! preg_match_all('/(?:view|renderTheme|respondWithRendered)\(\s*[\'\"]([^\'\"]+)[\'\"]/', $contents, $m)) {
                continue;
            }

            foreach ($m[1] as $view) {
                if (str_contains($view, '$') || ! $this->viewExists($view)) {
                    $issues[] = [
                        'controller' => basename($file, '.php'),
                        'method' => 'unknown',
                        'missing_view_path' => $view,
                        'suggested_fallback' => 'app/Views/' . str_replace(['\\', '/'], '/', $view) . '.php',
                    ];
                }
            }
        }

        $jsonPath = ROOTPATH . 'writable/aiops/missing_views.json';
        $mdPath = ROOTPATH . 'docs/reports/missing_views_report.md';
        @mkdir(dirname($jsonPath), 0775, true);
        @mkdir(dirname($mdPath), 0775, true);

        file_put_contents($jsonPath, json_encode($issues, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES) . PHP_EOL);

        $md = "# Missing Views Report\n\n| Controller | Method | Missing View | Suggested Fallback |\n|---|---|---|---|\n";
        foreach ($issues as $issue) {
            $md .= sprintf(
                "| %s | %s | %s | %s |\n",
                $issue['controller'],
                $issue['method'],
                $issue['missing_view_path'],
                $issue['suggested_fallback']
            );
        }

        file_put_contents($mdPath, $md);

        CLI::write('Missing views report generated: ' . count($issues), 'yellow');
    }

    private function viewExists(string $view): bool
    {
        $normalized = str_replace('\\', '/', $view);

        return is_file(APPPATH . 'Views/' . $normalized . '.php')
            || is_file(APPPATH . str_replace('App/', '', $normalized) . '.php');
    }
}
