<?php

namespace App\DTO\Budget;

/**
 * Immutable representation of a monthly cash flow snapshot.
 */
final class CashFlowSnapshot
{
    public function __construct(
        public readonly float $income,
        public readonly float $expenses,
        public readonly float $net,
        public readonly float $debtService,
        public readonly float $availableToInvest,
    ) {
    }
}