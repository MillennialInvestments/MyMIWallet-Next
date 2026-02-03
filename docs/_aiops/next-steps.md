# AI-Ops: Next Steps (Worker-Only Suggestions)
> Auto-generated. Do not edit manually.
> Run: 2026-02-02T13:49:31Z

## DOC_AUTHORITY
The documentation under `docs/aiops/**` generated from this queue is the
authoritative source of truth for AIOps models, services, and controllers.

For all future tasks:
- Do not modify or generate PHP code unless the relevant `docs/aiops/**` file exists
  and the change is explicitly supported or required by that documentation.
- When generating code, cite the specific `docs/aiops/**` file(s) used and state
  which acceptance criteria justify the change.
- Prefer minimal, additive changes.
- If documentation is insufficient to justify a code change, propose a DOC task,
  not a code task.
- Controller case-sensitivity issues (`AIOpsController.php` vs `AiOpsController.php`)
  must be resolved first in documentation before any renames or refactors occur.
- Migrations must be derived only from documented fields, documented relationships,
  and documented lifecycle rules.

## DOC_GAPS
- id: DOC-AIOPS-001
  type: doc
  target: app/Modules/AIOps/Models/AIOpsBudgetModel.php
  output: docs/aiops/models/aiops_budget.md
  acceptance:
    - describes purpose
    - lists fields
    - lists relationships
- id: DOC-AIOPS-002
  type: doc
  target: app/Modules/AIOps/Models/AIOpsCacheModel.php
  output: docs/aiops/models/aiops_cache.md
  acceptance:
    - describes purpose
    - lists fields
    - lists relationships
- id: DOC-AIOPS-003
  type: doc
  target: app/Modules/AIOps/Models/AIOpsDedupeModel.php
  output: docs/aiops/models/aiops_dedupe.md
  acceptance:
    - describes purpose
    - lists fields
    - lists relationships
- id: DOC-AIOPS-004
  type: doc
  target: app/Modules/AIOps/Models/AIOpsUsageModel.php
  output: docs/aiops/models/aiops_usage.md
  acceptance:
    - describes purpose
    - lists fields
    - lists relationships
- id: DOC-AIOPS-005
  type: doc
  target: app/Modules/AIOps/Models/AIOpsWorkflowUsageModel.php
  output: docs/aiops/models/aiops_workflow_usage.md
  acceptance:
    - describes purpose
    - lists fields
    - lists relationships
- id: DOC-AIOPS-006
  type: doc
  target: app/Modules/AIOps/Models/AIOpsWorkflowsModel.php
  output: docs/aiops/models/aiops_workflows.md
  acceptance:
    - describes purpose
    - lists fields
    - lists relationships
- id: DOC-AIOPS-007
  type: doc
  target: app/Modules/AIOps/Services/AIOpsGuardrailService.php
  output: docs/aiops/services/aiops_guardrail_service.md
  acceptance:
    - describes purpose
    - lists responsibilities
    - lists enforcement points
- id: DOC-AIOPS-008
  type: doc
  target: app/Modules/APIs/Controllers/AIController.php
  output: docs/aiops/controllers/ai_controller.md
  acceptance:
    - documents routes or endpoints
    - describes request/response contracts
    - lists auth/guard requirements
- id: DOC-AIOPS-009
  type: doc
  target: app/Modules/APIs/Controllers/AIOpsController.php
  output: docs/aiops/controllers/aiops_controller.md
  acceptance:
    - documents routes or endpoints
    - describes request/response contracts
    - lists auth/guard requirements
- id: DOC-AIOPS-010
  type: doc
  target: app/Modules/APIs/Controllers/AiOpsController.php
  output: docs/aiops/controllers/aiops_controller_case_variant.md
  acceptance:
    - documents routes or endpoints
    - explains relationship to AIOpsController.php
    - records decision on case-sensitivity handling

## STALE_DOCS
- id: STALE-001
  type: review
  target: docs/OVERVIEW.md
  output: docs/OVERVIEW.md
  acceptance:
    - reviewed for accuracy
    - adds links to new AIOps docs where relevant
- id: STALE-002
  type: review
  target: docs/README.md
  output: docs/README.md
  acceptance:
    - reviewed for accuracy
    - adds links to new AIOps docs where relevant
- id: STALE-003
  type: review
  target: docs/adr/0001-standards-and-response-contract.md
  output: docs/adr/0001-standards-and-response-contract.md
  acceptance:
    - reviewed for accuracy
    - adds links to new AIOps docs where relevant
- id: STALE-004
  type: review
  target: docs/adr/_index.md
  output: docs/adr/_index.md
  acceptance:
    - reviewed for accuracy
    - adds links to new AIOps docs where relevant
- id: STALE-005
  type: review
  target: docs/alerts/alerts_marketing_pipline.md
  output: docs/alerts/alerts_marketing_pipline.md
  acceptance:
    - reviewed for accuracy
    - adds links to new AIOps docs where relevant
- id: STALE-006
  type: review
  target: docs/auctions/_index.md
  output: docs/auctions/_index.md
  acceptance:
    - reviewed for accuracy
    - adds links to new AIOps docs where relevant
- id: STALE-007
  type: review
  target: docs/auctions/auction-schema.md
  output: docs/auctions/auction-schema.md
  acceptance:
    - reviewed for accuracy
    - adds links to new AIOps docs where relevant
- id: STALE-008
  type: review
  target: docs/bitcoin-standardization.md
  output: docs/bitcoin-standardization.md
  acceptance:
    - reviewed for accuracy
    - adds links to new AIOps docs where relevant
- id: STALE-009
  type: review
  target: docs/budget/UI-Suggestions.md
  output: docs/budget/UI-Suggestions.md
  acceptance:
    - reviewed for accuracy
    - adds links to new AIOps docs where relevant
- id: STALE-010
  type: review
  target: docs/budget/_index.md
  output: docs/budget/_index.md
  acceptance:
    - reviewed for accuracy
    - adds links to new AIOps docs where relevant

## HYGIENE
- id: HYGIENE-AIOPS-001
  type: hygiene
  target: docs/_aiops/*
  output: docs/_aiops/*
  acceptance:
    - every generated doc includes "Auto-generated. Do not edit manually."
