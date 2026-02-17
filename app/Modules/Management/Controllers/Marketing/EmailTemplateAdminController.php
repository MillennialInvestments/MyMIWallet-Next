<?php

namespace App\Modules\Management\Controllers\Marketing;

use App\Models\EmailTemplateModel;
use App\Controllers\BaseController;

#[\AllowDynamicProperties]
class EmailTemplateAdminController extends \App\Controllers\BaseController
{
    public function index()
    {
        $model = new EmailTemplateModel();
        $limit = max(1, min(100, (int) ($this->request->getGet('limit') ?? 50)));
        $data['templates'] = $model
            ->select('id,title,subject,created_at,updated_at')
            ->orderBy('id', 'DESC')
            ->findAll($limit);
        $data['title'] = 'Email Templates';
        $data['description'] = 'Manage your email templates here.';

        echo view('email_templates/index', $data);
    }

    public function create()
    {
        $data['title'] = 'Create Email Template';
        $data['description'] = 'Create a new email template.';

        echo view('email_templates/create', $data);
    }

    public function store()
    {
        $model = new EmailTemplateModel();
        
        $data = [
            'title' => $this->request->getPost('title'),
            'subject' => $this->request->getPost('subject'),
            'content' => $this->request->getPost('content'),
        ];
        
        $model->save($data);

        return redirect()->to('/email-templates');
    }
}
