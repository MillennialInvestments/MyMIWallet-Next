export * from './models/common.js';
export * from './models/auth.js';
export * from './models/budget.js';
export * from './models/alerts.js';
export * from './models/watchlist.js';
export * from './models/marketing.js';
export * from './auth/tokenStore.js';
export * from './cache/memoryCache.js';
export * from './utils/format.js';

import { HttpClient } from './client/http.js';
import { authApi } from './api/auth.js';
import { budgetApi } from './api/budget.js';
import { alertsApi } from './api/alerts.js';
import { marketingApi } from './api/marketing.js';
import { watchlistApi } from './api/watchlist.js';
import { healthApi } from './api/health.js';
import { userApi } from './api/user.js';
import { MemoryCache } from './cache/memoryCache.js';
import { TokenStore } from './auth/tokenStore.js';

export interface MyMIClientConfig {
  baseUrl: string;
  apiKey?: string;
  tokenStore: TokenStore;
  defaultTimeoutMs?: number;
  retries?: number;
  cache?: MemoryCache;
}

export const createMyMIClient = (config: MyMIClientConfig) => {
  const http = new HttpClient({
    baseUrl: config.baseUrl,
    apiKey: config.apiKey,
    tokenStore: config.tokenStore,
    defaultTimeoutMs: config.defaultTimeoutMs,
    retries: config.retries,
    cache: config.cache
  });

  return {
    baseUrl: http.baseUrl,
    auth: authApi(http),
    user: userApi(http),
    budget: budgetApi(http),
    alerts: alertsApi(http),
    marketing: marketingApi(http),
    watchlist: watchlistApi(http),
    health: healthApi(http)
  };
};

export { HttpClient };
