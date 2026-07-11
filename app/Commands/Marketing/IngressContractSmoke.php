<?php

declare(strict_types=1);

namespace App\Commands\Marketing;

use App\Services\Marketing\MarketingZapierIngressService;
use App\Commands\SafeBaseCommand;
use CodeIgniter\CLI\CLI;

final class IngressContractSmoke extends SafeBaseCommand
{
    protected $group = 'Marketing';
    protected $name = 'marketing:ingress:contract-smoke';
    protected $description = 'Validates the disabled, intake-only GT-NH-005 Zapier ingress contract.';
    protected $usage = 'marketing:ingress:contract-smoke';

    public function run(array $params)
    {
        $failures = 0;

        $check = static function (
            bool $condition,
            string $message
        ) use (&$failures): void {
            if ($condition) {
                CLI::write('PASS: ' . $message, 'green');
                return;
            }

            $failures++;
            CLI::error('FAIL: ' . $message);
        };

        CLI::write(
            '===== GT-NH-005 ZAPIER INGRESS CONTRACT SMOKE =====',
            'yellow'
        );

        $routes = (string) file_get_contents(
            APPPATH . 'Config/Routes.php'
        );
        $filters = (string) file_get_contents(
            APPPATH . 'Config/Filters.php'
        );
        $migration = (string) file_get_contents(
            APPPATH
            . 'Database/Migrations/'
            . '2026-07-11-150000_CreateMarketingIngressTables.php'
        );

        $check(
            str_contains(
                $routes,
                "post('Ingress', 'MarketingIngressAPIController::receive'"
            ),
            'POST API/Marketing/Ingress route is declared'
        );

        $check(
            str_contains($routes, "filter' => 'marketingZapierIngress"),
            'route uses the dedicated ingress filter'
        );

        $check(
            str_contains($filters, "'marketingZapierIngress'"),
            'dedicated filter alias is registered'
        );

        $check(
            str_contains($migration, 'bf_marketing_zapier_ingress'),
            'inbound webhook table migration is declared'
        );

        $check(
            str_contains($migration, 'bf_marketing_zapier_ingress_idempotency'),
            'idempotency table migration is declared'
        );

        $config = config('Marketing')->zapierIngress;

        $check(
            ($config['enabled'] ?? null) === false,
            'ingress is disabled by default'
        );

        $check(
            (
                $config['contract_test_enabled']
                ?? null
            ) === false,
            'CLI contract-test mode is disabled by default'
        );

        $check(
            trim((string) ($config['webhook_key'] ?? '')) === '',
            'no webhook secret is committed'
        );

        $check(
            class_exists(
                \App\Models\Marketing\MarketingZapierIngressModel::class
            ),
            'dedicated ingress model resolves'
        );

        $check(
            class_exists(
                \App\Models\Marketing\MarketingZapierIngressIdempotencyModel::class
            ),
            'dedicated idempotency model resolves'
        );

        $service = new MarketingZapierIngressService();

        $validPayload = [
            'source_type' => 'rss',
            'source_name' => 'Example Financial Feed',
            'source_domain' => 'example.com',
            'feed_url' => 'https://example.com/feed.xml',
            'item_guid' => 'example-guid-001',
            'title' => 'Example Financial News Story',
            'canonical_url' => 'https://example.com/news/example-story',
            'published_at' => '2026-07-11T14:00:00Z',
            'retrieved_at' => '2026-07-11T14:05:00Z',
            'author' => 'Example Author',
            'summary' => 'Contract-only sample summary.',
            'content' => 'Contract-only sample content.',
            'categories' => ['markets', 'investing'],
            'raw_payload_hash' => hash('sha256', 'contract-sample'),
            'metadata' => [
                'contract_test' => true,
            ],
        ];

        $valid = $service->preview(
            'rss-by-zapier',
            'gt-nh-005-contract-001',
            $validPayload
        );

        $check(
            $valid['status_code'] === 202,
            'valid payload passes without database persistence'
        );

        $invalidPayload = $validPayload;
        unset($invalidPayload['item_guid']);

        $invalid = $service->preview(
            'rss-by-zapier',
            'gt-nh-005-contract-002',
            $invalidPayload
        );

        $check(
            $invalid['status_code'] === 422,
            'missing item_guid is rejected'
        );

        $ownedFiles = [
            APPPATH . 'Filters/MarketingZapierIngressFilter.php',
            APPPATH
                . 'Modules/APIs/Controllers/'
                . 'MarketingIngressAPIController.php',
            APPPATH
                . 'Services/Marketing/'
                . 'MarketingZapierIngressService.php',
        ];

        $forbidden = [
            'ZapierService',
            'sendToZapier',
            'curl_init',
            'curl_exec',
            'MarketingAPIController',
        ];

        foreach ($ownedFiles as $file) {
            $source = (string) file_get_contents($file);

            foreach ($forbidden as $token) {
                $check(
                    ! str_contains($source, $token),
                    basename($file)
                    . ' contains no outbound token: '
                    . $token
                );
            }
        }

        if ($failures > 0) {
            CLI::error(
                'GT-NH-005 contract smoke failed with '
                . $failures
                . ' failure(s).'
            );

            return 1;
        }

        CLI::write(
            'STATUS: PASS - intake-only contract validated',
            'green'
        );

        return 0;
    }
}
