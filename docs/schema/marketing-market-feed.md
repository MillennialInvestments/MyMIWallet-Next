# Marketing Market Feed Schema

## bf_marketing_market_sources

- **id**: unsigned bigint primary key
- **source_key**: stable unique source identifier
- **source_name**: display name
- **source_url**: optional canonical source URL
- **adapter_class**: adapter implementation
- **enabled**: disabled by default
- **configuration_json**: optional deterministic configuration metadata
- **created_at**
- **updated_at**

## bf_marketing_market_feed_items

- **id**: unsigned bigint primary key
- **identity_sha256**: unique deterministic item identity
- **source_key**: indexed source identifier
- **external_item_id**: optional source-provided identifier
- **title**
- **summary**
- **canonical_url**
- **published_at**: indexed
- **collected_at**: indexed
- **payload_sha256**
- **normalized_metadata_json**
- **created_at**
- **updated_at**

### Identity SHA256 Calculation

- Uses `source_key` plus `external_item_id`
- Falls back to `canonical_url` if both are absent

### Metadata JSON Encoding

- Must be encoded deterministically

### Uniqueness Requirements

- `source_key` must be unique
- `identity_sha256` must be unique

### Useful Indexes

- `published_at`
- `collected_at`

### Migration Considerations

- Forward-only migration
- `down()` method preserves collected records and does not drop tables

### Persistence

- Disabled by default
