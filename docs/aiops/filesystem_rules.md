# Filesystem Rules for Spark Commands

## Root Anchoring
All file writes performed by Spark commands MUST:
- Use ROOTPATH as the base
- Never rely on relative paths
- Never rely on current working directory (CWD)

## Forbidden Targets
- public/
- writable/uploads/
- any web-accessible directory
- writable/ (except logs via logger)

## Required Pattern
```php
$path = ROOTPATH . 'relative/path';
```

## Codex Artifact Rules
- All Codex outputs MUST live under /docs
- NEVER write to /public
- NEVER write to /writable
- All paths MUST be ROOTPATH-anchored
- Spark commands must refuse unsafe paths

## Enforcement
- `php spark ops:filesystem:lint` scans app/Commands, tools, and aiops for unsafe writes.
- CI fails on missing ROOTPATH anchors or writes to public/ or writable/.
