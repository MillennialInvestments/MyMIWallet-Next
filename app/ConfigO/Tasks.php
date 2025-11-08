<?php

namespace Config;

use CodeIgniter\Tasks\Task;
use CodeIgniter\Tasks\Scheduler;
use CodeIgniter\Config\BaseConfig;

class Tasks extends BaseConfig
{
    public function init(Scheduler $scheduler)
    {
        // Runs email fetching and marketing content generation daily at midnight (00:00)
        $scheduler->call(function () {
            $marketing = new \App\Libraries\MyMIMarketing();
            $marketing->fetchAndStoreEmails('alerts');
            $marketing->fetchAndStoreEmails('newsletters');
            $marketing->generateAndPostContent();
        })->daily('00:00');

        // Runs trade alert update checking every minute
        $scheduler->task(\App\Tasks\ProcessTradeAlertChanges::class, 'run')->everyMinute();
    }
}
