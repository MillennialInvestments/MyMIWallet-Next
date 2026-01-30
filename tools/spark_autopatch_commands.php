#!/usr/bin/env php
<?php

$root = realpath(__DIR__ . '/../app/Commands');

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
        file_put_contents($path, $patched);
        echo "🔧 Patched: $path\n";
    }
}

echo "✅ Auto-patch completed.\n";
