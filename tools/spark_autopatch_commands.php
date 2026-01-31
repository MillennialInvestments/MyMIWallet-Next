#!/usr/bin/env php
<?php

$base = realpath(__DIR__ . '/../');
if ($base === false) {
    fwrite(STDERR, "Unable to resolve project root.\n");
    exit(1);
}

define('ROOTPATH', rtrim($base, '/') . '/');

$root = ROOTPATH . 'app/Commands';

$iterator = new RecursiveIteratorIterator(
    new RecursiveDirectoryIterator($root)
);

foreach ($iterator as $file) {
    if ($file->getExtension() !== 'php') {
        continue;
    }

    $path = $file->getPathname();
    $contents = file_get_contents($path);

    if (!preg_match('/extends\s+BaseCommand/', $contents)) {
        continue;
    }

    // Replace constructor entirely
    $patched = preg_replace(
        '/public function __construct\s*\(.*?\)\s*\{.*?\}/s',
        "public function __construct(\\Psr\\Log\\LoggerInterface \$logger, \\CodeIgniter\\CLI\\Commands \$commands)\n    {\n        parent::__construct(\$logger, \$commands);\n    }",
        $contents
    );

    if ($patched !== $contents) {
        $path = ROOTPATH . ltrim(str_replace(ROOTPATH, '', $path), '/');
        file_put_contents($path, $patched);
        echo "🔧 Patched: $path\n";
    }
}

echo "✅ Auto-patch completed.\n";
