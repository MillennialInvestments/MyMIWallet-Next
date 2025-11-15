<?php

namespace App\DTO\Budget;

use DateTimeImmutable;

/**
 * Normalized representation of a budgeting transaction.
 */
final class BudgetRecord
{
    public function __construct(
        public readonly int $id,
        public readonly int $userId,
        public readonly string $name,
        public readonly string $classification,
        public readonly bool $isOutflow,
        public readonly float $netAmount,
        public readonly float $grossAmount,
        public readonly DateTimeImmutable $date,
        public readonly ?string $accountType,
        public readonly ?string $sourceType,
        public readonly bool $isDebt,
    ) {
    }
}