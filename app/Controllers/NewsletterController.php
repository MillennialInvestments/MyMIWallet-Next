<?php

declare(strict_types=1);

namespace App\Controllers;

use App\Models\SubscribeModel;
use CodeIgniter\Controller;

/**
 * GT-FORM-ROUTES-001: public newsletter sign-up.
 *
 * Serves POST /newsletter/subscribe (landing page form) and
 * POST /Blog/Email/Subscription/Account-Manager (blog post sidebar form). Both
 * routes are CSRF-protected and covered by the global rate-limit filters.
 * It only stores the address in bf_users_subscribers; it sends no email.
 */
class NewsletterController extends Controller
{
    public function subscribe()
    {
        // getJSON() throws on a non-JSON body, so a plain form post (the
        // landing page form) used to end in a 500. Only read JSON when sent as JSON.
        $json = null;
        if (stripos($this->request->getHeaderLine('Content-Type'), 'json') !== false) {
            try {
                $json = $this->request->getJSON(true);
            } catch (\Throwable) {
                $json = null;
            }
        }
        $input = is_array($json) ? $json : (array) $this->request->getPost();
        $wantsJson = is_array($json) || $this->request->isAJAX();

        // Honeypot: real users never fill a field named "website".
        if (trim((string) ($input['website'] ?? '')) !== '') {
            return $this->reply($wantsJson, true, 'Thanks for subscribing!');
        }

        $userId = (int) (session('cuID') ?? 0);
        $result = (new SubscribeModel())->subscribe([
            'email'    => (string) ($input['email'] ?? ''),
            'category' => mb_substr(preg_replace('/[^A-Za-z0-9 _\-]/', '', (string) ($input['category'] ?? '')) ?: 'General', 0, 50),
            'referral' => 'Organic',
            'user_id'  => $userId > 0 ? $userId : null,
            'user_ip'  => $this->request->getIPAddress(),
            'time'     => date('H:i:s'),
            'hostTime' => date('Y-m-d H:i:s'),
        ]);

        if ($result['success'] ?? false) {
            return $this->reply($wantsJson, true, 'Thanks for subscribing!');
        }

        if (($result['reason'] ?? '') === 'duplicate_email') {
            // Same answer as success, so the form cannot be used to test which emails are on the list.
            return $this->reply($wantsJson, true, 'Thanks for subscribing!');
        }

        return $this->reply($wantsJson, false, (string) ($result['message'] ?? 'Please enter a valid email address.'), 422);
    }

    private function reply(bool $json, bool $ok, string $message, int $status = 200)
    {
        if ($json) {
            return $this->response->setStatusCode($ok ? 200 : $status)->setJSON([
                'status'  => $ok ? 'success' : 'error',
                'success' => $ok,
                'message' => $message,
            ]);
        }

        return redirect()->back()->with($ok ? 'message' : 'error', $message);
    }

    /**
     * GT-FORM-ROUTES-001: POST /newsletter/store handles admin newsletter template/content submission.
     */
    public function store()
    {
        $subject = trim((string) ($this->request->getPost('subject') ?? ''));
        $content = trim((string) ($this->request->getPost('content') ?? ''));

        if ($subject === '' || $content === '') {
            return $this->reply($this->request->isAJAX(), false, 'Subject and content are required.', 422);
        }

        $templateModel = new \App\Models\EmailTemplateModel();
        $templateModel->save([
            'title'      => $subject,
            'subject'    => $subject,
            'content'    => $content,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ]);

        return $this->reply($this->request->isAJAX(), true, 'Newsletter template saved.');
    }
}
