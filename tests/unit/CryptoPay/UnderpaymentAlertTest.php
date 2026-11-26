<?php

declare(strict_types=1);

namespace Tests\Unit\CryptoPay;

use App\Libraries\CryptoPay\Chains\Xrpl;
use App\Libraries\CryptoPay\CryptoPayAlerts;
use App\Libraries\CryptoPay\SpotPrice;
use CodeIgniter\Test\CIUnitTestCase;

if (! defined('TESTPATH')) {
    require_once __DIR__ . '/../../_support/bootstrap.php';
}

final class UnderpaymentAlertTest extends CIUnitTestCase
{
    protected function setUp(): void
    {
        parent::setUp();
        CryptoPayAlerts::reset();
    }

    public function testAlertRecordingAndTypes(): void
    {
        CryptoPayAlerts::reconcileFailure('CHK-1001', 'Database connection refused');
        CryptoPayAlerts::latePayment('CHK-1002', 'xrpl:HASH123', 5000000);
        CryptoPayAlerts::underpayment('CHK-1003', 1500000, 2000000, 'xrpl');
        CryptoPayAlerts::endpointRefusal('ethereum', 'https://bad.rpc', 'network id mismatch');

        $this->assertCount(4, CryptoPayAlerts::$dispatched);
        $this->assertSame('Reconcile Failure', CryptoPayAlerts::$dispatched[0]['title']);
        $this->assertSame('Late Payment', CryptoPayAlerts::$dispatched[1]['title']);
        $this->assertSame('Underpayment Detected', CryptoPayAlerts::$dispatched[2]['title']);
        $this->assertSame('Endpoint Refusal', CryptoPayAlerts::$dispatched[3]['title']);
    }

    public function testXrplUnderpaymentTriggersAlert(): void
    {
        $http = new FallbackTestHttp();
        $xrplUrl = 'https://s.altnet.rippletest.net:51234';

        // Fake server_info for testnet (network_id 1)
        $http->postHandlers[$xrplUrl] = function (array $body) {
            $method = $body['method'] ?? '';
            if ($method === 'server_info') {
                return [
                    'result' => [
                        'status' => 'success',
                        'info' => [
                            'network_id' => 1,
                            'validated_ledger' => ['seq' => 5000000],
                        ],
                    ],
                ];
            }
            if ($method === 'account_tx') {
                return [
                    'result' => [
                        'status' => 'success',
                        'transactions' => [
                            [
                                'validated' => true,
                                'tx' => [
                                    'TransactionType' => 'Payment',
                                    'Destination'     => 'rRecipientAddress123456789',
                                    'DestinationTag'  => 42,
                                    'Account'         => 'rBuyerAddress123456789',
                                    'hash'            => '0123456789ABCDEF0123456789ABCDEF0123456789ABCDEF0123456789ABCDEF',
                                ],
                                'meta' => [
                                    'TransactionResult' => 'tesSUCCESS',
                                    'delivered_amount'  => '500000', // only 0.5 XRP delivered
                                ],
                            ],
                        ],
                    ],
                ];
            }
            return null;
        };

        $prices = new SpotPrice($http, 0.05);
        $adapter = new Xrpl(
            network: 'testnet',
            endpoints: [$xrplUrl],
            http: $http,
            prices: $prices
        );

        $row = [
            'reference'    => 'CHK-XRPL-UNDERPAY',
            'recipient'    => 'rRecipientAddress123456789',
            'dest_tag'     => 42,
            'asset_amount' => 1000000, // expected 1.0 XRP
            'start_cursor' => 0,
            'scan_cursor'  => 0,
        ];

        [$payments, $complete, $cursor] = $adapter->payments($row);

        // Underpayment should not be returned as an accepted payment
        $this->assertEmpty($payments);

        // Underpayment alert must have been triggered
        $underpaymentAlerts = array_filter(
            CryptoPayAlerts::$dispatched,
            fn ($a) => ($a['meta']['type'] ?? '') === 'underpayment'
        );
        $this->assertNotEmpty($underpaymentAlerts);
        $alert = array_values($underpaymentAlerts)[0];
        $this->assertSame('CHK-XRPL-UNDERPAY', $alert['meta']['reference']);
        $this->assertSame(500000, $alert['meta']['received']);
        $this->assertSame(1000000, $alert['meta']['expected']);
    }
}
