<?php

declare(strict_types=1);

namespace App\Commands\Research;

use App\Commands\SafeBaseCommand;
use App\Services\InvestmentService;
use CodeIgniter\CLI\CLI;
use Config\Database;

class FinancialIntelligenceSignals extends SafeBaseCommand
{
    protected $group = 'research';
    protected $name = 'research:intelligence:signals';
    protected $description = 'Generate trade-signal intelligence from research rankings and the financial knowledge graph';

    protected $usage = 'research:intelligence:signals [replay <events-json>] [--one-hour-max-age-seconds=172800] [--thirty-minute-max-age-seconds=43200]';

    protected $options = [
        '--one-hour-max-age-seconds' =>
            'Maximum age in seconds for the 1-hour confirmation; default 172800.',
        '--thirty-minute-max-age-seconds' =>
            'Maximum age in seconds for the 30-minute confirmation; default 43200.',
    ];

    public function run(array $params)
    {
        if (($params[0] ?? null) === 'replay') {
            return $this->runReplay($params);
        }

        $db = Database::connect();

        $topMomentum = $db->table('bf_research_items')
            ->where('category', 'momentum')
            ->orderBy('score', 'DESC')
            ->limit(25)
            ->get()
            ->getResultArray();

        $topAlerts = $db->table('bf_research_items')
            ->where('category', 'alerts_rank')
            ->orderBy('score', 'DESC')
            ->limit(25)
            ->get()
            ->getResultArray();

        $topNews = $db->table('bf_research_items')
            ->where('category', 'news_rank')
            ->orderBy('score', 'DESC')
            ->limit(25)
            ->get()
            ->getResultArray();

        $signals = [];

        foreach ($topMomentum as $row) {
            $symbol = $row['symbol'] ?? null;
            if (!$symbol) {
                continue;
            }

            $alertScore = 0.0;
            foreach ($topAlerts as $a) {
                if (($a['symbol'] ?? null) === $symbol) {
                    $alertScore = (float) ($a['score'] ?? 0);
                    break;
                }
            }

            $newsScore = 0.0;
            foreach ($topNews as $n) {
                if (stripos((string) ($n['title'] ?? ''), $symbol) !== false) {
                    $newsScore = max($newsScore, (float) ($n['score'] ?? 0));
                }
            }

            $composite = ((float) ($row['score'] ?? 0) * 0.5) + ($alertScore * 0.3) + ($newsScore * 0.2);

            $signals[] = [
                'symbol' => $symbol,
                'momentum_score' => (float) ($row['score'] ?? 0),
                'alert_score' => $alertScore,
                'news_score' => $newsScore,
                'composite_score' => round($composite, 4),
            ];
        }

        usort($signals, fn ($a, $b) => $b['composite_score'] <=> $a['composite_score']);

        $file = ROOTPATH . 'docs/_financial_intelligence_signals.json';
        file_put_contents($file, json_encode($signals, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES));

        CLI::write('Financial intelligence signals generated: docs/_financial_intelligence_signals.json', 'green');
    }

    /**
     * Execute deterministic historical strategy replay from local JSON.
     */
    private function runReplay(array $params): int
    {
        $path = trim((string) ($params[1] ?? ''));

        if ($path === '') {
            CLI::error(
                'Replay requires an explicit local events JSON path.'
            );

            return EXIT_ERROR;
        }

        if (! is_file($path) || ! is_readable($path)) {
            CLI::error(
                'Replay events JSON file does not exist or is not readable.'
            );

            return EXIT_ERROR;
        }

        $raw = file_get_contents($path);

        if ($raw === false) {
            CLI::error(
                'Replay events JSON file could not be read.'
            );

            return EXIT_ERROR;
        }

        try {
            $decoded = json_decode(
                $raw,
                true,
                512,
                JSON_THROW_ON_ERROR
            );
        } catch (\JsonException $exception) {
            CLI::error(
                'Replay events JSON is malformed: '
                . $exception->getMessage()
            );

            return EXIT_ERROR;
        }

        if (! is_array($decoded)) {
            CLI::error(
                'Replay input must be an event array or an object containing an events array.'
            );

            return EXIT_ERROR;
        }

        if (array_is_list($decoded)) {
            $events = $decoded;
        } elseif (
            array_key_exists('events', $decoded)
            && is_array($decoded['events'])
            && array_is_list($decoded['events'])
        ) {
            $events = $decoded['events'];
        } else {
            CLI::error(
                'Replay input must be an event array or an object containing an events array.'
            );

            return EXIT_ERROR;
        }

        /*
         * Replay age limits may be supplied in the input object's
         * "options" member and/or through explicit CLI options.
         * CLI values override input JSON values.
         */
        $replayOptions = [];

        $inputOptions = [];

        if (! array_is_list($decoded)) {
            if (
                array_key_exists('options', $decoded)
                && ! is_array($decoded['options'])
            ) {
                CLI::error(
                    'Replay input options must be a JSON object.'
                );

                return EXIT_ERROR;
            }

            $inputOptions = $decoded['options'] ?? [];
        }

        foreach (
            [
                'one_hour_max_age_seconds',
                'thirty_minute_max_age_seconds',
            ]
            as $optionName
        ) {
            if (! array_key_exists($optionName, $inputOptions)) {
                continue;
            }

            $value = $inputOptions[$optionName];

            if (
                ! is_numeric($value)
                || (int) $value < 1
            ) {
                CLI::error(
                    'Replay option '
                    . $optionName
                    . ' must be a positive integer.'
                );

                return EXIT_ERROR;
            }

            $replayOptions[$optionName] = (int) $value;
        }

        $cliOneHourMaxAge =
            CLI::getOption('one-hour-max-age-seconds');

        if ($cliOneHourMaxAge !== null) {
            if (
                ! is_numeric($cliOneHourMaxAge)
                || (int) $cliOneHourMaxAge < 1
            ) {
                CLI::error(
                    '--one-hour-max-age-seconds must be a positive integer.'
                );

                return EXIT_ERROR;
            }

            $replayOptions['one_hour_max_age_seconds'] =
                (int) $cliOneHourMaxAge;
        }

        $cliThirtyMinuteMaxAge =
            CLI::getOption('thirty-minute-max-age-seconds');

        if ($cliThirtyMinuteMaxAge !== null) {
            if (
                ! is_numeric($cliThirtyMinuteMaxAge)
                || (int) $cliThirtyMinuteMaxAge < 1
            ) {
                CLI::error(
                    '--thirty-minute-max-age-seconds must be a positive integer.'
                );

                return EXIT_ERROR;
            }

            $replayOptions['thirty_minute_max_age_seconds'] =
                (int) $cliThirtyMinuteMaxAge;
        }

        foreach ($events as $event) {
            if (! is_array($event)) {
                CLI::error(
                    'Replay events must each be JSON objects.'
                );

                return EXIT_ERROR;
            }
        }

        try {
            $result = (
                new InvestmentService()
            )->replayStrategyValidation($events, $replayOptions);

            $json = json_encode(
                $result,
                JSON_PRETTY_PRINT
                | JSON_UNESCAPED_SLASHES
                | JSON_THROW_ON_ERROR
            );
        } catch (\Throwable $exception) {
            CLI::error(
                'Strategy replay failed: '
                . $exception->getMessage()
            );

            return EXIT_ERROR;
        }

        CLI::write($json);

        return EXIT_SUCCESS;
    }
}
