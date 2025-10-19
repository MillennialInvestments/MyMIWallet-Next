<?php
namespace App\Modules\Status\Controllers;

use App\Controllers\BaseController;

class HealthController extends BaseController
{
    public function live()
    {
        return $this->response->setJSON([
            'status' => 'success',
            'data' => ['alive' => true],
            'csrf' => csrf_hash(),
        ]);
    }

    public function ready()
    {
        $checks = $this->deps();
        $ok = array_reduce($checks, fn($c,$i)=> $c && ($i['status']==='ok' || $i['status']==='degraded'), true);
        $code = $ok ? 200 : 503;
        return $this->response->setStatusCode($code)->setJSON([
            'status' => $ok ? 'success' : 'error',
            'data' => ['checks' => $checks],
            'csrf' => csrf_hash(),
        ]);
    }

    public function deps(bool $raw = true)
    {
        $out = [];
        try { db_connect()->query('SELECT 1'); $out[]=['name'=>'db','status'=>'ok']; }
        catch (\Throwable $e){ $out[]=['name'=>'db','status'=>'fail','note'=>$e->getMessage()]; }
        try {
            $heartbeatKey = sanitizeCacheKey('hz');
            cache()->save($heartbeatKey,'1',10);
            $ok = cache()->get($heartbeatKey)==='1';
            $out[]=['name'=>'cache','status'=>$ok?'ok':'fail'];
        }
        catch (\Throwable $e){ $out[]=['name'=>'cache','status'=>'fail']; }
        try { $jobs=db_connect()->table('bf_jobs')->countAllResults(); $out[]=['name'=>'queue','status'=>$jobs<1000?'ok':'degraded','backlog'=>$jobs]; }
        catch(\Throwable $e){ $out[]=['name'=>'queue','status'=>'fail']; }
        try { $rows=db_connect()->table('bf_circuit_breakers')->select('name,state')->get()->getResultArray(); foreach($rows as $r){ $out[]=['name'=>'cb:'.$r['name'],'status'=>$r['state']==='open'?'degraded':'ok','state'=>$r['state']]; }}
        catch(\Throwable $e){ }
        if ($raw) { return $out; }
        $ok = array_reduce($out, fn($c,$i)=> $c && ($i['status']==='ok' || $i['status']==='degraded'), true);
        return $this->response->setStatusCode($ok?200:503)->setJSON([
            'status'=>$ok?'success':'error',
            'data'=>['checks'=>$out],
            'csrf'=>csrf_hash(),
        ]);
    }

    public function depsJson()
    {
        return $this->deps(false);
    }
}
