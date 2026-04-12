<?php

namespace App\Modules\PropFirms\Libraries\RuleEngines;

interface PropFirmRuleEngineInterface
{
    public function refreshThresholds(array $account, array $ruleSet): array;

    public function evaluateAccountState(array $account, array $ruleSet, array $context = []): array;

    public function checkTradeEligibility(array $account, array $ruleSet, array $tradeContext = []): array;
}
