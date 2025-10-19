<?php
namespace App\Services;

class OnboardingService
{
    public static function listAll(): array
    {
        return db_connect()->table('bf_onboarding_steps')->orderBy('code')->get()->getResultArray();
    }

    public static function progress(int $userId): array
    {
        $rows = db_connect()->table('bf_onboarding_progress')->where('user_id',$userId)->get()->getResultArray();
        $map = [];
        foreach ($rows as $r) $map[$r['code']] = $r['completed_at'];
        return $map;
    }

    public static function complete(int $userId, string $code): void
    {
        db_connect()->table('bf_onboarding_progress')->ignore(true)->insert([
            'user_id'=>$userId,'code'=>$code,'completed_at'=>date('Y-m-d H:i:s')
        ]);
    }
}
