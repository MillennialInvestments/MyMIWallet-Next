<?php
namespace App\Libraries\AlertSources;

use App\Libraries\AlertSourceInterface;
use App\Models\AlertsModel;

class ThinkOrSwimEmailSource implements AlertSourceInterface
{
    public function __construct(private ?AlertsModel $alertsModel = null)
    {
        $this->alertsModel = $alertsModel ?? new AlertsModel();
    }

    public function fetch(): array
    {
        $records = $this->alertsModel->getPendingScraperRecords(25);
        return array_map(static function (array $record): array {
            return [
                'scraper_id' => $record['id'],
                'summary'    => $record['summary'] ?? '',
                'metadata'   => [
                    'category' => $record['category'] ?? null,
                    'tag'      => $record['tag'] ?? null,
                    'segment'  => $record['segment'] ?? null,
                ],
                'source'      => 'thinkorswim_email',
                'detected_at' => $record['email_date'] ?? null,
            ];
        }, $records);
    }
}