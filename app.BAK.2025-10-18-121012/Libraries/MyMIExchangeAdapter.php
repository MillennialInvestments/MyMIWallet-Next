<?php

namespace App\Libraries;

use DateTime;
use RuntimeException;

class MyMIExchangeAdapter
{
    public function __construct(private ?MyMIExchange $exchange = null)
    {
        $this->exchange ??= new MyMIExchange();
    }

    public function createAsset(string $symbol, string $name, int $supply, array $meta = []): array
    {
        $payload = [
            'symbol' => $symbol,
            'name'   => $name,
            'supply' => $supply,
            'meta'   => $meta,
        ];
        log_message('info', 'MyMIExchangeAdapter::createAsset called', $payload);

        // Placeholder integration; real exchange call should be wired here.
        $assetId = $meta['external_id'] ?? ('asset_' . bin2hex(random_bytes(8)));

        return [
            'symbol'   => $symbol,
            'asset_id' => $assetId,
            'supply'   => $supply,
        ];
    }

    public function mintToUser(string $assetId, int $userId, float $tokens): bool
    {
        log_message('info', 'MyMIExchangeAdapter::mintToUser', [
            'asset_id' => $assetId,
            'user_id'  => $userId,
            'tokens'   => $tokens,
        ]);
        return true;
    }

    public function debitUserFiatOrStable(int $userId, float $amount, string $memo): bool
    {
        if ($amount <= 0) {
            throw new RuntimeException('Debit amount must be positive');
        }

        log_message('info', 'MyMIExchangeAdapter::debitUserFiatOrStable', [
            'user_id' => $userId,
            'amount'  => $amount,
            'memo'    => $memo,
        ]);
        return true;
    }

    public function creditUserFiatOrStable(int $userId, float $amount, string $memo): bool
    {
        if ($amount < 0) {
            throw new RuntimeException('Credit amount must be non-negative');
        }

        log_message('info', 'MyMIExchangeAdapter::creditUserFiatOrStable', [
            'user_id' => $userId,
            'amount'  => $amount,
            'memo'    => $memo,
        ]);
        return true;
    }

    public function createPrivateAuction(string $assetId, array $whitelistUserIds, float $price, DateTime $endsAt): array
    {
        if ($price <= 0) {
            throw new RuntimeException('Auction price must be positive');
        }

        $auctionId = 'auc_' . bin2hex(random_bytes(8));
        $payload = [
            'asset_id'  => $assetId,
            'whitelist' => $whitelistUserIds,
            'price'     => $price,
            'ends_at'   => $endsAt->format(DateTime::ATOM),
            'auction_id'=> $auctionId,
        ];
        log_message('info', 'MyMIExchangeAdapter::createPrivateAuction', $payload);

        return [
            'auction_id' => $auctionId,
            'price'      => $price,
            'ends_at'    => $endsAt,
            'whitelist'  => $whitelistUserIds,
        ];
    }

    public function settleAuction(string $auctionId): array
    {
        log_message('info', 'MyMIExchangeAdapter::settleAuction', ['auction_id' => $auctionId]);

        return [
            'auction_id' => $auctionId,
            'fills'      => [],
        ];
    }

    public function getCurrentPrice(string $assetId): float
    {
        log_message('debug', 'MyMIExchangeAdapter::getCurrentPrice', ['asset_id' => $assetId]);
        return 1.00; // Default placeholder price.
    }
}
