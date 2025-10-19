<?php namespace App\Modules\Management\Controllers\Marketing;

use App\Controllers\UserController;

#[\AllowDynamicProperties]
class BloggerController extends UserController
{
    public function index()
    {
        return $this->renderTheme('ManagementModule\\Views\\Marketing\\Blogger\\index');
    }

    public function generate()
    {
        if (! $this->request->isAJAX()) {
            return $this->response->setStatusCode(400)
                ->setJSON(['status' => 'error', 'message' => 'Invalid request', 'csrf' => csrf_hash()]);
        }
        $payload = $this->request->getJSON(true) ?: $this->request->getPost();
        try {
            $data = service('bloggerService')->composeAndGenerate($payload ?? []);
            return $this->response->setJSON(['status' => 'success', 'data' => $data, 'csrf' => csrf_hash()]);
        } catch (\Throwable $e) {
            log_message('error', 'MyMIBlogger::generate ' . $e->getMessage());
            return $this->response->setStatusCode(500)
                ->setJSON(['status' => 'error', 'message' => 'Failed to generate', 'csrf' => csrf_hash()]);
        }
    }

    public function repurpose()
    {
        if (! $this->request->isAJAX()) {
            return $this->response->setStatusCode(400)
                ->setJSON(['status' => 'error', 'message' => 'Invalid request', 'csrf' => csrf_hash()]);
        }
        $payload = $this->request->getJSON(true) ?: $this->request->getPost();
        try {
            $block   = $payload['block'] ?? [];
            $channel = $payload['channel'] ?? '';
            $data    = service('bloggerService')->repurpose($block, $channel);
            return $this->response->setJSON(['status' => 'success', 'data' => $data, 'csrf' => csrf_hash()]);
        } catch (\Throwable $e) {
            log_message('error', 'MyMIBlogger::repurpose ' . $e->getMessage());
            return $this->response->setStatusCode(500)
                ->setJSON(['status' => 'error', 'message' => 'Failed to repurpose', 'csrf' => csrf_hash()]);
        }
    }

    public function schedule()
    {
        if (! $this->request->isAJAX()) {
            return $this->response->setStatusCode(400)
                ->setJSON(['status' => 'error', 'message' => 'Invalid request', 'csrf' => csrf_hash()]);
        }
        return $this->response->setJSON(['status' => 'success', 'csrf' => csrf_hash()]);
    }

    public function preview($id)
    {
        return $this->renderTheme('ManagementModule\\Views\\Marketing\\Blogger\\_preview_modal', ['id' => $id]);
    }

    public function save()
    {
        if (! $this->request->isAJAX()) {
            return $this->response->setStatusCode(400)
                ->setJSON(['status' => 'error', 'message' => 'Invalid request', 'csrf' => csrf_hash()]);
        }
        return $this->response->setJSON(['status' => 'success', 'csrf' => csrf_hash()]);
    }
}
?>
