<?php

namespace App\Services;

class AiopsPatchService
{
    public function generatePatch(array $action): array
    {
        return [
            'target_file' => 'AUTO_DETECT',
            'patch'       => '// Generated fix for: ' . ($action['description'] ?? 'Unknown action'),
        ];
    }
}
