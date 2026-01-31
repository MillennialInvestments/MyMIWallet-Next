#!/usr/bin/env php
<?php

declare(strict_types=1);

$base = realpath(__DIR__ . '/../');
$commandsRoot = $base . '/app/Commands';
$triageDir = $base . '/writable/triage';

if (!is_dir($triageDir)) {
    @mkdir($triageDir, 0775, true);
}

$reportPath = $triageDir . '/spark-fix-report.md';
$report = [];
$report[] = '# Spark Fix Report';
$report[] = 'Generated: ' . date('Y-m-d H:i:s');
$report[] = '';

function writeReport(string $path, array $lines): void
{
    file_put_contents($path, implode("\n", $lines) . "\n");
}

function patchFile(string $path, string $contents, array &$report): string
{
    $original = $contents;
    $changed = false;

    // 1) Prefer SafeBaseCommand
    if (preg_match('/extends\s+BaseCommand\b/', $contents)) {
        // Ensure use statement exists OR use fully qualified reference
        if (!str_contains($contents, 'use App\\Commands\\SafeBaseCommand;')) {
            // insert after namespace + uses block (best-effort)
            $contents = preg_replace(
                '/namespace\s+[^;]+;\s*/',
                "$0\nuse App\\Commands\\SafeBaseCommand;\n",
                $contents,
                1,
                $count
            );
        }
        $contents = preg_replace('/extends\s+BaseCommand\b/', 'extends SafeBaseCommand', $contents);
        $changed = true;
    }

    // 2) Remove typed metadata properties (protected string $name ...)
    $typedProps = [
        'group', 'name', 'description', 'usage',
        'options', 'arguments'
    ];
    foreach ($typedProps as $prop) {
        $pattern = '/protected\s+(?:string|array)\s+\$' . preg_quote($prop, '/') . '\b/';
        if (preg_match($pattern, $contents)) {
            $contents = preg_replace($pattern, 'protected $' . $prop, $contents);
            $changed = true;
        }
    }

    // 3) Ensure $usage exists (required for your standards; also helps clarity)
    if (!preg_match('/protected\s+\$usage\s*=/', $contents)) {
        // best-effort: insert after description if present, else after $name
        if (preg_match('/protected\s+\$description\s*=.*?;\s*/s', $contents)) {
            $contents = preg_replace(
                '/(protected\s+\$description\s*=.*?;\s*)/s',
                "$1\n    protected \$usage       = 'command:name';\n",
                $contents,
                1,
                $count
            );
            $changed = $changed || ($count > 0);
        } elseif (preg_match('/protected\s+\$name\s*=.*?;\s*/s', $contents)) {
            $contents = preg_replace(
                '/(protected\s+\$name\s*=.*?;\s*)/s',
                "$1\n    protected \$usage       = 'command:name';\n",
                $contents,
                1,
                $count
            );
            $changed = $changed || ($count > 0);
        }
    }

    // 4) Fix constructor signature if present and wrong
    // If a __construct exists, force CI4.6 signature
    if (preg_match('/function\s+__construct\s*\((.*?)\)/s', $contents, $m)) {
        $sig = preg_replace('/\s+/', ' ', trim($m[1]));
        $needsFix = !(str_contains($sig, 'LoggerInterface') && str_contains($sig, 'Commands'));

        if ($needsFix) {
            // Replace the entire constructor block
            $contents = preg_replace(
                '/public function __construct\s*\(.*?\)\s*\{.*?\}\s*/s',
                "public function __construct(\\Psr\\Log\\LoggerInterface \$logger, \\CodeIgniter\\CLI\\Commands \$commands)\n    {\n        parent::__construct(\$logger, \$commands);\n    }\n\n",
                $contents,
                1,
                $count
            );
            if ($count > 0) {
                $changed = true;
            }
        }
    }

    // 5) If BaseCommand use exists but now unused, leave it (harmless); cleanup is optional.

    if ($changed && $contents !== $original) {
        $report[] = "✅ Patched: `$path`";
    } else {
        $report[] = "ℹ️ No change: `$path`";
    }

    return $contents;
}

$rii = new RecursiveIteratorIterator(new RecursiveDirectoryIterator($commandsRoot));
foreach ($rii as $file) {
    if ($file->isDir()) continue;
    if ($file->getExtension() !== 'php') continue;

    $path = $file->getPathname();
    $contents = file_get_contents($path);

    // Only patch actual command classes
    if (!preg_match('/class\s+\w+\s+extends\s+/s', $contents)) {
        continue;
    }

    $patched = patchFile($path, $contents, $report);

    if ($patched !== $contents) {
        file_put_contents($path, $patched);
    }
}

$report[] = '';
$report[] = 'Next: run `php tools/spark_scan_commands.php` and `php spark list`.';

writeReport($reportPath, $report);

echo "✅ Spark fix completed.\n";
echo "📄 Report: {$reportPath}\n";
