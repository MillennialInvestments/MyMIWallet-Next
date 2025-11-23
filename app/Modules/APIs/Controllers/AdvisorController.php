<?php

namespace App\Modules\APIs\Controllers;

use CodeIgniter\API\ResponseTrait;
use CodeIgniter\RESTful\ResourceController;

class AdvisorController extends ResourceController
{
    use ResponseTrait;

    public function generateNow()
    {
        $media = [
            'timestamp'   => date('c'),
            'ticker'      => $this->request->getPost('ticker') ?? 'TBD',
            'score'       => $this->request->getPost('score') ?? 'N/A',
            'risk_rating' => $this->request->getPost('risk_rating') ?? 'N/A',
            'sentiment'   => $this->request->getPost('sentiment') ?? 'Neutral',
            'voiceover_url' => $this->request->getPost('voiceover_url') ?? '',
            'chart_url'     => $this->request->getPost('chart_url') ?? '',
            'zip_url'       => $this->request->getPost('zip_url') ?? '',
        ];

        return $this->respond([
            'status' => 'success',
            'media'  => $media,
        ]);
    }
}