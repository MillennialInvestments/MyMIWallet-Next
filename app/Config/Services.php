<?php

namespace Config;

use App\Libraries\{CrudCacheInvalidator, KimiClient, MyMIAnalytics, MyMIInvestments, SafeCache};
use App\Services\AuthAuditService;
use App\Services\DashboardService;
use App\Services\AutoloadHealthService;
use App\Services\EventTracker;
use App\Services\OnboardingProgressService;
use App\Services\Psr4AuditService;
use App\Services\SetupStatusService;
use App\Services\ForecastAccuracyEvaluator;
use App\Services\ForecastAggregationService;
use App\Services\Forecasting\MyMIForecaster;
use App\Services\Forecasting\Providers\AlphaVantageProvider;
use App\Services\Scanning\CacheLayer;
use App\Services\Scanning\RateLimiter;
use App\Services\Scanning\ScannerAlertBridge;
use App\Services\Scanning\ScannerService;
use App\Services\Scanning\SignalEngine;
use App\Services\Scanning\Providers\AlphaVantageProvider as ScannerAlphaVantageProvider;
use App\Services\Scanning\Providers\FinnhubProvider;
use App\Services\Scanning\Providers\ProviderRouter;
use App\Services\Scanning\Providers\StooqProvider;
use Config\Cache;
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
class Services extends CoreServices
{
    public static function cache(?Cache $config = null, bool $getShared = true)
    {
        if (! function_exists('is_ci')) {
            require APPPATH . 'Helpers/ci_guard_helper.php';
        }

        $config ??= config(\Config\Cache::class);

        if (is_ci()) {
            $config->handler = 'file';
            $config->backupHandler = 'file';
        }

        try {
            return parent::cache($config, $getShared);
        } catch (\Throwable $e) {
            log_message('critical', 'Cache boot failure: {error}', ['error' => $e->getMessage()]);
            return new \CodeIgniter\Cache\Handlers\FileHandler(config(\Config\Cache::class));
        }
    }

    public static function aiopsDocsScanner(bool $getShared = true)
    {
        if ($getShared) return static::getSharedInstance('aiopsDocsScanner');
        return new \App\Services\AIOps\DocsScannerService();
    }

    public static function aiopsRepoVerifier(bool $getShared = true)
    {
        if ($getShared) return static::getSharedInstance('aiopsRepoVerifier');
        return new \App\Services\AIOps\RepoVerifierService();
    }

    public static function aiopsOllamaCodeGen(bool $getShared = true)
    {
        if ($getShared) return static::getSharedInstance('aiopsOllamaCodeGen');
        return new \App\Services\AIOps\OllamaCodeGenService(
            rtrim((string) env('OLLAMA_URL', 'http://127.0.0.1:11434'), '/'),
            (string) env('OLLAMA_MODEL', 'qwen2.5-coder:7b')
        );
    }

    public static function aiopsPriorityWriter(bool $getShared = true)
    {
        if ($getShared) return static::getSharedInstance('aiopsPriorityWriter');
        return new \App\Services\AIOps\PriorityWriterService();
    }


    public static function aiopsOllamaPatchRunner(bool $getShared = true)
    {
        if ($getShared) return static::getSharedInstance('aiopsOllamaPatchRunner');
        return new \App\Services\AIOps\OllamaPatchRunner();
    }

    public static function aiopsManualRunNotifier(bool $getShared = true)
    {
        if ($getShared) return static::getSharedInstance('aiopsManualRunNotifier');
        return new \App\Services\AIOps\ManualRunNotifier(config(\Config\AiOps::class));
    }

    public static function aiopsPublicPagesPipeline(bool $getShared = true)
    {
        if ($getShared) return static::getSharedInstance('aiopsPublicPagesPipeline');
        return new \App\Services\AIOps\PublicPagesPipelineService();
    }

    public static function aiopsObservabilityState(bool $getShared = true)
    {
        if ($getShared) return static::getSharedInstance('aiopsObservabilityState');
        return new \App\Services\AIOps\ObservabilityStateService();
    }

    public static function aiopsFingerprint(bool $getShared = true)
    {
        if ($getShared) return static::getSharedInstance('aiopsFingerprint');
        return new \App\Services\AIOps\FingerprintService();
    }

    public static function aiopsRegressionEvaluator(bool $getShared = true)
    {
        if ($getShared) return static::getSharedInstance('aiopsRegressionEvaluator');
        return new \App\Services\AIOps\RegressionEvaluator();
    }

    public static function aiopsPRComposer(bool $getShared = true)
    {
        if ($getShared) return static::getSharedInstance('aiopsPRComposer');
        return new \App\Services\AIOps\PRComposerService();
    }

    public static function aiopsReleaseNotes(bool $getShared = true)
    {
        if ($getShared) return static::getSharedInstance('aiopsReleaseNotes');
        return new \App\Services\AIOps\ReleaseNotesService();
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


    public static function dashboardService(bool $getShared = true): DashboardService
    {
        if ($getShared) {
            /** @var DashboardService $service */
            $service = static::getSharedInstance('dashboardService');
            return $service;
        }

        return new DashboardService();
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

    public static function forecastAggregation(bool $getShared = true)
    {
        return static::forecastAggregationService($getShared);
    }
    public static function forecastAccuracyEvaluator(bool $getShared = true)
    {
        if ($getShared) {
            return static::getSharedInstance('forecastAccuracyEvaluator');
        }

        return new ForecastAccuracyEvaluator();
    }
    
    public static function forecastAggregationService($getShared = true)
    {
        if ($getShared) {
            return static::getSharedInstance('forecastAggregationService');
        }

        return new \App\Services\ForecastAggregationService();
    }

    public static function scannerCacheLayer(bool $getShared = true): CacheLayer
    {
        if ($getShared) {
            /** @var CacheLayer $service */
            $service = static::getSharedInstance('scannerCacheLayer');
            return $service;
        }

        return new CacheLayer(static::cache());
    }

    public static function scannerRateLimiter(bool $getShared = true): RateLimiter
    {
        if ($getShared) {
            /** @var RateLimiter $service */
            $service = static::getSharedInstance('scannerRateLimiter');
            return $service;
        }

        return new RateLimiter(75);
    }

    public static function scannerSignalEngine(bool $getShared = true): SignalEngine
    {
        if ($getShared) {
            /** @var SignalEngine $service */
            $service = static::getSharedInstance('scannerSignalEngine');
            return $service;
        }

        return new SignalEngine();
    }

    public static function scannerProviderRouter(bool $getShared = true): ProviderRouter
    {
        if ($getShared) {
            /** @var ProviderRouter $service */
            $service = static::getSharedInstance('scannerProviderRouter');
            return $service;
        }

        return new ProviderRouter(
            static::scannerCacheLayer(),
            static::scannerRateLimiter(),
            new ScannerAlphaVantageProvider(service('curlrequest')),
            new FinnhubProvider(service('curlrequest')),
            new StooqProvider(service('curlrequest')),
        );
    }


    public static function scannerAlertBridge(bool $getShared = true): ScannerAlertBridge
    {
        if ($getShared) {
            /** @var ScannerAlertBridge $service */
            $service = static::getSharedInstance('scannerAlertBridge');
            return $service;
        }

        return new ScannerAlertBridge(
            \Config\Database::connect(),
            service('mymialerts'),
        );
    }

    public static function scannerService(bool $getShared = true): ScannerService
    {
        if ($getShared) {
            /** @var ScannerService $service */
            $service = static::getSharedInstance('scannerService');
            return $service;
        }

        return new ScannerService(
            new \App\Modules\APIs\Models\ScannerModel(),
            static::scannerProviderRouter(),
            static::scannerSignalEngine(),
            static::scannerAlertBridge(),
        );
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
