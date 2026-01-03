export const randomUUID = (): string => {
  if (typeof crypto !== 'undefined' && 'randomUUID' in crypto) {
    // @ts-expect-error modern browsers/node
    return crypto.randomUUID();
  }
  return 'req-' + Math.random().toString(36).slice(2, 10);
};
