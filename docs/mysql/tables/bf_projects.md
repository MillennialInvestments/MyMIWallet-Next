# bf_projects

## Source
- Migration: _None_
- Model:
- Code references: app/Models/ProjectsModel.php:7, app/Services/SearchService.php:35, app/Services/SearchService.php:36, app/Services/SearchService.php:87, docs/marketing/07-myprojects-real-estate.md:41, docs/marketing/07-myprojects-real-estate.md:98, docs/operations/05-database.md:21, docs/exports_schema.md:45, docs/OVERVIEW.md:120, docs/functional_inventory/docs_to_code_map.md:8, docs/functional_inventory/docs_to_code_map.md:50, docs/functional_inventory/docs_to_code_map.md:51, docs/functional_inventory/docs_to_code_map.md:62, docs/functional_inventory/docs_to_code_map.md:90, docs/aiops/artifacts/db-drift/20260201-181038/summary.md:169, docs/aiops/migration_model_audit.md:169, docs/aiops/migration_model_audit.md:202, docs/_aiops/doc-change-log.md:1685

## Create table
```sql
CREATE TABLE IF NOT EXISTS `bf_projects` (
  `id` int NOT NULL DEFAULT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL DEFAULT NULL,
  `slug` varchar(255) NULL DEFAULT NULL,
  `visibility` varchar(20) NOT NULL DEFAULT 'public',
  `description` text NULL DEFAULT NULL,
  `target_amount` decimal(15,2) NOT NULL DEFAULT NULL,
  `current_amount` decimal(15,2) NULL DEFAULT 0.00,
  `status` enum('active','inactive','completed','pending') NULL DEFAULT 'active',
  `category` enum('real_estate','business','ip','equipment','vehicle','node','other') NOT NULL DEFAULT 'other',
  `created_by` int NOT NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP DEFAULT_GENERATED,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP DEFAULT_GENERATED ON UPDATE CURRENT_TIMESTAMP,
  `investment_goal` decimal(15,2) NOT NULL DEFAULT 0.00,
  `funds_raised` decimal(15,2) NULL DEFAULT 0.00,
  `valuation` decimal(15,2) NULL DEFAULT NULL,
  `offering_type` enum('revshare','equity','rental','hybrid') NOT NULL DEFAULT 'revshare',
  `investor_count` int NULL DEFAULT 0,
  `minimum_investment` decimal(15,2) NULL DEFAULT 100.00,
  `maximum_investment` decimal(15,2) NULL DEFAULT NULL,
  `progress_percentage` float NULL DEFAULT 0,
  `average_investment` decimal(15,2) NULL DEFAULT 0.00,
  `top_investor_id` int NULL DEFAULT NULL,
  `revenue_generated` decimal(15,2) NULL DEFAULT 0.00,
  `project_stage` enum('planning','fundraising','development','complete') NULL DEFAULT 'planning',
  `completion_date` date NULL DEFAULT NULL,
  `last_investment_date` timestamp NULL DEFAULT NULL,
  `remarks` text NULL DEFAULT NULL,
  `promotional_links` json NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
```

## Required columns
- id int NOT NULL
- name varchar(255) NOT NULL
- slug varchar(255) NULL
- visibility varchar(20) NOT NULL
- description text NULL
- target_amount decimal(15,2) NOT NULL
- current_amount decimal(15,2) NULL
- status enum('active','inactive','completed','pending') NULL
- category enum('real_estate','business','ip','equipment','vehicle','node','other') NOT NULL
- created_by int NOT NULL
- created_at timestamp NULL
- updated_at timestamp NULL
- investment_goal decimal(15,2) NOT NULL
- funds_raised decimal(15,2) NULL
- valuation decimal(15,2) NULL
- offering_type enum('revshare','equity','rental','hybrid') NOT NULL
- investor_count int NULL
- minimum_investment decimal(15,2) NULL
- maximum_investment decimal(15,2) NULL
- progress_percentage float NULL
- average_investment decimal(15,2) NULL
- top_investor_id int NULL
- revenue_generated decimal(15,2) NULL
- project_stage enum('planning','fundraising','development','complete') NULL
- completion_date date NULL
- last_investment_date timestamp NULL
- remarks text NULL
- promotional_links json NULL

## Required indexes
- _No indexes defined_

## Verification
```sql
SHOW CREATE TABLE `bf_projects`;
```

```sql
SELECT COLUMN_NAME, COLUMN_TYPE, IS_NULLABLE, COLUMN_DEFAULT, EXTRA
FROM information_schema.columns
WHERE table_schema = DATABASE() AND table_name = 'bf_projects'
ORDER BY ORDINAL_POSITION;
```

```sql
SELECT INDEX_NAME, NON_UNIQUE, COLUMN_NAME, SEQ_IN_INDEX
FROM information_schema.statistics
WHERE table_schema = DATABASE() AND table_name = 'bf_projects'
ORDER BY INDEX_NAME, SEQ_IN_INDEX;
```

