<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateSocialFunnelAttributionTables extends Migration
{
    public function up(): void
    {
        $this->db->query("
            CREATE TABLE IF NOT EXISTS `bf_social_tracking_links` (
                `id` BIGINT UNSIGNED NOT NULL AUTO_INCREMENT,
                `platform_key` VARCHAR(50) NULL,
                `campaign_id` BIGINT UNSIGNED NULL,
                `generated_post_id` BIGINT UNSIGNED NULL,
                `community_id` BIGINT UNSIGNED NULL,
                `source` VARCHAR(100) NULL,
                `medium` VARCHAR(100) NULL,
                `campaign` VARCHAR(190) NULL,
                `content` VARCHAR(190) NULL,
                `tracking_code` VARCHAR(100) NOT NULL,
                `destination_url` VARCHAR(500) NOT NULL,
                `tracking_url` VARCHAR(750) NOT NULL,
                `clicks` BIGINT UNSIGNED NOT NULL DEFAULT 0,
                `created_at` DATETIME NULL,
                `updated_at` DATETIME NULL,
                PRIMARY KEY (`id`),
                UNIQUE KEY `uniq_social_tracking_code` (`tracking_code`),
                KEY `idx_social_tracking_platform` (`platform_key`),
                KEY `idx_social_tracking_campaign` (`campaign_id`),
                KEY `idx_social_tracking_post` (`generated_post_id`)
            ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
        ");

        $this->db->query("
            CREATE TABLE IF NOT EXISTS `bf_social_click_events` (
                `id` BIGINT UNSIGNED NOT NULL AUTO_INCREMENT,
                `tracking_link_id` BIGINT UNSIGNED NOT NULL,
                `ip_hash` VARCHAR(128) NULL,
                `user_agent_hash` VARCHAR(128) NULL,
                `referrer` VARCHAR(750) NULL,
                `clicked_at` DATETIME NULL,
                `created_at` DATETIME NULL,
                PRIMARY KEY (`id`),
                KEY `idx_social_click_tracking_link` (`tracking_link_id`),
                KEY `idx_social_click_clicked_at` (`clicked_at`)
            ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
        ");

        $this->db->query("
            CREATE TABLE IF NOT EXISTS `bf_social_conversion_events` (
                `id` BIGINT UNSIGNED NOT NULL AUTO_INCREMENT,
                `tracking_link_id` BIGINT UNSIGNED NULL,
                `user_id` BIGINT UNSIGNED NULL,
                `conversion_type` VARCHAR(100) NOT NULL,
                `conversion_value` DECIMAL(18,6) NULL,
                `metadata_json` MEDIUMTEXT NULL,
                `created_at` DATETIME NULL,
                PRIMARY KEY (`id`),
                KEY `idx_social_conversion_tracking` (`tracking_link_id`),
                KEY `idx_social_conversion_user` (`user_id`),
                KEY `idx_social_conversion_type` (`conversion_type`)
            ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
        ");

        $this->db->query("
            CREATE TABLE IF NOT EXISTS `bf_social_funnel_metrics` (
                `id` BIGINT UNSIGNED NOT NULL AUTO_INCREMENT,
                `platform_key` VARCHAR(50) NULL,
                `campaign_id` BIGINT UNSIGNED NULL,
                `community_id` BIGINT UNSIGNED NULL,
                `date_key` DATE NOT NULL,
                `views` BIGINT UNSIGNED NOT NULL DEFAULT 0,
                `clicks` BIGINT UNSIGNED NOT NULL DEFAULT 0,
                `registrations` BIGINT UNSIGNED NOT NULL DEFAULT 0,
                `discord_joins` BIGINT UNSIGNED NOT NULL DEFAULT 0,
                `budget_tool_usage` BIGINT UNSIGNED NOT NULL DEFAULT 0,
                `portfolio_creations` BIGINT UNSIGNED NOT NULL DEFAULT 0,
                `membership_upgrades` BIGINT UNSIGNED NOT NULL DEFAULT 0,
                `advisor_bookings` BIGINT UNSIGNED NOT NULL DEFAULT 0,
                `exchange_usage` BIGINT UNSIGNED NOT NULL DEFAULT 0,
                `revenue` DECIMAL(18,6) NOT NULL DEFAULT 0,
                `created_at` DATETIME NULL,
                `updated_at` DATETIME NULL,
                PRIMARY KEY (`id`),
                UNIQUE KEY `uniq_social_funnel_metric` (`platform_key`, `campaign_id`, `community_id`, `date_key`),
                KEY `idx_social_funnel_platform` (`platform_key`),
                KEY `idx_social_funnel_campaign` (`campaign_id`),
                KEY `idx_social_funnel_date` (`date_key`)
            ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
        ");
    }

    public function down(): void
    {
        $this->db->query("DROP TABLE IF EXISTS `bf_social_funnel_metrics`");
        $this->db->query("DROP TABLE IF EXISTS `bf_social_conversion_events`");
        $this->db->query("DROP TABLE IF EXISTS `bf_social_click_events`");
        $this->db->query("DROP TABLE IF EXISTS `bf_social_tracking_links`");
    }
}
