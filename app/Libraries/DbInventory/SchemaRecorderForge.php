<?php

namespace App\Libraries\DbInventory;

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
