<?php

namespace App\Services\AIOps;

class TargetingIntelligence
{
    public function inferTargets(string $text): array
    {
        $candidates = [];

        // Explicit file paths mentioned
        if (preg_match_all('/(?:app|system|public|docs)\/[A-Za-z0-9_\-\/\.]+\.php/', $text, $m)) {
            foreach ($m[0] as $p) {
                $candidates[] = $p;
            }
        }

        $t = strtolower($text);

        // Heuristic mapping
        $map = [
            'routes' => 'app/Config/Routes.php',
            'spark' => 'app/Commands/',
            'command' => 'app/Commands/',
            'controller' => 'app/Controllers/',
            'model' => 'app/Models/',
            'service' => 'app/Services/',
            'aiops' => 'app/Services/AIOps/',
            'migration' => 'app/Database/Migrations/',
            'view' => 'app/Views/',
            'logger' => 'app/Config/Logger.php',
            'cache' => 'app/Config/Cache.php',
        ];

        foreach ($map as $needle => $path) {
            if (str_contains($t, $needle)) {
                $candidates[] = $path;
            }
        }

        $candidates = array_values(array_unique($candidates));

        return [
            'file_candidates' => $candidates,
            'notes' => 'Heuristic inference only; AIOps/Ollama should confirm exact file placements.',
        ];
    }
}