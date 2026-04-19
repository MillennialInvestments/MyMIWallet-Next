export const API_BASE_URL = process.env.EXPO_PUBLIC_API_BASE_URL ?? '';
export const WEB_BASE_URL = process.env.EXPO_PUBLIC_WEB_BASE_URL ?? '';

if (!API_BASE_URL || !WEB_BASE_URL) {
  console.warn('Missing mobile environment variables. Check .env configuration.');
}
