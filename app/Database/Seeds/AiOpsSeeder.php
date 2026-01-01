<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class AiOpsSeeder extends Seeder
{
    public function run()
    {
        $db      = $this->db;
        $builder = $db->table('bf_ai_ops_caps');

        $defaults = [
            [
                'subsystem'    => 'selfhost_gap_sync',
                'cap_type'     => 'CAPACITY',
                'cap_value'    => 100,
                'reset_period' => 'MONTHLY',
                'is_enabled'   => 1,
            ],
            [
                'subsystem'    => 'selfhost_marketing_drafts',
                'cap_type'     => 'CAPACITY',
                'cap_value'    => 100,
                'reset_period' => 'MONTHLY',
                'is_enabled'   => 1,
            ],
            [
                'subsystem'    => 'selfhost_pr_review',
                'cap_type'     => 'CAPACITY',
                'cap_value'    => 100,
                'reset_period' => 'MONTHLY',
                'is_enabled'   => 1,
            ],
        ];

        foreach ($defaults as $row) {
            $existing = $builder->where('subsystem', $row['subsystem'])->get()->getFirstRow();
            $timestamps = [
                'updated_at' => date('Y-m-d H:i:s'),
            ];
            if ($existing) {
                $builder->where('id', $existing->id)->update(array_merge($row, $timestamps));
            } else {
                $builder->insert(array_merge($row, $timestamps, [
                    'created_at' => date('Y-m-d H:i:s'),
                ]));
            }
        }
    }
}
