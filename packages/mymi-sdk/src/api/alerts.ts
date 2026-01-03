import { HttpClient, RequestOptions } from '../client/http.js';
import { ApiResponse } from '../models/common.js';
import { AlertNewsItem } from '../models/alerts.js';

export const alertsApi = (client: HttpClient) => ({
  newsByTicker: (ticker: string, opts?: RequestOptions): Promise<ApiResponse<AlertNewsItem[]>> =>
    client.request('GET', `/API/Alerts/fetchMarketAuxNews/${encodeURIComponent(ticker)}`, opts),

  feed: (opts?: RequestOptions): Promise<ApiResponse<any>> =>
    client.request('GET', '/API/Alerts/feed', opts) // stubbed; see missing_endpoints.md
});
