<?php

namespace App\Commands\Ops;

use App\Commands\SafeBaseCommand;
use App\Commands\Ops\Support\CommandRulesScanner;
use CodeIgniter\CLI\CLI;

class CommandsAutofix extends SafeBaseCommand
{
    protected $defaultDryRun = true;
    protected $group = 'ops';
    protected $name = 'ops:commands:autofix';
    protected $description = 'Auto-fix Spark commands that define illegal constructors.';
    protected $usage = 'ops:commands:autofix [--dry-run] [--approve]';
    protected $options = [
        '--dry-run' => 'Preview changes without modifying files (default)',
        '--approve' => 'Apply fixes and write updated files',
    ];

    public function run(array $params)
    {
        [, $flags] = $this->parseParams($params);
        $dryRun = $this->resolveDryRun($flags);
        $approved = isset($flags['approve']);

        if (! $approved) {
            $dryRun = true;
        }

        $scanner = new CommandRulesScanner();
        $entries = $scanner->scan(ROOTPATH . 'app/Commands');

        $violations = array_values(array_filter(
            $entries,
            static fn (array $entry) => $entry['illegal']
        ));

        if ($violations === []) {
            CLI::write('No illegal constructors detected. Nothing to fix.', 'green');
            return EXIT_SUCCESS;
        }

        CLI::write(sprintf('Found %d illegal constructor(s).', count($violations)), 'yellow');

        if ($dryRun) {
            CLI::write('Dry-run mode enabled. Use --approve to apply fixes.', 'yellow');
        }

        $artifactDir = ROOTPATH . 'docs/aiops/commands-autofix/' . date('Ymd-His');
        foreach ($violations as $entry) {
            $relative = $this->relativePath($entry['file']);
            CLI::write("Fixing {$entry['class']} ({$relative})");

            if ($dryRun) {
                continue;
            }

            $this->applyFix($entry['file'], $entry['class'], $artifactDir);
        }

        if ($dryRun) {
            return EXIT_SUCCESS;
        }

        CLI::write('Autofix complete.', 'green');
        return EXIT_SUCCESS;
    }

    protected function isDestructive(): bool
    {
        return true;
    }

    private function applyFix(string $path, string $className, string $artifactDir): void
    {
        $code = file_get_contents($path);
        if ($code === false) {
            CLI::error("Unable to read {$path}.");
            return;
        }

        $relative = $this->relativePath($path);
        $artifactRoot = rtrim($artifactDir, '/');
        $targetDir = $artifactRoot . '/' . ltrim(dirname($relative), '/');
        if (! is_dir($targetDir)) {
            mkdir($targetDir, 0775, true);
        }

        $backup = $targetDir . '/' . basename($path) . '.bak';
        if (! file_exists($backup)) {
            file_put_contents($backup, $code);
        }

        $updated = $this->removeConstructor($code);
        $updated = $this->ensureSafeBaseCommand($updated);
        $updated = $this->ensureRequiredMetadata($updated, $className);

        if ($updated === $code) {
            CLI::write("No changes required for {$className}.");
            return;
        }

        $fixedPath = $targetDir . '/' . basename($path);
        file_put_contents($fixedPath, $updated);
        CLI::write("Wrote fixed copy for {$className} (backup at {$backup}).", 'green');
    }

    private function removeConstructor(string $code): string
    {
        $tokens = token_get_all($code);
        $output = '';
        $count = count($tokens);
        $skipping = false;
        $depth = 0;
        $foundBody = false;

        for ($i = 0; $i < $count; $i++) {
            $token = $tokens[$i];

            if (! $skipping && is_array($token) && $token[0] === T_FUNCTION) {
                $nameToken = $this->nextNonWhitespaceToken($tokens, $i);
                if (is_array($nameToken) && strtolower($nameToken[1]) === '__construct') {
                    $skipping = true;
                    $depth = 0;
                    $foundBody = false;
                    continue;
                }
            }

            if ($skipping) {
                if (is_string($token)) {
                    if ($token === '{') {
                        $depth++;
                        $foundBody = true;
                    } elseif ($token === '}') {
                        $depth--;
                        if ($foundBody && $depth === 0) {
                            $skipping = false;
                        }
                    } elseif ($token === ';' && ! $foundBody) {
                        $skipping = false;
                    }
                }
                continue;
            }

            $output .= is_array($token) ? $token[1] : $token;
        }

        return $output;
    }

    private function ensureSafeBaseCommand(string $code): string
    {
        $code = preg_replace(
            '/extends\s+\\\\?CodeIgniter\\\\CLI\\\\BaseCommand/',
            'extends SafeBaseCommand',
            $code
        );

        $code = preg_replace(
            '/extends\s+BaseCommand/',
            'extends SafeBaseCommand',
            $code
        );

        if (! str_contains($code, 'SafeBaseCommand')) {
            return $code;
        }

        if (! preg_match('/use\s+App\\\\Commands\\\\SafeBaseCommand;/', $code)) {
            $code = preg_replace(
                '/^namespace\s+[^;]+;\s*/m',
                "$0\nuse App\\Commands\\SafeBaseCommand;\n",
                $code,
                1
            );
        }

        return $code;
    }

    private function ensureRequiredMetadata(string $code, string $className): string
    {
        if (preg_match('/\\$name\\s*=\\s*.+;/', $code)
            && preg_match('/\\$group\\s*=\\s*.+;/', $code)
            && preg_match('/\\$description\\s*=\\s*.+;/', $code)
        ) {
            return $code;
        }

        $defaults = $this->defaultMetadata($className);
        $inserts = [];

        if (! preg_match('/\\$name\\s*=\\s*.+;/', $code)) {
            $inserts[] = "    protected \$name = '{$defaults['name']}';";
        }

        if (! preg_match('/\\$group\\s*=\\s*.+;/', $code)) {
            $inserts[] = "    protected \$group = '{$defaults['group']}';";
        }

        if (! preg_match('/\\$description\\s*=\\s*.+;/', $code)) {
            $inserts[] = "    protected \$description = '{$defaults['description']}';";
        }

        if ($inserts === []) {
            return $code;
        }

        $insertBlock = implode("\n", $inserts) . "\n";

        $code = preg_replace(
            '/class\\s+[^\\n{]+\\{\\s*/',
            "$0\n{$insertBlock}",
            $code,
            1
        );

        return $code;
    }

    private function defaultMetadata(string $className): array
    {
        $short = $className;
        if (str_contains($className, '\\')) {
            $parts = explode('\\', $className);
            $short = end($parts);
        }

        $kebab = strtolower(preg_replace('/(?<!^)[A-Z]/', '-$0', $short));

        return [
            'name' => "app:{$kebab}",
            'group' => 'app',
            'description' => 'TODO: add command description',
        ];
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

    private function relativePath(string $path): string
    {
        $root = rtrim(ROOTPATH, '/\\') . DIRECTORY_SEPARATOR;

        if (str_starts_with($path, $root)) {
            return ltrim(substr($path, strlen($root)), '/\\');
        }

        return $path;
    }
}
