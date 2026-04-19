import { apiClient } from './client';
import { ApiResponse, AuthToken, MobileUser } from '../types/api';

export const authApi = {
  login: (payload: { email: string; password: string; device_name?: string }) =>
    apiClient.post<ApiResponse<{ user: MobileUser; token: AuthToken }>>('/mobile/auth/login', payload),
  register: (payload: { email: string; username: string; password: string; device_name?: string }) =>
    apiClient.post<ApiResponse<{ user: MobileUser; token: AuthToken }>>('/mobile/auth/register', payload),
  me: () => apiClient.get<ApiResponse<MobileUser>>('/mobile/me'),
  logout: () => apiClient.post<ApiResponse<{ revoked: boolean }>>('/mobile/auth/logout'),
};
