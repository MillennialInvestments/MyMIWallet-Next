<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateMditAuthRoles extends Migration
{
    public function up()
    {
        if (! $this->db->tableExists('auth_groups') || ! $this->db->tableExists('auth_permissions')) {
            return;
        }

        $groupId = $this->ensureGroup('mdit_admin', 'MDIT administrators');
        $permissionId = $this->ensurePermission('mdit.admin', 'Administer MDIT operations');

        if ($groupId && $permissionId && $this->db->tableExists('auth_groups_permissions')) {
            $exists = $this->db->table('auth_groups_permissions')
                ->where('group_id', $groupId)
                ->where('permission_id', $permissionId)
                ->countAllResults();

            if (! $exists) {
                $this->db->table('auth_groups_permissions')->insert([
                    'group_id' => $groupId,
                    'permission_id' => $permissionId,
                ]);
            }
        }
    }

    public function down()
    {
        if (! $this->db->tableExists('auth_groups') || ! $this->db->tableExists('auth_permissions')) {
            return;
        }

        $groupId = $this->getIdByName('auth_groups', 'mdit_admin');
        $permissionId = $this->getIdByName('auth_permissions', 'mdit.admin');

        if ($groupId && $permissionId && $this->db->tableExists('auth_groups_permissions')) {
            $this->db->table('auth_groups_permissions')
                ->where('group_id', $groupId)
                ->where('permission_id', $permissionId)
                ->delete();
        }

        if ($permissionId) {
            $this->db->table('auth_permissions')->where('id', $permissionId)->delete();
        }

        if ($groupId) {
            $this->db->table('auth_groups')->where('id', $groupId)->delete();
        }
    }

    private function ensureGroup(string $name, string $description): ?int
    {
        $existing = $this->db->table('auth_groups')->where('name', $name)->get()->getRowArray();
        if ($existing) {
            return (int) $existing['id'];
        }

        $this->db->table('auth_groups')->insert([
            'name' => $name,
            'description' => $description,
        ]);

        return (int) $this->db->insertID();
    }

    private function ensurePermission(string $name, string $description): ?int
    {
        $existing = $this->db->table('auth_permissions')->where('name', $name)->get()->getRowArray();
        if ($existing) {
            return (int) $existing['id'];
        }

        $this->db->table('auth_permissions')->insert([
            'name' => $name,
            'description' => $description,
        ]);

        return (int) $this->db->insertID();
    }

    private function getIdByName(string $table, string $name): ?int
    {
        if (! $this->db->tableExists($table)) {
            return null;
        }

        $row = $this->db->table($table)->where('name', $name)->get()->getRowArray();
        return $row ? (int) $row['id'] : null;
    }
}
