# GT-002-01C Home Parse Forward Hotfix

## Problem

PR #582 introduced a malformed PHP expression in `Home::index()` while adding the HEAD short-circuit.

The broken code used:

- `(string) ->request->getMethod()`
- `return ->response->setStatusCode(200);`

This caused the public homepage to return `500` for both GET and HEAD after deployment.

## Fix

This forward hotfix repairs the malformed expressions to:

- `$this->request->getMethod()`
- `$this->response->setStatusCode(200)`

## Production mutation

No production database mutation was performed.

No production rollback was performed.

This is a source-controlled forward fix.
