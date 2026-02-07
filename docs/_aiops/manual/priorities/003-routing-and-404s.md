# Priority: Routing and 404 Noise Reduction

## Scope
Reduce avoidable PageNotFoundException spikes from invalid or outdated routes.

## Target Errors
- PageNotFoundException from known internal paths
- Missing controller actions referenced by active links
- Legacy route paths still called by UI components

## Constraints
- Small PRs focused on route/controller parity
- No broad route rewrites
- Keep user-facing URLs stable where possible

## Completion Criteria
- 404 spikes reduced in log summaries
- Route/controller mismatches corrected
- Task moved to /done

## Notes (Human)
This improves operational signal quality and reduces false-positive alerting.
