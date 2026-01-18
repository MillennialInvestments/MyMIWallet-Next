<?php
// PATCH: Bearer token authentication filter
namespace App\Filters;

use App\Libraries\Api\ApiRequestContext;
use App\Models\ApiTokenModel;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\Filters\FilterInterface;

class ApiTokenAuthFilter implements FilterInterface
{
    public function before(RequestInterface $request, $arguments = null)
    {
        $auth = $request->getHeaderLine('Authorization');
        if (! str_starts_with($auth, 'Bearer ')) {
            return service('response')->setStatusCode(401)->setJSON(['status'=>'error','message'=>'Missing Bearer token']);
        }
        $token = trim(substr($auth, 7));
        if (strlen($token) < 16) {
            return service('response')->setStatusCode(401)->setJSON(['status'=>'error','message'=>'Invalid token']);
        }

        $prefix = substr($token, 0, 12);
        $model = new ApiTokenModel();
        $row = $model->findActiveByPrefix($prefix);
        if (! $row || ! password_verify($token, $row['token_hash'])) {
            return service('response')->setStatusCode(401)->setJSON(['status'=>'error','message'=>'Unauthorized']);
        }

        $scopes = json_decode($row['scopes_json'], true) ?: [];
        ApiRequestContext::set((int)$row['user_id'], $scopes);
        $model->update($row['id'], ['last_used_at'=>date('Y-m-d H:i:s')]);
    }

    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
    {
    }
}
