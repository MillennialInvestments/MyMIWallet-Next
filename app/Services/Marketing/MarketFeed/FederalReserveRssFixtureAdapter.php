<?php

namespace App\Services\Marketing\MarketFeed;

use DateTimeImmutable;
use DateTimeZone;
use InvalidArgumentException;
use RuntimeException;
use SimpleXMLElement;

final class FederalReserveRssFixtureAdapter
{
    public function parse(
        string|SimpleXMLElement $xmlPathOrString
    ): array {
        $xml = $this->loadXml(
            $xmlPathOrString
        );

        if (! isset($xml->channel)) {
            throw new RuntimeException(
                'RSS channel is missing.'
            );
        }

        $items = [];

        foreach ($xml->channel->item as $item) {
            $guid = trim(
                (string) $item->guid
            );

            $canonicalUrl = trim(
                (string) $item->link
            );

            $items[] = [
                'external_item_id' =>
                    $guid !== ''
                        ? $guid
                        : null,
                'title' => trim(
                    (string) $item->title
                ),
                'summary' => trim(
                    (string) $item->description
                ),
                'canonical_url' =>
                    $canonicalUrl !== ''
                        ? $canonicalUrl
                        : null,
                'published_at' =>
                    $this->normalizePublishedAt(
                        (string) $item->pubDate
                    ),
                'raw_metadata' => [
                    'author' => trim(
                        (string) $item->author
                    ),
                    'category' => trim(
                        (string) $item->category
                    ),
                    'comments' => trim(
                        (string) $item->comments
                    ),
                    'enclosure_url' => trim(
                        (string) (
                            $item->enclosure['url']
                            ?? ''
                        )
                    ),
                    'enclosure_length' => (int) (
                        $item->enclosure['length']
                        ?? 0
                    ),
                    'enclosure_type' => trim(
                        (string) (
                            $item->enclosure['type']
                            ?? ''
                        )
                    ),
                ],
            ];
        }

        return $items;
    }

    private function loadXml(
        string|SimpleXMLElement $input
    ): SimpleXMLElement {
        if ($input instanceof SimpleXMLElement) {
            return $input;
        }

        if (preg_match(
            '#^https?://#i',
            trim($input)
        )) {
            throw new InvalidArgumentException(
                'Live HTTP input is not permitted.'
            );
        }

        $previous = libxml_use_internal_errors(
            true
        );

        try {
            if (is_file($input)) {
                $xml = simplexml_load_file(
                    $input,
                    SimpleXMLElement::class,
                    LIBXML_NOCDATA | LIBXML_NONET
                );
            } else {
                $xml = simplexml_load_string(
                    $input,
                    SimpleXMLElement::class,
                    LIBXML_NOCDATA | LIBXML_NONET
                );
            }
        } finally {
            libxml_clear_errors();
            libxml_use_internal_errors(
                $previous
            );
        }

        if (! $xml instanceof SimpleXMLElement) {
            throw new RuntimeException(
                'Missing or invalid RSS content.'
            );
        }

        return $xml;
    }

    private function normalizePublishedAt(
        string $value
    ): ?string {
        $value = trim($value);

        if ($value === '') {
            return null;
        }

        try {
            $date = new DateTimeImmutable(
                $value
            );
        } catch (\Throwable) {
            return null;
        }

        return $date
            ->setTimezone(
                new DateTimeZone('UTC')
            )
            ->format('Y-m-d H:i:s');
    }
}
