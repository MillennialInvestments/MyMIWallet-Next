# MySQL Schema Notes (Control Plane)

The following tables support the Control Plane task registry and Ops Inbox. All examples are compatible with MySQL 5.7+ and MySQL 8.

## project_task_registry
```sql
CREATE TABLE IF NOT EXISTS `project_task_registry` (
  `id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `project` VARCHAR(191) NOT NULL,
  `title` VARCHAR(255) NOT NULL,
  `description` TEXT NULL,
  `status` VARCHAR(32) NOT NULL DEFAULT 'new',
  `priority` VARCHAR(32) NOT NULL DEFAULT 'normal',
  `assignee` VARCHAR(191) NULL,
  `source` VARCHAR(64) NULL,
  `source_ref` VARCHAR(191) NULL,
  `planned_at` DATETIME NULL,
  `due_at` DATETIME NULL,
  `meta_json` JSON NULL,
  `created_at` DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  INDEX `idx_project_status` (`project`, `status`),
  INDEX `idx_due` (`due_at`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
```

### vw_project_tasks_next
```sql
CREATE OR REPLACE VIEW `vw_project_tasks_next` AS
SELECT
  id,
  project,
  title,
  status,
  priority,
  due_at,
  assignee
FROM project_task_registry
WHERE status IN ('new', 'in_progress', 'ready')
ORDER BY
  CASE priority
    WHEN 'urgent' THEN 1
    WHEN 'high' THEN 2
    WHEN 'normal' THEN 3
    ELSE 4
  END,
  COALESCE(due_at, '9999-12-31 00:00:00');
```

## bf_ops_command_inbox
```sql
CREATE TABLE IF NOT EXISTS `bf_ops_command_inbox` (
  `id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `message_id` VARCHAR(255) NULL,
  `from_email` VARCHAR(255) NOT NULL,
  `subject` VARCHAR(255) NULL,
  `raw_body` LONGTEXT NULL,
  `parsed_json` JSON NULL,
  `ai_plan_json` JSON NULL,
  `ai_summary` TEXT NULL,
  `security_flags` JSON NULL,
  `status` VARCHAR(32) NOT NULL DEFAULT 'New',
  `meta_json` JSON NULL,
  `received_at` DATETIME NULL,
  `created_at` DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  INDEX `idx_status` (`status`),
  INDEX `idx_received` (`received_at`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
```

### Compatibility notes
- MySQL 5.7 supports `JSON` but lacks generated columns for indexing; indexes above target top-level columns only.
- If JSON is unavailable, `parsed_json` and `ai_plan_json` can be stored as `LONGTEXT` with application-level validation.
- Keep tokens and secrets out of these tables.
