<?php

namespace App\Commands;

use App\Libraries\Brokers\ThinkorSwimParser;
use App\Commands\SafeBaseCommand;
use CodeIgniter\CLI\CLI;

class AlertsParseTest extends SafeBaseCommand
{
    protected string $group       = 'alerts';
    protected string $name        = 'alerts:parse-test';
    protected $description = 'Parse a broker email sample and output normalized execution data.';
    protected $usage       = 'alerts:parse-test [file] [subject] [--dry-run]';
    protected $arguments   = [
        'file' => 'Path to the email file to parse.',
        'subject' => 'Optional subject line override.',
    ];
    protected $options     = [
        '--dry-run' => 'Preview actions without running parser',
    ];

    public function run(array $params)
    {
        log_message('info', '[spark:alerts:parse-test] Started', ['params' => $params]);
        [$args, $flags] = $this->parseParams($params);
        $dryRun = $this->resolveDryRun($flags);
        $file = $args[0] ?? null;
        if (! $file) {
            CLI::error('Usage: php spark alerts:parse-test /path/to/email.txt ["Subject line"]');
            log_message('error', '[spark:alerts:parse-test] Failed', ['reason' => 'Missing file argument']);
            return EXIT_ERROR;
        }

        if (! is_readable($file)) {
            CLI::error('File not found or unreadable: ' . $file);
            log_message('error', '[spark:alerts:parse-test] Failed', ['reason' => 'File unreadable']);
            return EXIT_ERROR;
        }

        if ($dryRun) {
            CLI::write('Dry-run enabled. Parser will not execute.', 'yellow');
            log_message('info', '[spark:alerts:parse-test] Completed', ['dry_run' => true]);
            return EXIT_SUCCESS;
        }

        $content = file_get_contents($file) ?: '';
        $subject = $args[1] ?? '';

        if ($subject === '' && preg_match('/^Subject:\s*(.+)$/mi', $content, $match)) {
            $subject = trim($match[1]);
        }

        $parser = new ThinkorSwimParser();
        $canParse = $parser->canParse($subject, $content);
        $parsed = $canParse ? $parser->parse($subject, $content) : null;

        CLI::write('Parser: ' . ThinkorSwimParser::class);
        CLI::write('Can Parse: ' . ($canParse ? 'yes' : 'no'));
        CLI::write('Subject: ' . ($subject !== '' ? $subject : '[none]'));
        CLI::write('Result:');
        CLI::write(json_encode($parsed, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES));

        log_message('info', '[spark:alerts:parse-test] Completed', [
            'file' => $file,
            'parsed' => $canParse,
            'dry_run' => false,
        ]);

        return EXIT_SUCCESS;
    }

    protected function isDestructive(): bool
    {
        return false;
    }
}
