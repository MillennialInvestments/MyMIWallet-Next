<?php declare(strict_types=1);

namespace App\Modules\Management\Controllers;

use App\Controllers\BaseAdminController;

use App\Services\OpsCommandService;
use CodeIgniter\Exceptions\PageNotFoundException;
use CodeIgniter\HTTP\RedirectResponse;
use CodeIgniter\HTTP\ResponseInterface;

class OpsInboxAdminController extends BaseAdminController
{
    protected OpsCommandService $ops;
    protected array $helpers = ['url', 'form', 'text'];

    public function initController(\CodeIgniter\HTTP\RequestInterface $request, \CodeIgniter\HTTP\ResponseInterface $response, \Psr\Log\LoggerInterface $logger)
    {
        parent::initController($request, $response, $logger);
        $this->ops = new OpsCommandService();
    }

    public function index(): string
    {
        $data = $this->commonData();
        $data['pageTitle'] = 'Ops Inbox';
        $data['items'] = $this->ops->listInbox([
            'status' => ['New', 'Parsed', 'Ready', 'Failed', 'Blocked', 'Approved', 'Rejected'],
        ]);

        return view('Management/OpsInbox/index', $data);
    }

    public function view(int $id): string
    {
        $item = $this->ops->getInboxItem($id);

        if (! $item) {
            throw PageNotFoundException::forPageNotFound();
        }

        $data = $this->commonData();
        $data['pageTitle'] = 'Ops Inbox Item';
        $data['item'] = $item;

        return view('Management/OpsInbox/show', $data);
    }

    public function createTaskFile(int $id): RedirectResponse
    {
        $item = $this->ops->getInboxItem($id);

        if (! $item) {
            throw PageNotFoundException::forPageNotFound();
        }

        helper('text');

        $slug    = url_title((string) ($item['subject'] ?? 'ops-task-' . $id), '-', true);
        $dir     = WRITEPATH . '../docs/codex/tasks';
        $path    = rtrim($dir, '/') . '/' . $slug . '.md';
        $summary = (string) ($item['ai_summary'] ?? ($item['subject'] ?? ''));

        if (! is_dir($dir)) {
            mkdir($dir, 0775, true);
        }

        $body = "# {$item['subject']}\n\n- Source: Ops Inbox ID {$id}\n- From: {$item['from_email']}\n- Created: " . date('c') . "\n\n## Summary\n{$summary}\n\n## AI Plan\n<pre>" . htmlentities(json_encode($item['ai_plan_json'] ?? $item['parsed_json'] ?? [], JSON_PRETTY_PRINT)) . "</pre>\n";

        file_put_contents($path, $body);

        return redirect()->back()->with('message', 'Codex task file created at ' . $path);
    }

    public function createTaskRegistry(int $id): RedirectResponse
    {
        $item = $this->ops->getInboxItem($id);

        if (! $item) {
            throw PageNotFoundException::forPageNotFound();
        }

        $plan = $item['ai_plan_json'] ?? [];

        if (empty($plan)) {
            $plan = [
                'project' => $item['parsed_json']['project'] ?? 'ops',
                'title'   => $item['subject'] ?? 'Ops Task',
            ];
        }

        $ids = $this->ops->createTaskFromPlan($plan);

        return redirect()->back()->with('message', 'Created ' . count($ids) . ' registry entries');
    }

    public function markApproved(int $id): RedirectResponse
    {
        $this->ops->markStatus($id, 'Approved');
        return redirect()->back()->with('message', 'Item approved');
    }

    public function reject(int $id): RedirectResponse
    {
        $reason = (string) $this->request->getPost('reason');
        $this->ops->markStatus($id, 'Rejected', ['reason' => $reason]);

        return redirect()->back()->with('message', 'Item rejected');
    }
}
