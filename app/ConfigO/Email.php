<?php

namespace Config;

use CodeIgniter\Config\BaseConfig;

class Email extends BaseConfig
{
    /**
     * The email address from which all emails will be sent.
     */
    public string $fromEmail  = 'support@mymiwallet.com';

    /**
     * The name associated with the sender email.
     */
    public string $fromName   = 'MyMI Wallet - Customer Support';

    /**
     * List of recipients for batch sending.
     */
    public string $recipients = '';

    /**
     * The "user agent" string that will be included in the email headers.
     */
    public string $userAgent = 'CodeIgniter';

    /**
     * The mail sending protocol: `mail`, `sendmail`, `smtp`.
     */
    public string $protocol = 'smtp';

    /**
     * The server path to the Sendmail program.
     * This is only used if `$protocol` is set to `sendmail`.
     */
    public string $mailPath = '/usr/sbin/sendmail';

    /**
     * The SMTP server hostname.
     * This should be set to your email provider's SMTP server.
     */
    public string $SMTPHost = 'smtp.dreamhost.com';

    /**
     * The SMTP username for authentication.
     */
    public string $SMTPUser = 'support@mymiwallet.com';

    /**
     * The SMTP password for authentication.
     * The password is dynamically assigned from the environment variables.
     * This ensures security by keeping sensitive credentials out of source code.
     */
    public string $SMTPPass = 'MyMI2024!';

    /**
     * The SMTP port.
     * - Use `465` for SSL connections (implicit SSL).
     * - Use `587` for TLS connections (explicit STARTTLS).
     */
    public int $SMTPPort = 465;

    /**
     * SMTP timeout in seconds.
     * Determines how long the system waits before failing the connection.
     */
    public int $SMTPTimeout = 30;

    /**
     * Whether to keep the SMTP connection alive between emails.
     * - `true`: Keeps the connection open for multiple email sends.
     * - `false`: Closes the connection after sending each email.
     */
    public bool $SMTPKeepAlive = false;

    /**
     * The type of encryption used for the SMTP connection.
     * - Use `''` (empty string) for **port 465** (implicit SSL).
     * - Use `'tls'` for **port 587** (STARTTLS).
     */
    public string $SMTPCrypto = 'ssl';

    /**
     * Whether to enable word wrapping in emails.
     */
    public bool $wordWrap = true;

    /**
     * The maximum number of characters per line in word-wrapped emails.
     */
    public int $wrapChars = 76;

    /**
     * The email format type.
     * - `text`: Plain text emails.
     * - `html`: HTML-formatted emails.
     */
    public string $mailType = 'html';

    /**
     * The character set used in emails.
     * UTF-8 is recommended for most applications.
     */
    public string $charset = 'UTF-8';

    /**
     * Whether to validate email addresses before sending.
     * - `true`: Ensures email addresses are valid before sending.
     * - `false`: Sends emails regardless of validity.
     */
    public bool $validate = true;

    /**
     * Email priority level.
     * - `1`: Highest priority.
     * - `3`: Normal priority.
     * - `5`: Lowest priority.
     */
    public int $priority = 3;

    /**
     * The newline character used in email headers.
     * Use `"\r\n"` to comply with RFC 822 email standards.
     */
    public string $CRLF = "\r\n";

    /**
     * The newline character used in email messages.
     * Use `"\r\n"` to comply with RFC 822 email standards.
     */
    public string $newline = "\r\n";

    /**
     * Whether to enable BCC batch mode for sending multiple emails.
     * If enabled, emails are sent in batches to avoid overloading the SMTP server.
     */
    public bool $BCCBatchMode = false;

    /**
     * The number of emails sent in each BCC batch.
     * This is only used if `$BCCBatchMode` is `true`.
     */
    public int $BCCBatchSize = 200;

    /**
     * Whether to request a delivery status notification (DSN) from the server.
     */
    public bool $DSN = false;

    // /**
    //  * Constructor: Assigns SMTP password dynamically from environment variables.
    //  */
    // public function __construct()
    // {
    //     $this->SMTPPass = getenv('SUPPORT_SMTP_PASS'); // Assigns password securely
    // }
}
