<?php

namespace App\Modules\Management\Controllers\Marketing;

use App\Models\EmailQueueModel;
use App\Models\EmailTemplateModel;
use App\Controllers\BaseController;

#[\AllowDynamicProperties]
class EmailQueueAdminController extends \App\Controllers\BaseController
{
    public function create()
    {
        $templateModel = new EmailTemplateModel();
        $data['templates'] = $templateModel
            ->select('id,title,subject,updated_at')
            ->orderBy('id', 'DESC')
            ->findAll(100);
        $data['title'] = 'Add Email to Queue';
        $data['description'] = 'Queue a new email for sending.';

        echo view('email_queue/create', $data);
    }

    public function store()
    {
        $model = new EmailQueueModel();
        
        $templateId = $this->request->getPost('template_id');
        $email = $this->request->getPost('email');

        $templateModel = new EmailTemplateModel();
        $template = $templateModel->find($templateId);
        
        $data = [
            'email' => $email,
            'subject' => $template['subject'],
            'content' => $template['content'],
        ];
        
        $model->save($data);

        return redirect()->to('/email-queue');
    }

    public function index()
    {
        $model = new EmailQueueModel();
        $limit = max(1, min(100, (int) ($this->request->getGet('limit') ?? 50)));
        $data['emails'] = $model
            ->select('id,email,subject,status,created_at,updated_at')
            ->orderBy('id', 'DESC')
            ->findAll($limit);
        $data['title'] = 'Email Queue';
        $data['description'] = 'View and manage your email queue.';

        echo view('email_queue/index', $data);
    }

    public function processQueue()
    {
        $model = new EmailQueueModel();
        $emails = $model
            ->select('id,email,subject,content,status')
            ->where('status', 'pending')
            ->findAll(50);

        $email = \Config\Services::email();

        foreach ($emails as $emailData) {
            $email->setTo($emailData['email']);
            $email->setSubject($emailData['subject']);
            $email->setMessage($emailData['content']);

            if ($email->send()) {
                $emailData['status'] = 'sent';
                $model->save($emailData);
            }
        }

        return redirect()->to('/email-queue');
    }
}
?>
