# bf_viewer_snapshots

Schema recommendation for storing viewer snapshots (audits and reloads).

```sql
CREATE TABLE `bf_viewer_snapshots` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int unsigned DEFAULT NULL,
  `title` varchar(255) DEFAULT NULL,
  `source_type` varchar(32) NOT NULL DEFAULT 'file',
  `content_type` varchar(32) NOT NULL DEFAULT 'html',
  `file_path` text,
  `content` mediumtext,
  `response_json` mediumtext,
  `created_on` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`),
  KEY `content_type` (`content_type`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
```

Notes:
- `response_json` can store the full preview/request payload for audit/troubleshooting.
- Indexes help querying by user or content type.
- Adjust storage engine and charset to match project standards.
```
