<?php

namespace App\Libraries\Privacy;

use CodeIgniter\Database\BaseConnection;
use Config\Privacy;

/**
 * Builds a JSON copy of everything we hold about one user (GTM-045).
 */
class DataExportService
{
    private Privacy $cfg;

    public function __construct(private BaseConnection $db, ?Privacy $cfg = null)
    {
        $this->cfg = $cfg ?? config(Privacy::class);
    }

    public function buildBundle(int $userId): array
    {
        $bundle = [
            'generated_at' => gmdate('c'),
            'user_id'      => $userId,
            'account'      => null,
            'tables'       => [],
        ];

        if ($this->db->tableExists($this->cfg->usersTable, false)) {
            $row = $this->db->table($this->cfg->usersTable)->where('id', $userId)->get()->getRowArray();
            $bundle['account'] = $row ? $this->clean($row) : null;
        }

        foreach ($this->cfg->exportTables as $table => $userColumn) {
            if (! $this->db->tableExists($table, false) || ! in_array($userColumn, $this->db->getFieldNames($table), true)) {
                continue;
            }
            $rows = $this->db->table($table)->where($userColumn, $userId)->get()->getResultArray();
            $bundle['tables'][$table] = array_map(fn (array $r): array => $this->clean($r), $rows);
        }

        return $bundle;
    }

    /** Writes the bundle to a private file and returns its path. */
    public function exportUser(int $userId): string
    {
        $dir = WRITEPATH . 'exports/privacy';
        if (! is_dir($dir)) {
            mkdir($dir, 0700, true);
        }
        $file = $dir . '/export_' . $userId . '_' . gmdate('Ymd_His') . '_' . bin2hex(random_bytes(6)) . '.json';
        file_put_contents($file, json_encode($this->buildBundle($userId), JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES));
        @chmod($file, 0600);

        return $file;
    }

    private function clean(array $row): array
    {
        $out = [];
        foreach ($row as $col => $value) {
            if ($this->isSecret((string) $col)) {
                continue;
            }
            if (in_array(strtolower((string) $col), $this->cfg->maskedColumns, true) && is_string($value) && $value !== '') {
                $value = str_repeat('*', max(0, strlen($value) - 4)) . substr($value, -4);
            }
            $out[$col] = $value;
        }

        return $out;
    }

    private function isSecret(string $col): bool
    {
        $col = strtolower($col);
        foreach ($this->cfg->secretColumns as $pattern) {
            if (fnmatch(strtolower($pattern), $col)) {
                return true;
            }
        }

        return false;
    }
}
