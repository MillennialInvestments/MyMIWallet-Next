<?php
// PATCH: personal API token management endpoints
namespace App\Modules\APIs\Controllers;

use App\Controllers\BaseController;
use App\Models\ApiTokenModel;

class KeysController extends BaseController
{
    public function index()
    {
        if (! can('api.keys.manage')) {
            return $this->response->setStatusCode(403)->setJSON(['status'=>'error','message'=>'Forbidden','csrf'=>csrf_hash()]);
        }
        $rows = (new ApiTokenModel())->where('user_id', (int)session('cuID'))->findAll();
        $list = array_map(static function($r){
            return [
                'prefix' => $r['token_prefix'],
                'scopes' => json_decode($r['scopes_json'], true) ?: [],
                'created_at' => $r['created_at'],
                'last_used_at'=> $r['last_used_at'],
                'revoked_at'  => $r['revoked_at'],
            ];
        }, $rows);

        return $this->response->setJSON(['status'=>'success','data'=>['tokens'=>$list],'csrf'=>csrf_hash()]);
    }

    public function create()
    {
        if (! can('api.keys.manage')) {
            return $this->response->setStatusCode(403)->setJSON(['status'=>'error','message'=>'Forbidden','csrf'=>csrf_hash()]);
        }
        $scopes = $this->request->getPost('scopes');
        if (! is_array($scopes) || empty($scopes)) {
            return $this->response->setJSON(['status'=>'error','message'=>'Select at least one scope','csrf'=>csrf_hash()]);
        }

        $plain = 'mymi_' . bin2hex(random_bytes(24));
        $prefix = substr($plain, 0, 12);
        $hash   = crypto_hash_password($plain);

        $m = new ApiTokenModel();
        $m->insert([
            'user_id'      => (int)session('cuID'),
            'token_prefix' => $prefix,
            'token_hash'   => $hash,
            'scopes_json'  => json_encode(array_values(array_unique($scopes))),
            'created_at'   => date('Y-m-d H:i:s'),
        ]);
        audit('api.key.create', ['scope_count'=>count($scopes)], 'api-key');
        return $this->response->setJSON([
            'status'=>'success',
            'data'=>['token'=>$plain,'prefix'=>$prefix],
            'csrf'=>csrf_hash(),
        ]);
    }

    public function revoke(string $prefix)
    {
        if (! can('api.keys.manage')) {
            return $this->response->setStatusCode(403)->setJSON(['status'=>'error','message'=>'Forbidden','csrf'=>csrf_hash()]);
        }
        $m = new ApiTokenModel();
        $row = $m->where(['user_id'=>(int)session('cuID'),'token_prefix'=>$prefix])->first();
        if (! $row) {
            return $this->response->setJSON(['status'=>'error','message'=>'Not found','csrf'=>csrf_hash()]);
        }
        $m->update($row['id'], ['revoked_at'=>date('Y-m-d H:i:s')]);
        audit('api.key.revoke', ['prefix'=>$prefix], 'api-key');
        return $this->response->setJSON(['status'=>'success','message'=>'Revoked','csrf'=>csrf_hash()]);
    }
}
