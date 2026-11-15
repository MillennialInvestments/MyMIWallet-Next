<?php

declare(strict_types=1);

namespace Tests\Unit\Forms;

use App\Services\Forms\SupportRequestService;
use CodeIgniter\Test\CIUnitTestCase;

/**
 * GT-FORM-ROUTES-001: support request and article feedback forms.
 */
final class SupportRequestServiceTest extends CIUnitTestCase
{
    protected function setUp(): void
    {
        parent::setUp();
        db_connect()->query('DROP TABLE IF EXISTS bf_fs_support');
        db_connect()->query('CREATE TABLE bf_fs_support (id INTEGER PRIMARY KEY AUTOINCREMENT, user_id INTEGER NULL, email TEXT, name TEXT, details TEXT, date TEXT, time TEXT, status TEXT, topic TEXT)');
    }

    protected function tearDown(): void
    {
        db_connect()->query('DROP TABLE IF EXISTS bf_fs_support');
        parent::tearDown();
    }

    private function service(): SupportRequestService
    {
        return new SupportRequestService(null, 'bf_fs_support');
    }

    public function testStoresPendingRequestWithSessionIdentityOnly(): void
    {
        $result = $this->service()->submit(42, 'owner@example.test', [
            'user_id' => 1, 'email' => 'spoof@example.test', 'name' => 'Pat', 'subject' => 'Billing', 'details' => 'My card was charged twice.',
        ]);

        $this->assertTrue($result['ok']);
        $row = db_connect()->table('bf_fs_support')->where('id', $result['id'])->get()->getRowArray();
        $this->assertSame(42, (int) $row['user_id']);
        $this->assertSame('owner@example.test', $row['email']);
        $this->assertSame('Billing', $row['topic']);
        $this->assertSame('Pending', $row['status']);
    }

    public function testGuestNeedsValidEmailAndDetails(): void
    {
        $result = $this->service()->submit(null, null, ['email' => 'nope', 'details' => 'hi']);
        $this->assertFalse($result['ok']);
        $this->assertSame(['email', 'details'], array_keys($result['errors']));
        $this->assertSame(0, db_connect()->table('bf_fs_support')->countAllResults());
    }

    public function testGuestRequestHasNoUserAndDefaultTopic(): void
    {
        $result = $this->service()->submit(null, null, ['email' => 'Guest@Example.test', 'subject' => 'Select-An-Option', 'details' => '<b>Login</b> fails']);
        $row = db_connect()->table('bf_fs_support')->where('id', $result['id'])->get()->getRowArray();
        $this->assertNull($row['user_id']);
        $this->assertSame('guest@example.test', $row['email']);
        $this->assertSame('General', $row['topic']);
        $this->assertSame('Login fails', $row['details']);
    }
}
