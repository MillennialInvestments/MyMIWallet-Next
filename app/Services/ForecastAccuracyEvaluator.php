<?php

namespace App\Services;

use App\Models\InvestmentForecastAccuracyModel;
use App\Models\InvestmentForecastHistoryModel;
use App\Services\Forecasting\MarketDataProviderInterface;
use App\Services\Forecasting\Providers\AlphaVantageProvider;

class ForecastAccuracyEvaluator extends \App\Services\Forecasting\ForecastAccuracyEvaluator
{
    public function __construct(
        ?InvestmentForecastHistoryModel $historyModel = null,
        ?InvestmentForecastAccuracyModel $accuracyModel = null,
        ?MarketDataProviderInterface $provider = null,
        ?\Config\MyMIForecasting $config = null
    ) {
        parent::__construct(
            $historyModel ?? model(InvestmentForecastHistoryModel::class),
            $accuracyModel ?? model(InvestmentForecastAccuracyModel::class),
            $provider ?? new AlphaVantageProvider(),
            $config ?? config('MyMIForecasting')
        );
    }
}
