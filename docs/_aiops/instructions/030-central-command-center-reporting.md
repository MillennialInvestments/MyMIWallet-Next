# 030 — Central Command Center Reporting (MyMI Wallet)

## Reporting targets
- Primary web control plane: `https://www.timothyburks.com`
- Centralized AIOps endpoint: `https://aiops.timothyburks.com`

## Report classes
1. Command surface snapshot.
2. Gap matrix + classification.
3. Critical health indicators.
4. Open AIOps task queue status.

## Transport strategy
- Prefer async/background Spark execution.
- Store local report artifact before attempting remote post.
- If remote post fails, mark retryable state and keep local artifact.

## Recommended schedule
- Nightly reporting job.
- On-demand reporting after command changes.
- Release-gate reporting before production deployments.
