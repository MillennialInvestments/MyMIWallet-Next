# MYMI-GTM-009 — Pull-request and stacked-branch lineage

Generated UTC: 2026-10-22T20:53:01.770935+00:00
Repository: MillennialInvestments/MyMIWallet-Next
Task acceptance: Complete and certify “Reconcile open pull-request and stacked-branch lineage” with targeted positive, negative, authorization, and failure evidence as applicable; record risks, rollback, and atomic successors.

**Status: EVIDENCE GENERATED — OWNER REVIEW REQUIRED.**
This report cannot certify the GTM task, close a PR, or authorize a merge.

| PR | State | Head | Scope | Disposition |
|---|---|---|---|---|
| [#623](https://github.com/MillennialInvestments/MyMIWallet-Next/pull/623) | OPEN | `85ffa7bdd883` | `.github/workflows/aiops-auto-run.yml, .github/workflows/aiops-manual-run.yml (+15)` | PARTIAL_SCOPE_OVERLAP_OWNER_REVIEW_REQUIRED |
| [#629](https://github.com/MillennialInvestments/MyMIWallet-Next/pull/629) | OPEN | `d795a00afd04` | `.github/workflows/ci-health.yml` | SUPERSEDED_CANDIDATE_OWNER_REVIEW_REQUIRED |
| [#630](https://github.com/MillennialInvestments/MyMIWallet-Next/pull/630) | MERGED | `63a55b8b39d0` | `app/Commands/Runtime/SparkOptimize.php` | MERGED_HISTORY_NOT_TASK_CERTIFICATION |
| [#631](https://github.com/MillennialInvestments/MyMIWallet-Next/pull/631) | OPEN | `948d50ff96df` | `.github/workflows/ci-health.yml` | SUPERSEDED_CANDIDATE_OWNER_REVIEW_REQUIRED |
| [#632](https://github.com/MillennialInvestments/MyMIWallet-Next/pull/632) | MERGED | `fcbd81f8a697` | `app/Commands/Runtime/Diagnose502.php` | MERGED_HISTORY_NOT_TASK_CERTIFICATION |
| [#633](https://github.com/MillennialInvestments/MyMIWallet-Next/pull/633) | OPEN | `cfe6f231b029` | `.github/workflows/ci-health.yml` | SUPERSEDED_CANDIDATE_OWNER_REVIEW_REQUIRED |
| [#634](https://github.com/MillennialInvestments/MyMIWallet-Next/pull/634) | MERGED | `4f658be4ae8e` | `.github/workflows/ci-health.yml` | MERGED_HISTORY_NOT_TASK_CERTIFICATION |
| [#637](https://github.com/MillennialInvestments/MyMIWallet-Next/pull/637) | MERGED | `3779379cc3de` | `.github/workflows/aiops-auto-run.yml, .github/workflows/aiops-manual-run.yml` | MERGED_HISTORY_NOT_TASK_CERTIFICATION |

## Complete current open-PR inventory and stacked parents

Open PR count from live GitHub: 102

| PR | Base branch | Head branch | Stack assessment |
|---|---|---|---|
| [#4](https://github.com/MillennialInvestments/MyMIWallet-Next/pull/4) | `main` | `codex/fix-myth/auth-redirect-logic` | MAIN_BASE |
| [#5](https://github.com/MillennialInvestments/MyMIWallet-Next/pull/5) | `main` | `codex/diagnose-datatable-not-a-function-error` | MAIN_BASE |
| [#6](https://github.com/MillennialInvestments/MyMIWallet-Next/pull/6) | `main` | `codex/diagnose-datatable-not-a-function-error-jr1s8u` | MAIN_BASE |
| [#7](https://github.com/MillennialInvestments/MyMIWallet-Next/pull/7) | `main` | `codex/refactor-userservice-to-handle-guest-users` | MAIN_BASE |
| [#8](https://github.com/MillennialInvestments/MyMIWallet-Next/pull/8) | `main` | `codex/fix-undefined-method-in-mymibudget` | MAIN_BASE |
| [#9](https://github.com/MillennialInvestments/MyMIWallet-Next/pull/9) | `main` | `codex/add-news-preview-helper-for-dashboard` | MAIN_BASE |
| [#10](https://github.com/MillennialInvestments/MyMIWallet-Next/pull/10) | `main` | `codex/fix-sidebar-dropdown-and-button-hover-issues` | MAIN_BASE |
| [#11](https://github.com/MillennialInvestments/MyMIWallet-Next/pull/11) | `main` | `codex/fix-missing-bf_project_commitments-table` | MAIN_BASE |
| [#12](https://github.com/MillennialInvestments/MyMIWallet-Next/pull/12) | `main` | `codex/fix-typeerror-in-view-for-investments` | MAIN_BASE |
| [#13](https://github.com/MillennialInvestments/MyMIWallet-Next/pull/13) | `main` | `codex/upgrade-referral-program-dashboard-features` | MAIN_BASE |
| [#14](https://github.com/MillennialInvestments/MyMIWallet-Next/pull/14) | `main` | `codex/fix-undefined-method-normalizerenderdata-in-usercontroller` | MAIN_BASE |
| [#15](https://github.com/MillennialInvestments/MyMIWallet-Next/pull/15) | `main` | `codex/audit-and-fix-walletsmodule-workflows` | MAIN_BASE |
| [#16](https://github.com/MillennialInvestments/MyMIWallet-Next/pull/16) | `main` | `codex/create-inventory-of-mymi-wallet-functionality` | MAIN_BASE |
| [#17](https://github.com/MillennialInvestments/MyMIWallet-Next/pull/17) | `main` | `codex/analyze-mymi-streaming-functionality-and-integration-plan` | MAIN_BASE |
| [#18](https://github.com/MillennialInvestments/MyMIWallet-Next/pull/18) | `main` | `codex/build-seo-page-inventory-from-feature-inventory` | MAIN_BASE |
| [#19](https://github.com/MillennialInvestments/MyMIWallet-Next/pull/19) | `main` | `codex/build-syndication-inventory-for-mymi-wallet` | MAIN_BASE |
| [#20](https://github.com/MillennialInvestments/MyMIWallet-Next/pull/20) | `main` | `codex/build-content_hub_inventory-for-public-content` | MAIN_BASE |
| [#21](https://github.com/MillennialInvestments/MyMIWallet-Next/pull/21) | `main` | `codex/fix-wallets-routing-and-display-issues` | MAIN_BASE |
| [#22](https://github.com/MillennialInvestments/MyMIWallet-Next/pull/22) | `main` | `codex/fix-view-typeerror-in-investments-module` | MAIN_BASE |
| [#23](https://github.com/MillennialInvestments/MyMIWallet-Next/pull/23) | `main` | `codex/harden-elevenlabs-integration-and-handle-401-errors` | MAIN_BASE |
| [#24](https://github.com/MillennialInvestments/MyMIWallet-Next/pull/24) | `main` | `codex/accelerate-mymi-alert-pipeline-development` | MAIN_BASE |
| [#25](https://github.com/MillennialInvestments/MyMIWallet-Next/pull/25) | `main` | `codex/prepare-alerts-management-module-integration` | MAIN_BASE |
| [#26](https://github.com/MillennialInvestments/MyMIWallet-Next/pull/26) | `main` | `codex/review-trade-alert-and-marketing-pipeline` | MAIN_BASE |
| [#27](https://github.com/MillennialInvestments/MyMIWallet-Next/pull/27) | `main` | `codex/fix-and-polish-preview-alert-landing-page` | MAIN_BASE |
| [#28](https://github.com/MillennialInvestments/MyMIWallet-Next/pull/28) | `main` | `codex/normalize-url-and-routes-for-preview-page` | MAIN_BASE |
| [#29](https://github.com/MillennialInvestments/MyMIWallet-Next/pull/29) | `main` | `codex/create-daily-notes-entry-for-2025-11-23` | MAIN_BASE |
| [#30](https://github.com/MillennialInvestments/MyMIWallet-Next/pull/30) | `main` | `codex/centralize-apis-and-refine-log-handling` | MAIN_BASE |
| [#31](https://github.com/MillennialInvestments/MyMIWallet-Next/pull/31) | `main` | `codex/optimize-management/alerts-performance-and-fix-uri-bug` | MAIN_BASE |
| [#32](https://github.com/MillennialInvestments/MyMIWallet-Next/pull/32) | `main` | `codex/eliminate-segment-from-urls` | MAIN_BASE |
| [#33](https://github.com/MillennialInvestments/MyMIWallet-Next/pull/33) | `main` | `codex/verify-and-harden-discord-config` | MAIN_BASE |
| [#34](https://github.com/MillennialInvestments/MyMIWallet-Next/pull/34) | `main` | `codex/fix-badrequest-errors-and-improve-uri-logging` | MAIN_BASE |
| [#35](https://github.com/MillennialInvestments/MyMIWallet-Next/pull/35) | `main` | `codex/fix-wallets-routing-and-logging-issues` | MAIN_BASE |
| [#36](https://github.com/MillennialInvestments/MyMIWallet-Next/pull/36) | `main` | `codex/fix-view-argument-type-error` | MAIN_BASE |
| [#37](https://github.com/MillennialInvestments/MyMIWallet-Next/pull/37) | `main` | `codex/fix-wallets/debt/edit/account-routing-issue` | MAIN_BASE |
| [#38](https://github.com/MillennialInvestments/MyMIWallet-Next/pull/38) | `main` | `codex/fix-url-generation-for-segments` | MAIN_BASE |
| [#39](https://github.com/MillennialInvestments/MyMIWallet-Next/pull/39) | `main` | `codex/implement-liquidity-scanner-discord-notifications` | MAIN_BASE |
| [#40](https://github.com/MillennialInvestments/MyMIWallet-Next/pull/40) | `main` | `codex/fix-uri-guard-and-route-placeholders` | MAIN_BASE |
| [#41](https://github.com/MillennialInvestments/MyMIWallet-Next/pull/41) | `main` | `codex/fix-getinvestmentdashboard-null-error` | MAIN_BASE |
| [#42](https://github.com/MillennialInvestments/MyMIWallet-Next/pull/42) | `main` | `codex/update-uri_guard-to-ignore-encoded-placeholders` | MAIN_BASE |
| [#44](https://github.com/MillennialInvestments/MyMIWallet-Next/pull/44) | `main` | `codex/harden-solanaservice-error-handling` | MAIN_BASE |
| [#45](https://github.com/MillennialInvestments/MyMIWallet-Next/pull/45) | `main` | `codex/fix-badrequestexception-for-malformed-uris` | MAIN_BASE |
| [#46](https://github.com/MillennialInvestments/MyMIWallet-Next/pull/46) | `main` | `codex/fix-solana-cache-key-errors` | MAIN_BASE |
| [#47](https://github.com/MillennialInvestments/MyMIWallet-Next/pull/47) | `main` | `codex/create-comprehensive-discord-integration-guide` | MAIN_BASE |
| [#49](https://github.com/MillennialInvestments/MyMIWallet-Next/pull/49) | `main` | `codex/fix-critical-issues-and-sql-schema` | MAIN_BASE |
| [#50](https://github.com/MillennialInvestments/MyMIWallet-Next/pull/50) | `main` | `codex/build-mymi-ai-copilot-foundations` | MAIN_BASE |
| [#51](https://github.com/MillennialInvestments/MyMIWallet-Next/pull/51) | `main` | `codex/create-investmentsnewsmodel-and-api-endpoints` | MAIN_BASE |
| [#52](https://github.com/MillennialInvestments/MyMIWallet-Next/pull/52) | `main` | `codex/build-weekly-stream-watchlist-pipeline-is1dci` | MAIN_BASE |
| [#53](https://github.com/MillennialInvestments/MyMIWallet-Next/pull/53) | `main` | `codex/build-weekly-stream-watchlist-pipeline` | MAIN_BASE |
| [#55](https://github.com/MillennialInvestments/MyMIWallet-Next/pull/55) | `main` | `codex/expand-mymi-wallet-discord-server-and-integration` | MAIN_BASE |
| [#56](https://github.com/MillennialInvestments/MyMIWallet-Next/pull/56) | `main` | `codex/implement-onboarding-step-completion-logic` | MAIN_BASE |
| [#57](https://github.com/MillennialInvestments/MyMIWallet-Next/pull/57) | `main` | `codex/add-email-backfill-button-and-job` | MAIN_BASE |
| [#59](https://github.com/MillennialInvestments/MyMIWallet-Next/pull/59) | `main` | `codex/fix-unknown-legacy-property-stringashtml` | MAIN_BASE |
| [#60](https://github.com/MillennialInvestments/MyMIWallet-Next/pull/60) | `main` | `codex/implement-kimi-k2-ai-system-toggle` | MAIN_BASE |
| [#61](https://github.com/MillennialInvestments/MyMIWallet-Next/pull/61) | `main` | `codex/deep-integrate-kimi-with-mymi` | MAIN_BASE |
| [#62](https://github.com/MillennialInvestments/MyMIWallet-Next/pull/62) | `main` | `codex/build-daily-scanner-content-engine-framework` | MAIN_BASE |
| [#63](https://github.com/MillennialInvestments/MyMIWallet-Next/pull/63) | `main` | `codex/perform-content-engine-integration-audit` | MAIN_BASE |
| [#64](https://github.com/MillennialInvestments/MyMIWallet-Next/pull/64) | `main` | `codex/audit-and-enhance-myth/auth-registration` | MAIN_BASE |
| [#65](https://github.com/MillennialInvestments/MyMIWallet-Next/pull/65) | `main` | `codex/fix-routing-errors-and-duplicates` | MAIN_BASE |
| [#66](https://github.com/MillennialInvestments/MyMIWallet-Next/pull/66) | `main` | `codex/align-api/ui-routes-with-controllers` | MAIN_BASE |
| [#67](https://github.com/MillennialInvestments/MyMIWallet-Next/pull/67) | `main` | `codex/fix-reserved-characters-in-cache-keys` | MAIN_BASE |
| [#68](https://github.com/MillennialInvestments/MyMIWallet-Next/pull/68) | `main` | `codex/implement-mail-provider-api-integration` | MAIN_BASE |
| [#69](https://github.com/MillennialInvestments/MyMIWallet-Next/pull/69) | `main` | `codex/find-and-fix-landing-page-issues` | MAIN_BASE |
| [#71](https://github.com/MillennialInvestments/MyMIWallet-Next/pull/71) | `main` | `codex/audit-and-document-scripts-in-/scripts` | MAIN_BASE |
| [#72](https://github.com/MillennialInvestments/MyMIWallet-Next/pull/72) | `main` | `codex/build-project-control-center-dashboard` | MAIN_BASE |
| [#73](https://github.com/MillennialInvestments/MyMIWallet-Next/pull/73) | `main` | `codex/integrate-quant-overledger-into-mymiexchange` | MAIN_BASE |
| [#75](https://github.com/MillennialInvestments/MyMIWallet-Next/pull/75) | `main` | `codex/review-and-audit-scripts-in-/scripts` | MAIN_BASE |
| [#76](https://github.com/MillennialInvestments/MyMIWallet-Next/pull/76) | `main` | `codex/update-registration-resilience-and-mail-service` | MAIN_BASE |
| [#77](https://github.com/MillennialInvestments/MyMIWallet-Next/pull/77) | `main` | `codex/align-logs-summarize-and-logs-healthcheck-with-ci4` | MAIN_BASE |
| [#79](https://github.com/MillennialInvestments/MyMIWallet-Next/pull/79) | `main` | `codex/build-view-viewer-/-live-preview-tool` | MAIN_BASE |
| [#83](https://github.com/MillennialInvestments/MyMIWallet-Next/pull/83) | `main` | `codex/create-go-live-documentation-structure` | MAIN_BASE |
| [#227](https://github.com/MillennialInvestments/MyMIWallet-Next/pull/227) | `main` | `codex/build-automated-nightly-log-summarization-pipeline` | MAIN_BASE |
| [#254](https://github.com/MillennialInvestments/MyMIWallet-Next/pull/254) | `main` | `codex/implement-spark-command-control-for-dreamhost-vps-2c30xg` | MAIN_BASE |
| [#258](https://github.com/MillennialInvestments/MyMIWallet-Next/pull/258) | `main` | `codex/fix-ci4.7-governance-compatibility-issues` | MAIN_BASE |
| [#296](https://github.com/MillennialInvestments/MyMIWallet-Next/pull/296) | `main` | `codex/automate-codeigniter-4-config-review` | MAIN_BASE |
| [#303](https://github.com/MillennialInvestments/MyMIWallet-Next/pull/303) | `main` | `codex/audit-and-correct-cacheinterface-usage` | MAIN_BASE |
| [#330](https://github.com/MillennialInvestments/MyMIWallet-Next/pull/330) | `main` | `codex/refactor-routing-and-phase-management` | MAIN_BASE |
| [#343](https://github.com/MillennialInvestments/MyMIWallet-Next/pull/343) | `main` | `codex/expand-how-it-works-module` | MAIN_BASE |
| [#344](https://github.com/MillennialInvestments/MyMIWallet-Next/pull/344) | `main` | `codex/add-spark-command-for-stock-report` | MAIN_BASE |
| [#345](https://github.com/MillennialInvestments/MyMIWallet-Next/pull/345) | `main` | `codex/build-public-real-time-chart-preview-system` | MAIN_BASE |
| [#356](https://github.com/MillennialInvestments/MyMIWallet-Next/pull/356) | `main` | `codex/audit-spark-command-migration-and-dependencies` | MAIN_BASE |
| [#462](https://github.com/MillennialInvestments/MyMIWallet-Next/pull/462) | `main` | `codex/review-transaction-modal-css-and-lifecycle` | MAIN_BASE |
| [#468](https://github.com/MillennialInvestments/MyMIWallet-Next/pull/468) | `main` | `fix/aiops-managedrepo-bootstrap` | MAIN_BASE |
| [#469](https://github.com/MillennialInvestments/MyMIWallet-Next/pull/469) | `fix/log-noise-route-hygiene-2026-05-30` | `codex/implement-fix-for-log-noise-route-hygiene` | NONMAIN_BASE_PARENT_NOT_OPEN_REVIEW |
| [#511](https://github.com/MillennialInvestments/MyMIWallet-Next/pull/511) | `main` | `fix/phase-16-browser-runtime-smoke-fixture-split` | MAIN_BASE |
| [#527](https://github.com/MillennialInvestments/MyMIWallet-Next/pull/527) | `main` | `fix/ci-recovery-v2` | MAIN_BASE |
| [#533](https://github.com/MillennialInvestments/MyMIWallet-Next/pull/533) | `feature/mymi-gt001b-route-guard-classification` | `feature/mymi-gt001c-route-guard-implementation` | NONMAIN_BASE_PARENT_NOT_OPEN_REVIEW |
| [#534](https://github.com/MillennialInvestments/MyMIWallet-Next/pull/534) | `feature/mymi-gt001c-route-guard-implementation` | `feature/mymi-gt001c-b-help-account-guard` | OPEN_PR_PARENT_#533 |
| [#535](https://github.com/MillennialInvestments/MyMIWallet-Next/pull/535) | `feature/mymi-gt001c-b-help-account-guard` | `feature/mymi-gt001c-c-bitcoin-api-token-guard` | OPEN_PR_PARENT_#534 |
| [#536](https://github.com/MillennialInvestments/MyMIWallet-Next/pull/536) | `feature/mymi-gt001c-c-bitcoin-api-token-guard` | `feature/mymi-gt001c-d-internal-cron-guard` | OPEN_PR_PARENT_#535 |
| [#537](https://github.com/MillennialInvestments/MyMIWallet-Next/pull/537) | `feature/mymi-gt001c-d-internal-cron-guard` | `feature/mymi-gt001c-e-marketing-cron-guard` | OPEN_PR_PARENT_#536 |
| [#538](https://github.com/MillennialInvestments/MyMIWallet-Next/pull/538) | `feature/mymi-gt001c-e-marketing-cron-guard` | `feature/mymi-gt001c-f-predictions-cron-guard` | OPEN_PR_PARENT_#537 |
| [#539](https://github.com/MillennialInvestments/MyMIWallet-Next/pull/539) | `feature/mymi-gt001c-f-predictions-cron-guard` | `feature/mymi-gt001c-g-scanner-internal-guard` | OPEN_PR_PARENT_#538 |
| [#540](https://github.com/MillennialInvestments/MyMIWallet-Next/pull/540) | `feature/mymi-gt001c-g-scanner-internal-guard` | `feature/mymi-gt001c-h-alerts-internal-guard` | OPEN_PR_PARENT_#539 |
| [#541](https://github.com/MillennialInvestments/MyMIWallet-Next/pull/541) | `feature/mymi-gt001c-h-alerts-internal-guard` | `feature/mymi-gt001c-i-ops-internal-guard` | OPEN_PR_PARENT_#540 |
| [#603](https://github.com/MillennialInvestments/MyMIWallet-Next/pull/603) | `main` | `feature/gt-002-functional-gap-tracker` | MAIN_BASE |
| [#611](https://github.com/MillennialInvestments/MyMIWallet-Next/pull/611) | `main` | `feature/mymi-gtm-055-public-surface-repair` | MAIN_BASE |
| [#618](https://github.com/MillennialInvestments/MyMIWallet-Next/pull/618) | `main` | `feature/mymi-strategy-validation-cli-orchestration-gt2` | MAIN_BASE |
| [#623](https://github.com/MillennialInvestments/MyMIWallet-Next/pull/623) | `main` | `feature/mymi-gtm-004-repair-aiops-command-and-workflow-contract` | MAIN_BASE |
| [#629](https://github.com/MillennialInvestments/MyMIWallet-Next/pull/629) | `main` | `feature/mymi-gtm-005-ci-health-yaml-syntax` | MAIN_BASE |
| [#631](https://github.com/MillennialInvestments/MyMIWallet-Next/pull/631) | `main` | `feature/mymi-gtm-005-ci-health-post630-successor-r1` | MAIN_BASE |
| [#633](https://github.com/MillennialInvestments/MyMIWallet-Next/pull/633) | `main` | `feature/mymi-gtm-005-health-post632-r2` | MAIN_BASE |
| [#638](https://github.com/MillennialInvestments/MyMIWallet-Next/pull/638) | `main` | `feature/aiops-safe-unzip-20261016-001` | MAIN_BASE |

## Evidence interpretation

- PRs #630, #632, #634, #637 are assessed from live GitHub state, not inferred from worktree names.
- For #629, #631, #633, matching added lines in current main is **only a supersession candidate**; it is not proof of complete patch equivalence.
- PR #623 overlaps workflow work with #637 but carries wider source scope; review its remaining changes before any disposition.
- Nonmain PR bases are flagged, including stacked parents that are not themselves open PRs; confirm ancestry manually before rebases.
- Do not merge or close open PRs without named owner review. Do not equate merged changes with whole-task acceptance.

## Targeted acceptance cases

- Positive: merged-PR records retain exact number/state/head; no merged record is silently marked task-complete.
- Negative: missing file patches and unexpected changed-file scope fail closed.
- Authorization: tool operates read-only; closes, approvals, and deployments are outside the command surface.
- Failure: GitHub request failures or missing task catalog stop the report instead of emitting success.

## Owner-gated follow-up

1. Confirm merged PR code against GTM-004 and GTM-005 acceptance requirements and CI results.
2. Examine #623 independently; preserve nonduplicated changes as atomic successors if needed.
3. Review #629/#631/#633 for closure as superseded; owner decides, tool does not close.
4. Assess every other open PR and stacked-branch ancestry shown in the full inventory above before certifying GTM-009.

## Rollback and risks

- No production changes. No GitHub mutations. Feature-branch reports can be reverted through an owner-reviewed PR.
- Live data can change after report generation; recheck GitHub before owner actions.
- Matching added lines may occur outside intended stanza; inspect actual diffs before classifying closure.
