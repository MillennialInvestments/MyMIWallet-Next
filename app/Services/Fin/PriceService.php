<?php
namespace App\Services\Fin;

use App\Models\Fin\PriceEodModel;

class PriceService
{
    public static function getEodPrice(string $symbol, ?string $date = null): ?float
    {
        $model = new PriceEodModel();
        if ($date) {
            $row = $model->where(['symbol'=>$symbol,'date'=>$date])->first();
            if ($row) {
                return (float)$row['close'];
            }
        }

        $row = $model->lastClose($symbol);
        if ($row) {
            return (float)$row['close'];
        }

        try {
            $lib = new \App\Libraries\MyMIAlphaVantage(getenv('ALPHAVANTAGE_API_KEY'));
            $series = $lib->fetchDaily($symbol);
            if (is_array($series)) {
                $batch = [];
                foreach ($series as $d => $close) {
                    $batch[] = [
                        'symbol' => $symbol,
                        'date'   => $d,
                        'close'  => $close,
                        'source' => 'alphavantage',
                        'created_at' => date('Y-m-d H:i:s'),
                    ];
                }
                if ($batch) {
                    db_connect()->table('bf_fin_prices_eod')->ignore(true)->insertBatch($batch);
                }
                $last = $model->lastClose($symbol);
                return $last ? (float)$last['close'] : null;
            }
        } catch (\Throwable $e) {
            log_message('warning', 'Price fetch failed for {s}: {m}', ['s' => $symbol, 'm' => $e->getMessage()]);
        }
        return null;
    }
}

