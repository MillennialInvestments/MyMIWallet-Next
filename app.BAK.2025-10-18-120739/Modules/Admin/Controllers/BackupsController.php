<?php
namespace App\Modules\Admin\Controllers;

use App\Controllers\BaseController;
use App\Libraries\Backups\BackupService;
use App\Libraries\Flags;

class BackupsController extends BaseController
{
    public function list()
    {
        if (! can('backup.view')) return $this->forbid();
        $rows = db_connect()->table('bf_backup_manifests')->orderBy('created_at','DESC')->get()->getResultArray();
        return $this->ok('OK', ['items'=>$rows]);
    }

    public function run()
    {
        if (! can('backup.manage')) return $this->forbid();
        if (! Flags::enabled('ops.backup')) return $this->fail('Backups disabled');
        $db = BackupService::backupDatabase();
        $fs = BackupService::backupFiles();
        audit('backup.run', ['db'=>$db['filename'],'files'=>$fs['filename']], 'backup');
        return $this->ok('Backups created', ['db'=>$db,'files'=>$fs]);
    }

    public function prune()
    {
        if (! can('backup.manage')) return $this->forbid();
        $res = BackupService::prune();
        audit('backup.prune', $res, 'backup');
        return $this->ok('Pruned', $res);
    }

    private function ok(string $m, array $d=[]) { return $this->response->setJSON(['status'=>'success','message'=>$m,'data'=>$d,'csrf'=>csrf_hash()]); }
    private function fail(string $m) { return $this->response->setJSON(['status'=>'error','message'=>$m,'csrf'=>csrf_hash()]); }
    private function forbid() { return $this->response->setStatusCode(403)->setJSON(['status'=>'error','message'=>'Forbidden','csrf'=>csrf_hash()]); }
}
