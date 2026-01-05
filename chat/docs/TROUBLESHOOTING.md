## ERR_MODULE_NOT_FOUND: jsonwebtoken

### Symptom
Chat fails to start with:
Error [ERR_MODULE_NOT_FOUND]: Cannot find package 'jsonwebtoken'

### Cause
Dependency imported in server.js but not installed in chat/node_modules.

### Fix
```bash
cd chat
npm install jsonwebtoken
```

### Prevention
- Always add new imports to package.json.
- Run npm install after pull.
