# 2026-02-07 — Database Port Type Fix (MySQLi real_connect)

## Issue
Production logs showed the login route failing with:

- `mysqli::real_connect(): Argument #5 ($port) must be of type ?int, string given`
- Raised through `CodeIgniter\Database\BaseConnection` during early table checks.

## Root cause
In `app/Config/Database.php`, `database.default.port` was read from `env()` and assigned directly to the database config.

In CI4, `env()` values are string-based in typical `.env` usage, so a value like `"3306"` was passed to MySQLi where PHP 8.2 enforces strict typing for the `port` argument.

## Fix
Updated `app/Config/Database.php` constructor to:

1. Cast `database.default.port` to an integer.
2. Fallback to `3306` when the parsed value is invalid (`<= 0`).
3. Pass the normalized integer to the DB config array.

## Result
The MySQLi connection now receives an integer port (`?int`) and no longer throws a type error on login requests when `database.default.port` is configured as a string in environment files.
