<?php

namespace App\Modules\PropFirms\Models;

use App\Models\ObservedModel;

class PropTradeJournalModel extends ObservedModel
{
    protected $table = 'bf_prop_trade_journal';
    protected $primaryKey = 'id';
    protected $returnType = 'array';
    protected $useSoftDeletes = false;
    protected $useTimestamps = true;
    protected $allowedFields = [
        'user_prop_account_id',
        'prop_order_id',
        'entry_title',
        'entry_body',
        'entry_reason',
        'exit_reason',
        'emotion_tag',
        'mistake_tag',
        'lessons_learned',
        'review_score',
        'symbol',
        'trade_date',
        'replay_start_at',
        'replay_end_at',
    ];
}
