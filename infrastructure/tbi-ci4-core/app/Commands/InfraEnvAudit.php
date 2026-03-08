<?php

declare(strict_types=1);

namespace App\Commands;

use App\Services\Infra\ReportWriter;
use App\Commands\SafeBaseCommand;
use CodeIgniter\CLI\CLI;

class InfraEnvAudit extends SafeBaseCommand
{
    protected $group = 'Infrastructure';
    protected $name = 'infra:env-audit';
    protected $description = 'Audits .env.template completeness for infrastructure toggles.';

    public function run(array $params): void
    {
        $template = ROOTPATH . 'infrastructure/tbi-ci4-core/.env.template';
        $contents = is_file($template) ? (string) file_get_contents($template) : '';

        $required = [
            'feature.integration.alphavantage',
            'feature.aiops.enabled',
            'redis.enabled',
            'email.smtp.host',
            'chat.ollama.enabled',
            'python.runner.enabled',
            'governance.audit.enabled',
            'logging.channel',
            'debug.toolbar.enabled',
            'security.strict_mode',
            'cron.enabled',
        ];

        $missing = array_values(array_filter($required, static fn (string $k): bool => strpos($contents, $k) === false));

        $md = "# Env Template Audit\n\n";
        $md .= $missing === [] ? "All required key families are present.\n" : "Missing keys:\n- " . implode("\n- ", $missing) . "\n";

        (new ReportWriter(ROOTPATH . 'infrastructure/tbi-ci4-core/docs/_infrastructure'))
            ->writeMarkdown('env-template-audit.md', $md);

        CLI::write('Generated env-template-audit.md', 'green');
    }
}
