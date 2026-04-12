<?php

namespace App\Modules\PropFirms\Libraries;

use App\Modules\PropFirms\Libraries\RuleEngines\ApexRuleEngine;
use App\Modules\PropFirms\Libraries\RuleEngines\PropFirmRuleEngineInterface;
use App\Modules\PropFirms\Libraries\RuleEngines\TopstepRuleEngine;
use RuntimeException;

class PropFirmRuleRegistry
{
    /** @var array<string, PropFirmRuleEngineInterface> */
    private array $engines;

    public function __construct(?array $engines = null)
    {
        $this->engines = $engines ?? [
            'apex' => new ApexRuleEngine(),
            'topstep' => new TopstepRuleEngine(),
        ];
    }

    public function resolveEngine(string $firmSlug): PropFirmRuleEngineInterface
    {
        $slug = strtolower(trim($firmSlug));
        if (! isset($this->engines[$slug])) {
            throw new RuntimeException('No rule engine registered for firm slug: ' . $firmSlug);
        }

        return $this->engines[$slug];
    }
}
