# AI-Ops: Spark Results
> Auto-generated. Do not edit manually.
> Run: 2026-02-09T18:00:01Z

## Command 1
- Cmd: `/usr/local/php82/bin/php spark logs:summarize`
- Exit: -1
- Output:

```
CodeIgniter v4.7.0 Command Line Tool - Server Time: 2026-02-09 18:00:02 UTC+00:00

Starting logs:summarize
```

- Errors:

```
No log file found. Checked: /home/mymiteam/mymiwallet/site/current/writable/logs/log-2026-02-09.php, /home/mymiteam/mymiwallet/site/current/writable/logs/log-2026-02-09.log
```

## Command 2
- Cmd: `/usr/local/php82/bin/php spark routes:list`
- Exit: -1
- Output:

```
CodeIgniter v4.7.0 Command Line Tool - Server Time: 2026-02-09 18:00:03 UTC+00:00
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
CodeIgniter v4.7.0 Command Line Tool - Server Time: 2026-02-09 18:00:03 UTC+00:00

Starting app:healthcheck

App healthcheck summary
----------------------------------------
marker: c6987f849b19
file_log_path: /home/mymiteam/mymiwallet/site/current/writable/logs/log-2026-02-09.php
file_log_ok=false
overall=FAIL
```

- Errors:

```
db_log_ok=false (db not available: You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near '%c6987f849b19%' at line 4)
```

