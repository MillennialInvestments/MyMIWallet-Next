<?php namespace App\Libraries;

use CodeIgniter\I18n\Time;

class FMVService
{
    /**
     * Estimate FMV based on title using multiple lightweight heuristics/providers.
     */
    public function estimate(string $title): array
    {
        $titleNorm = $this->normalize($title);
        $signals = [];

        $internal = $this->internalComps($titleNorm);
        if ($internal) {
            $signals[] = $internal;
        }

        $msrp = $this->msrpHeuristic($titleNorm);
        if ($msrp) {
            $signals[] = $msrp;
        }

        $ext = $this->externalAdapters($titleNorm);
        if (! empty($ext)) {
            $signals = array_merge($signals, $ext);
        }

        $vals = array_map(static fn ($s) => $s['amount_cents'], $signals);
        $amount = empty($vals) ? 0 : (int) round($this->median($vals));

        return [
            'amount_cents' => $amount,
            'sources'      => $signals,
        ];
    }

    private function normalize(string $t): string
    {
        $t = strtolower(trim(preg_replace('/\s+/', ' ', $t)));
        return preg_replace('/[^a-z0-9\-\s]/', '', $t);
    }

    private function internalComps(string $titleNorm): ?array
    {
        $db = db_connect();
        $builder = $db->table('bf_auction_items i')
            ->select('AVG(s.winning_cents) as avg_cents, COUNT(*) as sample_size')
            ->join('bf_auction_settlements s', 's.item_id = i.id', 'inner')
            ->where('s.status', 'settled');

        if ($titleNorm !== '') {
            $builder->like('i.title', $titleNorm);
        }

        $row = $builder->get()->getRowArray();
        if (! $row || (int) $row['sample_size'] === 0) {
            return null;
        }

        return [
            'provider'     => 'internal_comps',
            'amount_cents' => (int) round((float) $row['avg_cents']),
            'meta'         => [
                'sample' => (int) $row['sample_size'],
                'as_of'  => Time::now()->toDateTimeString(),
            ],
        ];
    }

    private function msrpHeuristic(string $titleNorm): ?array
    {
        $map = config('Products')?->msrp ?? [];
        foreach ($map as $keyword => $cents) {
            if (str_contains($titleNorm, strtolower($keyword))) {
                return [
                    'provider'     => 'msrp',
                    'amount_cents' => (int) $cents,
                    'meta'         => ['keyword' => $keyword],
                ];
            }
        }

        return null;
    }

    private function externalAdapters(string $titleNorm): array
    {
        // No external adapters enabled yet.
        return [];
    }

    private function median(array $nums): float
    {
        sort($nums);
        $n = count($nums);
        if ($n === 0) {
            return 0.0;
        }

        $mid = (int) floor($n / 2);
        if ($n % 2) {
            return (float) $nums[$mid];
        }

        return ((float) $nums[$mid - 1] + (float) $nums[$mid]) / 2;
    }
}