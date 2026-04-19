<?php

namespace App\Modules\PropFirms\Controllers;

use App\Controllers\UserController;
use App\Modules\PropFirms\Libraries\PropFirmDefaultsSeeder;

class PropFirmsController extends UserController
{
    public function index()
    {
        return $this->redirectToPropFirms(__METHOD__);
    }

    public function ruleSets()
    {
        return $this->redirectToPropFirms(__METHOD__);
    }

    public function accounts()
    {
        return $this->redirectToPropFirms(__METHOD__);
    }

    public function seedDefaults()
    {
        $result = (new PropFirmDefaultsSeeder())->seedDefaults();

        return $this->response->setJSON([
            'status' => 'ok',
            'message' => 'Prop firm defaults were seeded safely.',
            'data' => $result,
        ]);
    }

    private function redirectToPropFirms(string $sourceMethod)
    {
        $destination = site_url('Dashboard/PropFirms');
        $requestPath = trim((string) $this->request->getUri()->getPath(), '/');
        $role = $this->session->get('role')
            ?? $this->session->get('role_name')
            ?? $this->session->get('user_role')
            ?? 'unknown';

        log_message('debug', '[DASHBOARD_REDIRECT_TRACE]', [
            'requested_url' => current_url(),
            'request_path' => $requestPath,
            'resolved_controller' => static::class,
            'resolved_method' => str_contains($sourceMethod, '::') ? explode('::', $sourceMethod)[1] : $sourceMethod,
            'redirect_source' => $sourceMethod,
            'user_role' => $role,
            'final_destination' => $destination,
        ]);

        return redirect()->to($destination);
    }
}
