# Public Routes Inventory

This inventory captures intentionally public-facing routes from the application route configs, including core auth flows, marketing pages, blog/support content, and public webhooks/health checks. It is used to validate that authentication guards only apply where intended.

## Notes

- “Filter Applied” reflects route-level filters plus global filter exceptions. Public routes should not be blocked by `authcheck` or `login` filters.
- `/features`, `/contact`, and `/verify-email` were **not found** in the current route configs; if they should exist, add explicit routes or update the allowlist/audit.

## Route Inventory

| Route | Controller | Method | Intended Access | Filter Applied |
| --- | --- | --- | --- | --- |
| `/` | `Home::index` | GET | Public landing page | No route filter; `authcheck` global exception |
| `/login` | `AuthController::login` | GET | Public auth entry | No route filter; `authcheck` global exception |
| `/login` | `AuthController::attemptLogin` | POST | Public auth submission | No route filter; `authcheck` global exception |
| `/logout` | `AuthController::logout` | GET/POST | Public logout redirect | No route filter; `authcheck` global exception |
| `/register` | `AuthController::register` | GET | Public registration | No route filter; `authcheck` global exception |
| `/register` | `AuthController::attemptRegister` | POST | Public registration submit | No route filter; `authcheck` global exception |
| `/register/success` | `AuthController::registerSuccess` | GET | Public registration confirmation | No route filter; `authcheck` global exception |
| `/register/resend-activation` | `AuthController::resendRegistrationActivation` | POST | Public activation resend | No route filter; `authcheck` global exception |
| `/register/(:segment)` | `AuthController::register/$1` | GET | Public registration referral | No route filter; `authcheck` global exception |
| `/:any/register` | `AuthController::register` | GET | Public registration referral | No route filter; `authcheck` global exception |
| `/:any/register/(:segment)` | `AuthController::register/$2` | GET | Public registration referral | No route filter; `authcheck` global exception |
| `/activate` | `AuthController::activateAccount` | GET | Public account activation | No route filter; `authcheck` global exception |
| `/activate-account` | `AuthController::activateAccount` | GET/POST | Public account activation | No route filter; `authcheck` global exception |
| `/activate-account/(:segment)` | `AuthController::activateAccount` | POST | Public account activation | No route filter; `authcheck` global exception |
| `/resend-activate-account` | `AuthController::resendActivateAccount` | GET | Public activation resend | No route filter; `authcheck` global exception |
| `/forgot-password` | `AuthController::forgotPassword` | GET | Public password reset request | No route filter; `authcheck` global exception |
| `/reset-password` | `AuthController::resetPassword` | GET | Public password reset form | No route filter; `authcheck` global exception |
| `/forgot` | `AuthController::attemptForgot` | POST | Public password reset request | No route filter; `authcheck` global exception |
| `/reset-password` | `AuthController::attemptReset` | POST | Public password reset submit | No route filter; `authcheck` global exception |
| `/Apex/Referral` | `Home::apexReferral` | GET | Public campaign landing | No route filter; `authcheck` global exception |
| `/Corporate-Earnings` | `Home::corporateEarnings` | GET | Public marketing page | No route filter; `authcheck` global exception |
| `/Economic-Calendar` | `Home::economicCalendar` | GET | Public marketing page | No route filter; `authcheck` global exception |
| `/Getting-Started` | `Home::gettingStarted` | GET | Public onboarding | No route filter; `authcheck` global exception |
| `/Memberships` | `Home::memberships` | GET | Public pricing/tiers | No route filter; `authcheck` global exception |
| `/Privacy-Policy` | `Home::privacyPolicy` | GET | Public legal page | No route filter; `authcheck` global exception |
| `/Terms-Of-Service` | `Home::termsOfService` | GET | Public legal page | No route filter; `authcheck` global exception |
| `/Alerts/Preview/(:segment)` | `AlertsController::preview/$1` | GET | Public preview | No route filter; `authcheck` global exception |
| `/Preview/Alert/(:segment)` | `AlertsController::preview/$1` | GET | Public preview (legacy) | No route filter; `authcheck` global exception |
| `/blog` | `App\Modules\Blog\Controllers\Blog::index` | GET | Public blog landing | No route filter; `authcheck` global exception |
| `/Blog` | `BlogController::index` | GET | Public blog landing | No route filter; `authcheck` global exception |
| `/Blog/Post/(:segment)` | `BlogController::viewBlog/$1` | GET | Public blog post | No route filter; `authcheck` global exception |
| `/Blog/News-And-Updates` | `NewsAndUpdates::index` | GET | Public news page | No route filter; `authcheck` global exception |
| `/News` | Redirect to `/Blog/News-And-Updates` | GET | Public news redirect | No route filter; `authcheck` global exception |
| `/How-It-Works` | `HowItWorksController::index` | GET | Public marketing page | No route filter; `authcheck` global exception |
| `/How-It-Works/pricing` | `HowItWorksController::pricing` | GET | Public pricing page | No route filter; `authcheck` global exception |
| `/pricing` | `HowItWorksController::pricing` | GET | Public pricing alias | No route filter; `authcheck` global exception |
| `/Support` | `SupportController::index` | GET | Public support portal | No route filter; `authcheck` global exception |
| `/Support/FAQ` | `SupportController::faq` | GET | Public support FAQ | No route filter; `authcheck` global exception |
| `/Support/Article/(:segment)` | `SupportController::article/$1` | GET | Public support article | No route filter; `authcheck` global exception |
| `/healthz` | `System\HealthController::healthz` | GET | Public health check | No route filter; `authcheck` global exception |
| `/health` | `Health::index` | GET | Public health JSON | No route filter; `authcheck` global exception |
| `/status` | `Health::status` | GET | Public status ping | No route filter; `authcheck` global exception |
| `/api/health` | `Api\HealthController::index` | GET | Public API health alias | No route filter; `authcheck` global exception |
| `/API/Discord/webhook` | `DiscordController::webhookProxy` | POST | Public webhook ingress | No route filter; `authcheck` global exception (`/API/*`) |
| `/API/Email/trackBounceWebhook` | `EmailController::trackBounceWebhook` | GET | Public webhook ingress | No route filter; `authcheck` global exception (`/API/*`) |
| `/API/eSports/receiveResultWebhook` | `EsportsController::receiveResultWebhook` | POST | Public webhook ingress | No route filter; `authcheck` global exception (`/API/*`) |
| `/API/Wallets/Plaid/Webhook` | `WalletsController::plaidWebhook` | GET | Public webhook ingress | No route filter; `authcheck` global exception (`/API/*`) |
