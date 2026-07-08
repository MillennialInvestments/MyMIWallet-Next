# GT-002-02D Controlled Auth Mutation Approval Checklist

## Status

APPROVAL_REQUIRED

## Required before execution

- [ ] Approval token equals `APPROVE GT-002-02D CONTROLLED AUTH MUTATION TEST`
- [ ] Dedicated test email supplied
- [ ] Dedicated test username supplied
- [ ] Dedicated test password supplied
- [ ] Inbox is controlled
- [ ] Account creation approved
- [ ] Activation/reset email send approved
- [ ] Pre-test DB row counts captured
- [ ] Pre-test auth/emergency log tail captured
- [ ] Stop conditions reviewed

## Mutation boundaries

Allowed only after approval:

- One controlled registration POST
- One controlled login POST, if applicable
- One controlled password reset request, if applicable
- One controlled activation/resend activation request, if applicable

Not allowed:

- Customer credential testing
- Bulk account creation
- User deletion
- Production rollback
- Rate-limit bypass
- CSRF bypass
- Table cleanup without separate approval
