import { HttpClient } from '../client/http.js';
import { ApiResponse } from '../models/common.js';
import { AuthTokens, LoginRequest, RegisterRequest, UserProfile } from '../models/auth.js';

export const authApi = (client: HttpClient) => ({
  login: (payload: LoginRequest): Promise<ApiResponse<AuthTokens>> =>
    client.request('POST', '/API/Auth/login', { body: payload }),
  register: (payload: RegisterRequest): Promise<ApiResponse<AuthTokens>> =>
    client.request('POST', '/API/Auth/register', { body: payload }),
  refresh: (refreshToken: string): Promise<ApiResponse<AuthTokens>> =>
    client.request('POST', '/API/Auth/refresh', { body: { refreshToken } }),
  logout: (refreshToken?: string): Promise<ApiResponse<{ message: string }>> =>
    client.request('POST', '/API/Auth/logout', { body: { refreshToken } }),
  me: (): Promise<ApiResponse<UserProfile>> => client.request('GET', '/API/User/me')
});
