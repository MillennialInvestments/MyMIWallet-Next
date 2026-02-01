# bf_marketing_compliance_rules

## Source
- Migration: _None_
- Model:
- Code references: docs/aiops/artifacts/db-drift/20260201-181038/summary.md:114

## Create table
```sql
CREATE TABLE IF NOT EXISTS `bf_marketing_compliance_rules` (
  `id` int unsigned NOT NULL DEFAULT NULL AUTO_INCREMENT,
  `rule_key` varchar(64) NOT NULL DEFAULT NULL,
  `active` tinyint(1) NOT NULL DEFAULT 1,
  `config_json` json NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
```

## Required columns
- id int unsigned NOT NULL
- rule_key varchar(64) NOT NULL
- active tinyint(1) NOT NULL
- config_json json NULL

## Required indexes
- _No indexes defined_

## Verification
```sql
SHOW CREATE TABLE `bf_marketing_compliance_rules`;
```

```sql
SELECT COLUMN_NAME, COLUMN_TYPE, IS_NULLABLE, COLUMN_DEFAULT, EXTRA
FROM information_schema.columns
WHERE table_schema = DATABASE() AND table_name = 'bf_marketing_compliance_rules'
ORDER BY ORDINAL_POSITION;
```

```sql
SELECT INDEX_NAME, NON_UNIQUE, COLUMN_NAME, SEQ_IN_INDEX
FROM information_schema.statistics
WHERE table_schema = DATABASE() AND table_name = 'bf_marketing_compliance_rules'
ORDER BY INDEX_NAME, SEQ_IN_INDEX;
```

