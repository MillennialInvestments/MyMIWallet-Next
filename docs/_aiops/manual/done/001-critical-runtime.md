# Priority: Critical Runtime Errors

## Scope
Resolve all CRITICAL runtime errors logged after 2026-02-07 21:37:55.

## Target Errors
- Cannot declare class App\Config\SocialPlatforms
- Call to undefined function getCuID()
- getUserWallets() on null
- Undefined controller methods
- PageNotFoundException spikes

## Constraints
- Small PRs (1–3 fixes per PR)
- CI4 compliant
- No migrations unless explicitly required
- Defensive null guards preferred

## Completion Criteria
- Error no longer appears in logs:summarize
- PR merged
- Task moved to /done

## Notes (Human)
These errors block Alerts, Exchange, and Wallet flows.
