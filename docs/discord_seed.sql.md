-- Seed recommended logical channels (map these to real channel/webhook IDs later)
INSERT IGNORE INTO bf_discord_channels (channel_key, name, min_interval_sec, allow_embeds)
VALUES
  ('welcome_center',  'Welcome Center', 300, 1),
  ('announcements',   'Announcements',  300, 1),
  ('market_news',     'Market News',    120, 1),
  ('investment_news', 'Investment News',120, 1),
  ('trade_alerts',    'Trade Alerts',    60, 1),
  ('updates',         'Platform Updates',180,1),
  ('support',         'Support',         300,1);

-- Seed core templates
INSERT IGNORE INTO bf_discord_templates (template_key, title, content, embed_json)
VALUES
('alerts.opened.basic',
 'New Trade Alert',
 '📈 **{{ticker}}** — {{title}}\nStatus: **{{status}}** | Price: ${{price}}\n{{summary}}\n{{chartUrl}}',
 JSON_OBJECT('color',5814783,'fields',JSON_ARRAY(JSON_OBJECT('name','TP/SL','value','TP: {{tp}} / SL: {{sl}}','inline',true)))),
('news.daily_digest',
 'MyMI Daily Digest',
 '**Top 5 Stories**\n{{#items}}• {{headline}} — {{url}}\n{{/items}}\n\nBrought to you by MyMI Wallet.'),
('marketing.post.ready',
 'New Content',
 '📰 **{{title}}**\n{{excerpt}}\nLink: {{url}}');

-- Example subscriptions
INSERT IGNORE INTO bf_discord_subscriptions (event_key, channel_key, template_key, is_enabled)
VALUES
  ('alerts.opened',       'trade_alerts',    'alerts.opened.basic', 1),
  ('news.daily_digest',   'market_news',     'news.daily_digest',   1),
  ('marketing.post.ready','announcements',   'marketing.post.ready',1);
