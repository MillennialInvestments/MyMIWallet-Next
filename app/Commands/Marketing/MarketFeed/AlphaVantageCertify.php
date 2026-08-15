<?php

declare(strict_types=1);

namespace App\Commands\Marketing\MarketFeed;

use App\Commands\SafeBaseCommand;
use App\Services\Marketing\MarketFeed\AlphaVantageNewsSentimentAdapter;
use App\Services\Marketing\MarketFeed\Provider\AlphaVantageNewsSentimentClient;
use App\Services\Marketing\MarketFeed\Provider\AlphaVantageProviderException;
use App\Services\Marketing\MarketFeed\Transport\CurlBoundedHttpTransport;
use App\Services\Marketing\MarketFeed\Transport\MarketFeedTransportException;
use App\Services\Marketing\MarketFeed\Transport\OneShotBoundedHttpTransport;
use App\Services\Marketing\MarketFeed\Transport\SystemPublicIpv4Resolver;
use CodeIgniter\CLI\CLI;
use Config\MarketingMarketFeed;
use Throwable;

final class AlphaVantageCertify extends SafeBaseCommand
{
    private const APPROVAL_TOKEN =
        'MYMI-NEWS-LIVE-001B-C2B-ONE-BOUNDED-REQUEST';

    protected $group = 'Marketing';

    protected $name =
        'marketing:market-feed:alpha-vantage-certify';

    protected $description =
        'Perform the explicitly approved one-shot Alpha Vantage certification request.';

    protected $aiOpsRunnable = false;

    protected $arguments = [
        'approval_token' =>
            'Fixed non-secret C2B approval token.',
    ];

    public function run(array $params)
    {
        $this->parseParams($params);

        $approvalToken = trim(
            (string) ($params[0] ?? '')
        );

        if (
            ! hash_equals(
                self::APPROVAL_TOKEN,
                $approvalToken
            )
        ) {
            CLI::error(
                'STOP: approval_token_invalid'
            );

            return EXIT_ERROR;
        }

        $config = new MarketingMarketFeed();

        $failures = [];

        if (! $config->enabled) {
            $failures[] =
                'market_feed_disabled';
        }

        if (! $config->live_network_enabled) {
            $failures[] =
                'live_network_disabled';
        }

        if (! $config->alpha_vantage_enabled) {
            $failures[] =
                'alpha_vantage_disabled';
        }

        if (
            ! $config
                ->alpha_vantage_live_dry_run_enabled
        ) {
            $failures[] =
                'live_dry_run_disabled';
        }

        if ($config->persist_enabled) {
            $failures[] =
                'persistence_must_remain_disabled';
        }

        if (
            $config->alpha_vantage_retry_attempts
            !== 0
        ) {
            $failures[] =
                'retry_attempts_must_equal_zero';
        }

        if (
            trim(
                $config->alpha_vantage_api_key
            ) === ''
        ) {
            $failures[] =
                'api_key_unavailable';
        }

        if ($failures !== []) {
            foreach ($failures as $failure) {
                CLI::error(
                    'STOP: ' . $failure
                );
            }

            CLI::write(
                'REQUEST_COUNT=0'
            );
            CLI::write(
                'STATUS: FAIL'
            );

            return EXIT_ERROR;
        }

        $transport =
            new OneShotBoundedHttpTransport(
                new CurlBoundedHttpTransport()
            );

        $client =
            new AlphaVantageNewsSentimentClient(
                $config,
                new SystemPublicIpv4Resolver(),
                $transport,
                new AlphaVantageNewsSentimentAdapter()
            );

        $safeReason = 'success';
        $itemCount = 0;
        $success = false;

        try {
            $items = $client->collect();
            $itemCount = count($items);
            $success = true;
        } catch (
            AlphaVantageProviderException $exception
        ) {
            $safeReason =
                $exception->reasonCode();
        } catch (
            MarketFeedTransportException $exception
        ) {
            $safeReason =
                $exception->reasonCode();
        } catch (Throwable $exception) {
            $safeReason =
                'unexpected_certification_failure';
        }

        CLI::write(
            'REQUEST_COUNT='
            . $transport->requestCount()
        );

        CLI::write(
            'SAFE_REASON=' . $safeReason
        );

        CLI::write(
            'ITEM_COUNT=' . $itemCount
        );

        if (
            $transport->requestCount() !== 1
        ) {
            CLI::error(
                'STATUS: FAIL'
            );

            return EXIT_ERROR;
        }

        if (! $success) {
            CLI::error(
                'STATUS: PROVIDER_RESPONSE_CLASSIFIED'
            );

            return EXIT_ERROR;
        }

        CLI::write(
            'STATUS: PASS',
            'green'
        );

        return EXIT_SUCCESS;
    }
}
