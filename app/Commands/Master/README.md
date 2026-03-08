# Master Spark Command Group

This group provides top-level documentation, architecture, and health inspection commands for the MyMI Wallet CI4 platform.

## Command Group
`master`

## Commands

### Knowledge Graph
- `php spark master:knowledge-graph:build`

Builds:
- `docs/_ci4_knowledge_graph.json`

Relationships include:
- Controller -> Model
- Controller -> View
- Controller -> Service
- Model -> Table

### Health Commands
- `php spark master:health:routes`
- `php spark master:health:controllers`
- `php spark master:health:services`
- `php spark master:health:models`
- `php spark master:health:docs`
- `php spark master:health:logs`
- `php spark master:health:views`
- `php spark master:health:commands`
- `php spark master:health:dependencies`

### Master Pipeline
- `php spark master:run-all`

Runs:
1. docs inventory
2. docs audit
3. docs readme build
4. knowledge graph build
5. all health reports

## Generated Files
- `docs/_ci4_knowledge_graph.json`
- `docs/_health_routes.json`
- `docs/_health_controllers.json`
- `docs/_health_services.json`
- `docs/_health_models.json`
- `docs/_health_docs.json`
- `docs/_health_logs.json`
- `docs/_health_views.json`
- `docs/_health_commands.json`
- `docs/_health_dependencies.json`

## Recommended Workflow

### Daily
```bash
php spark master:run-all
php spark aiops:docs-sync