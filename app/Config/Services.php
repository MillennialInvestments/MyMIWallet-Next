<?php

namespace Config;

use App\Libraries\{CrudCacheInvalidator, KimiClient, MyMIAnalytics, MyMIInvestments, SafeCache};
use App\Services\AuthAuditService;
use App\Services\AutoloadHealthService;
use App\Services\EventTracker;
use App\Services\OnboardingProgressService;
use App\Services\Psr4AuditService;
use App\Services\SetupStatusService;
use App\Services\Forecasting\MyMIForecaster;
use App\Services\Forecasting\Providers\AlphaVantageProvider;
use CodeIgniter\Config\BaseService;
use CodeIgniter\Config\Services as CoreServices;
use function is_ci;

/**
 * Services Configuration file.
 *
 * Services are simply other classes/libraries that the system uses
 * to do its job. This is used by CodeIgniter to allow the core of the
 * framework to be swapped out easily without affecting the usage within
 * the rest of your application.
 *
 * This file holds any application-specific services, or service overrides
 * that you might need. An example has been included with the general
 * method format you should use for your service methods. For more examples,
 * see the core Services file at system/Config/Services.php.
 */
class Services extends BaseService
{
    public static function cache(bool $getShared = true)
    {
        if (! function_exists('is_ci')) {
            require APPPATH . 'Helpers/ci_guard_helper.php';
        }

        if (is_ci()) {
            $cacheConfig = config('Cache');
            $cacheConfig->handler = 'dummy';
            $cacheConfig->backupHandler = 'dummy';
        }

        return CoreServices::cache($getShared);
    }

    public static function responsecache(bool $getShared = true)
    {
        if (! function_exists('is_ci')) {
            require APPPATH . 'Helpers/ci_guard_helper.php';
        }

        if (is_ci()) {
            $cacheConfig = config('Cache');
            $cacheConfig->handler = 'dummy';
            $cacheConfig->backupHandler = 'dummy';
        }

        return CoreServices::responsecache($getShared);
    }

    public static function crudCacheInvalidator(bool $getShared = true): CrudCacheInvalidator
    {
        if ($getShared) {
            /** @var CrudCacheInvalidator $service */
            $service = static::getSharedInstance('crudCacheInvalidator');
            return $service;
        }

        return new CrudCacheInvalidator();
    }
    
    public static function myMIAnalytics(bool $getShared = true)
    {
        if ($getShared) {
            return static::getSharedInstance('myMIAnalytics');
        }
        return new MyMIAnalytics();
    }

    public static function myMIInvestments(bool $getShared = true)
    {
        if ($getShared) {
            return static::getSharedInstance('myMIInvestments');
        }

        return new MyMIInvestments();
    }

    public static function kimiClient(bool $getShared = true): KimiClient
    {
        if ($getShared) {
            /** @var KimiClient $service */
            $service = static::getSharedInstance('kimiClient');
            return $service;
        }

        return new KimiClient();
    }

    public static function authAuditService(bool $getShared = true): AuthAuditService
    {
        if ($getShared) {
            /** @var AuthAuditService $service */
            $service = static::getSharedInstance('authAuditService');
            return $service;
        }

        return new AuthAuditService();
    }

    public static function psr4AuditService(bool $getShared = true): Psr4AuditService
    {
        if ($getShared) {
            /** @var Psr4AuditService $service */
            $service = static::getSharedInstance('psr4AuditService');
            return $service;
        }

        return new Psr4AuditService();
    }

    public static function autoloadHealthService(bool $getShared = true): AutoloadHealthService
    {
        if ($getShared) {
            /** @var AutoloadHealthService $service */
            $service = static::getSharedInstance('autoloadHealthService');
            return $service;
        }

        return new AutoloadHealthService();
    }

    public static function eventTracker(bool $getShared = true): EventTracker
    {
        if ($getShared) {
            /** @var EventTracker $service */
            $service = static::getSharedInstance('eventTracker');
            return $service;
        }

        return new EventTracker();
    }

    public static function onboardingProgressService(bool $getShared = true): OnboardingProgressService
    {
        if ($getShared) {
            /** @var OnboardingProgressService $service */
            $service = static::getSharedInstance('onboardingProgressService');
            return $service;
        }

        return new OnboardingProgressService();
    }

    public static function setupStatusService(bool $getShared = true): SetupStatusService
    {
        if ($getShared) {
            /** @var SetupStatusService $service */
            $service = static::getSharedInstance('setupStatusService');
            return $service;
        }

        return new SetupStatusService();
    }

    public static function mailService(bool $getShared = true)
    {
        if ($getShared) {
            return static::getSharedInstance('mailService');
        }

        return new \App\Libraries\MailService();
    }

    public static function safeCache(bool $getShared = true): SafeCache
    {
        if ($getShared) {
            /** @var SafeCache $service */
            $service = static::getSharedInstance('safeCache');
            return $service;
        }

        return new SafeCache();
    }

    public static function mymiForecaster(bool $getShared = true): MyMIForecaster
    {
        if ($getShared) {
            /** @var MyMIForecaster $service */
            $service = static::getSharedInstance('mymiForecaster');
            return $service;
        }

        $provider = new AlphaVantageProvider();
        $forecastModel = model(\App\Models\InvestmentPriceForecastModel::class);
        $alertsModel = model(\App\Models\AlertsModel::class);
        $cache = cache();
        $config = config('MyMIForecasting');

        return new MyMIForecaster($provider, $forecastModel, $alertsModel, $cache, $config);
    }
    
    /*
     * public static function example($getShared = true)
     * {
     *     if ($getShared) {
     *         return static::getSharedInstance('example');
     *     }
     *
     *     return new \CodeIgniter\Example();
     * }
     */
}
