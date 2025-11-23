<?php

use CodeIgniter\Test\CIUnitTestCase;
use CodeIgniter\Test\FeatureTestTrait;

final class AlertsRoutesTest extends CIUnitTestCase
{
    use FeatureTestTrait;

    public function testGuestRoutesRedirectToLogin(): void
    {
        $guestRoutes = [
            'Management/Alerts',
            'User/Alerts',
            'User/Alerts/trades',
        ];

        foreach ($guestRoutes as $route) {
            $result = $this->get($route);
            $this->assertTrue($result->isRedirect(), "{$route} should redirect when not authenticated");
            $this->assertStringContainsString('/login', $result->getRedirectUrl());
        }
    }

    public function testAuthenticatedRoutesReturnOk(): void
    {
        $session = ['logged_in' => 1, 'user_id' => 1];

        $authedRoutes = [
            'Management/Alerts',
            'Management/Alerts/weeklyTopPerformance?limit=10',
            'User/Alerts',
            'User/Alerts/trades',
            'Preview/Alert/NVDA',
        ];

        foreach ($authedRoutes as $route) {
            $result = $this->withSession($session)->get($route);
            $this->assertNotEquals(404, $result->getStatusCode(), "{$route} should be routed");
        }
    }

    public function testApiEndpointsRespond(): void
    {
        $session = ['logged_in' => 1, 'user_id' => 1];

        $filtered = $this->withSession($session)->post('API/Alerts/getFilteredAlerts', [
            'start'          => 0,
            'length'         => 1,
            'timeRange'      => 'today',
            'q'              => '',
            'category'       => '',
            'alert_created'  => 1,
            'draw'           => 1,
        ]);
        $this->assertNotEquals(404, $filtered->getStatusCode());

        $batch = $this->withSession($session)->post('API/Alerts/processTradeBatch', [
            'offset'    => 0,
            'batchSize' => 1,
        ]);
        $this->assertNotEquals(404, $batch->getStatusCode());

        $latestPrices = $this->withSession($session)->get('API/Alerts/getLatestPrices');
        $this->assertNotEquals(404, $latestPrices->getStatusCode());
    }
}