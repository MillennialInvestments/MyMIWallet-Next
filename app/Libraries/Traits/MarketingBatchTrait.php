<?php namespace App\Libraries\Traits;

trait MarketingBatchTrait
{
    public function processBatchRecords(array $records, $insertCallback, $onFail = null): array
    {
        $inserted = [];
        foreach ($records as $record) {
            try {
                $result = call_user_func($insertCallback, $record);
                if ($result) {
                    $inserted[] = $record['id'] ?? '(no-id)';
                } else {
                    if (is_callable($onFail)) {
                        call_user_func($onFail, $record);
                    }
                }
            } catch (\Throwable $e) {
                log_message('error', '❌ Exception in batch process: ' . $e->getMessage());
            }
        }

        return $inserted;
    }
}
