<?php

namespace App\Modules\PropFirms\Libraries;

use App\Modules\PropFirms\Models\PropTradeJournalModel;

class PropJournalService
{
    private PropTradeJournalModel $journal;

    public function __construct()
    {
        $this->journal = new PropTradeJournalModel();
    }

    public function saveReview(int $accountId, array $payload): array
    {
        $row = [
            'user_prop_account_id' => $accountId,
            'prop_order_id' => !empty($payload['prop_order_id']) ? (int) $payload['prop_order_id'] : null,
            'entry_title' => (string) ($payload['entry_title'] ?? 'Replay Review'),
            'entry_body' => (string) ($payload['entry_body'] ?? ''),
            'entry_reason' => (string) ($payload['entry_reason'] ?? ''),
            'exit_reason' => (string) ($payload['exit_reason'] ?? ''),
            'emotion_tag' => (string) ($payload['emotion_tag'] ?? ''),
            'mistake_tag' => (string) ($payload['mistake_tag'] ?? ''),
            'lessons_learned' => (string) ($payload['lessons_learned'] ?? ''),
            'review_score' => (int) ($payload['review_score'] ?? 0),
            'symbol' => strtoupper((string) ($payload['symbol'] ?? '')),
            'trade_date' => (string) ($payload['trade_date'] ?? date('Y-m-d')),
            'replay_start_at' => $payload['replay_start_at'] ?? null,
            'replay_end_at' => $payload['replay_end_at'] ?? null,
        ];

        $id = $this->journal->insert($row, true);

        return [
            'status' => $id ? 'ok' : 'error',
            'id' => (int) $id,
            'data' => $id ? $this->journal->find((int) $id) : null,
        ];
    }

    public function recentFindings(int $accountId, int $limit = 10): array
    {
        return $this->journal
            ->where('user_prop_account_id', $accountId)
            ->orderBy('trade_date', 'DESC')
            ->orderBy('id', 'DESC')
            ->findAll($limit);
    }
}
