# PR Proposal (Instruction #10)

## Summary
Auto-generated scaffold. AIOps/Ollama should replace with final PR content.

## Risk
- Risk Level: **HIGH**
- Governance Score: **95**
- Manual Review Required: **YES**

## Suggested File Targets
- app/Commands/Ollama/Health.php
- app/Commands/Ollama/Version.php
- app/Commands/Ollama/Ping.php
- app/Commands/Ollama/Diagnose.php
- app/Commands/Ollama/Models/ListModels.php
- app/Commands/Ollama/Models/ShowModel.php
- app/Commands/Ollama/Models/PullModel.php
- app/Commands/Ollama/Models/RmModel.php
- app/Commands/Ollama/Models/PruneModels.php
- app/Commands/Ollama/Models/EnsureModels.php
- app/Commands/Ollama/Generate.php
- app/Commands/Ollama/Chat.php
- app/Commands/Ollama/Embed.php
- app/Commands/Ollama/Queue/Push.php
- app/Commands/Ollama/Queue/Work.php
- app/Commands/Ollama/Queue/Stats.php
- app/Commands/Ollama/Policy/Check.php
- app/Commands/Ollama/Docs/Sync.php
- app/Config/Console.php
- app/Services/LLM/OllamaClient.php
- app/Config/Ollama.php
- app/Models/OllamaRunModel.php
- app/Models/OllamaQueueModel.php
- app/Models/OllamaSessionModel.php
- app/Commands/
- app/Models/
- app/Services/
- app/Services/AIOps/
- app/Database/Migrations/
- app/Views/
- app/Config/Logger.php


## Notes
- If patch files exist in `docs/_aiops/pr_ready/10/patch/`, the worker will generate `diff.patch`.