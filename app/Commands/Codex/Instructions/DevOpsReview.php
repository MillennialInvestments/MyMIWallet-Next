<?php

namespace App\Commands\Codex\Instructions;

use App\Commands\SafeBaseCommand;
use CodeIgniter\CLI\CLI;

class DevOpsReview extends SafeBaseCommand
{
    protected $group = 'Codex';
    protected $name = 'codex:instruct:devops_review';
    protected $description = 'Generate instruction payload to audit AI DevOps layer against docs/*';

    public function run(array $params)
    {
        $docsPath = ROOTPATH . 'docs';
        $appPath  = APPPATH . 'Commands';

        $docs = $this->collectFiles($docsPath);
        $commands = $this->collectFiles($appPath);

        $prompt = $this->buildPrompt($docs, $commands);

        $outPath = WRITEPATH . 'audit/devops_meta_review_prompt.txt';
        @is_dir(dirname($outPath)) || @mkdir(dirname($outPath), 0775, true);

        file_put_contents($outPath, $prompt);

        CLI::write("Generated: {$outPath}");
    }

    private function collectFiles(string $base): array
    {
        $files = [];

        if (!is_dir($base)) return $files;

        $rii = new \RecursiveIteratorIterator(
            new \RecursiveDirectoryIterator($base)
        );

        foreach ($rii as $file) {
            if ($file->isDir()) continue;
            if (in_array($file->getExtension(), ['php', 'md', 'json'])) {
                $files[] = $file->getPathname();
            }
        }

        return $files;
    }

    private function buildPrompt(array $docs, array $commands): string
    {
        return
"You are auditing an AI DevOps platform inside a CI4 financial application.

Audit Goals:
- Architectural correctness
- Security posture
- Cost control logic
- Severity gating logic
- Observability correctness
- Patch safety
- Rollback safety
- Regression detection robustness
- PR promotion safety
- CI/CD integration safety
- Logging completeness
- Runtime failure containment

Docs Files:
" . implode("\n", $docs) . "

Command Files:
" . implode("\n", $commands) . "

Respond ONLY in JSON:
{
  \"architecture_gaps\": [],
  \"security_risks\": [],
  \"cost_risks\": [],
  \"stability_risks\": [],
  \"performance_risks\": [],
  \"missing_components\": [],
  \"recommended_improvements\": [],
  \"severity_level\": \"LOW|MEDIUM|HIGH\"
}
";
    }
}
