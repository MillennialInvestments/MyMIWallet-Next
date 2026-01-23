# bf_ops_schema_audit

## Source
- Migration:
- Model:
- Code references: app/Commands/DbApplyDocs.php

## Create table
```sql
CREATE TABLE IF NOT EXISTS bf_ops_schema_audit (
  id BIGINT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  operation VARCHAR(16) NOT NULL,
  table_name VARCHAR(64) NOT NULL,
  sql_hash CHAR(64) NOT NULL,
  applied_by VARCHAR(64) NOT NULL,
  applied_at DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
  source VARCHAR(64) DEFAULT 'db:apply-docs'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
```

## Required columns
- id BIGINT UNSIGNED NOT NULL
- operation VARCHAR(16) NOT NULL
- table_name VARCHAR(64) NOT NULL
- sql_hash CHAR(64) NOT NULL
- applied_by VARCHAR(64) NOT NULL
- applied_at DATETIME NOT NULL
- source VARCHAR(64) NULL

## Required indexes
- PRIMARY (id)

## Verification
```sql
SHOW CREATE TABLE bf_ops_schema_audit;
```
