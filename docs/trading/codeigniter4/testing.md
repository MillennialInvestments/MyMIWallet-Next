# Testing

Run scanner unit tests:

```bash
vendor/bin/phpunit tests/unit/Scanning/SignalEngineTest.php
```

Run selected feature/integration tests (mock providers as needed):

```bash
vendor/bin/phpunit tests/feature
```

Run CLI smoke:

```bash
php spark scanning:run --timeframe=1day --source=universe --limit=20
```
