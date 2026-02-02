# Artifact Sandbox (AIOps / Spark)

This document is the source of truth for where Spark commands may write artifacts.

## Approved write locations

Spark commands **may only write** to:

- `ROOTPATH/docs/aiops/artifacts/`
- `ROOTPATH/docs/aiops/prs/`
- `ROOTPATH/docs/aiops/fix-503/`

All Spark artifact output must be routed through `ArtifactHelper`.

## Standard artifact layout

Every Spark command must emit artifacts under `docs/aiops/artifacts` using the normalized
command name and a UTC timestamp:

```
docs/aiops/artifacts/
└── <normalized-command-name>/
    └── YYYYMMDD-HHMMSS/
        ├── summary.md
        ├── report.json
        └── meta.json (optional)
```

Optional raw payloads (additional files) may live alongside `summary.md` and `report.json`
inside the same timestamped directory.

Example:

```
docs/aiops/artifacts/ops-app-update/20260201-234859/
```

## Rationale

- **CI-safe & CRON-safe:** no writes to ephemeral locations, no shell redirects.
- **Reviewable:** artifacts live in a predictable, versionable location.
- **Deterministic:** paths are normalized and timestamped for easy auditing.

## Enforcement

- Spark commands must not call `file_put_contents`, `mkdir`, `copy`, `rename`, or `unlink` directly.
- Use `ArtifactHelper` for all artifact writes and directory creation.
- `ops:filesystem:lint` must pass with **zero violations** before merge.
