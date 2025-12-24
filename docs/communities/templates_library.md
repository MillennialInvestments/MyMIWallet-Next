# Communities Templates Library

Each template supports placeholders `{HOOK}`, `{VALUE}`, `{CTA}`, `{LINKS}`, `{HASHTAGS}`, `{TICKERS}`. Platform-specific constraints are enforced by SocialPostFormatter.

## Templates

### daily_news_digest
Hook-driven headline that summarizes top 3 stories with tickers.
```
{HOOK}

{VALUE}

{CTA}
Links: {LINKS}
Tags: {HASHTAGS} {TICKERS}
```

### budget_tip
Quick budgeting action with free tool CTA.
```
{HOOK}
- {VALUE}

Try it free: {CTA}
Resources: {LINKS}
Tags: {HASHTAGS}
Tickers: {TICKERS}
```

### investment_tip
Short actionable investing guidance with risk reminder.
```
{HOOK}
{VALUE}

Next step: {CTA}
{LINKS}
{HASHTAGS} {TICKERS}
```

### trade_alert_digest
Bundle of key trade alerts from today.
```
{HOOK}
{VALUE}

CTA: {CTA}
Watchlist: {TICKERS}
{LINKS}
{HASHTAGS}
```

### community_question
Engagement-first prompt that funnels replies.
```
{HOOK}
{VALUE}

Drop your take and join us: {CTA}
Links: {LINKS}
Tags: {HASHTAGS}
```

### promo_free_tools
Promote calculators and dashboards.
```
{HOOK}
{VALUE}

Unlock the free toolkit: {CTA}
{LINKS}
{HASHTAGS}
{TICKERS}
```

### promo_membership_discount
Limited-time upgrade message.
```
{HOOK}
{VALUE}

Upgrade now: {CTA}
Included: {LINKS}
Tags: {HASHTAGS}
Tickers: {TICKERS}
```

### promo_discord_invite
Direct Discord invitation.
```
{HOOK}
{VALUE}

Join Discord: {CTA}
Extras: {LINKS}
{HASHTAGS}
{TICKERS}
```

### weekly_recap
Weekly highlights and weekend live CTA.
```
{HOOK}
{VALUE}

See you live: {CTA}
Resources: {LINKS}
Tags: {HASHTAGS}
Tickers: {TICKERS}
```
