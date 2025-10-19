<?php
namespace App\Modules\APIs\Controllers\Webhooks;

use App\Controllers\BaseController;
use App\Libraries\Security\Redactor;

class EmailBounceController extends BaseController
{
    public function ingest()
    {
        $raw = $this->request->getBody() ?? '';
        $json = json_decode($raw, true) ?: [];
        $email = $json['email'] ?? '';
        $event = strtolower($json['event'] ?? 'bounce');
        $reason = $json['reason'] ?? null;

        if ($email) {
            $user = db_connect()->table('users')->select('id')->where('email', $email)->get()->getRowArray();
            db_connect()->table('bf_marketing_email_bounces')->insert([
                'user_id' => $user['id'] ?? null,
                'email' => $email,
                'provider' => 'esp',
                'event' => $event,
                'reason' => $reason,
                'created_at' => date('Y-m-d H:i:s'),
            ]);
            if ($user) {
                db_connect()->table('users')->where('id', $user['id'])->set(['email_bounced_at' => date('Y-m-d H:i:s')])->update();
            }
        }
        audit('email.bounce', ['email' => $email ? Redactor::email($email) : null, 'event' => $event], 'email');
        return $this->response->setJSON(['status' => 'success', 'data' => ['accepted' => true]]);
    }
}
