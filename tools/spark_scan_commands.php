#!/usr/bin/env php
<?php

$root = realpath(__DIR__ . '/../');
if ($root === false) {
    fwrite(STDERR, "Unable to resolve project root.\n");
    exit(1);
}

define('ROOTPATH', rtrim($root, '/') . '/');

$commandRoot = realpath(ROOTPATH . 'app/Commands');
$scanTargets = [
    [
        'label' => 'app/Commands',
        'path' => $commandRoot,
        'mode' => 'commands',
    ],
    [
        'label' => 'scripts',
        'path' => realpath(ROOTPATH . 'scripts'),
        'mode' => 'scripts',
    ],
    [
        'label' => 'tools',
        'path' => realpath(ROOTPATH . 'tools'),
        'mode' => 'tools',
    ],
];

$now = new DateTimeImmutable('now');
$reportDir = ROOTPATH . 'docs/aiops/triage';
$reportPath = $reportDir . '/spark-command-audit.md';
$statusPath = $reportDir . '/spark-command-audit.json';

$valid = [];
$broken = [];
$autopatched = [];
$manual = [];
$commandCount = 0;

$issuesCatalog = [
    'missing_usage' => 'Missing $usage',
    'typed_metadata' => 'Typed metadata property',
    'missing_metadata' => 'Missing metadata',
    'bad_namespace' => 'Namespace mismatch',
    'invalid_constructor' => 'Invalid constructor signature',
    'extends_base' => 'Extends BaseCommand',
    'invalid_location' => 'Command outside /app/Commands',
    'missing_name' => 'Missing $name',
    'missing_group' => 'Missing $group',
    'missing_description' => 'Missing $description',
];

function collectPhpFiles(string $path): array
{
    if ($path === false || ! is_dir($path)) {
        return [];
    }

    $iterator = new RecursiveIteratorIterator(
        new RecursiveDirectoryIterator($path, FilesystemIterator::SKIP_DOTS)
    );

    $files = [];
    foreach ($iterator as $file) {
        if (! $file->isFile()) {
            continue;
        }
        if (strtolower($file->getExtension()) !== 'php') {
            continue;
        }
        $files[] = $file->getPathname();
    }

    return $files;
}

function expectedNamespace(string $filePath, string $commandRoot): ?string
{
    $dir = dirname($filePath);
    $relative = ltrim(str_replace($commandRoot, '', $dir), DIRECTORY_SEPARATOR);

    if ($relative === '') {
        return 'App\\Commands';
    }

    $segments = array_filter(explode(DIRECTORY_SEPARATOR, $relative));
    return 'App\\Commands\\' . implode('\\', $segments);
}

function parseCommandInfo(string $contents): array
{
    $namespace = null;
    if (preg_match('/namespace\s+([^;]+);/', $contents, $matches)) {
        $namespace = trim($matches[1]);
    }

    $class = null;
    $extends = null;
    if (preg_match('/class\s+(\w+)\s+extends\s+([\\\w]+)/', $contents, $matches)) {
        $class = $matches[1];
        $extends = $matches[2];
    }

    $metadata = [];
    $metadataTypes = [];
    foreach (['group', 'name', 'description', 'usage'] as $field) {
        if (preg_match('/protected\s+(\S+\s+)?\$' . $field . '\s*=\s*([^;]+);/', $contents, $matches)) {
            $metadata[$field] = trim($matches[2]);
            if (! empty($matches[1])) {
                $metadataTypes[$field] = trim($matches[1]);
            }
        }
    }

    $typedMetadata = [];
    foreach (['group', 'name', 'description', 'usage'] as $field) {
        if (preg_match('/protected\s+[^\$\s]+\s+\$' . $field . '\b/', $contents)) {
            $typedMetadata[] = $field;
        }
    }

    $constructor = null;
    if (preg_match('/function\s+__construct\s*\(([^)]*)\)/s', $contents, $matches)) {
        $constructor = trim(preg_replace('/\s+/', ' ', $matches[1]));
    }

    return [
        'namespace' => $namespace,
        'class' => $class,
        'extends' => $extends,
        'metadata' => $metadata,
        'typed_metadata' => $typedMetadata,
        'constructor' => $constructor,
    ];
}

function isValidConstructor(?string $signature): bool
{
    if ($signature === null || $signature === '') {
        return true;
    }

    return str_contains($signature, 'LoggerInterface') && str_contains($signature, 'Commands');
}

function sanitizeMetadataTypes(string $contents, array $typedFields): array
{
    $changes = [];
    foreach ($typedFields as $field) {
        $pattern = '/protected\s+[^\$\s]+\s+\$' . $field . '\b/';
        $replacement = 'protected $' . $field;
        if (preg_match($pattern, $contents)) {
            $contents = preg_replace($pattern, $replacement, $contents, 1);
            $changes[] = 'Removed typed metadata for $' . $field;
        }
    }

    return [$contents, $changes];
}

function ensureSafeBaseCommand(string $contents, string $namespace): array
{
    $changes = [];
    if (! preg_match('/class\s+\w+\s+extends\s+BaseCommand\b/', $contents)) {
        return [$contents, $changes];
    }

    $contents = preg_replace('/extends\s+BaseCommand\b/', 'extends SafeBaseCommand', $contents, 1);
    $changes[] = 'Replaced BaseCommand with SafeBaseCommand';

    if ($namespace !== 'App\\Commands') {
        if (! preg_match('/use\s+App\\Commands\\SafeBaseCommand;/', $contents)) {
            $contents = preg_replace('/namespace\s+[^;]+;\s*/', "$0\nuse App\\Commands\\SafeBaseCommand;\n", $contents, 1);
            $changes[] = 'Added SafeBaseCommand import';
        }
    }

    return [$contents, $changes];
}

function injectUsage(string $contents, string $usageValue): array
{
    $changes = [];
    if (preg_match('/protected\s+\$usage\b/', $contents)) {
        return [$contents, $changes];
    }

    $usageLine = "    protected \$usage       = {$usageValue};\n";

    if (preg_match('/^\s*protected\s+\$description[^;]+;\s*$/m', $contents, $matches)) {
        $contents = preg_replace('/(^\s*protected\s+\$description[^;]+;\s*$)/m', "$1\n" . $usageLine, $contents, 1);
        $changes[] = 'Injected $usage after $description';
        return [$contents, $changes];
    }

    if (preg_match('/^\s*protected\s+\$name[^;]+;\s*$/m', $contents)) {
        $contents = preg_replace('/(^\s*protected\s+\$name[^;]+;\s*$)/m', "$1\n" . $usageLine, $contents, 1);
        $changes[] = 'Injected $usage after $name';
        return [$contents, $changes];
    }

    if (preg_match('/^\s*protected\s+\$group[^;]+;\s*$/m', $contents)) {
        $contents = preg_replace('/(^\s*protected\s+\$group[^;]+;\s*$)/m', "$1\n" . $usageLine, $contents, 1);
        $changes[] = 'Injected $usage after $group';
        return [$contents, $changes];
    }

    if (preg_match('/class\s+\w+\s+extends\s+\w+\s*\{/', $contents, $matches, PREG_OFFSET_CAPTURE)) {
        $offset = $matches[0][1] + strlen($matches[0][0]);
        $contents = substr_replace($contents, "\n" . $usageLine, $offset, 0);
        $changes[] = 'Injected $usage at top of class';
    }

    return [$contents, $changes];
}

function hasExecutableFlag(string $path): bool
{
    return is_executable($path);
}

function isCommandClass(array $info): bool
{
    if ($info['class'] === null || $info['extends'] === null) {
        return false;
    }

    return in_array($info['extends'], ['SafeBaseCommand', 'BaseCommand', 'CodeIgniter\\CLI\\BaseCommand'], true);
}

foreach ($scanTargets as $target) {
    $files = collectPhpFiles($target['path']);
    foreach ($files as $file) {
        if (basename($file) === 'SafeBaseCommand.php') {
            continue;
        }
        $contents = file_get_contents($file);
        if ($contents === false) {
            continue;
        }

        $info = parseCommandInfo($contents);
        if (! isCommandClass($info)) {
            continue;
        }

        if ($target['mode'] === 'scripts' && ! hasExecutableFlag($file)) {
            continue;
        }

        $commandCount++;
        $issues = [];
        $changes = [];
        $manualIssues = [];

        $namespace = $info['namespace'] ?? '';
        if ($target['mode'] === 'commands' && $commandRoot && $file) {
            $expected = expectedNamespace($file, $commandRoot);
            if ($expected !== null && $namespace !== $expected) {
                $issues[] = $issuesCatalog['bad_namespace'];
                $manualIssues[] = 'Namespace should be ' . $expected;
            }
        }

        if ($target['mode'] !== 'commands') {
            $issues[] = $issuesCatalog['invalid_location'];
            $manualIssues[] = 'Commands must live in /app/Commands';
        }

        if (! empty($info['typed_metadata'])) {
            $issues[] = $issuesCatalog['typed_metadata'];
            [$contents, $typedChanges] = sanitizeMetadataTypes($contents, $info['typed_metadata']);
            $changes = array_merge($changes, $typedChanges);
        }

        if (! isValidConstructor($info['constructor'])) {
            $issues[] = $issuesCatalog['invalid_constructor'];
            $manualIssues[] = 'Constructor signature must include LoggerInterface and Commands';
        }

        if ($info['extends'] === 'BaseCommand' || $info['extends'] === 'CodeIgniter\\CLI\\BaseCommand') {
            $issues[] = $issuesCatalog['extends_base'];
            [$contents, $extendChanges] = ensureSafeBaseCommand($contents, $namespace ?? '');
            $changes = array_merge($changes, $extendChanges);
        }

        foreach (['group', 'name', 'description', 'usage'] as $field) {
            if (! array_key_exists($field, $info['metadata'])) {
                $issues[] = $issuesCatalog['missing_metadata'];
                if ($field === 'usage') {
                    $issues[] = $issuesCatalog['missing_usage'];
                }

                if ($field === 'name') {
                    $issues[] = $issuesCatalog['missing_name'];
                }
                if ($field === 'group') {
                    $issues[] = $issuesCatalog['missing_group'];
                }
                if ($field === 'description') {
                    $issues[] = $issuesCatalog['missing_description'];
                }
            }
        }

        if (! array_key_exists('usage', $info['metadata'])) {
            if (isset($info['metadata']['name'])) {
                [$contents, $usageChanges] = injectUsage($contents, $info['metadata']['name']);
                $changes = array_merge($changes, $usageChanges);
            } else {
                $manualIssues[] = 'Cannot infer $usage without $name';
            }
        }

        if (! empty($changes)) {
            $file = ROOTPATH . ltrim(str_replace(ROOTPATH, '', $file), '/');
            file_put_contents($file, $contents);
        }

        $infoAfter = parseCommandInfo($contents);
        $postIssues = [];

        if (! empty($infoAfter['typed_metadata'])) {
            $postIssues[] = $issuesCatalog['typed_metadata'];
        }

        if (! isValidConstructor($infoAfter['constructor'])) {
            $postIssues[] = $issuesCatalog['invalid_constructor'];
        }

        foreach (['group', 'name', 'description', 'usage'] as $field) {
            if (! array_key_exists($field, $infoAfter['metadata'])) {
                $postIssues[] = $issuesCatalog['missing_metadata'] . " ($field)";
            }
        }

        $entry = [
            'file' => $file,
            'class' => $infoAfter['class'] ?? 'unknown',
            'name' => $infoAfter['metadata']['name'] ?? null,
            'issues' => array_values(array_unique(array_merge($issues, $postIssues, $manualIssues))),
            'changes' => $changes,
        ];

        if (empty($entry['issues'])) {
            $valid[] = $entry;
        } else {
            $broken[] = $entry;
            if (! empty($changes)) {
                $autopatched[] = $entry;
            }

            if (! empty($manualIssues) || ! empty($postIssues)) {
                $manual[] = $entry;
            }
        }
    }
}

if (! is_dir($reportDir)) {
    mkdir($reportDir, 0777, true);
}

$lines = [];
$lines[] = '# Spark Command Audit';
$lines[] = '';
$lines[] = '- Timestamp: ' . $now->format('c');
$lines[] = '- Command Count: ' . $commandCount;
$lines[] = '';

$lines[] = '## ✅ Valid Commands';
if (empty($valid)) {
    $lines[] = '- None';
} else {
    foreach ($valid as $entry) {
        $lines[] = sprintf('- %s (%s)', $entry['class'], str_replace($root . '/', '', $entry['file']));
    }
}
$lines[] = '';

$lines[] = '## ❌ Broken Commands';
if (empty($broken)) {
    $lines[] = '- None';
} else {
    foreach ($broken as $entry) {
        $lines[] = sprintf('- %s (%s)', $entry['class'], str_replace($root . '/', '', $entry['file']));
        foreach ($entry['issues'] as $issue) {
            $lines[] = '  - ' . $issue;
        }
    }
}
$lines[] = '';

$lines[] = '## 🔧 Auto-Patched';
if (empty($autopatched)) {
    $lines[] = '- None';
} else {
    foreach ($autopatched as $entry) {
        $lines[] = sprintf('- %s (%s)', $entry['class'], str_replace($root . '/', '', $entry['file']));
        foreach ($entry['changes'] as $change) {
            $lines[] = '  - ' . $change;
        }
    }
}
$lines[] = '';

$lines[] = '## ⛔ Manual Intervention Needed';
if (empty($manual)) {
    $lines[] = '- None';
} else {
    foreach ($manual as $entry) {
        $lines[] = sprintf('- %s (%s)', $entry['class'], str_replace($root . '/', '', $entry['file']));
        foreach ($entry['issues'] as $issue) {
            $lines[] = '  - ' . $issue;
        }
    }
}
$lines[] = '';

file_put_contents($reportPath, implode("\n", $lines) . "\n");

$status = [
    'status' => empty($broken) ? 'ok' : 'broken',
    'commands' => $commandCount,
    'last_check' => $now->format('Y-m-d H:i:s'),
    'report' => 'docs/aiops/triage/spark-command-audit.md',
];
file_put_contents($statusPath, json_encode($status, JSON_PRETTY_PRINT));

if (! empty($broken)) {
    echo "❌ Spark command audit failed. See {$reportPath}.\n";
    exit(1);
}

echo "✅ Spark command audit passed. Report written to {$reportPath}.\n";
exit(0);
