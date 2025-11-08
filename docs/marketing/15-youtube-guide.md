---
title: "YouTube Guide"
slug: "youtube-guide"
status: "active"
audience: ["beginner","advanced"]
goals:
  - "Publish 8 long-form videos and 16 Shorts per month with 55% average retention."
  - "Drive 500 Gold conversions via YouTube descriptions and end cards by March 2025."
pillars: ["Financial Wellness 2025","Investing","Budgeting","Crypto"]
primary_cta: "https://www.mymiwallet.com/Register"
secondary_cta: "https://www.mymiwallet.com/Memberships"
discounts:
  new_year_2025: "60% off annual plans"
channels: ["youtube","email","blog","discord"]
kpis:
  - name: "Average retention"
    target: "55%"
  - name: "YouTube conversions"
    target: 500
seo:
  primary_keywords: ["financial wellness youtube","budgeting tutorial","crypto swap tutorial","MyMI Gold video"]
  secondary_keywords: ["financial planning 2025","solana swap demo","investment alerts video"]
utm:
  source: "youtube"
  medium: "organic"
  campaign: "youtube-guide"
  content: "youtube-blueprint"
compliance_notes: "Include disclosure slides, verbal disclaimers, and avoid promising performance."
doc_version: "1.0"
updated: "2025-09-07"
---

# 1) Positioning & Promise
- One-liner: Deliver binge-worthy tutorials and stories showcasing MyMI budgeting, investing, alerts, and Solana tools.
- Personas: Content producers, analysts, community hosts.
- Pain → Promise → Proof: Viewers need guided walkthroughs; videos leverage modules from `app/Modules/Wallet`, `app/Modules/Investments`, `app/Modules/Exchange`, `app/Libraries/MyMIAlerts.php`; Q4 2024 delivered 420 conversions via end cards.
- New Year hook: “Film 2025 reset series with 60% Gold CTA overlays and wallet-to-coin automation demos.”

# 2) Feature Source-of-Truth (auto-scrub)
- Modules: `app/Modules/Wallet`, `app/Modules/Investments`, `app/Modules/Exchange/Solana`, `app/Libraries/MyMIAlerts.php`, `app/Libraries/MyMIMarketing.php`, `resources/video`.
- Database: `bf_marketing_scraper` for scripts, `bf_investment_trade_alerts` for data overlays, `bf_users_memberships` for plan callouts.
- Pull strings: Script templates `video_longform_reset`, `shorts_hook_list`, CTA overlays referencing `{{CTA_PRIMARY}}`, timeline JSON `video_broll_plan.json`.

# 3) Benefits → Feature Mapping
- Beginner benefits: Step-by-step budgeting setup, easy-to-follow checklists, accessible language.
- Advanced benefits: Alert automation walkthroughs, Solana swap demos, API glimpses.
- Proof: 58% retention on budgeting tutorial, 35k views on alert breakdown, 65% of viewers clicked description resources.

# 4) Offers, Pricing & Discounts
- Free: Access to video transcripts, templates, resources linked in description.
- Gold: Exclusive webinar invites, downloadable dashboards, discount codes.
- 60% copy: “End card text: ‘Start Gold today & save 60% on annual plans. Tap the link in description for the bonus checklist.’”
- Referral: Include referral CTA in description using `{{CTA_SECONDARY}}` token for membership compare page.

# 5) SEO Brief
- Keywords: financial wellness YouTube, budgeting tutorial 2025, Solana swap video.
- Headlines: “2025 Budget Reset with MyMI,” “How to Automate Solana Swaps in MyMIExchange,” “Turn Alerts into Actions with MyMI.”
- Meta: “MyMI’s YouTube channel teaches budgeting, investing, and crypto workflows—save 60% on Gold with link in description.”
- FAQ: posting cadence, description structure, compliance, CTA tokens, subtitles.

# 6) Content Blueprints
## Video Components
- **Hook Lines (first 3 seconds):**
  1. “You can reset your 2025 finances in one dashboard—watch how.”
  2. “Here’s the Solana swap workflow our Gold members love.”
  3. “These alerts fired before the market moved—let me show you.”
- **Meta Description Template:** “Plan your 2025 finances with MyMI. Budget, invest, and swap crypto in one dashboard. Save 60% on Gold via {{CTA_PRIMARY}}.”
- **Caption Template:** “Budget reset | Solana swap | Alerts automation | Save 60% on Gold → {{CTA_PRIMARY}}.”
- **FAQ:**
  1. “How often do new videos drop?” Weekly on Tuesdays & Thursdays.
  2. “Do I need Gold?” Free viewers learn basics; Gold unlocks advanced features.
  3. “Where do scripts live?” `resources/video/scripts/` and `bf_marketing_scraper` entries.
  4. “How do we show compliance?” Insert disclaimer slide + verbal statement at 0:10.
  5. “How to track conversions?” Use `utm_source=youtube&utm_medium=organic&utm_campaign=youtube-guide` with `utm_content` per video.

## Shorts Script (45–60 sec)
- Format: Hook → Problem → Demo clip → CTA. Example: “Stressed about cash flow? Watch me build a budget in 45s, then tap {{CTA_PRIMARY}} to unlock the 60% Gold plan.”

## Long-form Script (3–5 min)
- Structure: Intro hook (0:00-0:15), agenda, module walkthrough (Wallet → Investments → Alerts → Solana), testimonial clip, CTA summary (with `{{CTA_PRIMARY}}` overlay), compliance outro.

## Slide Bullets (6–10 slides)
1. Title + hook.
2. Financial wellness challenge.
3. Budgeting workflow screenshot.
4. Investments dashboard overlays.
5. Solana swap features.
6. Alerts automation.
7. Referral & community callout.
8. Pricing & 60% CTA.
9. Compliance slide.
10. Next steps & `{{CTA_PRIMARY}}` reminder.

## B-Roll Checklist
- Dashboard navigation (Wallet > Budgets).
- Solana swap animation.
- Alerts log screen.
- Discord Coffee & Stocks clip.
- Mobile app screens if available.

## Production Workflow
- Pre-production: Pull data from modules, update scripts, gather B-roll.
- Production: Record screen + host, capture voiceover, add overlays.
- Post-production: Insert captions, CTA lower-thirds, compliance slide, export to 4K.

# 7) Distribution Plan
- Upload schedule: Tuesday/Thursday long-form at 11am ET, Shorts daily at 7am ET, playlists updated monthly.
- Quiet hours: Avoid publishing after 8pm ET; schedule premieres midday.
- UTM matrix: Descriptions `utm_content=youtube-longform-{date}`, Shorts `utm_content=youtube-shorts-{topic}`, End cards `utm_content=youtube-endcard`.
- Cross-post: Embed videos in blog posts, share in email newsletters, drop in Discord #video-premieres.

# 8) Dashboard & Automation Hooks
- Buttons: “Generate Video Script,” “Sync YouTube Analytics,” “Push Premiere Reminder.”
- CRON: `marketing:youtube-analytics` daily 06:00 ET, `marketing:youtube-premiere` reminders 2 hours prior.
- Summaries: Dashboard > Marketing > Video referencing `bf_marketing_scraper` and YouTube API pull.

# 9) Compliance & Disclaimers
- Include on-screen disclaimers, link to terms, mention educational purpose verbally.
- Avoid ROI promises; emphasize risk and self-directed decisions.
- Provide caption for accessibility; ensure disclaimers appear in transcript.

# 10) Success Metrics & Review Cycle
- Owners: Video Lead for production, Analyst for retention metrics, Compliance for reviews.
- Checklist: Review analytics weekly, confirm CTA tokens in descriptions, refresh end card designs, audit captions, ensure B-roll updated.
- Iterate: Launch subscriber-only live sessions, experiment with YouTube Live Q&A, integrate Shorts into TikTok pipeline.
