-- Example digest template for news bursts (edit content to your tone)
INSERT IGNORE INTO bf_discord_templates (template_key, title, content)
VALUES
('digest.market_news.15m',
 'Market News (last 15m)',
 "**Top {{count}} stories ({{window}})**\n{{#items}}• {{headline}} — {{url}}\n{{/items}}");

-- Point news subscriptions to use the digest template
UPDATE bf_discord_subscriptions
SET digest_template_key='digest.market_news.15m'
WHERE event_key='news.daily_digest' AND channel_key='market_news';