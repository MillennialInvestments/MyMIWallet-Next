<?php

namespace App\Modules\Support\Controllers;

use App\Controllers\BaseController;
use App\Modules\Support\Models\SupportTicketEventModel;
use App\Modules\Support\Models\SupportTicketModel;

class SupportTicketController extends BaseController
{
    public function index()
    {
        return view('App\\Modules\\Support\\Views\\index');
    }

    public function show(int $id)
    {
        $ticketModel = model(SupportTicketModel::class);
        $eventModel = model(SupportTicketEventModel::class);

        $ticket = $ticketModel->find($id);
        if (! $ticket) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound('Ticket not found');
        }

        $events = $eventModel->where('ticket_id', $id)->orderBy('created_at', 'ASC')->findAll();

        return view('App\\Modules\\Support\\Views\\Support\\ticket_detail', [
            'ticket' => $ticket,
            'events' => $events,
        ]);
    }
}
