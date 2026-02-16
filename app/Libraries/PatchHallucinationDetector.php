<?php

namespace App\Libraries;

class PatchHallucinationDetector
{
    private SymbolResolver $resolver;

    public function __construct()
    {
        $this->resolver = new SymbolResolver();
    }

    public function analyzeDiff(string $diffPath): array
    {
        if (!is_file($diffPath)) {
            return [
                'ok' => false,
                'error' => 'diff_not_found',
                'issues' => [],
            ];
        }

        $diff = file_get_contents($diffPath) ?: '';

        // Only analyze added lines to reduce noise
        $added = $this->extractAddedLines($diff);

        $issues = [];

        // 1) Class references: new Foo\Bar(), Foo\Bar::, extends Foo\Bar, implements Foo\Bar
        foreach ($this->extractClassCandidates($added) as $fqcn) {
            // Skip common scalars / built-ins and CI keywords
            if ($this->skipClass($fqcn)) continue;

            if (!$this->resolver->classExists($fqcn)) {
                $issues[] = $this->issue('HIGH', 'class_missing', "Class not found/autoloadable: {$fqcn}");
            }
        }

        // 2) Static calls: Some\Class::method(
        foreach ($this->extractStaticMethodCalls($added) as [$fqcn, $method]) {
            if ($this->skipClass($fqcn)) continue;

            if (!$this->resolver->classExists($fqcn)) {
                $issues[] = $this->issue('HIGH', 'class_missing', "Class not found/autoloadable: {$fqcn} (static call {$method})");
                continue;
            }

            // Some static calls may be magic; still valuable to check
            if (!$this->resolver->methodExists($fqcn, $method)) {
                $issues[] = $this->issue('MEDIUM', 'method_missing', "Method not found: {$fqcn}::{$method}()");
            }
        }

        // 3) Services: Services::foo(
        foreach ($this->extractServicesCalls($added) as $svcMethod) {
            if (!$this->resolver->serviceExists($svcMethod)) {
                $issues[] = $this->issue('HIGH', 'service_missing', "Config\\Services missing method: {$svcMethod}()");
            }
        }

        // 4) helper('x') or helper(['a','b'])
        foreach ($this->extractHelperCalls($added) as $helperName) {
            if (!$this->resolver->helperExists($helperName)) {
                $issues[] = $this->issue('MEDIUM', 'helper_missing', "Helper file missing: {$helperName}_helper.php");
            }
        }

        // 5) model('FQCN') and/or model(FQCN::class)
        foreach ($this->extractModelCalls($added) as $fqcn) {
            if ($this->skipClass($fqcn)) continue;

            if (!$this->resolver->classExists($fqcn)) {
                $issues[] = $this->issue('HIGH', 'model_class_missing', "Model class not found/autoloadable: {$fqcn}");
            }
        }

        return [
            'ok' => true,
            'error' => null,
            'issues' => $issues,
            'summary' => $this->summarize($issues),
        ];
    }

    private function extractAddedLines(string $diff): string
    {
        $out = [];
        foreach (preg_split("/\R/", $diff) as $line) {
            if (isset($line[0]) && $line[0] === '+' && !str_starts_with($line, '+++')) {
                $out[] = substr($line, 1);
            }
        }
        return implode("\n", $out);
    }

    private function extractClassCandidates(string $text): array
    {
        $c = [];

        // new \Foo\Bar(
        if (preg_match_all('/\bnew\s+\\\\?([A-Za-z_][A-Za-z0-9_]*(?:\\\\[A-Za-z_][A-Za-z0-9_]*)+)/', $text, $m)) {
            $c = array_merge($c, $m[1]);
        }

        // extends Foo\Bar / implements Foo\Bar
        if (preg_match_all('/\b(extends|implements)\s+\\\\?([A-Za-z_][A-Za-z0-9_]*(?:\\\\[A-Za-z_][A-Za-z0-9_]*)+)/', $text, $m)) {
            $c = array_merge($c, $m[2]);
        }

        // type hints: Foo\Bar $x (simple heuristic)
        if (preg_match_all('/\b\\\\?([A-Za-z_][A-Za-z0-9_]*(?:\\\\[A-Za-z_][A-Za-z0-9_]*)+)\s+\$[A-Za-z_]/', $text, $m)) {
            $c = array_merge($c, $m[1]);
        }

        // Foo\Bar:: (class usage)
        if (preg_match_all('/\b\\\\?([A-Za-z_][A-Za-z0-9_]*(?:\\\\[A-Za-z_][A-Za-z0-9_]*)+)::/', $text, $m)) {
            $c = array_merge($c, $m[1]);
        }

        $c = array_values(array_unique(array_map(fn($x) => ltrim($x, '\\'), $c)));
        return $c;
    }

    private function extractStaticMethodCalls(string $text): array
    {
        $calls = [];

        if (preg_match_all('/\b\\\\?([A-Za-z_][A-Za-z0-9_]*(?:\\\\[A-Za-z_][A-Za-z0-9_]*)+)::([A-Za-z_][A-Za-z0-9_]*)\s*\(/', $text, $m, PREG_SET_ORDER)) {
            foreach ($m as $row) {
                $calls[] = [ltrim($row[1], '\\'), $row[2]];
            }
        }

        return $calls;
    }

    private function extractServicesCalls(string $text): array
    {
        $svcs = [];

        if (preg_match_all('/\bServices::([A-Za-z_][A-Za-z0-9_]*)\s*\(/', $text, $m)) {
            $svcs = array_merge($svcs, $m[1]);
        }

        $svcs = array_values(array_unique($svcs));
        return $svcs;
    }

    private function extractHelperCalls(string $text): array
    {
        $helpers = [];

        // helper('name')
        if (preg_match_all('/\bhelper\s*\(\s*[\'"]([a-zA-Z0-9_]+)[\'"]\s*\)/', $text, $m)) {
            $helpers = array_merge($helpers, $m[1]);
        }

        // helper(['a','b'])
        if (preg_match_all('/\bhelper\s*\(\s*\[(.*?)\]\s*\)/s', $text, $m)) {
            foreach ($m[1] as $inner) {
                if (preg_match_all('/[\'"]([a-zA-Z0-9_]+)[\'"]/', $inner, $mm)) {
                    $helpers = array_merge($helpers, $mm[1]);
                }
            }
        }

        $helpers = array_values(array_unique($helpers));
        return $helpers;
    }

    private function extractModelCalls(string $text): array
    {
        $classes = [];

        // model('App\Models\Foo')
        if (preg_match_all('/\bmodel\s*\(\s*[\'"]\\\\?([A-Za-z_][A-Za-z0-9_]*(?:\\\\[A-Za-z_][A-Za-z0-9_]*)+)[\'"]\s*\)/', $text, $m)) {
            $classes = array_merge($classes, $m[1]);
        }

        // model(Foo::class)
        if (preg_match_all('/\bmodel\s*\(\s*\\\\?([A-Za-z_][A-Za-z0-9_]*(?:\\\\[A-Za-z_][A-Za-z0-9_]*)+)::class\s*\)/', $text, $m)) {
            $classes = array_merge($classes, $m[1]);
        }

        $classes = array_values(array_unique(array_map(fn($x) => ltrim($x, '\\'), $classes)));
        return $classes;
    }

    private function skipClass(string $fqcn): bool
    {
        $fqcn = ltrim($fqcn, '\\');

        // common pseudo / built-in patterns and CI helpers
        $skipPrefixes = ['CI4', 'PHPUnit', 'Composer', 'Dotenv', 'Psr\\', 'Symfony\\', 'GuzzleHttp\\'];
        foreach ($skipPrefixes as $p) {
            if (str_starts_with($fqcn, $p)) return true;
        }

        // primitives / keywords
        $lower = strtolower($fqcn);
        if (in_array($lower, ['self','static','parent','string','int','float','bool','array','callable','iterable','object','mixed'])) {
            return true;
        }

        return false;
    }

    private function issue(string $severity, string $type, string $message): array
    {
        return [
            'severity' => $severity,
            'type' => $type,
            'message' => $message,
        ];
    }

    private function summarize(array $issues): array
    {
        $counts = ['HIGH' => 0, 'MEDIUM' => 0, 'LOW' => 0];
        foreach ($issues as $i) {
            $sev = $i['severity'] ?? 'LOW';
            if (!isset($counts[$sev])) $counts[$sev] = 0;
            $counts[$sev]++;
        }
        return $counts;
    }
}
