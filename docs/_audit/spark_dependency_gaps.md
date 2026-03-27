# Spark Dependency Gaps

Automated static scan of Spark command dependencies and resolved file existence checks.

| Command | File | Gaps |
|---|---|---|
| `aiops:docs-sync` | `app/Commands/AIOps/Docs/AutoSync.php` | service('docsSyncEngine') missing guessed `app/Services/DocsSyncEngine.php` |
| `aiops:doctor` | `app/Commands/AIOps/Doctor.php` | service('{$serviceName}') missing guessed `app/Services/{$serviceName}.php` |
| `aiops:scan:integrity` | `app/Commands/AIOps/IntegrityScan.php` | service('locator') missing guessed `app/Services/Locator.php` |
| `aiops:priority:build` | `app/Commands/AIOps/PriorityBuildCommand.php` | service('aiopsDocsScanner') missing guessed `app/Services/AiopsDocsScanner.php`<br>service('aiopsOllamaCodeGen') missing guessed `app/Services/AiopsOllamaCodeGen.php`<br>service('aiopsPriorityWriter') missing guessed `app/Services/AiopsPriorityWriter.php`<br>service('aiopsRepoVerifier') missing guessed `app/Services/AiopsRepoVerifier.php` |
| `alerts:forecast` | `app/Commands/Alerts/Forecast.php` | service('mymiForecaster') missing guessed `app/Services/MymiForecaster.php` |
| `app:controller:audit` | `app/Commands/App/ControllerAudit.php` | service('authentication') missing guessed `app/Services/Authentication.php`<br>service('session') missing guessed `app/Services/Session.php` |
| `auth:flow-smoke` | `app/Commands/Auth/FlowSmoke.php` | service('response') missing guessed `app/Services/Response.php`<br>helper('url') missing `url_helper.php` |
| `docs:test` | `app/Commands/Docs/DocsTest.php` | service('docs') missing guessed `app/Services/Docs.php` |
| `docs:routes:inventory` | `app/Commands/Docs/RoutesInventory.php` | service('routes') missing guessed `app/Services/Routes.php` |
| `docs:sync-code` | `app/Commands/Docs/SyncCodeFromDocs.php` | service('docsSyncEngine') missing guessed `app/Services/DocsSyncEngine.php` |
| `github:branch` | `app/Commands/GitHub/Branch.php` | service('git') missing guessed `app/Services/Git.php` |
| `github:commit` | `app/Commands/GitHub/Commit.php` | service('git') missing guessed `app/Services/Git.php` |
| `github:pr:create` | `app/Commands/GitHub/CreatePR.php` | service('git') missing guessed `app/Services/Git.php`<br>service('github') missing guessed `app/Services/Github.php` |
| `github:health` | `app/Commands/GitHub/Health.php` | service('git') missing guessed `app/Services/Git.php` |
| `github:pull` | `app/Commands/GitHub/Pull.php` | service('git') missing guessed `app/Services/Git.php` |
| `github:push` | `app/Commands/GitHub/Push.php` | service('git') missing guessed `app/Services/Git.php` |
| `github:status` | `app/Commands/GitHub/Status.php` | service('git') missing guessed `app/Services/Git.php` |
| `github:sync` | `app/Commands/GitHub/Sync.php` | service('git') missing guessed `app/Services/Git.php` |
| `gtm:launch:audit` | `app/Commands/GtmLaunchAudit.php` | service('commands') missing guessed `app/Services/Commands.php` |
| `mail:test` | `app/Commands/Mail/Test.php` | service('email') missing guessed `app/Services/Email.php` |
| `mail:verify` | `app/Commands/Mail/Verify.php` | service('email') missing guessed `app/Services/Email.php` |
| `ops:analyze-commands` | `app/Commands/Ops/AnalyzeCommands.php` | service('curlrequest') missing guessed `app/Services/Curlrequest.php` |
| `ops:sync` | `app/Commands/Ops/Sync.php` | service('commands') missing guessed `app/Services/Commands.php` |
| `(not set)` | `app/Commands/Research/BaseResearchTaskCommand.php` | service('researchService') missing guessed `app/Services/ResearchService.php` |
| `routes:docs` | `app/Commands/Routes/Docs.php` | service('router') missing guessed `app/Services/Router.php`<br>service('routes') missing guessed `app/Services/Routes.php` |
| `scanning:run` | `app/Commands/Scanning/RunScanner.php` | service('scannerService') missing guessed `app/Services/ScannerService.php` |
