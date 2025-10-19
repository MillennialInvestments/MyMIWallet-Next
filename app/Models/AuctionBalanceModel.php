<?php namespace App\Models;

use CodeIgniter\Database\ConnectionInterface;
use CodeIgniter\Model;

class AuctionBalanceModel extends Model
{
    protected $table      = 'bf_auction_balances';
    protected $primaryKey = 'id';

    protected $allowedFields = [
        'user_id',
        'gold_cents',
        'hold_cents',
    ];

    protected $returnType = 'array';
    protected $useTimestamps = false;

    public function __construct(ConnectionInterface $db = null)
    {
        parent::__construct($db);
    }

    public function ensure(int $userId): void
    {
        $exists = $this->where('user_id', $userId)->first();
        if (! $exists) {
            $this->insert([
                'user_id'    => $userId,
                'gold_cents' => 0,
                'hold_cents' => 0,
            ]);
        }
    }

    public function hold(int $userId, int $cents): bool
    {
        if ($cents <= 0) {
            return true;
        }

        $this->ensure($userId);

        $db  = $this->db;
        $own = $db->transDepth() === 0;
        if ($own) {
            $db->transBegin();
        }

        $row = $db->query('SELECT * FROM bf_auction_balances WHERE user_id = ? FOR UPDATE', [$userId])->getRowArray();
        if (! $row) {
            if ($own) {
                $db->transRollback();
            }
            return false;
        }

        if ((int) $row['gold_cents'] < $cents) {
            if ($own) {
                $db->transRollback();
            }
            return false;
        }

        $db->table('bf_auction_balances')
            ->where('user_id', $userId)
            ->update([
                'gold_cents' => (int) $row['gold_cents'] - $cents,
                'hold_cents' => (int) $row['hold_cents'] + $cents,
            ]);

        if ($own) {
            $db->transCommit();
        }

        return true;
    }

    public function release(int $userId, int $cents): bool
    {
        if ($cents <= 0) {
            return true;
        }

        $this->ensure($userId);

        $db  = $this->db;
        $own = $db->transDepth() === 0;
        if ($own) {
            $db->transBegin();
        }

        $row = $db->query('SELECT * FROM bf_auction_balances WHERE user_id = ? FOR UPDATE', [$userId])->getRowArray();
        if (! $row) {
            if ($own) {
                $db->transRollback();
            }
            return false;
        }

        if ((int) $row['hold_cents'] < $cents) {
            if ($own) {
                $db->transRollback();
            }
            return false;
        }

        $db->table('bf_auction_balances')
            ->where('user_id', $userId)
            ->update([
                'gold_cents' => (int) $row['gold_cents'] + $cents,
                'hold_cents' => (int) $row['hold_cents'] - $cents,
            ]);

        if ($own) {
            $db->transCommit();
        }

        return true;
    }

    public function debit(int $userId, int $cents, bool $fromHold = false): bool
    {
        if ($cents <= 0) {
            return true;
        }

        $this->ensure($userId);

        $db  = $this->db;
        $own = $db->transDepth() === 0;
        if ($own) {
            $db->transBegin();
        }

        $row = $db->query('SELECT * FROM bf_auction_balances WHERE user_id = ? FOR UPDATE', [$userId])->getRowArray();
        if (! $row) {
            if ($own) {
                $db->transRollback();
            }
            return false;
        }

        $gold = (int) $row['gold_cents'];
        $hold = (int) $row['hold_cents'];

        if ($fromHold) {
            if ($hold < $cents) {
                if ($own) {
                    $db->transRollback();
                }
                return false;
            }
            $hold -= $cents;
        } else {
            if ($gold < $cents) {
                if ($own) {
                    $db->transRollback();
                }
                return false;
            }
            $gold -= $cents;
        }

        $db->table('bf_auction_balances')
            ->where('user_id', $userId)
            ->update([
                'gold_cents' => $gold,
                'hold_cents' => $hold,
            ]);

        if ($own) {
            $db->transCommit();
        }

        return true;
    }

    public function credit(int $userId, int $cents): bool
    {
        if ($cents <= 0) {
            return true;
        }

        $this->ensure($userId);

        $db  = $this->db;
        $own = $db->transDepth() === 0;
        if ($own) {
            $db->transBegin();
        }

        $row = $db->query('SELECT * FROM bf_auction_balances WHERE user_id = ? FOR UPDATE', [$userId])->getRowArray();
        if (! $row) {
            if ($own) {
                $db->transRollback();
            }
            return false;
        }

        $db->table('bf_auction_balances')
            ->where('user_id', $userId)
            ->update([
                'gold_cents' => (int) $row['gold_cents'] + $cents,
            ]);

        if ($own) {
            $db->transCommit();
        }

        return true;
    }
}