import { HttpClient, RequestOptions } from '../client/http.js';
import { ApiResponse } from '../models/common.js';
import { MarketingSummary } from '../models/marketing.js';

export const marketingApi = (client: HttpClient) => ({
  summaries: (opts?: RequestOptions): Promise<ApiResponse<MarketingSummary[]>> =>
    client.request('GET', '/API/Marketing/fetchGeneratedSummariesJson', opts)
});
