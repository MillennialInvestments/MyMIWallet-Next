# MySQL Operations Snippets

## Create `bf_error_logs` if missing

```sql
CREATE TABLE IF NOT EXISTS `bf_error_logs` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `type` varchar(10) NOT NULL DEFAULT 'error',
  `path` varchar(255) NOT NULL,
  `full_url` text NOT NULL,
  `ip_address` varchar(45) DEFAULT NULL,
  `user_agent` text DEFAULT NULL,
  `uri` varchar(255) DEFAULT NULL,
  `method` varchar(16) DEFAULT NULL,
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP,
  `level` varchar(10) NOT NULL DEFAULT 'error',
  `message` text DEFAULT NULL,
  `context` text DEFAULT NULL,
  `file` varchar(255) DEFAULT NULL,
  `line` int DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
```
