# GT-001E-B4 Wallets API Replacement Coverage

## Status

Validation/report-only. No route redirect, no route deletion, no guard mutation, no controller restoration, no database mutation, no external API calls, and no production mutation.

## Purpose

Compare legacy Plaid and Robinhood Broker routes against existing Wallets-related route and controller coverage.

## Source Inputs

- GT-001E-B2_BROKER_OWNER_DECISION_MATRIX.csv
- app/Config/Routes.php
- app/Modules/APIs/Controllers/WalletsAPIController.php

## Generated Artifacts

- GT-001E-B4_BROKER_PROVIDER_ROUTE_REFERENCE.csv
- GT-001E-B4_WALLETS_ROUTE_REFERENCE.txt
- GT-001E-B4_WALLETS_CONTROLLER_REFERENCE.txt

## Counts

- Broker Plaid routes: 21
- Broker Robinhood routes: 42
- Wallets route reference rows: 116
- Wallets controller reference rows: 35

## Coverage Interpretation

- Broker Plaid and Robinhood routes remain legacy references.
- Wallets route reference excludes BrokerAPIController rows.
- Wallets controller reference identifies existing Plaid, Robinhood, and SnapTrade implementation coverage.
- B4 does not approve redirect, deprecation, route deletion, or controller restoration.

## Next Gate

Owner must decide whether each legacy Broker provider route should be redirected, deprecated, replaced by Wallets API coverage, or left blocked.
