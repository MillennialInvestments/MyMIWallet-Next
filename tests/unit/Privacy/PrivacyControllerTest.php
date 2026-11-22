<?php

declare(strict_types=1);

namespace Tests\Unit\Privacy;

use App\Commands\Privacy\Purge;
use App\Models\AuditLogModel;
use App\Models\PrivacyRequestModel;
use App\Modules\User\Controllers\PrivacyController;
use CodeIgniter\Test\CIUnitTestCase;

/**
 * MYMI-GTM-045: Certify privacy export, erasure, and retention.
 */
final class PrivacyControllerTest extends CIUnitTestCase
{
    private const UID = 7701;
    private const OTHER_UID = 7702;

    protected function setUp(): void
    {
        parent::setUp();
        helper('audit');
        $db = db_connect();

        $db->query('DROP TABLE IF EXISTS bf_privacy_requests');
        $db->query('DROP TABLE IF EXISTS privacy_requests');
        $db->query('CREATE TABLE bf_privacy_requests (
            id INTEGER PRIMARY KEY AUTOINCREMENT,
            user_id INTEGER,
            type TEXT,
            status TEXT DEFAULT "pending",
            notes TEXT NULL,
            result_path TEXT NULL,
            created_at TEXT NULL,
            updated_at TEXT NULL
        )');
        $db->query('CREATE TABLE privacy_requests AS SELECT * FROM bf_privacy_requests WHERE 1=0');

        $db->query('DROP TABLE IF EXISTS bf_users');
        $db->query('DROP TABLE IF EXISTS users');
        $db->query('CREATE TABLE bf_users (
            id INTEGER PRIMARY KEY AUTOINCREMENT,
            email TEXT,
            username TEXT,
            password_hash TEXT NULL,
            active INTEGER DEFAULT 1,
            deleted_at TEXT NULL,
            created_at TEXT NULL
        )');
        $db->query('CREATE TABLE users AS SELECT * FROM bf_users WHERE 1=0');

        $db->query('DROP TABLE IF EXISTS bf_users_wallet');
        $db->query('CREATE TABLE bf_users_wallet (
            id INTEGER PRIMARY KEY AUTOINCREMENT,
            user_id INTEGER,
            amount NUMERIC DEFAULT 0,
            credentials TEXT NULL,
            account_number TEXT NULL,
            nickname TEXT NULL
        )');

        $db->query('DROP TABLE IF EXISTS bf_audit_logs');
        $db->query('CREATE TABLE bf_audit_logs (
            id INTEGER PRIMARY KEY AUTOINCREMENT,
            event TEXT,
            actor_id INTEGER NULL,
            target TEXT NULL,
            meta_json TEXT NULL,
            ip_address TEXT NULL,
            user_agent TEXT NULL,
            created_at TEXT NULL
        )');

        // Seed test users
        $db->table('bf_users')->insert([
            'id'            => self::UID,
            'email'         => 'alice@example.com',
            'username'      => 'alice',
            'password_hash' => 'hash_alice',
            'active'        => 1,
        ]);
        $db->table('bf_users')->insert([
            'id'            => self::OTHER_UID,
            'email'         => 'bob@example.com',
            'username'      => 'bob',
            'password_hash' => 'hash_bob',
            'active'        => 1,
        ]);

        $db->table('bf_users_wallet')->insert([
            'user_id'        => self::UID,
            'amount'         => 150.00,
            'credentials'    => 'secret_token_123',
            'account_number' => '1111222233334444',
            'nickname'       => 'Alice Savings',
        ]);

        $exportDir = WRITEPATH . 'exports/privacy/';
        if (! is_dir($exportDir)) {
            mkdir($exportDir, 0755, true);
        }

        session()->remove('cuID');
        session()->remove('user_id');
        $_SESSION = [];
    }

    protected function tearDown(): void
    {
        $db = db_connect();
        $db->query('DROP TABLE IF EXISTS bf_privacy_requests');
        $db->query('DROP TABLE IF EXISTS privacy_requests');
        $db->query('DROP TABLE IF EXISTS bf_users');
        $db->query('DROP TABLE IF EXISTS users');
        $db->query('DROP TABLE IF EXISTS bf_users_wallet');
        $db->query('DROP TABLE IF EXISTS bf_audit_logs');

        // Clean up test export files
        $exportDir = WRITEPATH . 'exports/privacy/';
        if (is_dir($exportDir)) {
            $files = glob($exportDir . 'export-test-*.json') ?: [];
            foreach ($files as $f) {
                @unlink($f);
            }
        }

        session()->remove('cuID');
        session()->remove('user_id');
        $_SESSION = [];
        parent::tearDown();
    }

    private function createController(): PrivacyController
    {
        $controller = new PrivacyController();
        $response = service('response')->setStatusCode(200);
        $controller->initController(service('request'), $response, service('logger'));
        return $controller;
    }

    /* -------------------------------------------------------------------------
     * Privacy Requests Status & IDOR Protection
     * ------------------------------------------------------------------------- */

    public function testStatusReturnsForbiddenForUnauthenticatedViewer(): void
    {
        session()->remove('cuID');
        $_SESSION = [];
        $controller = $this->createController();
        $response = $controller->status();
        $this->assertSame(403, $response->getStatusCode());
    }

    public function testStatusReturnsOnlyRequesterOwnPrivacyRequests(): void
    {
        $db = db_connect();
        $db->table('bf_privacy_requests')->insert([
            'user_id'    => self::UID,
            'type'       => 'export',
            'status'     => 'done',
            'created_at' => date('Y-m-d H:i:s'),
        ]);
        $db->table('bf_privacy_requests')->insert([
            'user_id'    => self::OTHER_UID,
            'type'       => 'export',
            'status'     => 'done',
            'created_at' => date('Y-m-d H:i:s'),
        ]);

        session()->set('cuID', self::UID);
        $_SESSION['cuID'] = self::UID;
        $controller = $this->createController();
        $response = $controller->status();

        $this->assertSame(200, $response->getStatusCode());
        $body = json_decode((string) $response->getBody(), true);
        $this->assertSame('success', $body['status']);
        $requests = $body['data']['requests'];
        $this->assertCount(1, $requests);
    }

    /* -------------------------------------------------------------------------
     * Privacy Export Generation & Rate Limiting
     * ------------------------------------------------------------------------- */

    public function testRequestExportGeneratesFileAndEnforcesHourlyRateLimit(): void
    {
        session()->set('cuID', self::UID);
        $_SESSION['cuID'] = self::UID;
        $controller = $this->createController();

        // 1. Initial request generates export
        $response = $controller->requestExport();
        $this->assertSame(200, $response->getStatusCode());
        $body = json_decode((string) $response->getBody(), true);
        $this->assertSame('success', $body['status']);
        $requestId = $body['data']['request_id'];
        $this->assertGreaterThan(0, $requestId);

        // 2. Second request within 1 hour is rate limited with 400
        $rateLimitedResponse = $controller->requestExport();
        $this->assertSame(400, $rateLimitedResponse->getStatusCode());
        $rateBody = json_decode((string) $rateLimitedResponse->getBody(), true);
        $this->assertStringContainsString('last hour', $rateBody['message']);
    }

    /* -------------------------------------------------------------------------
     * Download IDOR & Expiration Protection
     * ------------------------------------------------------------------------- */

    public function testDownloadBlocksUnrelatedUsersFromAccessingOtherExports(): void
    {
        $db = db_connect();
        $db->table('bf_privacy_requests')->insert([
            'user_id'     => self::UID,
            'type'        => 'export',
            'status'      => 'done',
            'result_path' => 'export-test-alice.json',
            'created_at'  => date('Y-m-d H:i:s'),
        ]);
        $reqId = (int) $db->insertID();

        // Create dummy export file
        $file = WRITEPATH . 'exports/privacy/export-test-alice.json';
        file_put_contents($file, json_encode(['account' => ['email' => 'alice@example.com']]));

        try {
            // Bob attempts to download Alice's export: DENIED (404 Not Found to prevent enumeration)
            session()->set('cuID', self::OTHER_UID);
            $_SESSION['cuID'] = self::OTHER_UID;
            $controller = $this->createController();
            $response = $controller->download($reqId);
            $this->assertSame(404, $response->getStatusCode());
        } finally {
            @unlink($file);
        }
    }

    public function testDownloadReturns410WhenExportFileIsExpired(): void
    {
        $file = WRITEPATH . 'exports/privacy/export-test-expired.json';
        file_put_contents($file, json_encode(['expired' => true]));
        // Set file modification time to 10 days ago (past the 7-day retention)
        touch($file, time() - (10 * 86400));

        $db = db_connect();
        $db->table('bf_privacy_requests')->insert([
            'user_id'     => self::UID,
            'type'        => 'export',
            'status'      => 'done',
            'result_path' => 'export-test-expired.json',
            'created_at'  => date('Y-m-d H:i:s', time() - (10 * 86400)),
        ]);
        $reqId = (int) $db->insertID();

        try {
            session()->set('cuID', self::UID);
            $_SESSION['cuID'] = self::UID;
            $controller = $this->createController();
            $response = $controller->download($reqId);
            $this->assertSame(410, $response->getStatusCode());
            $this->assertStringContainsString('expired', (string) $response->getBody());
        } finally {
            @unlink($file);
        }
    }

    /* -------------------------------------------------------------------------
     * Erasure Request & Admin Approval Lifecycle
     * ------------------------------------------------------------------------- */

    public function testErasureRequestAndAdminApprovalPseudonymizesUser(): void
    {
        session()->set('cuID', self::UID);
        $_SESSION['cuID'] = self::UID;
        $controller = $this->createController();

        // 1. User submits erasure request
        $response = $controller->requestErasure();
        $this->assertSame(200, $response->getStatusCode());
        $body = json_decode((string) $response->getBody(), true);
        $reqId = $body['data']['request_id'];

        // 2. Submitting duplicate pending request is idempotent
        $dupResponse = $controller->requestErasure();
        $this->assertSame(200, $dupResponse->getStatusCode());
        $dupBody = json_decode((string) $dupResponse->getBody(), true);
        $this->assertStringContainsString('already being reviewed', $dupBody['message']);

        // 3. Admin approves erasure
        $adminController = $this->createController();
        $approveResponse = $adminController->adminApproveErasure($reqId);
        $this->assertSame(200, $approveResponse->getStatusCode());

        // 4. Verify user data pseudonymized while balance is preserved
        $db = db_connect();
        $user = $db->table('bf_users')->where('id', self::UID)->get()->getRowArray();
        $this->assertStringStartsWith('deleted+', $user['email']);
        $this->assertNull($user['password_hash']);
        $this->assertSame(0, (int) $user['active']);

        $wallet = $db->table('bf_users_wallet')->where('user_id', self::UID)->get()->getRowArray();
        $this->assertNull($wallet['credentials']);
        $this->assertNull($wallet['account_number']);
        $this->assertEqualsWithDelta(150.00, (float) $wallet['amount'], 0.01);

        // 5. Verify privacy request status marked as done
        $req = $db->table('bf_privacy_requests')->where('id', $reqId)->get()->getRowArray();
        $this->assertSame('done', $req['status']);
    }

    public function testAdminRejectErasureRecordsReasonAndSetsStatus(): void
    {
        $db = db_connect();
        $db->table('bf_privacy_requests')->insert([
            'user_id'    => self::OTHER_UID,
            'type'       => 'erase',
            'status'     => 'pending',
            'created_at' => date('Y-m-d H:i:s'),
        ]);
        $reqId = (int) $db->insertID();

        $_POST['reason'] = 'Active regulatory compliance hold';
        service('request')->setGlobal('post', ['reason' => 'Active regulatory compliance hold']);

        $adminController = $this->createController();
        $rejectResponse = $adminController->adminRejectErasure($reqId);
        $this->assertSame(200, $rejectResponse->getStatusCode());

        $req = $db->table('bf_privacy_requests')->where('id', $reqId)->get()->getRowArray();
        $this->assertSame('rejected', $req['status']);
        $this->assertSame('Active regulatory compliance hold', $req['notes']);
    }

    /* -------------------------------------------------------------------------
     * Spark Command: privacy:purge
     * ------------------------------------------------------------------------- */

    public function testPrivacyPurgeDeletesExpiredFilesAndUpdatesRecords(): void
    {
        $dir = WRITEPATH . 'exports/privacy/';
        $expiredFile = $dir . 'export-test-purge-old.json';
        $freshFile = $dir . 'export-test-purge-fresh.json';

        file_put_contents($expiredFile, json_encode(['test' => 'old']));
        file_put_contents($freshFile, json_encode(['test' => 'fresh']));

        // Make old file 10 days old
        touch($expiredFile, time() - (10 * 86400));
        // Keep fresh file current
        touch($freshFile, time());

        $db = db_connect();
        $db->table('bf_privacy_requests')->insert([
            'user_id'     => self::UID,
            'type'        => 'export',
            'status'      => 'done',
            'result_path' => 'export-test-purge-old.json',
            'created_at'  => date('Y-m-d H:i:s', time() - (10 * 86400)),
        ]);
        $oldReqId = (int) $db->insertID();

        $db->table('bf_privacy_requests')->insert([
            'user_id'     => self::UID,
            'type'        => 'export',
            'status'      => 'done',
            'result_path' => 'export-test-purge-fresh.json',
            'created_at'  => date('Y-m-d H:i:s'),
        ]);
        $freshReqId = (int) $db->insertID();

        try {
            $cmd = new Purge(service('logger'), service('commands'));

            // 1. Dry run: counts purgeable files without deleting
            $dryResult = $cmd->purge(false);
            $this->assertSame(1, $dryResult['purgeable']);
            $this->assertSame(0, $dryResult['deleted']);
            $this->assertFalse($dryResult['applied']);
            $this->assertFileExists($expiredFile);

            // 2. Apply run: deletes expired file and marks record expired
            $applyResult = $cmd->purge(true);
            $this->assertSame(1, $applyResult['purgeable']);
            $this->assertSame(1, $applyResult['deleted']);
            $this->assertTrue($applyResult['applied']);
            $this->assertFileDoesNotExist($expiredFile);
            $this->assertFileExists($freshFile);

            // Verify database records
            $oldReq = $db->table('bf_privacy_requests')->where('id', $oldReqId)->get()->getRowArray();
            $this->assertSame('expired', $oldReq['status']);

            $freshReq = $db->table('bf_privacy_requests')->where('id', $freshReqId)->get()->getRowArray();
            $this->assertSame('done', $freshReq['status']);
        } finally {
            @unlink($expiredFile);
            @unlink($freshFile);
        }
    }
}
