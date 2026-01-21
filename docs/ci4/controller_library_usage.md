# CI4 Controller ↔ Library Usage Rules

## ❌ What NOT To Do
Controllers must NEVER call libraries as methods:

```php
$this->MyMIMarketing();
```

This causes fatal errors because libraries are not controller methods.

---

## ✅ Correct Patterns

### Option A — Instantiate Library (Preferred)
```php
use App\Libraries\MyMIMarketing;

$this->marketing = new MyMIMarketing();
```

### Option B — Load via Services
```php
$this->marketing = service('mymimarketing');
```

## Constructor Rules

### ✔ Constructors may:
- Assign properties
- Load services
- Initialize lightweight dependencies

### ❌ Constructors must NOT:
- Query databases
- Process emails
- Generate content
- Run TF-IDF / NLP
- Trigger CRON-style logic

## Why This Matters

Violating these rules:
- Breaks CI4 lifecycle
- Causes fatal routing failures
- Makes controllers non-testable
