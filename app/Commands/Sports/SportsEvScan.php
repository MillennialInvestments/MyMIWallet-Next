<?php

declare(strict_types=1);

namespace App\Commands\Sports;

use App\Commands\SafeBaseCommand;
use App\Modules\Sports\Libraries\SportsValueFinderService;
use CodeIgniter\CLI\CLI;

/**
 * CLI command to scan across multi-sport correlated SGPs and multi-book arbitrage,
 * extracting and caching positive Expected Value (+EV) betting inefficiencies.
 *
 * Hard Invariant: Read-only analytics; never places real wagers.
 */
class SportsEvScan extends SafeBaseCommand
{
    use SportsOptionsTrait;

    protected $group       = 'Sports';
    protected $name        = 'sports:ev:scan';
    protected $description = 'Scan across sports for +EV correlated SGPs and multi-book arbitrage edges (read-only).';
    protected $usage       = 'sports:ev:scan [--sport=MLB|NHL|NFL|NBA|SOCCER|COLLEGE|ALL] [--min-ev=3.0] [--json]';
    protected $options     = [
        '--sport'  => 'Specific sport to scan (default: ALL).',
        '--min-ev' => 'Minimum expected value percentage threshold (default: 3.0%).',
        '--json'   => 'Output raw JSON report.',
    ];

    public function run(array $params)
    {
        $this->parseParams($params);
        $json = $this->flag($params, 'json');
        $sport = strtoupper(trim((string) ($this->opt($params, 'sport') ?? 'ALL')));
        $minEv = (float) ($this->opt($params, 'min-ev') ?? 3.0);

        $db = db_connect();
        $finder = new SportsValueFinderService($db);

        $cached = $finder->refreshAndCacheScan();
        $edges = $finder->scanCorrelatedSgpEdges($sport === 'ALL' ? null : $sport, $minEv);
        $arbs = $finder->scanArbitrageEdges();

        if ($json) {
            CLI::write((string) json_encode([
                'status'       => 'PASS',
                'sport'        => $sport,
                'min_ev'       => $minEv,
                'cached_stats' => $cached,
                'sgp_edges'    => $edges,
                'arbs'         => $arbs,
            ], JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES));

            return 0;
        }

        CLI::write(CLI::color("=== MyMI Wallet +EV & Correlated SGP Market Scanner ===", 'yellow'));
        CLI::write("Sport filter: " . CLI::color($sport, 'cyan') . " | Min EV: " . CLI::color("{$minEv}%", 'green'));
        CLI::newLine();

        if ($edges === []) {
            CLI::write('No SGP edges found meeting the threshold.');
        } else {
            CLI::write(CLI::color(sprintf("Found %d Correlated +EV Plays:", count($edges)), 'green'));
            foreach ($edges as $e) {
                $stars = str_repeat('★', (int) ($e['star_rating'] ?? 1));
                CLI::write(sprintf(
                    " [%s] %s | EV: %s | Fair: %s vs Offered: %s (%s)",
                    $e['sport'],
                    CLI::color($e['title'], 'white'),
                    CLI::color(sprintf("+%.1f%% %s", $e['ev_pct'], $stars), 'green'),
                    $e['fair_odds'] > 0 ? '+' . $e['fair_odds'] : (string) $e['fair_odds'],
                    $e['offered_odds'] > 0 ? '+' . $e['offered_odds'] : (string) $e['offered_odds'],
                    $e['sportsbook']
                ));
            }
        }

        CLI::newLine();
        if ($arbs !== []) {
            CLI::write(CLI::color(sprintf("Found %d Cross-Book Arbitrage Edges:", count($arbs)), 'cyan'));
            foreach ($arbs as $a) {
                CLI::write(sprintf(
                    " [%s] %s | Guaranteed ROI: %s on %s",
                    $a['sport'],
                    $a['title'],
                    CLI::color(sprintf("+%.2f%%", $a['ev_pct']), 'yellow'),
                    $a['sportsbook']
                ));
            }
        }

        CLI::newLine();
        CLI::write(CLI::color("SEMANTIC_RESULT=PASS EDGES_FOUND=" . (count($edges) + count($arbs)), 'green'));

        return 0;
    }
}
