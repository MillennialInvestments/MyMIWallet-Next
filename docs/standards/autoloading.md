# Autoloading Standards

All PHP changes must maintain Composer PSR-4 compliance. Before merging any branch, run:

```
composer dump-autoload --strict-psr
```

This command must complete with zero warnings. Treat any PSR-4 warning as a blocker for merge.
