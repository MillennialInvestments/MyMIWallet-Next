# MYMI-NEWS-LIVE-001B/C2B Approval

Approved scope:

- non-production MyMI worktree implementation
- disabled-by-default Alpha Vantage certification gate
- provider HTTP-200 envelope classification
- exactly-one-request transport
- non-AIOps-runnable certification command
- deterministic validation
- TBI Ollama review
- exactly one bounded Alpha Vantage request after preflight

Fixed approval token:

`MYMI-NEWS-LIVE-001B-C2B-ONE-BOUNDED-REQUEST`

Not approved:

- deployment
- production mutation
- persistence
- scheduler
- Discord
- Zapier
- webhook
- public exposure
- second live request
- retries

The API key must remain transient and must not be written to repository,
logs, evidence artifacts, or production configuration.
