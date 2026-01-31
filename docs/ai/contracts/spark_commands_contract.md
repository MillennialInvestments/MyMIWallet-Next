# Spark Command Contract (CI4 ≥ 4.6) — MUST FOLLOW

## Discovery is fragile
If ONE command violates these rules, Spark may silently skip commands.

## Required
- Commands MUST live under: app/Commands/**
- Namespace MUST match directory: App\Commands\Subdir\ClassName
- MUST extend: App\Commands\SafeBaseCommand
- MUST define untyped metadata:
  - protected $group
  - protected $name
  - protected $description
  - protected $usage

## Forbidden
- Typed metadata properties (protected string $name)
- Custom constructor signatures
- array $config in constructors
- Extending BaseCommand directly

## Required constructor signature if present
public function __construct(
  \Psr\Log\LoggerInterface $logger,
  \CodeIgniter\CLI\Commands $commands
) {
  parent::__construct($logger, $commands);
}

## Validation tools
- php tools/spark_scan_commands.php
- php spark spark:doctor
- php tools/spark_fix.php
