<?php

declare(strict_types=1);

namespace App\Modules\Management\TaxAdmin\Controllers;

use App\Controllers\BaseController;
use App\Modules\Management\TaxAdmin\Models\TaxAuditLogModel;
use App\Modules\Management\TaxAdmin\Models\TaxJurisdictionsModel;
use App\Modules\Management\TaxAdmin\Models\TaxLinesModel;
use App\Modules\Management\TaxAdmin\Models\TaxRatesModel;
use App\Modules\Management\TaxAdmin\Models\TaxTemplatesModel;
use CodeIgniter\API\ResponseTrait;
use RuntimeException;

class TaxConfig extends BaseController
{
    use ResponseTrait;

    protected TaxTemplatesModel $templates;
    protected TaxLinesModel $lines;
    protected TaxJurisdictionsModel $jurisdictions;
    protected TaxRatesModel $rates;
    protected TaxAuditLogModel $audit;
    protected int $adminUserId = 0;

    public function initController(\CodeIgniter\HTTP\RequestInterface $request, \CodeIgniter\HTTP\ResponseInterface $response, \Psr\Log\LoggerInterface $logger)
    {
        parent::initController($request, $response, $logger);
        $this->templates     = model(TaxTemplatesModel::class);
        $this->lines         = model(TaxLinesModel::class);
        $this->jurisdictions = model(TaxJurisdictionsModel::class);
        $this->rates         = model(TaxRatesModel::class);
        $this->audit         = model(TaxAuditLogModel::class);

        helper('auth');
        $auth = service('authentication');
        $this->adminUserId = (int) ($auth->id() ?? session('user_id') ?? 0);
    }

    public function index()
    {
        $this->ensureAdmin();

        return view('App\\Modules\\Management\\TaxAdmin\\Views\\dashboard', [
            'templateCount'     => $this->templates->countAllResults(),
            'jurisdictionCount' => $this->jurisdictions->countAllResults(),
            'rateCount'         => $this->rates->countAllResults(),
        ]);
    }

    public function templates()
    {
        $this->ensureAdmin();

        return view('App\\Modules\\Management\\TaxAdmin\\Views\\templates\\index', [
            'templates' => $this->templates->orderBy('name', 'ASC')->findAll(),
        ]);
    }

    public function editTemplate(int $id)
    {
        $this->ensureAdmin();

        $template = $id === 0 ? ['id' => 0, 'lines' => []] : $this->templates->getWithLines($id);
        if (!$template) {
            return redirect()->to('/Admin/Tax/Templates')->with('error', 'Template not found.');
        }

        if ($this->request->getMethod() === 'post') {
            $before = json_encode($template);
            $templatePayload = [
                'name'      => $this->request->getPost('name'),
                'authority' => $this->request->getPost('authority'),
                'frequency' => $this->request->getPost('frequency'),
                'notes'     => $this->request->getPost('notes'),
                'active'    => (int) $this->request->getPost('active', 1),
            ];

            if ($id === 0) {
                $id = (int) $this->templates->insert($templatePayload);
            } else {
                $this->templates->update($id, $templatePayload);
            }

            $lineNumbers = (array) $this->request->getPost('line_number');
            $labels      = (array) $this->request->getPost('label');
            $types       = (array) $this->request->getPost('type');
            $calcRules   = (array) $this->request->getPost('calc_rule');
            $requireExp  = (array) $this->request->getPost('requires_explain');

            foreach ($lineNumbers as $idx => $lineNumber) {
                $lineId = (int) ($this->request->getPost('line_id')[$idx] ?? 0);
                $payload = [
                    'template_id'      => $id,
                    'line_number'      => (int) $lineNumber,
                    'label'            => $labels[$idx] ?? '',
                    'type'             => $types[$idx] ?? 'input',
                    'calc_rule'        => $calcRules[$idx] ?? null,
                    'requires_explain' => isset($requireExp[$idx]) ? 1 : 0,
                    'sort_order'       => $idx + 1,
                ];

                if ($lineId) {
                    $this->lines->update($lineId, $payload);
                } else {
                    $this->lines->insert($payload);
                }
            }

            $after = json_encode($this->templates->getWithLines($id));
            $this->logAudit($before ? 'TEMPLATE_UPDATE' : 'TEMPLATE_CREATE', 'template', $id, $before, $after);

            return redirect()->to("/Admin/Tax/Templates/edit/{$id}")->with('message', 'Template saved.');
        }

        return view('App\\Modules\\Management\\TaxAdmin\\Views\\templates\\edit', [
            'template' => $template,
        ]);
    }

    public function jurisdictions()
    {
        $this->ensureAdmin();

        if ($this->request->getMethod() === 'post') {
            $payload = [
                'state'  => $this->request->getPost('state'),
                'parish' => $this->request->getPost('parish'),
                'name'   => $this->request->getPost('name'),
                'code'   => $this->request->getPost('code'),
                'active' => (int) $this->request->getPost('active', 1),
            ];

            $jurisdictionId = (int) $this->request->getPost('id', 0);
            $before         = $jurisdictionId ? json_encode($this->jurisdictions->find($jurisdictionId)) : null;

            if ($jurisdictionId) {
                $this->jurisdictions->update($jurisdictionId, $payload);
                $this->logAudit('JURISDICTION_UPDATE', 'jurisdiction', $jurisdictionId, $before, json_encode($payload));
            } else {
                $jurisdictionId = $this->jurisdictions->insert($payload);
                $this->logAudit('JURISDICTION_CREATE', 'jurisdiction', (int) $jurisdictionId, null, json_encode($payload));
            }

            return redirect()->to('/Admin/Tax/Jurisdictions')->with('message', 'Jurisdiction saved.');
        }

        return view('App\\Modules\\Management\\TaxAdmin\\Views\\jurisdictions\\index', [
            'jurisdictions' => $this->jurisdictions->orderBy('code')->findAll(),
        ]);
    }

    public function rates()
    {
        $this->ensureAdmin();
        return view('App\\Modules\\Management\\TaxAdmin\\Views\\rates\\index', [
            'rates'          => $this->rates->select('bf_tax_rates.*, bf_tax_jurisdictions.name as jurisdiction_name, bf_tax_jurisdictions.code as jurisdiction_code')
                ->join('bf_tax_jurisdictions', 'bf_tax_jurisdictions.id = bf_tax_rates.jurisdiction_id', 'left')
                ->orderBy('effective_start', 'DESC')
                ->findAll(),
            'jurisdictions'  => $this->jurisdictions->where('active', 1)->orderBy('code')->findAll(),
        ]);
    }

    public function createRate()
    {
        $this->ensureAdmin();

        if ($this->request->getMethod() === 'post') {
            $jurisdictionId = (int) $this->request->getPost('jurisdiction_id');
            $startDate      = $this->request->getPost('effective_start');
            $endDate        = $this->request->getPost('effective_end') ?: null;

            $overlaps = $this->rates->findActiveRange($jurisdictionId, $startDate, $endDate);
            if ($overlaps) {
                return redirect()->back()->withInput()->with('error', 'Effective dates overlap an existing rate for this jurisdiction.');
            }

            $payload = [
                'jurisdiction_id' => $jurisdictionId,
                'rate_total'      => $this->request->getPost('rate_total'),
                'rate_components' => $this->request->getPost('rate_components'),
                'effective_start' => $startDate,
                'effective_end'   => $endDate,
            ];

            $rateId = $this->rates->insert($payload);
            $this->logAudit('RATE_CREATE', 'rate', (int) $rateId, null, json_encode($payload));

            return redirect()->to('/Admin/Tax/Rates')->with('message', 'Rate created.');
        }

        return view('App\\Modules\\Management\\TaxAdmin\\Views\\rates\\edit', [
            'rate'           => null,
            'jurisdictions'  => $this->jurisdictions->where('active', 1)->orderBy('code')->findAll(),
        ]);
    }

    public function editRate(int $id)
    {
        $this->ensureAdmin();

        $rate = $this->rates->find($id);
        if (!$rate) {
            return redirect()->to('/Admin/Tax/Rates')->with('error', 'Rate not found.');
        }

        if ($this->request->getMethod() === 'post') {
            $payload = [
                'jurisdiction_id' => (int) $this->request->getPost('jurisdiction_id'),
                'rate_total'      => $this->request->getPost('rate_total'),
                'rate_components' => $this->request->getPost('rate_components'),
                'effective_start' => $this->request->getPost('effective_start'),
                'effective_end'   => $this->request->getPost('effective_end') ?: null,
            ];

            $overlaps = $this->rates->findActiveRange($payload['jurisdiction_id'], $payload['effective_start'], $payload['effective_end']);
            foreach ($overlaps as $row) {
                if ((int) $row['id'] !== $id) {
                    return redirect()->back()->withInput()->with('error', 'Effective dates overlap an existing rate for this jurisdiction.');
                }
            }

            $before = json_encode($rate);
            $this->rates->update($id, $payload);
            $this->logAudit('RATE_UPDATE', 'rate', $id, $before, json_encode($payload));

            return redirect()->to('/Admin/Tax/Rates')->with('message', 'Rate updated.');
        }

        return view('App\\Modules\\Management\\TaxAdmin\\Views\\rates\\edit', [
            'rate'           => $rate,
            'jurisdictions'  => $this->jurisdictions->where('active', 1)->orderBy('code')->findAll(),
        ]);
    }

    protected function ensureAdmin(): void
    {
        $isAllowed = function_exists('has_permission') && (has_permission('Tax.Admin.Manage') || in_groups('admin'));
        if (!$this->adminUserId || !$isAllowed) {
            throw new RuntimeException('Unauthorized: Tax admin access required.');
        }
    }

    protected function logAudit(string $action, string $entityType, int $entityId, ?string $before, ?string $after): void
    {
        $this->audit->insert([
            'user_id'     => $this->adminUserId,
            'action'      => $action,
            'entity_type' => $entityType,
            'entity_id'   => $entityId,
            'before_json' => $before,
            'after_json'  => $after,
            'created_at'  => date('Y-m-d H:i:s'),
        ]);
    }
}
