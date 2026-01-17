<?php

namespace App\Libraries\Brokers;

interface BrokerParserInterface
{
    public function canParse(string $subject, string $content): bool;

    public function parse(string $subject, string $content): ?array;
}
