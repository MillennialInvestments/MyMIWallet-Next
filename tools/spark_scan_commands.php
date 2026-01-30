#!/usr/bin/env php
<?php

$root = realpath(__DIR__ . '/../app/Commands');
$errors = [];

$iterator = new RecursiveIteratorIterator(
    new RecursiveDirectoryIterator($root)
);

foreach ($iterator as $file) {
    if ($file->getExtension() !== 'php') {
        continue;
    }

    $contents = file_get_contents($file->getPathname());

    if (preg_match('/function\s+__construct\s*\((.*?)\)/s', $contents, $m)) {
        $signature = trim(preg_replace('/\s+/', ' ', $m[1]));

        // CI4.6+ ONLY valid signature
        if (!str_contains($signature, 'LoggerInterface') ||
            !str_contains($signature, 'Commands')) {

            $errors[] = [
                'file'      => $file->getPathname(),
                'signature' => $signature
            ];
        }
    }
}

if ($errors) {
    echo "❌ Invalid Spark command constructors detected:\n\n";
    foreach ($errors as $e) {
        echo "- {$e['file']}\n";
        echo "  Found: __construct({$e['signature']})\n\n";
    }
    exit(1);
}

echo "✅ All Spark command constructors are valid.\n";
exit(0);
