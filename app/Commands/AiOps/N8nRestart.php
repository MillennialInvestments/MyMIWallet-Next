<?php
namespace App\Commands\AiOps; use App\Commands\SafeBaseCommand; use App\Commands\Support\SubsCommandTrait;
class N8nRestart extends SafeBaseCommand { use SubsCommandTrait; protected $group = 'AI-Ops'; protected $name='aiops:n8n:restart'; protected $description='Restart n8n'; protected $options=['--json'=>'JSON','--dry-run'=>'Dry']; public function run(array $params){$this->parseParams($params);$r=$this->mgr()->restart('aiops.n8n',$this->optBool('dry-run'));$this->emit($r,$this->optBool('json'));return ($r['ok']??false)?EXIT_SUCCESS:EXIT_ERROR;}}
