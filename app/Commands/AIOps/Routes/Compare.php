<?php

namespace App\Commands\AIOps\Routes;

use App\Commands\SafeBaseCommand;
use CodeIgniter\CLI\CLI;
use App\Libraries\MultiCurl;

class Compare extends SafeBaseCommand
{
    protected $group = 'AIOps - Routes';
    protected $name = 'aiops:routes:compare';
    protected $description = 'Compare staging vs production routes scan';

    public function run(array $params)
    {
        $prodBase = rtrim((string)($params[0] ?? env('app.baseURL')), '/');
        $stagBase = rtrim((string)($params[1] ?? getenv('AIOPS_STAGING_BASE_URL')), '/');

        if (!$prodBase || !$stagBase) {
            CLI::error('Provide prod + staging base URLs. Example: php spark aiops:routes:compare https://mymiwallet.com https://dev.mymiwallet.com');
            exit(1);
        }

        $scanFile = WRITEPATH . 'audit/routes_scan.json';
        if (!is_file($scanFile)) {
            CLI::error('Missing routes_scan.json. Run aiops:routes:scan first.');
            exit(1);
        }

        $scan = json_decode(file_get_contents($scanFile), true);
        $routes = [];
        foreach (($scan['results'] ?? []) as $r) {
            $routes[] = $r['route'];
        }

        $routes = array_values(array_unique($routes));
        sort($routes);

        $prodUrls = array_map(fn($r) => $prodBase . $r, $routes);
        $stagUrls = array_map(fn($r) => $stagBase . $r, $routes);

        $mc = new MultiCurl();
        $prod = $mc->run($prodUrls, ['concurrency' => 10]);
        $stag = $mc->run($stagUrls, ['concurrency' => 10]);

        $diffs = [];

        foreach ($routes as $r) {
            $pUrl = $prodBase . $r;
            $sUrl = $stagBase . $r;

            $p = $prod[$pUrl] ?? [];
            $s = $stag[$sUrl] ?? [];

            $pStatus = (int)($p['status'] ?? 0);
            $sStatus = (int)($s['status'] ?? 0);

            if ($pStatus !== $sStatus) {
                $diffs[] = "{$r}: PROD={$pStatus} STAGING={$sStatus}";
            }
        }

        $out = WRITEPATH . 'audit/routes_compare_report.md';
        $md = "# Routes Compare Report\n\n";
        $md .= "- PROD: {$prodBase}\n";
        $md .= "- STAGING: {$stagBase}\n\n";

        if (empty($diffs)) {
            $md .= "✅ No status differences detected.\n";
        } else {
            $md .= "## Status Differences\n\n";
            foreach ($diffs as $d) $md .= "- {$d}\n";
        }

        file_put_contents($out, $md);
        CLI::write("Wrote: {$out}");
    }
}
