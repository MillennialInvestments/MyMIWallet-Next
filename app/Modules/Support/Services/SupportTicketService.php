<?php

declare(strict_types=1);

namespace App\Modules\Support\Services;

use App\Modules\Support\Libraries\DiscordSupportNotifier;
use App\Modules\Support\Models\SupportTicketEventModel;
use App\Modules\Support\Models\SupportTicketModel;

class SupportTicketService
{
    public function __construct(
        private readonly SupportTicketModel $ticketModel = new SupportTicketModel(),
        private readonly SupportTicketEventModel $eventModel = new SupportTicketEventModel(),
        private readonly DiscordSupportNotifier $discordNotifier = new DiscordSupportNotifier(),
    ) {
    }

    /**
     * Create an auth login error ticket.
     *
     * @param array<string, mixed> $context
     */
    public function createAuthLoginErrorTicket(array $context): int
    {
        $ticketId = (int) $this->ticketModel->insert([
            'user_id'          => $context['user_id'] ?? null,
            'email'            => $context['email_entered'] ?? null,
            'subject'          => 'Login system error',
            'message'          => $context['error_message'] ?? 'Unexpected auth exception',
            'category'         => 'auth',
            'status'           => 'open',
            'priority'         => 'high',
            'ip_address'       => $context['ip_address'] ?? '0.0.0.0',
            'user_agent'       => $context['user_agent'] ?? null,
            'ref_context_json' => json_encode($context, JSON_UNESCAPED_SLASHES),
        ], true);

        $this->recordEvent($ticketId, 'created', $context);

        return $ticketId;
    }

    /**
     * Create a general support ticket.
     *
     * @param array<string, mixed> $data
     */
    public function createTicket(array $data): int
    {
        $ticketId = (int) $this->ticketModel->insert([
            'user_id'          => $data['user_id'] ?? null,
            'email'            => $data['email'] ?? null,
            'subject'          => mb_substr(trim((string) ($data['subject'] ?? 'Support Request')), 0, 255),
            'message'          => trim((string) ($data['message'] ?? '')),
            'category'         => mb_substr(trim((string) ($data['category'] ?? 'general')), 0, 50),
            'status'           => mb_substr(trim((string) ($data['status'] ?? 'open')), 0, 30),
            'priority'         => mb_substr(trim((string) ($data['priority'] ?? 'normal')), 0, 30),
            'ip_address'       => $data['ip_address'] ?? '0.0.0.0',
            'user_agent'       => $data['user_agent'] ?? null,
            'ref_context_json' => isset($data['ref_context']) ? json_encode($data['ref_context'], JSON_UNESCAPED_SLASHES) : null,
        ], true);

        $this->recordEvent($ticketId, 'created', [
            'subject'  => $data['subject'] ?? '',
            'category' => $data['category'] ?? 'general',
            'priority' => $data['priority'] ?? 'normal',
        ]);

        return $ticketId;
    }

    /**
     * Find a ticket by ID.
     *
     * @return array<string, mixed>|null
     */
    public function getTicket(int $ticketId): ?array
    {
        $ticket = $this->ticketModel->find($ticketId);

        return is_array($ticket) ? $ticket : null;
    }

    /**
     * Get tickets for a specific user, bounded by limit.
     *
     * @return list<array<string, mixed>>
     */
    public function getTicketsForUser(int $userId, int $limit = 50): array
    {
        $limit = max(1, min($limit, 100));

        return $this->ticketModel
            ->where('user_id', $userId)
            ->orderBy('id', 'DESC')
            ->limit($limit)
            ->get()
            ->getResultArray();
    }

    /**
     * Add a follow-up reply or note to a ticket.
     */
    public function addFollowUp(int $ticketId, string $message, ?int $userId = null, bool $isStaff = false): bool
    {
        $ticket = $this->getTicket($ticketId);
        if (! $ticket) {
            return false;
        }

        $eventType = $isStaff ? 'staff_reply' : 'user_reply';
        $this->recordEvent($ticketId, $eventType, [
            'user_id'  => $userId,
            'message'  => mb_substr(trim($message), 0, 5000),
            'is_staff' => $isStaff,
        ]);

        // Transition status if appropriate
        $newStatus = $isStaff ? 'waiting_user' : 'open';
        $this->ticketModel->update($ticketId, [
            'status'     => $newStatus,
            'updated_at' => date('Y-m-d H:i:s'),
        ]);

        return true;
    }

    /**
     * Update ticket status with event audit trail.
     */
    public function updateStatus(int $ticketId, string $status, ?string $reason = null): bool
    {
        $ticket = $this->getTicket($ticketId);
        if (! $ticket) {
            return false;
        }

        $validStatuses = ['open', 'in_progress', 'waiting_user', 'resolved', 'closed'];
        $status = strtolower(trim($status));
        if (! in_array($status, $validStatuses, true)) {
            return false;
        }

        $oldStatus = (string) ($ticket['status'] ?? 'open');
        $updated = $this->ticketModel->update($ticketId, [
            'status'     => $status,
            'updated_at' => date('Y-m-d H:i:s'),
        ]);

        if ($updated) {
            $this->recordEvent($ticketId, 'status_change', [
                'old_status' => $oldStatus,
                'new_status' => $status,
                'reason'     => $reason,
            ]);
        }

        return (bool) $updated;
    }

    /**
     * Get events for a ticket bounded by limit.
     *
     * @return list<array<string, mixed>>
     */
    public function getEventsForTicket(int $ticketId, int $limit = 100): array
    {
        $limit = max(1, min($limit, 200));

        return $this->eventModel
            ->where('ticket_id', $ticketId)
            ->orderBy('created_at', 'ASC')
            ->limit($limit)
            ->get()
            ->getResultArray();
    }

    public function notifyUser(int $ticketId, string $email, array $data): void
    {
        helper('email');
        $emailService = service('email');
        $emailService->setTo($email);
        $emailService->setSubject('MyMI Wallet support ticket #' . $ticketId);
        $emailService->setMessage(render_email_view('emails/support/auth_login_error_user', $data + ['ticket_id' => $ticketId]));

        if (! $emailService->send()) {
            log_message('error', '[SUPPORT] Failed emailing user for ticket #{id}', ['id' => $ticketId]);
            return;
        }

        $this->recordEvent($ticketId, 'emailed_user', ['email' => $email]);
    }

    public function notifySupport(int $ticketId, array $data): void
    {
        helper('email');
        $supportEmail = (string) env('support.email', 'support@mymiwallet.com');

        $emailService = service('email');
        $emailService->setTo($supportEmail);
        $emailService->setSubject('Auth exception ticket #' . $ticketId);
        $emailService->setMessage(render_email_view('emails/support/auth_login_error_support', $data + ['ticket_id' => $ticketId]));

        if (! $emailService->send()) {
            log_message('error', '[SUPPORT] Failed emailing support for ticket #{id}', ['id' => $ticketId]);
            return;
        }

        $this->recordEvent($ticketId, 'emailed_support', ['email' => $supportEmail]);
    }

    public function notifyDiscord(int $ticketId, array $data): void
    {
        $success = $this->discordNotifier->notify($ticketId, $data);
        if ($success) {
            $this->recordEvent($ticketId, 'discord_notified', ['ok' => true]);
        }
    }

    public function recordEvent(int $ticketId, string $type, array $payload): void
    {
        $this->eventModel->insert([
            'ticket_id'    => $ticketId,
            'event_type'   => $type,
            'payload_json' => json_encode($payload, JSON_UNESCAPED_SLASHES),
            'created_at'   => date('Y-m-d H:i:s'),
        ]);
    }
}
