# PSR-4 Remediation Plan

## Classification Strategy
- **True violations (fix now):** classes in `app/Commands` and active modules whose namespace/path mismatch causes command discovery or runtime ambiguity.
- **Intentional legacy globals (suppress + document):** compatibility classes in legacy/archived code kept for historical integrations.
- **Transitional compatibility classes:** wrappers/adapters that preserve old entry points while new namespaced classes become canonical.

## Immediate Actions
1. Fix command inventory validation to skip abstract base classes (prevents false positives for `SafeBaseCommand`).
2. Keep CI failures focused on real violations in active code paths.
3. Do not bulk rename 100+ legacy files without scoped migration windows.

## Suppression Guidance
For `audit:psr4`, suppress only files under explicitly legacy scopes:
- `app/Modules/Legacy/**`
- `app/Modules/Archive/**`
- `app/Modules/Experimental/**`

Each suppression must include an owner and target retirement date.

## Migration Path
- Phase 1: commands + active modules (current).
- Phase 2: introduce adapters for heavily used legacy globals.
- Phase 3: remove suppressions after namespace parity and route/CLI verification.
