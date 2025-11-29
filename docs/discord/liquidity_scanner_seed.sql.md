-- Liquidity scanner Discord template
INSERT INTO `bf_discord_templates` (
    `template_key`,
    `content`,
    `embed_json`,
    `is_enabled`,
    `created_at`,
    `updated_at`
) VALUES (
    'scanner.liquidity.basic',
    CONCAT(
        '**Liquidity Scan Alert**\n',
        'Scanner: {{scanner}}\n',
        'Ticker: **{{ticker}}**\n',
        'Timeframe: {{timeframe}}\n',
        'Price: ${{price}}\n',
        '{{#notes}}Notes: {{notes}}{{/notes}}'
    ),
    JSON_OBJECT(
        'title', 'Liquidity Scan: {{ticker}}',
        'description', 'Scanner: {{scanner}} on {{timeframe}} at ${{price}}',
        'footer', JSON_OBJECT(
            'text', 'MyMI Liquidity Scanner • {{triggered_at}}'
        )
    ),
    1,
    NOW(),
    NOW()
)
ON DUPLICATE KEY UPDATE
    `content`    = VALUES(`content`),
    `embed_json` = VALUES(`embed_json`),
    `is_enabled` = VALUES(`is_enabled`),
    `updated_at` = VALUES(`updated_at`);

-- Liquidity scanner event subscription
INSERT INTO `bf_discord_subscriptions` (
    `event_key`,
    `channel_key`,
    `template_key`,
    `filters_json`,
    `digest_window_sec`,
    `max_per_window`,
    `priority`,
    `quiet_bypass`,
    `is_enabled`,
    `created_at`,
    `updated_at`
) VALUES (
    'scanner.liquidity',
    'alerts.liquidity',
    'scanner.liquidity.basic',
    NULL,
    0,
    0,
    7,
    0,
    1,
    NOW(),
    NOW()
)
ON DUPLICATE KEY UPDATE
    `template_key`      = VALUES(`template_key`),
    `filters_json`      = VALUES(`filters_json`),
    `digest_window_sec` = VALUES(`digest_window_sec`),
    `max_per_window`    = VALUES(`max_per_window`),
    `priority`          = VALUES(`priority`),
    `quiet_bypass`      = VALUES(`quiet_bypass`),
    `is_enabled`        = VALUES(`is_enabled`),
    `updated_at`        = VALUES(`updated_at`);
