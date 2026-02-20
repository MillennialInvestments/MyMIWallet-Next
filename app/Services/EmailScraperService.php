<?php

namespace App\Services;

use Config\Imap;
use RuntimeException;

class EmailScraperService
{
    protected Imap $config;

    public function __construct(?Imap $config = null)
    {
        $this->config = $config ?? config(Imap::class);
    }

    public function fetchUnread(string $mailboxOverride = null): array
    {
        if (! $this->config->isConfigured()) {
            throw new RuntimeException('IMAP is not properly configured.');
        }

        $mailbox = $mailboxOverride ?? $this->config->mailbox;

        $connection = @imap_open(
            $this->config->path,
            $this->config->username,
            $this->config->password,
            OP_HALFOPEN
        );

        if (! $connection instanceof \IMAP\Connection) {
            throw new RuntimeException('IMAP connection failed: ' . imap_last_error());
        }

        $emails = [];
        $ids = imap_search($connection, 'UNSEEN');

        if ($ids !== false) {
            foreach ($ids as $id) {
                $overview = imap_fetch_overview($connection, $id, 0);
                $body     = imap_fetchbody($connection, $id, 1);

                $emails[] = [
                    'mailbox'     => $mailbox,
                    'message_id'  => $overview[0]->message_id ?? null,
                    'subject'     => $overview[0]->subject ?? '',
                    'sender'      => $overview[0]->from ?? '',
                    'raw_body'    => $body,
                    'raw_headers' => json_encode($overview[0] ?? []),
                ];

                imap_setflag_full($connection, (string) $id, "\\Seen");
            }
        }

        imap_close($connection);

        return $emails;
    }
}
