# AIOps Worker Guard — needs_patch_generation

AIOps must not mark an implementation task as completed unless at least one of these is true:

1. The worker generated a valid patch artifact under:
   - docs/_aiops/pr_ready/{instruction_id}/patch/
   - docs/_aiops/patch_jobs/{job_id}/diff.patch

2. The worker directly modified approved target files and `git diff --name-status` shows changes.

3. The task was explicitly classified as documentation-only.

For implementation tasks, if `aiops:worker` completes but:
- `git diff -- app/` is empty,
- no patch artifact exists,
- and no validation output proves code changed,

then mark the instruction lifecycle state as:

needs_patch_generation

not:

completed

The worker response should say:

"Completed planning/scaffolding only. No application patch was generated."
