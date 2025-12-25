<!-- FEATURE:staking -->
# Staking

## What this means
How staking would work if/when enabled.

## What we provide
- Validator selection or delegation options with clear reward cadence and lockup periods.
- Disclosures on how rewards are calculated, distributed, and displayed in-app.
- Notices before any unbonding periods or reward claim deadlines.

## What you agree
- You accept slashing risk, unbonding delays, and that rewards are not guaranteed.
- You authorize MyMI to pass through staking instructions to the network or validator partners on your behalf.

## Your responsibilities
- Review validator details, lockup timelines, and reward schedules before staking.
- Keep enough balance to cover network fees for stake/unstake/claim operations.
- Track taxable events related to staking rewards.

## Key limits & disclosures
- Staked assets may be locked and unavailable for transfers until unbonded.
- Network-level slashing or downtime can reduce your stake; MyMI does not backstop losses.
- Rewards may post after network finality and can change with validator performance.

<!-- INTERNAL:implementation-notes
- Planned staking orchestration: app/Services/SolanaService.php (stake helpers TBD); app/Libraries/MyMISolana.php (validator routing stubs)
- UI hooks: app/Modules/Exchange/Controllers/SolanaController.php (future staking endpoints)
-->
<!-- /FEATURE:staking -->
