<?php

declare(strict_types=1);

namespace App\Modules\User\Tax\Models;

use App\Models\ObservedModel;

class TaxTemplateModel extends ObservedModel
{
    protected $table         = 'bf_tax_return_templates';
    protected $primaryKey    = 'id';
    protected $returnType    = 'array';
    protected $useTimestamps = true;
    protected $allowedFields = ['name', 'authority', 'frequency', 'notes', 'active'];

    public function getActiveTemplates(): array
    {
        return $this->where('active', 1)->orderBy('name')->findAll();
    }

    public function getLinesForTemplate(int $templateId): array
    {
        return $this->db->table('bf_tax_return_lines')
            ->where('template_id', $templateId)
            ->orderBy('sort_order', 'ASC')
            ->get()
            ->getResultArray();
    }

    public function getLineByNumber(int $templateId, int $lineNumber): ?array
    {
        $row = $this->db->table('bf_tax_return_lines')
            ->where('template_id', $templateId)
            ->where('line_number', $lineNumber)
            ->get()
            ->getRowArray();

        return $row ?: null;
    }
}
