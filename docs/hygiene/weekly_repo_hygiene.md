# Weekly Repo Hygiene Checklist

## Checklist
- Run `php spark audit:psr4` and confirm zero violations.
- Run `php spark optimize` and confirm no skipped classes.
- Ensure no `.orig.php`, `.bak.php`, or `.disabled.php` files in `/app`.
- Confirm no classes are skipped by Composer autoloading.
- Verify DTO paths match namespaces.
- Ensure modules do not cross boundaries.
- Confirm legacy files only live in `/app/_legacy`.
- Verify routes reference valid controllers.
- Ensure production code does not depend on dev dependencies.

## Automation
### CI Schedule (Preferred)
The PSR-4 audit runs weekly via GitHub Actions on a Monday 06:00 UTC schedule.

### Cron Alternative
If CI scheduling is unavailable, use a cron entry:
```
0 6 * * 1 /usr/bin/php /path/to/project/spark audit:psr4 --ci
```
