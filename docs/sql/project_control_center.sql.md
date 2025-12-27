# Project Control Center Tables (SQL)

> Run these statements manually in the MySQL shell. No migration files are included.

```sql
CREATE TABLE IF NOT EXISTS `bf_project_control_center_items` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `project_name` varchar(128) NOT NULL,
  `category` varchar(64) DEFAULT NULL,
  `subcategory` varchar(64) DEFAULT NULL,
  `component` varchar(128) NOT NULL,
  `description` text,
  `status` varchar(16) NOT NULL DEFAULT 'Active',
  `primary_files` varchar(255) DEFAULT NULL,
  `notes` text,
  `tags_json` json DEFAULT NULL,
  `source_type` varchar(32) DEFAULT NULL,
  `source_ref` varchar(191) DEFAULT NULL,
  `created_by` int DEFAULT NULL,
  `updated_by` int DEFAULT NULL,
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `uniq_project_category_component` (`project_name`, `category`, `component`),
  KEY `idx_project_name` (`project_name`),
  KEY `idx_status` (`status`),
  KEY `idx_category` (`category`),
  KEY `idx_updated_at` (`updated_at`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
```

Optional imports ledger:

```sql
CREATE TABLE IF NOT EXISTS `bf_project_control_center_imports` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `project_name` varchar(128) DEFAULT NULL,
  `source_type` varchar(32) DEFAULT NULL,
  `csv_payload` longtext,
  `inserted` int DEFAULT 0,
  `updated` int DEFAULT 0,
  `skipped` int DEFAULT 0,
  `created_by` int DEFAULT NULL,
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `idx_import_project` (`project_name`),
  KEY `idx_import_created_at` (`created_at`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
```

> Full-text indexes on `component`, `description`, and `notes` can be added where supported:
>
> ```sql
> ALTER TABLE `bf_project_control_center_items`
>   ADD FULLTEXT KEY `ft_component_description_notes` (`component`, `description`, `notes`);
> ```
