# MYMI-GTM-002: Stop tracking `chat/.env`

- Status: PROPOSED (owner runs the host step before merge)
- Last updated: 2026-11-13
- Related: [MYMI-GTM-001 credential containment](MYMI-GTM-001_CREDENTIAL_CONTAINMENT.md)

## Why

`chat/.env` was committed and explicitly un-ignored (`!/chat/.env`) in a public repository. Every value it held was rotated under GTM-001 on 2026-11-13. While the file stays tracked, a commit made from a host checkout would publish the new values.

## Change

1. Remove `chat/.env` from the index (`git rm --cached`). Nothing is deleted from disk in this checkout.
2. Drop the `!/chat/.env` exception, so the existing `chat/.env*` rule ignores it.
3. Add `scripts/ops/credential-rotation/move-chat-env-to-shared.sh` for the host.

Git history is not rewritten. The historical values are already rotated, so they are dead credentials.

## Host step (before merge)

The production chat runs as `mymi-wallet-chat.service` from `current/chat`. A deploy or `git pull` that applies this change can remove `chat/.env` from a release folder. Before merging, the owner runs the script. It:

- copies the live file to `/apps/TBI/www/mymiwallet/shared/chat.env` with the same owner and group, mode 640;
- adds a systemd drop-in with `EnvironmentFile=` pointing at it, so every release gets the env whether or not `chat/.env` exists;
- replaces `current/chat/.env` with a symlink to the shared file;
- restarts the service and checks `/health`.

It prints no values.

## Evidence

| Step | Time (UTC) | Result |
| --- | --- | --- |
| Host script run | pending | pending |
| PR merged | pending | pending |
| `git ls-files chat/.env` on main is empty | pending | pending |
