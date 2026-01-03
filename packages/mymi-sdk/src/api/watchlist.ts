import { HttpClient, RequestOptions } from '../client/http.js';
import { ApiResponse } from '../models/common.js';
import { WatchlistItem, WatchlistSearchResult } from '../models/watchlist.js';

export interface WatchlistListOptions extends RequestOptions {}

export const watchlistApi = (client: HttpClient) => ({
  list: (opts?: WatchlistListOptions): Promise<ApiResponse<WatchlistItem[]>> =>
    client.request('GET', '/API/Watchlist', opts),

  add: (payload: { symbol: string; notes?: string }, opts?: RequestOptions): Promise<ApiResponse<WatchlistItem>> =>
    client.request('POST', '/API/Watchlist', { ...opts, body: payload }),

  remove: (symbol: string, opts?: RequestOptions): Promise<ApiResponse<{ symbol: string }>> =>
    client.request('DELETE', `/API/Watchlist/${encodeURIComponent(symbol)}`, opts),

  searchTickers: (query: string, limit = 10, opts?: RequestOptions): Promise<ApiResponse<WatchlistSearchResult[]>> =>
    client.request('GET', `/API/Investments/searchTickers?query=${encodeURIComponent(query)}&limit=${limit}`, opts)
});
