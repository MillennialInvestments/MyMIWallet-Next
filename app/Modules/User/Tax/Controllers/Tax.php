<?php

declare(strict_types=1);

namespace App\Modules\User\Tax\Controllers;

use App\Controllers\BaseController;
use App\Modules\User\Tax\Models\TaxJurisdictionModel;
use App\Modules\User\Tax\Models\TaxReturnModel;
use App\Modules\User\Tax\Models\TaxTemplateModel;
use CodeIgniter\API\ResponseTrait;
use DateInterval;
use DateTime;

class Tax extends BaseController
{
    use ResponseTrait;

    protected TaxReturnModel $taxReturnModel;
    protected TaxTemplateModel $taxTemplateModel;
    protected TaxJurisdictionModel $taxJurisdictionModel;
    protected int $currentUserId;

    public function __construct()
    {
        $this->taxReturnModel       = model(TaxReturnModel::class);
        $this->taxTemplateModel     = model(TaxTemplateModel::class);
        $this->taxJurisdictionModel = model(TaxJurisdictionModel::class);

        $auth               = service('authentication');
        $this->currentUserId = (int) ($auth->id() ?? session('user_id') ?? 0);
    }

    public function index()
    {
        $returns = $this->taxReturnModel
            ->where('user_id', $this->currentUserId)
            ->orderBy('filing_period_start', 'DESC')
            ->findAll();

        return view('App\\Modules\\User\\Tax\\Views\\index', [
            'returns'   => $returns,
            'templates' => $this->taxTemplateModel->getActiveTemplates(),
        ]);
    }

    public function create()
    {
        $templateId = (int) ($this->request->getPost('template_id') ?? $this->request->getGet('template_id') ?? 0);
        $templateId = $templateId ?: (int) ($this->taxTemplateModel->getActiveTemplates()[0]['id'] ?? 0);

        $periodStart = $this->request->getPost('period_start') ?? date('Y-m-01');
        $periodEnd   = $this->request->getPost('period_end') ?? (new DateTime($periodStart))->add(new DateInterval('P1M'))->sub(new DateInterval('P1D'))->format('Y-m-d');

        $returnId = $this->taxReturnModel->createReturn($this->currentUserId, $templateId, $periodStart, $periodEnd);

        return redirect()->to("/Tax/edit/{$returnId}")->with('message', 'Return created. Start entering your lines.');
    }

    public function edit(int $id)
    {
        $returnData = $this->taxReturnModel->getReturnWithValues($id);
        if (!$returnData || (int) $returnData['return']['user_id'] !== $this->currentUserId) {
            return redirect()->to('/Tax')->with('error', 'Return not found.');
        }

        return view('App\\Modules\\User\\Tax\\Views\\edit', $returnData);
    }

    public function view(int $id)
    {
        $returnData = $this->taxReturnModel->getReturnWithValues($id);
        if (!$returnData || (int) $returnData['return']['user_id'] !== $this->currentUserId) {
            return redirect()->to('/Tax')->with('error', 'Return not found.');
        }

        return view('App\\Modules\\User\\Tax\\Views\\view', $returnData);
    }

    public function preview(int $id)
    {
        $returnData = $this->taxReturnModel->getReturnWithValues($id);
        if (!$returnData || (int) $returnData['return']['user_id'] !== $this->currentUserId) {
            return redirect()->to('/Tax')->with('error', 'Return not found.');
        }

        return view('App\\Modules\\User\\Tax\\Views\\preview', $returnData);
    }

    public function ajaxSaveLine()
    {
        $returnId    = (int) $this->request->getPost('return_id');
        $lineNumber  = (int) $this->request->getPost('line_number');
        $amount      = (float) $this->request->getPost('amount');
        $explainText = $this->request->getPost('explain_text');

        $success = $this->taxReturnModel->saveLineValue($returnId, $lineNumber, $amount, $explainText);
        if (!$success) {
            return $this->fail('Unable to save line value', 400);
        }

        $recalc = $this->taxReturnModel->recalculateReturn($returnId);
        return $this->respond([
            'message' => 'Line saved',
            'calc'    => $recalc,
        ]);
    }

    public function ajaxRecalc(int $id)
    {
        $recalc = $this->taxReturnModel->recalculateReturn($id);
        if (isset($recalc['error'])) {
            return $this->fail($recalc['error'], 404);
        }

        return $this->respond($recalc);
    }

    public function ajaxSaveAllocation()
    {
        $returnId      = (int) $this->request->getPost('return_id');
        $allocationId  = (int) $this->request->getPost('allocation_id');
        $taxableAmount = (float) $this->request->getPost('taxable_amount');

        $result = $this->taxReturnModel->updateAllocation($returnId, $allocationId, $taxableAmount);
        if (!$result) {
            return $this->fail('Allocation not found', 404);
        }

        $recalc = $this->taxReturnModel->recalculateReturn($returnId);
        return $this->respond(['allocation' => $result, 'calc' => $recalc]);
    }

    public function exportJson(int $id)
    {
        $payload = $this->buildExportPayload($id);
        if (!$payload) {
            return $this->failNotFound('Return not found.');
        }

        $path = $this->writeExportFile($id, 'json', json_encode($payload, JSON_PRETTY_PRINT));
        return $this->respond(['path' => $path]);
    }

    public function exportCsv(int $id)
    {
        $payload = $this->buildExportPayload($id);
        if (!$payload) {
            return $this->failNotFound('Return not found.');
        }

        $csv = $this->toCsv($payload);
        $path = $this->writeExportFile($id, 'csv', $csv);

        return $this->respond(['path' => $path]);
    }

    protected function buildExportPayload(int $id): ?array
    {
        $returnData = $this->taxReturnModel->getReturnWithValues($id);
        if (!$returnData || (int) $returnData['return']['user_id'] !== $this->currentUserId) {
            return null;
        }

        $header = [
            'period_start' => $returnData['return']['filing_period_start'],
            'period_end'   => $returnData['return']['filing_period_end'],
            'due_date'     => $returnData['return']['due_date'],
            'file_date'    => $returnData['return']['file_date'],
            'status'       => $returnData['return']['status'],
        ];

        $lines = [];
        foreach ($returnData['lines'] as $line) {
            $lines[] = [
                'line'   => $line['line_number'],
                'label'  => $line['label'],
                'type'   => $line['type'],
                'amount' => $line['value'],
            ];
        }

        $jurisdictions = [];
        foreach ($returnData['jurisdictions'] as $jurisdiction) {
            $rateRow = $this->taxJurisdictionModel->getEffectiveRateForDate((int) $jurisdiction['jurisdiction_id'], $returnData['return']['due_date']);
            $jurisdictions[] = [
                'code'            => $jurisdiction['code'],
                'name'            => $jurisdiction['name'],
                'taxable_amount'  => $jurisdiction['taxable_amount'],
                'tax_due'         => $jurisdiction['tax_due'],
                'rate_total'      => $rateRow['rate_total'] ?? null,
            ];
        }

        return [
            'header'        => $header,
            'lines'         => $lines,
            'jurisdictions' => $jurisdictions,
            'total_remitted'=> $returnData['return']['total_remitted'],
        ];
    }

    protected function writeExportFile(int $id, string $extension, string $contents): string
    {
        $dir = WRITEPATH . 'exports/tax';
        if (!is_dir($dir)) {
            mkdir($dir, 0775, true);
        }
        $filename = $dir . "/return_{$id}." . $extension;
        file_put_contents($filename, $contents);

        return $filename;
    }

    protected function toCsv(array $payload): string
    {
        $rows = [];
        $rows[] = 'Header';
        foreach ($payload['header'] as $key => $value) {
            $rows[] = "{$key},{$value}";
        }

        $rows[] = '';
        $rows[] = 'Lines';
        $rows[] = 'Line,Label,Type,Amount';
        foreach ($payload['lines'] as $line) {
            $rows[] = "{$line['line']},\"{$line['label']}\",{$line['type']},{$line['amount']}";
        }

        $rows[] = '';
        $rows[] = 'Jurisdictions';
        $rows[] = 'Code,Name,Taxable Amount,Tax Due,Rate';
        foreach ($payload['jurisdictions'] as $jurisdiction) {
            $rows[] = "{$jurisdiction['code']},\"{$jurisdiction['name']}\",{$jurisdiction['taxable_amount']},{$jurisdiction['tax_due']},{$jurisdiction['rate_total']}";
        }

        $rows[] = '';
        $rows[] = "Total Remitted,{$payload['total_remitted']}";

        return implode(PHP_EOL, $rows);
    }
}
