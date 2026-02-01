# bf_users_wallets

## Source
- Migration: _None_
- Model:
- Code references: app/Modules/APIs/Controllers/ChatController.php:142, app/Modules/APIs/Controllers/ChatController.php:143, app/Modules/APIs/Controllers/ChatController.php:151, app/Modules/Management/Views/Web_Design/Content_Creator/FLinks/Flinks_API.php:135, docs/wallets/wallets_workflow.md:8, docs/functional_inventory/docs_to_code_map.md:51, docs/functional_inventory/docs_to_code_map.md:165, docs/_aiops/doc-change-log.md:2033

## Create table
```sql
CREATE TABLE IF NOT EXISTS `bf_users_wallets` (
  `md` TEXT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
```

## Required columns
- md TEXT NULL

## Required indexes
- _No indexes defined_

## Verification
```sql
SHOW CREATE TABLE `bf_users_wallets`;
```

```sql
SELECT COLUMN_NAME, COLUMN_TYPE, IS_NULLABLE, COLUMN_DEFAULT, EXTRA
FROM information_schema.columns
WHERE table_schema = DATABASE() AND table_name = 'bf_users_wallets'
ORDER BY ORDINAL_POSITION;
```

```sql
SELECT INDEX_NAME, NON_UNIQUE, COLUMN_NAME, SEQ_IN_INDEX
FROM information_schema.statistics
WHERE table_schema = DATABASE() AND table_name = 'bf_users_wallets'
ORDER BY INDEX_NAME, SEQ_IN_INDEX;
```

