# AIOps Governance Standard

This standard defines non-negotiable rules for the AIOps worker in the Spark-only control plane. It is enforced by code and CI, not policy prose.

## Non-Negotiable Rules

1. **Spark decides. AIOps suggests.**
2. **AIOps never executes commands.** It only writes proposals and task payloads.
3. **All enforcement is in code.** Guardrails are enforced by `SafeBaseCommand` + `AIOpsPolicy`.
4. **All actions emit artifacts.** No silent execution is allowed.
5. **No nested Spark execution.** AIOps cannot call `php spark`.

## Task Queue Requirements

- **Queue is append-only** with immutable task IDs.
- **Tasks must include artifacts** (summary + report).
- **Tasks reference the Spark command** that produced the artifact.
- **Tasks include execution context:** env, timestamp, commit SHA (if available).

## Cost & Quota Enforcement Expectations

- **AIOps must respect hard caps** defined in policy (daily token budget, task count, API call limits).
- **When caps are reached**, AIOps must stop enqueueing and emit a quota artifact.
- **Quota violations are guardrail failures** and must exit with a non-zero code.

## Human-Approval Boundaries

- **AIOps cannot approve.** Humans (or explicit CI policy) must pass `--approve`.
- **All mutations require `--dry-run` + `--approve`.**
- **Production mutations require explicit allowlisting** in `AIOpsPolicy`.

## CI Enforcement Expectations

- **CI runs read-only commands only.**
- **CI blocks destructive commands** even if `--approve` is provided.
- **CI validates command registration** (`app/Config/Console.php`) and Spark metadata rules.

## Auditability

- **Every task must be traceable** to a Spark command run.
- **Artifacts are the source of truth** for AIOps suggestions.
- **All decisions must be reproducible** from stored artifacts and command inputs.
