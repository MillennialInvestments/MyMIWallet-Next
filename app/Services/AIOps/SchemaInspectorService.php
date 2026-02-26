<?php

declare(strict_types=1);

namespace App\Services\AIOps;

class SchemaInspectorService
{
    /** @return array<string, mixed> */
    public function getTableSchema(string $table): array
    {
        $table = trim($table);
        if ($table === '') {
            return [];
        }

        $db = db_connect();

        $cached = $db->table('bf_aiops_schema_cache')
            ->where('table_name', $table)
            ->get()
            ->getRowArray();

        if ($cached !== null && isset($cached['schema_json'])) {
            $decoded = json_decode((string) $cached['schema_json'], true);
            if (is_array($decoded)) {
                return $decoded;
            }
        }

        $schema = $this->inspectSchema($table);
        $payload = [
            'table_name' => $table,
            'schema_json' => json_encode($schema, JSON_UNESCAPED_SLASHES),
            'last_updated_at' => date('Y-m-d H:i:s'),
        ];

        if ($cached !== null) {
            $db->table('bf_aiops_schema_cache')->where('table_name', $table)->update($payload);
        } else {
            $db->table('bf_aiops_schema_cache')->insert($payload);
        }

        return $schema;
    }

    /** @return array<string, mixed> */
    private function inspectSchema(string $table): array
    {
        $db = db_connect();
        $safeTable = preg_replace('/[^a-zA-Z0-9_]/', '', $table) ?? '';
        if ($safeTable === '') {
            return [];
        }

        $columns = $db->query('SHOW COLUMNS FROM `' . $safeTable . '`')->getResultArray();
        $indexes = $db->query('SHOW INDEX FROM `' . $safeTable . '`')->getResultArray();

        return [
            'table' => $safeTable,
            'columns' => $columns,
            'indexes' => $indexes,
        ];
    }
}
