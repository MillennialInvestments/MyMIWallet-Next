import { useMemo } from 'react';
import { createMyMIClient, MemoryCache } from 'mymi-sdk';
import { useAuth } from './useAuth';

export const useSdkClient = () => {
  const { tokenStore } = useAuth();
  const baseUrl = process.env.EXPO_PUBLIC_MYMI_API_BASE_URL || 'http://localhost:8080/index.php';
  const apiKey = process.env.EXPO_PUBLIC_MYMI_API_KEY;

  return useMemo(
    () =>
      createMyMIClient({
        baseUrl,
        apiKey,
        tokenStore,
        defaultTimeoutMs: 10000,
        retries: 1,
        cache: new MemoryCache({ maxEntries: 50, defaultTtlMs: 60_000 })
      }),
    [apiKey, baseUrl, tokenStore]
  );
};
