<?php

declare(strict_types=1);

namespace App\Services\Forms;

use CodeIgniter\Database\BaseConnection;

/**
 * GT-FORM-ROUTES-001: referral (affiliate) program applications.
 *
 * Rows go into bf_users_referral_program, the table the old CodeIgniter 3
 * screens and App\Models\ReferralModel already use. A new application is
 * stored with active = 0 so an admin reviews it first; the old screen set
 * active = 1 from a hidden form field, which skipped review.
 *
 * The user id and referrer code are set on the server from the session, never
 * taken from the form. One application per user.
 */
final class ReferralApplicationService
{
    public const FIELDS = ['first_name', 'last_name', 'email', 'phone', 'address', 'city', 'state', 'country', 'zipcode', 'paypal', 'other_payment', 'wallet_id'];

    private BaseConnection $db;

    public function __construct(?BaseConnection $db = null, private readonly string $table = 'bf_users_referral_program')
    {
        $this->db = $db ?? db_connect();
    }

    public static function referrerCode(int $userId, ?int $year = null): string
    {
        return 'MyMI' . ($year ?? (int) date('Y')) . '-' . $userId;
    }

    /**
     * @param array<string, mixed> $input
     *
     * @return array{ok: bool, reason: string, id?: int, errors?: array<string, string>}
     */
    public function apply(int $userId, string $userType, array $input, ?string $ip = null): array
    {
        if ($userId <= 0) {
            return ['ok' => false, 'reason' => 'not_signed_in'];
        }
        if (! $this->db->tableExists($this->table)) {
            return ['ok' => false, 'reason' => 'table_missing'];
        }

        $clean = [];
        foreach (self::FIELDS as $f) {
            $clean[$f] = mb_substr(trim(strip_tags((string) ($input[$f] ?? ''))), 0, $f === 'address' ? 255 : 100);
        }
        $clean['email'] = strtolower($clean['email']);

        $errors = [];
        foreach (['first_name' => 'First name', 'last_name' => 'Last name'] as $f => $label) {
            if ($clean[$f] === '') {
                $errors[$f] = $label . ' is required.';
            }
        }
        if ($clean['email'] === '' || filter_var($clean['email'], FILTER_VALIDATE_EMAIL) === false) {
            $errors['email'] = 'A valid email address is required.';
        }
        if ($clean['paypal'] !== '' && filter_var($clean['paypal'], FILTER_VALIDATE_EMAIL) === false) {
            $errors['paypal'] = 'PayPal must be an email address.';
        }
        if ($errors !== []) {
            return ['ok' => false, 'reason' => 'invalid_input', 'errors' => $errors];
        }

        $existing = $this->db->table($this->table)->select('id')->where('user_id', $userId)->limit(1)->get()->getRowArray();
        if (is_array($existing)) {
            return ['ok' => false, 'reason' => 'already_applied', 'id' => (int) $existing['id']];
        }

        $row = $clean + [
            'user_id'         => $userId,
            'referrer_code'   => self::referrerCode($userId),
            'active'          => 0,
            'signup_date'     => date('Y-m-d'),
            'user_type'       => mb_substr($userType, 0, 50),
            'user_ip_address' => $ip,
            'created_on'      => date('Y-m-d H:i:s'),
        ];
        $columns = array_flip($this->db->getFieldNames($this->table));
        $row = array_filter(array_intersect_key($row, $columns), static fn ($v) => $v !== null);

        try {
            $this->db->table($this->table)->insert($row);
        } catch (\Throwable $e) {
            log_message('error', 'Referral application insert failed: {m}', ['m' => $e->getMessage()]);

            return ['ok' => false, 'reason' => 'db_error'];
        }

        return ['ok' => true, 'reason' => 'stored', 'id' => (int) $this->db->insertID()];
    }

    /** @return list<array<string, mixed>> */
    public function listApplications(int $limit = 200): array
    {
        if (! $this->db->tableExists($this->table)) {
            return [];
        }

        return $this->db->table($this->table)->orderBy('id', 'DESC')->limit(max(1, min($limit, 500)))->get()->getResultArray();
    }

    public function activate(int $id): bool
    {
        if ($id <= 0 || ! $this->db->tableExists($this->table)) {
            return false;
        }
        $this->db->table($this->table)->where('id', $id)->update(['active' => 1]);

        return $this->db->affectedRows() > 0;
    }
}
