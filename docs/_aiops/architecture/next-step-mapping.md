# NEXT STEP Mapping

- `aiops:doctor` -> `aiops:priority:build`
- `aiops:priority:build` -> `aiops:repair:run`
- `aiops:public-pages:run` -> `aiops:public-pages:report`
- `aiops:repair:run` -> `aiops:repair:run_safe`
- `aiops:repair:run_safe` -> `aiops:pr:create`
- `aiops:health:full` -> `aiops:doctor`
- `ops:doctor:full` -> `ops:report`
- `spark:fix` -> `aiops:doctor`
- `ops:propose-pr` -> `ops:report`
