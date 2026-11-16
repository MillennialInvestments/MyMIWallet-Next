<?php

declare(strict_types=1);

namespace App\Services\Forms;

use CodeIgniter\Database\BaseConnection;

/**
 * GT-FORM-ROUTES-001: project discussion comments, sale requests and user
 * project proposals. The user id always comes from the session.
 *
 * Sale requests are only recorded for admin review (status "pending"); nothing
 * is moved, paid out or transferred here.
 */
final class ProjectFormService
{
    private BaseConnection $db;

    public function __construct(?BaseConnection $db = null)
    {
        $this->db = $db ?? db_connect();
    }

    private function projectExists(int $projectId): bool
    {
        if ($projectId <= 0 || ! $this->db->tableExists('bf_projects')) {
            return false;
        }

        return $this->db->table('bf_projects')->select('id')->where('id', $projectId)->limit(1)->get()->getRowArray() !== null;
    }

    /** @return array{ok: bool, reason: string, id?: int} */
    public function addComment(int $userId, int $projectId, string $topic, string $message): array
    {
        $message = mb_substr(trim(strip_tags($message)), 0, 5000);
        $topic = mb_substr(trim(strip_tags($topic)), 0, 150);
        if ($userId <= 0) {
            return ['ok' => false, 'reason' => 'not_signed_in'];
        }
        if (mb_strlen($message) < 2) {
            return ['ok' => false, 'reason' => 'invalid_input'];
        }
        if (! $this->db->tableExists('bf_project_comments')) {
            return ['ok' => false, 'reason' => 'table_missing'];
        }
        if (! $this->projectExists($projectId)) {
            return ['ok' => false, 'reason' => 'not_found'];
        }
        $now = date('Y-m-d H:i:s');
        $this->db->table('bf_project_comments')->insert([
            'project_id' => $projectId, 'user_id' => $userId, 'topic' => $topic !== '' ? $topic : null,
            'message' => $message, 'status' => 'visible', 'created_at' => $now, 'updated_at' => $now,
        ]);

        return ['ok' => true, 'reason' => 'stored', 'id' => (int) $this->db->insertID()];
    }

    /** @return array{ok: bool, reason: string, id?: int} */
    public function requestSale(int $userId, int $projectId, float $amount, string $remarks, ?string $date = null): array
    {
        if ($userId <= 0) {
            return ['ok' => false, 'reason' => 'not_signed_in'];
        }
        if (! is_finite($amount) || $amount <= 0 || $amount > 1e12) {
            return ['ok' => false, 'reason' => 'invalid_input'];
        }
        if (! $this->db->tableExists('bf_project_sale_requests')) {
            return ['ok' => false, 'reason' => 'table_missing'];
        }
        if (! $this->projectExists($projectId)) {
            return ['ok' => false, 'reason' => 'not_found'];
        }
        $day = $date !== null && preg_match('/^\d{4}-\d{2}-\d{2}$/', $date) ? $date : date('Y-m-d');
        $now = date('Y-m-d H:i:s');
        $this->db->table('bf_project_sale_requests')->insert([
            'project_id' => $projectId, 'user_id' => $userId, 'amount' => round($amount, 2), 'requested_on' => $day,
            'remarks' => mb_substr(trim(strip_tags($remarks)), 0, 1000), 'status' => 'pending',
            'created_at' => $now, 'updated_at' => $now,
        ]);

        return ['ok' => true, 'reason' => 'stored', 'id' => (int) $this->db->insertID()];
    }

    /**
     * A user-submitted project goes in as status "pending" for admin approval
     * (the same status the admin add form uses).
     *
     * @param array<string, mixed> $input
     *
     * @return array{ok: bool, reason: string, id?: int, errors?: array<string, string>}
     */
    public function propose(int $userId, string $email, string $username, array $input): array
    {
        if ($userId <= 0) {
            return ['ok' => false, 'reason' => 'not_signed_in'];
        }
        $text = static fn (string $k, int $n) => mb_substr(trim(strip_tags((string) ($input[$k] ?? ''))), 0, $n);
        $num = static fn (string $k) => is_numeric($input[$k] ?? null) ? max(0.0, (float) $input[$k]) : 0.0;

        $row = [
            'name'               => $text('name', 150),
            'description'        => $text('description', 5000),
            'target_amount'      => $num('target_amount'),
            'investment_goal'    => $num('target_amount'),
            'minimum_investment' => $num('minimum_investment'),
            'maximum_investment' => $num('maximum_investment'),
            'project_stage'      => $text('project_stage', 50),
            'completion_date'    => preg_match('/^\d{4}-\d{2}-\d{2}$/', (string) ($input['completion_date'] ?? '')) ? $input['completion_date'] : null,
            'remarks'            => $text('remarks', 1000),
            'promotional_links'  => $text('promotional_links', 1000),
            'project_type'       => 'general',
            'is_system'          => 0,
            'status'             => 'pending',
            'created_by'         => $userId,
            'user_email'         => $email,
            'username'           => $username,
            'created_at'         => date('Y-m-d H:i:s'),
        ];

        $errors = [];
        if ($row['name'] === '') {
            $errors['name'] = 'Project name is required.';
        }
        if (mb_strlen($row['description']) < 10) {
            $errors['description'] = 'Please describe the project.';
        }
        if ($row['maximum_investment'] > 0 && $row['minimum_investment'] > $row['maximum_investment']) {
            $errors['minimum_investment'] = 'Minimum investment cannot be above the maximum.';
        }
        if ($errors !== []) {
            return ['ok' => false, 'reason' => 'invalid_input', 'errors' => $errors];
        }
        if (! $this->db->tableExists('bf_projects')) {
            return ['ok' => false, 'reason' => 'table_missing'];
        }
        $row = array_filter(
            array_intersect_key($row, array_flip($this->db->getFieldNames('bf_projects'))),
            static fn ($v) => $v !== null
        );
        if (! $this->db->table('bf_projects')->insert($row)) {
            log_message('error', 'Project proposal insert failed: ' . json_encode($this->db->error()));

            return ['ok' => false, 'reason' => 'store_failed', 'message' => 'Your project could not be saved.'];
        }

        return ['ok' => true, 'reason' => 'stored', 'id' => (int) $this->db->insertID()];
    }
}
