<?php

declare(strict_types=1);

namespace App\Modules\Management\Controllers;

use App\Controllers\BaseAdminController;

use App\Models\AuthHealthRunModel;
use CodeIgniter\HTTP\ResponseInterface;

class AuthHealthAdminController extends BaseAdminController
{
    protected AuthHealthRunModel $runs;

    public function initController(\CodeIgniter\HTTP\RequestInterface $request, \CodeIgniter\HTTP\ResponseInterface $response, \Psr\Log\LoggerInterface $logger)
    {
        parent::initController($request, $response, $logger);
        $this->runs = new AuthHealthRunModel();
    }

    public function index(): ResponseInterface|string
    {
        $data = $this->commonData();
        if ($data instanceof ResponseInterface) {
            return $data;
        }

        if (! $this->isAdmin()) {
            return $this->response->setStatusCode(403)->setBody('Forbidden');
        }

        $latest = $this->runs->getLatestRun();
        $data['pageTitle'] = 'Auth Health | Management';
        $data['authHealthLatest'] = $latest;
        $data['authHealthFails'] = $this->extractFailingSteps($latest);
        $data['authHealthRuns'] = $this->runs->getRecentRuns(30);

        return $this->renderTheme('App\Modules\Management\Views\AuthHealth\index', $data);
    }

    public function details(int $id): ResponseInterface|string
    {
        if (! $this->isAdmin()) {
            return $this->response->setStatusCode(403)->setBody('Forbidden');
        }

        $run = $this->runs->find($id);
        if (! $run) {
            return $this->response->setStatusCode(404)->setBody('Not found');
        }

        $details = json_decode($run['details_json'] ?? '', true) ?? [];
        $run['details'] = $details;

        return view('App\Modules\Management\Views\AuthHealth\modals\details', [
            'run' => $run,
        ]);
    }

    private function extractFailingSteps(?array $run): array
    {
        if (! $run) {
            return [];
        }

        $details = json_decode($run['details_json'] ?? '', true) ?? [];
        $steps = $details['steps'] ?? [];
        $failures = [];

        foreach ($steps as $step) {
            if (($step['status'] ?? '') !== 'PASS') {
                $failures[] = $step['key'] ?? 'unknown';
            }
        }

        return array_slice($failures, 0, 3);
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
