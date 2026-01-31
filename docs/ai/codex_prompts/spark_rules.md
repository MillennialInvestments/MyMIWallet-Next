Before changing or adding any Spark commands:

1) Read docs/ai/contracts/spark_commands_contract.md and comply fully.
2) Run/ensure the repo includes:
   - tools/spark_scan_commands.php
   - tools/spark_fix.php
   - app/Commands/Runtime/SparkDoctor.php
   - app/Commands/Runtime/SparkFix.php
3) Ensure every command passes:
   - php tools/spark_scan_commands.php (must return 0)
   - php spark list (must include new command)
4) If any command breaks discovery, auto-run tools/spark_fix.php and re-check.
5) Never introduce typed metadata props or custom constructors.
