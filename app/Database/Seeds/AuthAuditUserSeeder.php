<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;
use Myth\Auth\Entities\User;
use Myth\Auth\Models\UserModel;

class AuthAuditUserSeeder extends Seeder
{
    public const EMAIL = 'auth_audit_user@test.local';
    public const USERNAME = 'auth_audit_user';
    public const PASSWORD = 'TestPassword123!';

    public function run()
    {
        $users = model(UserModel::class);
        $existing = $users->where('email', self::EMAIL)->first();

        $data = [
            'email' => self::EMAIL,
            'username' => self::USERNAME,
            'password' => self::PASSWORD,
            'active' => 1,
            'force_pass_reset' => 0,
        ];

        if ($existing) {
            $existing->fill($data);
            $existing->activate();
            $users->save($existing);
            return;
        }

        $user = new User($data);
        $user->activate();
        $users->save($user);
    }
}
