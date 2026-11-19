<?php

declare(strict_types=1);

namespace App\Commands\Memberships;

use App\Commands\SafeBaseCommand;
use App\Services\Payments\MembershipLifecycleService;
use CodeIgniter\CLI\CLI;

/**
 * Emails members whose 30-day pass ends in N days so they can renew.
 * Dry run unless --send is passed. Meant to run once a day.
 */
class ExpiryReminders extends SafeBaseCommand
{
    protected $group       = 'Memberships';
    protected $name        = 'memberships:expiry-reminders';
    protected $description = 'Email members whose membership ends in N days (dry run unless --send).';
    protected $usage       = 'memberships:expiry-reminders [--days=3] [--send]';
    protected $options     = [
        '--days' => 'Days before the end date to remind (default: 3)',
        '--send' => 'Actually send the emails; without it only the count is shown',
    ];

    public function run(array $params)
    {
        $days = (int) (CLI::getOption('days') ?? 3);
        $send = CLI::getOption('send') !== null;

        $result = (new MembershipLifecycleService())->sendExpiryReminders($days > 0 ? $days : 3, $send);

        CLI::write(sprintf(
            'Memberships ending in %d day(s): %d. %s',
            $days > 0 ? $days : 3,
            $result['due'],
            $send ? sprintf('Sent %d, failed %d.', $result['sent'], $result['failed']) : 'Dry run, nothing sent (add --send).'
        ));

        return $result['failed'] > 0 ? EXIT_ERROR : EXIT_SUCCESS;
    }
}
