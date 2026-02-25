<?php

declare(strict_types=1);

namespace App\Modules\User\Tax\Models;

use App\Modules\User\Tax\Models\TaxJurisdictionModel;
use App\Modules\User\Tax\Models\TaxTemplateModel;
use App\Models\ObservedModel;
use DateInterval;
use DateTime;

class TaxReturnModel extends ObservedModel
{
    protected $table         = 'bf_user_tax_returns';
    protected $primaryKey    = 'id';
    protected $returnType    = 'array';
    protected $useTimestamps = true;
    protected $allowedFields = [
        'user_id',
        'template_id',
        'filing_period_start',
        'filing_period_end',
        'due_date',
        'file_date',
        'status',
        'total_remitted',
        'notes',
    ];

    protected TaxTemplateModel $templateModel;
    protected TaxJurisdictionModel $jurisdictionModel;

    public function __construct()
    {
        parent::__construct();
        $this->templateModel      = model(TaxTemplateModel::class);
        $this->jurisdictionModel  = model(TaxJurisdictionModel::class);
    }

    public function createReturn(int $userId, int $templateId, string $periodStart, string $periodEnd): int
    {
        $dueDate = (new DateTime($periodEnd))->add(new DateInterval('P20D'))->format('Y-m-d');

        $returnId = $this->insert([
            'user_id'            => $userId,
            'template_id'        => $templateId,
            'filing_period_start'=> $periodStart,
            'filing_period_end'  => $periodEnd,
            'due_date'           => $dueDate,
            'status'             => 'draft',
        ]);

        // Prefill value rows for template lines.
        $lines = $this->templateModel->getLinesForTemplate($templateId);
        foreach ($lines as $line) {
            $this->db->table('bf_user_tax_return_values')->insert([
                'return_id' => $returnId,
                'line_id'   => $line['id'],
                'amount'    => 0,
            ]);
        }

        // Seed jurisdiction allocations for active jurisdictions.
        $jurisdictions = $this->jurisdictionModel->where('active', 1)->findAll();
        foreach ($jurisdictions as $jurisdiction) {
            $this->db->table('bf_user_tax_return_jurisdictions')->insert([
                'return_id'       => $returnId,
                'jurisdiction_id' => $jurisdiction['id'],
                'taxable_amount'  => 0,
                'tax_due'         => 0,
            ]);
        }

        return (int) $returnId;
    }

    public function getReturnWithValues(int $returnId): ?array
    {
        $return = $this->find($returnId);
        if (!$return) {
            return null;
        }

        $template = $this->templateModel->find($return['template_id']);
        $lines    = $this->templateModel->getLinesForTemplate((int) $return['template_id']);
        $values   = $this->db->table('bf_user_tax_return_values')
            ->where('return_id', $returnId)
            ->get()
            ->getResultArray();
        $valueMap = [];
        foreach ($values as $row) {
            $valueMap[$row['line_id']] = $row;
        }
        foreach ($lines as &$line) {
            $line['value']        = $valueMap[$line['id']]['amount'] ?? 0;
            $line['explain_text'] = $valueMap[$line['id']]['explain_text'] ?? null;
        }

        $jurisdictions = $this->jurisdictionModel->getAllocationsForReturn($returnId);

        return [
            'return'        => $return,
            'template'      => $template,
            'lines'         => $lines,
            'jurisdictions' => $jurisdictions,
        ];
    }

    public function saveLineValue(int $returnId, int $lineNumber, float $amount, ?string $explainText = null): bool
    {
        $taxReturn = $this->find($returnId);
        if (!$taxReturn) {
            return false;
        }

        $line = $this->templateModel->getLineByNumber((int) $taxReturn['template_id'], $lineNumber);
        if (!$line) {
            return false;
        }

        $existing = $this->db->table('bf_user_tax_return_values')
            ->where('return_id', $returnId)
            ->where('line_id', $line['id'])
            ->get()
            ->getRowArray();

        if ($existing) {
            $this->db->table('bf_user_tax_return_values')
                ->where('id', $existing['id'])
                ->update([
                    'amount'       => $amount,
                    'explain_text' => $explainText,
                ]);
        } else {
            $this->db->table('bf_user_tax_return_values')->insert([
                'return_id'    => $returnId,
                'line_id'      => $line['id'],
                'amount'       => $amount,
                'explain_text' => $explainText,
            ]);
        }

        return true;
    }

    public function recalculateReturn(int $returnId): array
    {
        $return = $this->find($returnId);
        if (!$return) {
            return ['error' => 'Return not found'];
        }

        $lines      = $this->templateModel->getLinesForTemplate((int) $return['template_id']);
        $valueIndex = [];
        $query      = $this->db->table('bf_user_tax_return_values')
            ->where('return_id', $returnId)
            ->get()
            ->getResultArray();
        foreach ($query as $row) {
            $valueIndex[$row['line_id']] = $row;
        }

        $lineLookup = [];
        foreach ($lines as $line) {
            $lineLookup[$line['line_number']] = $line;
        }

        $sumLines = static fn(array $numbers) => array_sum(array_map(static function ($num) use ($lineLookup, $valueIndex) {
            $line = $lineLookup[$num] ?? null;
            return $line ? (float) ($valueIndex[$line['id']]['amount'] ?? 0) : 0.0;
        }, $numbers));

        $line11 = $sumLines(range(2, 10));
        $line12 = ($lineLookup[1] ? (float) ($valueIndex[$lineLookup[1]['id']]['amount'] ?? 0) : 0) - $line11;

        $this->persistCalcLine($returnId, $lineLookup[11] ?? null, $line11);
        $this->persistCalcLine($returnId, $lineLookup[12] ?? null, $line12);

        // Jurisdiction tax due calculation.
        $allocations = $this->jurisdictionModel->getAllocationsForReturn($returnId);
        $totalDue    = 0.0;
        foreach ($allocations as $allocation) {
            $rateRow = $this->jurisdictionModel->getEffectiveRateForDate((int) $allocation['jurisdiction_id'], $return['due_date'] ?? $return['filing_period_end']);
            $rate    = $rateRow['rate_total'] ?? 0;
            $taxDue  = (float) $allocation['taxable_amount'] * ((float) $rate / 100);
            $this->db->table('bf_user_tax_return_jurisdictions')
                ->where('id', $allocation['id'])
                ->update(['tax_due' => $taxDue]);
            $totalDue += $taxDue;
        }

        if (isset($lineLookup[26])) {
            $this->persistCalcLine($returnId, $lineLookup[26], $totalDue);
        }

        $this->update($returnId, ['total_remitted' => $totalDue]);

        return [
            'line11'     => $line11,
            'line12'     => $line12,
            'line26'     => $totalDue,
            'allocations'=> $allocations,
        ];
    }

    public function updateAllocation(int $returnId, int $allocationId, float $taxableAmount): ?array
    {
        $allocation = $this->db->table('bf_user_tax_return_jurisdictions')
            ->where('id', $allocationId)
            ->where('return_id', $returnId)
            ->get()
            ->getRowArray();

        if (!$allocation) {
            return null;
        }

        $return = $this->find($returnId);
        $rateRow = $this->jurisdictionModel->getEffectiveRateForDate((int) $allocation['jurisdiction_id'], $return['due_date'] ?? $return['filing_period_end']);
        $rate = $rateRow['rate_total'] ?? 0;
        $taxDue = $taxableAmount * ((float) $rate / 100);

        $this->db->table('bf_user_tax_return_jurisdictions')
            ->where('id', $allocationId)
            ->update([
                'taxable_amount' => $taxableAmount,
                'tax_due'        => $taxDue,
            ]);

        $this->recalculateReturn($returnId);

        return [
            'tax_due' => $taxDue,
            'rate'    => $rate,
        ];
    }

    protected function persistCalcLine(int $returnId, ?array $line, float $amount): void
    {
        if (!$line) {
            return;
        }

        $existing = $this->db->table('bf_user_tax_return_values')
            ->where('return_id', $returnId)
            ->where('line_id', $line['id'])
            ->get()
            ->getRowArray();

        if ($existing) {
            $this->db->table('bf_user_tax_return_values')
                ->where('id', $existing['id'])
                ->update(['amount' => $amount]);
        } else {
            $this->db->table('bf_user_tax_return_values')->insert([
                'return_id' => $returnId,
                'line_id'   => $line['id'],
                'amount'    => $amount,
            ]);
        }
    }
}
