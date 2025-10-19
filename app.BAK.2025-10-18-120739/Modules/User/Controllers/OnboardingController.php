<?php
namespace App\Modules\User\Controllers;

use App\Controllers\BaseController;
use App\Services\OnboardingService;
use App\Libraries\Flags;

class OnboardingController extends BaseController
{
    public function get()
    {
        if (! Flags::enabled('ui.onboarding')) {
            return $this->response->setJSON(['status'=>'success','data'=>['enabled'=>false],'csrf'=>csrf_hash()]);
        }
        $uid = (int)(session('cuID') ?? 0);
        $steps = OnboardingService::listAll();
        $done = OnboardingService::progress($uid);
        $items = [];
        foreach ($steps as $s) {
            $items[] = ['code'=>$s['code'],'title'=>$s['title'],'done'=>array_key_exists($s['code'],$done)];
        }
        return $this->response->setJSON(['status'=>'success','data'=>['enabled'=>true,'steps'=>$items],'csrf'=>csrf_hash()]);
    }

    public function mark()
    {
        if (! Flags::enabled('ui.onboarding')) return $this->fail('Onboarding disabled');
        $uid = (int)(session('cuID') ?? 0);
        $code = (string)$this->request->getPost('code');
        if (!$code) return $this->fail('code required');
        OnboardingService::complete($uid, $code);
        audit('onboarding.complete', ['code'=>$code], 'onboarding');
        return $this->ok('Saved');
    }

    private function ok(string $m, array $d=[]) { return $this->response->setJSON(['status'=>'success','message'=>$m,'data'=>$d,'csrf'=>csrf_hash()]); }
    private function fail(string $m) { return $this->response->setJSON(['status'=>'error','message'=>$m,'csrf'=>csrf_hash()]); }
}
