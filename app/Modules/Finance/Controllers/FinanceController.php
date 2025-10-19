<?php
namespace App\Modules\Finance\Controllers;

use App\Controllers\BaseController;
use App\Services\Fin\RiskService;
use App\Models\Fin\RiskBudgetModel;
use App\Libraries\Flags;

class FinanceController extends BaseController
{
    public function summary()
    {
        if (! Flags::enabled('finance.core')) {
            return $this->fail('Finance disabled');
        }
        if (! can('finance.view')) {
            return $this->forbid();
        }

        $uid = (int)(session('cuID') ?? 0);
        $data = RiskService::evaluate($uid);

        return $this->ok('OK', [
            'budget'    => $data['budget'],
            'portfolio' => $data['portfolio'],
            'breaches'  => $data['breaches'],
            'base_ccy'  => getenv('BASE_CURRENCY') ?: 'USD',
        ]);
    }

    public function setBudget()
    {
        if (! Flags::enabled('finance.core')) {
            return $this->fail('Finance disabled');
        }
        if (! can('finance.manage')) {
            return $this->forbid();
        }

        $uid = (int)$this->request->getPost('user_id') ?: (int)(session('cuID') ?? 0);
        $payload = [
            'max_position_pct'    => (float)$this->request->getPost('max_position_pct'),
            'max_asset_class_pct' => (float)$this->request->getPost('max_asset_class_pct'),
            'max_daily_loss_pct'  => (float)$this->request->getPost('max_daily_loss_pct'),
            'max_drawdown_pct'    => (float)$this->request->getPost('max_drawdown_pct'),
            'updated_at'          => date('Y-m-d H:i:s'),
        ];

        $model = new RiskBudgetModel();
        $row = $model->where('user_id',$uid)->first();
        if ($row) {
            $model->update($row['id'], $payload);
        } else {
            $payload['user_id'] = $uid;
            $payload['created_at'] = date('Y-m-d H:i:s');
            $model->insert($payload);
        }

        audit('risk.budget.update', ['user_id'=>$uid] + $payload, 'risk');
        return $this->ok('Budget updated');
    }

    private function ok(string $msg, array $data=[])
    {
        return $this->response->setJSON(['status'=>'success','message'=>$msg,'data'=>$data,'csrf'=>csrf_hash()]);
    }

    private function fail(string $msg)
    {
        return $this->response->setJSON(['status'=>'error','message'=>$msg,'csrf'=>csrf_hash()]);
    }

    private function forbid()
    {
        return $this->response->setStatusCode(403)->setJSON(['status'=>'error','message'=>'Forbidden','csrf'=>csrf_hash()]);
    }
}

