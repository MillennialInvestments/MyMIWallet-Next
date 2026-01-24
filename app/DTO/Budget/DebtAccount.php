<?php

namespace App\DTO\Budget;

/**
 * Value object describing a debt account for amortization.
 */
final class DebtAccount
{
    public function __construct(
        public readonly int $accountId,
        public readonly float $principal,
        public readonly float $annualPercentageRate,
        public readonly float $minimumPayment,
    ) {
    }
}