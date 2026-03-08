<?php
namespace App\Commands\Ops; use App\Commands\SafeBaseCommand; use App\Commands\Support\SubsCommandTrait;
class SubsStatus extends SafeBaseCommand { use SubsCommandTrait; protected $group='Ops'; protected $name='ops:subs:status'; protected $description='Combined subsystem status'; protected $options=['--json'=>'JSON']; public function run(array $params){$this->parseParams($params);$m=$this->mgr();$p=['status'=>'ok','aiops'=>$m->status('aiops.n8n'),'chat'=>$m->status('chat.app')];$this->emit($p,$this->optBool('json'));return EXIT_SUCCESS;}}
