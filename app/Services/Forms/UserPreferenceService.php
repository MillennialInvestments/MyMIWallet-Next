<?php

declare(strict_types=1);

namespace App\Services\Forms;

use CodeIgniter\Database\BaseConnection;

/**
 * GT-FORM-ROUTES-001: per-user settings stored as one JSON document per scope
 * in bf_user_preferences (budget settings, retirement goals, liked economic
 * data series). Values are always keyed by the session user id.
 */
final class UserPreferenceService
{
    private BaseConnection $db;

    public function __construct(?BaseConnection $db = null, private readonly string $table = 'bf_user_preferences')
    {
        $this->db = $db ?? db_connect();
    }

    public function available(): bool
    {
        return $this->db->tableExists($this->table);
    }

    /** @return array<string, mixed> */
    public function get(int $userId, string $scope): array
    {
        if ($userId <= 0 || ! $this->available()) {
            return [];
        }
        $row = $this->db->table($this->table)->select('data')
            ->where('user_id', $userId)->where('scope', $scope)->limit(1)->get()->getRowArray();
        $data = is_array($row) ? json_decode((string) $row['data'], true) : null;

        return is_array($data) ? $data : [];
    }

    /** @param array<string, mixed> $data */
    public function put(int $userId, string $scope, array $data): bool
    {
        if ($userId <= 0 || $scope === '' || ! $this->available()) {
            return false;
        }
        $json = json_encode($data, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE);
        if ($json === false || strlen($json) > 65535) {
            return false;
        }
        $now = date('Y-m-d H:i:s');
        $builder = $this->db->table($this->table);
        $exists = $builder->select('id')->where('user_id', $userId)->where('scope', $scope)->limit(1)->get()->getRowArray();
        if (is_array($exists)) {
            return (bool) $this->db->table($this->table)->where('id', (int) $exists['id'])->update(['data' => $json, 'updated_at' => $now]);
        }

        return (bool) $this->db->table($this->table)->insert([
            'user_id' => $userId, 'scope' => $scope, 'data' => $json, 'created_at' => $now, 'updated_at' => $now,
        ]);
    }

    /**
     * Keep only the listed keys, typed by their default value.
     *
     * @param array<string, mixed> $defaults
     * @param array<string, mixed> $input
     *
     * @return array<string, mixed>
     */
    public static function shape(array $defaults, array $input): array
    {
        $out = [];
        foreach ($defaults as $key => $default) {
            $value = $input[$key] ?? null;
            if (is_bool($default)) {
                $out[$key] = in_array($value, [true, 1, '1', 'on', 'true', 'yes'], true);
            } elseif (is_int($default) || is_float($default)) {
                $out[$key] = is_numeric($value) ? max(0.0, (float) $value) : $default;
            } elseif (is_array($default)) {
                $list = is_array($value) ? $value : [];
                $out[$key] = array_values(array_slice(array_unique(array_filter(array_map(
                    static fn ($v) => mb_substr(trim(strip_tags((string) $v)), 0, 60),
                    $list
                ), static fn ($v) => $v !== '')), 0, 50));
            } else {
                $out[$key] = $value === null ? $default : mb_substr(trim(strip_tags((string) $value)), 0, 120);
            }
        }

        return $out;
    }
}
