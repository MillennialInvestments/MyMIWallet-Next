# Marketing Pipeline Cron Schedule

Use Spark commands so cron does not depend on HTTP routes.

```cron
*/15 * * * * php /path/to/project/spark marketing:pipeline notifications >> /path/to/writable/logs/marketing-pipeline.log 2>&1
*/15 * * * * php /path/to/project/spark marketing:pipeline temp >> /path/to/writable/logs/marketing-temp.log 2>&1
0 * * * * php /path/to/project/spark marketing:pipeline campaigns >> /path/to/writable/logs/marketing-campaigns.log 2>&1
0 */4 * * * php /path/to/project/spark marketing:distribute >> /path/to/writable/logs/marketing-distribute.log 2>&1
15 2 * * * php /path/to/project/spark marketing:daily-audit >> /path/to/writable/logs/marketing-audit.log 2>&1
```
