# Phase 02E-B — Clean Repaired SQLCheck Schema Verification

Generated UTC: 2026-06-09T08:36:53Z
Branch: fix/mymi-alert-aiops-sqlcheck-ci47
Commit: a271c0ae0 Register TBI CoinVault smoke command (#518)

## Objective

Use the repaired aiops:sql:check command to validate MyMI Alert GTM schema and model readiness.

## Git Status

```text
 M app/Commands/AIOps/SqlCheck.php
?? docs/01_Systematic_Standup/
?? docs/_aiops/mymi_alerts/
```

## Table Checks

```text
===== TABLE: bf_investment_scraper =====

CodeIgniter v4.7.0 Command Line Tool - Server Time: 2026-06-09 08:36:49 UTC+00:00

{
    "table": "bf_investment_scraper",
    "columns": [
        {
            "Field": "id",
            "Type": "int",
            "Null": "NO",
            "Key": "PRI",
            "Default": null,
            "Extra": "auto_increment"
        },
        {
            "Field": "status",
            "Type": "varchar(50)",
            "Null": "YES",
            "Key": "MUL",
            "Default": "In Review",
            "Extra": ""
        },
        {
            "Field": "email_type",
            "Type": "enum('trade_alert','news','other')",
            "Null": "NO",
            "Key": "",
            "Default": "other",
            "Extra": ""
        },
        {
            "Field": "news_vendor",
            "Type": "varchar(255)",
            "Null": "YES",
            "Key": "",
            "Default": null,
            "Extra": ""
        },
        {
            "Field": "symbols",
            "Type": "varchar(255)",
            "Null": "YES",
            "Key": "",
            "Default": null,
            "Extra": ""
        },
        {
            "Field": "type",
            "Type": "varchar(100)",
            "Null": "YES",
            "Key": "",
            "Default": null,
            "Extra": ""
        },
        {
            "Field": "url",
            "Type": "varchar(255)",
            "Null": "YES",
            "Key": "",
            "Default": null,
            "Extra": ""
        },
        {
            "Field": "title",
            "Type": "varchar(255)",
            "Null": "YES",
            "Key": "",
            "Default": null,
            "Extra": ""
        },
        {
            "Field": "subject",
            "Type": "varchar(1000)",
            "Null": "YES",
            "Key": "MUL",
            "Default": null,
            "Extra": ""
        },
        {
            "Field": "raw_email_body",
            "Type": "text",
            "Null": "YES",
            "Key": "",
            "Default": null,
            "Extra": ""
        },
        {
            "Field": "summary",
            "Type": "text",
            "Null": "YES",
            "Key": "",
            "Default": null,
            "Extra": ""
        },
        {
            "Field": "content",
            "Type": "mediumtext",
            "Null": "YES",
            "Key": "",
            "Default": null,
            "Extra": ""
        },
        {
            "Field": "email_identifier",
            "Type": "varchar(100)",
            "Null": "YES",
            "Key": "MUL",
            "Default": null,
            "Extra": ""
        },
        {
            "Field": "email_date",
            "Type": "datetime",
            "Null": "YES",
            "Key": "MUL",
            "Default": null,
            "Extra": ""
        },
        {
            "Field": "email_sender",
            "Type": "varchar(255)",
            "Null": "YES",
            "Key": "",
            "Default": null,
            "Extra": ""
        },
        {
            "Field": "email_subject",
            "Type": "varchar(500)",
            "Null": "YES",
            "Key": "",
            "Default": null,
            "Extra": ""
        },
        {
            "Field": "email_body",
            "Type": "mediumtext",
            "Null": "YES",
            "Key": "",
            "Default": null,
            "Extra": ""
        },
        {
            "Field": "email_attachments",
            "Type": "longtext",
            "Null": "YES",
            "Key": "",
            "Default": null,
            "Extra": ""
        },
        {
            "Field": "keywords",
            "Type": "text",
            "Null": "YES",
            "Key": "",
            "Default": null,
            "Extra": ""
        },
        {
            "Field": "scraped_at",
            "Type": "datetime",
            "Null": "YES",
            "Key": "",
            "Default": null,
            "Extra": ""
        },
        {
            "Field": "created_on",
            "Type": "datetime",
            "Null": "YES",
            "Key": "",
            "Default": null,
            "Extra": ""
        },
        {
            "Field": "modified_on",
            "Type": "datetime",
            "Null": "YES",
            "Key": "",
            "Default": null,
            "Extra": ""
        },
        {
            "Field": "links",
            "Type": "text",
            "Null": "YES",
            "Key": "",
            "Default": null,
            "Extra": ""
        },
        {
            "Field": "images",
            "Type": "text",
            "Null": "YES",
            "Key": "",
            "Default": null,
            "Extra": ""
        },
        {
            "Field": "videos",
            "Type": "text",
            "Null": "YES",
            "Key": "",
            "Default": null,
            "Extra": ""
        },
        {
            "Field": "metadata",
            "Type": "text",
            "Null": "YES",
            "Key": "",
            "Default": null,
            "Extra": ""
        },
        {
            "Field": "structured_data",
            "Type": "text",
            "Null": "YES",
            "Key": "",
            "Default": null,
            "Extra": ""
        },
        {
            "Field": "additional_html_elements",
            "Type": "text",
            "Null": "YES",
            "Key": "",
            "Default": null,
            "Extra": ""
        },
        {
            "Field": "page_performance_data",
            "Type": "text",
            "Null": "YES",
            "Key": "",
            "Default": null,
            "Extra": ""
        },
        {
            "Field": "network_requests",
            "Type": "text",
            "Null": "YES",
            "Key": "",
            "Default": null,
            "Extra": ""
        },
        {
            "Field": "user_interaction_points",
            "Type": "text",
            "Null": "YES",
            "Key": "",
            "Default": null,
            "Extra": ""
        },
        {
            "Field": "accessibility_information",
            "Type": "text",
            "Null": "YES",
            "Key": "",
            "Default": null,
            "Extra": ""
        },
        {
            "Field": "page_relationships",
            "Type": "text",
            "Null": "YES",
            "Key": "",
            "Default": null,
            "Extra": ""
        },
        {
            "Field": "seo_elements",
            "Type": "text",
            "Null": "YES",
            "Key": "",
            "Default": null,
            "Extra": ""
        },
        {
            "Field": "social_media_links",
            "Type": "text",
            "Null": "YES",
            "Key": "",
            "Default": null,
            "Extra": ""
        },
        {
            "Field": "comments_user_generated_content",
            "Type": "text",
            "Null": "YES",
            "Key": "",
            "Default": null,
            "Extra": ""
        },
        {
            "Field": "contact_information",
            "Type": "text",
            "Null": "YES",
            "Key": "",
            "Default": null,
            "Extra": ""
        },
        {
            "Field": "legal_information",
            "Type": "text",
            "Null": "YES",
            "Key": "",
            "Default": null,
            "Extra": ""
        },
        {
            "Field": "breadcrumbs",
            "Type": "text",
            "Null": "YES",
            "Key": "",
            "Default": null,
            "Extra": ""
        },
        {
            "Field": "date_time",
            "Type": "datetime",
            "Null": "YES",
            "Key": "",
            "Default": null,
            "Extra": ""
        },
        {
            "Field": "author_information",
            "Type": "text",
            "Null": "YES",
            "Key": "",
            "Default": null,
            "Extra": ""
        },
        {
            "Field": "ratings_reviews",
            "Type": "text",
            "Null": "YES",
            "Key": "",
            "Default": null,
            "Extra": ""
        },
        {
            "Field": "price_information",
            "Type": "text",
            "Null": "YES",
            "Key": "",
            "Default": null,
            "Extra": ""
        },
        {
            "Field": "location_data",
            "Type": "text",
            "Null": "YES",
            "Key": "",
            "Default": null,
            "Extra": ""
        },
        {
            "Field": "language_locale",
            "Type": "text",
            "Null": "YES",
            "Key": "",
            "Default": null,
            "Extra": ""
        },
        {
            "Field": "mobile_responsiveness",
            "Type": "text",
            "Null": "YES",
            "Key": "",
            "Default": null,
            "Extra": ""
        },
        {
            "Field": "security_information",
            "Type": "text",
            "Null": "YES",
            "Key": "",
            "Default": null,
            "Extra": ""
        },
        {
            "Field": "technology_stack",
            "Type": "text",
            "Null": "YES",
            "Key": "",
            "Default": null,
            "Extra": ""
        },
        {
            "Field": "server_information",
            "Type": "text",
            "Null": "YES",
            "Key": "",
            "Default": null,
            "Extra": ""
        },
        {
            "Field": "caching_information",
            "Type": "text",
            "Null": "YES",
            "Key": "",
            "Default": null,
            "Extra": ""
        },
        {
            "Field": "content_type",
            "Type": "text",
            "Null": "YES",
            "Key": "",
            "Default": null,
            "Extra": ""
        },
        {
            "Field": "character_set",
            "Type": "text",
            "Null": "YES",
            "Key": "",
            "Default": null,
            "Extra": ""
        },
        {
            "Field": "rss_atom_feeds",
            "Type": "text",
            "Null": "YES",
            "Key": "",
            "Default": null,
            "Extra": ""
        },
        {
            "Field": "pagination",
            "Type": "text",
            "Null": "YES",
            "Key": "",
            "Default": null,
            "Extra": ""
        },
        {
            "Field": "custom_data",
            "Type": "text",
            "Null": "YES",
            "Key": "",
            "Default": null,
            "Extra": ""
        },
        {
            "Field": "error_handling",
            "Type": "text",
            "Null": "YES",
            "Key": "",
            "Default": null,
            "Extra": ""
        },
        {
            "Field": "historical_changes",
            "Type": "text",
            "Null": "YES",
            "Key": "",
            "Default": null,
            "Extra": ""
        },
        {
            "Field": "user_reviews_ratings",
            "Type": "text",
            "Null": "YES",
            "Key": "",
            "Default": null,
            "Extra": ""
        },
        {
            "Field": "inventory_levels",
            "Type": "text",
            "Null": "YES",
            "Key": "",
            "Default": null,
            "Extra": ""
        },
        {
            "Field": "shipping_information",
            "Type": "text",
            "Null": "YES",
            "Key": "",
            "Default": null,
            "Extra": ""
        },
        {
            "Field": "bots_crawlers_information",
            "Type": "text",
            "Null": "YES",
            "Key": "",
            "Default": null,
            "Extra": ""
        },
        {
            "Field": "affiliate_links",
            "Type": "text",
            "Null": "YES",
            "Key": "",
            "Default": null,
            "Extra": ""
        },
        {
            "Field": "advertisements",
            "Type": "text",
            "Null": "YES",
            "Key": "",
            "Default": null,
            "Extra": ""
        },
        {
            "Field": "cookie_notices",
            "Type": "text",
            "Null": "YES",
            "Key": "",
            "Default": null,
            "Extra": ""
        },
        {
            "Field": "popups_modals",
            "Type": "text",
            "Null": "YES",
            "Key": "",
            "Default": null,
            "Extra": ""
        },
        {
            "Field": "browser_specific_data",
            "Type": "text",
            "Null": "YES",
            "Key": "",
            "Default": null,
            "Extra": ""
        },
        {
            "Field": "geolocation_specific_content",
            "Type": "text",
            "Null": "YES",
            "Key": "",
            "Default": null,
            "Extra": ""
        },
        {
            "Field": "ab_testing_variations",
            "Type": "text",
            "Null": "YES",
            "Key": "",
            "Default": null,
            "Extra": ""
        },
        {
            "Field": "user_agent_specific_content",
            "Type": "text",
            "Null": "YES",
            "Key": "",
            "Default": null,
            "Extra": ""
        },
        {
            "Field": "screen_size_specific_content",
            "Type": "text",
            "Null": "YES",
            "Key": "",
            "Default": null,
            "Extra": ""
        },
        {
            "Field": "device_specific_content",
            "Type": "text",
            "Null": "YES",
            "Key": "",
            "Default": null,
            "Extra": ""
        },
        {
            "Field": "browser_extension_data",
            "Type": "text",
            "Null": "YES",
            "Key": "",
            "Default": null,
            "Extra": ""
        },
        {
            "Field": "custom_scripts_analytics",
            "Type": "text",
            "Null": "YES",
            "Key": "",
            "Default": null,
            "Extra": ""
        },
        {
            "Field": "category",
            "Type": "varchar(255)",
            "Null": "NO",
            "Key": "",
            "Default": "Other",
            "Extra": ""
        },
        {
            "Field": "tag",
            "Type": "varchar(255)",
            "Null": "YES",
            "Key": "",
            "Default": null,
            "Extra": ""
        },
        {
            "Field": "class",
            "Type": "varchar(255)",
            "Null": "YES",
            "Key": "",
            "Default": null,
            "Extra": ""
        },
        {
            "Field": "segment",
            "Type": "varchar(255)",
            "Null": "YES",
            "Key": "",
            "Default": null,
            "Extra": ""
        },
        {
            "Field": "source",
            "Type": "varchar(32)",
            "Null": "YES",
            "Key": "MUL",
            "Default": null,
            "Extra": ""
        },
        {
            "Field": "account_type",
            "Type": "varchar(16)",
            "Null": "YES",
            "Key": "",
            "Default": null,
            "Extra": ""
        },
        {
            "Field": "message_hash",
            "Type": "char(64)",
            "Null": "YES",
            "Key": "",
            "Default": null,
            "Extra": ""
        },
        {
            "Field": "updated_at",
            "Type": "datetime",
            "Null": "YES",
            "Key": "",
            "Default": null,
            "Extra": ""
        },
        {
            "Field": "source_mailbox",
            "Type": "varchar(255)",
            "Null": "YES",
            "Key": "",
            "Default": null,
            "Extra": ""
        },
        {
            "Field": "source_folder",
            "Type": "varchar(255)",
            "Null": "YES",
            "Key": "",
            "Default": null,
            "Extra": ""
        },
        {
            "Field": "imap_uid",
            "Type": "bigint unsigned",
            "Null": "YES",
            "Key": "",
            "Default": null,
            "Extra": ""
        },
        {
            "Field": "message_id",
            "Type": "varchar(255)",
            "Null": "YES",
            "Key": "",
            "Default": null,
            "Extra": ""
        },
        {
            "Field": "route_category",
            "Type": "varchar(80)",
            "Null": "YES",
            "Key": "",
            "Default": null,
            "Extra": ""
        },
        {
            "Field": "ingested_at",
            "Type": "datetime",
            "Null": "YES",
            "Key": "",
            "Default": null,
            "Extra": ""
        },
        {
            "Field": "moved_to_processed_at",
            "Type": "datetime",
            "Null": "YES",
            "Key": "",
            "Default": null,
            "Extra": ""
        }
    ],
    "indexes": [
        {
            "Table": "bf_investment_scraper",
            "Non_unique": "0",
            "Key_name": "PRIMARY",
            "Seq_in_index": "1",
            "Column_name": "id",
            "Collation": "A",
            "Cardinality": "163702",
            "Sub_part": null,
            "Packed": null,
            "Null": "",
            "Index_type": "BTREE",
            "Comment": "",
            "Index_comment": "",
            "Visible": "YES",
            "Expression": null
        },
        {
            "Table": "bf_investment_scraper",
            "Non_unique": "0",
            "Key_name": "uq_scraper_source_hash",
            "Seq_in_index": "1",
            "Column_name": "source",
            "Collation": "A",
            "Cardinality": "1",
            "Sub_part": null,
            "Packed": null,
            "Null": "YES",
            "Index_type": "BTREE",
            "Comment": "",
            "Index_comment": "",
            "Visible": "YES",
            "Expression": null
        },
        {
            "Table": "bf_investment_scraper",
            "Non_unique": "0",
            "Key_name": "uq_scraper_source_hash",
            "Seq_in_index": "2",
            "Column_name": "message_hash",
            "Collation": "A",
            "Cardinality": "46",
            "Sub_part": null,
            "Packed": null,
            "Null": "YES",
            "Index_type": "BTREE",
            "Comment": "",
            "Index_comment": "",
            "Visible": "YES",
            "Expression": null
        },
        {
            "Table": "bf_investment_scraper",
            "Non_unique": "1",
            "Key_name": "idx_scraper_email_identifier",
            "Seq_in_index": "1",
            "Column_name": "email_identifier",
            "Collation": "A",
            "Cardinality": "146196",
            "Sub_part": null,
            "Packed": null,
            "Null": "YES",
            "Index_type": "BTREE",
            "Comment": "",
            "Index_comment": "",
            "Visible": "YES",
            "Expression": null
        },
        {
            "Table": "bf_investment_scraper",
            "Non_unique": "1",
            "Key_name": "idx_email_identifier",
            "Seq_in_index": "1",
            "Column_name": "email_identifier",
            "Collation": "A",
            "Cardinality": "146196",
            "Sub_part": null,
            "Packed": null,
            "Null": "YES",
            "Index_type": "BTREE",
            "Comment": "",
            "Index_comment": "",
            "Visible": "YES",
            "Expression": null
        },
        {
            "Table": "bf_investment_scraper",
            "Non_unique": "1",
            "Key_name": "idx_status",
            "Seq_in_index": "1",
            "Column_name": "status",
            "Collation": "A",
            "Cardinality": "3",
            "Sub_part": null,
            "Packed": null,
            "Null": "YES",
            "Index_type": "BTREE",
            "Comment": "",
            "Index_comment": "",
            "Visible": "YES",
            "Expression": null
        },
        {
            "Table": "bf_investment_scraper",
            "Non_unique": "1",
            "Key_name": "idx_email_date",
            "Seq_in_index": "1",
            "Column_name": "email_date",
            "Collation": "A",
            "Cardinality": "145378",
            "Sub_part": null,
            "Packed": null,
            "Null": "YES",
            "Index_type": "BTREE",
            "Comment": "",
            "Index_comment": "",
            "Visible": "YES",
            "Expression": null
        },
        {
            "Table": "bf_investment_scraper",
            "Non_unique": "1",
            "Key_name": "idx_bf_investment_scraper_subject",
            "Seq_in_index": "1",
            "Column_name": "subject",
            "Collation": "A",
            "Cardinality": "97113",
            "Sub_part": "191",
            "Packed": null,
            "Null": "YES",
            "Index_type": "BTREE",
            "Comment": "",
            "Index_comment": "",
            "Visible": "YES",
            "Expression": null
        }
    ]
}

===== TABLE: bf_investment_trade_alerts =====

CodeIgniter v4.7.0 Command Line Tool - Server Time: 2026-06-09 08:36:49 UTC+00:00

{
    "table": "bf_investment_trade_alerts",
    "columns": [
        {
            "Field": "id",
            "Type": "int",
            "Null": "NO",
            "Key": "PRI",
            "Default": null,
            "Extra": "auto_increment"
        },
        {
            "Field": "latest_forecast_id",
            "Type": "bigint unsigned",
            "Null": "YES",
            "Key": "MUL",
            "Default": null,
            "Extra": ""
        },
        {
            "Field": "forecast_confidence",
            "Type": "int",
            "Null": "YES",
            "Key": "",
            "Default": null,
            "Extra": ""
        },
        {
            "Field": "forecast_direction",
            "Type": "varchar(16)",
            "Null": "YES",
            "Key": "",
            "Default": null,
            "Extra": ""
        },
        {
            "Field": "forecast_target_price",
            "Type": "decimal(16,6)",
            "Null": "YES",
            "Key": "",
            "Default": null,
            "Extra": ""
        },
        {
            "Field": "forecast_range_low",
            "Type": "decimal(16,6)",
            "Null": "YES",
            "Key": "",
            "Default": null,
            "Extra": ""
        },
        {
            "Field": "forecast_range_high",
            "Type": "decimal(16,6)",
            "Null": "YES",
            "Key": "",
            "Default": null,
            "Extra": ""
        },
        {
            "Field": "forecast_updated_at",
            "Type": "datetime",
            "Null": "YES",
            "Key": "",
            "Default": null,
            "Extra": ""
        },
        {
            "Field": "active",
            "Type": "int",
            "Null": "YES",
            "Key": "",
            "Default": "1",
            "Extra": ""
        },
        {
            "Field": "status",
            "Type": "varchar(128)",
            "Null": "NO",
            "Key": "MUL",
            "Default": "Opened",
            "Extra": ""
        },
        {
            "Field": "occurrences",
            "Type": "int",
            "Null": "YES",
            "Key": "",
            "Default": "1",
            "Extra": ""
        },
        {
            "Field": "alert_count",
            "Type": "int",
            "Null": "YES",
            "Key": "",
            "Default": "0",
            "Extra": ""
        },
        {
            "Field": "distributed_count",
            "Type": "int",
            "Null": "YES",
            "Key": "",
            "Default": "0",
            "Extra": ""
        },
        {
            "Field": "created_on",
            "Type": "varchar(128)",
            "Null": "YES",
            "Key": "MUL",
            "Default": null,
            "Extra": ""
        },
        {
            "Field": "created_by",
            "Type": "int",
            "Null": "YES",
            "Key": "",
            "Default": null,
            "Extra": ""
        },
        {
            "Field": "updated_at",
            "Type": "varchar(256)",
            "Null": "YES",
            "Key": "",
            "Default": null,
            "Extra": ""
        },
        {
            "Field": "date",
            "Type": "datetime",
            "Null": "YES",
            "Key": "",
            "Default": "CURRENT_TIMESTAMP",
            "Extra": "DEFAULT_GENERATED"
        },
        {
            "Field": "display",
            "Type": "varchar(128)",
            "Null": "YES",
            "Key": "",
            "Default": "Yes",
            "Extra": ""
        },
        {
            "Field": "alert_created",
            "Type": "tinyint(1)",
            "Null": "NO",
            "Key": "",
            "Default": "0",
            "Extra": ""
        },
        {
            "Field": "send_alert",
            "Type": "tinyint(1)",
            "Null": "NO",
            "Key": "",
            "Default": "0",
            "Extra": ""
        },
        {
            "Field": "alert_sent",
            "Type": "tinyint(1)",
            "Null": "NO",
            "Key": "",
            "Default": "0",
            "Extra": ""
        },
        {
            "Field": "submitted_date",
            "Type": "varchar(128)",
            "Null": "YES",
            "Key": "",
            "Default": null,
            "Extra": ""
        },
        {
            "Field": "time",
            "Type": "varchar(128)",
            "Null": "YES",
            "Key": "",
            "Default": null,
            "Extra": ""
        },
        {
            "Field": "category",
            "Type": "varchar(128)",
            "Null": "YES",
            "Key": "",
            "Default": "Other",
            "Extra": ""
        },
        {
            "Field": "title",
            "Type": "varchar(255)",
            "Null": "YES",
            "Key": "",
            "Default": null,
            "Extra": ""
        },
        {
            "Field": "summary",
            "Type": "text",
            "Null": "YES",
            "Key": "",
            "Default": null,
            "Extra": ""
        },
        {
            "Field": "keywords",
            "Type": "text",
            "Null": "YES",
            "Key": "",
            "Default": null,
            "Extra": ""
        },
        {
            "Field": "tag",
            "Type": "varchar(128)",
            "Null": "YES",
            "Key": "",
            "Default": null,
            "Extra": ""
        },
        {
            "Field": "class",
            "Type": "varchar(128)",
            "Null": "YES",
            "Key": "",
            "Default": null,
            "Extra": ""
        },
        {
            "Field": "segment",
            "Type": "varchar(128)",
            "Null": "YES",
            "Key": "",
            "Default": null,
            "Extra": ""
        },
        {
            "Field": "trade_type",
            "Type": "varchar(45)",
            "Null": "YES",
            "Key": "",
            "Default": "N/A",
            "Extra": ""
        },
        {
            "Field": "alert_priority",
            "Type": "varchar(128)",
            "Null": "YES",
            "Key": "",
            "Default": "Normal",
            "Extra": ""
        },
        {
            "Field": "analysis_summary",
            "Type": "text",
            "Null": "YES",
            "Key": "",
            "Default": null,
            "Extra": ""
        },
        {
            "Field": "market_session",
            "Type": "varchar(128)",
            "Null": "YES",
            "Key": "",
            "Default": null,
            "Extra": ""
        },
        {
            "Field": "market_sentiment",
            "Type": "varchar(128)",
            "Null": "YES",
            "Key": "",
            "Default": "N/A",
            "Extra": ""
        },
        {
            "Field": "type",
            "Type": "varchar(128)",
            "Null": "YES",
            "Key": "",
            "Default": null,
            "Extra": ""
        },
        {
            "Field": "free",
            "Type": "varchar(128)",
            "Null": "NO",
            "Key": "",
            "Default": "No",
            "Extra": ""
        },
        {
            "Field": "basic",
            "Type": "varchar(128)",
            "Null": "YES",
            "Key": "",
            "Default": null,
            "Extra": ""
        },
        {
            "Field": "premium",
            "Type": "varchar(128)",
            "Null": "YES",
            "Key": "",
            "Default": null,
            "Extra": ""
        },
        {
            "Field": "gold",
            "Type": "varchar(128)",
            "Null": "YES",
            "Key": "",
            "Default": null,
            "Extra": ""
        },
        {
            "Field": "ticker",
            "Type": "varchar(128)",
            "Null": "YES",
            "Key": "MUL",
            "Default": null,
            "Extra": ""
        },
        {
            "Field": "direction",
            "Type": "varchar(16)",
            "Null": "YES",
            "Key": "",
            "Default": "Long",
            "Extra": ""
        },
        {
            "Field": "exchange",
            "Type": "varchar(128)",
            "Null": "YES",
            "Key": "",
            "Default": null,
            "Extra": ""
        },
        {
            "Field": "market_data_status",
            "Type": "varchar(32)",
            "Null": "YES",
            "Key": "",
            "Default": "pending",
            "Extra": ""
        },
        {
            "Field": "company",
            "Type": "text",
            "Null": "YES",
            "Key": "",
            "Default": null,
            "Extra": ""
        },
        {
            "Field": "open",
            "Type": "decimal(10,2)",
            "Null": "YES",
            "Key": "",
            "Default": null,
            "Extra": ""
        },
        {
            "Field": "high",
            "Type": "decimal(10,2)",
            "Null": "YES",
            "Key": "",
            "Default": null,
            "Extra": ""
        },
        {
            "Field": "high52",
            "Type": "decimal(10,2)",
            "Null": "YES",
            "Key": "",
            "Default": null,
            "Extra": ""
        },
        {
            "Field": "low",
            "Type": "decimal(10,2)",
            "Null": "YES",
            "Key": "",
            "Default": null,
            "Extra": ""
        },
        {
            "Field": "low52",
            "Type": "decimal(10,2)",
            "Null": "YES",
            "Key": "",
            "Default": null,
            "Extra": ""
        },
        {
            "Field": "price",
            "Type": "decimal(10,2)",
            "Null": "YES",
            "Key": "",
            "Default": null,
            "Extra": ""
        },
        {
            "Field": "volume",
            "Type": "bigint",
            "Null": "YES",
            "Key": "",
            "Default": null,
            "Extra": ""
        },
        {
            "Field": "volume_actual",
            "Type": "bigint",
            "Null": "YES",
            "Key": "",
            "Default": null,
            "Extra": ""
        },
        {
            "Field": "ema5",
            "Type": "varchar(45)",
            "Null": "YES",
            "Key": "",
            "Default": null,
            "Extra": ""
        },
        {
            "Field": "ema8",
            "Type": "varchar(45)",
            "Null": "YES",
            "Key": "",
            "Default": null,
            "Extra": ""
        },
        {
            "Field": "ema13",
            "Type": "varchar(45)",
            "Null": "YES",
            "Key": "",
            "Default": null,
            "Extra": ""
        },
        {
            "Field": "ema34",
            "Type": "varchar(45)",
            "Null": "YES",
            "Key": "",
            "Default": null,
            "Extra": ""
        },
        {
            "Field": "ema48",
            "Type": "varchar(45)",
            "Null": "YES",
            "Key": "",
            "Default": null,
            "Extra": ""
        },
        {
            "Field": "off_high",
            "Type": "decimal(10,2)",
            "Null": "YES",
            "Key": "",
            "Default": null,
            "Extra": ""
        },
        {
            "Field": "off_high52",
            "Type": "decimal(10,2)",
            "Null": "YES",
            "Key": "",
            "Default": null,
            "Extra": ""
        },
        {
            "Field": "off_low",
            "Type": "decimal(10,2)",
            "Null": "YES",
            "Key": "",
            "Default": null,
            "Extra": ""
        },
        {
            "Field": "off_low52",
            "Type": "decimal(10,2)",
            "Null": "YES",
            "Key": "",
            "Default": null,
            "Extra": ""
        },
        {
            "Field": "latest_trading_day",
            "Type": "date",
            "Null": "YES",
            "Key": "",
            "Default": null,
            "Extra": ""
        },
        {
            "Field": "previous_close",
            "Type": "decimal(10,2)",
            "Null": "YES",
            "Key": "",
            "Default": null,
            "Extra": ""
        },
        {
            "Field": "change",
            "Type": "decimal(10,2)",
            "Null": "YES",
            "Key": "",
            "Default": null,
            "Extra": ""
        },
        {
            "Field": "market_cap",
            "Type": "varchar(20)",
            "Null": "YES",
            "Key": "",
            "Default": null,
            "Extra": ""
        },
        {
            "Field": "change_percent",
            "Type": "varchar(20)",
            "Null": "YES",
            "Key": "",
            "Default": null,
            "Extra": ""
        },
        {
            "Field": "link",
            "Type": "varchar(256)",
            "Null": "NO",
            "Key": "",
            "Default": "N/A",
            "Extra": ""
        },
        {
            "Field": "current_price",
            "Type": "varchar(128)",
            "Null": "YES",
            "Key": "",
            "Default": null,
            "Extra": ""
        },
        {
            "Field": "potential_price",
            "Type": "varchar(32)",
            "Null": "YES",
            "Key": "",
            "Default": null,
            "Extra": ""
        },
        {
            "Field": "differential",
            "Type": "varchar(32)",
            "Null": "YES",
            "Key": "",
            "Default": null,
            "Extra": ""
        },
        {
            "Field": "potential_gain",
            "Type": "varchar(32)",
            "Null": "YES",
            "Key": "",
            "Default": null,
            "Extra": ""
        },
        {
            "Field": "stop_loss_percent",
            "Type": "varchar(32)",
            "Null": "YES",
            "Key": "",
            "Default": null,
            "Extra": ""
        },
        {
            "Field": "stop_loss_differential",
            "Type": "varchar(32)",
            "Null": "YES",
            "Key": "",
            "Default": null,
            "Extra": ""
        },
        {
            "Field": "stop_loss",
            "Type": "varchar(32)",
            "Null": "YES",
            "Key": "",
            "Default": null,
            "Extra": ""
        },
        {
            "Field": "support",
            "Type": "varchar(128)",
            "Null": "YES",
            "Key": "",
            "Default": null,
            "Extra": ""
        },
        {
            "Field": "entry_price",
            "Type": "decimal(10,2)",
            "Null": "YES",
            "Key": "",
            "Default": null,
            "Extra": ""
        },
        {
            "Field": "max_entry",
            "Type": "varchar(128)",
            "Null": "YES",
            "Key": "",
            "Default": null,
            "Extra": ""
        },
        {
            "Field": "price_high",
            "Type": "varchar(32)",
            "Null": "YES",
            "Key": "",
            "Default": "0.00",
            "Extra": ""
        },
        {
            "Field": "percent_change",
            "Type": "int",
            "Null": "YES",
            "Key": "",
            "Default": null,
            "Extra": ""
        },
        {
            "Field": "trailing_stop_target",
            "Type": "decimal(5,2)",
            "Null": "YES",
            "Key": "",
            "Default": null,
            "Extra": ""
        },
        {
            "Field": "trailing_stop_percent",
            "Type": "decimal(5,2)",
            "Null": "YES",
            "Key": "",
            "Default": null,
            "Extra": ""
        },
        {
            "Field": "target_price",
            "Type": "decimal(10,2)",
            "Null": "YES",
            "Key": "",
            "Default": null,
            "Extra": ""
        },
        {
            "Field": "locked_profit_stop",
            "Type": "decimal(10,2)",
            "Null": "YES",
            "Key": "",
            "Default": null,
            "Extra": ""
        },
        {
            "Field": "last_updated",
            "Type": "varchar(128)",
            "Null": "YES",
            "Key": "",
            "Default": null,
            "Extra": ""
        },
        {
            "Field": "last_updated_time",
            "Type": "varchar(128)",
            "Null": "YES",
            "Key": "",
            "Default": null,
            "Extra": ""
        },
        {
            "Field": "last_marketed_at",
            "Type": "datetime",
            "Null": "YES",
            "Key": "",
            "Default": null,
            "Extra": ""
        },
        {
            "Field": "marketing_status",
            "Type": "varchar(32)",
            "Null": "YES",
            "Key": "",
            "Default": "pending",
            "Extra": ""
        },
        {
            "Field": "distribution_channels",
            "Type": "text",
            "Null": "YES",
            "Key": "",
            "Default": null,
            "Extra": ""
        },
        {
            "Field": "updated_stop_loss_differential",
            "Type": "varchar(128)",
            "Null": "YES",
            "Key": "",
            "Default": null,
            "Extra": ""
        },
        {
            "Field": "updated_stop_loss",
            "Type": "varchar(128)",
            "Null": "YES",
            "Key": "",
            "Default": null,
            "Extra": ""
        },
        {
            "Field": "closing_date",
            "Type": "varchar(128)",
            "Null": "YES",
            "Key": "",
            "Default": null,
            "Extra": ""
        },
        {
            "Field": "closing_time",
            "Type": "varchar(128)",
            "Null": "YES",
            "Key": "",
            "Default": null,
            "Extra": ""
        },
        {
            "Field": "details",
            "Type": "text",
            "Null": "YES",
            "Key": "",
            "Default": null,
            "Extra": ""
        },
        {
            "Field": "updated_details",
            "Type": "text",
            "Null": "YES",
            "Key": "",
            "Default": null,
            "Extra": ""
        },
        {
            "Field": "closing_details",
            "Type": "text",
            "Null": "YES",
            "Key": "",
            "Default": null,
            "Extra": ""
        },
        {
            "Field": "financial_news",
            "Type": "text",
            "Null": "YES",
            "Key": "",
            "Default": null,
            "Extra": ""
        },
        {
            "Field": "video_link",
            "Type": "varchar(256)",
            "Null": "YES",
            "Key": "",
            "Default": "N/A",
            "Extra": ""
        },
        {
            "Field": "send_msg",
            "Type": "varchar(128)",
            "Null": "YES",
            "Key": "",
            "Default": null,
            "Extra": ""
        },
        {
            "Field": "expdate",
            "Type": "varchar(128)",
            "Null": "YES",
            "Key": "",
            "Default": null,
            "Extra": ""
        },
        {
            "Field": "option_type",
            "Type": "varchar(128)",
            "Null": "YES",
            "Key": "",
            "Default": null,
            "Extra": ""
        },
        {
            "Field": "expiration",
            "Type": "varchar(128)",
            "Null": "YES",
            "Key": "",
            "Default": null,
            "Extra": ""
        },
        {
            "Field": "option_price",
            "Type": "varchar(128)",
            "Null": "YES",
            "Key": "",
            "Default": null,
            "Extra": ""
        },
        {
            "Field": "strike",
            "Type": "varchar(128)",
            "Null": "YES",
            "Key": "",
            "Default": null,
            "Extra": ""
        },
        {
            "Field": "chart_image",
            "Type": "varchar(512)",
            "Null": "YES",
            "Key": "",
            "Default": null,
            "Extra": ""
        },
        {
            "Field": "watchlist",
            "Type": "varchar(128)",
            "Null": "YES",
            "Key": "",
            "Default": null,
            "Extra": ""
        },
        {
            "Field": "tv_title",
            "Type": "varchar(60)",
            "Null": "YES",
            "Key": "",
            "Default": null,
            "Extra": ""
        },
        {
            "Field": "tv_chart",
            "Type": "varchar(256)",
            "Null": "YES",
            "Key": "",
            "Default": null,
            "Extra": ""
        },
        {
            "Field": "tv_chart_type",
            "Type": "varchar(20)",
            "Null": "YES",
            "Key": "",
            "Default": null,
            "Extra": ""
        },
        {
            "Field": "tv_description",
            "Type": "text",
            "Null": "YES",
            "Key": "",
            "Default": null,
            "Extra": ""
        },
        {
            "Field": "notification_sent",
            "Type": "tinyint",
            "Null": "YES",
            "Key": "",
            "Default": "0",
            "Extra": ""
        },
        {
            "Field": "trade_description",
            "Type": "text",
            "Null": "YES",
            "Key": "",
            "Default": null,
            "Extra": ""
        },
        {
            "Field": "trade_chart_link",
            "Type": "varchar(255)",
            "Null": "YES",
            "Key": "",
            "Default": null,
            "Extra": ""
        },
        {
            "Field": "ema_3_8",
            "Type": "varchar(10)",
            "Null": "YES",
            "Key": "",
            "Default": null,
            "Extra": ""
        },
        {
            "Field": "ema_8_13",
            "Type": "varchar(10)",
            "Null": "YES",
            "Key": "",
            "Default": null,
            "Extra": ""
        },
        {
            "Field": "ema_13_34",
            "Type": "varchar(10)",
            "Null": "YES",
            "Key": "",
            "Default": null,
            "Extra": ""
        },
        {
            "Field": "ema_34_48",
            "Type": "varchar(10)",
            "Null": "YES",
            "Key": "",
            "Default": null,
            "Extra": ""
        },
        {
            "Field": "ema_consensus",
            "Type": "int",
            "Null": "YES",
            "Key": "",
            "Default": null,
            "Extra": ""
        },
        {
            "Field": "ema_9",
            "Type": "varchar(10)",
            "Null": "YES",
            "Key": "",
            "Default": null,
            "Extra": ""
        },
        {
            "Field": "ema_21",
            "Type": "varchar(10)",
            "Null": "YES",
            "Key": "",
            "Default": null,
            "Extra": ""
        },
        {
            "Field": "ema_34",
            "Type": "varchar(10)",
            "Null": "YES",
            "Key": "",
            "Default": null,
            "Extra": ""
        },
        {
            "Field": "ema_48",
            "Type": "varchar(10)",
            "Null": "YES",
            "Key": "",
            "Default": null,
            "Extra": ""
        },
        {
            "Field": "ema_100",
            "Type": "varchar(10)",
            "Null": "YES",
            "Key": "",
            "Default": null,
            "Extra": ""
        },
        {
            "Field": "ema_200",
            "Type": "varchar(10)",
            "Null": "YES",
            "Key": "",
            "Default": null,
            "Extra": ""
        },
        {
            "Field": "ema_3",
            "Type": "decimal(10,4)",
            "Null": "YES",
            "Key": "",
            "Default": null,
            "Extra": ""
        },
        {
            "Field": "ema_8",
            "Type": "decimal(10,4)",
            "Null": "YES",
            "Key": "",
            "Default": null,
            "Extra": ""
        },
        {
            "Field": "ema_13",
            "Type": "decimal(10,4)",
            "Null": "YES",
            "Key": "",
            "Default": null,
            "Extra": ""
        },
        {
            "Field": "sma_50",
            "Type": "decimal(10,4)",
            "Null": "YES",
            "Key": "",
            "Default": null,
            "Extra": ""
        },
        {
            "Field": "sma_200",
            "Type": "decimal(10,4)",
            "Null": "YES",
            "Key": "",
            "Default": null,
            "Extra": ""
        },
        {
            "Field": "macd",
            "Type": "decimal(10,4)",
            "Null": "YES",
            "Key": "",
            "Default": null,
            "Extra": ""
        },
        {
            "Field": "rsi",
            "Type": "decimal(10,4)",
            "Null": "YES",
            "Key": "",
            "Default": null,
            "Extra": ""
        },
        {
            "Field": "modified_on",
            "Type": "datetime",
            "Null": "YES",
            "Key": "",
            "Default": null,
            "Extra": ""
        },
        {
            "Field": "source",
            "Type": "varchar(32)",
            "Null": "YES",
            "Key": "",
            "Default": null,
            "Extra": ""
        },
        {
            "Field": "account_type",
            "Type": "varchar(16)",
            "Null": "YES",
            "Key": "",
            "Default": null,
            "Extra": ""
        },
        {
            "Field": "broker_order_id",
            "Type": "varchar(64)",
            "Null": "YES",
            "Key": "",
            "Default": null,
            "Extra": ""
        },
        {
            "Field": "execution_id",
            "Type": "char(64)",
            "Null": "YES",
            "Key": "UNI",
            "Default": null,
            "Extra": ""
        },
        {
            "Field": "filled_qty",
            "Type": "decimal(18,8)",
            "Null": "YES",
            "Key": "",
            "Default": null,
            "Extra": ""
        },
        {
            "Field": "filled_price",
            "Type": "decimal(18,8)",
            "Null": "YES",
            "Key": "",
            "Default": null,
            "Extra": ""
        },
        {
            "Field": "filled_at",
            "Type": "datetime",
            "Null": "YES",
            "Key": "",
            "Default": null,
            "Extra": ""
        },
        {
            "Field": "side",
            "Type": "enum('BUY','SELL')",
            "Null": "YES",
            "Key": "",
            "Default": null,
            "Extra": ""
        },
        {
            "Field": "notified_discord",
            "Type": "tinyint(1)",
            "Null": "NO",
            "Key": "MUL",
            "Default": "0",
            "Extra": ""
        }
    ],
    "indexes": [
        {
            "Table": "bf_investment_trade_alerts",
            "Non_unique": "0",
            "Key_name": "PRIMARY",
            "Seq_in_index": "1",
            "Column_name": "id",
            "Collation": "A",
            "Cardinality": "14043",
            "Sub_part": null,
            "Packed": null,
            "Null": "",
            "Index_type": "BTREE",
            "Comment": "",
            "Index_comment": "",
            "Visible": "YES",
            "Expression": null
        },
        {
            "Table": "bf_investment_trade_alerts",
            "Non_unique": "0",
            "Key_name": "idx_trade_alerts_execution_id",
            "Seq_in_index": "1",
            "Column_name": "execution_id",
            "Collation": "A",
            "Cardinality": "1",
            "Sub_part": null,
            "Packed": null,
            "Null": "YES",
            "Index_type": "BTREE",
            "Comment": "",
            "Index_comment": "",
            "Visible": "YES",
            "Expression": null
        },
        {
            "Table": "bf_investment_trade_alerts",
            "Non_unique": "1",
            "Key_name": "Search Stock Symbol",
            "Seq_in_index": "1",
            "Column_name": "ticker",
            "Collation": "A",
            "Cardinality": "10380",
            "Sub_part": null,
            "Packed": null,
            "Null": "YES",
            "Index_type": "BTREE",
            "Comment": "",
            "Index_comment": "",
            "Visible": "YES",
            "Expression": null
        },
        {
            "Table": "bf_investment_trade_alerts",
            "Non_unique": "1",
            "Key_name": "Search Stock Symbol",
            "Seq_in_index": "2",
            "Column_name": "status",
            "Collation": "A",
            "Cardinality": "10387",
            "Sub_part": null,
            "Packed": null,
            "Null": "",
            "Index_type": "BTREE",
            "Comment": "",
            "Index_comment": "",
            "Visible": "YES",
            "Expression": null
        },
        {
            "Table": "bf_investment_trade_alerts",
            "Non_unique": "1",
            "Key_name": "idx_trade_alerts_status",
            "Seq_in_index": "1",
            "Column_name": "status",
            "Collation": "A",
            "Cardinality": "3",
            "Sub_part": null,
            "Packed": null,
            "Null": "",
            "Index_type": "BTREE",
            "Comment": "",
            "Index_comment": "",
            "Visible": "YES",
            "Expression": null
        },
        {
            "Table": "bf_investment_trade_alerts",
            "Non_unique": "1",
            "Key_name": "idx_trade_alerts_ticker",
            "Seq_in_index": "1",
            "Column_name": "ticker",
            "Collation": "A",
            "Cardinality": "10380",
            "Sub_part": null,
            "Packed": null,
            "Null": "YES",
            "Index_type": "BTREE",
            "Comment": "",
            "Index_comment": "",
            "Visible": "YES",
            "Expression": null
        },
        {
            "Table": "bf_investment_trade_alerts",
            "Non_unique": "1",
            "Key_name": "idx_trade_alerts_created",
            "Seq_in_index": "1",
            "Column_name": "created_on",
            "Collation": "A",
            "Cardinality": "5092",
            "Sub_part": null,
            "Packed": null,
            "Null": "YES",
            "Index_type": "BTREE",
            "Comment": "",
            "Index_comment": "",
            "Visible": "YES",
            "Expression": null
        },
        {
            "Table": "bf_investment_trade_alerts",
            "Non_unique": "1",
            "Key_name": "idx_trade_alerts_notified_discord",
            "Seq_in_index": "1",
            "Column_name": "notified_discord",
            "Collation": "A",
            "Cardinality": "1",
            "Sub_part": null,
            "Packed": null,
            "Null": "",
            "Index_type": "BTREE",
            "Comment": "",
            "Index_comment": "",
            "Visible": "YES",
            "Expression": null
        },
        {
            "Table": "bf_investment_trade_alerts",
            "Non_unique": "1",
            "Key_name": "latest_forecast_id",
            "Seq_in_index": "1",
            "Column_name": "latest_forecast_id",
            "Collation": "A",
            "Cardinality": "1",
            "Sub_part": null,
            "Packed": null,
            "Null": "YES",
            "Index_type": "BTREE",
            "Comment": "",
            "Index_comment": "",
            "Visible": "YES",
            "Expression": null
        }
    ]
}

===== TABLE: bf_investment_tickers =====

CodeIgniter v4.7.0 Command Line Tool - Server Time: 2026-06-09 08:36:49 UTC+00:00

{
    "table": "bf_investment_tickers",
    "columns": [
        {
            "Field": "id",
            "Type": "int",
            "Null": "NO",
            "Key": "PRI",
            "Default": null,
            "Extra": "auto_increment"
        },
        {
            "Field": "symbol",
            "Type": "varchar(10)",
            "Null": "NO",
            "Key": "UNI",
            "Default": null,
            "Extra": ""
        },
        {
            "Field": "name",
            "Type": "varchar(255)",
            "Null": "YES",
            "Key": "",
            "Default": null,
            "Extra": ""
        },
        {
            "Field": "currency",
            "Type": "varchar(10)",
            "Null": "YES",
            "Key": "",
            "Default": null,
            "Extra": ""
        },
        {
            "Field": "exchange",
            "Type": "varchar(50)",
            "Null": "YES",
            "Key": "",
            "Default": null,
            "Extra": ""
        },
        {
            "Field": "created_on",
            "Type": "datetime",
            "Null": "YES",
            "Key": "",
            "Default": null,
            "Extra": ""
        },
        {
            "Field": "market_cap",
            "Type": "decimal(20,2)",
            "Null": "YES",
            "Key": "",
            "Default": null,
            "Extra": ""
        },
        {
            "Field": "mic_code",
            "Type": "varchar(10)",
            "Null": "YES",
            "Key": "",
            "Default": null,
            "Extra": ""
        },
        {
            "Field": "country",
            "Type": "varchar(100)",
            "Null": "YES",
            "Key": "",
            "Default": "US",
            "Extra": ""
        },
        {
            "Field": "type",
            "Type": "varchar(50)",
            "Null": "NO",
            "Key": "",
            "Default": "Stocks",
            "Extra": ""
        },
        {
            "Field": "cik",
            "Type": "varchar(10)",
            "Null": "YES",
            "Key": "",
            "Default": null,
            "Extra": ""
        }
    ],
    "indexes": [
        {
            "Table": "bf_investment_tickers",
            "Non_unique": "0",
            "Key_name": "PRIMARY",
            "Seq_in_index": "1",
            "Column_name": "id",
            "Collation": "A",
            "Cardinality": "9721",
            "Sub_part": null,
            "Packed": null,
            "Null": "",
            "Index_type": "BTREE",
            "Comment": "",
            "Index_comment": "",
            "Visible": "YES",
            "Expression": null
        },
        {
            "Table": "bf_investment_tickers",
            "Non_unique": "0",
            "Key_name": "symbol_UNIQUE",
            "Seq_in_index": "1",
            "Column_name": "symbol",
            "Collation": "A",
            "Cardinality": "9873",
            "Sub_part": null,
            "Packed": null,
            "Null": "",
            "Index_type": "BTREE",
            "Comment": "",
            "Index_comment": "",
            "Visible": "YES",
            "Expression": null
        },
        {
            "Table": "bf_investment_tickers",
            "Non_unique": "1",
            "Key_name": "idx_symbol",
            "Seq_in_index": "1",
            "Column_name": "symbol",
            "Collation": "A",
            "Cardinality": "12513",
            "Sub_part": null,
            "Packed": null,
            "Null": "",
            "Index_type": "BTREE",
            "Comment": "",
            "Index_comment": "",
            "Visible": "YES",
            "Expression": null
        },
        {
            "Table": "bf_investment_tickers",
            "Non_unique": "1",
            "Key_name": "idx_tickers_symbol",
            "Seq_in_index": "1",
            "Column_name": "symbol",
            "Collation": "A",
            "Cardinality": "12513",
            "Sub_part": null,
            "Packed": null,
            "Null": "",
            "Index_type": "BTREE",
            "Comment": "",
            "Index_comment": "",
            "Visible": "YES",
            "Expression": null
        }
    ]
}

===== TABLE: bf_investment_alert_history =====

CodeIgniter v4.7.0 Command Line Tool - Server Time: 2026-06-09 08:36:50 UTC+00:00

{
    "table": "bf_investment_alert_history",
    "columns": [
        {
            "Field": "id",
            "Type": "int",
            "Null": "NO",
            "Key": "PRI",
            "Default": null,
            "Extra": "auto_increment"
        },
        {
            "Field": "active",
            "Type": "int",
            "Null": "YES",
            "Key": "",
            "Default": "1",
            "Extra": ""
        },
        {
            "Field": "status",
            "Type": "varchar(128)",
            "Null": "NO",
            "Key": "",
            "Default": "Opened",
            "Extra": ""
        },
        {
            "Field": "occurrences",
            "Type": "int",
            "Null": "YES",
            "Key": "",
            "Default": "1",
            "Extra": ""
        },
        {
            "Field": "alert_count",
            "Type": "int",
            "Null": "YES",
            "Key": "",
            "Default": "0",
            "Extra": ""
        },
        {
            "Field": "distributed_count",
            "Type": "int",
            "Null": "YES",
            "Key": "",
            "Default": "0",
            "Extra": ""
        },
        {
            "Field": "trade_id",
            "Type": "int",
            "Null": "NO",
            "Key": "",
            "Default": "0",
            "Extra": ""
        },
        {
            "Field": "created_on",
            "Type": "varchar(128)",
            "Null": "YES",
            "Key": "",
            "Default": null,
            "Extra": ""
        },
        {
            "Field": "updated_at",
            "Type": "varchar(256)",
            "Null": "YES",
            "Key": "",
            "Default": null,
            "Extra": ""
        },
        {
            "Field": "date",
            "Type": "datetime",
            "Null": "YES",
            "Key": "",
            "Default": "CURRENT_TIMESTAMP",
            "Extra": "DEFAULT_GENERATED"
        },
        {
            "Field": "display",
            "Type": "varchar(128)",
            "Null": "YES",
            "Key": "",
            "Default": "Yes",
            "Extra": ""
        },
        {
            "Field": "alert_created",
            "Type": "tinyint(1)",
            "Null": "NO",
            "Key": "",
            "Default": "1",
            "Extra": ""
        },
        {
            "Field": "send_alert",
            "Type": "tinyint(1)",
            "Null": "NO",
            "Key": "",
            "Default": "0",
            "Extra": ""
        },
        {
            "Field": "sent_on",
            "Type": "datetime",
            "Null": "YES",
            "Key": "",
            "Default": null,
            "Extra": ""
        },
        {
            "Field": "alert_sent",
            "Type": "tinyint(1)",
            "Null": "NO",
            "Key": "",
            "Default": "0",
            "Extra": ""
        },
        {
            "Field": "alerted_on",
            "Type": "datetime",
            "Null": "YES",
            "Key": "MUL",
            "Default": "CURRENT_TIMESTAMP",
            "Extra": "DEFAULT_GENERATED"
        },
        {
            "Field": "email_sent",
            "Type": "int",
            "Null": "YES",
            "Key": "",
            "Default": "0",
            "Extra": ""
        },
        {
            "Field": "submitted_date",
            "Type": "varchar(128)",
            "Null": "YES",
            "Key": "",
            "Default": null,
            "Extra": ""
        },
        {
            "Field": "ticker",
            "Type": "varchar(10)",
            "Null": "NO",
            "Key": "MUL",
            "Default": null,
            "Extra": ""
        },
        {
            "Field": "social_twitter",
            "Type": "text",
            "Null": "YES",
            "Key": "",
            "Default": null,
            "Extra": ""
        },
        {
            "Field": "social_facebook",
            "Type": "text",
            "Null": "YES",
            "Key": "",
            "Default": null,
            "Extra": ""
        },
        {
            "Field": "social_linkedin",
            "Type": "text",
            "Null": "YES",
            "Key": "",
            "Default": null,
            "Extra": ""
        },
        {
            "Field": "social_discord",
            "Type": "text",
            "Null": "YES",
            "Key": "",
            "Default": null,
            "Extra": ""
        },
        {
            "Field": "email_content",
            "Type": "text",
            "Null": "YES",
            "Key": "",
            "Default": null,
            "Extra": ""
        },
        {
            "Field": "blog_content",
            "Type": "text",
            "Null": "YES",
            "Key": "",
            "Default": null,
            "Extra": ""
        },
        {
            "Field": "voiceover_script",
            "Type": "text",
            "Null": "YES",
            "Key": "",
            "Default": null,
            "Extra": ""
        },
        {
            "Field": "category",
            "Type": "varchar(128)",
            "Null": "YES",
            "Key": "",
            "Default": null,
            "Extra": ""
        },
        {
            "Field": "market_session",
            "Type": "varchar(128)",
            "Null": "YES",
            "Key": "",
            "Default": null,
            "Extra": ""
        },
        {
            "Field": "type",
            "Type": "varchar(128)",
            "Null": "YES",
            "Key": "",
            "Default": null,
            "Extra": ""
        },
        {
            "Field": "free",
            "Type": "varchar(128)",
            "Null": "NO",
            "Key": "",
            "Default": "No",
            "Extra": ""
        },
        {
            "Field": "basic",
            "Type": "varchar(128)",
            "Null": "YES",
            "Key": "",
            "Default": null,
            "Extra": ""
        },
        {
            "Field": "premium",
            "Type": "varchar(128)",
            "Null": "YES",
            "Key": "",
            "Default": null,
            "Extra": ""
        },
        {
            "Field": "gold",
            "Type": "varchar(128)",
            "Null": "YES",
            "Key": "",
            "Default": null,
            "Extra": ""
        },
        {
            "Field": "exchange",
            "Type": "varchar(128)",
            "Null": "YES",
            "Key": "",
            "Default": null,
            "Extra": ""
        },
        {
            "Field": "company",
            "Type": "varchar(128)",
            "Null": "YES",
            "Key": "",
            "Default": null,
            "Extra": ""
        },
        {
            "Field": "open",
            "Type": "decimal(10,2)",
            "Null": "YES",
            "Key": "",
            "Default": null,
            "Extra": ""
        },
        {
            "Field": "high",
            "Type": "decimal(10,2)",
            "Null": "YES",
            "Key": "",
            "Default": null,
            "Extra": ""
        },
        {
            "Field": "high52",
            "Type": "decimal(10,2)",
            "Null": "YES",
            "Key": "",
            "Default": null,
            "Extra": ""
        },
        {
            "Field": "low",
            "Type": "decimal(10,2)",
            "Null": "YES",
            "Key": "",
            "Default": null,
            "Extra": ""
        },
        {
            "Field": "low52",
            "Type": "decimal(10,2)",
            "Null": "YES",
            "Key": "",
            "Default": null,
            "Extra": ""
        },
        {
            "Field": "price",
            "Type": "decimal(10,2)",
            "Null": "YES",
            "Key": "",
            "Default": null,
            "Extra": ""
        },
        {
            "Field": "volume",
            "Type": "bigint",
            "Null": "YES",
            "Key": "",
            "Default": null,
            "Extra": ""
        },
        {
            "Field": "volume_actual",
            "Type": "bigint",
            "Null": "YES",
            "Key": "",
            "Default": null,
            "Extra": ""
        },
        {
            "Field": "ema5",
            "Type": "varchar(45)",
            "Null": "YES",
            "Key": "",
            "Default": null,
            "Extra": ""
        },
        {
            "Field": "ema8",
            "Type": "varchar(45)",
            "Null": "YES",
            "Key": "",
            "Default": null,
            "Extra": ""
        },
        {
            "Field": "ema13",
            "Type": "varchar(45)",
            "Null": "YES",
            "Key": "",
            "Default": null,
            "Extra": ""
        },
        {
            "Field": "ema34",
            "Type": "varchar(45)",
            "Null": "YES",
            "Key": "",
            "Default": null,
            "Extra": ""
        },
        {
            "Field": "ema48",
            "Type": "varchar(45)",
            "Null": "YES",
            "Key": "",
            "Default": null,
            "Extra": ""
        },
        {
            "Field": "off_high",
            "Type": "decimal(10,2)",
            "Null": "YES",
            "Key": "",
            "Default": null,
            "Extra": ""
        },
        {
            "Field": "off_high52",
            "Type": "decimal(10,2)",
            "Null": "YES",
            "Key": "",
            "Default": null,
            "Extra": ""
        },
        {
            "Field": "off_low",
            "Type": "decimal(10,2)",
            "Null": "YES",
            "Key": "",
            "Default": null,
            "Extra": ""
        },
        {
            "Field": "off_low52",
            "Type": "decimal(10,2)",
            "Null": "YES",
            "Key": "",
            "Default": null,
            "Extra": ""
        },
        {
            "Field": "latest_trading_day",
            "Type": "date",
            "Null": "YES",
            "Key": "",
            "Default": null,
            "Extra": ""
        },
        {
            "Field": "previous_close",
            "Type": "decimal(10,2)",
            "Null": "YES",
            "Key": "",
            "Default": null,
            "Extra": ""
        },
        {
            "Field": "change",
            "Type": "decimal(10,2)",
            "Null": "YES",
            "Key": "",
            "Default": null,
            "Extra": ""
        },
        {
            "Field": "market_cap",
            "Type": "varchar(20)",
            "Null": "YES",
            "Key": "",
            "Default": null,
            "Extra": ""
        },
        {
            "Field": "change_percent",
            "Type": "varchar(20)",
            "Null": "YES",
            "Key": "",
            "Default": null,
            "Extra": ""
        },
        {
            "Field": "link",
            "Type": "varchar(256)",
            "Null": "NO",
            "Key": "",
            "Default": "N/A",
            "Extra": ""
        },
        {
            "Field": "current_price",
            "Type": "varchar(128)",
            "Null": "YES",
            "Key": "",
            "Default": null,
            "Extra": ""
        },
        {
            "Field": "potential_price",
            "Type": "varchar(32)",
            "Null": "YES",
            "Key": "",
            "Default": null,
            "Extra": ""
        },
        {
            "Field": "differential",
            "Type": "varchar(32)",
            "Null": "YES",
            "Key": "",
            "Default": null,
            "Extra": ""
        },
        {
            "Field": "potential_gain",
            "Type": "varchar(32)",
            "Null": "YES",
            "Key": "",
            "Default": null,
            "Extra": ""
        },
        {
            "Field": "stop_loss_percent",
            "Type": "varchar(32)",
            "Null": "YES",
            "Key": "",
            "Default": null,
            "Extra": ""
        },
        {
            "Field": "stop_loss_differential",
            "Type": "varchar(32)",
            "Null": "YES",
            "Key": "",
            "Default": null,
            "Extra": ""
        },
        {
            "Field": "stop_loss",
            "Type": "varchar(32)",
            "Null": "YES",
            "Key": "",
            "Default": null,
            "Extra": ""
        },
        {
            "Field": "support",
            "Type": "varchar(128)",
            "Null": "YES",
            "Key": "",
            "Default": null,
            "Extra": ""
        },
        {
            "Field": "max_entry",
            "Type": "varchar(128)",
            "Null": "YES",
            "Key": "",
            "Default": null,
            "Extra": ""
        },
        {
            "Field": "price_high",
            "Type": "varchar(32)",
            "Null": "YES",
            "Key": "",
            "Default": "0.00",
            "Extra": ""
        },
        {
            "Field": "percent_change",
            "Type": "int",
            "Null": "YES",
            "Key": "",
            "Default": null,
            "Extra": ""
        },
        {
            "Field": "last_updated",
            "Type": "varchar(128)",
            "Null": "YES",
            "Key": "",
            "Default": null,
            "Extra": ""
        },
        {
            "Field": "last_updated_time",
            "Type": "varchar(128)",
            "Null": "YES",
            "Key": "",
            "Default": null,
            "Extra": ""
        },
        {
            "Field": "updated_stop_loss_differential",
            "Type": "varchar(128)",
            "Null": "YES",
            "Key": "",
            "Default": null,
            "Extra": ""
        },
        {
            "Field": "updated_stop_loss",
            "Type": "varchar(128)",
            "Null": "YES",
            "Key": "",
            "Default": null,
            "Extra": ""
        },
        {
            "Field": "closing_date",
            "Type": "varchar(128)",
            "Null": "YES",
            "Key": "",
            "Default": null,
            "Extra": ""
        },
        {
            "Field": "closing_time",
            "Type": "varchar(128)",
            "Null": "YES",
            "Key": "",
            "Default": null,
            "Extra": ""
        },
        {
            "Field": "details",
            "Type": "text",
            "Null": "YES",
            "Key": "",
            "Default": null,
            "Extra": ""
        },
        {
            "Field": "updated_details",
            "Type": "text",
            "Null": "YES",
            "Key": "",
            "Default": null,
            "Extra": ""
        },
        {
            "Field": "closing_details",
            "Type": "text",
            "Null": "YES",
            "Key": "",
            "Default": null,
            "Extra": ""
        },
        {
            "Field": "financial_news",
            "Type": "text",
            "Null": "YES",
            "Key": "",
            "Default": null,
            "Extra": ""
        },
        {
            "Field": "video_link",
            "Type": "varchar(256)",
            "Null": "YES",
            "Key": "",
            "Default": "N/A",
            "Extra": ""
        },
        {
            "Field": "send_msg",
            "Type": "varchar(128)",
            "Null": "YES",
            "Key": "",
            "Default": null,
            "Extra": ""
        },
        {
            "Field": "expdate",
            "Type": "varchar(128)",
            "Null": "YES",
            "Key": "",
            "Default": null,
            "Extra": ""
        },
        {
            "Field": "option_type",
            "Type": "varchar(128)",
            "Null": "YES",
            "Key": "",
            "Default": null,
            "Extra": ""
        },
        {
            "Field": "expiration",
            "Type": "varchar(128)",
            "Null": "YES",
            "Key": "",
            "Default": null,
            "Extra": ""
        },
        {
            "Field": "option_price",
            "Type": "varchar(128)",
            "Null": "YES",
            "Key": "",
            "Default": null,
            "Extra": ""
        },
        {
            "Field": "strike",
            "Type": "varchar(128)",
            "Null": "YES",
            "Key": "",
            "Default": null,
            "Extra": ""
        },
        {
            "Field": "chart_image",
            "Type": "varchar(512)",
            "Null": "YES",
            "Key": "",
            "Default": null,
            "Extra": ""
        },
        {
            "Field": "watchlist",
            "Type": "varchar(128)",
            "Null": "YES",
            "Key": "",
            "Default": null,
            "Extra": ""
        },
        {
            "Field": "tv_chart",
            "Type": "varchar(256)",
            "Null": "YES",
            "Key": "",
            "Default": null,
            "Extra": ""
        },
        {
            "Field": "tv_chart_type",
            "Type": "varchar(20)",
            "Null": "YES",
            "Key": "",
            "Default": null,
            "Extra": ""
        },
        {
            "Field": "notification_sent",
            "Type": "tinyint",
            "Null": "YES",
            "Key": "",
            "Default": "0",
            "Extra": ""
        },
        {
            "Field": "trade_description",
            "Type": "text",
            "Null": "YES",
            "Key": "",
            "Default": null,
            "Extra": ""
        },
        {
            "Field": "trade_chart_link",
            "Type": "varchar(255)",
            "Null": "YES",
            "Key": "",
            "Default": null,
            "Extra": ""
        },
        {
            "Field": "last_scrape_timestamp",
            "Type": "datetime",
            "Null": "YES",
            "Key": "",
            "Default": null,
            "Extra": ""
        },
        {
            "Field": "last_alert_processed",
            "Type": "datetime",
            "Null": "YES",
            "Key": "",
            "Default": null,
            "Extra": ""
        },
        {
            "Field": "processing_status",
            "Type": "enum('Pending','Completed','Failed')",
            "Null": "YES",
            "Key": "",
            "Default": "Pending",
            "Extra": ""
        },
        {
            "Field": "trade_alert_id",
            "Type": "int",
            "Null": "YES",
            "Key": "",
            "Default": null,
            "Extra": ""
        },
        {
            "Field": "updated_on",
            "Type": "datetime",
            "Null": "YES",
            "Key": "",
            "Default": "CURRENT_TIMESTAMP",
            "Extra": "DEFAULT_GENERATED on update CURRENT_TIMESTAMP"
        },
        {
            "Field": "market_sentiment",
            "Type": "varchar(255)",
            "Null": "YES",
            "Key": "",
            "Default": null,
            "Extra": ""
        },
        {
            "Field": "free_chart_link",
            "Type": "varchar(255)",
            "Null": "YES",
            "Key": "",
            "Default": null,
            "Extra": ""
        },
        {
            "Field": "premium_chart_link",
            "Type": "varchar(255)",
            "Null": "YES",
            "Key": "",
            "Default": null,
            "Extra": ""
        },
        {
            "Field": "ema_3_8",
            "Type": "varchar(10)",
            "Null": "YES",
            "Key": "",
            "Default": null,
            "Extra": ""
        },
        {
            "Field": "ema_8_13",
            "Type": "varchar(10)",
            "Null": "YES",
            "Key": "",
            "Default": null,
            "Extra": ""
        },
        {
            "Field": "ema_13_34",
            "Type": "varchar(10)",
            "Null": "YES",
            "Key": "",
            "Default": null,
            "Extra": ""
        },
        {
            "Field": "ema_34_48",
            "Type": "varchar(10)",
            "Null": "YES",
            "Key": "",
            "Default": null,
            "Extra": ""
        },
        {
            "Field": "ema_consensus",
            "Type": "int",
            "Null": "YES",
            "Key": "",
            "Default": null,
            "Extra": ""
        },
        {
            "Field": "trade_type",
            "Type": "varchar(45)",
            "Null": "YES",
            "Key": "",
            "Default": "N/A",
            "Extra": ""
        },
        {
            "Field": "target_price",
            "Type": "decimal(10,2)",
            "Null": "YES",
            "Key": "",
            "Default": null,
            "Extra": ""
        },
        {
            "Field": "locked_profit_stop",
            "Type": "decimal(10,2)",
            "Null": "YES",
            "Key": "",
            "Default": null,
            "Extra": ""
        },
        {
            "Field": "trailing_stop_percent",
            "Type": "decimal(5,2)",
            "Null": "YES",
            "Key": "",
            "Default": null,
            "Extra": ""
        },
        {
            "Field": "alert_priority",
            "Type": "varchar(128)",
            "Null": "YES",
            "Key": "",
            "Default": "Normal",
            "Extra": ""
        },
        {
            "Field": "analysis_summary",
            "Type": "text",
            "Null": "YES",
            "Key": "",
            "Default": null,
            "Extra": ""
        },
        {
            "Field": "ema_9",
            "Type": "varchar(45)",
            "Null": "YES",
            "Key": "",
            "Default": null,
            "Extra": ""
        },
        {
            "Field": "ema_21",
            "Type": "varchar(45)",
            "Null": "YES",
            "Key": "",
            "Default": null,
            "Extra": ""
        },
        {
            "Field": "ema_34",
            "Type": "varchar(45)",
            "Null": "YES",
            "Key": "",
            "Default": null,
            "Extra": ""
        },
        {
            "Field": "ema_48",
            "Type": "varchar(45)",
            "Null": "YES",
            "Key": "",
            "Default": null,
            "Extra": ""
        },
        {
            "Field": "ema_100",
            "Type": "varchar(45)",
            "Null": "YES",
            "Key": "",
            "Default": null,
            "Extra": ""
        },
        {
            "Field": "ema_200",
            "Type": "varchar(45)",
            "Null": "YES",
            "Key": "",
            "Default": null,
            "Extra": ""
        },
        {
            "Field": "ema_3",
            "Type": "decimal(10,4)",
            "Null": "YES",
            "Key": "",
            "Default": null,
            "Extra": ""
        },
        {
            "Field": "ema_8",
            "Type": "decimal(10,4)",
            "Null": "YES",
            "Key": "",
            "Default": null,
            "Extra": ""
        },
        {
            "Field": "ema_13",
            "Type": "decimal(10,4)",
            "Null": "YES",
            "Key": "",
            "Default": null,
            "Extra": ""
        },
        {
            "Field": "sma_50",
            "Type": "decimal(10,4)",
            "Null": "YES",
            "Key": "",
            "Default": null,
            "Extra": ""
        },
        {
            "Field": "sma_200",
            "Type": "decimal(10,4)",
            "Null": "YES",
            "Key": "",
            "Default": null,
            "Extra": ""
        },
        {
            "Field": "macd",
            "Type": "decimal(10,4)",
            "Null": "YES",
            "Key": "",
            "Default": null,
            "Extra": ""
        },
        {
            "Field": "rsi",
            "Type": "decimal(10,4)",
            "Null": "YES",
            "Key": "",
            "Default": null,
            "Extra": ""
        }
    ],
    "indexes": [
        {
            "Table": "bf_investment_alert_history",
            "Non_unique": "0",
            "Key_name": "PRIMARY",
            "Seq_in_index": "1",
            "Column_name": "id",
            "Collation": "A",
            "Cardinality": "30088",
            "Sub_part": null,
            "Packed": null,
            "Null": "",
            "Index_type": "BTREE",
            "Comment": "",
            "Index_comment": "",
            "Visible": "YES",
            "Expression": null
        },
        {
            "Table": "bf_investment_alert_history",
            "Non_unique": "1",
            "Key_name": "ticker",
            "Seq_in_index": "1",
            "Column_name": "ticker",
            "Collation": "A",
            "Cardinality": "3043",
            "Sub_part": null,
            "Packed": null,
            "Null": "",
            "Index_type": "BTREE",
            "Comment": "",
            "Index_comment": "",
            "Visible": "YES",
            "Expression": null
        },
        {
            "Table": "bf_investment_alert_history",
            "Non_unique": "1",
            "Key_name": "alerted_on",
            "Seq_in_index": "1",
            "Column_name": "alerted_on",
            "Collation": "A",
            "Cardinality": "969",
            "Sub_part": null,
            "Packed": null,
            "Null": "YES",
            "Index_type": "BTREE",
            "Comment": "",
            "Index_comment": "",
            "Visible": "YES",
            "Expression": null
        },
        {
            "Table": "bf_investment_alert_history",
            "Non_unique": "1",
            "Key_name": "idx_history_ticker_date",
            "Seq_in_index": "1",
            "Column_name": "ticker",
            "Collation": "A",
            "Cardinality": "3065",
            "Sub_part": null,
            "Packed": null,
            "Null": "",
            "Index_type": "BTREE",
            "Comment": "",
            "Index_comment": "",
            "Visible": "YES",
            "Expression": null
        },
        {
            "Table": "bf_investment_alert_history",
            "Non_unique": "1",
            "Key_name": "idx_history_ticker_date",
            "Seq_in_index": "2",
            "Column_name": "alerted_on",
            "Collation": "A",
            "Cardinality": "28770",
            "Sub_part": null,
            "Packed": null,
            "Null": "YES",
            "Index_type": "BTREE",
            "Comment": "",
            "Index_comment": "",
            "Visible": "YES",
            "Expression": null
        }
    ]
}

===== TABLE: bf_trade_alert_scanner_meta =====

CodeIgniter v4.7.0 Command Line Tool - Server Time: 2026-06-09 08:36:50 UTC+00:00

{
    "table": "bf_trade_alert_scanner_meta",
    "columns": [
        {
            "Field": "id",
            "Type": "bigint unsigned",
            "Null": "NO",
            "Key": "PRI",
            "Default": null,
            "Extra": "auto_increment"
        },
        {
            "Field": "alert_id",
            "Type": "bigint unsigned",
            "Null": "NO",
            "Key": "MUL",
            "Default": null,
            "Extra": ""
        },
        {
            "Field": "scanner_key",
            "Type": "varchar(191)",
            "Null": "NO",
            "Key": "MUL",
            "Default": null,
            "Extra": ""
        },
        {
            "Field": "scanner_family",
            "Type": "varchar(191)",
            "Null": "YES",
            "Key": "",
            "Default": null,
            "Extra": ""
        },
        {
            "Field": "timeframe",
            "Type": "varchar(32)",
            "Null": "YES",
            "Key": "",
            "Default": null,
            "Extra": ""
        },
        {
            "Field": "signal",
            "Type": "varchar(16)",
            "Null": "YES",
            "Key": "",
            "Default": null,
            "Extra": ""
        },
        {
            "Field": "tags_json",
            "Type": "longtext",
            "Null": "YES",
            "Key": "",
            "Default": null,
            "Extra": ""
        },
        {
            "Field": "created_at",
            "Type": "datetime",
            "Null": "NO",
            "Key": "",
            "Default": null,
            "Extra": ""
        }
    ],
    "indexes": [
        {
            "Table": "bf_trade_alert_scanner_meta",
            "Non_unique": "0",
            "Key_name": "PRIMARY",
            "Seq_in_index": "1",
            "Column_name": "id",
            "Collation": "A",
            "Cardinality": "27150",
            "Sub_part": null,
            "Packed": null,
            "Null": "",
            "Index_type": "BTREE",
            "Comment": "",
            "Index_comment": "",
            "Visible": "YES",
            "Expression": null
        },
        {
            "Table": "bf_trade_alert_scanner_meta",
            "Non_unique": "1",
            "Key_name": "alert_id",
            "Seq_in_index": "1",
            "Column_name": "alert_id",
            "Collation": "A",
            "Cardinality": "2574",
            "Sub_part": null,
            "Packed": null,
            "Null": "",
            "Index_type": "BTREE",
            "Comment": "",
            "Index_comment": "",
            "Visible": "YES",
            "Expression": null
        },
        {
            "Table": "bf_trade_alert_scanner_meta",
            "Non_unique": "1",
            "Key_name": "scanner_key",
            "Seq_in_index": "1",
            "Column_name": "scanner_key",
            "Collation": "A",
            "Cardinality": "757",
            "Sub_part": null,
            "Packed": null,
            "Null": "",
            "Index_type": "BTREE",
            "Comment": "",
            "Index_comment": "",
            "Visible": "YES",
            "Expression": null
        }
    ]
}

===== TABLE: bf_aiops_alert_jobs =====

CodeIgniter v4.7.0 Command Line Tool - Server Time: 2026-06-09 08:36:50 UTC+00:00

[Error]
Call to a member function getResultArray() on bool
at APPPATH/Services/AIOps/SchemaInspectorService.php:56

Backtrace:
  1    APPPATH/Services/AIOps/SchemaInspectorService.php:31
       App\Services\AIOps\SchemaInspectorService()->inspectSchema('bf_aiops_alert_jobs')

  2    APPPATH/Commands/AIOps/SqlCheck.php:86
       App\Services\AIOps\SchemaInspectorService()->getTableSchema('bf_aiops_alert_jobs')

  3    APPPATH/Commands/AIOps/SqlCheck.php:40
       App\Commands\AIOps\SqlCheck()->validateTable('bf_aiops_alert_jobs')

  4    SYSTEMPATH/CLI/Commands.php:74
       App\Commands\AIOps\SqlCheck()->run([...])

  5    SYSTEMPATH/CLI/Console.php:47
       CodeIgniter\CLI\Commands()->run('aiops:sql:check', [...])

  6    SYSTEMPATH/Boot.php:442
       CodeIgniter\CLI\Console()->run()

  7    SYSTEMPATH/Boot.php:166
       CodeIgniter\Boot::runCommand(Object(CodeIgniter\CLI\Console))

  8    ROOTPATH/spark:107
       CodeIgniter\Boot::bootSpark(Object(Config\Paths))


===== TABLE: bf_marketing_temp_scraper =====

CodeIgniter v4.7.0 Command Line Tool - Server Time: 2026-06-09 08:36:50 UTC+00:00

{
    "table": "bf_marketing_temp_scraper",
    "columns": [
        {
            "Field": "id",
            "Type": "int",
            "Null": "NO",
            "Key": "PRI",
            "Default": null,
            "Extra": "auto_increment"
        },
        {
            "Field": "source_type",
            "Type": "varchar(50)",
            "Null": "YES",
            "Key": "",
            "Default": null,
            "Extra": ""
        },
        {
            "Field": "source_provider",
            "Type": "varchar(100)",
            "Null": "YES",
            "Key": "",
            "Default": null,
            "Extra": ""
        },
        {
            "Field": "alert_type",
            "Type": "varchar(50)",
            "Null": "YES",
            "Key": "MUL",
            "Default": null,
            "Extra": ""
        },
        {
            "Field": "sender_email",
            "Type": "varchar(255)",
            "Null": "YES",
            "Key": "",
            "Default": null,
            "Extra": ""
        },
        {
            "Field": "source_message_id",
            "Type": "varchar(255)",
            "Null": "YES",
            "Key": "",
            "Default": null,
            "Extra": ""
        },
        {
            "Field": "ticker",
            "Type": "varchar(20)",
            "Null": "YES",
            "Key": "MUL",
            "Default": null,
            "Extra": ""
        },
        {
            "Field": "company_name",
            "Type": "varchar(255)",
            "Null": "YES",
            "Key": "",
            "Default": null,
            "Extra": ""
        },
        {
            "Field": "content_hash",
            "Type": "varchar(64)",
            "Null": "YES",
            "Key": "MUL",
            "Default": null,
            "Extra": ""
        },
        {
            "Field": "status",
            "Type": "varchar(50)",
            "Null": "YES",
            "Key": "MUL",
            "Default": null,
            "Extra": ""
        },
        {
            "Field": "processed_at",
            "Type": "datetime",
            "Null": "YES",
            "Key": "",
            "Default": null,
            "Extra": ""
        },
        {
            "Field": "date_published",
            "Type": "datetime",
            "Null": "YES",
            "Key": "MUL",
            "Default": null,
            "Extra": ""
        },
        {
            "Field": "type",
            "Type": "varchar(50)",
            "Null": "YES",
            "Key": "",
            "Default": null,
            "Extra": ""
        },
        {
            "Field": "url",
            "Type": "varchar(255)",
            "Null": "YES",
            "Key": "",
            "Default": null,
            "Extra": ""
        },
        {
            "Field": "title",
            "Type": "varchar(255)",
            "Null": "YES",
            "Key": "",
            "Default": null,
            "Extra": ""
        },
        {
            "Field": "summary",
            "Type": "text",
            "Null": "YES",
            "Key": "",
            "Default": null,
            "Extra": ""
        },
        {
            "Field": "formatted_summary",
            "Type": "mediumtext",
            "Null": "YES",
            "Key": "",
            "Default": null,
            "Extra": ""
        },
        {
            "Field": "content",
            "Type": "longtext",
            "Null": "YES",
            "Key": "",
            "Default": null,
            "Extra": ""
        },
        {
            "Field": "feature_score",
            "Type": "float",
            "Null": "YES",
            "Key": "",
            "Default": "0",
            "Extra": ""
        },
        {
            "Field": "email_identifier",
            "Type": "varchar(255)",
            "Null": "YES",
            "Key": "UNI",
            "Default": null,
            "Extra": ""
        },
        {
            "Field": "email_date",
            "Type": "datetime",
            "Null": "YES",
            "Key": "",
            "Default": null,
            "Extra": ""
        },
        {
            "Field": "email_sender",
            "Type": "varchar(255)",
            "Null": "YES",
            "Key": "",
            "Default": null,
            "Extra": ""
        },
        {
            "Field": "email_subject",
            "Type": "varchar(500)",
            "Null": "YES",
            "Key": "",
            "Default": null,
            "Extra": ""
        },
        {
            "Field": "email_body",
            "Type": "text",
            "Null": "YES",
            "Key": "",
            "Default": null,
            "Extra": ""
        },
        {
            "Field": "email_attachments",
            "Type": "text",
            "Null": "YES",
            "Key": "",
            "Default": null,
            "Extra": ""
        },
        {
            "Field": "keywords",
            "Type": "text",
            "Null": "YES",
            "Key": "",
            "Default": null,
            "Extra": ""
        },
        {
            "Field": "scraped_at",
            "Type": "datetime",
            "Null": "YES",
            "Key": "",
            "Default": null,
            "Extra": ""
        },
        {
            "Field": "created_on",
            "Type": "datetime",
            "Null": "YES",
            "Key": "",
            "Default": null,
            "Extra": ""
        },
        {
            "Field": "modified_on",
            "Type": "datetime",
            "Null": "YES",
            "Key": "",
            "Default": null,
            "Extra": ""
        },
        {
            "Field": "links",
            "Type": "text",
            "Null": "YES",
            "Key": "",
            "Default": null,
            "Extra": ""
        },
        {
            "Field": "images",
            "Type": "text",
            "Null": "YES",
            "Key": "",
            "Default": null,
            "Extra": ""
        },
        {
            "Field": "videos",
            "Type": "text",
            "Null": "YES",
            "Key": "",
            "Default": null,
            "Extra": ""
        },
        {
            "Field": "metadata",
            "Type": "text",
            "Null": "YES",
            "Key": "",
            "Default": null,
            "Extra": ""
        },
        {
            "Field": "structured_data",
            "Type": "text",
            "Null": "YES",
            "Key": "",
            "Default": null,
            "Extra": ""
        },
        {
            "Field": "additional_html_elements",
            "Type": "text",
            "Null": "YES",
            "Key": "",
            "Default": null,
            "Extra": ""
        },
        {
            "Field": "page_performance_data",
            "Type": "text",
            "Null": "YES",
            "Key": "",
            "Default": null,
            "Extra": ""
        },
        {
            "Field": "network_requests",
            "Type": "text",
            "Null": "YES",
            "Key": "",
            "Default": null,
            "Extra": ""
        },
        {
            "Field": "user_interaction_points",
            "Type": "text",
            "Null": "YES",
            "Key": "",
            "Default": null,
            "Extra": ""
        },
        {
            "Field": "accessibility_information",
            "Type": "text",
            "Null": "YES",
            "Key": "",
            "Default": null,
            "Extra": ""
        },
        {
            "Field": "page_relationships",
            "Type": "text",
            "Null": "YES",
            "Key": "",
            "Default": null,
            "Extra": ""
        },
        {
            "Field": "seo_elements",
            "Type": "text",
            "Null": "YES",
            "Key": "",
            "Default": null,
            "Extra": ""
        },
        {
            "Field": "social_media_links",
            "Type": "text",
            "Null": "YES",
            "Key": "",
            "Default": null,
            "Extra": ""
        },
        {
            "Field": "comments_user_generated_content",
            "Type": "text",
            "Null": "YES",
            "Key": "",
            "Default": null,
            "Extra": ""
        },
        {
            "Field": "contact_information",
            "Type": "text",
            "Null": "YES",
            "Key": "",
            "Default": null,
            "Extra": ""
        },
        {
            "Field": "legal_information",
            "Type": "text",
            "Null": "YES",
            "Key": "",
            "Default": null,
            "Extra": ""
        },
        {
            "Field": "breadcrumbs",
            "Type": "text",
            "Null": "YES",
            "Key": "",
            "Default": null,
            "Extra": ""
        },
        {
            "Field": "date_time",
            "Type": "datetime",
            "Null": "YES",
            "Key": "",
            "Default": null,
            "Extra": ""
        },
        {
            "Field": "author_information",
            "Type": "text",
            "Null": "YES",
            "Key": "",
            "Default": null,
            "Extra": ""
        },
        {
            "Field": "ratings_reviews",
            "Type": "text",
            "Null": "YES",
            "Key": "",
            "Default": null,
            "Extra": ""
        },
        {
            "Field": "price_information",
            "Type": "text",
            "Null": "YES",
            "Key": "",
            "Default": null,
            "Extra": ""
        },
        {
            "Field": "location_data",
            "Type": "text",
            "Null": "YES",
            "Key": "",
            "Default": null,
            "Extra": ""
        },
        {
            "Field": "language_locale",
            "Type": "text",
            "Null": "YES",
            "Key": "",
            "Default": null,
            "Extra": ""
        },
        {
            "Field": "mobile_responsiveness",
            "Type": "text",
            "Null": "YES",
            "Key": "",
            "Default": null,
            "Extra": ""
        },
        {
            "Field": "security_information",
            "Type": "text",
            "Null": "YES",
            "Key": "",
            "Default": null,
            "Extra": ""
        },
        {
            "Field": "technology_stack",
            "Type": "text",
            "Null": "YES",
            "Key": "",
            "Default": null,
            "Extra": ""
        },
        {
            "Field": "server_information",
            "Type": "text",
            "Null": "YES",
            "Key": "",
            "Default": null,
            "Extra": ""
        },
        {
            "Field": "caching_information",
            "Type": "text",
            "Null": "YES",
            "Key": "",
            "Default": null,
            "Extra": ""
        },
        {
            "Field": "content_type",
            "Type": "text",
            "Null": "YES",
            "Key": "",
            "Default": null,
            "Extra": ""
        },
        {
            "Field": "character_set",
            "Type": "text",
            "Null": "YES",
            "Key": "",
            "Default": null,
            "Extra": ""
        },
        {
            "Field": "rss_atom_feeds",
            "Type": "text",
            "Null": "YES",
            "Key": "",
            "Default": null,
            "Extra": ""
        },
        {
            "Field": "pagination",
            "Type": "text",
            "Null": "YES",
            "Key": "",
            "Default": null,
            "Extra": ""
        },
        {
            "Field": "custom_data",
            "Type": "text",
            "Null": "YES",
            "Key": "",
            "Default": null,
            "Extra": ""
        },
        {
            "Field": "error_handling",
            "Type": "text",
            "Null": "YES",
            "Key": "",
            "Default": null,
            "Extra": ""
        },
        {
            "Field": "historical_changes",
            "Type": "text",
            "Null": "YES",
            "Key": "",
            "Default": null,
            "Extra": ""
        },
        {
            "Field": "user_reviews_ratings",
            "Type": "text",
            "Null": "YES",
            "Key": "",
            "Default": null,
            "Extra": ""
        },
        {
            "Field": "inventory_levels",
            "Type": "text",
            "Null": "YES",
            "Key": "",
            "Default": null,
            "Extra": ""
        },
        {
            "Field": "shipping_information",
            "Type": "text",
            "Null": "YES",
            "Key": "",
            "Default": null,
            "Extra": ""
        },
        {
            "Field": "bots_crawlers_information",
            "Type": "text",
            "Null": "YES",
            "Key": "",
            "Default": null,
            "Extra": ""
        },
        {
            "Field": "affiliate_links",
            "Type": "text",
            "Null": "YES",
            "Key": "",
            "Default": null,
            "Extra": ""
        },
        {
            "Field": "advertisements",
            "Type": "text",
            "Null": "YES",
            "Key": "",
            "Default": null,
            "Extra": ""
        },
        {
            "Field": "cookie_notices",
            "Type": "text",
            "Null": "YES",
            "Key": "",
            "Default": null,
            "Extra": ""
        },
        {
            "Field": "popups_modals",
            "Type": "text",
            "Null": "YES",
            "Key": "",
            "Default": null,
            "Extra": ""
        },
        {
            "Field": "browser_specific_data",
            "Type": "text",
            "Null": "YES",
            "Key": "",
            "Default": null,
            "Extra": ""
        },
        {
            "Field": "geolocation_specific_content",
            "Type": "text",
            "Null": "YES",
            "Key": "",
            "Default": null,
            "Extra": ""
        },
        {
            "Field": "ab_testing_variations",
            "Type": "text",
            "Null": "YES",
            "Key": "",
            "Default": null,
            "Extra": ""
        },
        {
            "Field": "user_agent_specific_content",
            "Type": "text",
            "Null": "YES",
            "Key": "",
            "Default": null,
            "Extra": ""
        },
        {
            "Field": "screen_size_specific_content",
            "Type": "text",
            "Null": "YES",
            "Key": "",
            "Default": null,
            "Extra": ""
        },
        {
            "Field": "device_specific_content",
            "Type": "text",
            "Null": "YES",
            "Key": "",
            "Default": null,
            "Extra": ""
        },
        {
            "Field": "browser_extension_data",
            "Type": "text",
            "Null": "YES",
            "Key": "",
            "Default": null,
            "Extra": ""
        },
        {
            "Field": "custom_scripts_analytics",
            "Type": "text",
            "Null": "YES",
            "Key": "",
            "Default": null,
            "Extra": ""
        },
        {
            "Field": "keyword_score",
            "Type": "float",
            "Null": "YES",
            "Key": "",
            "Default": "0",
            "Extra": ""
        },
        {
            "Field": "semantic_diversity_score",
            "Type": "float",
            "Null": "YES",
            "Key": "",
            "Default": "0",
            "Extra": ""
        },
        {
            "Field": "processed",
            "Type": "tinyint(1)",
            "Null": "YES",
            "Key": "MUL",
            "Default": "0",
            "Extra": ""
        },
        {
            "Field": "date_scraped",
            "Type": "datetime",
            "Null": "NO",
            "Key": "",
            "Default": "CURRENT_TIMESTAMP",
            "Extra": "DEFAULT_GENERATED"
        },
        {
            "Field": "updated_on",
            "Type": "timestamp",
            "Null": "YES",
            "Key": "",
            "Default": "CURRENT_TIMESTAMP",
            "Extra": "DEFAULT_GENERATED on update CURRENT_TIMESTAMP"
        },
        {
            "Field": "source_mailbox",
            "Type": "varchar(255)",
            "Null": "YES",
            "Key": "",
            "Default": null,
            "Extra": ""
        },
        {
            "Field": "source_folder",
            "Type": "varchar(255)",
            "Null": "YES",
            "Key": "",
            "Default": null,
            "Extra": ""
        },
        {
            "Field": "imap_uid",
            "Type": "bigint unsigned",
            "Null": "YES",
            "Key": "",
            "Default": null,
            "Extra": ""
        },
        {
            "Field": "message_id",
            "Type": "varchar(255)",
            "Null": "YES",
            "Key": "",
            "Default": null,
            "Extra": ""
        },
        {
            "Field": "route_category",
            "Type": "varchar(80)",
            "Null": "YES",
            "Key": "",
            "Default": null,
            "Extra": ""
        },
        {
            "Field": "ingested_at",
            "Type": "datetime",
            "Null": "YES",
            "Key": "",
            "Default": null,
            "Extra": ""
        },
        {
            "Field": "moved_to_processed_at",
            "Type": "datetime",
            "Null": "YES",
            "Key": "",
            "Default": null,
            "Extra": ""
        }
    ],
    "indexes": [
        {
            "Table": "bf_marketing_temp_scraper",
            "Non_unique": "0",
            "Key_name": "PRIMARY",
            "Seq_in_index": "1",
            "Column_name": "id",
            "Collation": "A",
            "Cardinality": "267",
            "Sub_part": null,
            "Packed": null,
            "Null": "",
            "Index_type": "BTREE",
            "Comment": "",
            "Index_comment": "",
            "Visible": "YES",
            "Expression": null
        },
        {
            "Table": "bf_marketing_temp_scraper",
            "Non_unique": "0",
            "Key_name": "email_identifier",
            "Seq_in_index": "1",
            "Column_name": "email_identifier",
            "Collation": "A",
            "Cardinality": "298",
            "Sub_part": null,
            "Packed": null,
            "Null": "YES",
            "Index_type": "BTREE",
            "Comment": "",
            "Index_comment": "",
            "Visible": "YES",
            "Expression": null
        },
        {
            "Table": "bf_marketing_temp_scraper",
            "Non_unique": "1",
            "Key_name": "idx_processed",
            "Seq_in_index": "1",
            "Column_name": "processed",
            "Collation": "A",
            "Cardinality": "1",
            "Sub_part": null,
            "Packed": null,
            "Null": "YES",
            "Index_type": "BTREE",
            "Comment": "",
            "Index_comment": "",
            "Visible": "YES",
            "Expression": null
        },
        {
            "Table": "bf_marketing_temp_scraper",
            "Non_unique": "1",
            "Key_name": "idx_marketing_temp_status",
            "Seq_in_index": "1",
            "Column_name": "status",
            "Collation": "A",
            "Cardinality": "4",
            "Sub_part": null,
            "Packed": null,
            "Null": "YES",
            "Index_type": "BTREE",
            "Comment": "",
            "Index_comment": "",
            "Visible": "YES",
            "Expression": null
        },
        {
            "Table": "bf_marketing_temp_scraper",
            "Non_unique": "1",
            "Key_name": "idx_marketing_temp_ticker",
            "Seq_in_index": "1",
            "Column_name": "ticker",
            "Collation": "A",
            "Cardinality": "1",
            "Sub_part": null,
            "Packed": null,
            "Null": "YES",
            "Index_type": "BTREE",
            "Comment": "",
            "Index_comment": "",
            "Visible": "YES",
            "Expression": null
        },
        {
            "Table": "bf_marketing_temp_scraper",
            "Non_unique": "1",
            "Key_name": "idx_marketing_temp_alert_type",
            "Seq_in_index": "1",
            "Column_name": "alert_type",
            "Collation": "A",
            "Cardinality": "3",
            "Sub_part": null,
            "Packed": null,
            "Null": "YES",
            "Index_type": "BTREE",
            "Comment": "",
            "Index_comment": "",
            "Visible": "YES",
            "Expression": null
        },
        {
            "Table": "bf_marketing_temp_scraper",
            "Non_unique": "1",
            "Key_name": "idx_marketing_temp_hash",
            "Seq_in_index": "1",
            "Column_name": "content_hash",
            "Collation": "A",
            "Cardinality": "99",
            "Sub_part": null,
            "Packed": null,
            "Null": "YES",
            "Index_type": "BTREE",
            "Comment": "",
            "Index_comment": "",
            "Visible": "YES",
            "Expression": null
        },
        {
            "Table": "bf_marketing_temp_scraper",
            "Non_unique": "1",
            "Key_name": "idx_marketing_temp_date_published",
            "Seq_in_index": "1",
            "Column_name": "date_published",
            "Collation": "A",
            "Cardinality": "72",
            "Sub_part": null,
            "Packed": null,
            "Null": "YES",
            "Index_type": "BTREE",
            "Comment": "",
            "Index_comment": "",
            "Visible": "YES",
            "Expression": null
        },
        {
            "Table": "bf_marketing_temp_scraper",
            "Non_unique": "1",
            "Key_name": "idx_bf_marketing_temp_scraper_content_hash",
            "Seq_in_index": "1",
            "Column_name": "content_hash",
            "Collation": "A",
            "Cardinality": "99",
            "Sub_part": null,
            "Packed": null,
            "Null": "YES",
            "Index_type": "BTREE",
            "Comment": "",
            "Index_comment": "",
            "Visible": "YES",
            "Expression": null
        }
    ]
}

===== TABLE: bf_marketing_generated_content =====

CodeIgniter v4.7.0 Command Line Tool - Server Time: 2026-06-09 08:36:51 UTC+00:00

{
    "table": "bf_marketing_generated_content",
    "columns": [
        {
            "Field": "id",
            "Type": "int unsigned",
            "Null": "NO",
            "Key": "PRI",
            "Default": null,
            "Extra": "auto_increment"
        },
        {
            "Field": "alert_id",
            "Type": "int unsigned",
            "Null": "YES",
            "Key": "MUL",
            "Default": null,
            "Extra": ""
        },
        {
            "Field": "campaign_id",
            "Type": "int unsigned",
            "Null": "YES",
            "Key": "MUL",
            "Default": null,
            "Extra": ""
        },
        {
            "Field": "notification_id",
            "Type": "int",
            "Null": "YES",
            "Key": "",
            "Default": null,
            "Extra": ""
        },
        {
            "Field": "source_type",
            "Type": "varchar(50)",
            "Null": "YES",
            "Key": "",
            "Default": null,
            "Extra": ""
        },
        {
            "Field": "content_type",
            "Type": "varchar(64)",
            "Null": "YES",
            "Key": "",
            "Default": null,
            "Extra": ""
        },
        {
            "Field": "source_id",
            "Type": "int unsigned",
            "Null": "YES",
            "Key": "",
            "Default": null,
            "Extra": ""
        },
        {
            "Field": "primary_category",
            "Type": "varchar(64)",
            "Null": "YES",
            "Key": "",
            "Default": null,
            "Extra": ""
        },
        {
            "Field": "secondary_tags",
            "Type": "longtext",
            "Null": "YES",
            "Key": "",
            "Default": null,
            "Extra": ""
        },
        {
            "Field": "story_id",
            "Type": "int",
            "Null": "YES",
            "Key": "MUL",
            "Default": null,
            "Extra": ""
        },
        {
            "Field": "step_id",
            "Type": "int unsigned",
            "Null": "YES",
            "Key": "MUL",
            "Default": null,
            "Extra": ""
        },
        {
            "Field": "summary_id",
            "Type": "int unsigned",
            "Null": "YES",
            "Key": "MUL",
            "Default": null,
            "Extra": ""
        },
        {
            "Field": "title",
            "Type": "varchar(255)",
            "Null": "YES",
            "Key": "",
            "Default": null,
            "Extra": ""
        },
        {
            "Field": "summary",
            "Type": "longtext",
            "Null": "YES",
            "Key": "",
            "Default": null,
            "Extra": ""
        },
        {
            "Field": "description",
            "Type": "text",
            "Null": "YES",
            "Key": "",
            "Default": null,
            "Extra": ""
        },
        {
            "Field": "post_text",
            "Type": "text",
            "Null": "YES",
            "Key": "",
            "Default": null,
            "Extra": ""
        },
        {
            "Field": "formatted_summary",
            "Type": "mediumtext",
            "Null": "YES",
            "Key": "",
            "Default": null,
            "Extra": ""
        },
        {
            "Field": "platform",
            "Type": "varchar(50)",
            "Null": "YES",
            "Key": "",
            "Default": "multi",
            "Extra": ""
        },
        {
            "Field": "score",
            "Type": "decimal(5,2)",
            "Null": "YES",
            "Key": "",
            "Default": "0.00",
            "Extra": ""
        },
        {
            "Field": "scheduled_at",
            "Type": "datetime",
            "Null": "YES",
            "Key": "",
            "Default": null,
            "Extra": ""
        },
        {
            "Field": "status",
            "Type": "enum('pending','scheduled','posted')",
            "Null": "YES",
            "Key": "",
            "Default": "pending",
            "Extra": ""
        },
        {
            "Field": "approval_status",
            "Type": "varchar(50)",
            "Null": "YES",
            "Key": "",
            "Default": "pending_review",
            "Extra": ""
        },
        {
            "Field": "distribution_status",
            "Type": "varchar(50)",
            "Null": "YES",
            "Key": "",
            "Default": "pending",
            "Extra": ""
        },
        {
            "Field": "version",
            "Type": "int",
            "Null": "YES",
            "Key": "",
            "Default": "1",
            "Extra": ""
        },
        {
            "Field": "content_hash",
            "Type": "varchar(64)",
            "Null": "YES",
            "Key": "",
            "Default": null,
            "Extra": ""
        },
        {
            "Field": "created_at",
            "Type": "datetime",
            "Null": "NO",
            "Key": "",
            "Default": "CURRENT_TIMESTAMP",
            "Extra": "DEFAULT_GENERATED"
        },
        {
            "Field": "updated_at",
            "Type": "datetime",
            "Null": "YES",
            "Key": "",
            "Default": "CURRENT_TIMESTAMP",
            "Extra": "DEFAULT_GENERATED on update CURRENT_TIMESTAMP"
        },
        {
            "Field": "shared_discord",
            "Type": "datetime",
            "Null": "YES",
            "Key": "",
            "Default": null,
            "Extra": ""
        },
        {
            "Field": "shared_linkedin",
            "Type": "datetime",
            "Null": "YES",
            "Key": "",
            "Default": null,
            "Extra": ""
        },
        {
            "Field": "shared_x",
            "Type": "datetime",
            "Null": "YES",
            "Key": "",
            "Default": null,
            "Extra": ""
        },
        {
            "Field": "shared_email",
            "Type": "datetime",
            "Null": "YES",
            "Key": "",
            "Default": null,
            "Extra": ""
        },
        {
            "Field": "engagement_score",
            "Type": "float",
            "Null": "YES",
            "Key": "",
            "Default": "0",
            "Extra": ""
        },
        {
            "Field": "clicks_estimated",
            "Type": "int",
            "Null": "YES",
            "Key": "",
            "Default": "0",
            "Extra": ""
        },
        {
            "Field": "voice_script",
            "Type": "text",
            "Null": "YES",
            "Key": "",
            "Default": null,
            "Extra": ""
        },
        {
            "Field": "facebook_message",
            "Type": "text",
            "Null": "YES",
            "Key": "",
            "Default": null,
            "Extra": ""
        },
        {
            "Field": "linkedin_message",
            "Type": "text",
            "Null": "YES",
            "Key": "",
            "Default": null,
            "Extra": ""
        },
        {
            "Field": "discord_message",
            "Type": "text",
            "Null": "YES",
            "Key": "",
            "Default": null,
            "Extra": ""
        },
        {
            "Field": "stocktwits_message",
            "Type": "text",
            "Null": "YES",
            "Key": "",
            "Default": null,
            "Extra": ""
        },
        {
            "Field": "tiktok_message",
            "Type": "text",
            "Null": "YES",
            "Key": "",
            "Default": null,
            "Extra": ""
        },
        {
            "Field": "youtube_message",
            "Type": "text",
            "Null": "YES",
            "Key": "",
            "Default": null,
            "Extra": ""
        },
        {
            "Field": "email_message",
            "Type": "text",
            "Null": "YES",
            "Key": "",
            "Default": null,
            "Extra": ""
        },
        {
            "Field": "hashtags",
            "Type": "text",
            "Null": "YES",
            "Key": "",
            "Default": null,
            "Extra": ""
        },
        {
            "Field": "promotional_links",
            "Type": "json",
            "Null": "YES",
            "Key": "",
            "Default": null,
            "Extra": ""
        },
        {
            "Field": "keywords",
            "Type": "text",
            "Null": "YES",
            "Key": "",
            "Default": null,
            "Extra": ""
        },
        {
            "Field": "content_json",
            "Type": "longtext",
            "Null": "YES",
            "Key": "",
            "Default": null,
            "Extra": ""
        },
        {
            "Field": "last_enriched_at",
            "Type": "datetime",
            "Null": "YES",
            "Key": "",
            "Default": null,
            "Extra": ""
        }
    ],
    "indexes": [
        {
            "Table": "bf_marketing_generated_content",
            "Non_unique": "0",
            "Key_name": "PRIMARY",
            "Seq_in_index": "1",
            "Column_name": "id",
            "Collation": "A",
            "Cardinality": "158",
            "Sub_part": null,
            "Packed": null,
            "Null": "",
            "Index_type": "BTREE",
            "Comment": "",
            "Index_comment": "",
            "Visible": "YES",
            "Expression": null
        },
        {
            "Table": "bf_marketing_generated_content",
            "Non_unique": "1",
            "Key_name": "idx_summary_id",
            "Seq_in_index": "1",
            "Column_name": "summary_id",
            "Collation": "A",
            "Cardinality": "8",
            "Sub_part": null,
            "Packed": null,
            "Null": "YES",
            "Index_type": "BTREE",
            "Comment": "",
            "Index_comment": "",
            "Visible": "YES",
            "Expression": null
        },
        {
            "Table": "bf_marketing_generated_content",
            "Non_unique": "1",
            "Key_name": "idx_campaign_id",
            "Seq_in_index": "1",
            "Column_name": "campaign_id",
            "Collation": "A",
            "Cardinality": "11",
            "Sub_part": null,
            "Packed": null,
            "Null": "YES",
            "Index_type": "BTREE",
            "Comment": "",
            "Index_comment": "",
            "Visible": "YES",
            "Expression": null
        },
        {
            "Table": "bf_marketing_generated_content",
            "Non_unique": "1",
            "Key_name": "idx_step_id",
            "Seq_in_index": "1",
            "Column_name": "step_id",
            "Collation": "A",
            "Cardinality": "3",
            "Sub_part": null,
            "Packed": null,
            "Null": "YES",
            "Index_type": "BTREE",
            "Comment": "",
            "Index_comment": "",
            "Visible": "YES",
            "Expression": null
        },
        {
            "Table": "bf_marketing_generated_content",
            "Non_unique": "1",
            "Key_name": "idx_alert_id",
            "Seq_in_index": "1",
            "Column_name": "alert_id",
            "Collation": "A",
            "Cardinality": "3",
            "Sub_part": null,
            "Packed": null,
            "Null": "YES",
            "Index_type": "BTREE",
            "Comment": "",
            "Index_comment": "",
            "Visible": "YES",
            "Expression": null
        },
        {
            "Table": "bf_marketing_generated_content",
            "Non_unique": "1",
            "Key_name": "idx_bf_marketing_generated_content_story_id",
            "Seq_in_index": "1",
            "Column_name": "story_id",
            "Collation": "A",
            "Cardinality": "143",
            "Sub_part": null,
            "Packed": null,
            "Null": "YES",
            "Index_type": "BTREE",
            "Comment": "",
            "Index_comment": "",
            "Visible": "YES",
            "Expression": null
        }
    ]
}

===== TABLE: bf_marketing_distribution_targets =====

CodeIgniter v4.7.0 Command Line Tool - Server Time: 2026-06-09 08:36:51 UTC+00:00

{
    "table": "bf_marketing_distribution_targets",
    "columns": [
        {
            "Field": "id",
            "Type": "int unsigned",
            "Null": "NO",
            "Key": "PRI",
            "Default": null,
            "Extra": "auto_increment"
        },
        {
            "Field": "generated_content_id",
            "Type": "int unsigned",
            "Null": "NO",
            "Key": "MUL",
            "Default": null,
            "Extra": ""
        },
        {
            "Field": "story_id",
            "Type": "int unsigned",
            "Null": "YES",
            "Key": "",
            "Default": null,
            "Extra": ""
        },
        {
            "Field": "channel",
            "Type": "varchar(60)",
            "Null": "NO",
            "Key": "",
            "Default": null,
            "Extra": ""
        },
        {
            "Field": "destination",
            "Type": "varchar(60)",
            "Null": "NO",
            "Key": "",
            "Default": null,
            "Extra": ""
        },
        {
            "Field": "idempotency_key",
            "Type": "varchar(64)",
            "Null": "YES",
            "Key": "UNI",
            "Default": null,
            "Extra": ""
        },
        {
            "Field": "payload_json",
            "Type": "longtext",
            "Null": "YES",
            "Key": "",
            "Default": null,
            "Extra": ""
        },
        {
            "Field": "status",
            "Type": "varchar(32)",
            "Null": "NO",
            "Key": "MUL",
            "Default": "pending",
            "Extra": ""
        },
        {
            "Field": "queued_at",
            "Type": "datetime",
            "Null": "YES",
            "Key": "",
            "Default": null,
            "Extra": ""
        },
        {
            "Field": "next_retry_at",
            "Type": "datetime",
            "Null": "YES",
            "Key": "",
            "Default": null,
            "Extra": ""
        },
        {
            "Field": "last_attempt_at",
            "Type": "datetime",
            "Null": "YES",
            "Key": "",
            "Default": null,
            "Extra": ""
        },
        {
            "Field": "sent_at",
            "Type": "datetime",
            "Null": "YES",
            "Key": "",
            "Default": null,
            "Extra": ""
        },
        {
            "Field": "failed_at",
            "Type": "datetime",
            "Null": "YES",
            "Key": "",
            "Default": null,
            "Extra": ""
        },
        {
            "Field": "response_json",
            "Type": "longtext",
            "Null": "YES",
            "Key": "",
            "Default": null,
            "Extra": ""
        },
        {
            "Field": "external_id",
            "Type": "varchar(255)",
            "Null": "YES",
            "Key": "",
            "Default": null,
            "Extra": ""
        },
        {
            "Field": "external_uri",
            "Type": "varchar(512)",
            "Null": "YES",
            "Key": "",
            "Default": null,
            "Extra": ""
        },
        {
            "Field": "error_message",
            "Type": "longtext",
            "Null": "YES",
            "Key": "",
            "Default": null,
            "Extra": ""
        },
        {
            "Field": "http_status",
            "Type": "int",
            "Null": "YES",
            "Key": "",
            "Default": null,
            "Extra": ""
        },
        {
            "Field": "failure_class",
            "Type": "varchar(80)",
            "Null": "YES",
            "Key": "",
            "Default": null,
            "Extra": ""
        },
        {
            "Field": "response_excerpt",
            "Type": "text",
            "Null": "YES",
            "Key": "",
            "Default": null,
            "Extra": ""
        },
        {
            "Field": "response_headers",
            "Type": "longtext",
            "Null": "YES",
            "Key": "",
            "Default": null,
            "Extra": ""
        },
        {
            "Field": "response_body",
            "Type": "longtext",
            "Null": "YES",
            "Key": "",
            "Default": null,
            "Extra": ""
        },
        {
            "Field": "retry_count",
            "Type": "int",
            "Null": "NO",
            "Key": "",
            "Default": "0",
            "Extra": ""
        },
        {
            "Field": "attempt_count",
            "Type": "int",
            "Null": "YES",
            "Key": "",
            "Default": "0",
            "Extra": ""
        },
        {
            "Field": "max_attempts",
            "Type": "int",
            "Null": "YES",
            "Key": "",
            "Default": "3",
            "Extra": ""
        },
        {
            "Field": "created_on",
            "Type": "datetime",
            "Null": "YES",
            "Key": "",
            "Default": null,
            "Extra": ""
        },
        {
            "Field": "modified_on",
            "Type": "datetime",
            "Null": "YES",
            "Key": "",
            "Default": null,
            "Extra": ""
        }
    ],
    "indexes": [
        {
            "Table": "bf_marketing_distribution_targets",
            "Non_unique": "0",
            "Key_name": "PRIMARY",
            "Seq_in_index": "1",
            "Column_name": "id",
            "Collation": "A",
            "Cardinality": "40",
            "Sub_part": null,
            "Packed": null,
            "Null": "",
            "Index_type": "BTREE",
            "Comment": "",
            "Index_comment": "",
            "Visible": "YES",
            "Expression": null
        },
        {
            "Table": "bf_marketing_distribution_targets",
            "Non_unique": "0",
            "Key_name": "uniq_distribution_target",
            "Seq_in_index": "1",
            "Column_name": "generated_content_id",
            "Collation": "A",
            "Cardinality": "10",
            "Sub_part": null,
            "Packed": null,
            "Null": "",
            "Index_type": "BTREE",
            "Comment": "",
            "Index_comment": "",
            "Visible": "YES",
            "Expression": null
        },
        {
            "Table": "bf_marketing_distribution_targets",
            "Non_unique": "0",
            "Key_name": "uniq_distribution_target",
            "Seq_in_index": "2",
            "Column_name": "channel",
            "Collation": "A",
            "Cardinality": "20",
            "Sub_part": null,
            "Packed": null,
            "Null": "",
            "Index_type": "BTREE",
            "Comment": "",
            "Index_comment": "",
            "Visible": "YES",
            "Expression": null
        },
        {
            "Table": "bf_marketing_distribution_targets",
            "Non_unique": "0",
            "Key_name": "uniq_distribution_target",
            "Seq_in_index": "3",
            "Column_name": "destination",
            "Collation": "A",
            "Cardinality": "40",
            "Sub_part": null,
            "Packed": null,
            "Null": "",
            "Index_type": "BTREE",
            "Comment": "",
            "Index_comment": "",
            "Visible": "YES",
            "Expression": null
        },
        {
            "Table": "bf_marketing_distribution_targets",
            "Non_unique": "0",
            "Key_name": "uniq_marketing_distribution_idempotency",
            "Seq_in_index": "1",
            "Column_name": "idempotency_key",
            "Collation": "A",
            "Cardinality": "40",
            "Sub_part": null,
            "Packed": null,
            "Null": "YES",
            "Index_type": "BTREE",
            "Comment": "",
            "Index_comment": "",
            "Visible": "YES",
            "Expression": null
        },
        {
            "Table": "bf_marketing_distribution_targets",
            "Non_unique": "1",
            "Key_name": "generated_content_id",
            "Seq_in_index": "1",
            "Column_name": "generated_content_id",
            "Collation": "A",
            "Cardinality": "10",
            "Sub_part": null,
            "Packed": null,
            "Null": "",
            "Index_type": "BTREE",
            "Comment": "",
            "Index_comment": "",
            "Visible": "YES",
            "Expression": null
        },
        {
            "Table": "bf_marketing_distribution_targets",
            "Non_unique": "1",
            "Key_name": "status",
            "Seq_in_index": "1",
            "Column_name": "status",
            "Collation": "A",
            "Cardinality": "3",
            "Sub_part": null,
            "Packed": null,
            "Null": "",
            "Index_type": "BTREE",
            "Comment": "",
            "Index_comment": "",
            "Visible": "YES",
            "Expression": null
        },
        {
            "Table": "bf_marketing_distribution_targets",
            "Non_unique": "1",
            "Key_name": "idx_marketing_distribution_status_retry",
            "Seq_in_index": "1",
            "Column_name": "status",
            "Collation": "A",
            "Cardinality": "3",
            "Sub_part": null,
            "Packed": null,
            "Null": "",
            "Index_type": "BTREE",
            "Comment": "",
            "Index_comment": "",
            "Visible": "YES",
            "Expression": null
        },
        {
            "Table": "bf_marketing_distribution_targets",
            "Non_unique": "1",
            "Key_name": "idx_marketing_distribution_status_retry",
            "Seq_in_index": "2",
            "Column_name": "next_retry_at",
            "Collation": "A",
            "Cardinality": "3",
            "Sub_part": null,
            "Packed": null,
            "Null": "YES",
            "Index_type": "BTREE",
            "Comment": "",
            "Index_comment": "",
            "Visible": "YES",
            "Expression": null
        }
    ]
}

===== TABLE: bf_marketing_publish_queue =====

CodeIgniter v4.7.0 Command Line Tool - Server Time: 2026-06-09 08:36:51 UTC+00:00

{
    "table": "bf_marketing_publish_queue",
    "columns": [
        {
            "Field": "id",
            "Type": "bigint unsigned",
            "Null": "NO",
            "Key": "PRI",
            "Default": null,
            "Extra": "auto_increment"
        },
        {
            "Field": "video_content_id",
            "Type": "bigint unsigned",
            "Null": "NO",
            "Key": "MUL",
            "Default": null,
            "Extra": ""
        },
        {
            "Field": "platform",
            "Type": "varchar(32)",
            "Null": "NO",
            "Key": "",
            "Default": null,
            "Extra": ""
        },
        {
            "Field": "payload_json",
            "Type": "longtext",
            "Null": "YES",
            "Key": "",
            "Default": null,
            "Extra": ""
        },
        {
            "Field": "scheduled_for",
            "Type": "datetime",
            "Null": "YES",
            "Key": "",
            "Default": null,
            "Extra": ""
        },
        {
            "Field": "status",
            "Type": "varchar(32)",
            "Null": "NO",
            "Key": "",
            "Default": "queued",
            "Extra": ""
        },
        {
            "Field": "error",
            "Type": "text",
            "Null": "YES",
            "Key": "",
            "Default": null,
            "Extra": ""
        },
        {
            "Field": "created_at",
            "Type": "datetime",
            "Null": "YES",
            "Key": "",
            "Default": null,
            "Extra": ""
        },
        {
            "Field": "updated_at",
            "Type": "datetime",
            "Null": "YES",
            "Key": "",
            "Default": null,
            "Extra": ""
        }
    ],
    "indexes": [
        {
            "Table": "bf_marketing_publish_queue",
            "Non_unique": "0",
            "Key_name": "PRIMARY",
            "Seq_in_index": "1",
            "Column_name": "id",
            "Collation": "A",
            "Cardinality": "0",
            "Sub_part": null,
            "Packed": null,
            "Null": "",
            "Index_type": "BTREE",
            "Comment": "",
            "Index_comment": "",
            "Visible": "YES",
            "Expression": null
        },
        {
            "Table": "bf_marketing_publish_queue",
            "Non_unique": "1",
            "Key_name": "video_content_id_status",
            "Seq_in_index": "1",
            "Column_name": "video_content_id",
            "Collation": "A",
            "Cardinality": "0",
            "Sub_part": null,
            "Packed": null,
            "Null": "",
            "Index_type": "BTREE",
            "Comment": "",
            "Index_comment": "",
            "Visible": "YES",
            "Expression": null
        },
        {
            "Table": "bf_marketing_publish_queue",
            "Non_unique": "1",
            "Key_name": "video_content_id_status",
            "Seq_in_index": "2",
            "Column_name": "status",
            "Collation": "A",
            "Cardinality": "0",
            "Sub_part": null,
            "Packed": null,
            "Null": "",
            "Index_type": "BTREE",
            "Comment": "",
            "Index_comment": "",
            "Visible": "YES",
            "Expression": null
        }
    ]
}

```

## Model Checks

```text
===== MODEL: AlertsModel =====

CodeIgniter v4.7.0 Command Line Tool - Server Time: 2026-06-09 08:36:51 UTC+00:00

{
    "model": "App\\Models\\AlertsModel",
    "table": "bf_investment_trade_alerts",
    "primary_key": "id",
    "primary_key_exists": true,
    "missing_columns": [
        "symbol",
        "name",
        "currency",
        "mic_code",
        "country",
        "url",
        "content",
        "email_identifier",
        "email_date",
        "email_sender",
        "email_subject",
        "email_body",
        "source_email",
        "email_type",
        "news_vendor",
        "symbols",
        "links",
        "images",
        "videos",
        "metadata",
        "structured_data",
        "additional_html_elements",
        "page_performance_data",
        "network_requests",
        "user_interaction_points",
        "accessibility_information",
        "page_relationships",
        "seo_elements",
        "social_media_links",
        "comments_user_generated_content",
        "contact_information",
        "legal_information",
        "breadcrumbs",
        "date_time",
        "author_information",
        "ratings_reviews",
        "price_information",
        "location_data",
        "language_locale",
        "mobile_responsiveness",
        "security_information",
        "technology_stack",
        "server_information",
        "caching_information",
        "content_type",
        "character_set",
        "rss_atom_feeds",
        "pagination",
        "custom_data",
        "error_handling",
        "historical_changes",
        "user_reviews_ratings",
        "inventory_levels",
        "shipping_information",
        "bots_crawlers_information",
        "affiliate_links",
        "advertisements",
        "cookie_notices",
        "popups_modals",
        "browser_specific_data",
        "geolocation_specific_content",
        "ab_testing_variations",
        "user_agent_specific_content",
        "screen_size_specific_content",
        "device_specific_content",
        "browser_extension_data",
        "custom_scripts_analytics",
        "order_status"
    ],
    "extra_columns": [
        "id",
        "date",
        "time",
        "tag",
        "class",
        "segment",
        "market_session",
        "free",
        "basic",
        "premium",
        "gold",
        "direction",
        "market_data_status",
        "high52",
        "low52",
        "volume_actual",
        "ema5",
        "ema8",
        "ema13",
        "ema34",
        "ema48",
        "off_high",
        "off_high52",
        "off_low",
        "off_low52",
        "latest_trading_day",
        "previous_close",
        "change",
        "change_percent",
        "link",
        "differential",
        "potential_gain",
        "stop_loss_percent",
        "stop_loss_differential",
        "support",
        "price_high",
        "percent_change",
        "trailing_stop_target",
        "updated_stop_loss_differential",
        "updated_stop_loss",
        "closing_date",
        "closing_time",
        "details",
        "updated_details",
        "closing_details",
        "video_link",
        "send_msg",
        "expdate",
        "option_type",
        "expiration",
        "option_price",
        "strike",
        "chart_image",
        "watchlist",
        "tv_title",
        "tv_description",
        "trade_chart_link",
        "ema_3_8",
        "ema_8_13",
        "ema_13_34",
        "ema_34_48",
        "ema_consensus",
        "ema_3",
        "ema_8",
        "ema_13",
        "sma_50",
        "sma_200",
        "macd",
        "rsi",
        "modified_on"
    ],
    "type_mismatch": []
}

===== MODEL: AlertJobModel =====

CodeIgniter v4.7.0 Command Line Tool - Server Time: 2026-06-09 08:36:51 UTC+00:00

[Error]
Call to a member function getResultArray() on bool
at APPPATH/Services/AIOps/SchemaInspectorService.php:56

Backtrace:
  1    APPPATH/Services/AIOps/SchemaInspectorService.php:31
       App\Services\AIOps\SchemaInspectorService()->inspectSchema('bf_investment_alert_jobs')

  2    APPPATH/Commands/AIOps/SqlCheck.php:62
       App\Services\AIOps\SchemaInspectorService()->getTableSchema('bf_investment_alert_jobs')

  3    APPPATH/Commands/AIOps/SqlCheck.php:36
       App\Commands\AIOps\SqlCheck()->validateModel('AlertJobModel')

  4    SYSTEMPATH/CLI/Commands.php:74
       App\Commands\AIOps\SqlCheck()->run([...])

  5    SYSTEMPATH/CLI/Console.php:47
       CodeIgniter\CLI\Commands()->run('aiops:sql:check', [...])

  6    SYSTEMPATH/Boot.php:442
       CodeIgniter\CLI\Console()->run()

  7    SYSTEMPATH/Boot.php:166
       CodeIgniter\Boot::runCommand(Object(CodeIgniter\CLI\Console))

  8    ROOTPATH/spark:107
       CodeIgniter\Boot::bootSpark(Object(Config\Paths))


===== MODEL: TradeAlertScannerMetaModel =====

CodeIgniter v4.7.0 Command Line Tool - Server Time: 2026-06-09 08:36:52 UTC+00:00

{
    "model": "App\\Models\\TradeAlertScannerMetaModel",
    "table": "bf_trade_alert_scanner_meta",
    "primary_key": "id",
    "primary_key_exists": true,
    "missing_columns": [],
    "extra_columns": [
        "id"
    ],
    "type_mismatch": []
}

===== MODEL: MarketingModel =====

CodeIgniter v4.7.0 Command Line Tool - Server Time: 2026-06-09 08:36:52 UTC+00:00

{
    "model": "App\\Models\\MarketingModel",
    "table": "bf_marketing_scraper",
    "primary_key": "id",
    "primary_key_exists": true,
    "missing_columns": [
        "description",
        "source_type",
        "symbols_json",
        "is_macro",
        "used_in_storyboard",
        "day",
        "time",
        "activity",
        "link",
        "sched_id",
        "escalated",
        "audience_type",
        "stage",
        "name",
        "assigned_on",
        "assigned_to",
        "completed_on",
        "scheduled_at",
        "primary_content",
        "secondary_content",
        "html_content",
        "voice_script",
        "shared",
        "shared_users",
        "blog",
        "in_app",
        "email",
        "discord",
        "facebook",
        "linkedin",
        "telegram",
        "twitter",
        "website",
        "promotional_links",
        "facebook_message",
        "linkedin_message",
        "discord_message",
        "stocktwits_message",
        "tiktok_message",
        "youtube_message",
        "email_message",
        "additional_info",
        "image_paths"
    ],
    "extra_columns": [
        "id",
        "story_hash",
        "story_title",
        "story_type",
        "ticker",
        "company_name",
        "source_ids",
        "source_count",
        "latest_source_at",
        "timeline_json",
        "story_status",
        "generated_payload",
        "formatted_summary",
        "blog_content",
        "cta",
        "voiceover_url",
        "additional_html_elements",
        "page_performance_data",
        "network_requests",
        "user_interaction_points",
        "accessibility_information",
        "page_relationships",
        "seo_elements",
        "social_media_links",
        "comments_user_generated_content",
        "contact_information",
        "legal_information",
        "breadcrumbs",
        "date_time",
        "author_information",
        "ratings_reviews",
        "price_information",
        "location_data",
        "language_locale",
        "mobile_responsiveness",
        "security_information",
        "technology_stack",
        "server_information",
        "caching_information",
        "content_type",
        "trade_alert_subcategory",
        "character_set",
        "rss_atom_feeds",
        "pagination",
        "custom_data",
        "error_handling",
        "historical_changes",
        "user_reviews_ratings",
        "inventory_levels",
        "shipping_information",
        "bots_crawlers_information",
        "affiliate_links",
        "advertisements",
        "cookie_notices",
        "popups_modals",
        "browser_specific_data",
        "geolocation_specific_content",
        "ab_testing_variations",
        "user_agent_specific_content",
        "screen_size_specific_content",
        "device_specific_content",
        "browser_extension_data",
        "custom_scripts_analytics",
        "include_newsletter",
        "feature_score",
        "keyword_score",
        "created_at",
        "grouped",
        "date_created",
        "generated_from_force",
        "processed"
    ],
    "type_mismatch": []
}

===== MODEL: MarketingDistributionTargetModel =====

CodeIgniter v4.7.0 Command Line Tool - Server Time: 2026-06-09 08:36:52 UTC+00:00

{
    "model": "App\\Models\\MarketingDistributionTargetModel",
    "table": "bf_marketing_distribution_targets",
    "primary_key": "id",
    "primary_key_exists": true,
    "missing_columns": [
        "locked_at",
        "locked_by"
    ],
    "extra_columns": [
        "id"
    ],
    "type_mismatch": []
}

===== MODEL: MarketingNewsletterModel =====

CodeIgniter v4.7.0 Command Line Tool - Server Time: 2026-06-09 08:36:52 UTC+00:00

{
    "model": "App\\Models\\MarketingNewsletterModel",
    "table": "bf_marketing_newsletters",
    "primary_key": "id",
    "primary_key_exists": true,
    "missing_columns": [
        "slug",
        "subject",
        "body_html"
    ],
    "extra_columns": [
        "id",
        "content",
        "scheduled_date",
        "sent_date",
        "target_audience",
        "created_by",
        "campaign_id",
        "priority",
        "attachments",
        "preview_link",
        "notes"
    ],
    "type_mismatch": []
}

```

## Alert Health

```text

CodeIgniter v4.7.0 Command Line Tool - Server Time: 2026-06-09 08:36:53 UTC+00:00

Failed queue count: 0
Health check passed.
```

## Migration Status

```text
| App                  | 2006-04-18-000001 | CreateFinancialNewsTable                            | default | 2026-04-18 17:35:48 | 22    |
| App                  | 2025-09-09-000040 | CreatePredictionsTrades                             | default | 2026-02-01 14:29:40 | 4     |
| App                  | 2026-01-17-000001 | CreateInvestmentSignalsTables                       | default | 2026-02-01 18:04:02 | 5     |
| App                  | 2026-03-10-000100 | CreateInvestmentForecastingTables                   | default | 2026-02-07 21:35:44 | 7     |
| App                  | 2026-03-10-000200 | CreateInvestmentForecastAccuracyTable               | default | 2026-02-07 21:35:44 | 7     |
| App                  | 2026-03-12-000100 | CreateInvestmentForecastAccuracy                    | default | 2026-02-07 21:35:44 | 7     |
| App                  | 2026-03-19-000100 | CreateMarketingVideoStudioTables                    | default | 2026-03-31 12:42:06 | 11    |
| App                  | 2026-03-20-000110 | CreateScannerTaxonomy                               | default | 2026-02-07 21:35:44 | 7     |
| App                  | 2026-03-20-000120 | CreateTradeAlertScannerMeta                         | default | 2026-02-07 21:35:44 | 7     |
| App                  | 2026-03-21-000100 | EnsureInvestmentScraperEmailDedupe                  | default | 2026-03-31 12:42:07 | 11    |
| App                  | 2026-03-30-000400 | AddTickerToProjects                                 | default | 2026-04-01 00:21:49 | 12    |
| App                  | 2026-04-01-000001 | CreateScannerTables                                 | default | 2026-02-23 00:27:05 | 9     |
| App                  | 2026-04-01-000200 | EnsureInvestmentScraperRawEmailColumns              | default | 2026-04-09 10:44:15 | 13    |
| App                  | 2026-04-05-000100 | CreateMarketingNotificationPipelineTables           | default | 2026-04-09 10:53:47 | 14    |
| App                  | 2026-04-09-120000 | EnhanceMarketingGenerationPipeline                  | default | 2026-04-09 10:55:40 | 15    |
| App                  | 2026-04-09-130000 | HardenMarketingNewsPipelineSchema                   | default | 2026-04-11 18:23:44 | 17    |
| App                  | 2026-04-12-120050 | CreateMarketingDistributionTargets                  | default | 2026-04-14 01:31:39 | 19    |
| App                  | 2026-04-12-221500 | AddExternalFieldsToMarketingDistributionTargets     | default | 2026-04-14 11:26:24 | 21    |
| App                  | 2026-04-13-090000 | AddDiscordCategoryFieldsToMarketingGeneratedContent | default | 2026-04-14 11:26:24 | 21    |
| App                  | 2026-04-13-120000 | CreateDiscordOpsTables                              | default | 2026-04-14 11:26:24 | 21    |
| App                  | 2026-04-14-120000 | RenameDiscordManualMessageRecipientFields           | default | 2026-04-14 11:26:24 | 21    |
| App                  | 2026-04-19-000001 | CreateMarketingPageSeoTable                         | default | 2026-05-14 02:08:34 | 23    |
| App                  | 2026-04-23-090000 | HardenMarketingDistributionTargetsForReliability    | default | 2026-05-14 02:08:34 | 23    |
| App                  | 2026-06-15-000100 | AddScannerSourceToTradeAlerts                       | default | 2026-03-08 14:32:48 | 10    |
```

## GTM Command Discovery

```text
  aiops:alerts-clean                          Delete completed aiops alert queue rows older
  aiops:api:schema                            Validate API endpoints return JSON (optionally
  aiops:alerts-check                          Fetch emails and queue them for processing
  aiops:alerts-health                         Run health checks on aiops alert queue and notify
  aiops:alerts-worker                         Process queued alert emails
  aiops:sql:check                             Validate model/table/query SQL compatibility
  aiops:email-scan                            Scan alerts mailbox for new emails and record
  alerts:fetch-raw-emails                     Fetch raw trade alert emails into
  marketing:distribution:assert-sql           Runs SQL-level anomaly assertions for marketing
  marketing:distribution:failure-inject-test  Dev-safe failure injection checks for
  marketing:news:debug                        Diagnose marketing IMAP connectivity, folder
  marketing:news:generate                     Generates clustered story records from pending
  marketing:news:imap-test                    Smoke test for marketing/news IMAP connectivity.
  marketing:news:scrape                       Ingests alert/news emails (or OCR/raw text) into
  marketing:news:seed-test                    Insert synthetic rows into
  marketing:promotions:audit                  Audit promotion source data and campaign
  marketing:promotions:generate               Generate promotion campaign rows from finalized
  marketing:promotions:test                   Run a chained smoke test for promotions audit and
  marketing:regression:smoke                  Runs full marketing pipeline smoke checks and
  news:audit                                  Audit recent marketing news ingestion,
  research:intelligence:signals               Generate trade-signal intelligence from research
  research:news:collect                       
  scanning:run                                Run MyMI liquidity + momentum scanner
```

## SQLCheck Patch Diff

```diff
diff --git a/app/Commands/AIOps/SqlCheck.php b/app/Commands/AIOps/SqlCheck.php
index 1cc7a5af8..d17bc3826 100644
--- a/app/Commands/AIOps/SqlCheck.php
+++ b/app/Commands/AIOps/SqlCheck.php
@@ -136,4 +136,46 @@ class SqlCheck extends SafeBaseCommand
             'error_message' => $error,
         ]);
     }
+    /**
+     * CI4.7 compatibility helper.
+     *
+     * Older AIOps commands used $this->opt(). CI4 BaseCommand does not
+     * provide that helper, so this command keeps the behavior local and
+     * delegates to the supported CLI option reader.
+     *
+     * @param string $name
+     * @param mixed $default
+     * @return mixed
+     */
+    private function opt(string $name, $default = null)
+    {
+        $value = \CodeIgniter\CLI\CLI::getOption($name);
+
+        if ($value !== null) {
+            return $value;
+        }
+
+        $value = \CodeIgniter\CLI\CLI::getOption('--' . $name);
+
+        if ($value !== null) {
+            return $value;
+        }
+
+        $argv = $_SERVER['argv'] ?? [];
+        $flag = '--' . $name;
+
+        foreach ($argv as $i => $arg) {
+            if ($arg === $flag && array_key_exists($i + 1, $argv)) {
+                return $argv[$i + 1];
+            }
+
+            if (strpos($arg, $flag . '=') === 0) {
+                return substr($arg, strlen($flag) + 1);
+            }
+        }
+
+        return $default;
+    }
+
+
 }
```

## JSON Summary

```json
{
  "phase": "02E-B",
  "name": "Clean Repaired SQLCheck Schema Verification",
  "generated_utc": "2026-06-09T08:36:53.753918+00:00",
  "branch": "fix/mymi-alert-aiops-sqlcheck-ci47",
  "commit": "a271c0ae0 Register TBI CoinVault smoke command (#518)",
  "git_status_short": "M app/Commands/AIOps/SqlCheck.php\n?? docs/01_Systematic_Standup/\n?? docs/_aiops/mymi_alerts/",
  "php_lint_sqlcheck": "No syntax errors detected in app/Commands/AIOps/SqlCheck.php",
  "sqlcheck_option_parsing_works": true,
  "alerts_health_passed": true,
  "has_alert_fetch_command": true,
  "has_aiops_alerts_worker": true,
  "has_marketing_news_commands": true,
  "has_marketing_promotions_commands": true,
  "migrate_status_mentions_alert_system": true,
  "present_or_inspected_tables": [
    "bf_investment_scraper",
    "bf_investment_trade_alerts",
    "bf_investment_tickers",
    "bf_investment_alert_history",
    "bf_trade_alert_scanner_meta",
    "bf_aiops_alert_jobs",
    "bf_marketing_temp_scraper",
    "bf_marketing_generated_content",
    "bf_marketing_distribution_targets",
    "bf_marketing_publish_queue"
  ],
  "missing_or_failed_tables": [],
  "report_md": "docs/_aiops/mymi_alerts/PHASE_02E_B_CLEAN_REPAIRED_SQLCHECK_SCHEMA_VERIFICATION.md",
  "code_changes_made": true,
  "next_recommended_phase": "If required alert tables inspect cleanly, create formal GTM smoke command. If required tables fail, create targeted schema migration or table-name compatibility patch."
}```
