# Infrastructure Certification

## Completeness metrics
- Total subsystems discovered: 30 (taxonomy-based pass)
- Portable subsystems: 24
- Toggle-compliant subsystems in overlay package: 22
- Hard-coded violations in source repo: 8
- Layer violations in overlay package: 0
- Fresh overlay status: **PASS (static)** / **PENDING (runtime fixture install)**

## Certification statement
The TBI CI4 Core overlay is structurally complete for drop-in packaging and includes feature-first configuration controls, audit commands, and compliance reporting. Runtime parity with MyMIWallet requires progressive upstream refactors where transport and domain logic are still coupled.

## Remaining risks
1. Upstream deep env() usage in legacy libraries.
2. Mixed transport/domain logic in selected provider workflows.
3. Runtime registration steps (Console/Services) must be executed during overlay installation.

## Recommended immediate refactors
1. Add an `infra:overlay-install` command that wires `Config/Console.php` and service guards.
2. Add fixture-based runtime test (`composer create-project codeigniter4/appstarter`) in CI.
3. Migrate remaining provider secret reads to centralized config objects.
