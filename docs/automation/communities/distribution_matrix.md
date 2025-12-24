# Distribution Matrix

| Platform    | Supports Groups | Primary CTA                  | Webhook/Export |
|-------------|-----------------|------------------------------|----------------|
| YouTube     | Community tab   | Description + pinned comment | Zapier export  |
| TikTok      | Profile/bio     | Comment pin → Discord        | Manual export  |
| Twitch      | Channel panels  | `!discord` chat command      | Manual export  |
| Discord     | Server channels | Website + Free Tool          | Native         |
| Facebook    | Page + Group    | Pinned post → Discord        | Zapier export  |
| LinkedIn    | Company page    | Custom button → Discord      | Zapier export  |
| X/Twitter   | Profile link    | Pinned tweet → Discord       | Zapier export  |
| StockTwits  | Bio             | Bio link → Discord           | Manual export  |

Distribution queue uses `bf_social_distribution_queue` with `pending|sent|failed` to avoid accidental blasts.
