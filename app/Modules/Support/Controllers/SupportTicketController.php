<?php

declare(strict_types=1);

namespace App\Modules\Support\Controllers;

use App\Controllers\BaseController;
use App\Modules\Support\Models\SupportTicketEventModel;
use App\Modules\Support\Models\SupportTicketModel;
use App\Modules\Support\Services\SupportTicketService;
use CodeIgniter\Exceptions\PageNotFoundException;
use CodeIgniter\HTTP\ResponseInterface;

class SupportTicketController extends BaseController
{
    protected ?SupportTicketService $ticketService = null;

    public function initController(\CodeIgniter\HTTP\RequestInterface $request, \CodeIgniter\HTTP\ResponseInterface $response, \Psr\Log\LoggerInterface $logger)
    {
        parent::initController($request, $response, $logger);
        $this->ticketService = new SupportTicketService();
    }

    public function index()
    {
        $currentUserId = $this->resolveCurrentUserId();
        $tickets = [];
        if ($currentUserId > 0) {
            $tickets = $this->ticketService->getTicketsForUser($currentUserId, 50);
        }

        return view('App\Modules\Support\Views\index', [
            'pageTitle' => 'Support Tickets',
            'articles'  => [],
            'tickets'   => $tickets,
        ]);
    }

    public function show(int $id)
    {
        $ticketModel = model(SupportTicketModel::class);
        $eventModel = model(SupportTicketEventModel::class);

        $ticket = $ticketModel->find($id);
        if (! $ticket) {
            throw PageNotFoundException::forPageNotFound('Ticket not found');
        }

        if (! $this->canViewTicket($ticket, $id)) {
            throw PageNotFoundException::forPageNotFound('Ticket not found');
        }

        $events = $eventModel->where('ticket_id', $id)->orderBy('created_at', 'ASC')->limit(100)->findAll();

        return view('App\Modules\Support\Views\Support\ticket_detail', [
            'ticket' => $ticket,
            'events' => $events,
        ]);
    }

    /**
     * Submit a reply / follow-up to a ticket with IDOR enforcement.
     */
    public function reply(int $id): ResponseInterface
    {
        $ticketModel = model(SupportTicketModel::class);
        $ticket = $ticketModel->find($id);
        if (! $ticket) {
            throw PageNotFoundException::forPageNotFound('Ticket not found');
        }

        if (! $this->canViewTicket($ticket, $id)) {
            throw PageNotFoundException::forPageNotFound('Ticket not found');
        }

        $message = trim((string) $this->request->getPost('message'));
        if (mb_strlen($message) < 2) {
            return $this->response->setStatusCode(422)->setJSON([
                'status'  => 'error',
                'message' => 'Please enter a valid message.',
            ]);
        }

        $userId = $this->resolveCurrentUserId();
        $isAdmin = $this->isCurrentUserAdmin();

        $this->ticketService->addFollowUp($id, $message, $userId ?: null, $isAdmin);

        return $this->response->setJSON([
            'status'  => 'success',
            'message' => 'Your reply has been added.',
        ]);
    }

    /**
     * Check if the current viewer is authorized to view or reply to the ticket.
     * Prevents IDOR: only ticket owner, flashdata recipient, or admin can access.
     */
    protected function canViewTicket(array $ticket, int $ticketId): bool
    {
        if ($this->isCurrentUserAdmin()) {
            return true;
        }

        $currentUserId = $this->resolveCurrentUserId();
        $ticketUserId = isset($ticket['user_id']) ? (int) $ticket['user_id'] : null;

        if ($currentUserId > 0 && $ticketUserId !== null && $currentUserId === $ticketUserId) {
            return true;
        }

        $sessionEmail = strtolower(trim((string) (session('email') ?? session('cuEmail') ?? '')));
        $ticketEmail = strtolower(trim((string) ($ticket['email'] ?? '')));

        if ($sessionEmail !== '' && $ticketEmail !== '' && $sessionEmail === $ticketEmail) {
            return true;
        }

        // Allow immediate view from login exception redirect
        $flashTicketId = (int) (session()->getFlashdata('auth_ticket_id') ?? session()->get('auth_ticket_id') ?? 0);
        if ($flashTicketId > 0 && $flashTicketId === $ticketId) {
            return true;
        }

        return false;
    }

    protected function resolveCurrentUserId(): int
    {
        $id = $this->cuID ?? session('cuID') ?? session('user_id');
        if ($id !== null && (int) $id > 0) {
            return (int) $id;
        }

        if (function_exists('auth') && auth()->loggedIn()) {
            return (int) auth()->id();
        }

        return 0;
    }

    protected function isCurrentUserAdmin(): bool
    {
        $userId = $this->resolveCurrentUserId();
        if ($userId <= 0) {
            return false;
        }

        $role = (int) (session('cuRole') ?? 4);
        if ($role <= 2) {
            return true;
        }

        if (function_exists('has_permission') && has_permission('admin.access')) {
            return true;
        }

        $authorize = service('authorization');
        if (is_object($authorize) && method_exists($authorize, 'inGroup')) {
            return $authorize->inGroup('admin', $userId) || $authorize->inGroup('team', $userId);
        }

        return false;
    }
}
