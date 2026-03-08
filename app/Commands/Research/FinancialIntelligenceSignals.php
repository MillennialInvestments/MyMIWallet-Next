<?php

declare(strict_types=1);

namespace App\Commands\Research;

use App\Commands\SafeBaseCommand;
use CodeIgniter\CLI\CLI;
use Config\Database;

class FinancialIntelligenceSignals extends SafeBaseCommand
{
    protected $group = 'research';
    protected $name = 'research:intelligence:signals';
    protected $description = 'Generate trade-signal intelligence from research rankings and the financial knowledge graph';

    public function run(array $params)
    {
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
}