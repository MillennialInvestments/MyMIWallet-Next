<?php

namespace App\Services;

class EmailScraperService
{
    public function fetchUnread(string $mailbox): array
    {
        $imapPath = getenv('IMAP_PATH');
        $username = getenv('IMAP_USER');
        $password = getenv('IMAP_PASS');

        $inbox = imap_open($imapPath, $username, $password);

        $emails = [];
        $ids = imap_search($inbox, 'UNSEEN');

        if ($ids) {
            foreach ($ids as $id) {
                $overview = imap_fetch_overview($inbox, $id, 0);
                $body = imap_fetchbody($inbox, $id, 1);

                $emails[] = [
                    'mailbox' => $mailbox,
                    'message_id' => $overview[0]->message_id ?? null,
                    'subject' => $overview[0]->subject ?? '',
                    'sender' => $overview[0]->from ?? '',
                    'raw_body' => $body,
                    'raw_headers' => json_encode($overview[0])
                ];

                imap_setflag_full($inbox, $id, "\\Seen");
            }
        }

        imap_close($inbox);

        return $emails;
    }
}
