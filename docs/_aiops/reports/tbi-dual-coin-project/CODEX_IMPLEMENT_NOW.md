Codex did not implement the requested feature yet. The branch currently only contains instruction documents.

Use this branch:

feature/tbi-dual-coin-project-foundation

You must now create actual code files.

Required files to create/modify:

1. Create:
app/Database/Migrations/2026-05-27-000100_CreateTbiProjectCoinTables.php

2. Create:
app/Models/TbiProjectCoinModel.php

3. Create:
app/Services/TbiProjectCoinService.php

4. Create:
app/Modules/APIs/Controllers/TbiProjectCoinsAPIController.php

5. Modify:
app/Config/Routes.php

Add routes under the existing API Projects group:
- POST Projects/TBI-Coins/Create-Defaults/(:num)
- GET Projects/TBI-Coins/(:num)
- POST Projects/TBI-Coins/Record-Contribution
- POST Projects/TBI-Coins/Approve-Contribution/(:num)
- POST Projects/TBI-Coins/Reject-Contribution/(:num)
- POST Projects/TBI-Coins/Prepare-Solana-Mint/(:num)
- POST Projects/TBI-Coins/Prepare-Exchange-Asset/(:num)

6. Create:
docs/_aiops/reports/tbi-dual-coin-project/TBI_DUAL_COIN_FOUNDATION.md

7. Create:
docs/_aiops/reports/tbi-dual-coin-project/VALIDATION.md

Follow:
docs/_aiops/instructions/2026-05-27-tbi-dual-coin-project-foundation.md

Do not only update documentation. This task requires code implementation.

Do not modify:
- app/Commands/Marketing/TBIMarketingTest.php
- app/Libraries/TBIMarketingClient.php

Do not perform live Solana minting.
Do not enable secondary/public trading by default.
