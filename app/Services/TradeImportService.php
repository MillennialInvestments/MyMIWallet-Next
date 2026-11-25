<?php

declare(strict_types=1);

namespace App\Services;

use App\Libraries\Trades\OCCSymbolParser;
use App\Models\InvestmentModel;
use DateTime;
use Exception;

/**
 * GTM-034: Trade and transaction import parser, validator, and duplicate-import guard.
 *
 * Provides:
 * - Deterministic CSV parsing and header normalization across broker formats.
 * - Strict row validation (positive numeric shares/prices, valid symbols, standard dates).
 * - Duplicate import detection to guarantee idempotency across repeated file uploads.
 * - User-scoped atomic batch inserts into bf_users_trades.
 */
class TradeImportService
{
    protected InvestmentModel $investmentModel;

    public function __construct(?InvestmentModel $investmentModel = null)
    {
        $this->investmentModel = $investmentModel ?? new InvestmentModel();
    }

    /**
     * Parse raw CSV content into normalized trade rows and validation errors.
     *
     * @param string $csvContent
     * @return array{trades: list<array<string, mixed>>, errors: list<string>}
     */
    public function parseCsv(string $csvContent): array
    {
        $lines = preg_split("/\r\n|\n|\r/", trim($csvContent));
        if (empty($lines)) {
            return ['trades' => [], 'errors' => ['CSV content is empty']];
        }

        $headerRow = str_getcsv(array_shift($lines));
        if (empty($headerRow) || count($headerRow) < 3) {
            return ['trades' => [], 'errors' => ['CSV header is invalid or missing required columns']];
        }

        $headerMap = $this->resolveHeaderMap($headerRow);
        if (! isset($headerMap['symbol'], $headerMap['shares'], $headerMap['entry_price'])) {
            return [
                'trades' => [],
                'errors' => ['CSV must contain symbol/ticker, shares/quantity, and price/entry_price headers'],
            ];
        }

        $trades = [];
        $errors = [];

        foreach ($lines as $index => $line) {
            $rowNum = $index + 2; // account for header line and 1-based index
            $trimmed = trim($line);
            if ($trimmed === '') {
                continue;
            }

            $cols = str_getcsv($trimmed);
            $parsed = $this->parseRow($cols, $headerMap, $rowNum);

            if (isset($parsed['error'])) {
                $errors[] = $parsed['error'];
            } elseif (isset($parsed['trade'])) {
                $trades[] = $parsed['trade'];
            }
        }

        return ['trades' => $trades, 'errors' => $errors];
    }

    /**
     * Parse CSV from a local file path.
     */
    public function parseCsvFile(string $filePath): array
    {
        if (! file_exists($filePath) || ! is_readable($filePath)) {
            return ['trades' => [], 'errors' => ["File does not exist or is unreadable: {$filePath}"]];
        }

        $content = (string) file_get_contents($filePath);
        return $this->parseCsv($content);
    }

    /**
     * Compute a deterministic hash for duplicate detection.
     * Incorporates order/execution IDs, timestamps, and OCC contract identifiers
     * so legitimate repeated fills at the same price are never falsely discarded.
     */
    public function computeTradeSignature(int $userId, array $trade): string
    {
        $symbol    = strtoupper(trim((string) ($trade['symbol'] ?? '')));
        $shares    = sprintf('%.4F', (float) ($trade['shares'] ?? 0));
        $price     = sprintf('%.4F', (float) ($trade['entry_price'] ?? 0));
        $openDate  = trim((string) ($trade['open_date'] ?? ''));
        $posType   = strtoupper(trim((string) ($trade['position_type'] ?? 'BUY')));
        $orderId   = trim((string) ($trade['order_id'] ?? $trade['broker_order_id'] ?? ''));
        $execTime  = trim((string) ($trade['open_time'] ?? $trade['execution_time'] ?? ''));
        $occSymbol = trim((string) ($trade['details'] ?? $trade['occ_symbol'] ?? ''));

        return hash('sha256', "{$userId}|{$symbol}|{$shares}|{$price}|{$openDate}|{$posType}|{$orderId}|{$execTime}|{$occSymbol}");
    }

    /**
     * Import a list of normalized trades for a specific user with duplicate detection.
     *
     * @param int $userId
     * @param list<array<string, mixed>> $trades
     * @param bool $deduplicate
     * @return array{
     *   success: bool,
     *   imported_count: int,
     *   duplicate_count: int,
     *   error_count: int,
     *   imported_ids: list<int>,
     *   errors: list<string>
     * }
     */
    public function importTrades(int $userId, array $trades, bool $deduplicate = true): array
    {
        $userId = (int) $userId;
        if ($userId <= 0) {
            return [
                'success'         => false,
                'imported_count'  => 0,
                'duplicate_count' => 0,
                'error_count'     => 1,
                'imported_ids'    => [],
                'errors'          => ['User ID must be a positive integer.'],
            ];
        }

        $importedCount = 0;
        $duplicateCount = 0;
        $importedIds = [];
        $errors = [];

        // Pre-fetch user's existing trades for signature deduplication
        $existingSignatures = [];
        if ($deduplicate) {
            $existing = $this->investmentModel
                ->where('user_id', $userId)
                ->findAll(500);

            foreach ($existing as $ex) {
                $sig = $this->computeTradeSignature($userId, $ex);
                $existingSignatures[$sig] = true;
            }
        }

        $db = db_connect();
        $db->transStart();

        try {
            foreach ($trades as $idx => $trade) {
                $rowNum = $idx + 1;
                $trade['user_id'] = $userId;

                // Validate required business fields
                $symbol = strtoupper(trim((string) ($trade['symbol'] ?? '')));
                $shares = (float) ($trade['shares'] ?? 0);
                $price  = (float) ($trade['entry_price'] ?? 0);

                if ($symbol === '' || $shares <= 0 || $price <= 0) {
                    $errors[] = "Row {$rowNum}: invalid symbol, shares, or entry price.";
                    continue;
                }

                $sig = $this->computeTradeSignature($userId, $trade);
                if ($deduplicate && isset($existingSignatures[$sig])) {
                    $duplicateCount++;
                    continue;
                }

                // Prepare record for insertion
                $totalCost = (float) ($trade['total_trade_costs'] ?? ($shares * $price));
                $jsonFields = array_filter([
                    'order_id'            => $trade['order_id'] ?? null,
                    'details'             => $trade['details'] ?? null,
                    'strike'              => $trade['strike'] ?? null,
                    'expiration'          => $trade['expiration'] ?? null,
                    'number_of_contracts' => $trade['number_of_contracts'] ?? null,
                    'total_fees'          => isset($trade['total_fees']) && (float) $trade['total_fees'] > 0 ? (float) $trade['total_fees'] : null,
                    'occ_symbol'          => $trade['details'] ?? null,
                ], static fn($v) => $v !== null);

                $record = [
                    'user_id'           => $userId,
                    'symbol'            => $symbol,
                    'shares'            => $shares,
                    'entry_price'       => $price,
                    'current_price'     => (float) ($trade['current_price'] ?? $price),
                    'total_trade_cost'  => $totalCost,
                    'total_trade_costs' => $totalCost,
                    'order_status'      => $trade['order_status'] ?? 'Open',
                    'trade_type'        => (string) ($trade['trade_type'] ?? 'Stock'),
                    'position_type'     => $trade['position_type'] ?? 'BUY',
                    'open_date'         => $trade['open_date'] ?? date('Y-m-d'),
                    'submitted_date'    => date('Y-m-d H:i:s'),
                    'created_on'        => date('Y-m-d H:i:s'),
                    'status'            => 'Active',
                    'active'            => 1,
                    'closed'            => ($trade['order_status'] ?? 'Open') === 'Closed' ? 'true' : 'false',
                    'json_user_fields'  => ! empty($jsonFields) ? $jsonFields : null,
                ];

                $insertId = $this->investmentModel->addTrade($record);
                if ($insertId) {
                    $importedCount++;
                    $importedIds[] = (int) $insertId;
                    $existingSignatures[$sig] = true; // prevent dups within same batch
                } else {
                    $errors[] = "Row {$rowNum}: database insert failed for symbol {$symbol}.";
                }
            }

            $db->transComplete();

            if (! $db->transStatus()) {
                return [
                    'success'         => false,
                    'imported_count'  => 0,
                    'duplicate_count' => $duplicateCount,
                    'error_count'     => count($errors) + 1,
                    'imported_ids'    => [],
                    'errors'          => array_merge($errors, ['Transaction rolled back due to error.']),
                ];
            }

            // Invalidate user cache on success
            $safeCache = service('safeCache');
            if ($safeCache && $importedCount > 0) {
                $safeCache->deleteUser('investments', 'overview', $userId);
            }

            return [
                'success'         => true,
                'imported_count'  => $importedCount,
                'duplicate_count' => $duplicateCount,
                'error_count'     => count($errors),
                'imported_ids'    => $importedIds,
                'errors'          => $errors,
            ];
        } catch (Exception $e) {
            $db->transRollback();
            return [
                'success'         => false,
                'imported_count'  => 0,
                'duplicate_count' => $duplicateCount,
                'error_count'     => count($errors) + 1,
                'imported_ids'    => [],
                'errors'          => array_merge($errors, ['Import exception: ' . $e->getMessage()]),
            ];
        }
    }

    /**
     * End-to-end import from a CSV file path.
     */
    public function importCsvFile(int $userId, string $filePath, bool $deduplicate = true): array
    {
        $parsed = $this->parseCsvFile($filePath);
        if (! empty($parsed['errors']) && empty($parsed['trades'])) {
            return [
                'success'         => false,
                'imported_count'  => 0,
                'duplicate_count' => 0,
                'error_count'     => count($parsed['errors']),
                'imported_ids'    => [],
                'errors'          => $parsed['errors'],
            ];
        }

        $result = $this->importTrades($userId, $parsed['trades'], $deduplicate);
        if (! empty($parsed['errors'])) {
            $result['errors'] = array_merge($parsed['errors'], $result['errors']);
            $result['error_count'] = count($result['errors']);
        }

        return $result;
    }

    /**
     * Map arbitrary broker header variants to canonical trade keys.
     */
    protected function resolveHeaderMap(array $headers): array
    {
        $map = [];
        foreach ($headers as $index => $raw) {
            $clean = strtolower(trim((string) $raw));
            $clean = str_replace([' ', '_', '-', '&'], '', $clean);

            if (in_array($clean, ['symbol', 'ticker', 'asset', 'stocksymbol'], true)) {
                $map['symbol'] = $index;
            } elseif (in_array($clean, ['shares', 'quantity', 'qty', 'units', 'contracts'], true)) {
                $map['shares'] = $index;
            } elseif (in_array($clean, ['price', 'entryprice', 'purchaseprice', 'avgprice', 'costpershare', 'execprice'], true)) {
                $map['entry_price'] = $index;
            } elseif (in_array($clean, ['currentprice', 'marketprice', 'lastprice'], true)) {
                $map['current_price'] = $index;
            } elseif (in_array($clean, ['date', 'tradedate', 'opendate', 'executedate', 'datetime', 'time'], true)) {
                $map['open_date'] = $index;
            } elseif (in_array($clean, ['type', 'tradetype', 'action', 'side', 'orderstatus', 'positiontype', 'orderside'], true)) {
                $map['position_type'] = $index;
            } elseif (in_array($clean, ['amount', 'netamount', 'totalcost', 'totaltradecost', 'totaltradecosts', 'total', 'cost'], true)) {
                $map['total_trade_costs'] = $index;
            } elseif (in_array($clean, ['fees', 'commissions', 'feescomm', 'commission', 'totalfees'], true)) {
                $map['fees'] = $index;
            } elseif (in_array($clean, ['orderid', 'order#', 'executionid', 'order', 'id'], true)) {
                $map['order_id'] = $index;
            } elseif (in_array($clean, ['description', 'securitydescription', 'desc', 'contract'], true)) {
                $map['description'] = $index;
            }
        }

        return $map;
    }

    /**
     * Parse and validate a single CSV row.
     */
    protected function parseRow(array $cols, array $headerMap, int $rowNum): array
    {
        $symbolIndex = $headerMap['symbol'] ?? null;
        $sharesIndex = $headerMap['shares'];
        $priceIndex  = $headerMap['entry_price'];

        $rawSymbol = $symbolIndex !== null ? trim((string) ($cols[$symbolIndex] ?? '')) : '';
        $rawDesc   = isset($headerMap['description']) ? trim((string) ($cols[$headerMap['description']] ?? '')) : '';
        $rawShares = trim((string) ($cols[$sharesIndex] ?? ''));
        $rawPrice  = trim((string) ($cols[$priceIndex] ?? ''));

        // If symbol is missing or contains full option description, try parsing via OCCSymbolParser
        $parsedOcc = OCCSymbolParser::parse($rawSymbol) ?? OCCSymbolParser::parse($rawDesc);

        if ($rawSymbol === '' && $parsedOcc === null) {
            return ['error' => "Row {$rowNum}: Symbol cannot be empty."];
        }

        if ($parsedOcc !== null) {
            $symbol = $parsedOcc['underlying'];
            $isOption = true;
            $details = $parsedOcc['occ_symbol'];
            $tradeType = $parsedOcc['option_type'];
            $strike = $parsedOcc['strike'];
            $expiration = $parsedOcc['expiration'];
            $multiplier = 100;
        } else {
            $symbol = strtoupper($rawSymbol);
            if (! preg_match('/^[A-Z0-9\.\-]{1,15}$/', $symbol)) {
                return ['error' => "Row {$rowNum}: Invalid symbol format '{$rawSymbol}'."];
            }
            $isOption = false;
            $details = null;
            $tradeType = 'Stock';
            $strike = null;
            $expiration = null;
            $multiplier = 1;
        }

        // Clean currency / commas
        $cleanShares = str_replace([',', ' '], '', $rawShares);
        $cleanPrice  = str_replace(['$', ',', ' '], '', $rawPrice);

        if (! is_numeric($cleanShares) || (float) $cleanShares <= 0) {
            return ['error' => "Row {$rowNum}: Shares must be a positive number, got '{$rawShares}'."];
        }

        if (! is_numeric($cleanPrice) || (float) $cleanPrice <= 0) {
            return ['error' => "Row {$rowNum}: Price must be a positive number, got '{$rawPrice}'."];
        }

        $shares = (float) $cleanShares;
        $price  = (float) $cleanPrice;

        // Date resolution
        $openDate = date('Y-m-d');
        if (isset($headerMap['open_date'], $cols[$headerMap['open_date']])) {
            $rawDate = trim((string) $cols[$headerMap['open_date']]);
            if ($rawDate !== '') {
                $ts = strtotime($rawDate);
                if ($ts !== false) {
                    $openDate = date('Y-m-d', $ts);
                } else {
                    return ['error' => "Row {$rowNum}: Invalid date format '{$rawDate}'."];
                }
            }
        }

        // Fees resolution
        $fees = 0.0;
        if (isset($headerMap['fees'], $cols[$headerMap['fees']])) {
            $rawFees = str_replace(['$', ',', ' '], '', trim((string) $cols[$headerMap['fees']]));
            if (is_numeric($rawFees) && (float) $rawFees >= 0) {
                $fees = (float) $rawFees;
            }
        }

        // Order ID resolution
        $orderId = null;
        if (isset($headerMap['order_id'], $cols[$headerMap['order_id']])) {
            $rawOrderId = trim((string) $cols[$headerMap['order_id']]);
            if ($rawOrderId !== '') {
                $orderId = $rawOrderId;
            }
        }

        // Position / Action resolution
        $posType = 'BUY';
        $orderStatus = 'Open';
        $category = $isOption ? 'option_buy' : 'stock_buy';

        if (isset($headerMap['position_type'], $cols[$headerMap['position_type']])) {
            $rawPos = strtoupper(trim((string) $cols[$headerMap['position_type']]));
            if (str_contains($rawPos, 'BUY TO OPEN') || $rawPos === 'BTO') {
                $posType = 'BUY';
                $orderStatus = 'Open';
                $category = 'option_buy';
            } elseif (str_contains($rawPos, 'SELL TO CLOSE') || $rawPos === 'STC') {
                $posType = 'SELL';
                $orderStatus = 'Closed';
                $category = 'option_sell';
            } elseif (str_contains($rawPos, 'SELL TO OPEN') || $rawPos === 'STO') {
                $posType = 'SELL';
                $orderStatus = 'Open';
                $category = 'option_sell';
            } elseif (str_contains($rawPos, 'BUY TO CLOSE') || $rawPos === 'BTC') {
                $posType = 'BUY';
                $orderStatus = 'Closed';
                $category = 'option_buy';
            } elseif (in_array($rawPos, ['SELL', 'CLOSING', 'SHORT'], true)) {
                $posType = 'SELL';
                $orderStatus = 'Closed';
                $category = $isOption ? 'option_sell' : 'stock_sell';
            } elseif (in_array($rawPos, ['BUY', 'OPENING', 'LONG'], true)) {
                $posType = 'BUY';
                $orderStatus = 'Open';
                $category = $isOption ? 'option_buy' : 'stock_buy';
            }
        }

        $totalCost = ($shares * $price * $multiplier) + $fees;
        if (isset($headerMap['total_trade_costs'], $cols[$headerMap['total_trade_costs']])) {
            $rawCost = str_replace(['$', ',', ' '], '', trim((string) $cols[$headerMap['total_trade_costs']]));
            if (is_numeric($rawCost) && (float) $rawCost > 0) {
                $totalCost = (float) $rawCost;
            }
        }

        return [
            'trade' => [
                'order_id'            => $orderId,
                'symbol'              => $symbol,
                'details'             => $details,
                'shares'              => $shares,
                'number_of_contracts' => $isOption ? (int) $shares : null,
                'strike'              => $strike,
                'expiration'          => $expiration,
                'entry_price'         => $price,
                'current_price'       => $price,
                'total_trade_costs'   => $totalCost,
                'total_fees'          => $fees,
                'order_status'        => $orderStatus,
                'trade_type'          => $tradeType,
                'category'            => $category,
                'position_type'       => $posType,
                'open_date'           => $openDate,
            ],
        ];
    }
}
