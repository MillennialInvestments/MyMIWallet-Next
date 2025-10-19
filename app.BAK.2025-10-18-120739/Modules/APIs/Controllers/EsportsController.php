<?php
namespace App\Modules\APIs\Controllers;

use App\Controllers\BaseController;
use App\Libraries\Flags;
use App\Libraries\MyMIEsports;
use App\Libraries\MyMIUser;
use App\Models\EsportsModel;
use CodeIgniter\Database\BaseConnection;
use CodeIgniter\Database\Exceptions\DatabaseException;
use CodeIgniter\API\ResponseTrait;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\I18n\Time;
use Config\Services;
use Throwable;
use DomainException;
use InvalidArgumentException;
use RuntimeException;

class EsportsController extends BaseController
{
    use ResponseTrait;

    protected EsportsModel $esportsModel;
    protected MyMIEsports $esportsLibrary;
    protected BaseConnection $db;
    protected bool $dryRun;
    protected bool $webhookStrict;
    protected int $maxPoolCents;
    protected bool $refundsEnabled;
    protected int $settlementGrace;
    protected int $kycThresholdCents;
    protected float $requestStart;
    protected int $cronBatchSize;
    protected int $maxJobAttempts;
    protected int $jobRetryBase;

    public function __construct()
    {
        $this->esportsModel   = Services::esportsModel();
        $this->esportsLibrary = Services::myMIEsports();
        $this->db              = $this->esportsModel->db ?? db_connect();
        $this->dryRun          = (bool) env('ESPORTS_DRY_RUN', true);
        $this->webhookStrict   = (bool) env('ESPORTS_WEBHOOK_STRICT', true);
        $this->maxPoolCents    = (int) env('ESPORTS_MAX_POOL_USD', 50000) * 100;
        $this->refundsEnabled  = (bool) env('ESPORTS_REFUNDS_ENABLED', false);
        $this->settlementGrace = (int) env('ESPORTS_SETTLEMENT_GRACE_SEC', 600);
        $this->kycThresholdCents = (int) env('ESPORTS_KYC_THRESHOLD_CENTS', 60000);
        $this->requestStart    = microtime(true);
        $this->cronBatchSize   = max(1, (int) env('ESPORTS_CRON_BATCH', 10));
        $this->maxJobAttempts  = max(1, (int) env('ESPORTS_JOB_MAX_ATTEMPTS', 5));
        $this->jobRetryBase    = max(5, (int) env('ESPORTS_JOB_RETRY_BASE_SEC', 30));
    }

    public function createEvent()
    {
        if ($response = $this->guardFeature()) {
            return $response;
        }

        $payload = $this->getRequestPayload();
        $this->logInvocation('createEvent', $payload);

        $rules = [
            'creator_id'   => 'required|is_natural_no_zero',
            'title'        => 'required|string|min_length[3]',
            'game_title'   => 'required|string|min_length[2]',
            'format'       => 'required|string',
            'buy_in_cents' => 'required|is_natural',
            'starts_at'    => 'required|string',
        ];

        if (! $this->validateData($payload, $rules)) {
            return $this->failValidationErrors($this->validator->getErrors());
        }

        try {
            $startTime = Time::parse($payload['starts_at']);
        } catch (Throwable $e) {
            return $this->failValidationErrors(['starts_at' => 'Invalid starts_at value']);
        }

        $endsAt = null;
        if (! empty($payload['ends_at'])) {
            try {
                $endsAt = Time::parse($payload['ends_at'])->toDateTimeString();
            } catch (Throwable $e) {
                return $this->failValidationErrors(['ends_at' => 'Invalid ends_at value']);
            }
        }

        $creator = $this->esportsModel->getCreatorById((int) $payload['creator_id']);
        if ($creator === null) {
            return $this->respond([
                'status'  => 'error',
                'message' => 'Creator not found',
            ], ResponseInterface::HTTP_NOT_FOUND);
        }

        $buyIn = (int) $payload['buy_in_cents'];
        if ($buyIn < 0) {
            return $this->failValidationErrors(['buy_in_cents' => 'Must be positive']);
        }

        if ($this->maxPoolCents > 0 && ! empty($payload['max_entrants'])) {
            $projected = $buyIn * (int) $payload['max_entrants'];
            if ($projected > $this->maxPoolCents) {
                return $this->respond([
                    'status'  => 'error',
                    'message' => 'Event pool cap exceeds configured maximum',
                ], ResponseInterface::HTTP_BAD_REQUEST);
            }
        }

        $status = $startTime->isFuture() ? 'open' : 'draft';
        if (! empty($payload['status'])) {
            $allowed = ['draft','open','locked','in_progress','completed','canceled','disputed'];
            if (in_array($payload['status'], $allowed, true)) {
                $status = $payload['status'];
            }
        }

        $eventData = [
            'project_id'        => ! empty($payload['project_id']) ? (int) $payload['project_id'] : null,
            'creator_id'        => (int) $payload['creator_id'],
            'title'             => trim($payload['title']),
            'game_title'        => trim($payload['game_title']),
            'platform'          => trim($payload['platform'] ?? 'PC'),
            'format'            => trim($payload['format']),
            'description'       => $payload['description'] ?? null,
            'buy_in_cents'      => $buyIn,
            'currency'          => $payload['currency'] ?? 'MyMIGold',
            'max_entrants'      => isset($payload['max_entrants']) ? (int) $payload['max_entrants'] : null,
            'starts_at'         => $startTime->toDateTimeString(),
            'ends_at'           => $endsAt,
            'status'            => $status,
            'rake_bps'          => isset($payload['rake_bps']) ? (int) $payload['rake_bps'] : (int) env('ESPORTS_DEFAULT_RAKE_BPS', 1000),
            'creator_bps'       => isset($payload['creator_bps']) ? (int) $payload['creator_bps'] : (int) env('ESPORTS_DEFAULT_CREATOR_BPS', 7000),
            'sponsor_bps'       => isset($payload['sponsor_bps']) ? (int) $payload['sponsor_bps'] : (int) env('ESPORTS_DEFAULT_SPONSOR_BPS', 0),
            'webhook_source'    => $payload['webhook_source'] ?? env('ESPORTS_WEBHOOK_SOURCE', 'startgg'),
            'external_event_id' => $payload['external_event_id'] ?? null,
        ];

        try {
            $this->db->transException(true)->transStart();
            $eventId = $this->esportsModel->createEvent($eventData);
            $this->esportsModel->createPool([
                'event_id'       => $eventId,
                'currency'       => $eventData['currency'],
                'state'          => 'open',
                'total_cents'    => 0,
                'rake_cents'     => 0,
                'net_pool_cents' => 0,
            ]);
            $this->db->transComplete();
        } catch (Throwable $e) {
            if ($this->db->transStatus() === false) {
                $this->db->transRollback();
            }
            log_message('error', 'Esports::createEvent failed: {message}', ['message' => $e->getMessage()]);
            return $this->respond([
                'status'  => 'error',
                'message' => 'Unable to create event',
            ], ResponseInterface::HTTP_INTERNAL_SERVER_ERROR);
        }

        $this->logInvocation('createEvent:success', ['event_id' => $eventId] + $payload);

        return $this->respond([
            'status' => 'success',
            'data'   => ['event_id' => $eventId],
        ], ResponseInterface::HTTP_OK);
    }

    public function joinEvent()
    {
        if ($response = $this->guardFeature()) {
            return $response;
        }

        $payload = $this->getRequestPayload();
        $this->logInvocation('joinEvent', $payload);

        $rules = [
            'event_id' => 'required|is_natural_no_zero',
            'user_id'  => 'required|is_natural_no_zero',
            'ign'      => 'permit_empty|string|max_length[120]',
        ];

        if (! $this->validateData($payload, $rules)) {
            return $this->failValidationErrors($this->validator->getErrors());
        }

        $event = $this->esportsModel->getEventWithAggregates((int) $payload['event_id']);
        if (! $event) {
            return $this->respond(['status' => 'error', 'message' => 'Event not found'], ResponseInterface::HTTP_NOT_FOUND);
        }

        if ($event['status'] !== 'open') {
            return $this->respond(['status' => 'error', 'message' => 'Event is not open for entries'], ResponseInterface::HTTP_BAD_REQUEST);
        }

        if (($event['pool_state'] ?? 'open') === 'frozen') {
            return $this->respond(['status' => 'error', 'message' => 'Event pool currently frozen'], ResponseInterface::HTTP_CONFLICT);
        }

        $currentCount = (int) $event['entrant_count'];
        if (! empty($event['max_entrants']) && $currentCount >= (int) $event['max_entrants']) {
            return $this->respond(['status' => 'error', 'message' => 'Event capacity reached'], ResponseInterface::HTTP_BAD_REQUEST);
        }

        if ($this->esportsModel->getEntry((int) $payload['event_id'], (int) $payload['user_id'])) {
            return $this->respond(['status' => 'error', 'message' => 'User already joined the event'], ResponseInterface::HTTP_CONFLICT);
        }

        if (! $this->isAllowedJurisdiction((int) $payload['user_id'])) {
            return $this->respond(['status' => 'error', 'message' => 'Jurisdiction not allowed'], ResponseInterface::HTTP_FORBIDDEN);
        }

        $buyIn = (int) ($event['buy_in_cents'] ?? 0);
        if ($this->requiresKycBlock((int) $payload['user_id'], $buyIn)) {
            return $this->kycRequiredResponse();
        }

        if ($this->maxPoolCents > 0) {
            $projected = (int) ($event['total_cents'] ?? ($currentCount * $buyIn));
            if (($projected + $buyIn) > $this->maxPoolCents) {
                return $this->respond(['status' => 'error', 'message' => 'Prize pool exceeds configured maximum'], ResponseInterface::HTTP_BAD_REQUEST);
            }
        }

        $feeBreakdown = $this->computeFeeBreakdown($buyIn, $event);

        $entryData = [
            'event_id'      => (int) $payload['event_id'],
            'user_id'       => (int) $payload['user_id'],
            'team_name'     => $payload['team_name'] ?? null,
            'ign'           => $payload['ign'] ?? null,
            'fee_cents'     => $buyIn,
            'paid_currency' => $event['currency'] ?? 'MyMIGold',
            'status'        => $this->dryRun ? 'pending' : 'paid',
        ];

        try {
            $this->db->transException(true)->transStart();
            $entryId = $this->esportsModel->createEntry($entryData);
            $this->esportsModel->incrementPoolTotals(
                (int) $payload['event_id'],
                $feeBreakdown['gross'],
                $feeBreakdown['rake'],
                $feeBreakdown['net']
            );
            $this->db->transComplete();
        } catch (Throwable $e) {
            if ($this->db->transStatus() === false) {
                $this->db->transRollback();
            }
            log_message('error', 'Esports::joinEvent failed: {message}', ['message' => $e->getMessage()]);
            return $this->respond(['status' => 'error', 'message' => 'Unable to join event'], ResponseInterface::HTTP_INTERNAL_SERVER_ERROR);
        }

        if (! $this->dryRun) {
            $this->esportsLibrary->lockEntryEscrow(['id' => $entryId] + $entryData);
        }

        $this->logInvocation('joinEvent:success', ['entry_id' => $entryId] + $payload);

        return $this->respond([
            'status' => 'success',
            'data'   => ['entry_id' => $entryId],
        ]);
    }

    public function lockEscrow()
    {
        if ($response = $this->guardFeature()) {
            return $response;
        }

        $payload = $this->getRequestPayload();
        $this->logInvocation('lockEscrow', $payload);

        $rules = [
            'event_id'       => 'required|is_natural_no_zero',
            'program_id'     => 'required|string',
            'escrow_account' => 'required|string',
            'mint_address'   => 'permit_empty|string',
        ];

        if (! $this->validateData($payload, $rules)) {
            return $this->failValidationErrors($this->validator->getErrors());
        }

        $event = $this->esportsModel->getEventWithAggregates((int) $payload['event_id']);
        if (! $event) {
            return $this->respond(['status' => 'error', 'message' => 'Event not found'], ResponseInterface::HTTP_NOT_FOUND);
        }

        if (! in_array($event['status'], ['open', 'locked', 'in_progress'], true)) {
            return $this->respond(['status' => 'error', 'message' => 'Escrow can only be locked for active events'], ResponseInterface::HTTP_BAD_REQUEST);
        }

        try {
            $mint   = $payload['mint_address'] ?? env('MYMIGOLD_SPL_MINT', '');
            $escrow = $this->esportsModel->getEscrowByEvent((int) $payload['event_id']);
            $data   = [
                'event_id'       => (int) $payload['event_id'],
                'program_id'     => $payload['program_id'],
                'escrow_account' => $payload['escrow_account'],
                'mint_address'   => $mint,
                'state'          => 'locked',
            ];

            $this->db->transException(true)->transStart();
            if ($escrow) {
                $this->esportsModel->updateEscrow((int) $payload['event_id'], $data);
            } else {
                $this->esportsModel->createEscrow($data);
            }

            $this->esportsModel->updatePoolByEvent((int) $payload['event_id'], ['state' => 'locked']);
            $this->esportsModel->updateEvent((int) $payload['event_id'], ['status' => 'locked']);
            $this->db->transComplete();
        } catch (Throwable $e) {
            if ($this->db->transStatus() === false) {
                $this->db->transRollback();
            }
            log_message('error', 'Esports::lockEscrow failed: {message}', ['message' => $e->getMessage()]);
            return $this->respond(['status' => 'error', 'message' => 'Unable to lock escrow'], ResponseInterface::HTTP_INTERNAL_SERVER_ERROR);
        }

        if (! $this->dryRun) {
            $this->esportsLibrary->initEscrowOnSolana($event);
        }

        $this->logInvocation('lockEscrow:success', $payload);

        return $this->respond(['status' => 'success', 'message' => 'Escrow locked']);
    }

    public function cancelEvent()
    {
        if ($response = $this->guardFeature()) {
            return $response;
        }

        $payload = $this->getRequestPayload();
        $this->logInvocation('cancelEvent', $payload);

        $rules = [
            'event_id' => 'required|is_natural_no_zero',
        ];

        if (! $this->validateData($payload, $rules)) {
            return $this->failValidationErrors($this->validator->getErrors());
        }

        try {
            $this->db->transException(true)->transStart();
            $this->esportsModel->updateEvent((int) $payload['event_id'], ['status' => 'canceled']);
            $this->esportsModel->updatePoolByEvent((int) $payload['event_id'], ['state' => 'open']);
            $this->esportsModel->updateEscrow((int) $payload['event_id'], ['state' => 'canceled']);
            $this->db->transComplete();
        } catch (Throwable $e) {
            if ($this->db->transStatus() === false) {
                $this->db->transRollback();
            }
            log_message('error', 'Esports::cancelEvent failed: {message}', ['message' => $e->getMessage()]);
            return $this->respond(['status' => 'error', 'message' => 'Unable to cancel event'], ResponseInterface::HTTP_INTERNAL_SERVER_ERROR);
        }

        if ($this->refundsEnabled) {
            $this->esportsModel->queueJob('REFUND', ['event_id' => (int) $payload['event_id']]);
        }

        $this->logInvocation('cancelEvent:success', $payload);

        return $this->respond(['status' => 'success', 'message' => 'Event canceled']);
    }

    public function receiveResultWebhook()
    {
        if ($response = $this->guardFeature()) {
            return $response;
        }

        $payloadRaw = $this->request->getBody() ?? '';
        $headers = [];
        foreach ($this->request->headers() as $name => $header) {
            $headers[$name] = $header->getValueLine();
        }
        $this->logInvocation('receiveResultWebhook', ['size' => strlen($payloadRaw)]);

        $data = json_decode($payloadRaw, true) ?? [];
        $eventId = isset($data['event_id']) ? (int) $data['event_id'] : null;
        $externalEventId = $data['external_event_id'] ?? null;
        $source = $data['source'] ?? env('ESPORTS_WEBHOOK_SOURCE', 'startgg');

        $digest = hash('sha256', $payloadRaw);
        $existing = $this->esportsModel->getWebhookByDigest($digest);
        if ($existing && (int) ($existing['processed'] ?? 0) === 1) {
            return $this->respond(['status' => 'success', 'message' => 'Webhook already processed']);
        }

        $isValid = $this->esportsLibrary->verifyWebhookSignature($headers, $payloadRaw);
        if (! $isValid && $this->webhookStrict) {
            log_message('error', 'Esports::receiveResultWebhook signature verification failed.');
            return $this->respond(['status' => 'error', 'message' => 'Invalid signature'], ResponseInterface::HTTP_UNAUTHORIZED);
        }

        try {
            if ($existing) {
                $webhookId = (int) $existing['id'];
            } else {
                $webhookId = $this->esportsModel->logWebhook([
                    'event_id'          => $eventId,
                    'source'            => $source,
                    'external_event_id' => $externalEventId,
                    'signature_valid'   => $isValid ? 1 : 0,
                    'payload'           => $payloadRaw,
                    'payload_digest'    => $digest,
                ]);
            }
        } catch (Throwable $e) {
            log_message('error', 'Esports::receiveResultWebhook failed to log webhook: {message}', ['message' => $e->getMessage()]);
            return $this->respond(['status' => 'error', 'message' => 'Failed to log webhook'], ResponseInterface::HTTP_INTERNAL_SERVER_ERROR);
        }

        if (! $isValid) {
            log_message('warning', 'Esports::receiveResultWebhook signature invalid but accepted due to relaxed mode', ['webhook_id' => $webhookId]);
        }

        $this->esportsModel->queueJob('PROCESS_WEBHOOK', [
            'webhook_id' => $webhookId,
            'event_id'   => $eventId,
        ]);

        return $this->respond(['status' => 'success', 'message' => 'Webhook enqueued']);
    }

    public function settlePayouts()
    {
        if ($response = $this->guardFeature()) {
            return $response;
        }

        $payload = $this->getRequestPayload();
        $this->logInvocation('settlePayouts', $payload);

        $rules = [
            'event_id' => 'required|is_natural_no_zero',
        ];

        if (! $this->validateData($payload, $rules)) {
            return $this->failValidationErrors($this->validator->getErrors());
        }

        $eventId = (int) $payload['event_id'];
        $providedPayouts = null;

        if (! empty($payload['payouts']) && is_array($payload['payouts'])) {
            $providedPayouts = $payload['payouts'];
        }

        try {
            $result = $this->handleSettlement($eventId, $providedPayouts, $providedPayouts !== null, true);
        } catch (RuntimeException $e) {
            if ($e->getMessage() === 'KYC_REQUIRED') {
                return $this->kycRequiredResponse();
            }

            log_message('error', 'Esports::settlePayouts runtime failure: {message}', ['message' => $e->getMessage()]);

            return $this->respond([
                'status'  => 'error',
                'message' => 'Unable to settle payouts',
            ], ResponseInterface::HTTP_INTERNAL_SERVER_ERROR);
        } catch (InvalidArgumentException $e) {
            $code = strtolower($e->getMessage()) === 'event or pool not found'
                ? ResponseInterface::HTTP_NOT_FOUND
                : ResponseInterface::HTTP_BAD_REQUEST;

            return $this->respond([
                'status'  => 'error',
                'message' => $e->getMessage(),
            ], $code);
        } catch (DomainException $e) {
            return $this->respond([
                'status'  => 'error',
                'message' => $e->getMessage(),
            ], ResponseInterface::HTTP_CONFLICT);
        } catch (Throwable $e) {
            log_message('error', 'Esports::settlePayouts unexpected failure: {message}', ['message' => $e->getMessage()]);

            return $this->respond([
                'status'  => 'error',
                'message' => 'Unable to settle payouts',
            ], ResponseInterface::HTTP_INTERNAL_SERVER_ERROR);
        }

        $this->logInvocation('settlePayouts:success', $payload);

        return $this->respond([
            'status'  => 'success',
            'message' => $result['message'] ?? 'Payouts settlement initiated',
        ]);
    }

    public function cronProcessJobs()
    {
        if ($response = $this->guardFeature()) {
            return $response;
        }

        $tokenHeader = $this->request->getHeaderLine('X-CRON-TOKEN');
        $cronToken = (string) env('CRON_ACCESS_TOKEN');
        if (empty($tokenHeader) || $cronToken === '' || ! hash_equals($cronToken, $tokenHeader)) {
            return $this->respond(['status' => 'error', 'message' => 'Forbidden'], ResponseInterface::HTTP_FORBIDDEN);
        }

        $jobs = $this->esportsModel->fetchQueuedJobs(['PROCESS_WEBHOOK', 'SETTLE_PAYOUTS', 'REFUND'], $this->cronBatchSize);
        $this->logInvocation('cronProcessJobs', [
            'job_count'   => count($jobs),
            'batch_limit' => $this->cronBatchSize,
        ]);

        if (empty($jobs)) {
            return $this->respond(['status' => 'success', 'processed' => 0]);
        }

        $processed = 0;
        foreach ($jobs as $job) {
            $jobId    = (int) ($job['id'] ?? 0);
            $payload  = json_decode($job['payload'] ?? '[]', true) ?? [];
            $attempts = (int) ($job['attempts'] ?? 0);

            $this->esportsModel->markJobRunning($jobId);

            try {
                switch (strtoupper($job['job_type'] ?? '')) {
                    case 'PROCESS_WEBHOOK':
                        $this->processWebhookJob($payload);
                        break;
                    case 'SETTLE_PAYOUTS':
                        $this->processSettlePayoutsJob($payload);
                        break;
                    case 'REFUND':
                        $this->processRefundJob($payload);
                        break;
                    default:
                        throw new \RuntimeException('Unknown job type: ' . ($job['job_type'] ?? ''));
                }

                $this->esportsModel->markJobResult($jobId, 'done');
                $processed++;
            } catch (Throwable $e) {
                $errorMsg    = substr($e->getMessage(), 0, 250);
                $nextDelay   = null;
                $shouldRetry = ($attempts + 1) < $this->maxJobAttempts;

                log_message('error', 'Esports::cronProcessJobs job failed {id}: {error}', [
                    'id'    => $jobId,
                    'type'  => $job['job_type'] ?? 'unknown',
                    'error' => $errorMsg,
                ]);

                if ($shouldRetry) {
                    $nextDelay = $this->calculateBackoffDelay($attempts + 1);
                    $this->esportsModel->rescheduleJob($jobId, $nextDelay, $errorMsg);
                } else {
                    $this->esportsModel->markJobResult($jobId, 'failed', $errorMsg);
                }

                if (strtoupper($job['job_type'] ?? '') === 'PROCESS_WEBHOOK' && isset($payload['webhook_id'])) {
                    $this->handleWebhookFailure((int) $payload['webhook_id'], $errorMsg, $nextDelay);
                }
            }

            usleep(5000);
        }

        return $this->respond(['status' => 'success', 'processed' => $processed]);
    }

    public function getEvent($id = null)
    {
        if ($response = $this->guardFeature()) {
            return $response;
        }

        $eventId = is_numeric($id) ? (int) $id : 0;
        $this->logInvocation('getEvent', ['event_id' => $eventId]);

        if ($eventId <= 0) {
            return $this->failValidationErrors(['id' => 'Invalid event id']);
        }

        $event = $this->esportsModel->getEventWithAggregates($eventId);
        if (! $event) {
            return $this->respond(['status' => 'error', 'message' => 'Event not found'], ResponseInterface::HTTP_NOT_FOUND);
        }

        return $this->respond(['status' => 'success', 'data' => $event]);
    }

    public function listEvents()
    {
        if ($response = $this->guardFeature()) {
            return $response;
        }

        $filters = [
            'status'      => $this->request->getGet('status'),
            'game'        => $this->request->getGet('game'),
            'date'        => $this->request->getGet('date'),
            'creator_id'  => $this->request->getGet('creator_id'),
        ];
        $this->logInvocation('listEvents', array_filter($filters, static fn($v) => $v !== null));

        $events = $this->esportsModel->listEvents($filters);
        return $this->respond(['status' => 'success', 'data' => $events]);
    }

    private function processSettlePayoutsJob(array $payload): void
    {
        $eventId = (int) ($payload['event_id'] ?? 0);
        if ($eventId <= 0) {
            throw new InvalidArgumentException('event_id missing for settlement job');
        }

        $provided = isset($payload['payouts']) && is_array($payload['payouts']) ? $payload['payouts'] : null;
        $allowCreate = $provided !== null;
        $markComplete = array_key_exists('mark_complete', $payload)
            ? (bool) $payload['mark_complete']
            : true;

        $result = $this->handleSettlement($eventId, $provided, $allowCreate, $markComplete);

        log_message('info', 'Esports::processSettlePayoutsJob completed', [
            'event_id' => $eventId,
            'dry_run'  => $this->dryRun ? 1 : 0,
            'message'  => $result['message'] ?? null,
        ]);
    }

    private function processRefundJob(array $payload): void
    {
        if (! $this->refundsEnabled) {
            log_message('info', 'Esports::processRefundJob skipped - refunds disabled');
            return;
        }

        $eventId = (int) ($payload['event_id'] ?? 0);
        if ($eventId <= 0) {
            throw new InvalidArgumentException('event_id missing for refund job');
        }

        $event = $this->esportsModel->getEventWithAggregates($eventId);
        $pool  = $this->esportsModel->getPoolByEvent($eventId);

        if (! $event || ! $pool) {
            throw new InvalidArgumentException('Event or pool not found for refund job');
        }

        $entries = $this->esportsModel->getEntriesForEvent($eventId, ['pending', 'paid', 'checked_in']);
        if (empty($entries)) {
            log_message('info', 'Esports::processRefundJob nothing to refund', ['event_id' => $eventId]);
            return;
        }

        try {
            $this->db->transException(true)->transStart();

            foreach ($entries as $entry) {
                $this->esportsModel->updateEntry((int) $entry['id'], ['status' => 'refunded']);
            }

            $this->esportsModel->updatePoolByEvent($eventId, ['state' => 'open']);
            $this->esportsModel->resetPoolTotals($eventId);
            $this->esportsModel->updateEvent($eventId, ['status' => 'canceled']);

            $this->db->transComplete();
        } catch (Throwable $e) {
            if ($this->db->transStatus() === false) {
                $this->db->transRollback();
            }

            throw $e;
        }

        log_message('info', 'Esports::processRefundJob completed', [
            'event_id'         => $eventId,
            'refunded_entries' => count($entries),
        ]);

        if (! $this->dryRun) {
            // TODO: trigger wallet refunds once payment integration is wired.
        }
    }

    private function handleSettlement(int $eventId, ?array $providedPayouts, bool $allowCreate, bool $markComplete): array
    {
        $event = $this->esportsModel->getEventWithAggregates($eventId);
        $pool  = $this->esportsModel->getPoolByEvent($eventId);

        if (! $event || ! $pool) {
            throw new InvalidArgumentException('Event or pool not found');
        }

        if (($pool['state'] ?? 'open') === 'frozen' || ($event['status'] ?? '') === 'disputed') {
            throw new DomainException('Event payouts frozen due to dispute');
        }

        if ($this->settlementGrace > 0) {
            $now       = Time::now();
            $threshold = null;

            if (! empty($event['ends_at'])) {
                try {
                    $threshold = Time::parse($event['ends_at'])->addSeconds($this->settlementGrace);
                } catch (Throwable $e) {
                    $threshold = null;
                }
            }

            if ($threshold === null && ! empty($event['starts_at'])) {
                $status = $event['status'] ?? 'open';
                if (! in_array($status, ['completed', 'canceled', 'disputed'], true)) {
                    try {
                        $threshold = Time::parse($event['starts_at'])->addSeconds($this->settlementGrace);
                    } catch (Throwable $e) {
                        $threshold = null;
                    }
                }
            }

            if ($threshold !== null && $threshold->isAfter($now)) {
                throw new DomainException('Settlement grace window not reached');
            }
        }

        $payoutSource = [];
        if (! empty($providedPayouts)) {
            $payoutSource = $providedPayouts;
        } else {
            $payoutSource = $this->esportsModel->getPayoutsForEvent($eventId);
        }

        if (empty($payoutSource)) {
            throw new InvalidArgumentException('No payouts available to settle');
        }

        $sanitized = [];
        $total     = 0;

        foreach ($payoutSource as $payout) {
            $amount = (int) ($payout['amount_cents'] ?? 0);
            if ($amount < 0) {
                throw new InvalidArgumentException('Invalid payout amount');
            }

            $userId = null;
            if (isset($payout['user_id']) && $payout['user_id'] !== '' && $payout['user_id'] !== null) {
                $userId = (int) $payout['user_id'];
            }

            if ($userId !== null && $this->requiresKycBlock($userId, $amount)) {
                throw new RuntimeException('KYC_REQUIRED');
            }

            $sanitized[] = [
                'event_id'     => $eventId,
                'user_id'      => $userId,
                'role'         => $payout['role'] ?? 'winner',
                'amount_cents' => $amount,
                'currency'     => $payout['currency'] ?? ($pool['currency'] ?? 'MyMIGold'),
                'notes'        => $payout['notes'] ?? null,
            ];

            $total += $amount;
        }

        $netPool = (int) ($pool['net_pool_cents'] ?? 0);
        if ($netPool > 0 && $total > $netPool) {
            throw new InvalidArgumentException('Payouts exceed available pool');
        }

        try {
            $this->db->transException(true)->transStart();

            if ($allowCreate && $providedPayouts !== null) {
                foreach ($sanitized as $record) {
                    $this->esportsModel->upsertPayout([
                        'event_id' => $record['event_id'],
                        'user_id'  => $record['user_id'],
                        'role'     => $record['role'],
                    ], [
                        'amount_cents' => $record['amount_cents'],
                        'currency'     => $record['currency'],
                        'status'       => 'pending',
                        'notes'        => $this->dryRun ? 'DRY_RUN' : $record['notes'],
                    ]);
                }
            } else {
                $updates = [
                    'status' => $this->dryRun ? 'pending' : 'processing',
                    'notes'  => $this->dryRun ? 'DRY_RUN' : null,
                ];

                $this->esportsModel->updatePayoutsForEvent($eventId, [], $updates);
            }

            if (! $this->dryRun && $markComplete) {
                $this->esportsModel->updatePoolByEvent($eventId, ['state' => 'settled']);
                $this->esportsModel->updateEvent($eventId, ['status' => 'completed']);
            }

            $this->db->transComplete();
        } catch (Throwable $e) {
            if ($this->db->transStatus() === false) {
                $this->db->transRollback();
            }

            throw $e;
        }

        if (! $this->dryRun && $markComplete) {
            $this->esportsLibrary->releaseEscrowOnSettle($event, $sanitized);
        }

        return [
            'message' => $this->dryRun ? 'Payouts recorded in dry-run mode' : 'Payouts settlement initiated',
            'event'   => $event,
            'pool'    => $pool,
            'payouts' => $sanitized,
        ];
    }

    private function requiresKycBlock(int $userId, int $amountCents): bool
    {
        if ($amountCents < $this->kycThresholdCents) {
            return false;
        }

        if (defined('ENVIRONMENT') && ENVIRONMENT === 'testing') {
            return false;
        }

        $user = $this->resolveUserInfo($userId);
        if ($user === null) {
            log_message('warning', 'Esports::requiresKycBlock unable to resolve user info', ['user_id' => $userId]);
            return true;
        }

        $value = strtolower((string) ($user['cuKYCVerified'] ?? ''));
        return ! in_array($value, ['yes', 'verified', 'approved', '1', 'true'], true);
    }

    private function resolveUserInfo(int $userId): ?array
    {
        try {
            $userLibrary = new MyMIUser();
            return $userLibrary->getUserInformation($userId);
        } catch (Throwable $e) {
            log_message('error', 'Esports::resolveUserInfo failed: {message}', ['message' => $e->getMessage()]);
            return null;
        }
    }

    private function isAllowedJurisdiction(int $userId): bool
    {
        // TODO: Integrate geo/age restrictions via compliance service.
        return true;
    }

    private function computeFeeBreakdown(int $buyInCents, array $event): array
    {
        $split = $this->esportsLibrary->computeFeeSplit($event);
        $rake  = (int) floor($buyInCents * ($split['rake_bps'] ?? 0) / 10000);
        $net   = max(0, $buyInCents - $rake);

        return [
            'gross' => $buyInCents,
            'rake'  => $rake,
            'net'   => $net,
        ];
    }

    private function kycRequiredResponse(): ResponseInterface
    {
        return $this->respond([
            'status'        => 'error',
            'message'       => 'KYC verification required before proceeding',
            'requires_kyc'  => true,
        ], ResponseInterface::HTTP_FORBIDDEN);
    }

    private function guardFeature(): ?ResponseInterface
    {
        if (! (bool) env('ESPORTS_ENABLED', false)) {
            return $this->respond([
                'status'  => 'error',
                'message' => 'Esports module disabled',
            ], ResponseInterface::HTTP_SERVICE_UNAVAILABLE);
        }

        if (! Flags::enabled('esports.nexusarena')) {
            return $this->respond([
                'status'  => 'error',
                'message' => 'Esports feature unavailable',
            ], ResponseInterface::HTTP_SERVICE_UNAVAILABLE);
        }

        return null;
    }

    private function getRequestPayload(): array
    {
        $json = $this->request->getJSON(true);
        if (is_array($json)) {
            return $json;
        }

        return $this->request->getPost() ?? [];
    }

    private function logInvocation(string $method, array $payload = []): void
    {
        $encoded = json_encode($payload, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES);
        $payloadSize = is_string($encoded) ? strlen($encoded) : 0;
        $memoryUsage = memory_get_usage(true);
        $actor = $payload['user_id']
            ?? $payload['creator_id']
            ?? $this->request->getHeaderLine('X-USER-ID')
            ?? 'system';
        $eventId = $payload['event_id'] ?? $payload['id'] ?? '-';
        $elapsed = (int) round((microtime(true) - $this->requestStart) * 1000);
        log_message('info', sprintf('Esports::%s actor=%s event=%s payload=%d mem=%d time_ms=%d', $method, $actor, $eventId, $payloadSize, $memoryUsage, $elapsed));
    }

    private function calculateBackoffDelay(int $attempt): int
    {
        $attempt    = max(1, $attempt);
        $exponent   = min($attempt - 1, 5);
        $computed   = $this->jobRetryBase * (2 ** $exponent);

        return min(3600, max($this->jobRetryBase, $computed));
    }

    private function handleWebhookFailure(int $webhookId, string $errorMessage, ?int $retryDelay): void
    {
        $nextAttemptAt = null;

        if ($retryDelay !== null) {
            $nextAttemptAt = Time::now()->addSeconds($retryDelay)->toDateTimeString();
        }

        try {
            $this->esportsModel->markWebhookAttempt(
                $webhookId,
                $errorMessage,
                null,
                $nextAttemptAt
            );
        } catch (Throwable $e) {
            log_message('error', 'Esports::handleWebhookFailure logging failed: {message}', ['message' => $e->getMessage()]);
        }
    }

    private function processWebhookJob(array $payload): void
    {
        $webhookId = (int) ($payload['webhook_id'] ?? 0);
        if ($webhookId <= 0) {
            throw new \InvalidArgumentException('webhook_id missing');
        }

        $webhook = $this->esportsModel->getWebhookById($webhookId);
        if (! $webhook) {
            throw new \RuntimeException('Webhook not found for job');
        }

        if ((int) ($webhook['processed'] ?? 0) === 1) {
            return;
        }

        $rawPayload = $webhook['payload'] ?? '';
        $data = json_decode($rawPayload, true) ?? [];
        $eventId = (int) ($payload['event_id'] ?? $webhook['event_id'] ?? 0);

        try {
            $this->db->transException(true)->transStart();

            if ($eventId > 0) {
                $status = $data['status'] ?? 'completed';
                $newStatus = $status === 'disputed' ? 'disputed' : 'completed';
                $this->esportsModel->updateEvent($eventId, ['status' => $newStatus]);
            }

            if ($eventId > 0 && ! empty($data['winners']) && is_array($data['winners'])) {
                foreach ($data['winners'] as $winner) {
                    if (! isset($winner['user_id'], $winner['amount_cents'])) {
                        continue;
                    }

                    $this->esportsModel->upsertPayout([
                        'event_id' => $eventId,
                        'user_id'  => (int) $winner['user_id'],
                        'role'     => $winner['role'] ?? 'winner',
                    ], [
                        'amount_cents' => (int) $winner['amount_cents'],
                        'currency'     => $winner['currency'] ?? 'MyMIGold',
                        'status'       => 'pending',
                        'notes'        => $winner['notes'] ?? null,
                    ]);
                }
            }

            $this->esportsModel->markWebhookProcessed($webhookId);
            $this->db->transComplete();
        } catch (Throwable $e) {
            if ($this->db->transStatus() === false) {
                $this->db->transRollback();
            }
            throw $e;
        }
    }
}
