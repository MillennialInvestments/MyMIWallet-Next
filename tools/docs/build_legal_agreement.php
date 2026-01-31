<?php

declare(strict_types=1);

$root = realpath(__DIR__ . '/../../');
if ($root === false) {
    fwrite(STDERR, "Unable to resolve project root.\n");
    exit(1);
}

define('ROOTPATH', rtrim($root, '/') . '/');

$baseDir = ROOTPATH . 'docs/legal/crypto_customer_agreement';
if (! is_dir($baseDir)) {
    fwrite(STDERR, "Unable to locate crypto_customer_agreement directory.\n");
    exit(1);
}

$flagsFile = $baseDir . '/feature_flags.yml';
$agreementIntro = $baseDir . '/agreement.md';
$sectionsDir = $baseDir . '/sections';
$outputFile = $baseDir . '/compiled_agreement.md';

if (! is_file($flagsFile)) {
    fwrite(STDERR, "Missing feature_flags.yml at {$flagsFile}\n");
    exit(1);
}

if (! is_dir($sectionsDir)) {
    fwrite(STDERR, "Missing sections directory at {$sectionsDir}\n");
    exit(1);
}

$featureFlags = loadFeatureFlags($flagsFile);
$contentParts = [];

if (is_file($agreementIntro)) {
    $contentParts[] = trim(file_get_contents($agreementIntro));
}

$sectionFiles = glob($sectionsDir . '/*.md') ?: [];
natsort($sectionFiles);

foreach ($sectionFiles as $file) {
    $section = file_get_contents($file);
    $contentParts[] = trim(applyFeatureFlags($section, $featureFlags));
}

$compiled = implode("\n\n", $contentParts) . "\n";
file_put_contents($outputFile, $compiled);

echo "Compiled agreement written to {$outputFile}\n";

/**
 * Minimal YAML parser for a simple "features" mapping.
 *
 * @param string $file
 * @return array<string,bool>
 */
function loadFeatureFlags(string $file): array
{
    $raw = file($file, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES) ?: [];
    $flags = [];
    foreach ($raw as $line) {
        $line = trim($line);
        if ($line === '' || str_starts_with($line, '#')) {
            continue;
        }
        if ($line === 'features:' || str_ends_with($line, ':')) {
            continue;
        }
        if (preg_match('/^([A-Za-z0-9_]+):\\s*(true|false)$/i', $line, $matches)) {
            $flags[$matches[1]] = strtolower($matches[2]) === 'true';
        }
    }
    return $flags;
}

/**
 * Strip or reveal FEATURE blocks based on the provided flags.
 *
 * @param string $content
 * @param array<string,bool> $flags
 * @return string
 */
function applyFeatureFlags(string $content, array $flags): string
{
    return preg_replace_callback(
        '/<!--\\s*FEATURE:([a-zA-Z0-9_\\-]+)\\s*-->(.*?)<!--\\s*\\/FEATURE:\\1\\s*-->/s',
        function ($matches) use ($flags) {
            $feature = $matches[1];
            $body = trim($matches[2]);
            if (! ($flags[$feature] ?? false)) {
                return '';
            }
            return $body;
        },
        $content
    );
}
