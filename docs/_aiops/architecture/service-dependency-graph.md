# Service Dependency Graph

```mermaid
graph TD
  PriorityBuild[aiops:priority:build] --> DocsScanner
  PriorityBuild --> RepoVerifier
  PriorityBuild --> PriorityWriter
  PriorityBuild --> OllamaCodeGen

  ObserveScan[aiops:observe:*] --> ObservabilityState
  ObserveHash[aiops:observe:hash] --> Fingerprint
  ObserveRegression[aiops:observe:regression] --> RegressionEvaluator

  PRCreate[aiops:pr:create] --> PRComposer
  PRCreate --> ReleaseNotes

  PublicPagesRun[aiops:public-pages:run] --> PublicPagesPipeline
```
