<?php
namespace App\Modules\User\Controllers;

use App\Controllers\BaseController;
use App\Libraries\Security\Redactor;

class EmailController extends BaseController
{
    public function sendVerification()
    {
        if (! can('email.verify')) {
            return $this->forbid();
        }
        $uid = (int) session('cuID');
        $user = db_connect()->table('users')->where('id', $uid)->get()->getRowArray();
        if (! $user) {
            return $this->fail('User not found');
        }
        $token = bin2hex(random_bytes(24));
        $hash = crypto_hash_password($token);
        db_connect()->table('users')->where('id', $uid)->set(['email_verification_token_hash' => $hash])->update();

        $link = rtrim(getenv('APP_URL') ?: site_url(), '/') . '/Account/verify-email/' . $token;
        $email = service('email');
        $email->setTo($user['email']);
        $email->setFrom(getenv('EMAIL_FROM') ?: 'noreply@localhost', 'MyMI Wallet');
        $email->setSubject('Verify your email');
        $email->setMessage("Click to verify: {$link}");
        @$email->send();

        audit('email.verify.send', ['email' => Redactor::email($user['email'])], 'email');
        return $this->ok('Verification email sent.');
    }

    public function verifyToken(string $token)
    {
        $uid = (int) session('cuID');
        $row = db_connect()->table('users')
            ->select('email_verification_token_hash')
            ->where('id', $uid)
            ->get()->getRowArray();
        if (! $row || empty($row['email_verification_token_hash'])) {
            return $this->fail('No verification requested');
        }
        if (! password_verify($token, $row['email_verification_token_hash'])) {
            return $this->fail('Invalid token');
        }
        db_connect()->table('users')->where('id', $uid)->set([
            'email_verified_at' => date('Y-m-d H:i:s'),
            'email_verification_token_hash' => null,
            'email_bounced_at' => null,
        ])->update();
        audit('email.verify.ok', [], 'email');
        return redirect()->to('/')->with('success', 'Email verified!');
    }

    private function ok(string $msg, array $data = [])
    {
        return $this->response->setJSON(['status' => 'success', 'message' => $msg, 'data' => $data, 'csrf' => csrf_hash()]);
    }
    private function fail(string $msg)
    {
        return $this->response->setJSON(['status' => 'error', 'message' => $msg, 'csrf' => csrf_hash()]);
    }
    private function forbid()
    {
        return $this->response->setStatusCode(403)->setJSON(['status' => 'error', 'message' => 'Forbidden', 'csrf' => csrf_hash()]);
    }
}
