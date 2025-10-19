<?php

namespace App\Services;

use App\Libraries\{BaseLoader};
use DateTime;

class RecurringService
{

    public function generateRecurringSchedule($accountDetails, $startDate, $endDate)
    {
        $data = [];
        $accountID = $accountDetails['id'] ?? null;
        $accountName = $accountDetails['name'] ?? '';
        $accountType = $accountDetails['account_type'] ?? '';
        $netAmount = $accountDetails['net_amount'] ?? 0;
        $grossAmount = $accountDetails['gross_amount'] ?? 0;
        $intervals = $accountDetails['intervals'] ?? 'Monthly';

        if ($intervals === '15th/Last') {
            if ((int)$startDate->format('d') >= 15) {
                $startDate = $startDate->modify('last day of this month');
            } else {
                $startDate = $startDate->setDate((int)$startDate->format('Y'), (int)$startDate->format('m'), 15);
            }

            while ($startDate <= $endDate) {
                $data[] = [
                    'dueDate' => $startDate->format('m/d/Y'),
                    'accountID' => $accountID,
                    'accountName' => $accountName,
                    'accountType' => $accountType,
                    'netAmount' => $netAmount,
                    'grossAmount' => $grossAmount,
                ];

                $startDate = $startDate->modify($startDate->format('d') == 15 ? 'last day of this month' : 'first day of next month')->setDate((int)$startDate->format('Y'), (int)$startDate->format('m'), 15);
            }
        } else {
            $intervalMap = [
                'Daily' => '+1 day',
                'Weekly' => '+1 week',
                'Bi-Weekly' => '+2 weeks',
                'Monthly' => '+1 month',
                'Quarterly' => '+3 months',
                'Semi-Annual' => '+6 months',
                'Annually' => '+1 year',
            ];

            $intervalString = $intervalMap[$intervals] ?? '+1 month';
            while ($startDate <= $endDate) {
                $data[] = [
                    'dueDate' => $startDate->format('m/d/Y'),
                    'accountID' => $accountID,
                    'accountName' => $accountName,
                    'accountType' => $accountType,
                    'netAmount' => $netAmount,
                    'grossAmount' => $grossAmount,
                ];
                $startDate = $startDate->modify($intervalString);
            }
        }

        return $data;
    }
}
