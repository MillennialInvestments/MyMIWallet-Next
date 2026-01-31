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

## Required Pattern
```php
$path = ROOTPATH . 'relative/path';
