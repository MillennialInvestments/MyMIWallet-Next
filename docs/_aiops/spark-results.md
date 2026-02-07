# AI-Ops: Spark Results
> Auto-generated. Do not edit manually.
> Run: 2026-02-07T18:00:02Z

## Command 1
- Cmd: `/usr/local/php82/bin/php spark logs:summarize`
- Exit: -1
- Output:

```
CodeIgniter v4.6.4 Command Line Tool - Server Time: 2026-02-07 18:00:03 UTC+00:00

Starting logs:summarize
Summary generated for 2026-02-07: /home/mymiteam/mymiwallet/site/current/writable/logs/summary-2026-02-07.log
Last processed timestamp updated to: 2026-02-07 18:00:02
total_entries=48
new_entries=9
⚠ Log summary: total=48, new=9
```

## Command 2
- Cmd: `/usr/local/php82/bin/php spark routes:list`
- Exit: -1
- Output:

```
CodeIgniter v4.6.4 Command Line Tool - Server Time: 2026-02-07 18:00:03 UTC+00:00
```

- Errors:

```
Command "routes:list" not found.
```

## Command 3
- Cmd: `/usr/local/php82/bin/php spark app:healthcheck`
- Exit: -1
- Output:

```
CodeIgniter v4.6.4 Command Line Tool - Server Time: 2026-02-07 18:00:03 UTC+00:00

Starting app:healthcheck

App healthcheck summary
----------------------------------------
marker: a83323457a08
file_log_path: /home/mymiteam/mymiwallet/site/current/writable/logs/log-2026-02-07.php
file_log_ok=false
overall=FAIL
```

- Errors:

```
db_log_ok=false (db not available: Unable to connect to the database.
Main connection [MySQLi]: mysqli::real_connect(): Argument #5 ($port) must be of type ?int, string given)
```

