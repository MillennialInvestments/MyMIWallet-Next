# PSR-4 Autoloading (CI4)

## Why PSR-4 Matters

CodeIgniter 4 relies on Composer's PSR-4 autoloader for class discovery. When a class file is misplaced, misnamed, or has the wrong namespace, the framework cannot load it. This leads to runtime errors, broken routes, and unpredictable module behavior. Keeping PSR-4 compliance also keeps CI and tooling green.

## Where Backups Belong

Backup or legacy files **must not** live inside PSR-4 autoload paths (ex: `/app`, `/app/Modules`, `/app/Libraries`, `/app/Config`). Store them under:

- `/docs/legacy/`
- `/docs/legacy/config/`
- `/docs/legacy/models/`

Always add the following header to moved backups:

```php
/**
 * LEGACY / BACKUP FILE
 * Removed from autoload paths to maintain PSR-4 compliance
 */
```

## Naming Rules

- **Namespace must mirror the path.**
  - Example: `/app/Libraries/MyMISqueeze.php` → `namespace App\Libraries;`
- **Class name must equal the filename.**
  - Example: `MyMISqueeze.php` → `class MyMISqueeze`
- **One class per file.**
- **No backup suffixes in autoload paths.**
  - Avoid: `*.orig.php`, `*.copy.php`

## Module Namespace Rules

Controllers inside module paths must include the full module namespace:

```
/app/Modules/APIs/Controllers/SqueezeController.php
```

```php
namespace App\Modules\APIs\Controllers;
```

## “Never Do This Again” Checklist

- [ ] No `*.orig.php` or `*.copy.php` files inside `/app` or module folders.
- [ ] Namespace matches the file path from `/app`.
- [ ] Class name matches the filename exactly.
- [ ] One class per file.
- [ ] Run `composer dump-autoload --strict-psr` before every merge.
- [ ] Verify module controllers use their full module namespace.

