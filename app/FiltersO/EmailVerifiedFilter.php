<?php
namespace App\Filters;

use CodeIgniter\Filters\FilterInterface;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;

class EmailVerifiedFilter implements FilterInterface
{
    public function before(RequestInterface $request, $arguments = null)
    {
        $uid = (int) (session('cuID') ?? 0);
        if ($uid <= 0) {
            return;
        }
        $row = db_connect()->table('users')
            ->select('email_verified_at,email_bounced_at')
            ->where('id', $uid)
            ->get()->getRowArray();
        if (! $row) {
            return;
        }
        if (empty($row['email_verified_at']) || (! empty($row['email_bounced_at']))) {
            if ($request->isAJAX() || str_contains((string)$request->getHeaderLine('Accept'), 'application/json')) {
                return service('response')->setStatusCode(403)
                    ->setJSON([
                        'status' => 'error',
                        'message' => 'Email not verified (or delivery failed). Please verify your email.',
                        'csrf' => csrf_hash(),
                    ]);
            }
            return redirect()->to('/Account/verify-email')->with('error', 'Please verify your email.');
        }
    }

    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
    {
    }
}
