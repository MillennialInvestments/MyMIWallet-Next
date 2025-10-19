---
type: social_linkedin
tone: {{ tone }}
audience: {{ audience }}
goal: {{ goal }}
keywords: {{ keywords|csv }}
cta_url: {{ cta_url }}
brand_voice: "clear, direct, optimistic; never hype; emphasize security, transparency, and utility"
platform: "LinkedIn"
constraints:
  - professional tone, no emojis
  - two short paragraphs
  - end with CTA linking to {{ cta_url }}
---

Write a LinkedIn post titled "{{ campaign_name }}" aimed at {{ audience }}.