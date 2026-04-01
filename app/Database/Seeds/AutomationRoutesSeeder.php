<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class AutomationRoutesSeeder extends Seeder
{
    public function run()
    {
        $routes = [
            [
                'route_key' => 'cronFetchAndGenerateNews',
                'handler_type' => 'internal_method',
                'handler_target' => 'MyMIMarketing::cronFetchAndGenerateNews',
                'enabled' => 1,
            ],
            [
                'route_key' => 'generateDailyContentDigest',
                'handler_type' => 'internal_method',
                'handler_target' => 'MyMIMarketing::generateDailyContentDigest',
                'enabled' => 1,
            ],
            [
                'route_key' => 'distributeContent',
                'handler_type' => 'http_endpoint',
                'handler_target' => '/API/Management/distributeTodaysNewsContent',
                'enabled' => 1,
            ],
        ];

        foreach ($routes as $route) {
            $this->db->table('automation_routes')->ignore(true)->insert($route);
        }
    }
}
