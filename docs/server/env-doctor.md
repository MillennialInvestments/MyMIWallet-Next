# Env Doctor

Env Doctor provides a read-only diagnostics and snapshot workflow for DreamHost-hosted CodeIgniter 4 apps.

## Usage

```bash
php spark env:doctor
php spark env:doctor --pack
php spark env:doctor --cron
```

## Output

Files are written to `writable/env/`:

- `env-doctor-YYYYMMDD.json`
- `env-doctor-YYYYMMDD.md`
- `env-doctor-pack-YYYYMMDD.tar.gz` (only with `--pack`)

## Modes

### Standard
Creates JSON + Markdown snapshots and prints a summary to the CLI.

### `--pack`
Creates a tar.gz bundle containing the JSON and Markdown snapshot files.

### `--cron`
Silent mode for scheduled jobs:

- No pack file
- Summary-only handling
- Sends a Discord alert if status is not OK or if new CRITICAL findings appear

## Checks Included

- Shell environment (`.bashrc`, daemon launches, `.mymi-tools.sh`)
- CRON (`crontab -l`, `@reboot` supervisor entry)
- Supervisor config + running state
- PHP CLI version and socket discovery
- Nginx/Apache detection and handler validation
- CodeIgniter 4 health (`public/index.php`, writable perms, maintenance mode, log errors)
- System metrics (disk, memory, listening ports, process summary)

## Safety Constraints

- No sudo
- No service restarts
- Read-only inspection only
