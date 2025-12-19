<?php

namespace App\Libraries\Mail\Contracts;

interface MailProviderInterface
{
    /**
     * @param array $payload [to, subject, html, text, from_email, from_name, reply_to]
     * @return array{ok:bool, provider:string, message_id:?string, error:?string, meta:array}
     */
    public function send(array $payload): array;
}
