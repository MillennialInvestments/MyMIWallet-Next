<?php

declare(strict_types=1);

namespace App\Modules\Management\TaxAdmin\Models;

use App\Models\ObservedModel;

class TaxTemplatesModel extends ObservedModel
{
    protected $table         = 'bf_tax_return_templates';
    protected $primaryKey    = 'id';
    protected $returnType    = 'array';
    protected $useTimestamps = true;
    protected $allowedFields = ['name', 'authority', 'frequency', 'notes', 'active'];

    public function getWithLines(int $templateId): ?array
    {
        $template = $this->find($templateId);
        if (!$template) {
            return null;
        }

        $lines = $this->db->table('bf_tax_return_lines')
            ->where('template_id', $templateId)
            ->orderBy('sort_order', 'ASC')
            ->get()
            ->getResultArray();

        $template['lines'] = $lines;

        return $template;
    }
}
