# Marketing Module Lifecycle (MyMI Wallet)

## Controller Responsibilities
- Route handling
- View loading
- Input validation
- Triggering services

## Library Responsibilities (MyMIMarketing)
- Email scraping
- Content summarization
- TF-IDF keyword extraction
- Post generation
- Distribution logic

## Execution Rules
- Controllers trigger actions
- Libraries perform work
- CRON handles automation
- No background work in constructors
