<?php

declare(strict_types=1);

namespace App\Commands\AIOps;

use App\Commands\SafeBaseCommand;
use App\Services\AIOps\SchemaInspectorService;
use CodeIgniter\CLI\CLI;

class SqlCheck extends SafeBaseCommand
{
    protected $group = 'AIOps - DB';
    protected $name = 'aiops:sql:check';
    protected $description = 'Validate model/table/query SQL compatibility against live schema.';
    protected $usage = 'aiops:sql:check --model=BudgetModel | --table=bf_users | --query="SELECT * FROM bf_users"';
    protected $options = [
        '--model' => 'Model class name, e.g. BudgetModel',
        '--table' => 'Table name to inspect',
        '--query' => 'SQL query to validate via EXPLAIN',
    ];

    public function run(array $params)
    {
        $this->parseParams($params);

        $model = (string) ($this->opt('model') ?? '');
        $table = (string) ($this->opt('table') ?? '');
        $query = (string) ($this->opt('query') ?? '');

        if ($query !== '') {
            return $this->validateQuery($query);
        }

        if ($model !== '') {
            return $this->validateModel($model);
        }

        if ($table !== '') {
            return $this->validateTable($table);
        }

        CLI::error('Provide one of --model, --table, or --query.');

        return EXIT_ERROR;
    }

    private function validateModel(string $model): int
    {
        $class = 'App\\Models\\' . ltrim($model, '\\');
        if (! class_exists($class)) {
            CLI::error("Model not found: {$class}");

            return EXIT_ERROR;
        }

        $instance = new $class();
        $table = (string) ($instance->table ?? '');
        $allowedFields = array_map('strval', (array) ($instance->allowedFields ?? []));
        $primaryKey = (string) ($instance->primaryKey ?? 'id');

        $schema = (new SchemaInspectorService())->getTableSchema($table);
        $columns = array_map(static fn(array $c): string => (string) ($c['Field'] ?? ''), $schema['columns'] ?? []);

        $missingColumns = array_values(array_diff($allowedFields, $columns));
        $extraColumns = array_values(array_diff($columns, $allowedFields));
        $primaryKeyExists = in_array($primaryKey, $columns, true);

        $payload = [
            'model' => $class,
            'table' => $table,
            'primary_key' => $primaryKey,
            'primary_key_exists' => $primaryKeyExists,
            'missing_columns' => $missingColumns,
            'extra_columns' => $extraColumns,
            'type_mismatch' => [],
        ];

        CLI::write(json_encode($payload, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES));

        return ($missingColumns === [] && $primaryKeyExists) ? EXIT_SUCCESS : EXIT_ERROR;
    }

    private function validateTable(string $table): int
    {
        $schema = (new SchemaInspectorService())->getTableSchema($table);
        if ($schema === []) {
            CLI::error('Table inspection failed.');

            return EXIT_ERROR;
        }

        CLI::write(json_encode($schema, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES));

        return EXIT_SUCCESS;
    }

    private function validateQuery(string $query): int
    {
        $db = db_connect();
        $auditId = $this->insertAudit($query);

        try {
            $explain = $db->query('EXPLAIN ' . $query)->getResultArray();
            $this->updateAudit($auditId, true, false, null);
            CLI::write(json_encode(['status' => 'valid', 'explain' => $explain], JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES));

            return EXIT_SUCCESS;
        } catch (\Throwable $e) {
            $this->updateAudit($auditId, false, false, $e->getMessage());
            CLI::error('Invalid query: ' . $e->getMessage());

            return EXIT_ERROR;
        }
    }

    private function insertAudit(string $query): int
    {
        $db = db_connect();
        $db->table('bf_aiops_query_audit')->insert([
            'query_text' => $query,
            'validated' => 0,
            'executed' => 0,
            'error_message' => null,
            'created_at' => date('Y-m-d H:i:s'),
        ]);

        return (int) $db->insertID();
    }

    private function updateAudit(int $id, bool $validated, bool $executed, ?string $error): void
    {
        db_connect()->table('bf_aiops_query_audit')->where('id', $id)->update([
            'validated' => $validated ? 1 : 0,
            'executed' => $executed ? 1 : 0,
            'error_message' => $error,
        ]);
    }
}
