# MyMI Solana Exchange State-of-the-Art Checklist

## Production Safety

- [ ] Solana network mode is explicit: devnet, testnet, or mainnet-beta.
- [ ] Mainnet minting is blocked unless an authenticated admin confirms it.
- [ ] Private keys are never stored in repo, views, JavaScript, logs, or database.
- [ ] RPC URLs and API keys are loaded only from `.env`.
- [ ] Every transaction write has an audit record.
- [ ] Every failed Solana transaction records signature, wallet, error code, error message, RPC provider, and timestamp.
- [ ] Team notifications fire on transaction failure, mint failure, swap failure, API outage, or abnormal user wallet activity.

## MyMISolana / SolanaService

- [ ] RPC health check exists.
- [ ] Wallet balance lookup exists.
- [ ] Token mint lookup exists.
- [ ] SPL token metadata retrieval exists.
- [ ] Transaction confirmation lookup exists.
- [ ] RPC timeout, 403, 429, 500, and malformed responses are handled.
- [ ] RPC provider fallback/rotation exists.
- [ ] Short TTL caching exists for repeated RPC reads.

## TBI Solutions Project / Coins

- [ ] TBI Solutions Project draft record exists.
- [ ] TBI Coin draft record exists.
- [ ] TBI Invest Coin draft record exists.
- [ ] Draft coin creation is admin-only.
- [ ] Devnet mint workflow is separated from mainnet workflow.
- [ ] Token metadata, decimals, supply, status, creator, mint address, and signatures are stored.
- [ ] Mainnet minting remains blocked until launch checklist is complete.

## Exchange Front-End

- [ ] Phantom wallet connection works.
- [ ] Solflare wallet connection works.
- [ ] Wallet state refreshes without page reload.
- [ ] Balances update in near real time.
- [ ] Open orders update automatically.
- [ ] Transaction status updates from pending to confirming to confirmed or failed.
- [ ] Duplicate submits are blocked.
- [ ] Missing wallet extension has a clear fallback message.
- [ ] RPC outage has a clear fallback message.
- [ ] Browser-side errors are logged to backend support endpoint.

## Support / Notifications

- [ ] Team notification on Solana RPC outage.
- [ ] Team notification on mint failure.
- [ ] Team notification on failed user transaction.
- [ ] Support dashboard can search by user, wallet, signature, token, date, and status.
- [ ] Support team can view transaction lifecycle timeline.
- [ ] Support team can recheck confirmation status.
