<?php

namespace App\Controllers;

use App\Libraries\MyMIAlerts;
use App\Libraries\MyMISEC;

class StockController extends BaseController
{
    public function show(string $exchange, string $symbol)
    {
        $exchange = strtoupper(trim($exchange));
        $symbol = strtoupper(trim($symbol));

        if ($symbol === '') {
            return redirect()->to(site_url('/'));
        }

        $alerts = new MyMIAlerts();
        $sec    = new MyMISEC();

        $data = [
            'exchange'      => $exchange,
            'symbol'        => $symbol,
            'tickerInfo'    => $alerts->getTickerDetails($symbol),
            'tradeAlerts'   => $alerts->getAlertsBySymbol($symbol),
            'alertHistory'  => $alerts->getAlertHistory($symbol),
            'scrapedEmails' => $alerts->getScrapedEmailsBySymbol($symbol),
            'secFilings'    => $sec->getSECData($symbol),
            'layout'        => 'public',
        ];

        return $this->renderTheme('App\\Modules\\Management\\Views\\Alerts\\stockOverview', $data);
    }
}
