# Oct 2025 Security Remediation

## Summary
- Removed vendored JS libraries from the public webroot and replaced them with archived references plus CDN/Vite-delivered bundles.
- Centralized Node builds and pinned vulnerable transitive dependencies via the `overrides` block in `package.json`.
- Migrated PBKDF2 usage to Web Crypto on the frontend and Argon2/safe helpers on the backend.
- Upgraded CodeIgniter4 to the latest 4.6 patch release, enforced the GD image handler, and hardened validation & process helpers.

## Do/Don't
- ✅ Add new frontend libraries through npm and bundle them with Vite; commit only the compiled assets under `public/assets/build/`.
- ❌ Do not reintroduce vendored libraries under `public/assets/js/` or other webroot directories.

## KDF Versioning
- v1: PBKDF2-HMAC-SHA256, 600k iterations, 16–32 byte salt, nonce stored alongside ciphertext for compatibility.
