<?php

namespace Config;

use CodeIgniter\Tasks\Scheduler;

class Tasks extends \CodeIgniter\Config\BaseConfig
{
    public function init(Scheduler $schedule): void
    {
        $schedule->call(static function () {
            service('calendarEmailTriggerService')->pollInboxAndQueue();
        })->everyMinute()->singleInstance();

        $schedule->command('automation:run')
            ->everyMinute()
            ->singleInstance();
    }
}
