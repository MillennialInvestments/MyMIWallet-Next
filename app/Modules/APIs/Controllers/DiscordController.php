<?php namespace App\Modules\APIs\Controllers;

use App\Controllers\BaseController;
use App\Libraries\MyMIDiscord;
use CodeIgniter\API\ResponseTrait;

class DiscordController extends BaseController
{
    use ResponseTrait;

    protected MyMIDiscord $discord;

    public function __construct()
    {
        $this->discord = new MyMIDiscord();
    }

    public function enqueue()
    {
        $event = $this->request->getPost('event_key');
        $data  = $this->request->getPost('data') ?? [];
        if (!$event || !is_array($data)) {
            return $this->failValidationErrors('event_key and data are required');
        }
        $this->discord->dispatch($event, $data);
        return $this->respond(['status'=>'ok']);
    }

    public function broadcast()
    {
        // Admin-only (reuse your token/role checks)
        $channelKey = $this->request->getPost('channel_key');
        $templateKey= $this->request->getPost('template_key');
        $data       = $this->request->getPost('data') ?? [];
        if (!$channelKey || !$templateKey) return $this->failValidationErrors('channel_key & template_key required');

        $payload = $this->discord->renderTemplate($templateKey, $data);
        if (!$payload) return $this->failNotFound('Template disabled or not found');

        service('logger')->info('Discord broadcast manual', compact('channelKey','templateKey'));
        $queued = model('DiscordModel')->enqueue($channelKey, $payload);
        return $this->respond(['status'=>$queued ? 'queued' : 'skipped', 'reason'=>$queued ? null : 'duplicate']);
    }

    public function processQueue()
    {
        // Protect with your X-CRON-Key gate (same as ManagementController)
        $token = $this->request->getHeaderLine('X-CRON-Key') ?: $this->request->getGet('cronKey');
        $expected = env('CRON_SHARED_KEY');

        if (!$expected || !hash_equals((string) $expected, (string) $token)) {
            log_message('warning', '🚫 DiscordController::processQueue blocked - invalid or missing token.');
            return $this->failForbidden('Invalid CRON key.');
        }

        $stats = $this->discord->processQueue(25);
        return $this->respond(['status'=>'ok','stats'=>$stats]);
    }

    public function test()
    {
        $data = [
            'ticker'  => 'SPY',
            'title'   => 'Test Alert',
            'status'  => 'Opened',
            'price'   => '430.12',
            'tp'      => '435.00',
            'sl'      => '427.50',
            'chartUrl'=> 'https://www.tradingview.com/symbols/SPY/'
        ];
        $this->discord->dispatch('alerts.opened', $data);
        return $this->respond(['status'=>'queued','example'=>$data]);
    }

    public function coalesceNow()
    {
        $this->discord->coalesceQueue();
        return $this->respond(['status'=>'ok','message'=>'coalesced']);
    }

    public function purgeDead()
    {
        $db = db_connect();
        $n = $db->table('bf_discord_queue')->where('status','dead')->delete();
        return $this->respond(['status'=>'ok','deleted'=>$n]);
    }

    public function health()
    {
        $db = db_connect();
        $queued = $db->table('bf_discord_queue')->where('status','queued')->countAllResults();
        return $this->respond(['queued'=>$queued,'tz'=>config('Discord')->timezone]);
    }
}