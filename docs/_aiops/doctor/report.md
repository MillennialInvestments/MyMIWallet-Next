# AIOps Doctor Report

- Generated: 2026-02-21T03:46:23+00:00
- Summary: 20/20 checks passed

- PASS: class_exists App\Services\AIOps\ObservabilityStateService
- PASS: class_exists App\Services\AIOps\FingerprintService
- PASS: class_exists App\Services\AIOps\RegressionEvaluator
- PASS: class_exists App\Services\AIOps\PRComposerService
- PASS: class_exists App\Services\AIOps\ReleaseNotesService
- PASS: class_exists App\Services\AIOps\PriorityWriterService
- PASS: service('aiopsDocsScanner')
- PASS: service('aiopsRepoVerifier')
- PASS: service('aiopsPriorityWriter')
- PASS: service('aiopsOllamaCodeGen')
- PASS: service('aiopsOllamaPatchRunner')
- PASS: service('aiopsManualRunNotifier')
- PASS: service('aiopsPublicPagesPipeline')
- PASS: service('aiopsObservabilityState')
- PASS: service('aiopsFingerprint')
- PASS: service('aiopsRegressionEvaluator')
- PASS: service('aiopsPRComposer')
- PASS: service('aiopsReleaseNotes')
- PASS: No App\Services\AiOps casing references in app/
- PASS: No runSpark(...) usage in app/Commands/AIOps
