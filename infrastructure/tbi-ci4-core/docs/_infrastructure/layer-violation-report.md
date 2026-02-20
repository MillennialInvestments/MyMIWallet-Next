# Layer Violation Report

## Layer model
1. CI4 Framework
2. TBI Core Infrastructure
3. Vertical Domain Modules
4. Branding/UI

## Audit result
- No Layer-3 domain classes are referenced by new Layer-2 integration clients under `infrastructure/tbi-ci4-core/app/Integrations`.
- Reporting/commands in Layer-2 generate docs only and do not invoke domain pipelines.

## Remaining upstream risks
- Source MyMIWallet libraries still combine domain orchestration with API transport.
- Those classes should stay in Layer-3 until transport is fully extracted.
