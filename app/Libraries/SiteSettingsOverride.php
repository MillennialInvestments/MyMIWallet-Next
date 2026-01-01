<?php

namespace App\Libraries;

use App\Config\SiteSettings;
use CodeIgniter\Database\BaseConnection;

class SiteSettingsOverride
{
    public function __construct(private ?BaseConnection $db = null)
    {
        $this->db = $db ?? db_connect();
    }

    public function apply(SiteSettings $settings): SiteSettings
    {
        if (! $this->db->tableExists('bf_site_settings_overrides')) {
            return $settings;
        }

        $overrides = $this->db->table('bf_site_settings_overrides')->get()->getResultArray();
        foreach ($overrides as $row) {
            if (property_exists($settings, $row['setting_key'])) {
                $settings->{$row['setting_key']} = $this->castValue($settings->{$row['setting_key']}, $row['setting_value']);
            }
        }

        return $settings;
    }

    public function save(string $key, string $value, ?int $userId = null): void
    {
        $data = [
            'setting_key'   => $key,
            'setting_value' => $value,
            'updated_at'    => date('Y-m-d H:i:s'),
            'updated_by'    => $userId,
        ];

        $existing = $this->db->table('bf_site_settings_overrides')->where('setting_key', $key)->get()->getFirstRow();
        if ($existing) {
            $this->db->table('bf_site_settings_overrides')->where('setting_key', $key)->update($data);
        } else {
            $this->db->table('bf_site_settings_overrides')->insert($data);
        }
    }

    private function castValue(mixed $currentValue, string $value): mixed
    {
        if (is_bool($currentValue)) {
            return filter_var($value, FILTER_VALIDATE_BOOLEAN, FILTER_NULL_ON_FAILURE) ?? false;
        }
        if (is_int($currentValue)) {
            return (int) $value;
        }
        if (is_float($currentValue)) {
            return (float) $value;
        }

        return $value;
    }
}
