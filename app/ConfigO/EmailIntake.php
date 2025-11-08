<?php
namespace Config;

use CodeIgniter\Config\BaseConfig;

/**
 * Email intake mailbox configuration.
 *
 * Environment variables expected:
 *  - EMAIL_INTAKE_HOST (e.g. imap.gmail.com)
 *  - EMAIL_INTAKE_PORT (e.g. 993)
 *  - EMAIL_INTAKE_ENCRYPTION (ssl|tls|none)
 *  - EMAIL_INTAKE_USERNAME (mailbox user)
 *  - EMAIL_INTAKE_PASSWORD (app password or OAuth token)
 *  - EMAIL_INTAKE_FOLDER (IMAP folder, default INBOX)
 *  - EMAIL_INTAKE_FROM_FILTER (pipe-separated allow list)
 *  - EMAIL_INTAKE_SUBJECT_TAG (optional subject tag like [PROPERTY])
 */
class EmailIntake extends BaseConfig
{
    public string $host;
    public int $port;
    public string $encryption;
    public ?string $username;
    public ?string $password;
    public string $folder;
    /** @var string[] */
    public array $fromFilter;
    public string $subjectTag;

    public function __construct()
    {
        $this->host       = env('EMAIL_INTAKE_HOST', 'imap.gmail.com');
        $this->port       = (int) env('EMAIL_INTAKE_PORT', 993);
        $this->encryption = env('EMAIL_INTAKE_ENCRYPTION', 'ssl');
        $this->username   = env('EMAIL_INTAKE_USERNAME');
        $this->password   = env('EMAIL_INTAKE_PASSWORD');
        $this->folder     = env('EMAIL_INTAKE_FOLDER', 'INBOX');
        $this->fromFilter = array_filter(array_map('trim', explode('|', env('EMAIL_INTAKE_FROM_FILTER', ''))));
        $this->subjectTag = env('EMAIL_INTAKE_SUBJECT_TAG', '');
    }
}
?>