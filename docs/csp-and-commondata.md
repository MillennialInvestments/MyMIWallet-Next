# Content Security Policy & Common Data

The `BaseController` now standardises two CSP modes and the shared data payload used by all views.

## CSP Modes

The mode is controlled by the `APP_CSP_MODE` environment variable.

| Mode    | Behaviour |
|---------|-----------|
| `relaxed` (default) | Keeps legacy inline `<script>`/`style` blocks working. `script-src`/`style-src` include `'unsafe-inline'` and no nonces are emitted. |
| `strict`            | Enforces nonces on inline assets. Randomised nonces are generated for scripts and styles and injected into the CSP header. |
| `off`               | Removes the CSP header entirely. Views still receive empty nonce values so templates stay stable. |

The controller publishes the active nonce values to every rendered view via `$nonce['script']` and `$nonce['style']`. Use them in templates as:

```php
<script <?= $nonce['script'] ?? '' ?>>
    // inline JS here
</script>

<style <?= $nonce['style'] ?? '' ?>>
    /* inline CSS here */
</style>
```

When the application runs in RELAXED mode each entry is an empty string, so nothing extra is emitted. In STRICT mode the attribute expands to `nonce="..."` with a fresh base64url token.

## Common Data Snapshot

`BaseController::commonData()` now orchestrates the upstream service calls used throughout dashboards and widgets. It safely wraps every data fetch in `try/catch`, only overwriting existing values when a provider returns non-empty data, and synthesises a consolidated balance snapshot from budgets, wallets, credit, and debt sources. This guarantees that all keys referenced in the views—user profile, goals, Solana metrics, budgeting, and repayment summaries—arrive pre-populated for authenticated sessions.

A PHPUnit smoke test (`CommonDataSmokeTest`) exercises the method using deterministic fakes so contributors can verify that required keys remain hydrated whenever `commonData()` changes.

# Content Security Policy & Common Data

## CSP modes

`BaseController::initController()` inspects the `APP_CSP_MODE` environment variable and
configures the Content Security Policy accordingly:

| Mode     | Behaviour                                                                                  |
|----------|---------------------------------------------------------------------------------------------|
| `off`    | The CSP header is removed entirely. Views receive an empty nonce array.                     |
| `relaxed`| Inline scripts/styles continue to work because the policy allows `unsafe-inline`.  The
             view layer still receives `['script' => '', 'style' => '']` so template code can safely
             output `<?= $nonce['script'] ?? '' ?>` without additional checks.                            |
| `strict` | Per-request nonces are generated for scripts and styles.  The controller shares both the
             raw nonce values (`$csp['script']`, `$csp['style']`) and their attribute forms
             (`$nonce['script']`, `$nonce['style']`) with the renderer so views can emit
             `nonce="…"` attributes.                                                                    |

Regardless of the mode, `Services::renderer()` receives three pieces of data:

```php
['cspNonce' => $cspNonce, 'csp' => $csp, 'nonce' => $nonce]
```

Legacy helpers that call `csp_script_nonce()` continue to work, while new templates should rely on the
`$nonce` array directly:

```php
<script <?= $nonce['script'] ?? '' ?> src="..."></script>
<style <?= $nonce['style'] ?? '' ?>>/* ... */</style>
```

## Common data population

`BaseController::commonData()` now centralises the user-facing payload that dashboards expect.  When a
user is authenticated the method pulls data from `MyMIUser`, `MyMIDashboard`, `GoalTrackingService`,
`BudgetService`, `SolanaService`, and `AccountService`, merging the results into `$this->data` only when
each call returns a non-empty value.  The method also guarantees sane defaults for all dashboard keys,
including Solana snapshots, budgeting summaries, and repayment analytics, so that views never have to
guard against undefined indexes.

For smoke testing you can hit `GET /debug/common-data/smoke` (with a session) to confirm the payload
structure.  The action performs a lightweight assertion pass and logs a JSON snapshot whenever the data
loads successfully.

# Content Security Policy Modes & Common Data Pipeline

The base controller now standardises how CSP nonces and shared view data are
prepared for every request.

## CSP modes

`BaseController::applyContentSecurityPolicy()` honours `APP_CSP_MODE` with three
modes:

- `off` – no CSP header is emitted and views receive blank nonce attributes.
- `relaxed` – allows existing inline `<script>`/`style` blocks by adding
  `unsafe-inline`; the rendered `$nonce['script']`/`$nonce['style']` values are
  empty strings so tags render without nonce attributes.
- `strict` – emits a nonce-backed policy. `initController()` generates separate
  script/style nonces, injects them into the renderer, and views should render
  attributes using `<?= $nonce['script'] ?? '' ?>` and
  `<?= $nonce['style'] ?? '' ?>`.

The legacy `$cspNonce` value (single script nonce) is still exposed for any
inline fallbacks, but new templates should favour the `$nonce` array.

## Common data hydrator

`BaseController::commonData()` now orchestrates all upstream calls required by
dashboard views. When a user is authenticated it gathers:

- Profile details via `MyMIUser::getUserInformation()`
- Dashboard banners/goals from `MyMIDashboard::dashboardInfo()`
- Goal tracking from `GoalTrackingService`
- Budget summaries & balances from `BudgetService`
- Solana snapshots via `MyMISolana` plus `SolanaService::getSolanaData()` and
  `getNetworkStatus()`
- Credit/debt rollups from `AccountService` & `BudgetService`
- Unified balance from `MyMIAnalytics`

Each call is wrapped in `try/catch`; defaults remain in place unless a service
returns non-empty data. Consumers can rely on the keys listed in the smoke test
(`Health::commonDataSmoke`) always existing with non-null values.