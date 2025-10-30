<?php
// PATCH: example public API endpoint requiring scope
namespace App\Modules\APIs\Controllers;

use App\Controllers\BaseController;
use App\Libraries\Api\ApiRequestContext;

class AlertsPublicController extends BaseController
{
    public function list()
    {
        if (! ApiRequestContext::hasScope('alerts.read')) {
            return $this->response->setStatusCode(403)->setJSON(['status'=>'error','message'=>'Missing scope: alerts.read']);
        }
        return $this->response->setJSON(['status'=>'success','data'=>['alerts'=>[]]]);
    }
}
