# Frontend & UI Experience

## Overview
Assesses public and dashboard interface behavior, asset loading order, cache busting, and customer support entry points.

## Inventory (Auto-collected)
- Generated on: 2025-10-06 21:26 UTC
- Tooling: grep/awk/php spark/composer/git

## Status Table
| Area / Item | Current Status | Action Needed | Priority | Notes |
|---|---|---|---|---|
| Navbar collapse & toggler contrast | ⚙️ Needs Review | Apply `navbar-light`/`navbar-dark` context plus custom icon styling for light themes. | 🟡 Medium | Mobile toggler relies on Bootstrap defaults without theme class, risking invisible icon. |
| AOS & global deps after nonce init | ⚙️ Needs Review | Add SRI hashes or self-host critical vendor bundles via Vite. | 🟠 High | Nonce bootstraps before loading several CDN scripts without integrity fallback. |
| Chart scripts & cache busting | ⚙️ Needs Review | Replace legacy CDN Chart.js 2.1.2 with maintained bundle + align `gd-invest.js` gating. | 🟠 High | Dashboard uses filemtime cache busting; public layout still pulls dated CDN assets. |
| Error views (403/404/500/504) parity | ⚙️ Needs Review | Move email alerts to service layer and add consistent redirect timers. | 🟡 Medium | Views trigger `@mail()` directly and mix redirect timers (403/500 only). |
| Support module route wiring | ❌ Broken/Unknown | Collapse duplicate `/Support` group and add UI regression test. | 🔴 Critical | Nested group registers `Support/Support/kb` path before namespaced routes. |

## Findings (Evidence)
- Public navbar toggler lacks theme class despite Bootstrap collapse wiring.【effb31†L15-L76】
- Dashboard navbar mirrors collapse pattern but includes dark background styling for visibility.【38b93d†L24-L143】
- Public layout seeds CSP nonce then loads multiple CDN scripts, including Chart.js 2.1.2.【5b9ce0†L14-L38】
- Dashboard layout self-hosts bundles with cache-busted tags and conditional chart loading.【0d02ac†L14-L42】
- Error templates send support emails directly from view logic and mix redirect timings.【827fb4†L52-L105】【245b84†L52-L75】【52fa4c†L20-L90】【f353b0†L50-L149】
- Routes define an extra `/Support` group without namespace, creating `/Support/Support/*` entries ahead of the correct group.【6acff5†L695-L699】【954d20†L1218-L1227】

## Required Fixes / Tasks
- [ ] Fix Support routes to avoid double prefix and add `/Support` integration coverage (owner: Codex).
- [ ] Harden navbar toggler styling and align CDN bundles into Vite build (owner: Codex).
- [ ] Run manual UI regression via [ui-error-uat.md](../ops/runbooks/ui-error-uat.md) covering error redirects + Support nav (owner: Teddy/manual).

## Links & References
- `app/Views/themes/public/layouts/_sitenav.php`
- `app/Views/themes/dashboard/layouts/_sitenav.php`
- `app/Views/themes/public/layouts/js-links.php`, `app/Views/themes/dashboard/layouts/js-links.php`
- `app/Views/errors/html/error_403.php`, `error_404.php`, `error_500.php`, `error_504.php`
- `app/Config/Routes.php`
