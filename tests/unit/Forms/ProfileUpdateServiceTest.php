<?php

declare(strict_types=1);

namespace Tests\Unit\Forms;

use App\Services\Forms\ProfileUpdateService;
use CodeIgniter\Test\CIUnitTestCase;

/**
 * GT-FORM-ROUTES-001: the Account "Update Profile" form.
 */
final class ProfileUpdateServiceTest extends CIUnitTestCase
{
    protected function setUp(): void
    {
        parent::setUp();
        $db = db_connect();
        $db->query('DROP TABLE IF EXISTS bf_fu_users');
        // No "phone" column on purpose: unknown columns must be skipped, not fail.
        $db->query('CREATE TABLE bf_fu_users (id INTEGER PRIMARY KEY, email TEXT, username TEXT, ssn TEXT, first_name TEXT, last_name TEXT, display_name TEXT, dob TEXT, address TEXT, city TEXT, state TEXT, zipcode TEXT, country TEXT, mailing_address TEXT)');
        $db->table('fu_users')->insert(['id' => 7, 'email' => 'a@example.test', 'username' => 'alice', 'ssn' => 'X', 'first_name' => 'Al']);
        $db->table('fu_users')->insert(['id' => 8, 'email' => 'b@example.test', 'username' => 'bob', 'first_name' => 'Bo']);
    }

    protected function tearDown(): void
    {
        db_connect()->query('DROP TABLE IF EXISTS bf_fu_users');
        parent::tearDown();
    }

    private function row(int $id): array
    {
        return db_connect()->table('fu_users')->where('id', $id)->get()->getRowArray();
    }

    public function testUpdatesOnlyOwnRowAndWhitelistedFields(): void
    {
        $result = (new ProfileUpdateService(null, 'fu_users'))->update(7, [
            'first_name' => ' Alice ', 'city' => 'Austin', 'phone' => '+1 512 555 0100',
            'email' => 'evil@example.test', 'username' => 'root', 'ssn' => '000', 'id' => 8,
        ]);

        $this->assertTrue($result['ok']);
        $this->assertSame(['first_name', 'city'], $result['updated']);
        $row = $this->row(7);
        $this->assertSame('Alice', $row['first_name']);
        $this->assertSame('Austin', $row['city']);
        $this->assertSame('a@example.test', $row['email']);
        $this->assertSame('alice', $row['username']);
        $this->assertSame('X', $row['ssn']);
        $this->assertSame('Bo', $this->row(8)['first_name']);
    }

    public function testRejectsBadInputWithoutWriting(): void
    {
        $result = (new ProfileUpdateService(null, 'fu_users'))->update(7, [
            'first_name' => '', 'dob' => '2999-01-01', 'phone' => 'call me', 'city' => str_repeat('x', 101),
        ]);

        $this->assertFalse($result['ok']);
        $this->assertSame('invalid_input', $result['reason']);
        $this->assertSame(['city', 'first_name', 'dob', 'phone'], array_keys($result['errors']));
        $this->assertSame('Al', $this->row(7)['first_name']);
    }

    public function testNeedsASignedInUser(): void
    {
        $this->assertSame('unauthenticated', (new ProfileUpdateService(null, 'fu_users'))->update(0, ['city' => 'X'])['reason']);
        $this->assertSame('user_not_found', (new ProfileUpdateService(null, 'fu_users'))->update(99, ['city' => 'X'])['reason']);
    }

    public function testStripsMarkup(): void
    {
        (new ProfileUpdateService(null, 'fu_users'))->update(7, ['display_name' => '<script>x</script>Al']);
        $this->assertSame('xAl', $this->row(7)['display_name']);
    }
}
