<?php
namespace App\Libraries\Observability;

/**
 * Minimal file-backed metrics store compatible with Prometheus text format.
 */
class Metrics
{
    private static function path(): string
    {
        $dir = WRITEPATH . 'metrics';
        if (!is_dir($dir)) {
            @mkdir($dir, 0755, true);
        }
        return $dir . '/metrics.json';
    }

    private static function read(): array
    {
        $file = self::path();
        if (!is_file($file)) {
            return ['c'=>[], 'g'=>[], 'h'=>[]];
        }
        $json = file_get_contents($file);
        return $json ? (json_decode($json, true) ?: ['c'=>[], 'g'=>[], 'h'=>[]]) : ['c'=>[], 'g'=>[], 'h'=>[]];
    }

    private static function write(array $data): void
    {
        file_put_contents(self::path(), json_encode($data));
    }

    private static function key(string $name, array $labels): string
    {
        ksort($labels);
        return $name . '|' . http_build_query($labels, '', ',');
    }

    public static function inc(string $name, array $labels = [], int $n = 1): void
    {
        $m = self::read();
        $k = self::key($name, $labels);
        $m['c'][$k] = ($m['c'][$k] ?? 0) + $n;
        self::write($m);
    }

    public static function set(string $name, float $value, array $labels = []): void
    {
        $m = self::read();
        $k = self::key($name, $labels);
        $m['g'][$k] = $value;
        self::write($m);
    }

    public static function observe(string $name, float|int $value, array $labels = []): void
    {
        $m = self::read();
        $k = self::key($name, $labels);
        $curr = $m['h'][$k] ?? ['sum'=>0, 'count'=>0];
        $curr['sum'] += (float)$value;
        $curr['count'] += 1;
        $m['h'][$k] = $curr;
        self::write($m);
    }

    private static function labelsFromQuery(string $q): array
    {
        if ($q === '') {
            return [];
        }
        parse_str(str_replace(',', '&', $q), $out);
        return $out;
    }

    private static function line(string $metric, array $labels, $val): string
    {
        $labelStr = '';
        if (!empty($labels)) {
            $pairs = [];
            foreach ($labels as $k => $v) {
                $pairs[] = $k . '="' . addcslashes((string)$v, "\\\"
") . '"';
            }
            $labelStr = '{' . implode(',', $pairs) . '}';
        }
        $num = is_int($val) ? $val : number_format((float)$val, 6, '.', '');
        return $metric . $labelStr . ' ' . $num;
    }

    public static function export(): string
    {
        $m = self::read();
        $out = [];
        foreach ($m['c'] as $k => $v) {
            [$name, $lab] = explode('|', $k, 2);
            $out[] = self::line($name . '_total', self::labelsFromQuery($lab), $v);
        }
        foreach ($m['g'] as $k => $v) {
            [$name, $lab] = explode('|', $k, 2);
            $out[] = self::line($name, self::labelsFromQuery($lab), $v);
        }
        foreach ($m['h'] as $k => $st) {
            [$name, $lab] = explode('|', $k, 2);
            $labels = self::labelsFromQuery($lab);
            $out[] = self::line($name . '_sum', $labels, $st['sum']);
            $out[] = self::line($name . '_count', $labels, $st['count']);
        }
        return implode("\n", $out) . "\n";
    }
}
