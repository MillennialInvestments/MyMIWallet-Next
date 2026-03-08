# View JS Enhancement Backlog

## Critical
- **File:** `app/Views/themes/public/layouts/js-links.php`
  - **Module:** Public Theme Layout
  - **Issue Type:** Duplicate JS library loading / execution-order fragility
  - **Proposed Improvement:** Collapse to one canonical include path per dependency and feature-flag optional plugins
  - **Dependency:** Active-layout usage trace from controllers/routes
  - **Complexity:** Medium

## High
- **File:** `app/Views/themes/dashboard/layouts/custom-js.php`
  - **Module:** Dashboard Theme Layout
  - **Issue Type:** Large inline global script with mixed responsibilities
  - **Proposed Improvement:** Extract reusable global helpers (`safeBind`, CSRF refresh, clipboard toast, modal lifecycle hooks)
  - **Dependency:** Shared helper partial location and naming standard
  - **Complexity:** Medium

- **File:** `app/Views/themes/public/layouts/custom-js.php`
  - **Module:** Public Theme Layout
  - **Issue Type:** Inline tracking/UI logic coupling
  - **Proposed Improvement:** Move UI utilities and trackers into isolated partials with defensive guards
  - **Dependency:** Analytics policy + CSP nonce pattern standardization
  - **Complexity:** Medium

## Medium
- **File:** `app/Views/themes/dashboard/layouts/js-links.php`
  - **Module:** Dashboard Theme Layout
  - **Issue Type:** Global bundle loads plugins regardless of feature usage
  - **Proposed Improvement:** Conditional loader flags for select2/flatpickr/knob/validation on demand
  - **Dependency:** Controller-level flags cleanup
  - **Complexity:** Medium

- **File:** `app/Views/themes/dashboard/partials/custom-js/datatables.php`
  - **Module:** Dashboard Shared Partial
  - **Issue Type:** DataTable lifecycle and possible reinit risk across modal/partial refreshes
  - **Proposed Improvement:** Standard `initDataTableOnce` utility and destroy/recreate guards
  - **Dependency:** Batch 05/08/10 table usage review
  - **Complexity:** Medium

## Low
- **File:** `app/Views/themes/dashboard/layouts/custom-js.php`
  - **Module:** Dashboard Theme Layout
  - **Issue Type:** Blocking `alert()` UX for clipboard actions
  - **Proposed Improvement:** Toast-based, accessible status feedback helper
  - **Dependency:** Shared toast component availability
  - **Complexity:** Low
