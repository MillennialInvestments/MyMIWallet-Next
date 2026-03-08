<?php
namespace App\Commands\Ops\Subs; use App\Commands\SafeBaseCommand; use App\Commands\Support\SubsCommandTrait;
class Repair extends SafeBaseCommand { use SubsCommandTrait; protected $group='Ops'; protected $name='ops:subs:repair'; protected $description='Run subsystem repairs'; protected $options=['--json'=>'JSON']; public function run(array $params){$this->parseParams($params);$p=['status'=>'ok','aiops_repair'=>command('aiops:repair --json=1'),'chat_repair'=>command('chat:repair --json=1')];$this->emit($p,$this->optBool('json'));return EXIT_SUCCESS;}}
