<?php namespace App\Models;

use CodeIgniter\Model;

class AuctionPaymentModel extends Model
{
    protected $table      = 'bf_auction_payments';
    protected $primaryKey = 'id';

    protected $allowedFields = [
        'user_id',
        'lot_id',
        'method',
        'direction',
        'amount_cents',
        'rate_used',
        'tx_ref',
        'status',
    ];

    protected $useTimestamps = true;
    protected $returnType    = 'array';

    public function processTopUp(array $payload): array
    {
        $userId = (int) ($payload['user_id'] ?? 0);
        $amount = (int) ($payload['amount_cents'] ?? 0);
        $method = strtoupper($payload['method'] ?? 'MYMIGOLD');
        $lotId  = isset($payload['lot_id']) ? (int) $payload['lot_id'] : null;
        $rate   = isset($payload['rate_used']) ? (float) $payload['rate_used'] : null;
        $txRef  = $payload['tx_ref'] ?? null;

        if ($userId <= 0 || $amount <= 0) {
            return ['status' => 'error', 'message' => 'Invalid top up request'];
        }

        $db = $this->db;
        $db->transBegin();

        $paymentId = $this->insert([
            'user_id'      => $userId,
            'lot_id'       => $lotId,
            'method'       => $method,
            'direction'    => 'topup',
            'amount_cents' => $amount,
            'rate_used'    => $rate,
            'tx_ref'       => $txRef,
            'status'       => 'confirmed',
        ], true);

        if (! $paymentId) {
            $db->transRollback();
            return ['status' => 'error', 'message' => 'Unable to create payment'];
        }

        $balanceModel = model(AuctionBalanceModel::class, false, $db);
        $credited = $balanceModel->credit($userId, $amount);

        if (! $credited) {
            $db->transRollback();
            return ['status' => 'error', 'message' => 'Unable to credit balance'];
        }

        $db->transCommit();

        return [
            'status'      => 'success',
            'payment_id'  => $paymentId,
            'amount_cents'=> $amount,
            'method'      => $method,
        ];
    }
}