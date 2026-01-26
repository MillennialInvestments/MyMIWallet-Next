# bf_marketing_generated_posts

## Source
- Migration: _None_
- Model:
- Code references: app/Models/MarketingModel.php:1815, app/Commands/NewsAudit.php:494, app/Commands/NewsAudit.php:495, docs/spark/categories/marketing/news-audit.md:13

## Create table
```sql
CREATE TABLE IF NOT EXISTS `bf_marketing_generated_posts` (
  `id` INT(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
```

## Required columns
- id INT(11) UNSIGNED NOT NULL

## Required indexes
- PRIMARY (id)

## Verification
```sql
SHOW CREATE TABLE `bf_marketing_generated_posts`;
```

```sql
SELECT COLUMN_NAME, COLUMN_TYPE, IS_NULLABLE, COLUMN_DEFAULT, EXTRA
FROM information_schema.columns
WHERE table_schema = DATABASE() AND table_name = 'bf_marketing_generated_posts'
ORDER BY ORDINAL_POSITION;
```

```sql
SELECT INDEX_NAME, NON_UNIQUE, COLUMN_NAME, SEQ_IN_INDEX
FROM information_schema.statistics
WHERE table_schema = DATABASE() AND table_name = 'bf_marketing_generated_posts'
ORDER BY INDEX_NAME, SEQ_IN_INDEX;
```

