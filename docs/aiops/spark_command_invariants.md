# CI4 Spark Command Invariants (HARD RULES)

Spark command discovery is fragile. Violations cause Spark to fail silently.

## Applies To
- app/Commands/**
- app/Commands/**/*
- app/Commands/SafeBaseCommand.php

---

## ❌ FORBIDDEN (WILL BREAK SPARK)

### 1. Typed properties in ANY Spark command
❌ This includes:
- bool
- int
- string
- array
- mixed
- union types

Example (INVALID):
```php
protected bool $defaultDryRun = true;
