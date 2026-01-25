<?php

namespace App\Services;

class ConfigLintService
{
    /**
     * @var array<string, array<int, string>>
     */
    private array $expectedConfigServices = [
        'cache' => ['Cache', 'Config\\Cache'],
        'responsecache' => ['Cache', 'Config\\Cache'],
        'session' => ['Session', 'Config\\Session'],
        'email' => ['Email', 'Config\\Email'],
        'logger' => ['Logger', 'Config\\Logger'],
        'validation' => ['Validation', 'Config\\Validation'],
        'renderer' => ['Renderer', 'Config\\Renderer'],
    ];

    /**
     * @return array{
     *     ok: bool,
     *     error?: string,
     *     has_failures?: bool,
     *     results?: array<string, array{status: string, message: string}>
     * }
     */
    public function lint(): array
    {
        $path = APPPATH . 'Config/Services.php';
        if (! is_file($path)) {
            return [
                'ok' => false,
                'error' => 'Config/Services.php not found.',
            ];
        }

        $contents = file_get_contents($path);
        if ($contents === false) {
            return [
                'ok' => false,
                'error' => 'Unable to read Config/Services.php.',
            ];
        }

        $overrides = $this->parseOverrides($contents);
        $callIssues = $this->detectInvalidCalls($contents);

        $results = [];
        $hasFailures = false;

        foreach ($this->expectedConfigServices as $service => $expectedTypes) {
            $status = 'OK';
            $message = '';

            if (isset($overrides[$service])) {
                $signature = $overrides[$service];
                $analysis = $this->analyzeSignature($signature['params'], $expectedTypes);

                if ($analysis['hasError']) {
                    $status = 'FAIL';
                    $message = $analysis['message'];
                    $hasFailures = true;
                } elseif ($analysis['hasWarning']) {
                    $status = 'WARN';
                    $message = $analysis['message'];
                }
            }

            if (isset($callIssues[$service])) {
                $status = 'FAIL';
                $message = $callIssues[$service];
                $hasFailures = true;
            }

            $results[$service] = [
                'status' => $status,
                'message' => $message,
            ];
        }

        return [
            'ok' => true,
            'has_failures' => $hasFailures,
            'results' => $results,
        ];
    }

    /**
     * @return array<string, array{params: string}>
     */
    private function parseOverrides(string $contents): array
    {
        $overrides = [];
        $pattern = '/public\s+static\s+function\s+(\w+)\s*\(([^)]*)\)/';

        if (preg_match_all($pattern, $contents, $matches, PREG_SET_ORDER)) {
            foreach ($matches as $match) {
                $overrides[strtolower($match[1])] = [
                    'params' => trim($match[2]),
                ];
            }
        }

        return $overrides;
    }

    /**
     * @param array<int, string> $expectedTypes
     * @return array{hasError: bool, hasWarning: bool, message: string}
     */
    private function analyzeSignature(string $params, array $expectedTypes): array
    {
        $paramParts = array_values(array_filter(array_map('trim', explode(',', $params)), 'strlen'));
        $firstParam = $paramParts[0] ?? '';
        $secondParam = $paramParts[1] ?? '';

        $firstParamIsBool = str_contains($firstParam, 'bool') || str_contains($firstParam, '$getShared');
        $firstParamHasConfig = false;

        foreach ($expectedTypes as $type) {
            if (str_contains($firstParam, $type)) {
                $firstParamHasConfig = true;
                break;
            }
        }

        if (! $firstParamHasConfig) {
            return [
                'hasError' => true,
                'hasWarning' => false,
                'message' => $firstParamIsBool ? 'invalid argument type (bool passed where config expected)' : 'missing config argument',
            ];
        }

        if ($secondParam === '' || ! str_contains($secondParam, 'bool')) {
            return [
                'hasError' => false,
                'hasWarning' => true,
                'message' => 'legacy signature (missing bool $getShared)',
            ];
        }

        return [
            'hasError' => false,
            'hasWarning' => false,
            'message' => 'signature ok',
        ];
    }

    /**
     * @return array<string, string>
     */
    private function detectInvalidCalls(string $contents): array
    {
        $issues = [];
        $pattern = '/(?:(?:parent|Services|CoreServices)::)(\w+)\(\s*(true|false)\s*[,) ]/i';

        if (preg_match_all($pattern, $contents, $matches, PREG_SET_ORDER)) {
            foreach ($matches as $match) {
                $service = strtolower($match[1]);
                if (isset($this->expectedConfigServices[$service])) {
                    $issues[$service] = 'invalid argument type (boolean passed where config expected)';
                }
            }
        }

        return $issues;
    }
}
