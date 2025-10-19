<?php
namespace App\Modules\Admin\Controllers;

use App\Controllers\BaseController;

class PrivacyController extends BaseController
{
    public function requestExport()
    {
        if (! can('privacy.manage')) return $this->forbid();
        $uid = (int)$this->request->getPost('user_id');
        $path = $this->buildUserExport($uid);
        db_connect()->table('bf_gdpr_requests')->insert([
            'user_id'=>$uid,'type'=>'export','state'=>'done','artifact'=>basename($path),
            'created_at'=>date('Y-m-d H:i:s'),'completed_at'=>date('Y-m-d H:i:s')
        ]);
        audit('gdpr.export', ['user_id'=>$uid], 'privacy');
        return $this->ok('Export ready', ['artifact'=>basename($path)]);
    }

    public function requestErase()
    {
        if (! can('privacy.manage')) return $this->forbid();
        $uid = (int)$this->request->getPost('user_id');
        $hold = db_connect()->table('bf_legal_holds')->where('user_id',$uid)->countAllResults();
        if ($hold > 0) return $this->fail('User is under legal hold');
        $this->eraseUser($uid);
        db_connect()->table('bf_gdpr_requests')->insert([
            'user_id'=>$uid,'type'=>'erase','state'=>'done','created_at'=>date('Y-m-d H:i:s'),'completed_at'=>date('Y-m-d H:i:s')
        ]);
        audit('gdpr.erase', ['user_id'=>$uid], 'privacy');
        return $this->ok('User data erased');
    }

    public function downloadArtifact(string $file)
    {
        if (! can('privacy.manage')) return $this->forbid();
        $path = WRITEPATH.'exports/'.$file;
        if (!is_file($path)) return $this->fail('Not found');
        return $this->response->download($path, null)->setFileName($file);
    }

    private function buildUserExport(int $userId): string
    {
        $dir = WRITEPATH.'exports';
        if (!is_dir($dir)) @mkdir($dir,0755,true);
        $zipPath = $dir.'/user_'.$userId.'_'.date('Ymd_His').'.zip';
        $zip = new \ZipArchive();
        $zip->open($zipPath, \ZipArchive::CREATE);
        $db = db_connect();
        $tables = [
            'users' => 'id='.$userId,
            'bf_fin_trades' => 'user_id='.$userId,
            'bf_push_subscriptions' => 'user_id='.$userId,
        ];
        foreach ($tables as $t=>$w) {
            $rows = $db->query("SELECT * FROM {$t} WHERE {$w}")->getResultArray();
            $zip->addFromString('db/'.$t.'.json', json_encode($rows, JSON_UNESCAPED_SLASHES));
        }
        $zip->close();
        return $zipPath;
    }

    private function eraseUser(int $userId): void
    {
        $db = db_connect();
        $db->table('users')->where('id',$userId)->set([
            'email'=>'deleted+'.$userId.'@example.local',
            'name'=>'Deleted User '.$userId,
            'email_verified_at'=>null,
            'deleted_at'=>date('Y-m-d H:i:s')
        ])->update();
        $db->table('bf_push_subscriptions')->where('user_id',$userId)->set(['revoked_at'=>date('Y-m-d H:i:s')])->update();
        $db->table('bf_fin_trades')->where('user_id',$userId)->set(['user_id'=>0])->update();
    }

    private function ok(string $m, array $d=[]) { return $this->response->setJSON(['status'=>'success','message'=>$m,'data'=>$d,'csrf'=>csrf_hash()]); }
    private function fail(string $m) { return $this->response->setJSON(['status'=>'error','message'=>$m,'csrf'=>csrf_hash()]); }
    private function forbid() { return $this->response->setStatusCode(403)->setJSON(['status'=>'error','message'=>'Forbidden','csrf'=>csrf_hash()]); }
}
