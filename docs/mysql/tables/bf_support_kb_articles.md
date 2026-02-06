# bf_support_kb_articles

## Source
- Migration: _None_
- Model:
- Code references: app/Models/SupportModel.php:126, app/Models/SupportModel.php:129, app/Models/SupportModel.php:143, app/Models/SupportModel.php:203, app/Models/SupportModel.php:208, docs/aiops/artifacts/db-drift/20260201-181038/summary.md:195, docs/aiops/artifacts/db-drift/20260201-184402/summary.md:195, docs/_aiops/doc-change-log.md:1988

## Create table
```sql
CREATE TABLE IF NOT EXISTS `bf_support_kb_articles` (
  `id` int unsigned NOT NULL DEFAULT NULL AUTO_INCREMENT,
  `slug` varchar(191) NOT NULL DEFAULT NULL,
  `title` varchar(191) NOT NULL DEFAULT NULL,
  `category` varchar(120) NULL DEFAULT NULL,
  `tags_json` text NULL DEFAULT NULL,
  `body_html` mediumtext NULL DEFAULT NULL,
  `published` tinyint(1) NOT NULL DEFAULT 0,
  `views` int NOT NULL DEFAULT 0,
  `created_at` datetime NULL DEFAULT NULL,
  `updated_at` datetime NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
```

## Required columns
- id int unsigned NOT NULL
- slug varchar(191) NOT NULL
- title varchar(191) NOT NULL
- category varchar(120) NULL
- tags_json text NULL
- body_html mediumtext NULL
- published tinyint(1) NOT NULL
- views int NOT NULL
- created_at datetime NULL
- updated_at datetime NULL

## Required indexes
- _No indexes defined_

## Verification
```sql
SHOW CREATE TABLE `bf_support_kb_articles`;
```

```sql
SELECT COLUMN_NAME, COLUMN_TYPE, IS_NULLABLE, COLUMN_DEFAULT, EXTRA
FROM information_schema.columns
WHERE table_schema = DATABASE() AND table_name = 'bf_support_kb_articles'
ORDER BY ORDINAL_POSITION;
```

```sql
SELECT INDEX_NAME, NON_UNIQUE, COLUMN_NAME, SEQ_IN_INDEX
FROM information_schema.statistics
WHERE table_schema = DATABASE() AND table_name = 'bf_support_kb_articles'
ORDER BY INDEX_NAME, SEQ_IN_INDEX;
```

