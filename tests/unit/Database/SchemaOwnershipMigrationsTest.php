<?php

declare(strict_types=1);

namespace Tests\Unit\Database;

use CodeIgniter\Test\CIUnitTestCase;

/**
 * @internal
 */
final class SchemaOwnershipMigrationsTest extends CIUnitTestCase
{
    private string $migrationsDir;
    private string $repoRoot;

    protected function setUp(): void
    {
        parent::setUp();
        $this->repoRoot = defined('ROOTPATH') ? rtrim(ROOTPATH, '/\\') : dirname(__DIR__, 3);
        $this->migrationsDir = $this->repoRoot . '/app/Database/Migrations';
    }

    public function testAllMigrationFilesFollowNamingConventionAndDeclareMatchingClasses(): void
    {
        $this->assertDirectoryExists($this->migrationsDir);
        $files = glob($this->migrationsDir . '/*.php') ?: [];
        $this->assertNotEmpty($files, 'Migration directory should contain migration files');
        $this->assertGreaterThanOrEqual(100, count($files), 'Expected at least 100 migrations');

        $errors = [];
        foreach ($files as $file) {
            $base = basename($file, '.php');
            $parts = explode('_', $base, 2);

            if (count($parts) < 2) {
                $errors[] = "File {$base} does not follow timestamp_ClassName pattern";
                continue;
            }

            $expectedClass = $parts[1];
            $content = (string) file_get_contents($file);

            if (! preg_match('/class\s+([A-Za-z0-9_]+)\s+extends\s+Migration/i', $content, $m)) {
                $errors[] = "File {$base} does not contain a class extending Migration";
                continue;
            }

            if ($m[1] !== $expectedClass) {
                $errors[] = "File {$base} class mismatch: expected {$expectedClass}, found {$m[1]}";
            }

            if (! preg_match('/function\s+up\s*\(/i', $content)) {
                $errors[] = "File {$base} missing up() method";
            }

            if (! preg_match('/function\s+down\s*\(/i', $content)) {
                $errors[] = "File {$base} missing down() method";
            }
        }

        $this->assertEmpty($errors, "Migration naming and declaration violations:\n" . implode("\n", $errors));
    }

    public function testAllMigrationsEnforceDefensiveGuardsOnTableCreation(): void
    {
        $files = glob($this->migrationsDir . '/*.php') ?: [];
        $violations = [];

        foreach ($files as $file) {
            $base = basename($file);
            $content = (string) file_get_contents($file);

            if (preg_match_all('/createTable\s*\(([^;]+)\)/', $content, $matches)) {
                foreach ($matches[1] as $callArgs) {
                    $args = explode(',', $callArgs);
                    $hasIfNotExists = isset($args[1]) && trim($args[1]) === 'true';
                    $hasTableExists = str_contains($content, 'tableExists');

                    if (! $hasIfNotExists && ! $hasTableExists) {
                        $violations[] = "{$base}: createTable without tableExists guard or ifNotExists=true";
                    }
                }
            }
        }

        $this->assertEmpty($violations, "Table creation guard violations:\n" . implode("\n", $violations));
    }

    public function testAllMigrationsEnforceDefensiveGuardsOnAddColumn(): void
    {
        $files = glob($this->migrationsDir . '/*.php') ?: [];
        $violations = [];

        foreach ($files as $file) {
            $base = basename($file);
            $content = (string) file_get_contents($file);

            if (str_contains($content, 'addColumn')) {
                $hasFieldCheck = str_contains($content, 'fieldExists')
                    || str_contains($content, 'getFieldNames')
                    || str_contains($content, 'getFieldData');
                $hasTableCheck = str_contains($content, 'tableExists');

                if (! $hasFieldCheck && ! $hasTableCheck) {
                    $violations[] = "{$base}: addColumn without fieldExists/getFieldNames/tableExists guards";
                }
            }
        }

        $this->assertEmpty($violations, "Column addition guard violations:\n" . implode("\n", $violations));
    }

    public function testInvestmentForecastAccuracyMigrationsAreAdditiveAndIdempotent(): void
    {
        $file1 = $this->migrationsDir . '/2026-03-10-000200_CreateInvestmentForecastAccuracyTable.php';
        $file2 = $this->migrationsDir . '/2026-03-12-000100_CreateInvestmentForecastAccuracy.php';

        $this->assertFileExists($file1);
        $this->assertFileExists($file2);

        $content1 = (string) file_get_contents($file1);
        $content2 = (string) file_get_contents($file2);

        // Both must have additive column handling when table already exists
        $this->assertStringContainsString('getFieldNames', $content1);
        $this->assertStringContainsString('evaluation_window', $content1);
        $this->assertStringContainsString('confidence_score', $content1);

        $this->assertStringContainsString('getFieldNames', $content2);
        $this->assertStringContainsString('forecast_target', $content2);
        $this->assertStringContainsString('actual_price', $content2);
        $this->assertStringContainsString('hit_target', $content2);
    }

    public function testRunMigrationsScriptDryRunExecution(): void
    {
        $script = $this->repoRoot . '/scripts/ops/db/run-migrations.php';
        $this->assertFileExists($script);

        // Valid dry-run call
        $cmdValid = sprintf('php %s --dry-run 2026-11-23-000100_CreateSecureTransferAuditTables 2>&1', escapeshellarg($script));
        exec($cmdValid, $outputValid, $exitCodeValid);
        $this->assertSame(0, $exitCodeValid, 'Expected exit code 0 for dry-run of existing migration');
        $validText = implode("\n", $outputValid);
        $this->assertTrue(
            str_contains($validText, 'would run') || str_contains($validText, 'already applied'),
            "Output should report would run or already applied, got: {$validText}"
        );

        // Invalid migration call
        $cmdInvalid = sprintf('php %s --dry-run NonExistentMigration_999999 2>&1', escapeshellarg($script));
        exec($cmdInvalid, $outputInvalid, $exitCodeInvalid);
        $this->assertSame(1, $exitCodeInvalid, 'Expected exit code 1 for non-existent migration');
        $invalidText = implode("\n", $outputInvalid);
        $this->assertStringContainsString('NOT FOUND', $invalidText);
    }

    public function testConcreteModelsDefineExplicitTableProperties(): void
    {
        $modelFiles = array_merge(
            glob($this->repoRoot . '/app/Models/*.php') ?: [],
            glob($this->repoRoot . '/app/Models/*/*.php') ?: [],
            glob($this->repoRoot . '/app/Modules/*/Models/*.php') ?: [],
            glob($this->repoRoot . '/app/Modules/*/Models/*/*.php') ?: []
        );

        $this->assertNotEmpty($modelFiles);
        $abstractOrSpecial = ['BaseModel', 'ObservedModel', 'DiscordModel', 'CoinContributionModel'];

        $missingTable = [];
        $scannedCount = 0;

        foreach ($modelFiles as $file) {
            $content = (string) file_get_contents($file);
            if (preg_match('/class\s+(\w+)\s+extends\s+(?:Model|AppModel|BaseModel|CoinLedgerModel)/', $content, $m)) {
                $className = $m[1];
                if (in_array($className, $abstractOrSpecial, true)) {
                    continue;
                }

                $scannedCount++;
                if (! preg_match('/protected\s+\$table\s*=\s*[\'"][^\'"]+[\'"]/', $content)) {
                    $missingTable[] = $className . ' (' . basename($file) . ')';
                }
            }
        }

        $this->assertGreaterThan(150, $scannedCount, 'Expected at least 150 concrete models');
        $this->assertEmpty($missingTable, "Models missing explicit \$table: " . implode(', ', $missingTable));
    }

    public function testSchemaMigrationLintScriptPassesCleanly(): void
    {
        $script = $this->repoRoot . '/scripts/ops/db/schema-migration-lint.php';
        $this->assertFileExists($script);

        $cmd = sprintf('php %s --json', escapeshellarg($script));
        exec($cmd, $output, $exitCode);

        $this->assertSame(0, $exitCode, 'Expected schema-migration-lint.php to exit with 0');
        $json = json_decode(implode("\n", $output), true);
        $this->assertIsArray($json);
        $this->assertSame('PASS', $json['status']);
        $this->assertSame(0, $json['migration_errors_count']);
        $this->assertSame(0, $json['models_missing_table_count']);
        $this->assertGreaterThanOrEqual(113, $json['migrations_total']);
    }
}
