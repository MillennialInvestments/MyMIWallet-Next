<?php
namespace App\Libraries;

interface AlertChannelInterface
{
    public function deliver(array $alert): bool;
    public function getName(): string;
}