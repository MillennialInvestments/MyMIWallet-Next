<?php
namespace App\Commands\AiOps; use App\Commands\SafeBaseCommand; use App\Commands\Support\SubsCommandTrait;
class N8nStop extends SafeBaseCommand { use SubsCommandTrait; protected $group = 'AI-Ops'; protected $name='aiops:n8n:stop'; protected $description='Stop n8n'; protected $options=['--json'=>'JSON','--dry-run'=>'Dry']; public function run(array $params){$this->parseParams($params);$r=$this->mgr()->stop('aiops.n8n',$this->optBool('dry-run'));$this->emit($r,$this->optBool('json'));return ($r['ok']??false)?EXIT_SUCCESS:EXIT_ERROR;}}
