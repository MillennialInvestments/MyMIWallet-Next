import { HttpClient, RequestOptions } from '../client/http.js';
import { ApiResponse } from '../models/common.js';
import { UserProfile } from '../models/auth.js';

export const userApi = (client: HttpClient) => ({
  me: (opts?: RequestOptions): Promise<ApiResponse<UserProfile>> => client.request('GET', '/API/User/me', opts)
});
