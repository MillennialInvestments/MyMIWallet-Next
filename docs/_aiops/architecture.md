# AIOPS × Ollama Patch Flow

```mermaid
flowchart TD
  L[Logs] --> A[AIOPS Analyze]
  A --> J[Patch Job (.md)]
  J --> O[OllamaPatchRunner]
  O --> D[Diff]
  D --> C[Commit]
  C --> P[PR]
  P --> R[Codex Review]
  R --> M[Merge]
```
