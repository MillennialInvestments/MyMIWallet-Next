# CRON Jobs

## Discord Queue Processor

Add the following entries to your DreamHost user crontab to keep the Discord queue flowing. Update `CRON_KEY` with your shared secret.

```
*/2  8-16 * * 1-5 curl -fsS -H "X-CRON-Key: ${CRON_KEY}" "https://www.mymiwallet.com/API/Discord/process-queue" >/dev/null
*/10 * * * 0,6 curl -fsS -H "X-CRON-Key: ${CRON_KEY}" "https://www.mymiwallet.com/API/Discord/process-queue" >/dev/null
```

The weekday job runs every two minutes during market hours (America/Chicago). Weekends are throttled to once every ten minutes to keep rate limits healthy.