# PR Proposal (Instruction #4)

## Summary
Auto-generated scaffold. AIOps/Ollama should replace with final PR content.

## Risk
- Risk Level: **HIGH**
- Governance Score: **85**
- Manual Review Required: **YES**

## Suggested File Targets
- app/Config/Routes.php
- app/Modules/Management/Controllers/EmailTemplateController.php
- app/Modules/Management/Controllers/EmailQueueController.php
- app/Services/Email/EmailTemplateService.php
- app/Services/Email/EmailQueueService.php
- app/Services/Email/EmailProcessorService.php
- app/Models/EmailTemplateModel.php
- app/Models/EmailQueueModel.php
- app/Models/EmailLogModel.php
- app/Database/Migrations/2026-xx-xx-CreateEmailTemplates.php
- app/Database/Migrations/2026-xx-xx-CreateEmailQueue.php
- app/Database/Migrations/2026-xx-xx-CreateEmailLogs.php
- app/Commands/Email/ProcessQueue.php
- app/Commands/
- app/Controllers/
- app/Models/
- app/Services/
- app/Services/AIOps/
- app/Database/Migrations/
- app/Views/


## Notes
- If patch files exist in `docs/_aiops/pr_ready/4/patch/`, the worker will generate `diff.patch`.