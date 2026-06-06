<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class EnsureSocialExportOrchestrationTables extends Migration
{
    public function up(): void
    {
        $this->db->query("
            CREATE TABLE IF NOT EXISTS `bf_social_webhooks` (
                `id` BIGINT UNSIGNED NOT NULL AUTO_INCREMENT,
                `webhook_key` VARCHAR(100) NOT NULL,
                `display_name` VARCHAR(190) NOT NULL,
                `platform_key` VARCHAR(50) NULL,
                `webhook_url_env_key` VARCHAR(190) NOT NULL,
                `enabled` TINYINT(1) NOT NULL DEFAULT 0,
                `approval_required` TINYINT(1) NOT NULL DEFAULT 1,
                `payload_template_json` MEDIUMTEXT NULL,
                `created_at` DATETIME NULL,
                `updated_at` DATETIME NULL,
                PRIMARY KEY (`id`),
                UNIQUE KEY `uniq_social_webhook_key` (`webhook_key`),
                KEY `idx_social_webhooks_platform` (`platform_key`),
                KEY `idx_social_webhooks_enabled` (`enabled`)
            ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
        ");

        $this->db->query("
            CREATE TABLE IF NOT EXISTS `bf_social_export_jobs` (
                `id` BIGINT UNSIGNED NOT NULL AUTO_INCREMENT,
                `generated_post_id` BIGINT UNSIGNED NOT NULL,
                `destination_type` VARCHAR(50) NOT NULL DEFAULT 'manual_json',
                `destination_key` VARCHAR(100) NULL,
                `payload_json` MEDIUMTEXT NULL,
                `status` VARCHAR(30) NOT NULL DEFAULT 'draft',
                `attempts` INT UNSIGNED NOT NULL DEFAULT 0,
                `last_error` MEDIUMTEXT NULL,
                `sent_at` DATETIME NULL,
                `created_at` DATETIME NULL,
                `updated_at` DATETIME NULL,
                PRIMARY KEY (`id`),
                KEY `idx_social_export_generated_post` (`generated_post_id`),
                KEY `idx_social_export_destination` (`destination_type`, `destination_key`),
                KEY `idx_social_export_status` (`status`)
            ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
        ");

        $this->db->query("
            CREATE TABLE IF NOT EXISTS `bf_social_delivery_logs` (
                `id` BIGINT UNSIGNED NOT NULL AUTO_INCREMENT,
                `export_job_id` BIGINT UNSIGNED NULL,
                `generated_post_id` BIGINT UNSIGNED NULL,
                `platform_key` VARCHAR(50) NULL,
                `destination_type` VARCHAR(50) NULL,
                `status` VARCHAR(30) NOT NULL DEFAULT 'pending',
                `request_payload_hash` VARCHAR(128) NULL,
                `response_code` INT NULL,
                `response_body_excerpt` MEDIUMTEXT NULL,
                `error` MEDIUMTEXT NULL,
                `created_at` DATETIME NULL,
                PRIMARY KEY (`id`),
                KEY `idx_social_delivery_job` (`export_job_id`),
                KEY `idx_social_delivery_post` (`generated_post_id`),
                KEY `idx_social_delivery_status` (`status`)
            ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
        ");

        $this->db->query("
            CREATE TABLE IF NOT EXISTS `bf_social_performance_events` (
                `id` BIGINT UNSIGNED NOT NULL AUTO_INCREMENT,
                `generated_post_id` BIGINT UNSIGNED NULL,
                `platform_key` VARCHAR(50) NULL,
                `event_type` VARCHAR(50) NOT NULL,
                `event_value` DECIMAL(18,6) NULL,
                `metadata_json` MEDIUMTEXT NULL,
                `occurred_at` DATETIME NULL,
                `created_at` DATETIME NULL,
                PRIMARY KEY (`id`),
                KEY `idx_social_perf_post` (`generated_post_id`),
                KEY `idx_social_perf_platform` (`platform_key`),
                KEY `idx_social_perf_type` (`event_type`)
            ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
        ");
    }

    public function down(): void
    {
        $this->db->query("DROP TABLE IF EXISTS `bf_social_performance_events`");
        $this->db->query("DROP TABLE IF EXISTS `bf_social_delivery_logs`");
        $this->db->query("DROP TABLE IF EXISTS `bf_social_export_jobs`");
        $this->db->query("DROP TABLE IF EXISTS `bf_social_webhooks`");
    }
}
