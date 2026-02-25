<?php

namespace App\Modules\APIs\Models;

use App\Models\ObservedModel;

class InvestmentsNewsModel extends ObservedModel
{
    protected $table      = 'bf_investments_news';
    protected $primaryKey = 'id';

    protected $returnType    = 'array';
    protected $useTimestamps = true;
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';

    protected $allowedFields = [
        'email_message_id',
        'source_email',
        'provider',
        'ticker_symbol',
        'headline',
        'subject',
        'body',
        'category',
        'status',
        'received_at',
    ];
}