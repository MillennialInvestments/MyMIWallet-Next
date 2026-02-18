<?php
namespace App\Commands\AIOps;
use App\Commands\SafeBaseCommand;
use App\Commands\Support\SubsCommandTrait;
class Status extends SafeBaseCommand { use SubsCommandTrait; protected $group = 'AIOps - Repair'; protected $name='aiops:status'; protected $description='AIOps runtime status'; protected $options=['--json'=>'JSON output']; public function run(array $params){$this->parseParams($params);$json=$this->optBool('json');$m=$this->mgr();$payload=['status'=>'ok','n8n'=>$m->status('aiops.n8n'),'bridge_8500'=>$m->isPortOccupied(8500)];$this->emit($payload,$json);return EXIT_SUCCESS;}}
