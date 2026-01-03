# Future MyMI Wallet Auth Integration

## Path A (Recommended): Signed JWT Bridge
1. Add a CI4 endpoint (e.g., `/API/Auth/chatToken`) that issues a short-lived JWT after a user signs into MyMI Wallet.
2. Embed a button/link in MyMI Wallet that opens the chat UI and includes the JWT (query string or header injection via fetch).
3. Share a signing secret between CI4 and the chat service; validate signature and expiration before serving requests.
4. Use JWT claims to grant roles (e.g., admin/system prompt access) without replicating the MyMI user database.

## Path B: OAuth-style Redirect
1. If no token is present, the chat UI redirects to MyMI Wallet login.
2. After login, MyMI redirects back with an authorization code or access token.
3. Chat service exchanges the code for user info/roles and stores a short session (signed cookie or server-side store).
4. Apply the same usage caps and provider logic once the user is authenticated.

Both paths avoid sharing database credentials while enabling MyMI to control chat access and permissions.
