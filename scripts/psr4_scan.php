<?php

declare(strict_types=1);

$root = dirname(__DIR__);
$autoload = $root . '/vendor/autoload.php';

if (! is_file($autoload)) {
    fwrite(STDERR, "vendor/autoload.php not found. Run composer install first.\n");
    exit(1);
}

require $autoload;

$composerPath = $root . '/composer.json';
if (! is_file($composerPath)) {
    fwrite(STDERR, "composer.json not found.\n");
    exit(1);
}

$composer = json_decode((string) file_get_contents($composerPath), true);
if (! is_array($composer)) {
    fwrite(STDERR, "Unable to parse composer.json.\n");
    exit(1);
}

$psr4 = $composer['autoload']['psr-4'] ?? [];
if (! is_array($psr4)) {
    fwrite(STDERR, "No autoload.psr-4 mappings found.\n");
    exit(1);
}

$scanRoots = [
    $root . '/app',
    $root . '/app/Modules',
];

$issues = [];
$totalFiles = 0;

foreach ($scanRoots as $scanRoot) {
    if (! is_dir($scanRoot)) {
        continue;
    }

    $iterator = new RecursiveIteratorIterator(new RecursiveDirectoryIterator($scanRoot, FilesystemIterator::SKIP_DOTS));
    foreach ($iterator as $file) {
        if (! $file->isFile() || strtolower($file->getExtension()) !== 'php') {
            continue;
        }

        $path = $file->getPathname();
        if (str_contains($path, DIRECTORY_SEPARATOR . 'Database' . DIRECTORY_SEPARATOR . 'Migrations' . DIRECTORY_SEPARATOR)) {
            continue;
        }

        $totalFiles++;
        $code = (string) file_get_contents($path);
        if ($code === '') {
            continue;
        }

        [$namespace, $classes] = extractDeclarations($code);

        if (count($classes) > 1) {
            $issues[] = "[multiple-classes] {$path}: contains multiple declarations (" . implode(', ', $classes) . ')';
        }

        if ($namespace === null || $classes === []) {
            continue;
        }

        $mapped = mapNamespaceToBasePath($namespace, $psr4, $root);
        if ($mapped === null) {
            $issues[] = "[unmapped-namespace] {$path}: namespace {$namespace} is not covered by composer autoload psr-4.";
            continue;
        }

        [$namespaceRoot, $basePath] = $mapped;
        $relativeNamespace = trim(substr($namespace, strlen(rtrim($namespaceRoot, '\\'))), '\\');
        $expectedDir = rtrim($basePath, DIRECTORY_SEPARATOR);
        if ($relativeNamespace !== '') {
            $expectedDir .= DIRECTORY_SEPARATOR . str_replace('\\', DIRECTORY_SEPARATOR, $relativeNamespace);
        }

        $actualDir = rtrim($file->getPath(), DIRECTORY_SEPARATOR);

        if ($expectedDir !== $actualDir) {
            $issues[] = "[wrong-folder] {$path}: expected directory {$expectedDir}";
        }

        $className = $classes[0];
        $expectedFile = $expectedDir . DIRECTORY_SEPARATOR . $className . '.php';
        if (basename($path) !== $className . '.php') {
            $issues[] = "[filename-mismatch] {$path}: class {$namespace}\\{$className} expects file " . basename($expectedFile);
        }

        if (! caseSensitivePathEquals($expectedFile, $path)) {
            $issues[] = "[case-mismatch] {$path}: case-sensitive path differs from expected {$expectedFile}";
        }
    }
}

echo "Scanned {$totalFiles} PHP files\n";
if ($issues === []) {
    echo "PSR-4 scan passed with no issues.\n";
    exit(0);
}

echo "Found " . count($issues) . " issue(s):\n";
foreach ($issues as $issue) {
    echo " - {$issue}\n";
}

exit(1);

/**
 * @return array{0:?string,1:list<string>}
 */
function extractDeclarations(string $code): array
{
    $tokens = token_get_all($code);
    $namespace = null;
    $classes = [];

    $count = count($tokens);
    for ($i = 0; $i < $count; $i++) {
        $token = $tokens[$i];
        if (! is_array($token)) {
            continue;
        }

        if ($token[0] === T_NAMESPACE) {
            $name = '';
            for ($j = $i + 1; $j < $count; $j++) {
                $next = $tokens[$j];
                if (is_string($next)) {
                    if ($next === ';' || $next === '{') {
                        break;
                    }
                    continue;
                }

                if (in_array($next[0], [T_STRING, T_NAME_QUALIFIED, T_NS_SEPARATOR], true)) {
                    $name .= $next[1];
                }
            }

            $namespace = $name !== '' ? trim($name) : null;
            continue;
        }

        if (in_array($token[0], [T_CLASS, T_INTERFACE, T_TRAIT, T_ENUM], true)) {
            if ($token[0] === T_CLASS) {
                $prevIndex = $i - 1;
                while ($prevIndex >= 0) {
                    $prev = $tokens[$prevIndex];
                    if (is_array($prev) && in_array($prev[0], [T_WHITESPACE, T_COMMENT, T_DOC_COMMENT], true)) {
                        $prevIndex--;
                        continue;
                    }

                    if ($prev === '::') {
                        continue 2;
                    }

                    break;
                }
            }

            for ($j = $i + 1; $j < $count; $j++) {
                $next = $tokens[$j];
                if (is_array($next) && in_array($next[0], [T_WHITESPACE, T_FINAL, T_ABSTRACT], true)) {
                    continue;
                }

                if (is_array($next) && $next[0] === T_STRING) {
                    $classes[] = $next[1];
                }
                break;
            }
        }
    }

    return [$namespace, array_values(array_unique($classes))];
}

/**
 * @param array<string,string> $psr4
 * @return array{0:string,1:string}|null
 */
function mapNamespaceToBasePath(string $namespace, array $psr4, string $root): ?array
{
    uksort($psr4, static fn(string $a, string $b): int => strlen($b) <=> strlen($a));

    foreach ($psr4 as $prefix => $relativePath) {
        $trimmedPrefix = rtrim($prefix, '\\');
        if ($namespace === $trimmedPrefix || str_starts_with($namespace, $prefix)) {
            return [$prefix, rtrim($root . '/' . trim($relativePath, '/'), DIRECTORY_SEPARATOR)];
        }
    }

    return null;
}

function caseSensitivePathEquals(string $expected, string $actual): bool
{
    $expectedReal = realpath($expected);
    $actualReal = realpath($actual);

    if ($expectedReal === false || $actualReal === false) {
        return false;
    }

    return $expectedReal === $actualReal;
}
