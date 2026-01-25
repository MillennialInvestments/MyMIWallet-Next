# Migration Playbook

This playbook standardizes how database migrations are reviewed and applied for MyMI Wallet on DreamHost.

## Dry Run (Recommended First Step)

```bash
php spark migrate:dry-run
```

The dry-run command:
- Lists pending migrations
- Shows the migration class and target version
- Estimates tables touched (based on migration contents)
- Does **not** execute any migrations

## Apply Migrations (Manual)

When ready to execute:

1. Confirm you have a current backup.
2. Run migrations during a low-traffic window.
3. Use standard CI4 migration commands (e.g., `php spark migrate`).
4. Verify application logs and key workflows.

## Rollback Guidance

- Use CI4 rollback tools (`php spark migrate:rollback`) only if required.
- Ensure rollback targets are validated in a staging environment first.

## Safety Notes

- Never run migrations with sudo.
- Avoid service restarts during production migration windows.
- Always review migration impact and table names before execution.
