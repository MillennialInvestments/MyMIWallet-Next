# Chat Environment Variables

All variables below are read by `/chat/server.js`. Use `chat/.env` (see `.env.example`) or export before running `start-chat.sh`.

| Key | Purpose | Notes/Defaults |
| --- | --- | --- |
| PORT | Listening port for chat server | Default `8300`, `.env.example` pins `8500` |
| BIND_HOST | Interface to bind | Default `0.0.0.0` |
| APP_BASE_URL | Allowed CORS origin | e.g., `https://chat.mymiwallet.com` |
| CHAT_BASE_PATH | Optional path prefix if reverse-proxying under a subpath | Default empty |
| BASIC_AUTH_ACTIVE | Enable basic auth fallback | `true`/`false` |
| BASIC_AUTH_USER | Basic auth username | Default `team` |
| BASIC_AUTH_PASS | Basic auth password | Default `change_me` |
| SSO_ENABLED | Enable JWT auth passthrough | `false` by default |
| SSO_JWT_ISSUER | Expected JWT issuer | `https://mymiwallet.com` |
| SSO_JWT_AUDIENCE | Expected JWT audience | `chat.mymiwallet.com` |
| SSO_JWT_SECRET | Secret/public key for JWT validation | required if `SSO_ENABLED=true` |
| ALERT_EMAIL_TO | Alert recipient for spend alerts | Default `team@mymiwallet.com` |
| MYMI_USAGE_WEBHOOK_URL | Optional webhook for usage events | empty by default |
| MYMI_USAGE_WEBHOOK_SECRET | Shared secret for usage webhook | empty by default |
| OPENAI_API_KEY | API key for OpenAI provider | required for OpenAI mode |
| OPENAI_MODEL | Model name for OpenAI chats | Default `gpt-4o-mini` |
| OLLAMA_BASE_URL | Base URL for Ollama provider | Default `https://aiops.mymiwallet.com` |
| CI4_BASE_URL | Base URL for CI4 API proxy | e.g., `https://www.mymiwallet.com` |
| CI4_ME_ENDPOINT | Path for profile lookup | Default `/API/Chat/me` |
| CI4_TOOL_ENDPOINT | Path for tool execution | Default `/API/Chat/tool` |
| CI4_TIMEOUT_MS | Upstream CI4 timeout | Default `8000` |

## Example
See `/chat/.env.example` for a pre-populated template pinned to port 8500 and CI4 endpoints.
