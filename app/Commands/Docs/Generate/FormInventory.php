<?php

namespace App\Commands\Docs\Generate;

use App\Commands\SafeBaseCommand;
use App\Services\Docs\FormInventoryScanner;
use CodeIgniter\CLI\CLI;

class FormInventory extends SafeBaseCommand
{
    protected $group = 'Docs';
    protected $name = 'docs:inventory-forms';
    protected $description = 'Inventory repository forms, submit dependencies, and risk flags.';

    protected $usage = 'php spark docs:inventory-forms [--fail-on-risk] [--module=User] [--format=json|md|all] [--with-js] [--with-controller-analysis]';

    protected $options = [
        '--fail-on-risk' => 'Exit with non-zero status when risks are found.',
        '--module' => 'Limit scanning to a module name, e.g. User.',
        '--format' => 'Output format: json|md|all (default all).',
        '--with-js' => 'Enable JS submit handler dependency scanning.',
        '--with-controller-analysis' => 'Enable controller/service/model/post key analysis.',
    ];

    public function run(array $params)
    {
        [, $flags] = $this->parseParams($params);

        $format = strtolower((string) ($flags['format'] ?? 'all'));
        if (! in_array($format, ['json', 'md', 'all'], true)) {
            CLI::error('Invalid --format. Use json, md, or all.');
            return EXIT_ERROR;
        }

        $scanner = new FormInventoryScanner();
        $result = $scanner->scan([
            'module' => $flags['module'] ?? null,
            'with_js' => isset($flags['with-js']),
            'with_controller_analysis' => isset($flags['with-controller-analysis']),
        ]);

        $forms = $result['forms'] ?? [];
        $risks = $result['risks'] ?? [];
        $relationships = $result['formRelationships'] ?? [];

        if (in_array($format, ['json', 'all'], true)) {
            file_put_contents(ROOTPATH . 'docs/_form_inventory.json', json_encode([
                'generated_at' => $result['generated_at'],
                'forms' => $forms,
                'formRelationships' => $relationships,
            ], JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES));

            file_put_contents(ROOTPATH . 'docs/_form_inventory_risks.json', json_encode([
                'generated_at' => $result['generated_at'],
                'risks' => $risks,
            ], JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES));
        }

        if (in_array($format, ['md', 'all'], true)) {
            file_put_contents(ROOTPATH . 'docs/_form_inventory.md', $this->buildMarkdownReport($forms));
        }

        CLI::write('Form inventory generated.', 'green');
        CLI::write('forms=' . count($forms) . ' risks=' . $this->countRisks($risks) . ' relationships=' . count($relationships), 'cyan');
        CLI::write('docs/_form_inventory.json', 'yellow');
        CLI::write('docs/_form_inventory.md', 'yellow');
        CLI::write('docs/_form_inventory_risks.json', 'yellow');

        if (isset($flags['fail-on-risk']) && $this->countRisks($risks) > 0) {
            CLI::error('Risk flags detected and --fail-on-risk was specified.');
            return EXIT_ERROR;
        }

        return EXIT_SUCCESS;
    }

    private function countRisks(array $riskRows): int
    {
        $total = 0;
        foreach ($riskRows as $row) {
            $total += count((array) ($row['risks'] ?? []));
        }

        return $total;
    }

    private function buildMarkdownReport(array $forms): string
    {
        $byModule = [];
        foreach ($forms as $form) {
            $module = $form['module'] ?? 'Unknown';
            $byModule[$module][] = $form;
        }

        ksort($byModule);

        $md = [];
        $md[] = '# Form Inventory Report';
        $md[] = '';
        $md[] = '- Generated: ' . date(DATE_ATOM);
        $md[] = '- Total forms: ' . count($forms);
        $md[] = '';

        foreach ($byModule as $module => $moduleForms) {
            $md[] = '## Module: ' . $module;
            $md[] = '';

            foreach ($moduleForms as $form) {
                $id = (string) ($form['id'] ?? 'unknown');
                $action = (string) ($form['action'] ?? '');
                $method = (string) ($form['method'] ?? '');
                $controller = (string) ($form['controller'] ?? 'unresolved');
                $controllerMethod = (string) ($form['controller_method'] ?? 'unresolved');
                $risks = (array) ($form['risks'] ?? []);

                $md[] = '### ' . $id;
                $md[] = '';
                $md[] = '- View file: `' . ($form['file'] ?? 'unknown') . '`';
                $md[] = '- Form: id=`' . $id . '` action=`' . $action . '` method=`' . $method . '`';
                $md[] = '- Route/controller target: `' . (($form['route_match']['uri'] ?? 'unresolved')) . '` -> `' . $controller . '::' . $controllerMethod . '`';
                $md[] = '- Services/models/validation: services=`' . implode(', ', (array) ($form['services_used'] ?? [])) . '` models=`' . implode(', ', (array) ($form['models_used'] ?? [])) . '` validation=`' . implode(', ', (array) ($form['validation_usage'] ?? [])) . '`';

                if (! empty($risks)) {
                    $md[] = '- Risk summary: ' . implode(', ', $risks);
                } else {
                    $md[] = '- Risk summary: none detected';
                }

                $md[] = '- Suggested remediation: ' . $this->suggestRemediation($risks);
                $md[] = '';
            }
        }

        return implode("\n", $md) . "\n";
    }

    private function suggestRemediation(array $risks): string
    {
        if (empty($risks)) {
            return 'No immediate remediation needed.';
        }

        if ($this->containsRisk($risks, 'post_without_csrf')) {
            return 'Add `csrf_field()` or verify framework CSRF injection for this submit flow.';
        }
        if ($this->containsRisk($risks, 'action_no_route_match')) {
            return 'Align form action with a defined route and ensure controller mapping is valid.';
        }
        if ($this->containsRisk($risks, 'controller_expected_keys_missing')) {
            return 'Sync view field names with controller expected POST keys.';
        }
        if ($this->containsRisk($risks, 'ajax_auth_endpoint_without_credentials')) {
            return 'Ensure fetch/ajax includes credentials and required JSON/XHR headers for authenticated endpoint.';
        }

        return 'Review flagged form/controller mismatches and standardize submit flow contracts.';
    }

    private function containsRisk(array $risks, string $needle): bool
    {
        foreach ($risks as $risk) {
            if (str_starts_with((string) $risk, $needle)) {
                return true;
            }
        }

        return false;
    }
}
