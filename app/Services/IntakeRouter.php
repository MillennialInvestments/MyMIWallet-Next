<?php
namespace App\Services;

use App\Config\Intake;

class IntakeRouter
{
    public function dispatch(array $payload): bool
    {
        $cfg = config(Intake::class);

        $subject = strtoupper(trim((string)($payload['subject'] ?? '')));
        $text    = (string)($payload['text'] ?? '');
        $urls    = array_values(array_filter(array_map('trim', (array)($payload['urls'] ?? []))));

        // 1) Try subject token
        $handlerKey = $this->detectBySubjectToken($subject, $cfg->tagMap);

        // 2) Try alert pattern if not tagged
        if (!$handlerKey && $this->looksLikeTradeAlert($subject, $text)) {
            $handlerKey = 'trade_alert';
        }

        // 3) Default
        $handlerKey = $handlerKey ?: $cfg->defaultHandler;

        switch ($handlerKey) {
            case 'real_estate':
                return $this->handleRealEstate($payload);
            case 'trade_alert':
                return $this->handleTradeAlert($payload);
            case 'news':
            default:
                return $this->handleNews($payload);
        }
    }

    protected function detectBySubjectToken(string $subject, array $map): ?string
    {
        foreach ($map as $token => $key) {
            if ($token !== '' && str_contains($subject, $token)) {
                return $key;
            }
        }
        return null;
    }

    protected function looksLikeTradeAlert(string $subject, string $text): bool
    {
        $hay = $subject . ' ' . $text;
        return (bool) preg_match('~\$\s*[A-Z][A-Z0-9\.]{0,9}.*\b(BUY|SELL|ALERT)\b~i', $hay);
    }

    protected function handleRealEstate(array $p): bool
    {
        $url = $p['urls'][0] ?? null;
        $text = (string)($p['text'] ?? '');

        $pm = model('ProjectsModel');

        if ($url) {
            $id = $pm->reSaveIntake([
                'user_id'    => 0,
                'source'     => 'zillow',
                'raw_input'  => $url,
                'zillow_url' => $url,
                'status'     => 'queued',
            ]);
            if ($id) {
                return service('RealEstateIngestService')->queue((int)$id);
            }
            return false;
        }

        if (preg_match('~(\d{1,6}\s+[^,\n]+)\s*,\s*([A-Za-z\s\.-]+)\s*,\s*([A-Za-z]{2})(?:\s+(\d{5}(?:-\d{4})?))?~', $text, $m)) {
            $addr1 = trim($m[1]);
            $city  = trim($m[2]);
            $state = strtoupper($m[3]);
            $zip   = $m[4] ?? null;
            $raw   = trim("$addr1 $city $state " . ($zip ?? ''));
            $id = $pm->reSaveIntake([
                'user_id'       => 0,
                'source'        => 'address',
                'raw_input'     => $raw,
                'address_line1' => $addr1,
                'city'          => $city,
                'state'         => $state,
                'postal_code'   => $zip,
                'status'        => 'queued',
            ]);
            if ($id) {
                return service('RealEstateIngestService')->queue((int)$id);
            }
        }

        log_message('warning','IntakeRouter: real_estate handler found neither URL nor address.');
        return false;
    }

    protected function handleNews(array $p): bool
    {
        $url   = $p['urls'][0] ?? '';
        $title = trim((string)($p['subject'] ?? ''));
        $text  = (string)($p['text'] ?? '');
        $from  = (string)($p['from'] ?? '');

        if (!$url) {
            log_message('info','IntakeRouter: news without URL from {from} subject "{s}"', ['from'=>$from,'s'=>$title]);
            return true;
        }

        $svc = service('MarketingScraper');
        if (method_exists($svc, 'queueLink')) {
            return (bool) $svc->queueLink($url, [
                'source' => 'email-intake',
                'title'  => $title,
                'note'   => $text,
                'from'   => $from,
                'tag'    => 'NEWS',
            ]);
        }

        log_message('info','IntakeRouter: queued news link {url} with title "{t}"', ['url'=>$url,'t'=>$title]);
        return true;
    }

    protected function handleTradeAlert(array $p): bool
    {
        $subject = (string)($p['subject'] ?? '');
        $text    = (string)($p['text'] ?? '');
        $hay     = $subject . ' ' . $text;

        if (preg_match('~\$\s*([A-Z][A-Z0-9\.]{0,9}).{0,40}\b(BUY|SELL)\b~i', $hay, $m)) {
            $symbol = strtoupper($m[1]);
            $side   = strtoupper($m[2]);
        } else {
            log_message('warning','IntakeRouter: trade_alert handler could not parse symbol/side from "{h}"', ['h'=>$hay]);
            return false;
        }

        $svc = service('TradeAlertsIngest');
        if (method_exists($svc, 'ingestQuick')) {
            return (bool) $svc->ingestQuick($symbol, $side, [
                'source'  => 'email-intake',
                'note'    => $text,
                'subject' => $subject,
            ]);
        }

        log_message('info','IntakeRouter: queued trade alert {sym} {side}', ['sym'=>$symbol,'side'=>$side]);
        return true;
    }
}
?>