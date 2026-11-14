<?php

namespace App\Commands\Research;

use App\Commands\SafeBaseCommand;

class ResearchPipeline extends SafeBaseCommand
{
    protected $group = 'research';
    protected $name = 'research:pipeline:run';
    protected $description = 'Run the research pipeline.';

    public function run(array $params)
    {

        command('research:google:scan');
        command('research:news:collect');
        command('research:data:compile');
        command('research:alerts:watchlist-import');

    }
}