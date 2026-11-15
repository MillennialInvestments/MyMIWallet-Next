<?php

declare(strict_types=1);

namespace App\Services\Forms;

use CodeIgniter\Database\BaseConnection;

/**
 * GT-FORM-ROUTES-001: the Account "Update Profile" modal.
 *
 * Only the signed-in user's own row is changed, only these whitelisted
 * profile fields are written, and only columns that exist in the table are
 * touched (older schemas lack some of them). Identity fields such as email,
 * username, password, KYC and SSN are never accepted here.
 */
final class ProfileUpdateService
{
    /** field => max length */
    public const FIELDS = [
        'first_name'      => 50,
        'last_name'       => 50,
        'display_name'    => 60,
        'phone'           => 30,
        'dob'             => 10,
        'address'         => 255,
        'city'            => 100,
        'state'           => 50,
        'zipcode'         => 20,
        'country'         => 100,
        'mailing_address' => 255,
    ];

    private BaseConnection $db;

    public function __construct(?BaseConnection $db = null, private readonly string $table = 'users')
    {
        $this->db = $db ?? db_connect();
    }

    /**
     * @param array<string, mixed> $input
     *
     * @return array{ok: bool, reason: string, errors?: array<string, string>, updated?: list<string>}
     */
    public function update(int $userId, array $input): array
    {
        if ($userId <= 0) {
            return ['ok' => false, 'reason' => 'unauthenticated'];
        }

        [$values, $errors] = self::clean($input);
        if ($errors !== []) {
            return ['ok' => false, 'reason' => 'invalid_input', 'errors' => $errors];
        }

        $columns = array_flip($this->db->getFieldNames($this->table));
        $values = array_intersect_key($values, $columns);
        if ($values === []) {
            return ['ok' => false, 'reason' => 'nothing_to_update'];
        }

        $exists = $this->db->table($this->table)->select('id')->where('id', $userId)->limit(1)->get()->getRowArray();
        if ($exists === null) {
            return ['ok' => false, 'reason' => 'user_not_found'];
        }

        $this->db->table($this->table)->where('id', $userId)->update($values);

        return ['ok' => true, 'reason' => 'updated', 'updated' => array_keys($values)];
    }

    /**
     * @param array<string, mixed> $input
     *
     * @return array{0: array<string, string|null>, 1: array<string, string>}
     */
    public static function clean(array $input): array
    {
        $values = [];
        $errors = [];

        foreach (self::FIELDS as $field => $max) {
            if (! array_key_exists($field, $input)) {
                continue;
            }
            $value = trim(strip_tags((string) $input[$field]));
            if (mb_strlen($value) > $max) {
                $errors[$field] = "Must be {$max} characters or fewer.";
                continue;
            }
            $values[$field] = $value === '' ? null : $value;
        }

        if (($values['first_name'] ?? null) === null && array_key_exists('first_name', $values)) {
            $errors['first_name'] = 'First name is required.';
        }

        if (isset($values['dob'])) {
            $d = \DateTime::createFromFormat('!Y-m-d', $values['dob']);
            if ($d === false || $d->format('Y-m-d') !== $values['dob'] || $d > new \DateTime('today')) {
                $errors['dob'] = 'Use a valid past date (YYYY-MM-DD).';
            }
        }

        if (isset($values['phone']) && ! preg_match('/^[0-9 +().\-]{7,30}$/', $values['phone'])) {
            $errors['phone'] = 'Use digits, spaces and + ( ) - only.';
        }

        return [$values, $errors];
    }
}
