# GT-NH-005 Validation

## Static checks

Run PHP lint against every GT-NH-005 PHP file, shell lint against
the smoke wrapper, and `git diff --check`.

## Contract checks

Run:

    php spark marketing:ingress:contract-smoke

    vendor/bin/phpunit \
      --bootstrap tests/_support/bootstrap.php \
      tests/unit/Marketing/MarketingZapierIngressServiceTest.php

    bash tests/smoke/marketing-zapier-ingress-contract-smoke.sh

## Route check

Run:

    php spark routes |
    grep -E 'API/Marketing/Ingress|MarketingIngressAPIController'

## Required outcome

The endpoint must remain disabled by default. Contract validation
must perform no database persistence and no external calls.

## Prohibited actions

Do not run the migration against production from this worktree.

Do not activate Zap MyMI 01, install a production secret, deploy,
merge, or send a live webhook without separate approval.

## Local full-stack HTTP limitation

The feature worktree intentionally has no database credentials.

A worktree-local HTTP server reached the correct MyMI Wallet front
controller, but global Shield/debug-toolbar processing attempted to load
database-backed settings and converted responses into HTTP 500 errors.

The GT-NH-005 filter rejection matrix is therefore validated through the
isolated `MarketingZapierIngressFilterTest`. Full-stack HTTP and
persistence testing remain deployment gates for an approved disposable or
staging MySQL environment.

This limitation does not authorize using production database credentials
from the feature worktree.

