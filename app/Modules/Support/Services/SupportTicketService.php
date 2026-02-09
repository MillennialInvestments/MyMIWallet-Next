<?php

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

    public function createAuthLoginErrorTicket(array $context): int
    {
        $ticketId = (int) $this->ticketModel->insert([
            'user_id' => $context['user_id'] ?? null,
            'email' => $context['email_entered'] ?? null,
            'subject' => 'Login system error',
            'message' => $context['error_message'] ?? 'Unexpected auth exception',
            'category' => 'auth',
            'status' => 'open',
            'priority' => 'high',
            'ip_address' => $context['ip_address'] ?? '0.0.0.0',
            'user_agent' => $context['user_agent'] ?? null,
            'ref_context_json' => json_encode($context, JSON_UNESCAPED_SLASHES),
        ], true);

        $this->recordEvent($ticketId, 'created', $context);

        return $ticketId;
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
            'ticket_id' => $ticketId,
            'event_type' => $type,
            'payload_json' => json_encode($payload, JSON_UNESCAPED_SLASHES),
            'created_at' => date('Y-m-d H:i:s'),
        ]);
    }
}
