<?php

declare(strict_types=1);

namespace Tests\Unit\Marketing\MarketFeed;

use App\Services\Marketing\MarketFeed\AlphaVantageNewsSentimentAdapter;
use CodeIgniter\Test\CIUnitTestCase;
use InvalidArgumentException;
use RuntimeException;

final class AlphaVantageNewsSentimentAdapterTest extends CIUnitTestCase
{
    public function testParsesDeterministicFixture(): void
    {
        $items = (
            new AlphaVantageNewsSentimentAdapter()
        )->parse(
            ROOTPATH
            . 'tests/Fixtures/Marketing/MarketFeed/'
            . 'alpha-vantage-news-sentiment.json'
        );

        $this->assertCount(2, $items);
        $this->assertSame(
            'Markets assess monetary policy outlook',
            $items[0]['title']
        );
        $this->assertSame(
            '2026-07-31 14:00:00',
            $items[0]['published_at']
        );
        $this->assertSame(
            ['MyMI Fixture Desk'],
            $items[0]['authors']
        );
        $this->assertSame(
            'SPY',
            $items[0]['tickers'][0]['ticker']
        );
        $this->assertSame(
            'Somewhat-Bullish',
            $items[0]['sentiment_label']
        );
    }

    public function testExternalIdentityIsStable(): void
    {
        $adapter =
            new AlphaVantageNewsSentimentAdapter();
        $fixture =
            ROOTPATH
            . 'tests/Fixtures/Marketing/MarketFeed/'
            . 'alpha-vantage-news-sentiment.json';

        $first = $adapter->parse($fixture);
        $second = $adapter->parse($fixture);

        $this->assertSame(
            $first[0]['external_item_id'],
            $second[0]['external_item_id']
        );
    }

    public function testRejectsMalformedJson(): void
    {
        $this->expectException(
            RuntimeException::class
        );

        (
            new AlphaVantageNewsSentimentAdapter()
        )->parse('{bad-json');
    }

    public function testRejectsMissingFeed(): void
    {
        $this->expectException(
            RuntimeException::class
        );

        (
            new AlphaVantageNewsSentimentAdapter()
        )->parse('{"items":"0"}');
    }

    public function testRejectsUnsupportedUrlScheme(): void
    {
        $this->expectException(
            InvalidArgumentException::class
        );

        (
            new AlphaVantageNewsSentimentAdapter()
        )->parse(json_encode([
            'feed' => [
                [
                    'title' => 'Invalid URL',
                    'url' => 'file:///tmp/article',
                    'time_published' =>
                        '20260731T140000',
                ],
            ],
        ], JSON_THROW_ON_ERROR));
    }
}
