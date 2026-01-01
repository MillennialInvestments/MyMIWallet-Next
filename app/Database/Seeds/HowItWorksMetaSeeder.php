<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class HowItWorksMetaSeeder extends Seeder
{
    public function run()
    {
        helper('url');

        $slugs = [
            'how-it-works/overview'         => 'How It Works — Overview',
            'how-it-works/marketing'        => 'How It Works — Marketing',
            'how-it-works/investments'      => 'How It Works — Investments',
            'how-it-works/earnings'         => 'How It Works — Earnings',
            'how-it-works/account-settings' => 'How It Works — Account Settings',
        ];

        foreach ($slugs as $slug => $title) {
            $builder = $this->db->table('bf_marketing_page_seo');

            $payload = [
                'page_name'         => $title,
                'page_title'        => $title,
                'page_description'  => 'Learn how MyMI Wallet works and explore the most popular how-to pages.',
                'page_url'          => site_url($slug),
                'page_internal_url' => $slug,
                'page_image'        => base_url('/assets/images/Company/MyMI-Wallet-The-Future-Of-Finance-SQ.png'),
                'status'            => 'Active',
                'source'            => 'Seeded',
                'updated_at'        => date('Y-m-d H:i:s'),
            ];

            $existing = $builder->where('page_internal_url', $slug)->get()->getFirstRow();

            if ($existing) {
                $builder->where('id', $existing->id)->update($payload);
            } else {
                $builder->insert($payload + ['created_at' => date('Y-m-d H:i:s')]);
            }
        }
    }
}
