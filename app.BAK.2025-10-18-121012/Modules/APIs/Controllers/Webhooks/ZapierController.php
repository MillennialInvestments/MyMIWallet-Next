<?php
// PATCH: inbound Zapier webhook endpoint
namespace App\Modules\APIs\Controllers\Webhooks;

use App\Controllers\BaseController;
use App\Models\InboundWebhookModel;

class ZapierController extends BaseController
{
    public function ingest()
    {
        $raw = $this->request->getBody() ?? '';
        $sig = $this->request->getHeaderLine('X-Signature');
        $key = getenv('MYMI_WEBHOOK_SECRET_ZAPIER') ?: '';
        $calc = 'sha256=' . hash_hmac('sha256', $raw, $key);
        $idk = $this->request->getHeaderLine('Idempotency-Key') ?: null;

        $m = new InboundWebhookModel();
        if ($idk) {
            $existing = $m->where(['source'=>'zapier','idempotency_key'=>$idk])->first();
            if ($existing) {
                return $this->response->setJSON(['status'=>'success','data'=>['deduped'=>true]]);
            }
        }

        $status = hash_equals($calc, $sig) ? 'received' : 'invalid_sig';
        $m->insert([
            'source'=>'zapier','idempotency_key'=>$idk,'signature'=>$sig,
            'payload_body'=>$raw,'status'=>$status,'received_at'=>date('Y-m-d H:i:s'),
        ]);

        if ($status !== 'received') {
            return $this->response->setStatusCode(401)->setJSON(['status'=>'error','message'=>'Invalid signature']);
        }
        return $this->response->setJSON(['status'=>'success','data'=>['accepted'=>true]]);
    }
}
