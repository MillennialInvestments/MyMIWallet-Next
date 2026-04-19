# MyMI Wallet Mobile Overlap App

Expo + React Native overlap client for the existing CI4 backend.

## Setup
1. `cd mobile`
2. `cp .env.example .env`
3. `npm install`
4. `npm run start`

## Env
- `EXPO_PUBLIC_API_BASE_URL` (example: `https://www.mymiwallet.com/API`)
- `EXPO_PUBLIC_WEB_BASE_URL` (example: `https://www.mymiwallet.com`)

## Auth flow
- `POST /API/mobile/auth/login`
- `POST /API/mobile/auth/register`
- `POST /API/mobile/auth/logout`
- `GET /API/mobile/me`

Token storage uses Expo Secure Store and is attached as `Authorization: Bearer <token>`.

## Feature map (phase 1)
| Native screen | API endpoint(s) | Web fallback |
|---|---|---|
| Dashboard | `/API/mobile/dashboard` | `/Dashboard` |
| Budget | `/API/mobile/budget` | `/Budget` |
| Investments watchlist | `/API/mobile/investments` | `/Investments` |
| Alerts | `/API/mobile/alerts` | `/Alerts` |
| Support | n/a (web-first) | `/Support` |
| Account settings | `/API/mobile/me` | `/Account/Settings` |

## Notifications scaffold
`expo-notifications` is installed and initialized in `app/_layout.tsx` for future push support.
