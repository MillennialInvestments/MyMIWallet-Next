# TBI Dual Coin Phase 2: Admin/User UI + Approval Workflow

Branch:
feature/tbi-dual-coin-phase-2-ui-workflow

Base:
main

Mission:
Build the UI and workflow layer for the merged TBI Dual Coin Project Foundation.

Existing Phase 1 files:
- app/Database/Migrations/2026-05-27-000100_CreateTbiProjectCoinTables.php
- app/Models/TbiProjectCoinModel.php
- app/Services/TbiProjectCoinService.php
- app/Modules/APIs/Controllers/TbiProjectCoinsAPIController.php
- app/Config/Routes.php TBI-Coins routes

Required implementation:

1. Admin UI
Create or extend the Projects admin area to manage TBI coins:
- View project TBI coins
- Create default TBI Investment Coin and TBI Utility Coin for a project
- View contribution ledger
- Approve contribution
- Reject contribution
- Prepare Solana mint payload
- Prepare Exchange asset payload

Use existing admin theme/layout conventions.

2. User/contributor UI
Create a contributor-facing page or modal that allows logged-in users to:
- Submit operational contribution
- Select category
- Enter description
- Enter USD value
- See calculated utility coin amount where $1 = 1 coin
- Submit for admin approval

3. API integration
Use existing routes:
- POST API/Projects/TBI-Coins/Create-Defaults/(:num)
- GET API/Projects/TBI-Coins/(:num)
- POST API/Projects/TBI-Coins/Record-Contribution
- POST API/Projects/TBI-Coins/Approve-Contribution/(:num)
- POST API/Projects/TBI-Coins/Reject-Contribution/(:num)
- POST API/Projects/TBI-Coins/Prepare-Solana-Mint/(:num)
- POST API/Projects/TBI-Coins/Prepare-Exchange-Asset/(:num)

4. Frontend JavaScript
Use fetch/AJAX, Bootstrap 4.6, jQuery if needed, and DataTables if displaying ledger rows.

5. Safety rules
- Do not perform live Solana minting.
- Do not enable secondary trading.
- Do not represent utility coin as investment.
- Do not represent investment coin as approved public security.
- Keep admin-only actions behind admin permissions.
- Keep contribution submission behind login.

6. Documentation
Create:
docs/_aiops/reports/tbi-dual-coin-project/PHASE_2_UI_WORKFLOW.md
docs/_aiops/reports/tbi-dual-coin-project/PHASE_2_VALIDATION.md

7. Validation
Run:
- php -l on all changed PHP files
- grep route checks
- document files changed
- document manual UI test paths

Do not modify unrelated marketing files.
