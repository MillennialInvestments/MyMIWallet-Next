<?php
namespace App\Commands\AiOps\N8n; use App\Commands\SafeBaseCommand; use App\Commands\Support\SubsCommandTrait;
class Start extends SafeBaseCommand { use SubsCommandTrait; protected $group = 'AIOps'; protected $name='aiops:n8n:start'; protected $description='Start n8n'; protected $options=['--json'=>'JSON','--dry-run'=>'Dry']; public function run(array $params){$this->parseParams($params);$r=$this->mgr()->start('aiops.n8n',$this->optBool('dry-run'));$this->emit($r,$this->optBool('json'));return ($r['ok']??false)?EXIT_SUCCESS:EXIT_ERROR;}}
