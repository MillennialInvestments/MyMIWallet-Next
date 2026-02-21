# Ollama Strategy

- Keep Ollama usage isolated to codegen/patch services.
- Default command flows remain deterministic and do not require network calls.
- Use dry-run and artifact-first workflow before any patch export.
