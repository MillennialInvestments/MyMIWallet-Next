# n8n Ops Workflow Imports

1. Open **n8n → Import from File** and select any JSON from `docs/n8n/workflows/`.
2. After import, set `baseUrl` (defaults to `https://mymiwallet.com`) and `sharedSecret` to match your `/API/Ops` HMAC secret.
3. Enable the workflow and adjust the Cron/Webhook trigger schedules as needed.
4. Each workflow dispatches a job, polls `/API/Ops/status` with `queue_id`, and posts markdown to `/API/Ops/ingestReport`.
5. Manual webhook workflow listens on `POST /webhook/ops-run-now` and accepts `job_key`, optional `payload`, `baseUrl`, or `sharedSecret` overrides.
