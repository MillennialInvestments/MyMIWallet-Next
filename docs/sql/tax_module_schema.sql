-- Schema for tax configuration and user filing modules.

CREATE TABLE `bf_tax_jurisdictions` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `state` varchar(2) DEFAULT 'LA',
  `parish` varchar(100) NOT NULL,
  `name` varchar(150) NOT NULL,
  `code` varchar(10) NOT NULL,
  `active` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE `bf_tax_rates` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `jurisdiction_id` int unsigned NOT NULL,
  `rate_total` decimal(7,4) NOT NULL,
  `rate_components` json DEFAULT NULL,
  `effective_start` date NOT NULL,
  `effective_end` date DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `jurisdiction_id` (`jurisdiction_id`),
  CONSTRAINT `bf_tax_rates_ibfk_1` FOREIGN KEY (`jurisdiction_id`) REFERENCES `bf_tax_jurisdictions` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE `bf_tax_return_templates` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(150) NOT NULL,
  `authority` varchar(150) NOT NULL,
  `frequency` enum('monthly','quarterly','annual') NOT NULL,
  `notes` text DEFAULT NULL,
  `active` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE `bf_tax_return_lines` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `template_id` int unsigned NOT NULL,
  `line_number` int NOT NULL,
  `label` varchar(255) NOT NULL,
  `type` enum('input','calc','info') NOT NULL,
  `calc_rule` varchar(255) DEFAULT NULL,
  `requires_explain` tinyint(1) NOT NULL DEFAULT 0,
  `sort_order` int NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `template_id` (`template_id`),
  CONSTRAINT `bf_tax_return_lines_ibfk_1` FOREIGN KEY (`template_id`) REFERENCES `bf_tax_return_templates` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE `bf_user_tax_returns` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int unsigned NOT NULL,
  `template_id` int unsigned NOT NULL,
  `filing_period_start` date NOT NULL,
  `filing_period_end` date NOT NULL,
  `due_date` date NOT NULL,
  `file_date` date DEFAULT NULL,
  `status` enum('draft','ready','filed','paid','delinquent','void') NOT NULL DEFAULT 'draft',
  `total_remitted` decimal(12,2) NOT NULL DEFAULT '0.00',
  `notes` text DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `template_id` (`template_id`),
  CONSTRAINT `bf_user_tax_returns_ibfk_1` FOREIGN KEY (`template_id`) REFERENCES `bf_tax_return_templates` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE `bf_user_tax_return_values` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `return_id` int unsigned NOT NULL,
  `line_id` int unsigned NOT NULL,
  `amount` decimal(12,2) NOT NULL DEFAULT '0.00',
  `explain_text` varchar(255) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `return_id` (`return_id`),
  KEY `line_id` (`line_id`),
  CONSTRAINT `bf_user_tax_return_values_ibfk_1` FOREIGN KEY (`return_id`) REFERENCES `bf_user_tax_returns` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `bf_user_tax_return_values_ibfk_2` FOREIGN KEY (`line_id`) REFERENCES `bf_tax_return_lines` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE `bf_user_tax_return_jurisdictions` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `return_id` int unsigned NOT NULL,
  `jurisdiction_id` int unsigned NOT NULL,
  `taxable_amount` decimal(12,2) NOT NULL DEFAULT '0.00',
  `tax_due` decimal(12,2) NOT NULL DEFAULT '0.00',
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `return_id` (`return_id`),
  KEY `jurisdiction_id` (`jurisdiction_id`),
  CONSTRAINT `bf_user_tax_return_jurisdictions_ibfk_1` FOREIGN KEY (`return_id`) REFERENCES `bf_user_tax_returns` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `bf_user_tax_return_jurisdictions_ibfk_2` FOREIGN KEY (`jurisdiction_id`) REFERENCES `bf_tax_jurisdictions` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE `bf_tax_audit_log` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int unsigned NOT NULL,
  `action` varchar(50) NOT NULL,
  `entity_type` varchar(50) NOT NULL,
  `entity_id` int unsigned NOT NULL,
  `before_json` longtext DEFAULT NULL,
  `after_json` longtext DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
