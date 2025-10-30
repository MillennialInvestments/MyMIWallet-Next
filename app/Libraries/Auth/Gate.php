<?php
namespace App\Libraries\Auth;

use App\Config\Permissions as PermConfig;
use App\Models\PermissionModel;
use App\Models\PermissionRoleModel;
use App\Models\RoleModel;
use App\Models\RoleUserModel;
use App\Models\UserPermissionOverrideModel;

class Gate
{
    private static array $cache = [];

    public static function allows(string $capability, ?int $userId = null): bool
    {
        $userId = $userId ?? (int) (session('cuID') ?? 0);
        if ($userId <= 0) {
            return false;
        }

        $key = $userId . ':' . $capability;
        if (array_key_exists($key, self::$cache)) {
            return self::$cache[$key];
        }

        if (self::hasRoleCapability($userId, 'admin.*')) {
            return self::$cache[$key] = true;
        }

        $override = self::userOverride($userId, $capability);
        if ($override !== null) {
            return self::$cache[$key] = (bool) $override;
        }

        $allowed = self::hasRoleCapability($userId, $capability);
        return self::$cache[$key] = $allowed;
    }

    private static function userOverride(int $userId, string $cap): ?int
    {
        $pm = new PermissionModel();
        $perm = $pm->bySlug($cap);
        if (! $perm) {
            return null;
        }
        $om = new UserPermissionOverrideModel();
        $row = $om->where(['user_id' => $userId, 'permission_id' => $perm['id']])->first();
        return $row ? (int) $row['allow'] : null;
    }

    private static function hasRoleCapability(int $userId, string $cap): bool
    {
        $rm = new RoleModel();
        $rum = new RoleUserModel();
        $prm = new PermissionRoleModel();
        $pm  = new PermissionModel();
        $cfg = config('Permissions');

        $roleIds = array_column($rum->where('user_id', $userId)->findAll(), 'role_id');
        if (empty($roleIds)) {
            $userRole = $rm->bySlug('user');
            if ($userRole) {
                $roleIds = [$userRole['id']];
            }
        }
        if (empty($roleIds)) {
            return false;
        }

        $perm = $pm->bySlug($cap);
        if ($perm) {
            $match = $prm->where(['permission_id' => $perm['id']])
                         ->whereIn('role_id', $roleIds)
                         ->first();
            if ($match) {
                return true;
            }
        }

        $parts = explode('.', $cap);
        while (count($parts) > 1) {
            array_pop($parts);
            $wild = implode('.', $parts) . '.*';
            $permWild = $pm->bySlug($wild);
            if ($permWild) {
                $match = $prm->where(['permission_id' => $permWild['id']])
                             ->whereIn('role_id', $roleIds)
                             ->first();
                if ($match) {
                    return true;
                }
            }
        }

        foreach ($roleIds as $rid) {
            $role = (new RoleModel())->find($rid);
            if (! $role) {
                continue;
            }
            $caps = $cfg->roles[$role['slug']] ?? [];
            if (self::capListHas($caps, $cap)) {
                return true;
            }
        }

        return false;
    }

    private static function capListHas(array $caps, string $needle): bool
    {
        if (in_array('admin.*', $caps, true)) {
            return true;
        }
        if (in_array($needle, $caps, true)) {
            return true;
        }
        $parts = explode('.', $needle);
        while (count($parts) > 1) {
            array_pop($parts);
            $wild = implode('.', $parts) . '.*';
            if (in_array($wild, $caps, true)) {
                return true;
            }
        }
        return false;
    }
}
