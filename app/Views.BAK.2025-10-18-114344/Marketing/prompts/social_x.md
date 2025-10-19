---
type: social_x
tone: {{ tone }}
audience: {{ audience }}
goal: {{ goal }}
keywords: {{ keywords|csv }}
cta_url: {{ cta_url }}
brand_voice: "clear, direct, optimistic; never hype; emphasize security, transparency, and utility"
platform: "X"
constraints:
  - limit to 280 characters
  - include hashtags using {{ keywords|csv }}
  - end with CTA linking to {{ cta_url }}
---

Compose a tweet promoting "{{ campaign_name }}".