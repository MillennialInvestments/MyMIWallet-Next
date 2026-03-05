# Routes Export

- Generated (UTC): `2026-03-05T03:55:09Z`
- Environment: `development`
- Mode: `all`

## Summary
- Total routes: `6`
- Methods: `{"GET":0,"POST":0,"PUT":0,"DELETE":0,"PATCH":0,"OPTIONS":0,"CLI":6,"OTHER":0}`
- Surface groups: `{"API":3,"Public":3}`

## Routes

| Method | Route | Handler | Surface | Issues |
|---|---|---|---|---|
| CLI | API/Health | {"API/v1/Health":"\\App\\Modules\\APIs\\Controllers\\HealthAPIController::index"} | API | missing_target |
| CLI | API/Management/Run-CRON-Tasks | \App\Modules\Management\Controllers\ManagementAPIController::runCRONTasks | API | missing_target |
| CLI | API/Status | {"API/v1/Status":"\\App\\Modules\\APIs\\Controllers\\APIController::status"} | API | missing_target |
| CLI | Home | {"/":"\\App\\Controllers\\Home::index"} | Public | missing_target |
| CLI | News | Blog/News-And-Updates | Public |  |
| CLI | index.php/(.*) | $1 | Public |  |
