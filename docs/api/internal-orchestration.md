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
Provide either:
- `X-Internal-Token: <INTERNAL_API_TOKEN>`
- `Authorization: Bearer <INTERNAL_API_TOKEN>`

## Endpoints
- `GET /API/Ops/healthcheck`
- `POST /API/Ops/app/update?dry_run=1&approve=0`
- `GET /API/Ops/commands`
- `GET /API/AIOps/snapshot`
- `GET /API/AIOps/gaps/docs`
- `POST /API/AIOps/watch`
- `GET /API/Logs/summary`
- `POST /API/ContentEngine/run`
- `GET /API/ContentEngine/drafts/{id}` (501 until implemented)
- `GET /API/Chat/health`
- `GET /API/Chat/usage` (501 until implemented)

## n8n call example
Use HTTP Request node:
- URL: `{{$env.MYMI_BASE_URL}}/API/Ops/healthcheck`
- Header: `X-Internal-Token: {{$env.INTERNAL_API_TOKEN}}`
- Method: `GET`
