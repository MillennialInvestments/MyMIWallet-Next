# Deploy & Release

## Expo (default)
1. **Ensure env vars** exist in Replit Secrets: `EXPO_PUBLIC_MYMI_API_BASE_URL`, `EXPO_PUBLIC_MYMI_APP_ENV`, `EXPO_PUBLIC_MYMI_API_KEY?`, `SENTRY_DSN?`.
2. **Start dev server** for validation:
   ```bash
   npm run start --workspace mobile
   ```
   Verify web build loads.
3. **Prebuild (optional) for EAS or local native builds:**
   ```bash
   cd mobile
   npx expo prebuild
   ```
   This generates `android/` and `ios/` folders (commit only if you intend to manage native projects).
4. **EAS Build (recommended):**
   - Install EAS CLI if not present: `npm install -g eas-cli`.
   - Run `eas build --platform android --profile preview` (or `production`).
   - Add the necessary secrets to your Expo account (mirror Replit secrets).

## PWA fallback
- If Expo native builds are blocked, deploy the PWA generated via Vite to a static host (Replit static, Netlify, or Cloudflare Pages).
- Ensure `VITE_EXPO_PUBLIC_MYMI_API_BASE_URL` (or equivalent) is set at build time and that CI4 CORS allows the PWA origin.

## CI/CD hooks (optional)
- Add a Replit `run` command to execute `npm test` or `npm run typecheck --workspace mobile` before builds.
- Use GitHub Actions to trigger `eas build` on tagged commits; inject secrets via GitHub Encrypted Secrets.

## Integrating with existing ops
- CI4 stays the source of truth; no database writes happen client-side beyond API calls.
- Add Nginx rules to expose `/index.php/API/*` with proper CORS headers for mobile origins.
- If Rate Limiting is applied at Nginx, whitelist the Expo EAS builder IP ranges or use token-based allow rules.

## Release checklist
- [ ] All tests/type checks passed.
- [ ] Version bump noted in `app.json` (`version` + `runtimeVersion` if using EAS Updates).
- [ ] Changelog/what’s new compiled for app stores.
- [ ] Sentry DSN verified (if enabled) and releases tagged with git SHA.
- [ ] CI4 missing endpoints merged/deployed (see `missing_endpoints.md`).
