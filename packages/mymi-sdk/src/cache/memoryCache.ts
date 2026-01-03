interface CacheEntry<T> {
  value: T;
  expiresAt: number;
}

export interface MemoryCacheOptions {
  defaultTtlMs?: number;
  maxEntries?: number;
}

export class MemoryCache<T = unknown> {
  private store = new Map<string, CacheEntry<T>>();
  private defaultTtlMs: number;
  private maxEntries: number;

  constructor(opts?: MemoryCacheOptions) {
    this.defaultTtlMs = opts?.defaultTtlMs ?? 60_000;
    this.maxEntries = opts?.maxEntries ?? 100;
  }

  get(key: string): T | undefined {
    const entry = this.store.get(key);
    if (!entry) return undefined;
    if (Date.now() > entry.expiresAt) {
      this.store.delete(key);
      return undefined;
    }
    return entry.value;
  }

  set(key: string, value: T, ttlMs?: number): void {
    if (this.store.size >= this.maxEntries) {
      const oldestKey = this.store.keys().next().value;
      this.store.delete(oldestKey);
    }
    this.store.set(key, { value, expiresAt: Date.now() + (ttlMs ?? this.defaultTtlMs) });
  }

  delete(key: string): void {
    this.store.delete(key);
  }
}
