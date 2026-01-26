<?php

namespace App\Commands\Ops;

class CommandConstructorScanner
{
    public function scan(string $rootPath): array
    {
        $files = $this->listCommandFiles($rootPath);
        $results = [];

        foreach ($files as $file) {
            foreach ($this->parseFile($file) as $classInfo) {
                if (! $this->isCommandBase($classInfo['extends'])) {
                    continue;
                }

                $classInfo['illegal'] = $classInfo['constructorLine'] !== null;
                $results[] = $classInfo;
            }
        }

        return $results;
    }

    private function listCommandFiles(string $rootPath): array
    {
        $files = [];
        $iterator = new \RecursiveIteratorIterator(
            new \RecursiveDirectoryIterator($rootPath, \FilesystemIterator::SKIP_DOTS)
        );

        foreach ($iterator as $fileInfo) {
            if (! $fileInfo->isFile()) {
                continue;
            }

            if ($fileInfo->getExtension() !== 'php') {
                continue;
            }

            $files[] = $fileInfo->getPathname();
        }

        sort($files);

        return $files;
    }

    private function parseFile(string $path): array
    {
        $code = file_get_contents($path);
        if ($code === false) {
            return [];
        }

        $tokens = token_get_all($code);
        $namespace = '';
        $classes = [];
        $count = count($tokens);

        for ($i = 0; $i < $count; $i++) {
            $token = $tokens[$i];

            if (is_array($token) && $token[0] === T_NAMESPACE) {
                $namespace = $this->collectNamespace($tokens, $i);
                continue;
            }

            if (! is_array($token) || $token[0] !== T_CLASS) {
                continue;
            }

            if ($this->isAnonymousClass($tokens, $i)) {
                continue;
            }

            $className = $this->nextTokenValue($tokens, $i, T_STRING);
            if ($className === null) {
                continue;
            }

            $extends = $this->collectExtends($tokens, $i);
            $constructorLine = $this->findConstructorLine($tokens, $i);

            $fqcn = $namespace !== '' ? $namespace . '\\' . $className : $className;

            $classes[] = [
                'class' => $fqcn,
                'file' => $path,
                'extends' => $extends,
                'constructorLine' => $constructorLine,
            ];
        }

        return $classes;
    }

    private function collectNamespace(array $tokens, int &$index): string
    {
        $parts = [];
        $count = count($tokens);

        for ($i = $index + 1; $i < $count; $i++) {
            $token = $tokens[$i];

            if (is_string($token)) {
                if ($token === ';' || $token === '{') {
                    $index = $i;
                    break;
                }
                continue;
            }

            if (in_array($token[0], [T_STRING, T_NS_SEPARATOR], true)) {
                $parts[] = $token[1];
            }
        }

        return implode('', $parts);
    }

    private function collectExtends(array $tokens, int $index): string
    {
        $count = count($tokens);
        $extends = '';
        $found = false;

        for ($i = $index; $i < $count; $i++) {
            $token = $tokens[$i];

            if (is_string($token) && $token === '{') {
                break;
            }

            if (is_array($token) && $token[0] === T_EXTENDS) {
                $found = true;
                continue;
            }

            if (! $found) {
                continue;
            }

            if (is_array($token) && in_array($token[0], [T_STRING, T_NS_SEPARATOR], true)) {
                $extends .= $token[1];
                continue;
            }

            if (is_string($token) || (is_array($token) && $token[0] === T_WHITESPACE)) {
                if ($extends !== '') {
                    break;
                }
            }
        }

        return $extends;
    }

    private function findConstructorLine(array $tokens, int $index): ?int
    {
        $count = count($tokens);
        $start = null;

        for ($i = $index; $i < $count; $i++) {
            if (is_string($tokens[$i]) && $tokens[$i] === '{') {
                $start = $i;
                break;
            }
        }

        if ($start === null) {
            return null;
        }

        $depth = 0;

        for ($i = $start; $i < $count; $i++) {
            $token = $tokens[$i];

            if (is_string($token)) {
                if ($token === '{') {
                    $depth++;
                } elseif ($token === '}') {
                    $depth--;
                    if ($depth === 0) {
                        break;
                    }
                }
                continue;
            }

            if ($token[0] !== T_FUNCTION) {
                continue;
            }

            $nameToken = $this->nextNonWhitespaceToken($tokens, $i);
            if ($nameToken === null || ! is_array($nameToken)) {
                continue;
            }

            if (strtolower($nameToken[1]) === '__construct') {
                return $nameToken[2];
            }
        }

        return null;
    }

    private function isAnonymousClass(array $tokens, int $index): bool
    {
        for ($i = $index - 1; $i >= 0; $i--) {
            $token = $tokens[$i];
            if (is_array($token) && $token[0] === T_WHITESPACE) {
                continue;
            }

            return is_array($token) && $token[0] === T_NEW;
        }

        return false;
    }

    private function nextTokenValue(array $tokens, int $index, int $expected): ?string
    {
        $count = count($tokens);
        for ($i = $index + 1; $i < $count; $i++) {
            $token = $tokens[$i];
            if (! is_array($token)) {
                continue;
            }

            if ($token[0] === $expected) {
                return $token[1];
            }
        }

        return null;
    }

    private function nextNonWhitespaceToken(array $tokens, int $index): array|string|null
    {
        $count = count($tokens);

        for ($i = $index + 1; $i < $count; $i++) {
            $token = $tokens[$i];
            if (is_array($token) && $token[0] === T_WHITESPACE) {
                continue;
            }

            if (is_array($token) && $token[0] === T_COMMENT) {
                continue;
            }

            if (is_array($token) && $token[0] === T_DOC_COMMENT) {
                continue;
            }

            return $token;
        }

        return null;
    }

    private function isCommandBase(string $extends): bool
    {
        $normalized = ltrim($extends, '\\');
        if ($normalized === '') {
            return false;
        }

        if (in_array($normalized, ['CodeIgniter\\CLI\\BaseCommand', 'App\\Commands\\SafeBaseCommand'], true)) {
            return true;
        }

        $short = $normalized;
        if (str_contains($normalized, '\\')) {
            $parts = explode('\\', $normalized);
            $short = end($parts);
        }

        return in_array($short, ['BaseCommand', 'SafeBaseCommand'], true);
    }
}
