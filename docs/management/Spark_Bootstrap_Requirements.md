# Spark Bootstrap Requirements

## Writable Path Requirements

Spark commands expect the following writable paths to exist before execution:

- `writable/`
- `writable/cache/`
- `writable/cache/FactoriesCache/`
- `writable/logs/`

Repository-safe placeholders are included via `.gitkeep` so the directories exist in Git. In CI, always ensure permissions are writable before running Spark commands.

## CI Bootstrap Step

GitHub Actions should provision writable paths and permissions before Spark:

```bash
mkdir -p writable/cache/FactoriesCache writable/logs
chmod -R 777 writable
```

## CI Detection & Cache Safety

CI mode is detected via:

- `CI=true`
- `APP_ENV=testing`

When CI mode is detected, Spark disables autoloader and FileLocator cache saving to avoid writes outside of `writable/`. Spark commands must remain read-only and only write within `writable/`.

## Validation Checklist

Run in CI and confirm a zero exit status:

- `php spark list`
- `php spark ops:commands:audit`
- `php spark spark:purge-fastcgi`

Spark is CI-safe and runtime-validated.
