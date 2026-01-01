# Gap Tracker

`docs/gap_tracker/gap_tracker.csv` tracks remediation work. Columns:

- **ID**: unique identifier.
- **Title**: concise issue summary.
- **Status**: `Open|In Progress|Blocked|Closed`.
- **Priority**: `P0|P1|P2|P3` (P0 highest urgency).
- **Effort**: `S|M|L|XL` estimated size.
- **Doc Source**: evidence doc link or `N/A`.
- **Code Evidence**: relevant file/function references.
- **Dependencies**: blocking items or systems.
- **Notes**: free-form context.
- **Owner**: responsible person or team.
- **Target Version**: release target like `v8.1.0`.

## Rules and Allowed Values
- Status must reflect current execution state; `Blocked` requires a note/dependency.
- Priority must be deterministic; ties broken by Effort (`S` before `XL`).
- Empty evidence/doc fields should be filled by the sync command when possible.
- Owner can be team names when individual unknown.

## “Next Work” Algorithm
Deterministic selection to recommend the next items:
1. Filter rows where **Status** is `Open` or `In Progress`.
2. Sort by **Priority** (`P0` → `P3`).
3. Within each priority, sort by **Effort** (`S` → `XL`).
4. Then sort by **Target Version** (lexicographic; earliest first) and **ID** as final tiebreaker.
5. Return the top N (default 10) as “Next Work.”
