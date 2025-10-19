<?php
namespace App\Modules\User\Controllers;

use App\Controllers\BaseController;
use App\Models\PrivacyRequestModel;
use App\Libraries\Privacy\DataExportService;
use App\Libraries\Privacy\DataErasureService;

class PrivacyController extends BaseController
{
    public function requestExport()
    {
        if (! can('privacy.export')) return $this->forbid();
        $m = new PrivacyRequestModel();
        $id = $m->insert([
            'user_id' => (int)session('cuID'),
            'type'    => 'export',
            'status'  => 'pending',
            'created_at'=>date('Y-m-d H:i:s'),
        ]);
        audit('privacy.request', ['type'=>'export','req_id'=>$id], 'privacy');
        return $this->ok('Request submitted.');
    }

    public function requestErasure()
    {
        if (! can('privacy.erase')) return $this->forbid();
        $m = new PrivacyRequestModel();
        $id = $m->insert([
            'user_id' => (int)session('cuID'),
            'type'    => 'erase',
            'status'  => 'pending',
            'created_at'=>date('Y-m-d H:i:s'),
        ]);
        audit('privacy.request', ['type'=>'erase','req_id'=>$id], 'privacy');
        return $this->ok('Request submitted.');
    }

    public function adminApproveExport(int $requestId)
    {
        if (! can('privacy.manage')) return $this->forbid();
        $m = new PrivacyRequestModel();
        $req = $m->find($requestId); if (!$req || $req['type']!=='export') return $this->fail('Not found');
        $svc = new DataExportService(db_connect());
        $path = $svc->exportUser((int)$req['user_id']);
        $m->update($requestId, ['status'=>'done','result_path'=>$path,'updated_at'=>date('Y-m-d H:i:s')]);
        audit('privacy.export', ['req_id'=>$requestId,'path'=>basename($path)], 'privacy');
        return $this->ok('Export ready', ['path'=>$path]);
    }

    public function adminApproveErasure(int $requestId)
    {
        if (! can('privacy.manage')) return $this->forbid();
        $m = new PrivacyRequestModel();
        $req = $m->find($requestId); if (!$req || $req['type']!=='erase') return $this->fail('Not found');
        $svc = new DataErasureService(db_connect());
        $changed = $svc->pseudonymizeUser((int)$req['user_id']);
        $m->update($requestId, ['status'=>'done','updated_at'=>date('Y-m-d H:i:s'),'notes'=>"rows:$changed"]);
        audit('privacy.erase', ['req_id'=>$requestId,'rows'=>$changed], 'privacy');
        return $this->ok("Erasure completed ($changed rows).");
    }

    private function ok(string $msg, array $data=[]){ return $this->response->setJSON(['status'=>'success','message'=>$msg,'data'=>$data,'csrf'=>csrf_hash()]); }
    private function fail(string $msg){ return $this->response->setJSON(['status'=>'error','message'=>$msg,'csrf'=>csrf_hash()]); }
    private function forbid(){ return $this->response->setStatusCode(403)->setJSON(['status'=>'error','message'=>'Forbidden','csrf'=>csrf_hash()]); }
}
