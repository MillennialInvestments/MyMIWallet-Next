import { useCallback, useEffect, useState } from 'react';
import { ApiResponse } from 'mymi-sdk';

type AsyncFn<T> = () => Promise<ApiResponse<T>>;

export interface AsyncState<T> {
  data?: T;
  loading: boolean;
  error?: string;
  refetch: () => Promise<void>;
}

export const useAsyncResource = <T>(key: string, fn: AsyncFn<T>): AsyncState<T> => {
  const [data, setData] = useState<T | undefined>();
  const [loading, setLoading] = useState<boolean>(false);
  const [error, setError] = useState<string | undefined>();

  const run = useCallback(async () => {
    setLoading(true);
    setError(undefined);
    try {
      const response = await fn();
      if (response.success) {
        setData(response.data as T);
      } else {
        setError(response.error || 'Request failed');
      }
    } catch (err) {
      setError(err instanceof Error ? err.message : 'Request failed');
    } finally {
      setLoading(false);
    }
  }, [fn, key]);

  useEffect(() => {
    run();
  }, [run]);

  return { data, loading, error, refetch: run };
};
