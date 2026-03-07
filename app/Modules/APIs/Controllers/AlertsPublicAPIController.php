<?php
// PATCH: example public API endpoint requiring scope
namespace App\Modules\APIs\Controllers;

use App\Controllers\BaseAPIController;

use App\Libraries\Api\ApiRequestContext;

class AlertsPublicAPIController extends BaseAPIController
{
    public function list()
    {
        if (! ApiRequestContext::hasScope('alerts.read')) {
            return $this->response->setStatusCode(403)->setJSON(['status'=>'error','message'=>'Missing scope: alerts.read']);
        }
        return $this->response->setJSON(['status'=>'success','data'=>['alerts'=>[]]]);
    }
}
