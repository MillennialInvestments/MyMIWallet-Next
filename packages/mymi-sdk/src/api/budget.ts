import { HttpClient, RequestOptions } from '../client/http.js';
import { ApiResponse } from '../models/common.js';
import {
  BudgetAvailableResponse,
  BudgetRepaymentParams,
  BudgetRepaymentResponse,
  BudgetSummaryParams,
  BudgetSummaryResponse
} from '../models/budget.js';

export const budgetApi = (client: HttpClient) => ({
  summary: (
    params: BudgetSummaryParams,
    opts?: RequestOptions
  ): Promise<ApiResponse<BudgetSummaryResponse>> =>
    client.request('GET', `/API/Budget/apiBudgetData?from=${params.from ?? ''}&to=${params.to ?? ''}`, opts),

  available: (
    params: BudgetSummaryParams,
    opts?: RequestOptions
  ): Promise<ApiResponse<BudgetAvailableResponse>> =>
    client.request('GET', `/API/Budget/apiAvailableData?from=${params.from ?? ''}&to=${params.to ?? ''}`, opts),

  credit: (opts?: RequestOptions): Promise<ApiResponse<any>> => client.request('GET', '/API/Budget/apiCreditData', opts),

  repayment: (
    params: BudgetRepaymentParams,
    opts?: RequestOptions
  ): Promise<ApiResponse<BudgetRepaymentResponse>> =>
    client.request('GET', `/API/Budget/apiRepaymentSummary?strategy=${params.strategy ?? ''}`, opts)
});
