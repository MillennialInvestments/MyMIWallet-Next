# bf_users_subscribers

## Source
- Migration: app/Database/Migrations/2026-10-04-000100_HardenUserSubscribersContract.php
- Model: app/Models/SubscribeModel.php
- Purpose: canonical marketing / Trade Alerts subscriber identity and delivery lifecycle.
- Boundary: this table does not grant premium membership, tier, checkout, or billing entitlement. Those concerns remain in the membership/subscription entitlement layer.

## Canonical contract
The hardening migration is forward-only and preserves existing subscriber rows. Existing columns are not narrowed or destructively rewritten. Missing lifecycle columns and non-unique lookup indexes are added idempotently.

SQL reference:

    CREATE TABLE IF NOT EXISTS bf_users_subscribers (
      id int NOT NULL AUTO_INCREMENT,
      email varchar(45) NULL DEFAULT NULL,
      referral varchar(45) NULL DEFAULT NULL,
      category varchar(255) NULL DEFAULT NULL,
      subject varchar(255) NULL DEFAULT NULL,
      topic varchar(255) NULL DEFAULT NULL,
      beta tinyint(1) NULL DEFAULT 0,
      date datetime NULL DEFAULT NULL,
      hostTime varchar(45) NULL DEFAULT NULL,
      time varchar(45) NULL DEFAULT NULL,
      user_id int NULL DEFAULT NULL,
      user_ip varchar(45) NULL DEFAULT NULL,
      initial_sent int NULL DEFAULT 0,
      status varchar(50) NULL DEFAULT 'active',
      delivery_error text NULL DEFAULT NULL,
      updated_at datetime NULL DEFAULT NULL,
      unsubscribe_token varchar(255) NULL DEFAULT NULL,
      unsubscribed_at datetime NULL DEFAULT NULL,
      PRIMARY KEY (id)
    );

## Required indexes
- idx_bf_users_subscribers_email on (email)
- idx_bf_users_subscribers_unsubscribe_token on (unsubscribe_token)
- idx_bf_users_subscribers_status_updated_at on (status, updated_at)

The email index is intentionally non-unique because REV-S002 must preserve legacy production rows and may not perform destructive duplicate cleanup. Application writes enforce deterministic duplicate prevention.

## Lifecycle ownership
SubscribeModel owns:
- normalized subscriber creation;
- duplicate-email prevention;
- optional authenticated user_id association;
- delivery status / delivery error updates;
- unsubscribe-token persistence;
- unsubscribe state timestamps.

bf_users_subscriptions, membership tiers, premium entitlements, checkout providers, and recurring billing are explicitly outside this table contract.

## Verification

    SHOW CREATE TABLE bf_users_subscribers;

    SELECT COLUMN_NAME, COLUMN_TYPE, IS_NULLABLE, COLUMN_DEFAULT, EXTRA
    FROM information_schema.columns
    WHERE table_schema = DATABASE() AND table_name = 'bf_users_subscribers'
    ORDER BY ORDINAL_POSITION;

    SELECT INDEX_NAME, NON_UNIQUE, COLUMN_NAME, SEQ_IN_INDEX
    FROM information_schema.statistics
    WHERE table_schema = DATABASE() AND table_name = 'bf_users_subscribers'
    ORDER BY INDEX_NAME, SEQ_IN_INDEX;
