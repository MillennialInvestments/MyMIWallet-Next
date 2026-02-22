<?php

namespace App\Services;

use App\Models\AlertsModel;
use App\Models\InvestmentPriceForecastModel;

class ForecastAggregationService extends \App\Services\Forecasting\ForecastAggregationService
{
    public function __construct(
        ?InvestmentPriceForecastModel $forecastModel = null,
        ?AlertsModel $alertsModel = null,
        ?\Config\MyMIForecasting $config = null
    ) {
        parent::__construct(
            $forecastModel ?? model(InvestmentPriceForecastModel::class),
            $alertsModel ?? model(AlertsModel::class),
            $config ?? config('MyMIForecasting')
        );
    }
}
