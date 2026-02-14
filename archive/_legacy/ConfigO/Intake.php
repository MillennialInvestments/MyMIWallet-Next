<?php
namespace App\Config;

use CodeIgniter\Config\BaseConfig;

class Intake extends BaseConfig
{
    /**
     * Map subject tokens to handler keys.
     * First matching token wins (case-insensitive).
     */
    public array $tagMap = [
        // Real Estate
        'ZILLOW'     => 'real_estate',
        'PROPERTY'   => 'real_estate',
        'RE'         => 'real_estate',
        'REALTY'     => 'real_estate',

        // News / Links
        'MARKETWATCH'=> 'news',
        'WSJ'        => 'news',
        'BLOOMBERG'  => 'news',
        'YF'         => 'news',
        'YAHOO'      => 'news',
        'NEWS'       => 'news',

        // Trade Alerts
        'ALERT'      => 'trade_alert',
        'TRADE'      => 'trade_alert',
    ];

    /**
     * Default handler when no tag detected.
     */
    public string $defaultHandler = 'news';
}
?>