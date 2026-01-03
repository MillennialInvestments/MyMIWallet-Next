# MyMI Wallet Mobile on Replit — Overview

This guide describes how to stand up a repeatable mobile build inside Replit that reuses the existing CodeIgniter 4 (CI4) APIs as the system of record. It ships with an Expo (React Native + TypeScript) default and a PWA fallback, plus an npm workspace (`packages/mymi-sdk`) that centralizes shared types, API clients, and formatting/validation logic.

## What we are building
- **Mobile surfaces:** Login/Register, Dashboard, Budget Overview, Watchlist, Alerts Feed, Marketing Summaries, Settings/Profile (with logout and optional health/debug checks).
- **Shared SDK:** `packages/mymi-sdk` provides HTTP wrapper, typed models, token interface, and helpers so the mobile app and any future front-end reuse the same contracts.
- **Default stack:** Expo (React Native) in `mobile/` with Expo Router for navigation. A PWA fallback (React + Vite) is also documented for environments where Expo native builds are blocked.

## How it connects to CI4
- **Base API host:** `MYMI_API_BASE_URL` (e.g., `https://www.mymiwallet.com/index.php`). All SDK requests prepend this value.
- **Auth:** Mobile expects bearer tokens. CI4 currently relies on session-based auth, so this guide includes a token-based stub (`/API/Auth/login`, `/API/Auth/register`, `/API/User/me`) in `docs/mobile/replit/missing_endpoints.md` and `docs/mobile/replit/patches/`.
- **Feature endpoints:** Budget, alerts/news, investments/search, marketing summaries, and health checks map to existing CI4 controllers under `app/Modules/APIs/Controllers`. A full contract table lives in `03_ci4_api_contracts.md`.
- **CORS:** CI4 must allow `Origin: https://<replit-domain>` and `Authorization: Bearer <token>` with standard preflight responses (documented in `05_security.md`).

## Environments
- **dev:** Replit workspace, `.env` populated via Replit Secrets. Expo runs with `EXPO_PUBLIC_` variables and tunnels for native app testing.
- **stage:** Optional staging CI4 host; point `MYMI_API_BASE_URL` to staging and run `MYMI_APP_ENV=stage` to toggle logging verbosity.
- **prod:** Production CI4 host (`https://www.mymiwallet.com`). Ensure API keys (MarketAux, AlphaVantage, etc.) are configured server-side; the mobile app sends only bearer tokens and optional API key headers when required.

## Deliverables in this repo
- **Docs:** `docs/mobile/replit/00_overview.md` (this file) + `01_replit_setup.md` … `07_deploy_and_release.md` + `missing_endpoints.md` + `patches/` stubs.
- **Mobile scaffold:** `mobile/` Expo app with typed screens and SDK wiring.
- **Shared SDK:** `packages/mymi-sdk/` for API client + models + utilities used by the mobile app.

## Default vs. fallback path
- **Use Expo by default** (`npm run start --workspace mobile`).
- **Fallback PWA** instructions are provided in setup/architecture docs; keep the same SDK and env vars, but run `npm create vite@latest` flow if native builds are blocked.
