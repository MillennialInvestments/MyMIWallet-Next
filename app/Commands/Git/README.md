# Git Spark Commands

This command group adds repository and GitHub control through Spark.

## Commands

- `php spark git:status`
- `php spark git:commit "message"`
- `php spark git:push [branch]`
- `php spark git:pull [branch]`
- `php spark git:branch feature/x`
- `php spark git:pr:create "Title" [body]`
- `php spark git:sync [message]`
- `php spark git:health`

## Environment

Use `env/.env.github-control.example` as the tracked template for runtime configuration:

- `GITHUB_TOKEN`
- `GITHUB_REPO`
- `GITHUB_BASE_BRANCH`

## Safety Notes

- Git shell arguments are escaped before execution.
- Branch names are validated before checkout/push/pull operations.
- Every Git and GitHub action is logged with `log_message()` for traceability.
