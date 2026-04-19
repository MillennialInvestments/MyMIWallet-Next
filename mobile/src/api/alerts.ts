import { apiClient } from './client';
import { ApiResponse } from '../types/api';

export const alertsApi = {
  getOverview: () => apiClient.get<ApiResponse<Record<string, unknown>>>('/mobile/alerts'),
};
