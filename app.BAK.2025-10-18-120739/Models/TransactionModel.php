<?php

namespace App\Models;

use CodeIgniter\Model;

#[\AllowDynamicProperties]
class TransactionModel extends Model
{
    protected $table = 'bf_users_wallet_transactions';
    protected $primaryKey = 'id';
    protected $allowedFields = [
        'transaction_id', 'status', 'active', 'unix_timestamp', 'submitted_date', 'month', 
        'day', 'year', 'time', 'trans_type', 'currency', 'wallet_id', 'bank_account', 
        'broker', 'nickname', 'user_id', 'user_email', 'type', 'deposit_date', 
        'withdraw_date', 'amount', 'initial_amount', 'current_amount', 'fees', 
        'total_cost', 'large_transaction_flag', 'reviewed', 'reviewed_by', 
        'reviewed_at', 'review_notes', 'suspicious_pattern', 'pattern_details'
    ];

    // Insert a new transaction with additional metadata
    public function insertTransaction($data)
    {
        $data['transaction_id'] = $this->generateTransactionID();
        $data['unix_timestamp'] = time();
        $data['submitted_date'] = date('Y-m-d H:i:s');
        $data['month'] = date('m');
        $data['day'] = date('d');
        $data['year'] = date('Y');
        $data['time'] = date('H:i:s');

        return $this->insert($data);
    }

    // Update an existing transaction by transaction ID
    public function updateTransaction($transactionID, $data)
    {
        return $this->where('transaction_id', $transactionID)->set($data)->update();
    }

    // Fetch transaction by transaction ID
    public function getTransactionById($transactionID)
    {
        return $this->where('transaction_id', $transactionID)->first();
    }

    // Fetch transactions by user ID
    public function getTransactionsByUser($userID)
    {
        return $this->where('user_id', $userID)->findAll();
    }

    // Mark a transaction as reviewed
    public function markAsReviewed($transactionID, $reviewedBy, $reviewNotes = '')
    {
        return $this->updateTransaction($transactionID, [
            'reviewed' => 1,
            'reviewed_by' => $reviewedBy,
            'reviewed_at' => date('Y-m-d H:i:s'),
            'review_notes' => $reviewNotes
        ]);
    }

    // Generate a unique transaction ID
    protected function generateTransactionID()
    {
        return uniqid('trans_', true);
    }
}
