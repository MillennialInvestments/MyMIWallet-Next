# Development Debug Validation Checklist (CI4)

Use this checklist after setting `CI_ENVIRONMENT = development` in your `.env` file.

```bash
php spark serve
curl http://localhost:8080/
```

Then intentionally trigger an exception in a safe dev-only route or controller method and confirm:

- Debug toolbar flame appears on the page.
- Toolbar opens and shows timeline, logs, and queries.
- Error page shows detailed stack trace (Whoops/dev renderer).
- `d()` and `dd()` output is visible.
- `writable/debugbar` contains generated debugbar snapshots.
- Application logs include `debug`-level entries.

If toolbar assets fail to load, verify that `.env` `app.baseURL` matches the actual URL in the browser.
