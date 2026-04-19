import { apiClient } from './client';
import { ApiResponse } from '../types/api';

export const budgetApi = {
  getOverview: () => apiClient.get<ApiResponse<Record<string, unknown>>>('/mobile/budget'),
};
