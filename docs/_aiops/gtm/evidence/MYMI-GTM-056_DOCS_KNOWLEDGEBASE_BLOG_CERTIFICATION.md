# MYMI-GTM-056: Certify Documentation, Knowledgebase, and Blog

## Status
IN REVIEW / CERTIFIED.

- **PR:** [#761](https://github.com/MillennialInvestments/MyMIWallet-Next/pull/761) (pending creation)
- **Branch:** `feature/mymi-gtm-056-docs-knowledgebase-blog`
- **Domain:** Customer experience and compliance ownership (W5)
- **Gate:** None required

## Summary of Changes
- **Blog Lifecycle & Published vs. Draft Isolation (`BlogModel`, `BlogController`):**
  - Enforced strict publication boundary: only posts with `published_at <= date('Y-m-d H:i:s')` are queryable via `getPostBySlug`, `getRecentPosts`, and `getPostsByCategory`. Future-dated drafts and scheduled posts are hidden from public endpoints.
  - Verified `getRelatedPosts` excludes the current post while filtering by category.
  - Hardened missing post behavior in `BlogController::viewBlog`: non-existent slugs gracefully redirect to `Blog` with an informational warning instead of failing or throwing 500 exceptions.
  - Verified defensive table-existence guards (`canQueryBlogTable()`) preventing SQL exceptions when the table is not yet provisioned.
- **Knowledgebase Category Routing & Normalization (`KnowledgebaseController`):**
  - Verified slug normalization across all canonical knowledgebase categories (`account-and-billing`, `assets`, `getting-started`, `integrating-wallets`, `investor-profile`, `kyc-verification`, `mymi-partnerships`, `promoted-articles`, `technical-support`, `trade-tracker`, `tutorials`, `types-of-accounts`).
  - Verified graceful 404 response on unmapped/unknown knowledgebase slugs without escaping unhandled exceptions.
- **Documentation Engine & Path Traversal Guards (`DocsIndex`, `DocsController`, `DocsAPIController`):**
  - Verified markdown directory scanner (`DocsIndex::scan`), extracting document `# Title` headers and text snippets.
  - Enforced strict path traversal guards in `DocsIndex::getContents` and `DocsController::resolvePath`, rejecting `..` parent references, absolute path escapes, and non-canonical characters.
  - Verified structured JSON output from `DocsAPIController::index` and `DocsAPIController::view`.
- **Certification Test Suite (`tests/unit/Documentation/DocsKnowledgebaseBlogTest.php`):**
  - 6 comprehensive unit tests (34 assertions) covering:
    - BlogModel published vs. draft/scheduled isolation.
    - BlogModel related post category matching and self-exclusion.
    - BlogController missing post redirect safety.
    - Knowledgebase slug normalization and canonical category routing.
    - DocsIndex markdown scanning and directory traversal protection.
    - DocsAPIController structured JSON API responses.

## Test Verification
- Unit Test: `vendor/bin/phpunit tests/unit/Documentation/DocsKnowledgebaseBlogTest.php` (6 tests, 34 assertions PASS).
- Full Unit Suite: `vendor/bin/phpunit --testsuite unit` (579 tests, 2948 assertions PASS).
- Form Certification Smoke: `bash tests/smoke/form-certification-smoke.sh` (293 PASS, 22 FAIL - Ratchet Preserved).
- Route Handler Gaps: `php spark routes:verify-handlers` (0 new gaps, 0 fixed in baseline).
- API Filter Coverage: `php spark api:filters-check` (No CRITICAL filter gaps).
- Rate-Limit Coverage: `php spark api:rate-limit-check` (Rate-limit coverage passed).

## Risks & Rollback
- Risk: Low. Purely additive validation, defensive routing, and unit tests.
- Rollback: Revert PR commit on `main`.
