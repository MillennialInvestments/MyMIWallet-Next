import React, { createContext, useContext, useMemo, useRef, useState } from 'react';
import { TokenStore } from 'mymi-sdk';

interface AuthContextValue {
  token?: string;
  setToken: (token?: string) => void;
  clearToken: () => void;
  tokenStore: TokenStore;
}

const AuthContext = createContext<AuthContextValue | undefined>(undefined);

export const AuthProvider: React.FC<React.PropsWithChildren> = ({ children }) => {
  const listeners = useRef(new Set<(token?: string) => void>());
  const [token, setTokenState] = useState<string | undefined>();

  const setToken = (next?: string) => {
    setTokenState(next);
    listeners.current.forEach((listener) => listener(next));
  };

  const clearToken = () => setToken(undefined);

  const tokenStore: TokenStore = useMemo(
    () => ({
      getToken: () => token,
      setToken,
      clearToken,
      onTokenChange: (listener: (token?: string) => void) => {
        listeners.current.add(listener);
        return () => listeners.current.delete(listener);
      }
    }),
    [token]
  );

  const value: AuthContextValue = useMemo(
    () => ({ token, setToken, clearToken, tokenStore }),
    [token, tokenStore]
  );

  return <AuthContext.Provider value={value}>{children}</AuthContext.Provider>;
};

export const useAuth = (): AuthContextValue => {
  const ctx = useContext(AuthContext);
  if (!ctx) {
    throw new Error('useAuth must be used within AuthProvider');
  }
  return ctx;
};
