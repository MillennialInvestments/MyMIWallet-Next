<?php

namespace App\Commands;

use App\Libraries\Brokers\ThinkorSwimParser;
use CodeIgniter\CLI\BaseCommand;
use CodeIgniter\CLI\CLI;

class AlertsParseTest extends BaseCommand
{
    protected $group       = 'alerts';
    protected $name        = 'alerts:parse-test';
    protected $description = 'Parse a broker email sample and output normalized execution data.';

    public function run(array $params)
    {
        $file = CLI::getOption('file') ?? ($params[0] ?? null);
        if (! $file) {
            CLI::error('Usage: php spark alerts:parse-test --file=/path/to/email.txt [--subject="..."]');
            return;
        }

        if (! is_readable($file)) {
            CLI::error('File not found or unreadable: ' . $file);
            return;
        }

        $content = file_get_contents($file) ?: '';
        $subject = CLI::getOption('subject') ?? '';

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
    }
}
