<?php

namespace Tests\Support\Database;

use CodeIgniter\Database\BaseConnection;
use Config\Database;

/**
 * Builds only the tables a test needs from specific App migrations.
 *
 * The full migration chain cannot run on the SQLite test database: Myth/Auth
 * and Shield both create `users`, and some App migrations use MySQL-only table
 * options. App migrations also name tables with a literal `bf_` prefix because
 * production runs with an empty DBPrefix, so Forge would create `bf_bf_*` on
 * the `bf_`-prefixed tests connection. This runs each migration's up() with the
 * prefix cleared, after dropping the listed tables. MYMI-GTM-007.
 */
trait AppliesAppMigrations
{
    /**
     * @param list<string> $migrationFiles file names under app/Database/Migrations
     * @param list<string> $tables         literal table names those migrations create
     */
    protected function applyAppMigrations(BaseConnection $db, array $migrationFiles, array $tables): void
    {
        foreach ($tables as $table) {
            $db->query('DROP TABLE IF EXISTS ' . $db->escapeIdentifiers($table));
        }
        $db->resetDataCache(); // tableExists() would otherwise trust the stale table list

        $prefix = $db->getPrefix();
        $db->setPrefix('');

        try {
            foreach ($migrationFiles as $file) {
                $before = get_declared_classes();
                require_once APPPATH . 'Database/Migrations/' . $file;
                $class = $this->migrationClassFor($file, $before);
                (new $class(Database::forge($db)))->up();
            }
        } finally {
            $db->setPrefix($prefix);
        }
    }

    private function migrationClassFor(string $file, array $before): string
    {
        $name  = preg_replace('/^\d{4}-\d{2}-\d{2}-\d{6}_/', '', basename($file, '.php'));
        $class = 'App\\Database\\Migrations\\' . $name;
        if (class_exists($class, false)) {
            return $class;
        }

        $new = array_values(array_diff(get_declared_classes(), $before));
        if (count($new) === 1) {
            return $new[0];
        }

        throw new \RuntimeException('Cannot resolve migration class for ' . $file);
    }
}
