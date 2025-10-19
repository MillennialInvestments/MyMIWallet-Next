<?php
namespace App\Libraries;

use App\Models\FeatureFlagModel;
use App\Models\FeatureFlagOverrideModel;

// PATCH: feature flag evaluation service
class Flags
{
    /**
     * Evaluate a flag with optional user context.
     * Context keys: user_id, roles
     */
    public static function enabled(string $flag, array $ctx = []): bool
    {
        $cacheKey = 'flags:'.$flag;
        $row = cache()->remember($cacheKey, 30, static function() use ($flag) {
            return (new FeatureFlagModel())->getByFlag($flag) ?: null;
        });
        if (! $row) return false;

        $rules = json_decode($row['rules_json'] ?? '[]', true) ?: [];
        $now   = time();
        $start = !empty($rules['start_at']) ? strtotime($rules['start_at']) : null;
        $end   = !empty($rules['end_at'])   ? strtotime($rules['end_at'])   : null;
        if (($start && $now < $start) || ($end && $now > $end)) return false;

        $uid = (int)($ctx['user_id'] ?? (session('cuID') ?? 0));
        if ($uid > 0) {
            $ovr = cache()->remember("flags:ovr:$flag:$uid", 30, static function() use ($flag, $uid) {
                return (new FeatureFlagOverrideModel())->where(['flag'=>$flag,'user_id'=>$uid])->first() ?: null;
            });
            if ($ovr !== null) return (bool)$ovr['allow'];
        }

        $roles = array_map('strval', $ctx['roles'] ?? []);
        $allowRoles = array_map('strval', $rules['allow_roles'] ?? []);
        if (!empty($allowRoles) && !empty($roles)) {
            if (count(array_intersect($allowRoles, $roles)) > 0) return true;
        }

        $allowUsers = array_map('intval', $rules['allow_users'] ?? []);
        $denyUsers  = array_map('intval', $rules['deny_users'] ?? []);
        if ($uid > 0) {
            if (in_array($uid, $denyUsers, true)) return false;
            if (in_array($uid, $allowUsers, true)) return true;
        }

        if ((int)$row['enabled'] !== 1) return false;

        $pct = (int)($row['rollout_pct'] ?? 100);
        if ($pct >= 100) return true;
        if ($pct <= 0) return false;

        $seed = $uid > 0 ? (string)$uid : (service('request')->getIPAddress() ?: session_id());
        $bucket = crc32($flag.'|'.$seed) % 100;
        return $bucket < $pct;
    }

    /** Invalidate caches after update */
    public static function bust(string $flag): void
    {
        cache()->delete('flags:'.$flag);
    }
}
