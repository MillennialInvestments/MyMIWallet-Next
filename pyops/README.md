# PyOps

Local Python automation runtime for MyMI Wallet AIOps commands.

## Usage

```bash
php spark aiops:py docs.index
php spark aiops:py php.lint --payload='{"targets":["app/Commands/AIOps/PyOps.php"]}'
php spark aiops:py patch.propose --payload='{"summary":"Describe the target change"}'
```

## Notes

- The runtime is CLI-first and intended to be executed from Spark commands.
- `writable/pyops` is used for run artifacts (cache/reports/patches).
- Keep `.venv` and generated outputs out of git.
