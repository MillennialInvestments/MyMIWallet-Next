<?php
namespace App\Commands\Chat; use App\Commands\SafeBaseCommand; use App\Commands\Support\SubsCommandTrait;
class Status extends SafeBaseCommand { use SubsCommandTrait; protected $group='Chat'; protected $name='chat:status'; protected $description='Chat status'; protected $options=['--json'=>'JSON']; public function run(array $params){$this->parseParams($params);$p=['status'=>'ok','chat'=>$this->mgr()->status('chat.app')];$this->emit($p,$this->optBool('json'));return EXIT_SUCCESS;}}
