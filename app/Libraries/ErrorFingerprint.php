<?php

namespace App\Libraries;

class ErrorFingerprint
{
    public function fingerprint(string $line): string
    {
        // Normalize volatile bits: timestamps, memory addresses, line numbers
        $s = strtolower(trim($line));

        // Replace common numeric patterns
        $s = preg_replace('/\b\d{4}-\d{2}-\d{2}\b/', '{date}', $s);
        $s = preg_replace('/\b\d{2}:\d{2}:\d{2}\b/', '{time}', $s);
        $s = preg_replace('/\bline\s+\d+\b/', 'line {n}', $s);
        $s = preg_replace('/0x[0-9a-f]+/i', '0x{hex}', $s);
        $s = preg_replace('/\b\d+\b/', '{n}', $s);

        return sha1($s);
    }
}
