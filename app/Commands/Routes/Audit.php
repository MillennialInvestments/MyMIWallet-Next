<?php

declare(strict_types=1);

namespace App\Commands\Routes;

use App\Commands\SafeBaseCommand;
use App\Services\RouteInspectionService;
use CodeIgniter\CLI\CLI;

class Audit extends SafeBaseCommand
{
    protected $group = 'Routes';
    protected $name = 'routes:docs';
    protected $description = 'Inspect routes with controller/method integrity, duplicates, and optional filters.';
    protected $options = [
        '--errors-only=1' => 'Only show routes with class/method errors.',
        '--duplicates-only=1' => 'Only show duplicate method+URI routes.',
        '--phase=PhaseA|full' => 'Inspect phase fragments only.',
    ];

    public function run(array $params)
    {
                $errorsOnly = $this->cliFlag('errors-only');
        $duplicatesOnly = $this->cliFlag('duplicates-only');
        $phase = CLI::getOption('phase');
        $phase = is_string($phase) && $phase !== "" ? $phase : null;

        $rows = (new RouteInspectionService())->inspect($phase);

        if ($errorsOnly) {
            $rows = array_values(array_filter($rows, static fn(array $r): bool => ! $r['exists'] || ! $r['methodExists']));
        }

        if ($duplicatesOnly) {
            $rows = array_values(array_filter($rows, static fn(array $r): bool => $r['isDuplicate']));
        }

        $lines = [
            '# Route Inspection Report',
            '',
            '- generated_at_utc: `' . gmdate('c') . '`',
            '- phase_filter: `' . ($phase ?? 'runtime') . '`',
            '- errors_only: `' . ($errorsOnly ? '1' : '0') . '`',
            '- duplicates_only: `' . ($duplicatesOnly ? '1' : '0') . '`',
            '- total_routes: ' . count($rows),
            '',
            '| Method | URI | Handler | Exists | Method Exists | Duplicate | Source |',
            '|---|---|---|---|---|---|---|',
        ];

        foreach ($rows as $r) {
            $lines[] = sprintf(
                '| %s | %s | `%s` | %s | %s | %s | %s |',
                $r['method'],
                $r['uri'],
                $r['handler'],
                $r['exists'] ? 'YES' : 'NO',
                $r['methodExists'] ? 'YES' : 'NO',
                $r['isDuplicate'] ? 'YES' : 'NO',
                $r['sourceFile']
            );
        }

        $out = ROOTPATH . 'docs/architecture/routes_inspection.md';
        if (! is_dir(dirname($out))) {
            mkdir(dirname($out), 0775, true);
        }
        file_put_contents($out, implode(PHP_EOL, $lines) . PHP_EOL);

        CLI::write('Route docs written: ' . $out, 'green');
        CLI::write('Rows: ' . count($rows), 'yellow');

        return EXIT_SUCCESS;
    }

    private function cliFlag(string $key): bool
    {
        $value = CLI::getOption($key);
        if ($value === null) {
            return false;
        }

        if ($value === true) {
            return true;
        }

        return in_array(strtolower((string) $value), ['1', 'true', 'yes', 'on'], true);
    }
}
