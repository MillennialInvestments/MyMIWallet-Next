# Architecture — Mobile + Shared SDK

## Folder structure (npm workspaces)
```
/workspace/MyMIWallet-Next
├── mobile/                 # Expo app (default)
│   ├── app/                # Expo Router routes per screen
│   ├── src/
│   │   ├── screens/        # Screen components (login, dashboard, budget, etc.)
│   │   ├── hooks/          # SDK + auth helpers
│   │   ├── components/     # Reusable UI primitives
│   │   └── styles/         # Theme + base styles
│   ├── app.json            # Expo config (name/slug/platforms)
│   ├── metro.config.js     # Workspace-aware Metro config
│   └── tsconfig.json       # Path mapping to packages/mymi-sdk
├── packages/
│   └── mymi-sdk/           # Shared SDK (types, http client, validators)
│       ├── src/api/        # API groupings (auth, budget, alerts, marketing, watchlist)
│       ├── src/auth/       # Token store contracts
│       ├── src/client/     # HTTP wrapper with retries + timeouts
│       ├── src/cache/      # In-memory caching helpers
│       ├── src/models/     # Request/response types
│       ├── src/utils/      # Formatters (money, dates), sanitizers
│       └── src/index.ts    # Public exports + client factory
└── docs/mobile/replit/     # This guide set
```

## State management approach
- **Lightweight context + hooks.** `mobile/src/hooks/useSdkClient.ts` builds a memoized SDK instance; `useAsyncResource` drives loading/empty/error states for each screen.
- **Auth tokens:** Stored via the SDK `TokenStore` interface; default is in-memory, but swap to `expo-secure-store` for production by implementing `getToken/setToken/clearToken`.
- **Caching:** SDK ships with a small in-memory cache for hot reads (e.g., dashboard summary, marketing summaries). TTL defaults to 60s and is opt-in per call.

## Screen list and ownership
- `login` — calls `auth.login`; stores token; redirects to dashboard.
- `register` — calls `auth.register`; optional auto-login.
- `dashboard` — aggregates health + key cards using budget summary and alerts headline fetches.
- `budget` — uses `budget.summary` + `budget.available` + `budget.repayment`.
- `watchlist` — uses `investments.searchTickers` + proposed watchlist CRUD (see missing endpoints).
- `alerts` — consumes `alerts.newsByTicker` and (when added) user alert feed.
- `marketing` — reads `marketing.summaries`.
- `settings` — exposes logout, profile shell, optional API health ping.

## API service layer
- `packages/mymi-sdk/src/client/http.ts` handles base URL, headers, retries, timeout, and JSON parsing into a normalized `ApiResponse<T> { success, data, error, meta, requestId }` shape.
- Grouped clients live under `src/api/` (auth, budget, alerts, marketing, watchlist, health). Each accepts the shared `HttpClient` and optional cache instance.
- Models under `src/models/` describe request/response payloads and can be shared with PWA or other services.

## Caching strategy
- **SDK cache:** Small in-memory `MemoryCache` with TTL/size controls. Callers opt in (`useCache: true`, `cacheKey`, `ttlMs`) to keep deterministic behavior.
- **CI4 cache (optional):** Budget endpoints already memoize via `rememberUserData` in `app/Modules/APIs/Controllers/BudgetController.php`. A Redis or file cache can be added on the CI4 side for marketing/alerts; see `05_security.md` for CORS/auth notes.

## PWA fallback considerations
- Use the same `packages/mymi-sdk` imports.
- Replace Expo Router with React Router in `mobile-pwa/`.
- Service Worker caching: cache static assets + API GET responses (health, marketing summaries, watchlist listing) with short TTLs to avoid stale finance data.

## Logging & observability
- SDK logs errors via a simple console wrapper; wire `SENTRY_DSN` in `mobile/src/hooks/useErrorLogger.ts` (stubbed) when ready.
- CI4 should log request IDs from the `X-Request-Id` header the SDK generates; include it in error responses for traceability.
