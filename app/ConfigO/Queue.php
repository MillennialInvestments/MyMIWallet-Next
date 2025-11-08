<?php namespace Config;

use Illuminate\Queue\Capsule\Manager as Queue;
use Illuminate\Events\Dispatcher;
use Illuminate\Container\Container;

class QueueConfig
{
    public function __construct()
    {
        $queue = new Queue;

        $queue->addConnection([
            'driver' => 'database',
            'table' => 'jobs',
            'queue' => 'default',
            'retry_after' => 90,
        ]);

        $queue->setAsGlobal();
        $queue->setEventDispatcher(new Dispatcher(new Container));

        $queue->getContainer()->bind('config', function () {
            return [
                'queue.default' => 'database',
                'queue.connections.database' => [
                    'driver' => 'database',
                    'table' => 'jobs',
                    'queue' => 'default',
                    'retry_after' => 90,
                ],
            ];
        });
    }
}
