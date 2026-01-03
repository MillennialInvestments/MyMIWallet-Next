export const useErrorLogger = () => {
  const logError = (message: string, context?: Record<string, unknown>) => {
    // Wire Sentry or another logger here if SENTRY_DSN is provided
    // eslint-disable-next-line no-console
    console.error('[MyMI Mobile]', message, context);
  };

  return { logError };
};
