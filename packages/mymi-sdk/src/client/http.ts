import { ApiErrorDetail, ApiResponse } from '../models/common.js';
import { TokenStore } from '../auth/tokenStore.js';
import { MemoryCache } from '../cache/memoryCache.js';
import { randomUUID } from '../utils/random.js';

export type HttpMethod = 'GET' | 'POST' | 'PUT' | 'PATCH' | 'DELETE';

export interface HttpClientConfig {
  baseUrl: string;
  apiKey?: string;
  tokenStore?: TokenStore;
  defaultTimeoutMs?: number;
  retries?: number;
  cache?: MemoryCache<ApiResponse>;
}

export interface RequestOptions<TBody = unknown> {
  body?: TBody;
  headers?: Record<string, string>;
  timeoutMs?: number;
  retries?: number;
  useCache?: boolean;
  cacheKey?: string;
  ttlMs?: number;
  requestId?: string;
}

export class HttpClient {
  baseUrl: string;
  apiKey?: string;
  tokenStore?: TokenStore;
  defaultTimeoutMs: number;
  retries: number;
  cache?: MemoryCache<ApiResponse>;

  constructor(config: HttpClientConfig) {
    this.baseUrl = config.baseUrl.replace(/\/$/, '');
    this.apiKey = config.apiKey;
    this.tokenStore = config.tokenStore;
    this.defaultTimeoutMs = config.defaultTimeoutMs ?? 10_000;
    this.retries = config.retries ?? 1;
    this.cache = config.cache;
  }

  private resolveUrl(path: string): string {
    if (path.startsWith('http')) return path;
    return `${this.baseUrl}${path.startsWith('/') ? '' : '/'}${path}`;
  }

  async request<T = unknown, TBody = unknown>(method: HttpMethod, path: string, options?: RequestOptions<TBody>): Promise<ApiResponse<T>> {
    const url = this.resolveUrl(path);
    const headers: Record<string, string> = {
      Accept: 'application/json',
      'Content-Type': 'application/json',
      ...(options?.headers ?? {})
    };

    if (this.apiKey) headers['X-API-Key'] = this.apiKey;
    const token = await this.tokenStore?.getToken?.();
    if (token) headers.Authorization = `Bearer ${token}`;

    const requestId = options?.requestId ?? randomUUID();
    headers['X-Request-Id'] = requestId;
    headers['X-Client-Version'] = 'mymiwallet-mobile-0.1.0';

    const timeoutMs = options?.timeoutMs ?? this.defaultTimeoutMs;
    const retries = options?.retries ?? this.retries;
    const cacheKey = options?.cacheKey ?? `${method}:${url}:${JSON.stringify(options?.body ?? '')}`;

    if (options?.useCache && this.cache) {
      const cached = this.cache.get(cacheKey);
      if (cached) {
        return { ...(cached as ApiResponse<T>), fromCache: true };
      }
    }

    const controller = new AbortController();
    const timer = setTimeout(() => controller.abort(), timeoutMs);

    const doFetch = async (): Promise<ApiResponse<T>> => {
      try {
        const res = await fetch(url, {
          method,
          headers,
          body: options?.body ? JSON.stringify(options.body) : undefined,
          signal: controller.signal
        });

        const text = await res.text();
        let parsed: any = {};
        try {
          parsed = text ? JSON.parse(text) : {};
        } catch (err) {
          parsed = text ? { raw: text } : {};
        }

        const apiResponse: ApiResponse<T> = {
          success: res.ok && (parsed.success !== false),
          data: parsed.data ?? parsed.summaries ?? parsed.news ?? parsed,
          error: parsed.error || parsed.message,
          meta: parsed.meta,
          requestId,
          status: res.status
        };

        if (!res.ok) {
          return apiResponse;
        }

        if (options?.useCache && this.cache) {
          this.cache.set(cacheKey, apiResponse as ApiResponse, options?.ttlMs);
        }

        return apiResponse;
      } catch (err) {
        const detail: ApiErrorDetail = {
          message: err instanceof Error ? err.message : 'Network error'
        };
        return { success: false, error: detail.message, requestId };
      } finally {
        clearTimeout(timer);
      }
    };

    let attempt = 0;
    let lastResponse: ApiResponse<T> = { success: false, error: 'Unknown error', requestId };

    while (attempt <= retries) {
      lastResponse = await doFetch();
      if (lastResponse.success) return lastResponse;
      attempt += 1;
    }

    return lastResponse;
  }
}
