<?php

namespace App\Libraries\DbInventory;

use CodeIgniter\Database\Migration;

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

class SchemaRecorderForge
{
    private SchemaRecorderDb $db;
    private array $fields = [];
    private array $indexes = [];
    private array $unique = [];
    private array $foreignKeys = [];
    private array $attributes = [];
    private string $source = '';

    public function __construct(SchemaRecorderDb $db)
    {
        $this->db = $db;
    }

    public function setSource(string $source): void
    {
        $this->source = $source;
    }

    public function addField($fields): void
    {
        if (is_string($fields)) {
            if ($fields === 'id') {
                $this->fields['id'] = [
                    'type'           => 'INT',
                    'constraint'     => 11,
                    'unsigned'       => true,
                    'auto_increment' => true,
                ];
            }
            return;
        }

        foreach ($fields as $name => $spec) {
            $this->fields[$name] = $spec;
        }
    }

    public function addKey($fields, bool $primary = false, bool $unique = false, string $keyName = ''): void
    {
        $columns = is_array($fields) ? $fields : [$fields];
        $indexName = $keyName !== '' ? $keyName : ($primary ? 'PRIMARY' : implode('_', $columns));

        if ($primary) {
            $this->indexes['PRIMARY'] = $columns;
            return;
        }

        if ($unique) {
            $this->unique[$indexName] = $columns;
            return;
        }

        $this->indexes[$indexName] = $columns;
    }

    public function addUniqueKey($fields, string $keyName = ''): void
    {
        $this->addKey($fields, false, true, $keyName);
    }

    public function addForeignKey(string $fieldName, string $foreignTable, string $foreignField, string $onDelete = '', string $onUpdate = '', string $constraintName = ''): void
    {
        $this->foreignKeys[] = [
            'field'       => $fieldName,
            'ref_table'   => $foreignTable,
            'ref_field'   => $foreignField,
            'on_delete'   => $onDelete,
            'on_update'   => $onUpdate,
            'constraint'  => $constraintName,
        ];
    }

    public function createTable(string $table, bool $ifNotExists = false, array $attributes = []): void
    {
        $this->db->registerTable($table, $this->fields, $this->indexes, $this->unique, $this->foreignKeys, $attributes);
        $this->db->addSource($table, $this->source);
        $this->reset();
    }

    public function addColumn(string $table, array $fields): void
    {
        $this->db->addColumns($table, $fields);
        $this->db->addSource($table, $this->source);
    }

    public function dropColumn(string $table, $fields): void
    {
        $columns = is_array($fields) ? $fields : [$fields];
        foreach ($columns as $column) {
            unset($this->db->tables[$table]['columns'][$column]);
        }
    }

    public function dropTable(string $table, bool $ifExists = false): void
    {
        unset($this->db->tables[$table]);
    }

    public function reset(): void
    {
        $this->fields = [];
        $this->indexes = [];
        $this->unique = [];
        $this->foreignKeys = [];
        $this->attributes = [];
    }
}

class MigrationRunner
{
    private SchemaRecorderDb $db;
    private SchemaRecorderForge $forge;

    public function __construct(SchemaRecorderDb $db, SchemaRecorderForge $forge)
    {
        $this->db = $db;
        $this->forge = $forge;
    }

    public function runMigration(string $file, string $class): void
    {
        $instance = new $class();
        $this->injectDependencies($instance);
        $this->forge->setSource($file);
        $instance->up();
    }

    private function injectDependencies(Migration $migration): void
    {
        $reflection = new \ReflectionClass($migration);
        foreach (['db' => $this->db, 'forge' => $this->forge] as $property => $value) {
            if ($reflection->hasProperty($property)) {
                $refProperty = $reflection->getProperty($property);
                $refProperty->setAccessible(true);
                $refProperty->setValue($migration, $value);
            }
        }
    }
}
