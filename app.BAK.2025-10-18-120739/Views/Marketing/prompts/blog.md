---
type: blog
length: {{ length }}
tone: {{ tone }}
audience: {{ audience }}
keywords: {{ keywords|csv }}
goal: {{ goal }}
brand_voice: "clear, direct, optimistic; never hype; emphasize security, transparency, and utility"
cta_url: {{ cta_url }}
platform: "MyMI Wallet (CI4)"
constraints:
  - mention core benefits: self-custody, multi-chain, Solana tools, MyMIInvestments, analytics
  - add 3 SEO H2s using {{ keywords|csv }}
  - add single CTA at end linking to {{ cta_url }}
---

Write a blog post titled: "{{ campaign_name }}".
Use short paragraphs. Avoid fluff. Include a brief intro, 3 H2 sections, and a concise CTA.