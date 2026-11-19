<?php

declare(strict_types=1);

namespace App\Services\Payments;

use CodeIgniter\Database\BaseConnection;

/**
 * What happens around a paid membership after checkout: the receipt, the
 * "expires soon" reminder, and a view of the member's current plan.
 *
 * Memberships are one-time 30-day passes, so the reminder is what brings a
 * member back to renew. It never changes access; PremiumEntitlementService
 * alone decides that from bf_users_subscriptions.
 */
final class MembershipLifecycleService
{
    /** Upper bound on pages read in one run (MAX_PAGES x page size members). */
    private const MAX_PAGES = 200;

    private BaseConnection $db;

    /** @var callable fn(string $to, string $subject, string $html): bool */
    private $mailer;

    public function __construct(?BaseConnection $db = null, ?callable $mailer = null, private readonly string $table = 'bf_users_subscriptions', private readonly string $usersTable = 'bf_users', private readonly string $autoRenewTable = 'bf_membership_subscriptions')
    {
        $this->db = $db ?? db_connect();
        $this->mailer = $mailer ?? static function (string $to, string $subject, string $html): bool {
            $result = (new \App\Services\MailService())->send($to, $subject, $html, ['module' => 'memberships']);

            return (bool) ($result['ok'] ?? false);
        };
    }

    /**
     * The member's live plan, or null when there is none.
     *
     * @return array{tier:string,label:string,expires_at:string,days_left:int}|null
     */
    public function current(int $userId, ?int $now = null): ?array
    {
        $now ??= time();
        if ($userId <= 0 || ! $this->ready()) {
            return null;
        }
        $row = $this->db->table($this->table)->select('membership_tier, expires_at')
            ->where('user_id', $userId)->where('membership_status', 'active')
            ->orderBy('expires_at', 'DESC')->limit(1)->get()->getRowArray();
        $end = is_array($row) ? strtotime((string) ($row['expires_at'] ?? '')) : false;
        if ($end === false || $end <= $now) {
            return null;
        }

        return [
            'tier'       => (string) $row['membership_tier'],
            'label'      => $this->tierLabel((string) $row['membership_tier']),
            'expires_at' => date('Y-m-d H:i:s', $end),
            'days_left'  => (int) ceil(($end - $now) / 86400),
        ];
    }

    /**
     * Active memberships that end between ($days - 1) and $days days from now.
     * Run once a day and each membership falls in the window exactly once.
     *
     * @return list<array{user_id:int,email:string,tier:string,label:string,expires_at:string}>
     */
    public function expiringIn(int $days, ?int $now = null, int $pageSize = 500): array
    {
        $now ??= time();
        $days = max(1, $days);
        $pageSize = max(1, $pageSize);
        if (! $this->ready() || ! $this->db->tableExists($this->usersTable)) {
            return [];
        }
        // Members on auto-renew are charged by PayPal and need no "renew now" email.
        $skipAuto = $this->db->tableExists($this->autoRenewTable);

        $out = [];
        // Pages through the whole window so a busy day is not cut off at one page.
        for ($page = 0; $page < self::MAX_PAGES; $page++) {
            $builder = $this->db->table($this->table . ' s')
                ->select('s.user_id, s.membership_tier, s.expires_at, u.email')
                ->join($this->usersTable . ' u', 'u.id = s.user_id')
                ->where('s.membership_status', 'active')
                ->where('s.expires_at >', date('Y-m-d H:i:s', $now + ($days - 1) * 86400))
                ->where('s.expires_at <=', date('Y-m-d H:i:s', $now + $days * 86400));
            if ($skipAuto) {
                $builder->where('s.user_id NOT IN (SELECT a.user_id FROM ' . $this->db->escapeIdentifiers($this->autoRenewTable) . " a WHERE a.status = 'active')", null, false);
            }
            $rows = $builder->orderBy('s.expires_at', 'ASC')->orderBy('s.id', 'ASC')
                ->limit($pageSize, $page * $pageSize)->get()->getResultArray();

            foreach ($rows as $row) {
                $email = trim((string) ($row['email'] ?? ''));
                if (! filter_var($email, FILTER_VALIDATE_EMAIL)) {
                    continue;
                }
                $out[] = [
                    'user_id'    => (int) $row['user_id'],
                    'email'      => $email,
                    'tier'       => (string) $row['membership_tier'],
                    'label'      => $this->tierLabel((string) $row['membership_tier']),
                    'expires_at' => (string) $row['expires_at'],
                ];
            }
            if (count($rows) < $pageSize) {
                break;
            }
        }

        return $out;
    }

    /**
     * @return array{due:int,sent:int,failed:int}
     */
    public function sendExpiryReminders(int $days, bool $send, ?int $now = null): array
    {
        $due = $this->expiringIn($days, $now);
        $sent = $failed = 0;
        if ($send) {
            foreach ($due as $member) {
                $html = view('emails/membership_expiring', [
                    'label'      => $member['label'],
                    'expires_on' => date('F j, Y', (int) strtotime($member['expires_at'])),
                    'renew_url'  => site_url('Memberships'),
                ]);
                $this->deliver($member['email'], 'Your MyMI Wallet membership ends soon', $html) ? $sent++ : $failed++;
            }
        }

        return ['due' => count($due), 'sent' => $sent, 'failed' => $failed];
    }

    public function sendReceipt(int $userId, string $planLabel, float $amount, string $expiresAt, string $orderId): bool
    {
        if (! $this->db->tableExists($this->usersTable)) {
            return false;
        }
        $user = $this->db->table($this->usersTable)->select('email')->where('id', $userId)->limit(1)->get()->getRowArray();
        $email = trim((string) ($user['email'] ?? ''));
        if (! filter_var($email, FILTER_VALIDATE_EMAIL)) {
            return false;
        }
        $html = view('emails/membership_receipt', [
            'label'      => $planLabel,
            'amount'     => number_format($amount, 2),
            'expires_on' => date('F j, Y', (int) strtotime($expiresAt)),
            'order_id'   => $orderId,
            'dashboard'  => site_url('Dashboard'),
        ]);

        return $this->deliver($email, 'Your MyMI Wallet ' . $planLabel . ' membership is active', $html);
    }

    /** A mail failure must never undo or block a paid activation. */
    private function deliver(string $to, string $subject, string $html): bool
    {
        try {
            return (bool) ($this->mailer)($to, $subject, $html);
        } catch (\Throwable $e) {
            log_message('error', 'Membership email failed: {m}', ['m' => $e->getMessage()]);

            return false;
        }
    }

    private function ready(): bool
    {
        return $this->db->tableExists($this->table)
            && $this->db->fieldExists('membership_status', $this->table)
            && $this->db->fieldExists('expires_at', $this->table);
    }

    private function tierLabel(string $tier): string
    {
        return ['tier1' => 'Starter / Basic', 'tier2' => 'Pro', 'tier3' => 'Premium'][$tier] ?? 'Member';
    }
}
