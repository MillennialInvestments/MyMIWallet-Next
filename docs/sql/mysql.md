# Mail queue table

```sql
CREATE TABLE IF NOT EXISTS `bf_mail_queue` (
  `id` BIGINT UNSIGNED NOT NULL AUTO_INCREMENT,
  `module` VARCHAR(32) NOT NULL DEFAULT 'system',
  `provider` VARCHAR(32) NULL,
  `to_email` VARCHAR(191) NOT NULL,
  `subject` VARCHAR(191) NOT NULL,
  `html` MEDIUMTEXT NULL,
  `text` MEDIUMTEXT NULL,
  `status` ENUM('queued','sending','sent','failed') NOT NULL DEFAULT 'queued',
  `attempts` INT NOT NULL DEFAULT 0,
  `last_error` VARCHAR(255) NULL,
  `scheduled_at` DATETIME NULL,
  `sent_at` DATETIME NULL,
  `created_at` DATETIME NOT NULL,
  `updated_at` DATETIME NULL,
  PRIMARY KEY (`id`),
  KEY `idx_status_scheduled` (`status`, `scheduled_at`),
  KEY `idx_module_status` (`module`, `status`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
```
