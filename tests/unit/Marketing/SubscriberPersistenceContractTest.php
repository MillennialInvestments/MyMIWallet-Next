<?php

declare(strict_types=1);

use App\Models\SubscribeModel;
use CodeIgniter\Test\CIUnitTestCase;
use Config\Database;

final class SubscriberPersistenceContractTest extends CIUnitTestCase
{
    protected function setUp(): void
    {
        parent::setUp();

        $db = Database::connect();

        $db->query('CREATE TABLE IF NOT EXISTS bf_users_subscribers (
            id INTEGER PRIMARY KEY AUTOINCREMENT,
            email VARCHAR(45) NULL,
            referral VARCHAR(45) NULL,
            category VARCHAR(255) NULL,
            subject VARCHAR(255) NULL,
            topic VARCHAR(255) NULL,
            beta INTEGER DEFAULT 0,
            date DATETIME NULL,
            hostTime VARCHAR(45) NULL,
            time VARCHAR(45) NULL,
            user_id INTEGER NULL,
            user_ip VARCHAR(45) NULL,
            initial_sent INTEGER DEFAULT 0,
            status VARCHAR(50) DEFAULT "active",
            delivery_error TEXT NULL,
            updated_at DATETIME NULL,
            unsubscribe_token VARCHAR(255) NULL,
            unsubscribed_at DATETIME NULL
        )');

        $db->query('CREATE TABLE IF NOT EXISTS bf_users_subscriptions (
            id INTEGER PRIMARY KEY AUTOINCREMENT,
            active INTEGER DEFAULT 0,
            user_id INTEGER NOT NULL,
            email VARCHAR(255) NOT NULL,
            subscription_name VARCHAR(255) NULL,
            tier VARCHAR(32) DEFAULT "Free"
        )');

        if (! $db->fieldExists('unsubscribed_at', 'bf_users_subscribers')) {
            $db->query(
                'ALTER TABLE bf_users_subscribers '
                . 'ADD COLUMN unsubscribed_at DATETIME NULL'
            );
        }

        $db->query('DELETE FROM bf_users_subscribers');
        $db->query('DELETE FROM bf_users_subscriptions');
    }

    public function testNewSubscriberNormalizesEmailAndPersistsOptionalUserId(): void
    {
        $result = (new SubscribeModel())->subscribe([
            'email' => '  Trader@Example.COM  ',
            'referral' => 'rev-s002',
            'user_id' => 42,
        ]);

        self::assertTrue($result['success']);
        self::assertSame('created', $result['reason']);

        $row = Database::connect()
            ->table('bf_users_subscribers')
            ->where('email', 'trader@example.com')
            ->get()
            ->getRowArray();

        self::assertNotNull($row);
        self::assertSame('rev-s002', $row['referral']);
        self::assertSame(42, (int) $row['user_id']);
        self::assertSame('active', $row['status']);
        self::assertNotEmpty($row['updated_at']);
    }

    public function testDuplicateEmailIsRejectedWithoutChangingExistingRow(): void
    {
        $model = new SubscribeModel();

        $first = $model->subscribe([
            'email' => 'duplicate@example.com',
            'referral' => 'first',
        ]);

        $second = $model->subscribe([
            'email' => 'DUPLICATE@example.com',
            'referral' => 'second',
        ]);

        self::assertTrue($first['success']);
        self::assertFalse($second['success']);
        self::assertSame('duplicate_email', $second['reason']);

        $db = Database::connect();
        self::assertSame(
            1,
            $db->table('bf_users_subscribers')
                ->where('email', 'duplicate@example.com')
                ->countAllResults()
        );

        $row = $db->table('bf_users_subscribers')
            ->where('email', 'duplicate@example.com')
            ->get()
            ->getRowArray();

        self::assertSame('first', $row['referral']);
    }

    public function testDeliveryAndUnsubscribeLifecycleUsesCanonicalColumns(): void
    {
        $model = new SubscribeModel();

        $created = $model->subscribe([
            'email' => 'lifecycle@example.com',
        ]);

        self::assertTrue($created['success']);
        self::assertTrue(
            $model->updateDeliveryStatus(
                'lifecycle@example.com',
                'bounced',
                'mailbox unavailable'
            )
        );
        self::assertTrue(
            $model->setUnsubscribeToken(
                'lifecycle@example.com',
                'token-rev-s002'
            )
        );
        self::assertTrue(
            $model->unsubscribeByToken('token-rev-s002')
        );

        $row = Database::connect()
            ->table('bf_users_subscribers')
            ->where('email', 'lifecycle@example.com')
            ->get()
            ->getRowArray();

        self::assertSame('unsubscribed', $row['status']);
        self::assertSame('mailbox unavailable', $row['delivery_error']);
        self::assertSame('token-rev-s002', $row['unsubscribe_token']);
        self::assertNotEmpty($row['unsubscribed_at']);
        self::assertNotEmpty($row['updated_at']);
    }

    public function testSubscriberPersistenceDoesNotCreateEntitlementRows(): void
    {
        $result = (new SubscribeModel())->subscribe([
            'email' => 'no-entitlement@example.com',
            'user_id' => 77,
        ]);

        self::assertTrue($result['success']);

        self::assertSame(
            0,
            Database::connect()
                ->table('bf_users_subscriptions')
                ->countAllResults()
        );
    }
}
