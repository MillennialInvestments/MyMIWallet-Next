<?php

namespace Config;

use App\Libraries\{CrudCacheInvalidator, KimiClient, MyMIAnalytics, MyMIInvestments, SafeCache};
use App\Services\AuthAuditService;
use App\Services\OnboardingProgressService;
use App\Services\SetupStatusService;
use CodeIgniter\Config\BaseService;

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

        return new \App\Services\MailService();
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
