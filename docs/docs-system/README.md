# MyMI Wallet Documentation Automation System

This system provides automated discovery and documentation for the CI4 architecture.

## Commands

### Scan

List Services

php spark docs:services:list

List Controllers

php spark docs:controllers:list

List Views

php spark docs:views:list

List View Directories

php spark docs:views:dirs

### Export

Export View Inventory

php spark docs:views:export

### Generate Docs

Generate README for each docs directory

php spark docs:readme:build

### Full Sync

php spark docs:sync-system

## State Tracking

The system tracks processed directories in:

docs/_docs_state.json

This allows the generator to detect changed documentation and update only modified sections.

## Recommended Workflow

Run nightly:

php spark docs:sync-system
php spark aiops:docs-sync