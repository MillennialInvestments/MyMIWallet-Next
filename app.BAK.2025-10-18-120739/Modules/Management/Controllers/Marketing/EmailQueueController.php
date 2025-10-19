<?php

namespace App\Modules\Management\Controllers\Marketing;

use App\Models\EmailQueueModel;
use App\Models\EmailTemplateModel;
use App\Controllers\BaseController;

#[\AllowDynamicProperties]
class EmailQueueController extends \App\Controllers\BaseController
{
    public function create()
    {
        $templateModel = new EmailTemplateModel();
        $data['templates'] = $templateModel->findAll();
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
        $data['emails'] = $model->findAll();
        $data['title'] = 'Email Queue';
        $data['description'] = 'View and manage your email queue.';

        echo view('email_queue/index', $data);
    }

    public function processQueue()
    {
        $model = new EmailQueueModel();
        $emails = $model->where('status', 'pending')->findAll();

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
