<?php

declare(strict_types=1);

$root = realpath(__DIR__ . '/../app');
if ($root === false) {
    fwrite(STDERR, "Unable to resolve app directory.\n");
    exit(2);
}

$declarations = [];
$iterator     = new RecursiveIteratorIterator(new RecursiveDirectoryIterator($root));

foreach ($iterator as $file) {
    if (! $file->isFile() || $file->getExtension() !== 'php') {
        continue;
    }

    $content = file_get_contents($file->getPathname());
    if ($content === false) {
        continue;
    }

    $namespace = '';
    if (preg_match('/^\s*namespace\s+([^;]+);/m', $content, $nsMatch) === 1) {
        $namespace = trim($nsMatch[1]);
    }

    if (preg_match_all('/^\s*(?:final\s+|abstract\s+)?(class|interface|trait|enum)\s+([A-Za-z_][A-Za-z0-9_]*)/m', $content, $classMatches, PREG_SET_ORDER) === 0) {
        continue;
    }

    foreach ($classMatches as $match) {
        $fqn = ltrim($namespace . '\\' . $match[2], '\\');
        $declarations[$fqn][] = $file->getPathname();
    }
}

$hasDuplicates = false;
foreach ($declarations as $fqn => $files) {
    if (count($files) < 2) {
        continue;
    }

    $hasDuplicates = true;
    echo "Duplicate declaration {$fqn} found in:\n";
    foreach ($files as $path) {
        echo "  - {$path}\n";
    }
}

if (! $hasDuplicates) {
    echo "No duplicate class/interface/trait/enum declarations found under app/.\n";
}

exit($hasDuplicates ? 1 : 0);
