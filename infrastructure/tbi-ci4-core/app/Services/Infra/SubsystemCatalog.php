<?php

declare(strict_types=1);

namespace App\Services\Infra;

class SubsystemCatalog
{
    /** @return array<string,array<string,mixed>> */
    public function all(): array
    {
        return [
            'service_overrides' => [
                'name' => 'Service container overrides',
                'path' => 'app/Config/Services.php',
                'portable' => true,
                'toggleable' => true,
                'hard_coded' => false,
                'env_keys' => ['feature.infrastructure.enabled'],
                'config_entries' => ['Config/Features.php', 'Config/Infrastructure.php'],
                'db_tables' => [],
                'cron_jobs' => [],
                'spark_commands' => [],
            ],
            'spark_commands' => [
                'name' => 'Spark command extensions',
                'path' => 'app/Commands',
                'portable' => true,
                'toggleable' => true,
                'hard_coded' => false,
                'env_keys' => ['feature.ops.commands'],
                'config_entries' => ['Config/Console.php'],
                'db_tables' => [],
                'cron_jobs' => ['manual/cron bridge'],
                'spark_commands' => ['infra:*', 'ops:*'],
            ],
            'aiops' => [
                'name' => 'AIOps modules',
                'path' => 'app/Services/AIOps, app/Config/AiOps.php',
                'portable' => true,
                'toggleable' => true,
                'hard_coded' => true,
                'env_keys' => ['AIOPS_DISCORD_WEBHOOK', 'AIOPS_GITHUB_TOKEN'],
                'config_entries' => ['Config/AiOps.php', 'Config/Features.php'],
                'db_tables' => ['bf_ai_usage (when enabled)'],
                'cron_jobs' => ['ops runners'],
                'spark_commands' => ['ops:*'],
            ],
            'integrations' => [
                'name' => 'External API clients',
                'path' => 'app/Libraries + app/Services integration classes',
                'portable' => true,
                'toggleable' => true,
                'hard_coded' => true,
                'env_keys' => ['INTEGRATION_*'],
                'config_entries' => ['Config/Integrations.php', 'Config/Features.php'],
                'db_tables' => ['bf_investment_trade_alerts', 'bf_email_outbox'],
                'cron_jobs' => ['marketing/news/alert cron endpoints'],
                'spark_commands' => ['infra:integration-health'],
            ],
        ];
    }
}
