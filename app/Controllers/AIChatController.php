<?php

declare(strict_types=1);

namespace App\Controllers;

use App\Libraries\TbiChat\TbiChatLink;
use CodeIgniter\HTTP\RedirectResponse;
use Config\Services;
use Throwable;

/**
 * GET /AI-Chat (signed-in members): send the member to the MyMI AI chat on
 * TBI AIOps with a one-time sign-in link (TbiChatLink,
 * docs/aiops/tbi-tenant-chat.md). The member id comes from the session only.
 */
class AIChatController extends BaseController
{
    public function open(): RedirectResponse
    {
        $userId = (int) ($this->cuID ?? 0);
        $chat = TbiChatLink::fromEnv();
        if ($userId <= 0 || ! $chat->enabled()) {
            return redirect()->to(site_url('/Dashboard'))
                ->with('error', 'The AI chat is not available yet. Please try again later.');
        }

        $active = false;
        try {
            $active = Services::premiumEntitlementService()->hasActiveMembership($userId);
        } catch (Throwable $e) {
            // Unknown membership: the member still gets the public tier.
            log_message('warning', 'tbi_chat tier lookup failed: {err}', ['err' => $e->getMessage()]);
        }
        $tier = TbiChatLink::tierFor($active);
        // First name only, so the chat can greet the member; never required.
        $firstName = null;
        try {
            $info = $this->getMyMIUser()->getUserInformation($userId);
            $firstName = is_array($info) && is_string($info['cuFirstName'] ?? null) ? $info['cuFirstName'] : null;
        } catch (Throwable $e) {
            log_message('warning', 'tbi_chat name lookup failed: {err}', ['err' => $e->getMessage()]);
        }
        $link = $chat->linkFor($userId, $tier, time(), $firstName);
        if ($link === null) {
            return redirect()->to(site_url('/Dashboard'))
                ->with('error', 'The AI chat is not available yet. Please try again later.');
        }
        // Ids and tier only: the link itself is a credential and is never logged.
        log_message('info', 'tbi_chat link user={user} tier={tier}', ['user' => $userId, 'tier' => $tier]);

        // The link is a one-time credential: keep it out of caches and referrers.
        $redirect = redirect()->to($link);
        $redirect->setHeader('Cache-Control', 'no-store');
        $redirect->setHeader('Referrer-Policy', 'no-referrer');

        return $redirect;
    }
}
