export interface TokenStore {
  getToken(): Promise<string | undefined> | string | undefined;
  setToken(token?: string): Promise<void> | void;
  clearToken(): Promise<void> | void;
  onTokenChange?(listener: (token?: string) => void): () => void;
}
