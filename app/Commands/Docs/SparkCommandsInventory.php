<?php

namespace App\Commands\Docs;

use App\Commands\SafeBaseCommand;

class SparkCommandsInventory extends SafeBaseCommand
{
    protected $group = 'Docs';
    protected $name = 'docs:spark:inventory';
    protected $description = 'Export an inventory of Spark commands.';

    public function run(array $params)
    {

        $commands = glob(APPPATH . 'Commands/**/*.php');

        file_put_contents(
            ROOTPATH . 'docs/_spark_commands.json',
            json_encode($commands, JSON_PRETTY_PRINT)
        );
    }
}