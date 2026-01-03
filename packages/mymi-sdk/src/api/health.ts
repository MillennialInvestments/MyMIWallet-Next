import { HttpClient, RequestOptions } from '../client/http.js';
import { ApiResponse } from '../models/common.js';

export interface HealthResponse {
  status: string;
  db?: string;
  time?: string;
}

export const healthApi = (client: HttpClient) => ({
  check: (opts?: RequestOptions): Promise<ApiResponse<HealthResponse>> => client.request('GET', '/API/Health', opts)
});
