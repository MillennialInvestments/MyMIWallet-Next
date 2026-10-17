# MYMI-GTM-001 — Credential Containment Register

## Governing task

- Task: MYMI-GTM-001
- Priority: P0
- Scope: containment and redacted evidence only
- Tracked exposure: chat/.env
- Secret values recorded in this document: 0
- Replacement credentials committed to Git: 0

## Required external rotations

| Credential category | Owner | Status | Required action | Required redacted evidence |
|---|---|---|---|---|
| OpenAI-style API credential | MyMI OpenAI account/project owner | OWNER ACTION REQUIRED | Revoke the exposed credential, create a replacement, and install it only through the approved private runtime secret store. | Provider/account category, responsible owner, revocation or rotation timestamp, ticket/reference, completion timestamp, optional safely redacted identifier, verification status. |
| Database credentials | MyMI database/infrastructure owner | OWNER ACTION REQUIRED | Rotate every exposed database credential and update only the approved private runtime secret store. | Provider/account category, responsible owner, rotation timestamp, ticket/reference, completion timestamp, optional safely redacted identifier, verification status. |
| Basic-auth credentials | MyMI service/infrastructure owner | OWNER ACTION REQUIRED | Rotate every exposed basic-auth username/password credential at the owning service and update only the approved private runtime secret store. | Service category, responsible owner, rotation timestamp, ticket/reference, completion timestamp, optional safely redacted identifier, verification status. |
| Webhook credentials | MyMI integration owner | OWNER ACTION REQUIRED | Revoke or rotate every exposed webhook secret/token at the owning provider and update only the approved private runtime secret store. | Provider/category, responsible owner, revocation or rotation timestamp, ticket/reference, completion timestamp, optional safely redacted identifier, verification status. |
| Health/service credentials | MyMI infrastructure/service owner | OWNER ACTION REQUIRED | Rotate every exposed health/service credential and update only the approved private runtime secret store. | Service category, responsible owner, rotation timestamp, ticket/reference, completion timestamp, optional safely redacted identifier, verification status. |

## Status contract

Allowed states are NOT STARTED, OWNER ACTION REQUIRED, ROTATED / REVOKED, EVIDENCE PENDING, and VERIFIED.

MYMI-GTM-001 is not complete until every exposed credential has reached VERIFIED with redacted provider-side evidence and no secret value appears in any report.

## Current scanner gap

The current security:secrets-audit implementation checks the root .env and root .env.example targets and does not directly inspect nested chat/.env. Nested secret-scanning enforcement belongs to MYMI-GTM-003.

## Scope boundaries

- Do not expose, copy, print, serialize, or commit credential values.
- Do not modify chat/.env in MYMI-GTM-001.
- Safe tracked runtime-config replacement belongs to MYMI-GTM-002.
- Nested secret-scanning enforcement belongs to MYMI-GTM-003.
- No production mutation, deployment, database mutation, or Git-history rewrite is authorized by this task.
