# CI4 Patch Stub — Mobile Auth + Watchlist + Alerts Feed

> Copy these snippets into your CI4 codebase (e.g., `app/Modules/APIs/Controllers`) and wire routes in `app/Config/Routes.php`. Replace placeholder model calls with real implementations from `MyMIUser`, `MyMIAlerts`, `MyMIInvestments`.

## Routes (`app/Config/Routes.php`)
```php
$routes->group('API', ['namespace' => 'App\Modules\APIs\Controllers'], static function ($routes) {
    $routes->post('Auth/login', 'MobileAuthController::login');
    $routes->post('Auth/register', 'MobileAuthController::register');
    $routes->post('Auth/refresh', 'MobileAuthController::refresh');
    $routes->post('Auth/logout', 'MobileAuthController::logout');

    $routes->get('User/me', 'MobileUserController::me', ['filter' => 'auth:bearer']);

    $routes->group('Watchlist', ['filter' => 'auth:bearer'], static function ($routes) {
        $routes->get('/', 'WatchlistController::list');
        $routes->post('/', 'WatchlistController::add');
        $routes->delete('(:segment)', 'WatchlistController::remove/$1');
    });

    $routes->get('Alerts/feed', 'MobileAlertsController::feed', ['filter' => 'auth:bearer']);
});
```

## Controllers (stubs)

### `MobileAuthController.php`
```php
<?php namespace App\Modules\APIs\Controllers;

use CodeIgniter\RESTful\ResourceController;
use App\Libraries\MyMIUser; // replace with actual user service
use App\Libraries\JwtService; // create a small JWT helper or reuse existing

class MobileAuthController extends ResourceController
{
    protected $format = 'json';

    public function login()
    {
        $payload = $this->request->getJSON(true) ?? [];
        $email = strtolower(trim($payload['email'] ?? ''));
        $password = $payload['password'] ?? '';

        if ($email === '' || $password === '') {
            return $this->failValidationErrors('Email and password are required');
        }

        $userService = service('MyMIUser');
        $user = $userService->attemptLogin($email, $password); // implement using CI4 auth or custom model
        if (! $user) {
            return $this->failUnauthorized('Invalid credentials');
        }

        $tokens = service('jwtService')->issuePair($user->id); // returns ['accessToken','refreshToken','expiresIn']
        return $this->respond(['success' => true, 'data' => $tokens]);
    }

    public function register()
    {
        $payload = $this->request->getJSON(true) ?? [];
        $user = service('MyMIUser')->createUser($payload); // implement validation + hashing
        if (! $user) {
            return $this->failValidationErrors('Unable to register user');
        }
        $tokens = service('jwtService')->issuePair($user->id);
        return $this->respondCreated(['success' => true, 'data' => $tokens]);
    }

    public function refresh()
    {
        $payload = $this->request->getJSON(true) ?? [];
        $refresh = $payload['refreshToken'] ?? '';
        $tokens = service('jwtService')->refresh($refresh);
        if (! $tokens) {
            return $this->failUnauthorized('Refresh token invalid');
        }
        return $this->respond(['success' => true, 'data' => $tokens]);
    }

    public function logout()
    {
        $payload = $this->request->getJSON(true) ?? [];
        $refresh = $payload['refreshToken'] ?? '';
        service('jwtService')->revoke($refresh);
        return $this->respond(['success' => true, 'data' => ['message' => 'Logged out']]);
    }
}
```

### `MobileUserController.php`
```php
<?php namespace App\Modules\APIs\Controllers;

use CodeIgniter\RESTful\ResourceController;

class MobileUserController extends ResourceController
{
    protected $format = 'json';

    public function me()
    {
        $user = service('auth')->user(); // bearer-capable auth filter should set this
        if (! $user) {
            return $this->failUnauthorized('User not found');
        }
        return $this->respond([
            'success' => true,
            'data' => [
                'id' => $user->id,
                'email' => $user->email,
                'name' => $user->display_name ?? $user->username,
            ],
        ]);
    }
}
```

### `WatchlistController.php`
```php
<?php namespace App\Modules\APIs\Controllers;

use CodeIgniter\RESTful\ResourceController;

class WatchlistController extends ResourceController
{
    protected $format = 'json';

    public function list()
    {
        $userId = service('auth')->user()->id;
        $rows = service('MyMIInvestments')->getUserWatchlist($userId); // implement using existing model
        return $this->respond(['success' => true, 'data' => $rows]);
    }

    public function add()
    {
        $userId = service('auth')->user()->id;
        $payload = $this->request->getJSON(true) ?? [];
        $symbol = strtoupper($payload['symbol'] ?? '');
        if ($symbol === '') {
            return $this->failValidationErrors('Symbol required');
        }
        service('MyMIInvestments')->addToWatchlist($userId, $symbol, $payload['notes'] ?? null);
        return $this->respondCreated(['success' => true, 'data' => ['symbol' => $symbol]]);
    }

    public function remove($symbol)
    {
        $userId = service('auth')->user()->id;
        service('MyMIInvestments')->removeFromWatchlist($userId, strtoupper($symbol));
        return $this->respondDeleted(['success' => true, 'data' => ['symbol' => strtoupper($symbol)]]);
    }
}
```

### `MobileAlertsController.php`
```php
<?php namespace App\Modules\APIs\Controllers;

use CodeIgniter\RESTful\ResourceController;

class MobileAlertsController extends ResourceController
{
    protected $format = 'json';

    public function feed()
    {
        $userId = service('auth')->user()->id;
        $items = service('MyMIAlerts')->getRecentAlertsForUser($userId, 50); // implement using existing alert manager/model
        return $this->respond(['success' => true, 'data' => $items]);
    }
}
```

## Sample responses
```json
// Login
{ "success": true, "data": { "accessToken": "<jwt>", "refreshToken": "<jwt>", "expiresIn": 3600 } }

// Watchlist list
{ "success": true, "data": [{ "symbol": "AAPL", "notes": "Tech core", "created_at": "2025-06-17" }] }

// Alerts feed
{ "success": true, "data": [{ "id": 123, "symbol": "NVDA", "type": "price", "message": "Crossed $140", "created_at": "2025-06-17T09:00:00Z" }] }
```
