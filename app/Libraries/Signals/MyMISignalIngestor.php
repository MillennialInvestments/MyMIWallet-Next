<?php

namespace App\Libraries\Signals;

use App\Models\SignalFilesModel;
use App\Models\SignalsModel;
use CodeIgniter\I18n\Time;

class MyMISignalIngestor
{
    protected SignalsModel $signals;
    protected SignalFilesModel $files;

    public function __construct()
    {
        $this->signals = new SignalsModel();
        $this->files   = new SignalFilesModel();
    }

    /**
     * Map filename patterns → category/signal_type.
     * Adjust/expand freely over time.
     */
    public function classifyFilename(string $fileName): array
    {
        $map = [
            '/Daily\s+Top\s+Gainers/i'         => ['category' => 'momentum', 'signal_type' => 'top_gainers'],
            '/SuperTrend/i'                    => ['category' => 'trend', 'signal_type' => 'supertrend'],
            '/EMA\s*-\s*Whale\s*Analyzer/i'   => ['category' => 'institutional', 'signal_type' => 'ema_whale'],
            '/Volume\s*-\s*InFlows/i'         => ['category' => 'liquidity', 'signal_type' => 'volume_inflows'],
            '/Weekly\s*-\s*Top\s*Performers/i' => ['category' => 'performance', 'signal_type' => 'weekly_top'],
        ];

        foreach ($map as $rx => $meta) {
            if (preg_match($rx, $fileName)) {
                return $meta;
            }
        }

        return ['category' => 'other', 'signal_type' => 'unknown'];
    }

    public function extractDateFromFilename(string $fileName): ?string
    {
        // expects YYYY-MM-DD somewhere in filename
        if (preg_match('/(\d{4}-\d{2}-\d{2})/', $fileName, $m)) {
            return $m[1];
        }

        return null;
    }

    public function weekKeyFromDate(string $dateYmd): string
    {
        $dt = new \DateTime($dateYmd);
        $week = $dt->format('W');
        $year = $dt->format('o'); // ISO week-numbering year
        return sprintf('%s-%s', $year, $week);
    }

    public function weekRangeFromWeekKey(string $weekKey): array
    {
        // weekKey: YYYY-WW
        [$y, $w] = explode('-', $weekKey);
        $dt = new \DateTime();
        $dt->setISODate((int) $y, (int) $w);
        $start = clone $dt;
        $end   = clone $dt;
        $end->modify('+6 day');

        return [$start->format('Y-m-d'), $end->format('Y-m-d')];
    }

    /**
     * Discover files for a week across possibly multiple month directories.
     * Uses date patterns (YYYY-MM-DD) to locate files.
     */
    public function discoverWeeklyFiles(string $weekKey, string $baseDir): array
    {
        [$start, $end] = $this->weekRangeFromWeekKey($weekKey);

        $startDt = new \DateTime($start);
        $endDt   = new \DateTime($end);

        $dirs = [];
        $cur = clone $startDt;
        while ($cur <= $endDt) {
            $year = $cur->format('Y');
            $mon  = $cur->format('M'); // matches your folder style: Jan, Feb...
            $dirs[] = rtrim($baseDir, '/') . "/{$year}/{$mon}";
            $cur->modify('+1 day');
        }
        $dirs = array_values(array_unique($dirs));

        $files = [];
        foreach ($dirs as $d) {
            if (! is_dir($d)) {
                continue;
            }

            // Grab all CSVs and filter by date in filename within week
            foreach (glob($d . '/*.csv') as $path) {
                $name = basename($path);
                $fileDate = $this->extractDateFromFilename($name);
                if (! $fileDate) {
                    continue;
                }

                if ($fileDate >= $start && $fileDate <= $end) {
                    $files[] = $path;
                }
            }
        }

        sort($files);
        return $files;
    }

    public function computeFileHash(string $filePath): string
    {
        return hash_file('sha256', $filePath);
    }

    public function normalizeHeader(string $h): string
    {
        $h = trim($h);
        $h = preg_replace('/[^A-Za-z0-9_ ]+/', '', $h);
        $h = strtolower(str_replace(' ', '_', $h));
        return $h;
    }

    public function findSymbolKey(array $headers): ?string
    {
        $candidates = ['symbol', 'ticker', 'sym', 'tk'];
        foreach ($headers as $h) {
            if (in_array($h, $candidates, true)) {
                return $h;
            }
        }

        // fallback fuzzy
        foreach ($headers as $h) {
            if (str_contains($h, 'symbol') || str_contains($h, 'ticker')) {
                return $h;
            }
        }

        return null;
    }

    public function computeRowHash(string $filePath, array $rowAssoc): string
    {
        // stable, minimal identity:
        $symbol = strtoupper(trim((string) ($rowAssoc['symbol'] ?? $rowAssoc['ticker'] ?? '')));
        $payload = $filePath . '|' . $symbol . '|' . json_encode($rowAssoc);
        return hash('sha256', $payload);
    }

    /**
     * Simple deterministic scoring (AI can enhance later).
     * If file has % change / volume-like fields, use them; else default 50.
     */
    public function computeScore(array $meta, array $rowAssoc): int
    {
        $score = 50;

        // filename category base weights
        $baseMap = [
            'momentum'      => 65,
            'trend'         => 60,
            'institutional' => 70,
            'liquidity'     => 62,
            'performance'   => 58,
            'other'         => 50,
        ];
        $score = $baseMap[$meta['category']] ?? 50;

        // try to apply metric bump if present
        $pctKeys = ['pct_change', 'percent_change', 'change_percent', 'percent'];
        foreach ($pctKeys as $k) {
            if (isset($rowAssoc[$k]) && is_numeric($rowAssoc[$k])) {
                $pct = (float) $rowAssoc[$k];
                // bump up to +20 based on pct
                $score += (int) min(20, max(0, $pct));
                break;
            }
        }

        $volKeys = ['volume', 'dollar_volume', 'usd_volume'];
        foreach ($volKeys as $k) {
            if (isset($rowAssoc[$k]) && is_numeric($rowAssoc[$k])) {
                $vol = (float) $rowAssoc[$k];
                if ($vol >= 10000000) {
                    $score += 10;
                } elseif ($vol >= 3000000) {
                    $score += 5;
                }
                break;
            }
        }

        return max(0, min(100, $score));
    }

    /**
     * Main ingestion entry point
     */
    public function ingestWeek(string $weekKey, string $baseDir): array
    {
        $paths = $this->discoverWeeklyFiles($weekKey, $baseDir);

        $summary = [
            'week' => $weekKey,
            'files_found' => count($paths),
            'files_processed' => 0,
            'signals_inserted' => 0,
            'signals_skipped' => 0,
            'files' => [],
        ];

        foreach ($paths as $path) {
            $name = basename($path);
            $hash = $this->computeFileHash($path);

            if ($this->files->alreadyProcessed($path, $hash)) {
                $summary['files'][] = ['file' => $name, 'status' => 'skipped_already_processed'];
                continue;
            }

            $meta = $this->classifyFilename($name);
            $fileDate = $this->extractDateFromFilename($name);
            $rowsTotal = 0;
            $inserted = 0;
            $skipped = 0;

            $handle = fopen($path, 'r');
            if ($handle === false) {
                $summary['files'][] = ['file' => $name, 'status' => 'error_open'];
                continue;
            }

            $rawHeader = fgetcsv($handle);
            if (! $rawHeader) {
                fclose($handle);
                $summary['files'][] = ['file' => $name, 'status' => 'error_no_header'];
                continue;
            }

            $headers = array_map(fn ($h) => $this->normalizeHeader((string) $h), $rawHeader);
            $symbolKey = $this->findSymbolKey($headers);

            if (! $symbolKey) {
                fclose($handle);
                $summary['files'][] = ['file' => $name, 'status' => 'error_no_symbol_column'];
                continue;
            }

            while (($row = fgetcsv($handle)) !== false) {
                $rowsTotal++;
                $assoc = [];
                foreach ($headers as $i => $h) {
                    $assoc[$h] = $row[$i] ?? null;
                }

                $symbol = strtoupper(trim((string) $assoc[$symbolKey]));
                $symbol = preg_replace('/[^A-Z0-9\.\-\_]/', '', $symbol);

                if ($symbol === '' || strlen($symbol) < 1) {
                    $skipped++;
                    continue;
                }

                // normalize to always have 'symbol'
                $assoc['symbol'] = $symbol;

                $rowHash = $this->computeRowHash($path, $assoc);
                $score = $this->computeScore($meta, $assoc);

                $payload = [
                    'week_key'     => $weekKey,
                    'signal_date'  => $fileDate,
                    'symbol'       => $symbol,
                    'category'     => $meta['category'],
                    'signal_type'  => $meta['signal_type'],
                    'source'       => 'csv',
                    'source_file'  => $path,
                    'row_hash'     => $rowHash,
                    'score'        => $score,
                    'appearances'  => 1,
                    'metrics_json' => json_encode($assoc),
                    'status'       => 'new',
                ];

                $res = $this->signals->upsertSignal($payload);
                if (($res['status'] ?? '') === 'inserted') {
                    $inserted++;
                } else {
                    $skipped++;
                }
            }

            fclose($handle);

            // Store file registry record
            $this->files->insert([
                'week_key'      => $weekKey,
                'file_date'     => $fileDate,
                'file_path'     => $path,
                'file_name'     => $name,
                'category'      => $meta['category'],
                'signal_type'   => $meta['signal_type'],
                'file_hash'     => $hash,
                'rows_total'    => $rowsTotal,
                'rows_inserted' => $inserted,
                'rows_skipped'  => $skipped,
                'processed_at'  => Time::now()->toDateTimeString(),
            ]);

            $summary['files_processed']++;
            $summary['signals_inserted'] += $inserted;
            $summary['signals_skipped'] += $skipped;

            $summary['files'][] = [
                'file' => $name,
                'category' => $meta['category'],
                'signal_type' => $meta['signal_type'],
                'rows_total' => $rowsTotal,
                'inserted' => $inserted,
                'skipped' => $skipped,
                'status' => 'processed',
            ];
        }

        return $summary;
    }
}
