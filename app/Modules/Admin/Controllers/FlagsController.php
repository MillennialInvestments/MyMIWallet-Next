<?php
namespace App\Modules\Admin\Controllers;

use App\Controllers\BaseController;
use App\Models\FeatureFlagModel;
use App\Models\FeatureFlagOverrideModel;
use App\Libraries\Flags;

// PATCH: admin feature flag management controller
class FlagsController extends BaseController
{
    public function index()
    {
        if (! can('flags.manage')) return $this->forbid();
        $rows = (new FeatureFlagModel())->orderBy('flag','ASC')->findAll(200);
        return $this->response->setJSON(['status'=>'success','data'=>['flags'=>$rows],'csrf'=>csrf_hash()]);
    }

    public function upsert()
    {
        if (! can('flags.manage')) return $this->forbid();
        $flag = trim((string)$this->request->getPost('flag'));
        $enabled = (int)$this->request->getPost('enabled');
        $pct = max(0, min(100, (int)$this->request->getPost('rollout_pct')));
        $desc = (string)$this->request->getPost('description');
        $rules = $this->request->getPost('rules_json');
        $rulesJson = is_array($rules) ? json_encode($rules) : (string)$rules;
        if ($flag === '') return $this->fail('flag required');

        $m = new FeatureFlagModel();
        $row = $m->getByFlag($flag);
        $payload = [
            'flag'=>$flag,'enabled'=>$enabled,'rollout_pct'=>$pct,
            'rules_json'=>$rulesJson ?: null,'description'=>$desc ?: null,
            'updated_at'=>date('Y-m-d H:i:s'),
        ];
        if ($row) $m->update($row['id'],$payload); else { $payload['created_at']=date('Y-m-d H:i:s'); $m->insert($payload); }
        audit('flags.update', ['flag'=>$flag,'enabled'=>$enabled,'pct'=>$pct], 'flags');
        Flags::bust($flag);
        return $this->ok('Saved');
    }

    public function overrideUser()
    {
        if (! can('flags.manage')) return $this->forbid();
        $flag = (string)$this->request->getPost('flag');
        $user = (int)$this->request->getPost('user_id');
        $allow = (int)$this->request->getPost('allow') ? 1 : 0;
        if (!$flag || !$user) return $this->fail('flag and user_id required');

        $m = new FeatureFlagOverrideModel();
        $existing = $m->where(['flag'=>$flag,'user_id'=>$user])->first();
        if ($existing) $m->update($existing['id'], ['allow'=>$allow]);
        else $m->insert(['flag'=>$flag,'user_id'=>$user,'allow'=>$allow,'created_at'=>date('Y-m-d H:i:s')]);
        audit('flags.override', ['flag'=>$flag,'user_id'=>$user,'allow'=>$allow], 'flags');
        Flags::bust($flag);
        return $this->ok('Override saved');
    }

    private function ok(string $msg, array $data=[]){ return $this->response->setJSON(['status'=>'success','message'=>$msg,'data'=>$data,'csrf'=>csrf_hash()]); }
    private function fail(string $msg){ return $this->response->setJSON(['status'=>'error','message'=>$msg,'csrf'=>csrf_hash()]); }
    private function forbid(){ return $this->response->setStatusCode(403)->setJSON(['status'=>'error','message'=>'Forbidden','csrf'=>csrf_hash()]); }
}
