<?php

namespace App\Libraries;

class SeverityParser
{
    /**
     * Returns one of: HIGH | MEDIUM | LOW | UNKNOWN
     */
    public function classify(string $text): string
    {
        $t = strtolower($text);

        // Prefer explicit "Severity" lines
        if (preg_match('/severity\s*[:\-]\s*(high)/i', $text)) return 'HIGH';
        if (preg_match('/severity\s*[:\-]\s*(medium)/i', $text)) return 'MEDIUM';
        if (preg_match('/severity\s*[:\-]\s*(low)/i', $text)) return 'LOW';

        // Heuristics if model didn't format properly
        $highSignals = [
            'sql injection', 'rce', 'remote code execution', 'credential', 'csrf bypass',
            'xss', 'session fixation', 'auth bypass', 'privilege escalation',
            'unsafe eval', 'shell_exec', 'exec(', 'system(', 'passthru(',
            'token leak', 'secret leak', 'hardcoded key',
        ];

        $mediumSignals = [
            'n+1', 'missing index', 'slow query', 'unbounded query', 'inefficient',
            'cache miss', 'no caching', 'rate limit', 'timeout', 'memory leak',
            'too many queries', 'large payload',
        ];

        foreach ($highSignals as $s) {
            if (str_contains($t, $s)) return 'HIGH';
        }

        foreach ($mediumSignals as $s) {
            if (str_contains($t, $s)) return 'MEDIUM';
        }

        // If there are issues but none of the signals match:
        if (str_contains($t, 'issue') || str_contains($t, 'risk') || str_contains($t, 'vulnerab')) {
            return 'LOW';
        }

        return 'UNKNOWN';
    }
}
