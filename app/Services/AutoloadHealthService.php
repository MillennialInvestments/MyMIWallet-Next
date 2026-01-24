<?php

declare(strict_types=1);

namespace App\Services;

class AutoloadHealthService
{
    private Psr4AuditService $auditService;

    public function __construct(?Psr4AuditService $auditService = null)
    {
        $this->auditService = $auditService ?? new Psr4AuditService();
    }

    /**
     * @return array{total_classes:int, psr4_ok:int, violations:int, legacy_files:int, last_scan:string}
     */
    public function getStatus(): array
    {
        $audit = $this->auditService->audit();
        return $audit['summary'];
    }

    /**
     * @return array<string, mixed>
     */
    public function getAudit(): array
    {
        return $this->auditService->audit();
    }
}
