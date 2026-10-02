# Demo scenarios
S1 Visitor: open /Alerts/Preview/NVDA, see preview, CTA to /register. 
S2 Free user: login, open User/Alerts -> denied with upsell. 
S3 Subscriber (fixture user 900001, tier1 active): User/Alerts renders, data timestamp visible. 
S4 Stale data: market snapshot older than threshold shows stale banner. 
S5 Cancelled/expired: expires_at in past -> denied. 
Fixtures: ./examples/*.json (not real data).
