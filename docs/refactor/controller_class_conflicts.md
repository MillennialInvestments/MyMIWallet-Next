# Controller Class Conflict Report

## Class Name Conflict
- **Class:** `HealthController`
- **Found In:**
  - `app/Controllers/System/HealthController.php`
  - `app/Modules/Status/Controllers/HealthController.php`
- **Recommendation:** Keep module-specific namespaces, avoid ambiguous imports, and consolidate duplicate logic into services.

## Class Name Conflict
- **Class:** `HowItWorksController`
- **Found In:**
  - `app/Controllers/HowItWorksController.php`
  - `app/Modules/Blog/Controllers/HowItWorksController.php`
- **Recommendation:** Keep module-specific namespaces, avoid ambiguous imports, and consolidate duplicate logic into services.

## Class Name Conflict
- **Class:** `PrivacyController`
- **Found In:**
  - `app/Modules/Admin/Controllers/PrivacyController.php`
  - `app/Modules/User/Controllers/PrivacyController.php`
- **Recommendation:** Keep module-specific namespaces, avoid ambiguous imports, and consolidate duplicate logic into services.

## Class Name Conflict
- **Class:** `SearchController`
- **Found In:**
  - `app/Modules/Search/Controllers/SearchController.php`
  - `app/Modules/User/Controllers/SearchController.php`
- **Recommendation:** Keep module-specific namespaces, avoid ambiguous imports, and consolidate duplicate logic into services.

## Class Name Conflict
- **Class:** `SubscribeController`
- **Found In:**
  - `app/Modules/Blog/Controllers/SubscribeController.php`
  - `app/Modules/User/Controllers/SubscribeController.php`
- **Recommendation:** Keep module-specific namespaces, avoid ambiguous imports, and consolidate duplicate logic into services.

## Class Name Conflict
- **Class:** `SupportController`
- **Found In:**
  - `app/Modules/Support/Controllers/SupportController.php`
  - `app/Modules/User/Controllers/SupportController.php`
- **Recommendation:** Keep module-specific namespaces, avoid ambiguous imports, and consolidate duplicate logic into services.

## Class Name Conflict
- **Class:** `UserController`
- **Found In:**
  - `app/Controllers/UserController.php`
  - `app/Modules/Exchange/Controllers/UserController.php`
- **Recommendation:** Keep module-specific namespaces, avoid ambiguous imports, and consolidate duplicate logic into services.

## Class Name Conflict
- **Class:** `ZapierAPIController`
- **Found In:**
  - `app/Modules/APIs/Controllers/Webhooks/ZapierAPIController.php`
  - `app/Modules/APIs/Controllers/ZapierAPIController.php`
- **Recommendation:** Keep module-specific namespaces, avoid ambiguous imports, and consolidate duplicate logic into services.
