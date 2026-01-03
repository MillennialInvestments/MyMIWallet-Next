export const formatMoney = (value: number, currency = 'USD') =>
  new Intl.NumberFormat('en-US', { style: 'currency', currency, minimumFractionDigits: 2 }).format(value || 0);

export const formatDate = (value?: string | Date) => {
  if (!value) return '';
  const date = typeof value === 'string' ? new Date(value) : value;
  return isNaN(date.getTime()) ? '' : date.toISOString();
};

export const safeNumber = (value: unknown, fallback = 0): number => {
  const num = typeof value === 'string' ? parseFloat(value) : (value as number);
  return Number.isFinite(num) ? num : fallback;
};

export const sanitizePath = (path: string): string => path.replace(/\s+/g, '').replace(/\/{2,}/g, '/');
