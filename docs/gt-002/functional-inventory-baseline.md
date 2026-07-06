# GT-002 MyMI Wallet User-Facing Functionality Certification Baseline

## Objective

Confirm every user-facing MyMI Wallet website feature and service is operational, identify broken flows, capture evidence, and create atomic Golden Tasks only for confirmed issues.

## Pivot marker

Current production marker: PR #577 / GT-001G-B1 Wallets route remediation matrix.

GT-001G-B2 is not continued unless a functional defect requires it.

## Scope

This baseline is read-only functional discovery.

This PR does not mutate production application code, does not delete files, does not rollback production, and does not continue abstract route/security classification as the primary deliverable.

## Discovery areas

1. Public homepage and public pages
2. Registration / login / logout / password reset
3. User dashboard
4. Wallets user flows
5. Alerts user flows
6. Budgeting user flows
7. Investments / predictions user flows
8. Referrals
9. Support / contact / tickets
10. Blog / knowledgebase / docs
11. Management/admin user-facing controls only if needed to support user workflows
12. API-backed user flows only where the UI depends on them

## Evidence artifacts

- `docs/gt-002/evidence/git-context.txt`
- `docs/gt-002/evidence/route-files.txt`
- `docs/gt-002/evidence/route-scan.txt`
- `docs/gt-002/evidence/controllers.txt`
- `docs/gt-002/evidence/views.txt`
- `docs/gt-002/evidence/spark-commands.txt`
- `docs/gt-002/functional-test-matrix.tsv`

## Certification policy

No fix is created from abstract route/security classification alone.

Every fix must start from a confirmed user-facing failure.

Every confirmed defect becomes an atomic Golden Task with:

- affected user flow
- reproduction steps
- observed result
- expected result
- route/controller/view/API evidence
- validation command
- smoke test
- rollback note
- PR reference
- post-deploy reconciliation note

## Service-branding rule

GreenQube is infrastructure/private cloud hosting.

The service brands are TBI AIOps and TBI Ollama.

## Next phase

After this baseline PR is validated and merged, GT-002 should move into read-only functional smoke discovery. Fix branches should only be created for confirmed broken user-facing flows.
