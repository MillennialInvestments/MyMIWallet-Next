export type ApiStatus = 'success' | 'error';

export interface ApiResponse<T> {
  status: ApiStatus;
  message?: string;
  data: T;
}

export interface AuthToken {
  access_token: string;
  token_type: 'Bearer';
  expires_at: string;
}

export interface MobileUser {
  id: number;
  email: string;
  username: string;
  active?: number;
}
