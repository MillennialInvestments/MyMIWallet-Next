<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateSocialCampaignCalendarTables extends Migration
{
    public function up(): void
    {
        $this->db->query("
            CREATE TABLE IF NOT EXISTS `bf_social_campaigns` (
                `id` BIGINT UNSIGNED NOT NULL AUTO_INCREMENT,
                `campaign_key` VARCHAR(100) NOT NULL,
                `title` VARCHAR(190) NOT NULL,
                `description` MEDIUMTEXT NULL,
                `audience` VARCHAR(50) NULL,
                `cta_type` VARCHAR(50) NULL,
                `status` VARCHAR(30) NOT NULL DEFAULT 'draft',
                `starts_at` DATETIME NULL,
                `ends_at` DATETIME NULL,
                `created_at` DATETIME NULL,
                `updated_at` DATETIME NULL,
                PRIMARY KEY (`id`),
                UNIQUE KEY `uniq_social_campaign_key` (`campaign_key`),
                KEY `idx_social_campaign_status` (`status`)
            ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
        ");

        $this->db->query("
            CREATE TABLE IF NOT EXISTS `bf_social_campaign_posts` (
                `id` BIGINT UNSIGNED NOT NULL AUTO_INCREMENT,
                `campaign_id` BIGINT UNSIGNED NOT NULL,
                `generated_post_id` BIGINT UNSIGNED NOT NULL,
                `platform_key` VARCHAR(50) NULL,
                `status` VARCHAR(30) NOT NULL DEFAULT 'draft',
                `created_at` DATETIME NULL,
                `updated_at` DATETIME NULL,
                PRIMARY KEY (`id`),
                UNIQUE KEY `uniq_campaign_generated_post` (`campaign_id`, `generated_post_id`),
                KEY `idx_social_campaign_posts_campaign` (`campaign_id`),
                KEY `idx_social_campaign_posts_post` (`generated_post_id`)
            ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
        ");

        $this->db->query("
            CREATE TABLE IF NOT EXISTS `bf_social_campaign_schedule` (
                `id` BIGINT UNSIGNED NOT NULL AUTO_INCREMENT,
                `campaign_id` BIGINT UNSIGNED NOT NULL,
                `campaign_post_id` BIGINT UNSIGNED NULL,
                `generated_post_id` BIGINT UNSIGNED NULL,
                `platform_key` VARCHAR(50) NULL,
                `scheduled_for` DATETIME NOT NULL,
                `status` VARCHAR(30) NOT NULL DEFAULT 'scheduled',
                `export_job_id` BIGINT UNSIGNED NULL,
                `notes` MEDIUMTEXT NULL,
                `created_at` DATETIME NULL,
                `updated_at` DATETIME NULL,
                PRIMARY KEY (`id`),
                KEY `idx_social_campaign_schedule_campaign` (`campaign_id`),
                KEY `idx_social_campaign_schedule_due` (`scheduled_for`, `status`),
                KEY `idx_social_campaign_schedule_post` (`generated_post_id`)
            ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
        ");
    }

    public function down(): void
    {
        $this->db->query("DROP TABLE IF EXISTS `bf_social_campaign_schedule`");
        $this->db->query("DROP TABLE IF EXISTS `bf_social_campaign_posts`");
        $this->db->query("DROP TABLE IF EXISTS `bf_social_campaigns`");
    }
}
