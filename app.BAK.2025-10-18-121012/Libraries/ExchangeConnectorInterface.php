<?php
namespace App\Libraries;

interface ExchangeConnectorInterface
{
    public function getQuote(array $params): array;
    public function trade(array $params): array;
    public function price(string $symbol): ?float;
    public function balances(string $accountId): array;
}
?>
