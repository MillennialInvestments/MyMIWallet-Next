import { apiClient } from './client';
import { ApiResponse } from '../types/api';

export const investmentsApi = {
  getOverview: () => apiClient.get<ApiResponse<Record<string, unknown>>>('/mobile/investments'),
};
