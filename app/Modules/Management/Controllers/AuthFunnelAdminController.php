<?php

declare(strict_types=1);

namespace App\Modules\Management\Controllers;

use App\Controllers\BaseAdminController;

use CodeIgniter\Database\BaseConnection;
use CodeIgniter\HTTP\ResponseInterface;
use DateInterval;
use DatePeriod;
use DateTimeImmutable;

class AuthFunnelAdminController extends BaseAdminController
{
    public function authFunnel(): ResponseInterface|string
    {
        $data = $this->commonData();
        if ($data instanceof ResponseInterface) {
            return $data;
        }

        if (! $this->isAdmin()) {
            return $this->response->setStatusCode(403)->setBody('Forbidden');
        }

        $db = db_connect();
        $eventKeys = [
            'auth.register_success',
            'auth.activation_email_sent',
            'auth.activate_success',
            'auth.login_success',
            'setup.complete',
        ];

        [$startDate, $endDate, $days] = $this->buildDateWindow(7);
        $dailySeries = $this->fetchDailySeries($db, $eventKeys, $startDate, $endDate, $days);
        $totals = $this->fetchTotals($db, $eventKeys, $startDate, $endDate);
        $events = $this->fetchRecentEvents($db, 200);

        $data['pageTitle'] = 'Auth Funnel | Management';
        $data['funnelStart'] = $startDate;
        $data['funnelEnd'] = $endDate;
        $data['funnelTotals'] = $totals;
        $data['funnelSeries'] = $dailySeries;
        $data['funnelConversion'] = $this->buildConversionRates($totals);
        $data['funnelEvents'] = $events;

        return $this->renderTheme('App\Modules\Management\Views\AuthFunnel\index', $data);
    }

    public function referrals(): ResponseInterface|string
    {
        $data = $this->commonData();
        if ($data instanceof ResponseInterface) {
            return $data;
        }

        if (! $this->isAdmin()) {
            return $this->response->setStatusCode(403)->setBody('Forbidden');
        }

        $request = service('request');
        $start = $request->getGet('start_date');
        $end = $request->getGet('end_date');
        $referralCode = trim((string) $request->getGet('referral_code'));

        $endDate = $end ?: (new DateTimeImmutable('today'))->format('Y-m-d');
        $startDate = $start ?: (new DateTimeImmutable($endDate))->sub(new DateInterval('P30D'))->format('Y-m-d');

        $db = db_connect();
        $rows = $this->fetchReferralAggregates($db, $startDate, $endDate, $referralCode);

        $data['pageTitle'] = 'Referral Conversion | Management';
        $data['referralRows'] = $rows;
        $data['startDate'] = $startDate;
        $data['endDate'] = $endDate;
        $data['referralCode'] = $referralCode;

        return $this->renderTheme('App\Modules\Management\Views\Referrals\index', $data);
    }

    private function buildDateWindow(int $days): array
    {
        $end = new DateTimeImmutable('today');
        $start = $end->sub(new DateInterval('P' . ($days - 1) . 'D'));
        $period = new DatePeriod($start, new DateInterval('P1D'), $end->add(new DateInterval('P1D')));
        $labels = [];
        foreach ($period as $day) {
            $labels[] = $day->format('Y-m-d');
        }

        return [$start->format('Y-m-d'), $end->format('Y-m-d'), $labels];
    }

    private function fetchDailySeries(BaseConnection $db, array $eventKeys, string $startDate, string $endDate, array $labels): array
    {
        $series = [];
        foreach ($eventKeys as $key) {
            $series[$key] = array_fill_keys($labels, 0);
        }

        if (! $db->tableExists('bf_user_events')) {
            return $this->formatSeries($series);
        }

        $rows = $db->table('bf_user_events')
            ->select("DATE(created_at) AS event_date, event_key, COUNT(*) AS total", false)
            ->where('created_at >=', $startDate . ' 00:00:00')
            ->where('created_at <=', $endDate . ' 23:59:59')
            ->whereIn('event_key', $eventKeys)
            ->groupBy(['event_date', 'event_key'])
            ->get()
            ->getResultArray();

        foreach ($rows as $row) {
            $date = $row['event_date'] ?? '';
            $key = $row['event_key'] ?? '';
            if ($date !== '' && isset($series[$key][$date])) {
                $series[$key][$date] = (int) $row['total'];
            }
        }

        return $this->formatSeries($series);
    }

    private function formatSeries(array $series): array
    {
        $output = [];
        foreach ($series as $key => $values) {
            $output[$key] = [
                'labels' => array_keys($values),
                'data'   => array_values($values),
            ];
        }

        return $output;
    }

    private function fetchTotals(BaseConnection $db, array $eventKeys, string $startDate, string $endDate): array
    {
        $totals = array_fill_keys($eventKeys, 0);
        if (! $db->tableExists('bf_user_events')) {
            return $totals;
        }

        $rows = $db->table('bf_user_events')
            ->select('event_key, COUNT(*) AS total')
            ->where('created_at >=', $startDate . ' 00:00:00')
            ->where('created_at <=', $endDate . ' 23:59:59')
            ->whereIn('event_key', $eventKeys)
            ->groupBy('event_key')
            ->get()
            ->getResultArray();

        foreach ($rows as $row) {
            $key = $row['event_key'] ?? '';
            if ($key !== '' && array_key_exists($key, $totals)) {
                $totals[$key] = (int) $row['total'];
            }
        }

        return $totals;
    }

    private function fetchRecentEvents(BaseConnection $db, int $limit): array
    {
        if (! $db->tableExists('bf_user_events')) {
            return [];
        }

        return $db->table('bf_user_events')
            ->orderBy('created_at', 'DESC')
            ->limit($limit)
            ->get()
            ->getResultArray();
    }

    private function buildConversionRates(array $totals): array
    {
        $register = (int) ($totals['auth.register_success'] ?? 0);
        $activationSent = (int) ($totals['auth.activation_email_sent'] ?? 0);
        $activationSuccess = (int) ($totals['auth.activate_success'] ?? 0);
        $loginSuccess = (int) ($totals['auth.login_success'] ?? 0);
        $setupComplete = (int) ($totals['setup.complete'] ?? 0);

        return [
            'register_to_activation_email' => $register > 0 ? round(($activationSent / $register) * 100, 1) : 0.0,
            'activation_email_to_success' => $activationSent > 0 ? round(($activationSuccess / $activationSent) * 100, 1) : 0.0,
            'activation_to_login' => $activationSuccess > 0 ? round(($loginSuccess / $activationSuccess) * 100, 1) : 0.0,
            'login_to_setup' => $loginSuccess > 0 ? round(($setupComplete / $loginSuccess) * 100, 1) : 0.0,
        ];
    }

    private function fetchReferralAggregates(BaseConnection $db, string $startDate, string $endDate, string $referralCode): array
    {
        if (! $db->tableExists('bf_user_events')) {
            return [];
        }

        $builder = $db->table('bf_user_events');
        $builder->select([
            'referral_code',
            "COUNT(DISTINCT CASE WHEN event_key = 'auth.register_success' THEN user_id END) AS registrations",
            "COUNT(DISTINCT CASE WHEN event_key = 'auth.activate_success' THEN user_id END) AS activations",
            "COUNT(DISTINCT CASE WHEN event_key = 'auth.login_success' THEN user_id END) AS first_logins",
            "COUNT(DISTINCT CASE WHEN event_key = 'setup.complete' THEN user_id END) AS setup_completes",
        ], false);
        $builder->where('created_at >=', $startDate . ' 00:00:00');
        $builder->where('created_at <=', $endDate . ' 23:59:59');
        $builder->where('referral_code IS NOT NULL', null, false);
        $builder->where('referral_code !=', '');

        if ($referralCode !== '') {
            $builder->where('referral_code', $referralCode);
        }

        $builder->groupBy('referral_code');
        $builder->orderBy('registrations', 'DESC');

        $rows = $builder->get()->getResultArray();

        foreach ($rows as &$row) {
            $registrations = (int) ($row['registrations'] ?? 0);
            $row['conversion_rate'] = $registrations > 0
                ? round(((int) ($row['setup_completes'] ?? 0) / $registrations) * 100, 1)
                : 0.0;
        }
        unset($row);

        return $rows;
    }

    private function isAdmin(): bool
    {
        if (function_exists('has_permission') && has_permission('admin.access')) {
            return true;
        }

        $auth = service('authentication');
        if (method_exists($auth, 'user')) {
            $user = $auth->user();
            if ($user && method_exists($user, 'can') && $user->can('admin.access')) {
                return true;
            }
        }

        return false;
    }
}
