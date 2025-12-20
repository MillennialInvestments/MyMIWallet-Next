# Marketing Ignite Toolkit

`social_ignite.php` turns a single campaign input (title, message, URL, optional CTA/hashtags/tickers) into copy/paste-ready posts for multiple platforms. Nothing is posted automatically—this prepares assets for manual distribution or future automation.

## Inputs
- Provide JSON file: `--input scripts/social_input.json`
- Or CLI flags: `--title`, `--message`, `--url`, `--campaign`, optional `--hashtags`, `--cta`, `--tickers`
- Hashtags/tickers accept comma or space-separated lists. `#`/`@` prefixes are cleaned automatically.

### Example input
```
{
  "campaign": "spring-alpha-launch",
  "title": "Spring Alpha Launch",
  "message": "We are opening our latest budgeting + investment alert tools to early adopters. Claim your spot and help shape the roadmap.",
  "url": "https://www.mymiwallet.com",
  "cta": "Reserve your account and join the feedback loop",
  "hashtags": ["fintech", "budgeting", "crypto"],
  "tickers": ["AAPL", "BTC"]
}
```

## Usage
- From repository root:\
  `php scripts/social_ignite.php --input scripts/social_input.sample.json`\
  or\
  `php scripts/social_ignite.php --title "..." --message "..." --url "https://www.mymiwallet.com" --campaign "q2-growth" --hashtags "fintech,budgeting" --cta "Join the waitlist"`

## Outputs
- Written to `scripts/social_output/<date>/<campaign>/`
- Files: `discord.md`, `x.txt`, `linkedin.md`, `facebook.md`, `email.md`, `blog.md`, plus `bundle.json` with all rendered content.
- Templates + limits are defined in `scripts/social_templates.json` (X is truncated to ~270 chars with ellipsis).

## Operational Fit
1. During campaign planning: prepare inputs and generate assets.
2. Distribute manually (Discord, X, LinkedIn, Facebook, email, blog/CMS).
3. Save generated directory or `bundle.json` with the PR/issue for traceability.
4. Future automation can read `bundle.json` to queue posts into the Marketing Dashboard without changing this script.
