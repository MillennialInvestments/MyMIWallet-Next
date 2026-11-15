<?php

declare(strict_types=1);

namespace App\Services\Forms;

use CodeIgniter\Database\BaseConnection;

/**
 * GT-FORM-ROUTES-001: stores customer support requests and article feedback in
 * bf_support_requests, the table the Management support views already read
 * (status "Pending"). Nothing is emailed or posted anywhere from here.
 *
 * The user id comes only from the session, never from the form: the old forms
 * posted a hidden user_id field that anyone could change.
 */
final class SupportRequestService
{
    private BaseConnection $db;

    public function __construct(?BaseConnection $db = null, private readonly string $table = 'bf_support_requests')
    {
        $this->db = $db ?? db_connect();
    }

    /**
     * @param array<string, mixed> $input  name, email, topic/subject, details
     *
     * @return array{ok: bool, reason: string, id?: int, errors?: array<string, string>}
     */
    public function submit(?int $sessionUserId, ?string $sessionEmail, array $input, string $defaultTopic = 'General'): array
    {
        $email = strtolower(trim((string) ($sessionEmail ?: ($input['email'] ?? ''))));
        $name = mb_substr(trim(strip_tags((string) ($input['name'] ?? ''))), 0, 100);
        $topic = mb_substr(trim(strip_tags((string) ($input['topic'] ?? $input['subject'] ?? ''))), 0, 100);
        $details = mb_substr(trim(strip_tags((string) ($input['details'] ?? ''))), 0, 5000);

        $errors = [];
        if ($email === '' || filter_var($email, FILTER_VALIDATE_EMAIL) === false) {
            $errors['email'] = 'A valid email address is required.';
        }
        if (mb_strlen($details) < 5) {
            $errors['details'] = 'Please describe the issue.';
        }
        if ($errors !== []) {
            return ['ok' => false, 'reason' => 'invalid_input', 'errors' => $errors];
        }

        if ($topic === '' || $topic === 'Select-An-Option') {
            $topic = $defaultTopic;
        }

        $row = [
            'user_id' => ($sessionUserId ?? 0) > 0 ? $sessionUserId : null,
            'email'   => $email,
            'name'    => $name,
            'topic'   => $topic,
            'details' => $details,
            'status'  => 'Pending',
            'date'    => date('Y-m-d'),
            'time'    => date('H:i:s'),
        ];

        $columns = array_flip($this->db->getFieldNames($this->table));
        $row = array_intersect_key($row, $columns);

        if (! $this->db->table($this->table)->insert($row)) {
            return ['ok' => false, 'reason' => 'store_failed'];
        }

        return ['ok' => true, 'reason' => 'submitted', 'id' => (int) $this->db->insertID()];
    }
}
