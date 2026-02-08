<?php

namespace App\Commands\Ops;

use App\Commands\SafeBaseCommand;
use App\Commands\Support\ArtifactHelper;
use App\Libraries\Ops\PrOutboxWriter;

class ProposePr extends SafeBaseCommand
{
    protected $group       = 'ops';
    protected $name        = 'ops:propose-pr';
    protected $description = 'Generate and validate a PR artifact bundle, then export to tracked outbox for GitHub automation.';

    protected $usage = 'ops:propose-pr --slug=... --title=... --body=... --patch=... [--risk=low|medium|high] [--approve] [--dry-run]';
    protected $options = [
        '--slug'    => 'Required. Short identifier (kebab-case). Example: spark-taxonomy-fix',
        '--title'   => 'Required. PR title.',
        '--body'    => 'Required. PR description body (plain text or markdown).',
        '--patch'   => 'Required. Path to unified diff patch file.',
        '--risk'    => 'Optional. low|medium|high. Default: low',
        '--emit'    => 'Optional. table|json|md (default: table)',
        '--out'     => 'Optional. Write a summary artifact to a file path.',
        '--dry-run' => 'Optional. Do not write files; show what would be done.',
        '--approve' => 'Optional. Required to export to tracked outbox (mutating operation).',
    ];

    public function run(array $params)
    {
        [, $flags] = $this->parseParams($params);
        $emit = (string) (ArtifactHelper::parseOptionValue($params, 'emit') ?: 'table');
        $out = (string) (ArtifactHelper::parseOptionValue($params, 'out') ?? '');
        $dryRun = isset($flags['dry-run']);
        $approve = isset($flags['approve']);

        $slug = trim((string) (ArtifactHelper::parseOptionValue($params, 'slug') ?? ''));
        $title = trim((string) (ArtifactHelper::parseOptionValue($params, 'title') ?? ''));
        $body = trim((string) (ArtifactHelper::parseOptionValue($params, 'body') ?? ''));
        $patch = trim((string) (ArtifactHelper::parseOptionValue($params, 'patch') ?? ''));
        $risk = strtolower(trim((string) (ArtifactHelper::parseOptionValue($params, 'risk') ?? 'low')));

        if ($slug === '' || $title === '' || $body === '' || $patch === '') {
            return $this->failUsage('Missing required options: --slug, --title, --body, --patch');
        }

        if (!in_array($risk, ['low', 'medium', 'high'], true)) {
            return $this->failUsage('Invalid --risk. Use low|medium|high');
        }

        if (!is_file($patch)) {
            return $this->failWith(20, "Patch file not found: {$patch}");
        }

        // Guardrails: Only allow patch touching allowlisted paths
        $allowlist = [
            'docs/',
            'app/Commands/',
            'app/Config/Console.php',
            'scripts/ci/',
            'scripts/aiops/',
            'aiops/', // allow AI ops system files
        ];

        $bundle = $this->buildBundle($slug);
        $writableDir = $bundle['writable_dir'];
        $outboxDir   = $bundle['outbox_dir'];

        $manifest = [
            'source'        => 'aiops',
            'spark_command' => $this->name,
            'slug'          => $slug,
            'title'         => $title,
            'risk'          => $risk,
            'requires_review' => true,
            'allow_auto_pr'   => true,
            'created_at'      => date('c'),
            'allowlist'       => $allowlist,
        ];

        $guardrails = $this->validatePatchGuardrails($patch);
        if (!$guardrails['ok']) {
            return $this->failWith(11, 'Guardrail violation: ' . $guardrails['error']);
        }

        $validation = $this->validatePatchAllowlist($patch, $allowlist);
        if (!$validation['ok']) {
            return $this->failWith(10, 'Guardrail violation: ' . $validation['error']);
        }

        $actions = [
            "Write bundle to {$writableDir}",
            "Write pr.md, manifest.json, changes.patch",
        ];

        if (!$approve) {
            $actions[] = "Export to tracked outbox: {$outboxDir} (REQUIRES --approve)";
        } else {
            $actions[] = "Export to tracked outbox: {$outboxDir}";
        }

        if ($dryRun) {
            return $this->emitResult([
                'status' => 'success',
                'exit_code' => 0,
                'findings_count' => 0,
                'artifacts' => [],
                'meta' => [
                    'dry_run' => true,
                    'actions' => $actions,
                    'validated_paths' => $validation['paths'],
                ],
            ], $emit, $out);
        }

        // Ensure dirs
        $this->ensureDir($writableDir);
        $this->ensureDir($outboxDir);

        // Write bundle files to writable staging
        $prMdPath = rtrim($writableDir, '/') . '/pr.md';
        $manifestPath = rtrim($writableDir, '/') . '/manifest.json';
        $patchPath = rtrim($writableDir, '/') . '/changes.patch';

        $prMd = $this->renderPrMd($title, $body, $manifest, $validation['paths']);

        $this->safeWriteFile($prMdPath, $prMd);
        $this->safeWriteFile($manifestPath, json_encode($manifest, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES) . PHP_EOL);
        $patchContent = file_get_contents($patch);
        if ($patchContent === false) {
            return $this->failWith(21, "Unable to read patch file: {$patch}");
        }
        $this->safeWriteFile($patchPath, $patchContent);

        $artifacts = [$prMdPath, $manifestPath, $patchPath];

        // Export step is mutating tracked repo state => require --approve
        if (!$approve) {
            $this->writePrOutboxBundle($title, $body, $risk, $validation['paths'], $patchContent);
            return $this->emitResult([
                'status' => 'success',
                'exit_code' => 1,
                'findings_count' => 1,
                'artifacts' => $artifacts,
                'meta' => [
                    'message' => 'Bundle staged in writable. Re-run with --approve to export to tracked outbox for PR automation.',
                    'pr_hint' => 'If GitHub reports "Pull request already exists for this branch", push new commits to the same branch to update that PR or create a new branch for a separate PR.',
                    'writable_dir' => $writableDir,
                    'outbox_dir' => $outboxDir,
                    'validated_paths' => $validation['paths'],
                ],
            ], $emit, $out);
        }

        // Export to tracked outbox
        $this->copyBundle($writableDir, $outboxDir);
        $this->writePrOutboxBundle($title, $body, $risk, $validation['paths'], $patchContent);

        return $this->emitResult([
            'status' => 'success',
            'exit_code' => 0,
            'findings_count' => 0,
            'artifacts' => [
                $outboxDir . '/pr.md',
                $outboxDir . '/manifest.json',
                $outboxDir . '/changes.patch',
            ],
            'meta' => [
                'message' => 'Exported PR bundle to tracked outbox. Commit/push to trigger GitHub Action PR creation.',
                'pr_hint' => 'If GitHub reports "Pull request already exists for this branch", push additional commits to update existing PR or use a new branch name.',
                'outbox_dir' => $outboxDir,
                'validated_paths' => $validation['paths'],
            ],
        ], $emit, $out);
    }

    private function buildBundle(string $slug): array
    {
        $date = date('Y-m-d');
        $baseDir = ROOTPATH . 'docs/aiops/prs';
        $writableDir = $baseDir . '/staging/' . $date . '/' . $slug;
        $outboxDir = $baseDir . '/outbox/' . $date . '/' . $slug;

        return [
            'writable_dir' => $writableDir,
            'outbox_dir'   => $outboxDir,
        ];
    }

    private function validatePatchAllowlist(string $patchFile, array $allowlist): array
    {
        $content = file_get_contents($patchFile);
        if ($content === false || trim($content) === '') {
            return ['ok' => false, 'error' => 'Patch is empty or unreadable', 'paths' => []];
        }

        $paths = $this->extractPatchPaths($content);

        if (empty($paths)) {
            return ['ok' => false, 'error' => 'No file paths detected in patch (missing +++ b/ lines)', 'paths' => []];
        }

        foreach ($paths as $p) {
            $ok = false;
            foreach ($allowlist as $allowed) {
                if ($allowed === $p) {
                    $ok = true;
                    break;
                }
                if (substr($allowed, -1) === '/' && strpos($p, $allowed) === 0) {
                    $ok = true;
                    break;
                }
            }
            if (!$ok) {
                return [
                    'ok' => false,
                    'error' => "Patch touches non-allowlisted path: {$p}",
                    'paths' => $paths,
                ];
            }
        }

        return ['ok' => true, 'error' => '', 'paths' => $paths];
    }

    private function validatePatchGuardrails(string $patchFile): array
    {
        $content = file_get_contents($patchFile);
        if ($content === false || trim($content) === '') {
            return ['ok' => false, 'error' => 'Patch is empty or unreadable', 'paths' => []];
        }

        if (preg_match('/^GIT binary patch/m', $content) === 1) {
            return ['ok' => false, 'error' => 'Patch contains binary data (GIT binary patch).', 'paths' => []];
        }

        $paths = $this->extractPatchPaths($content);
        if (empty($paths)) {
            return ['ok' => false, 'error' => 'No file paths detected in patch (missing +++ b/ lines)', 'paths' => []];
        }

        $maxFiles = 250;
        if (count($paths) > $maxFiles) {
            return ['ok' => false, 'error' => "Patch touches too many files (" . count($paths) . " > {$maxFiles}).", 'paths' => $paths];
        }

        foreach ($paths as $path) {
            if (preg_match('#(^|/)node_modules(/|$)#', $path) === 1) {
                return ['ok' => false, 'error' => "Patch includes node_modules path: {$path}", 'paths' => $paths];
            }
            if (preg_match('/\\.(node|o|a|so|dll|dylib)$/i', $path) === 1) {
                return ['ok' => false, 'error' => "Patch includes native build artifact: {$path}", 'paths' => $paths];
            }
            if (preg_match('#(^|/)__pycache__(/|$)#', $path) === 1 || preg_match('/\\.pyc$/i', $path) === 1) {
                return ['ok' => false, 'error' => "Patch includes Python cache artifact: {$path}", 'paths' => $paths];
            }
        }

        return ['ok' => true, 'error' => '', 'paths' => $paths];
    }

    /**
     * @param array<int, string> $paths
     */
    private function writePrOutboxBundle(string $title, string $body, string $risk, array $paths, string $patchContent): void
    {
        $writer = new PrOutboxWriter();
        $writer->write([
            'date' => date('Y-m-d'),
            'title' => $title,
            'source' => $this->name,
            'why' => 'Generated via ops:propose-pr.',
            'summary' => $body,
            'files' => $paths,
            'risk' => $risk,
            'patch' => $patchContent,
        ]);
    }

    private function extractPatchPaths(string $content): array
    {
        $paths = [];
        foreach (preg_split('/\R/', $content) as $line) {
            // Unified diff markers: +++ b/path or --- a/path
            if (strpos($line, '+++ b/') === 0) {
                $path = trim(substr($line, 6));
                if ($path !== '/dev/null') {
                    $paths[] = $path;
                }
            }
        }

        return array_values(array_unique($paths));
    }

    private function renderPrMd(string $title, string $body, array $manifest, array $paths): string
    {
        $pathsList = '';
        foreach ($paths as $p) {
            $pathsList .= "- `{$p}`\n";
        }

        $risk = strtoupper($manifest['risk']);

        return <<<MD
# {$title}

## Origin
- Spark command: {$manifest['spark_command']}
- Created: {$manifest['created_at']}
- Slug: {$manifest['slug']}

## Summary
{$body}

## Files Affected
{$pathsList}
## Risk Level
{$risk}

## Guardrails
- Allowlisted paths only
- Requires human review: yes
- Auto-PR allowed: {$this->boolToYesNo((bool) $manifest['allow_auto_pr'])}

## Rollback
Revert the PR commit(s). No DB migrations or prod mutations are included.

MD;
    }

    private function boolToYesNo(bool $v): string
    {
        return $v ? 'yes' : 'no';
    }

    private function ensureDir(string $dir): void
    {
        $rootedDir = str_starts_with($dir, ROOTPATH)
            ? $dir
            : ROOTPATH . ltrim($dir, '/');

        if (!is_dir($rootedDir)) {
            mkdir($rootedDir, 0775, true);
        }
    }

    private function safeWriteFile(string $path, string $content): void
    {
        $rootedPath = str_starts_with($path, ROOTPATH)
            ? $path
            : ROOTPATH . ltrim($path, '/');
        $docsRoot = rtrim(ROOTPATH, '/') . '/docs/';
        if (! str_starts_with($rootedPath, $docsRoot)) {
            throw new \RuntimeException("Refusing to write outside docs/: {$rootedPath}");
        }
        $dir = dirname($rootedPath);
        $this->ensureDir($dir);

        if (file_put_contents($rootedPath, $content) === false) {
            throw new \RuntimeException("Failed to write file: {$rootedPath}");
        }
    }

    private function copyBundle(string $fromDir, string $toDir): void
    {
        $files = ['pr.md', 'manifest.json', 'changes.patch'];
        foreach ($files as $f) {
            $src = rtrim($fromDir, '/') . '/' . $f;
            $dst = rtrim($toDir, '/') . '/' . $f;

            $this->ensureDir(dirname($dst));
            if (!copy($src, $dst)) {
                throw new \RuntimeException("Failed to export bundle file {$f} to outbox");
            }
        }
    }

    private function emitResult(array $payload, string $emit, string $out)
    {
        // If your SafeBaseCommand already has an emitter, use it.
        // Otherwise, minimal stdout emitter here:
        if ($emit === 'json') {
            $json = json_encode($payload, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES) . PHP_EOL;
            if ($out !== '') {
                $this->safeWriteFile($out, $json);
            } else {
                $this->write($json);
            }
            return $payload['exit_code'] ?? 0;
        }

        // Table-ish
        $lines = [];
        $lines[] = "Status: " . ($payload['status'] ?? 'unknown');
        $lines[] = "Exit: " . ($payload['exit_code'] ?? 0);
        $lines[] = "Findings: " . ($payload['findings_count'] ?? 0);

        if (!empty($payload['meta']['message'])) {
            $lines[] = "Note: " . $payload['meta']['message'];
        }

        if (!empty($payload['artifacts'])) {
            $lines[] = "Artifacts:";
            foreach ($payload['artifacts'] as $a) {
                $lines[] = " - {$a}";
            }
        }

        $text = implode(PHP_EOL, $lines) . PHP_EOL;

        if ($out !== '') {
            $this->safeWriteFile($out, $text);
        } else {
            $this->write($text);
        }

        return (int) ($payload['exit_code'] ?? 0);
    }

    private function failUsage(string $msg)
    {
        $this->write("Usage Error: {$msg}" . PHP_EOL);
        return 2;
    }

    private function failWith(int $exitCode, string $msg)
    {
        $this->write("Error: {$msg}" . PHP_EOL);
        return $exitCode;
    }
}
