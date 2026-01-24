<?php

namespace App\Libraries\DbInventory;

class SchemaRecorderDb
{
    public array $tables = [];
    public array $sources = [];

    public function tableExists(string $table): bool
    {
        return isset($this->tables[$table]);
    }

    public function fieldExists(string $field, string $table): bool
    {
        return isset($this->tables[$table]['columns'][$field]);
    }

    public function registerTable(string $table, array $columns, array $indexes, array $unique, array $foreignKeys, array $attributes = []): void
    {
        $this->tables[$table] = [
            'columns'      => $columns,
            'indexes'      => $indexes,
            'unique'       => $unique,
            'foreign_keys' => $foreignKeys,
            'attributes'   => $attributes,
        ];
    }

    public function addColumns(string $table, array $columns): void
    {
        if (! isset($this->tables[$table])) {
            $this->tables[$table] = [
                'columns'      => [],
                'indexes'      => [],
                'unique'       => [],
                'foreign_keys' => [],
                'attributes'   => [],
            ];
        }

        foreach ($columns as $name => $spec) {
            $this->tables[$table]['columns'][$name] = $spec;
        }
    }

    public function addIndex(string $table, string $indexName, array $columns, bool $unique = false): void
    {
        if (! isset($this->tables[$table])) {
            $this->tables[$table] = [
                'columns'      => [],
                'indexes'      => [],
                'unique'       => [],
                'foreign_keys' => [],
                'attributes'   => [],
            ];
        }

        if ($unique) {
            $this->tables[$table]['unique'][$indexName] = $columns;
            return;
        }

        $this->tables[$table]['indexes'][$indexName] = $columns;
    }

    public function addForeignKey(string $table, array $foreignKey): void
    {
        if (! isset($this->tables[$table])) {
            $this->tables[$table] = [
                'columns'      => [],
                'indexes'      => [],
                'unique'       => [],
                'foreign_keys' => [],
                'attributes'   => [],
            ];
        }

        $this->tables[$table]['foreign_keys'][] = $foreignKey;
    }

    public function addSource(string $table, string $source): void
    {
        $this->sources[$table][] = $source;
    }

    public function query(string $sql, array $params = [])
    {
        $normalized = strtoupper($sql);
        if (str_contains($normalized, 'CREATE') && str_contains($normalized, 'INDEX')) {
            if (preg_match('/CREATE\s+(UNIQUE\s+)?INDEX\s+`?([a-zA-Z0-9_]+)`?\s+ON\s+`?([a-zA-Z0-9_]+)`?\s*\(([^)]+)\)/i', $sql, $matches)) {
                $unique = trim((string) $matches[1]) !== '';
                $indexName = $matches[2];
                $table = $matches[3];
                $columnList = array_map('trim', explode(',', $matches[4]));
                $columns = array_map(static fn (string $value): string => trim($value, '` '), $columnList);
                $this->addIndex($table, $indexName, $columns, $unique);
            }
        }

        return new class {
            public function getResultArray(): array
            {
                return [];
            }
        };
    }
}
