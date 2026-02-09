# Public Pages AIOPS Governance

## Change Classification Rules

| Change Type | PR Required |
| --- | --- |
| PHP files | ✅ |
| Views / Cells | ✅ |
| Routes | ✅ |
| Migrations | ✅ |
| CSV changes | ⚠️ Only when structure changes |
| Draft DB content | ❌ |
| Published DB content | ❌ |
| Docs / `_aiops` outputs | ❌ |

## PR Factory Metadata

- Label: `aiops-public-pages`
- Summary section fields:
  - Pages affected
  - Schema types added
  - Hybrid pages count

## Hard Failing Conditions

AIOPS must fail and block PR creation when any of the below are detected:

- Published page missing schema for `review` or `glossary` type.
- Hybrid page missing news block in `published_meta_json`.
- Public ops route group missing `internalToken` protection.
- Duplicate slug detected in `bf_public_pages_catalog`.

Violations are written to `docs/_aiops/public-pages/violations.md`.
