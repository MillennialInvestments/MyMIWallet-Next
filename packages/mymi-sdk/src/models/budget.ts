export interface BudgetSummaryParams {
  from?: string;
  to?: string;
}

export interface BudgetSummaryResponse {
  income?: number;
  expenses?: number;
  savingsRate?: number;
  topCategories?: Array<{ name: string; amount: number }>;
}

export interface BudgetAvailableResponse {
  cashAvailable?: number;
  asOf?: string;
}

export interface BudgetRepaymentParams {
  strategy?: 'avalanche' | 'snowball';
}

export interface BudgetRepaymentResponse {
  strategy?: string;
  schedule: Array<{ month: string; payment: number }>;
}
