# Phase 4A: MyMI Wallet to TBI Marketing Sync Client

MyMI Wallet can now prepare approved social export jobs for TBI Marketing.

Safety defaults:
- `MYMI_MARKETING_EXPORT_ENABLED=false`
- `TBI_MARKETING_API_BASE` required
- `TBI_MARKETING_API_KEY` required
- Only `approved` or `queued` jobs are eligible
- All sends are logged to `bf_social_delivery_logs`

Expected TBI endpoint:

```text
POST /API/Marketing/importDraft
Authorization: Bearer <TBI_MARKETING_API_KEY>
X-Source-App: mymiwallet
Content-Type: application/json
No external social posting is performed by this client.
