# Replit Setup — MyMI Wallet Mobile (Expo default)

Follow these exact steps to spin up the mobile workspace in Replit. All commands assume you are in the repo root unless noted.

## 1) Create the Replit project
1. Click **Create Repl → Import from GitHub** and point to this repository.
2. Choose a **Node.js** template (not PHP) so npm workspaces function correctly.
3. Once imported, open the Shell pane.

## 2) Configure environment variables (Replit Secrets)
Set these in the Replit **Secrets** tab. Prefix client-consumable values with `EXPO_PUBLIC_` so Expo injects them at build time.

| Key | Required | Example | Notes |
| --- | --- | --- | --- |
| `MYMI_API_BASE_URL` | ✅ | `https://www.mymiwallet.com/index.php` | CI4 base URL (no trailing slash). Used server-side tools/tests. |
| `MYMI_APP_ENV` | ✅ | `dev` | `dev|stage|prod` toggles logging and analytics flags. |
| `MYMI_API_KEY` | ⬜️ | `abc123` | Only if CI4 requires an API key header for mobile traffic. |
| `SENTRY_DSN` | ⬜️ | `https://...ingest.sentry.io/...` | Optional error reporting DSN. |
| `EXPO_PUBLIC_MYMI_API_BASE_URL` | ✅ | mirror `MYMI_API_BASE_URL` | Expo client runtime uses this. |
| `EXPO_PUBLIC_MYMI_APP_ENV` | ✅ | `dev` | Mirrors `MYMI_APP_ENV` for UI toggles. |
| `EXPO_PUBLIC_MYMI_API_KEY` | ⬜️ | `abc123` | Mirrors `MYMI_API_KEY` when needed. |

> Tip: keep secrets in sync between `MYMI_*` and `EXPO_PUBLIC_*` so both server scripts and the Expo bundle see the same values.

## 3) Install dependencies
```bash
# Install workspace deps (root + mobile + packages/)
npm install

# Verify workspace linking
npm ls mymi-sdk --workspaces
```
Expected: `mobile@... -> mymi-sdk@0.1.0`.

If Expo CLI warns about Node versions, pin `NODE_VERSION=20` in Replit (Secrets or `.replit` environment section).

## 4) Run the Expo app in Replit
```bash
# From repo root
npm run start --workspaces --if-present -- mobile
# or
npm run start --workspace mobile
```
This runs `expo start --clear` inside `mobile/`. In the Replit UI:
- Open the **Webview** tab to see Expo Web (good for quick checks).
- Use the QR code in the terminal output to load on a physical device (Expo Go). Replit will expose a public URL you can share.

If ports are blocked, add `--tunnel` to the start script or set `EXPO_TUNNEL=true` in the Shell before starting.

## 5) Optional PWA fallback
If native builds are blocked, scaffold a PWA in `mobile-pwa/` (keep SDK shared):
```bash
npm create vite@latest mobile-pwa -- --template react-ts
cd mobile-pwa
npm install
npm run dev -- --host 0.0.0.0 --port 5173
```
Point the PWA to the same `EXPO_PUBLIC_*` vars; reuse `packages/mymi-sdk` imports.

## 6) Troubleshooting quick hits
- **Node version mismatch:** run `nvm install 20 && nvm use 20` in Replit Shell, then `npm rebuild`.
- **Expo port binding:** start with `EXPO_USE_DEV_SERVER=1 expo start --host tunnel` to force tunnels.
- **CORS 403/401:** confirm CI4 `Access-Control-Allow-Origin` includes your Replit domain and that `Authorization: Bearer <token>` is forwarded (see `05_security.md`).
- **Metro cache issues:** `rm -rf /tmp/metro-* && expo start --clear`.
- **Watchman/unavailable FS:** Metro on Replit can run without Watchman; set `EXPO_NO_WATCHMAN=1` if you see related warnings.

## 7) What’s next
- Review `02_architecture.md` for folder layout/state mgmt.
- Wire CI4 tokens using the stubs in `missing_endpoints.md` or confirm existing token endpoints if available.
- Run through the MVP checklist in `06_mvp_checklist.md` before demoing.
