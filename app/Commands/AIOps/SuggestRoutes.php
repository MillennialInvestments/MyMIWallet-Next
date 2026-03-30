<?php

declare(strict_types=1);

namespace App\Commands\AIOps;

use App\Commands\SafeBaseCommand;
use CodeIgniter\CLI\CLI;

class SuggestRoutes extends SafeBaseCommand
{
    protected $group = 'AIOps';
    protected $name = 'aiops:routes:suggest';
    protected $description = 'Scan recent 404 logs and suggest likely intended route matches.';

    public function run(array $params)
    {
        $missingUris = $this->collect404Uris();
        $knownRoutes = $this->collectKnownRoutes();

        $suggestions = [];
        foreach ($missingUris as $uri) {
            $suggested = $this->closestRoute($uri, $knownRoutes);
            if ($suggested === null) {
                continue;
            }

            $suggestions[] = [
                'missing_uri' => $uri,
                'suggested_route' => $suggested,
                'reason' => 'case mismatch / likely slug normalization issue',
            ];
        }

        $jsonPath = ROOTPATH . 'writable/aiops/route_suggestions.json';
        $mdPath = ROOTPATH . 'docs/reports/route_suggestions.md';
        @mkdir(dirname($jsonPath), 0775, true);
        @mkdir(dirname($mdPath), 0775, true);

        file_put_contents($jsonPath, json_encode($suggestions, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES) . PHP_EOL);

        $md = "# Route Suggestions\n\n| Missing URI | Suggested Route | Reason |\n|---|---|---|\n";
        foreach ($suggestions as $row) {
            $md .= sprintf("| %s | %s | %s |\n", $row['missing_uri'], $row['suggested_route'], $row['reason']);
        }
        file_put_contents($mdPath, $md);

        CLI::write('Route suggestions generated: ' . count($suggestions), 'green');
    }

    private function collect404Uris(): array
    {
        $files = glob(WRITEPATH . 'logs/log-*.php') ?: [];
        rsort($files);
        $latest = $files[0] ?? null;

        if ($latest === null) {
            return [];
        }

        $lines = @file($latest, FILE_IGNORE_NEW_LINES) ?: [];
        $uris = [];

        foreach ($lines as $line) {
            if (! str_contains(strtolower($line), '404')) {
                continue;
            }
            if (preg_match('/\/(?:[A-Za-z0-9\-\/_\.]+)/', $line, $m)) {
                $uris[] = $m[0];
            }
        }

        return array_values(array_unique($uris));
    }

    private function collectKnownRoutes(): array
    {
        $routesFile = ROOTPATH . 'app/Config/Routes.php';
        $contents = is_file($routesFile) ? (string) file_get_contents($routesFile) : '';

        if (! preg_match_all('/\$routes->(?:get|post|match)\(\s*[\'\"]([^\'\"]+)[\'\"]/', $contents, $m)) {
            return [];
        }

        return array_values(array_unique(array_map(static fn(string $route) => '/' . ltrim($route, '/'), $m[1])));
    }

    private function closestRoute(string $uri, array $knownRoutes): ?string
    {
        $uriNorm = strtolower($uri);
        $best = null;
        $bestScore = PHP_INT_MAX;

        foreach ($knownRoutes as $route) {
            $score = levenshtein($uriNorm, strtolower($route));
            if ($score < $bestScore) {
                $bestScore = $score;
                $best = $route;
            }
        }

        if ($best === null || $bestScore > 8) {
            return null;
        }

        return $best;
    }
}
