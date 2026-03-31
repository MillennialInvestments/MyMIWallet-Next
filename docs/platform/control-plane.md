# Control Plane (Federated Edge + Central Brain)

## Commands
- `platform:edge-snapshot`: lightweight per-repo status + metrics export.
- `platform:control:collect`: aggregate edge artifacts using manifest paths.
- `platform:control:analyze`: rank urgency/actions by severity and freshness.
- `platform:control:dispatch`: dry-run by default; prints exact commands.
- `platform:control:run`: collect + analyze + dispatch pipeline.

## Artifacts
- `docs/_platform/edge_status.json`
- `docs/_platform/edge_metrics.json`
- `docs/_platform/control_plane_report.json`
- `docs/_platform/control_plane_report.md`
- `docs/_platform/platform_manifest.json`

## Safety
- File-based collection first (DreamHost-safe).
- Missing edge artifact => `stale` platform, not hard failure.
- No destructive dispatch actions are auto-applied by default.
