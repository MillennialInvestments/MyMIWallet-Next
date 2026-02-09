# Internal Orchestration API

All endpoints return:

```json
{
  "status": "ok|error",
  "data": {},
  "error": null,
  "meta": {}
}
```

## Auth
Provide header:
- `X-Internal-Token: <INTERNAL_API_TOKEN>`

## Endpoints
- `GET /API/Ops/healthcheck`
- `POST /API/Ops/app/update?dry_run=1&approve=0`
- `GET /API/Ops/commands`
- `GET /API/AiOps/snapshot`
- `GET /API/AiOps/gaps/docs`
- `POST /API/AiOps/watch`
- `GET /API/Logs/summary`
- `POST /API/ContentEngine/run`
- `GET /API/ContentEngine/drafts/{id}` (501 until implemented)
- `GET /API/Chat/health`
- `GET /API/Chat/usage` (501 until implemented)

## n8n call example
Use HTTP Request node:
- URL: `{{$env.MYMI_BASE_URL}}/API/Ops/healthcheck`
- Header: `X-Internal-Token: {{$env.MYMI_INTERNAL_TOKEN}}`
- Method: `GET`
