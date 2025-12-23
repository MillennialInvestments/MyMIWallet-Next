# User-Space NGINX Start, Reload, and PID Recovery

## Title + Scope
Recover and validate the user-space NGINX instance that runs under `$HOME/nginx` on DreamHost (no sudo). Use when reload fails or the PID file looks stale.

## Symptoms
- `nginx: [error] open() "$HOME/nginx/logs/nginx.pid" failed (2: No such file or directory)`
- `nginx: [error] invalid PID number` or reload does nothing
- `nginx: [error] open() ... failed (2: No such file or directory)` after `nginx -s reload`
- Site not serving traffic even though config files exist

## Root cause (most likely)
The master process is not running, so `nginx -s reload` cannot signal it. A stale PID file may remain from an unclean stop.

## Safety notes
- All commands are read-only except for removing a stale PID file when explicitly stated.
- Do **not** use sudo; all paths are under `$HOME/nginx`.
- Validate with `nginx -t` before starting or reloading.

## Command Set (copy/paste blocks)
```bash
# 1) Check current PIDs and pid file
ps -ef | grep '[n]ginx'
cat "$HOME/nginx/logs/nginx.pid" 2>/dev/null || echo "no pid file"

# 2) Inspect last errors
tail -n 50 "$HOME/nginx/logs/error.log" 2>/dev/null || echo "no error log yet"

# 3) If pid file exists but process absent, remove it safely
if [ -f "$HOME/nginx/logs/nginx.pid" ] && ! ps -p "$(cat "$HOME/nginx/logs/nginx.pid" 2>/dev/null)" >/dev/null 2>&1; then
  echo "Removing stale pid file..."
  rm -f "$HOME/nginx/logs/nginx.pid"
fi

# 4) Config test before start/reload
"$HOME/nginx/sbin/nginx" -p "$HOME/nginx" -c conf/nginx.conf -t

# 5) Start (if not running)
"$HOME/nginx/sbin/nginx" -p "$HOME/nginx" -c conf/nginx.conf

# 6) Verify master/worker and pid
ps -ef | grep '[n]ginx'
cat "$HOME/nginx/logs/nginx.pid"

# 7) Reload safely after start
"$HOME/nginx/sbin/nginx" -p "$HOME/nginx" -c conf/nginx.conf -s reload

# 8) Confirm listening ports
ss -ltnp | grep nginx || echo "nginx not bound yet"
```

## Expected Output
- `nginx -t` prints `syntax is ok` and `test is successful`.
- `ps -ef` shows one master and at least one worker.
- PID file contains the master PID and matches the running process.
- `ss -ltnp | grep nginx` shows listeners (typically `*:80` and `*:443`) if the edge is pointed to this user-space instance.

## If output differs → Branch A/B/C steps
- **Branch A: `nginx -t` fails** → Fix the reported file/line, rerun `nginx -t`, then return here.
- **Branch B: No listeners after start** → Check `$HOME/nginx/conf/nginx.conf` for `listen` directives or whether another edge proxy fronts ports 80/443. Ensure the edge points to this user-space instance.
- **Branch C: PID file missing after start** → Tail the error log; a permission or path issue may prevent writing `logs/nginx.pid`.

## Fix steps
1. Remove stale PID file if the PID inside is not running.
2. Run `nginx -t` with `-p $HOME/nginx -c conf/nginx.conf`.
3. Start nginx with the same prefix and config flags.
4. Reload only after the master is confirmed running.

## Verification steps
- `nginx -t` returns success.
- `ps -ef | grep '[n]ginx'` shows master/worker.
- `cat $HOME/nginx/logs/error.log` has no new critical errors.
- `ss -ltnp | grep nginx` shows expected listeners.

## Rollback steps
- If a config change caused failure, revert the config file and rerun `nginx -t`.
- If start introduced problems, stop user-space nginx: `"$HOME/nginx/sbin/nginx" -p "$HOME/nginx" -c conf/nginx.conf -s quit`.

## Notes / Follow-ups
- Error log default: `$HOME/nginx/logs/error.log`. Access log: `$HOME/nginx/logs/access.log`.
- Use the [Daily Ops Quick Checks](../runbooks/00_daily_ops.md) regularly to catch PID issues early.
