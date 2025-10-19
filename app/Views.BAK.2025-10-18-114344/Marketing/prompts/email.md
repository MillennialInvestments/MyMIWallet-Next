---
type: email
length: {{ length }}
tone: {{ tone }}
audience: {{ audience }}
keywords: {{ keywords|csv }}
goal: {{ goal }}
brand_voice: "clear, direct, optimistic; never hype; emphasize security, transparency, and utility"
cta_url: {{ cta_url }}
platform: "MyMI Wallet (CI4)"
constraints:
  - keep subject under 60 characters
  - include a preview line
  - end with CTA linking to {{ cta_url }}
---

Write a marketing email for the campaign "{{ campaign_name }}".
Provide a subject line, preview text, and body with a single CTA.