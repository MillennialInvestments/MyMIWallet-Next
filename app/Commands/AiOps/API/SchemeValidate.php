<?php

namespace App\Commands\AiOps\API;

use App\Commands\SafeBaseCommand;
use CodeIgniter\CLI\CLI;

class SchemaValidate extends SafeBaseCommand
{
    protected $group = 'AiOps';
    protected $name = 'aiops:api:schema';
    protected $description = 'Validate API endpoints return JSON (optionally check required keys)';

    public function run(array $params)
    {
        $baseURL = rtrim((string) env('app.baseURL'), '/');
        $file = $params[0] ?? ROOTPATH . 'api_urls.txt';

        if (!is_file($file)) {
            CLI::error("Missing file: {$file} (one endpoint per line)");
            exit(1);
        }

        $urls = array_filter(array_map('trim', file($file)));
        $report = WRITEPATH . 'audit/api_schema_report.md';
        @mkdir(dirname($report), 0775, true);

        $fails = [];

        foreach ($urls as $u) {
            $url = str_starts_with($u, 'http') ? $u : $baseURL . '/' . ltrim($u, '/');

            $ch = curl_init($url);
            curl_setopt_array($ch, [
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_TIMEOUT => 15,
                CURLOPT_CONNECTTIMEOUT => 10,
            ]);
            $resp = curl_exec($ch);
            $err = curl_error($ch);
            $http = curl_getinfo($ch, CURLINFO_HTTP_CODE);
            curl_close($ch);

            if ($err) {
                $fails[] = "{$url}: curl_error={$err}";
                continue;
            }

            if ($http >= 400) {
                $fails[] = "{$url}: http={$http}";
                continue;
            }

            $json = json_decode($resp, true);
            if (!is_array($json)) {
                $fails[] = "{$url}: invalid_json";
            }
        }

        $md = "# API Schema Validation\n\n";
        $md .= "- File: {$file}\n\n";

        if (empty($fails)) {
            $md .= "✅ PASS\n";
            file_put_contents($report, $md);
            CLI::write("PASS. {$report}");
            return;
        }

        $md .= "## Failures\n\n";
        foreach ($fails as $f) $md .= "- {$f}\n";

        file_put_contents($report, $md);
        CLI::error("FAIL. {$report}");
        exit(1);
    }
}
