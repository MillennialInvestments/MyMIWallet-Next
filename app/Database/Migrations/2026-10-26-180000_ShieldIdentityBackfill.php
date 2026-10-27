<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;
use RuntimeException;

/**
 * MYMI-GTM-015: Idempotent Identity Backfill Migration
 *
 * Provisions missing Shield user fields and backfills existing user credentials
 * into auth_identities with zero duplicate principals and zero data loss.
 */
class ShieldIdentityBackfill extends Migration
{
    public function up()
    {
        $db = $this->db;

        // ---------------------------------------------------------------------
        // Step 1: Pre-Flight Invariant Validation (Zero Duplicate Principals)
        // ---------------------------------------------------------------------
        $duplicateCheck = $db->query("
            SELECT LOWER(TRIM(email)) AS normalized_email, COUNT(*) AS cnt, GROUP_CONCAT(id) AS user_ids
            FROM users
            WHERE email IS NOT NULL AND TRIM(email) != ''
            GROUP BY LOWER(TRIM(email))
            HAVING COUNT(*) > 1
        ")->getResultArray();

        if (! empty($duplicateCheck)) {
            $collisions = json_encode($duplicateCheck, JSON_PRETTY_PRINT);
            throw new RuntimeException("Migration aborted: Duplicate email principals detected in users table:\n" . $collisions);
        }

        // ---------------------------------------------------------------------
        // Step 2: Defensive Schema Additions on 'users' Table
        // ---------------------------------------------------------------------
        $fields = $db->getFieldData('users');
        $existingColumns = array_map(static fn($f) => $f->name, $fields);

        $addFields = [];
        if (! in_array('status', $existingColumns, true)) {
            $addFields['status'] = ['type' => 'VARCHAR', 'constraint' => 255, 'null' => true];
        }
        if (! in_array('status_message', $existingColumns, true)) {
            $addFields['status_message'] = ['type' => 'VARCHAR', 'constraint' => 255, 'null' => true];
        }
        if (! in_array('active', $existingColumns, true)) {
            $addFields['active'] = ['type' => 'TINYINT', 'constraint' => 1, 'null' => false, 'default' => 1];
        }
        if (! in_array('last_active', $existingColumns, true)) {
            $addFields['last_active'] = ['type' => 'DATETIME', 'null' => true];
        }
        if (! empty($addFields)) {
            $this->forge->addColumn('users', $addFields);
        }

        // ---------------------------------------------------------------------
        // Step 3: Resolve Dynamic Credential Columns Resiliently
        // ---------------------------------------------------------------------
        $hasPasswordHash = in_array('password_hash', $existingColumns, true);
        $hasPassword     = in_array('password', $existingColumns, true);

        if ($hasPasswordHash && $hasPassword) {
            $pwdExpr = 'COALESCE(u.password_hash, u.password)';
        } elseif ($hasPasswordHash) {
            $pwdExpr = 'u.password_hash';
        } elseif ($hasPassword) {
            $pwdExpr = 'u.password';
        } else {
            $pwdExpr = "''";
        }

        $hasCreatedAt = in_array('created_at', $existingColumns, true);
        $createdExpr  = $hasCreatedAt ? 'COALESCE(u.created_at, NOW())' : 'NOW()';

        // ---------------------------------------------------------------------
        // Step 4: Atomic Idempotent Credential Backfill
        // ---------------------------------------------------------------------
        $db->transStart();

        $db->query("
            INSERT INTO auth_identities (
                user_id,
                type,
                name,
                secret,
                secret2,
                force_reset,
                created_at,
                updated_at
            )
            SELECT 
                u.id,
                'email_password',
                NULL,
                LOWER(TRIM(u.email)),
                {$pwdExpr},
                0,
                {$createdExpr},
                NOW()
            FROM users u
            WHERE u.email IS NOT NULL AND TRIM(u.email) != ''
              AND NOT EXISTS (
                  SELECT 1 FROM auth_identities ai 
                  WHERE ai.user_id = u.id AND ai.type = 'email_password'
              )
              AND NOT EXISTS (
                  SELECT 1 FROM auth_identities ai2 
                  WHERE ai2.type = 'email_password' 
                    AND ai2.secret = LOWER(TRIM(u.email))
              )
        ");

        $db->transComplete();

        if ($db->transStatus() === false) {
            throw new RuntimeException('Failed to commit idempotent auth_identities backfill transaction.');
        }
    }

    public function down()
    {
        $db = $this->db;

        // Targeted Rollback: Remove backfilled identities for existing users
        $db->transStart();
        $db->query("
            DELETE FROM auth_identities 
            WHERE type = 'email_password' 
              AND user_id IN (SELECT id FROM users)
        ");
        $db->transComplete();
    }
}
