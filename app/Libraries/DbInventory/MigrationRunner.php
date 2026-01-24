<?php

namespace App\Libraries\DbInventory;

use CodeIgniter\Database\Migration;

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
