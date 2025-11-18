<?php
namespace App\Libraries\AlertSources;

use App\Libraries\AlertSourceInterface;
use App\Libraries\MyMIMarketing;

class MarketAuxNewsSource implements AlertSourceInterface
{
    public function __construct(private ?MyMIMarketing $marketing = null)
    {
        $this->marketing = $marketing ?? new MyMIMarketing();
    }

    public function fetch(): array
    {
        $symbols = ['SPY', 'QQQ', 'DIA'];
        $alerts = [];

        foreach ($symbols as $symbol) {
            try {
                $news = $this->marketing->fetchRecentFinancialNews($symbol);
            } catch (\Throwable $e) {
                log_message('debug', 'MarketAuxNewsSource fetch failed: ' . $e->getMessage());
                continue;
            }

            if (empty($news['items'])) {
                continue;
            }

            foreach ($news['items'] as $item) {
                $alerts[] = [
                    'symbol'      => $symbol,
                    'summary'     => $item['summary'] ?? ($item['title'] ?? ''),
                    'source'      => 'marketaux',
                    'detected_at' => $item['published_at'] ?? date('Y-m-d H:i:s'),
                    'metadata'    => [
                        'link'   => $item['url'] ?? null,
                        'sentiment' => $item['sentiment'] ?? null,
                    ],
                ];
            }
        }

        return $alerts;
    }
}
