# Documentation Coverage Standard

Every production file MUST be covered by at least one of the following:

## Allowed Documentation Types

### 1. Module Overview
Path:
docs/modules/{module}/README.md

Covers:
- Purpose of the module
- Key controllers/models/services
- External dependencies
- Security considerations

### 2. Controller Doc
Path:
docs/controllers/{ModuleName}/{ControllerName}.md

Required sections:
- Purpose
- Routes exposed
- Auth requirements
- Input validation
- Side effects (DB, cache, queues)
- Related services/models

### 3. Model Doc
Path:
docs/models/{ModuleName}/{ModelName}.md

Required sections:
- Table(s)
- Fields used
- Write paths
- Read paths
- Caching behavior
- Guardrails

### 4. Service Doc
Path:
docs/services/{ServiceName}.md

Required sections:
- Responsibility
- Inputs / Outputs
- Failure modes
- Rate limits
- Called by

## Coverage Rule
A file is considered documented if:
- Its exact filename appears in any doc
OR
- It is listed under a module README
