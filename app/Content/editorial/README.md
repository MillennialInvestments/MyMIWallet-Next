# MyMI Editorial Copy — Proposed Source Contract

## Purpose

The homepage is content-driven but source-controlled. Editors can modify
plain-text copy in app/Content/editorial/public.home.json without
changing page layout markup. Only an authorized AIOps feature worktree can
promote these changes into committed source.

## Opt any existing view into editorial copy

1. Register app/Content/editorial/<page-id>.json with
   schema: mymi.editorial.v1, the exact page ID, and string fields.
2. In the view, load helper('mymi_editorial').
3. Render using esc(mymi_editorial_text(page-id, field, fallback)).
4. Keep URLs, HTML, PHP, JavaScript, permissions, and capability claims
   controlled by reviewed application source—not editable strings.
5. Create an AIOps task for any source-controlled text change. Preview and
   review exact diffs, then use ai finish for governed closeout.

## Secure Editorial Studio — separate Golden Task

An editor can author changes across registered public views in the management
application using a page/field registry, draft autosave, preview, revisions,
diff/review, role-separated publish approval, and rollback. Draft/publish
records live in an authorized content store (not source files). Implement
server-side field allowlists, CSRF, session/RBAC/tenant scoping, HTML escaping,
strict rich-text sanitization (when needed), audit events, concurrency checks,
and content version provenance. Never allow an HTTP request to write arbitrary
PHP template bytes. Source layout changes remain native AIOps Class-1 actions.

## Rollback and invariants

- Source rollback: revert the exact reviewed PR in a separate governed task,
  with no destructive Git operations.
- Content publishing, schema changes, and production deployment are separate
  approval domains.
- No real monetary balances, live trading, or investment-performance promises
  are fabricated by this template.
- This changes no registration endpoints, auth filters, databases, or third-party
  credentials; it replaces an inline registration form with existing routes.
- The dashboard preview is explicitly labeled illustrative.
