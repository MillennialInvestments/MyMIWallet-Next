export interface ApiResponse<T = unknown> {
  success: boolean;
  data?: T;
  error?: string;
  meta?: Record<string, unknown>;
  requestId?: string;
  status?: number;
  fromCache?: boolean;
}

export interface ApiErrorDetail {
  message: string;
  code?: string | number;
  fields?: Record<string, string[]>;
}
