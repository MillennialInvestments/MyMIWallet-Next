# GT-002-01 Diagnosis Summary

## Confirmed defect

The public homepage returns `HTTP/1.1 500 Internal Server Error` for both:

- `https://www.mymiwallet.com/`
- `https://mymiwallet.com/`

## Current evidence

- `docs/gt-002/evidence/GT-002-01/public-homepage-diagnosis.txt`
- `docs/gt-002/evidence/GT-002-01/production-ci4-log-tail.txt`
- `docs/gt-002/evidence/GT-002-01/homepage-route-surface.txt`
- `docs/gt-002/evidence/GT-002-01/root-cause-surface.txt`
- `docs/gt-002/evidence/GT-002-01/recent-production-error-context.txt`

## Leading root-cause candidate

Production logs show repeated failures inserting into missing table `system_errors`.

The stack points through:

- `App\Services\AIOps\ErrorIngestService`
- `app/Config/Events.php`
- CodeIgniter boot lifecycle

## Safety rule

Do not mutate production DB or production code without explicit approval.

The next fix should be source-controlled and validated in a dedicated PR.
