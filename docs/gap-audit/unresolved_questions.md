# Unresolved Questions

1. **Budget transaction source of truth**  
   - Doc: Requires summing `bf_users_bank_transactions` with `posted_at <= asOf`. 【F:docs/budgeting/architecture.md†L14-L41】  
   - Code: Current model only sums stored balances without transactions. 【F:app/Models/BudgetModel.php†L420-L454】  
   - Ambiguity: Should balances be authoritative (no transaction roll-up) or should transactions drive all calculations?  
   - Recommendation: Confirm desired data authority before changing calculations to avoid double-counting.

2. **Predictions table ownership**  
   - Doc: Migrations expected under CI4 to create `bf_predictions_*` tables. 【F:docs/predictions/README.md†L19-L33】  
   - Code: Models point to `bf_predictions_*` tables but no migrations exist in `app/Database/Migrations`.  
   - Ambiguity: Are these tables managed externally or intended to be provisioned by this repo?  
   - Recommendation: Decide migration ownership; if external, document provisioning steps and versioning.

