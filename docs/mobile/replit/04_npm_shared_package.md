# Shared npm Package: `packages/mymi-sdk`

`mymi-sdk` centralizes CI4 API access, models, validation, and formatting so both the mobile app and any PWA share the same logic.

## Workspace setup
- Root `package.json` declares workspaces: `"workspaces": ["mobile", "packages/*"]`.
- SDK entry: `packages/mymi-sdk/package.json` with `main`/`types` → `src/index.ts`.
- Mobile app depends on it via `"mymi-sdk": "workspace:*"`.

Install (from repo root):
```bash
npm install
```

## File layout
```
packages/mymi-sdk/
├── package.json
├── tsconfig.json
└── src/
    ├── client/http.ts          # fetch wrapper (baseUrl, headers, retries, timeout)
    ├── auth/tokenStore.ts      # token persistence contract (mobile supplies implementation)
    ├── cache/memoryCache.ts    # opt-in in-memory cache with TTL & size cap
    ├── api/
    │   ├── auth.ts             # login/register/refresh/me
    │   ├── budget.ts           # budget summary/credit/available/repayment
    │   ├── alerts.ts           # ticker news + planned alert feed
    │   ├── marketing.ts        # marketing summaries
    │   ├── watchlist.ts        # planned CRUD + ticker search
    │   └── health.ts           # /API/Health
    ├── models/                 # typed request/response contracts
    ├── utils/format.ts         # money/date formatters, safe parsers
    └── index.ts                # exports + client factory
```

## HTTP wrapper behavior
- Injects `Authorization: Bearer <token>` when `tokenStore.getToken()` returns a value.
- Adds `X-Request-Id` + `X-Client-Version` headers for traceability.
- Supports `retries` (default 1 retry on network/5xx) and `timeoutMs` (AbortController).
- Normalizes output to `ApiResponse<T> = { success, data, error, meta, requestId, status, fromCache }`.

## Token storage contract
`packages/mymi-sdk/src/auth/tokenStore.ts`:
```ts
export interface TokenStore {
  getToken(): Promise<string | undefined> | string | undefined;
  setToken(token?: string): Promise<void> | void;
  clearToken(): Promise<void> | void;
  onTokenChange?(listener: (token?: string) => void): () => void;
}
```
- The mobile app provides the implementation (in-memory default, `expo-secure-store` recommended for production).

## Using the SDK inside mobile
```ts
import { createMyMIClient } from 'mymi-sdk';
import { useTokenStore } from '../hooks/useTokenStore';

const client = createMyMIClient({
  baseUrl: process.env.EXPO_PUBLIC_MYMI_API_BASE_URL!,
  apiKey: process.env.EXPO_PUBLIC_MYMI_API_KEY,
  tokenStore: useTokenStore(),
  defaultTimeoutMs: 8000,
  retries: 1,
});

const budget = await client.budget.summary({ from: '2025-06-01', to: '2025-06-30' });
```

## Building or publishing (optional)
- The Expo bundler consumes the TypeScript sources directly. No build step is required in Replit.
- If publishing separately, add a `build` script that runs `tsc -p packages/mymi-sdk/tsconfig.json` and point `main` to `dist/index.js`.

## Validation & helpers
- `formatMoney`, `formatDate`, `safeNumber` in `src/utils/format.ts` ensure UI formatting is consistent.
- `MemoryCache` can be reused by the PWA for GET endpoints (budget, marketing, alerts news). Pass `{ useCache: true, cacheKey: 'budget:2025-06' }` to SDK calls.
