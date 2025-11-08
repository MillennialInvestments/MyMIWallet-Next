# Myth/Auth Redirect Update

## Overview
Users who sign in from the marketing site (`/`) or other public pages are now routed to `/Dashboard` after successful authentication. The redirect also honors deep links captured by the `login` filter so protected pages still resume normally.

## Key Changes
- `Config\Auth` now sets the landing and login redirects to `/Dashboard` and leaves logout pointed to `/login`.
- `AuthController` centralizes post-login routing with helper methods that:
  - Ignore root, `home`, `index`, and `login` URLs when determining the target.
  - Capture redirect intents only when they are valid.
  - Log the final redirect destination for debugging.
- `LoginFilter` continues to capture the originally requested page but always redirects visitors to the canonical `/login` route.
- Routes declare an explicit `/Dashboard` entry protected by the `login` filter, complementing the existing dashboard route group.
- The login form posts to `site_url('login')` to match the explicit POST route.

## Testing Checklist
1. Visit `/Dashboard` while signed out → you should be redirected to `/login` and, after signing in, returned to `/Dashboard`.
2. Browse to `/` and click **Login** → signing in lands on `/Dashboard` instead of returning to the home page.
3. Attempt a deep link (e.g., `/Account`) while signed out → after login you should resume on the requested page.
4. Review application logs for `Auth redirect destination:` entries if troubleshooting unexpected routing.
