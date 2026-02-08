<?php
namespace App\Commands\Chat; use App\Commands\SafeBaseCommand; use App\Commands\Support\SubsCommandTrait;
class Start extends SafeBaseCommand { use SubsCommandTrait; protected $group='Chat'; protected $name='chat:start'; protected $description='Start chat'; protected $options=['--json'=>'JSON','--dry-run'=>'Dry']; public function run(array $params){$this->parseParams($params);$r=$this->mgr()->start('chat.app',$this->optBool('dry-run'));$this->emit($r,$this->optBool('json'));return ($r['ok']??false)?EXIT_SUCCESS:EXIT_ERROR;}}
