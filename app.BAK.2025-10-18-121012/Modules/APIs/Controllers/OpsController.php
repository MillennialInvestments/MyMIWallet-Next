<?php namespace App\Modules\APIs\Controllers;

use CodeIgniter\RESTful\ResourceController;

#[\AllowDynamicProperties]
class OpsController extends ResourceController
{
    public function opcacheReset()
    {
        $tokenHeader = service('request')->getHeaderLine('X-OPCACHE-RESET');
        $tokenEnv    = env('OPCACHE_RESET_TOKEN');

        if (! $tokenEnv || ! $tokenHeader || ! hash_equals($tokenEnv, $tokenHeader)) {
            return $this->fail('Forbidden', 403);
        }

        if (function_exists('opcache_reset') && opcache_reset()) {
            return $this->respond(['status' => 'OK'], 200);
        }

        return $this->fail('Failed', 500);
    }
}
