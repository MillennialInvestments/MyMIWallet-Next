<?php

declare(strict_types=1);

namespace App\Commands\Research;

class EarningsCalendar extends BaseResearchTaskCommand
{
    protected $group = 'research';
    protected $name = 'research:earnings:calendar';
    protected $description = 'Collect earnings calendar research items';
    protected $taskKey = 'earnings_calendar';
}
