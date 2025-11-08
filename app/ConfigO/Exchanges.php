<?php
namespace Config;

use CodeIgniter\Config\BaseConfig;

class Exchanges extends BaseConfig
{
    /**
     * Mapping of chain identifiers to service names. This allows
     * MyMIExchange to resolve the correct library via service().
     */
    public array $chains = [
        'solana'   => 'myMISolana',
        'ethereum' => 'myMIEthereum',
        'bitcoin'  => 'myMIBitcoin',
        'digibyte' => 'myMIDigibyte',
    ];
}