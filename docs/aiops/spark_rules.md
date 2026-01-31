# Spark Command Invariants (CI4)

These rules are non-negotiable.

## Command Rules
- NO constructors
- NO typed properties
- NO file-scope executable code
- NO service() calls at property level
- NO exit()/die()
- Must extend SafeBaseCommand or BaseCommand only
- Must not reference unavailable interfaces or traits

## Base Command Rules
- SafeBaseCommand must not contain typed properties
- SafeBaseCommand must not have a constructor
- SafeBaseCommand must not access services during class load

## Console.php Rules
- Console.php must contain ONLY a config class
- No executable logic at file scope
- All listed commands MUST be Spark-safe

## Failure Mode
- ONE violation breaks ALL Spark commands
- Spark may fail silently

## Enforcement
- AIOps must scan app/Commands/** before PR approval
- Any violation must generate a patch, not suggestions
