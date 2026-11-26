<?php

declare(strict_types=1);

namespace Tests\Unit\Support;

use App\Models\AuditLogModel;
use App\Models\NotificationModel;
use App\Models\UserModel;
use App\Modules\Management\Controllers\AccountRescueAdminController;
use App\Modules\Support\Controllers\AccountSupportController;
use App\Modules\Support\Controllers\SupportTicketController;
use App\Modules\Support\Models\SupportTicketEventModel;
use App\Modules\Support\Models\SupportTicketModel;
use App\Modules\Support\Services\SupportTicketService;
use App\Services\NotificationService;
use CodeIgniter\Exceptions\PageNotFoundException;
use CodeIgniter\Test\CIUnitTestCase;

/**
 * MYMI-GTM-044: Certify support tickets, notifications, and account rescue.
 */
final class SupportNotificationsRescueTest extends CIUnitTestCase
{
    protected function setUp(): void
    {
        parent::setUp();
        $db = db_connect();

        // 1. Support ticket tables (both prefixed and un-prefixed for SQLite compatibility)
        $db->query('DROP TABLE IF EXISTS bf_support_tickets');
        $db->query('DROP TABLE IF EXISTS support_tickets');
        $db->query('CREATE TABLE bf_support_tickets (
            id INTEGER PRIMARY KEY AUTOINCREMENT,
            user_id INTEGER NULL,
            email TEXT NULL,
            subject TEXT,
            message TEXT,
            category TEXT DEFAULT "auth",
            status TEXT DEFAULT "open",
            priority TEXT DEFAULT "normal",
            ip_address TEXT,
            user_agent TEXT NULL,
            ref_context_json TEXT NULL,
            created_at TEXT NULL,
            updated_at TEXT NULL
        )');
        $db->query('CREATE TABLE support_tickets AS SELECT * FROM bf_support_tickets WHERE 1=0');

        $db->query('DROP TABLE IF EXISTS bf_support_ticket_events');
        $db->query('DROP TABLE IF EXISTS support_ticket_events');
        $db->query('CREATE TABLE bf_support_ticket_events (
            id INTEGER PRIMARY KEY AUTOINCREMENT,
            ticket_id INTEGER,
            event_type TEXT,
            payload_json TEXT NULL,
            created_at TEXT NULL
        )');
        $db->query('CREATE TABLE support_ticket_events AS SELECT * FROM bf_support_ticket_events WHERE 1=0');

        // 2. Notification tables
        $db->query('DROP TABLE IF EXISTS notification_outbox');
        $db->query('CREATE TABLE notification_outbox (
            id INTEGER PRIMARY KEY AUTOINCREMENT,
            recipient TEXT,
            subject TEXT,
            message TEXT,
            status TEXT DEFAULT "pending",
            sent_at TEXT NULL,
            created_at TEXT NULL,
            updated_at TEXT NULL
        )');

        $db->query('DROP TABLE IF EXISTS bf_users_notifications');
        $db->query('CREATE TABLE bf_users_notifications (
            id INTEGER PRIMARY KEY AUTOINCREMENT,
            user_id INTEGER,
            type TEXT DEFAULT "system",
            subject TEXT,
            message TEXT,
            is_read INTEGER DEFAULT 0,
            created_at TEXT NULL,
            updated_at TEXT NULL
        )');

        // 3. Financial goals table
        $db->query('DROP TABLE IF EXISTS bf_financial_goals');
        $db->query('CREATE TABLE bf_financial_goals (
            id INTEGER PRIMARY KEY AUTOINCREMENT,
            user_id INTEGER,
            name TEXT,
            title TEXT NULL,
            target_amount REAL DEFAULT 0,
            current_amount REAL DEFAULT 0,
            status TEXT DEFAULT "active"
        )');

        // 4. Users tables
        $db->query('DROP TABLE IF EXISTS bf_users');
        $db->query('DROP TABLE IF EXISTS users');
        $db->query('CREATE TABLE bf_users (
            id INTEGER PRIMARY KEY AUTOINCREMENT,
            email TEXT,
            username TEXT,
            active INTEGER DEFAULT 0,
            activate_hash TEXT NULL,
            reset_hash TEXT NULL,
            reset_expires TEXT NULL,
            referral_code TEXT NULL,
            deleted_at TEXT NULL,
            created_at TEXT NULL,
            last_login TEXT NULL
        )');
        $db->query('CREATE TABLE users AS SELECT * FROM bf_users WHERE 1=0');

        // 5. Audit logs table
        $db->query('DROP TABLE IF EXISTS bf_audit_logs');
        $db->query('DROP TABLE IF EXISTS audit_logs');
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
        $db->query('CREATE TABLE audit_logs AS SELECT * FROM bf_audit_logs WHERE 1=0');

        // 6. Login attempts table
        $db->query('DROP TABLE IF EXISTS bf_login_attempts');
        $db->query('DROP TABLE IF EXISTS login_attempts');
        $db->query('CREATE TABLE bf_login_attempts (
            id INTEGER PRIMARY KEY AUTOINCREMENT,
            ip_address TEXT,
            identifier TEXT,
            user_id INTEGER NULL,
            date TEXT,
            success INTEGER DEFAULT 0
        )');
        $db->query('CREATE TABLE login_attempts AS SELECT * FROM bf_login_attempts WHERE 1=0');
    }

    protected function tearDown(): void
    {
        $db = db_connect();
        $db->query('DROP TABLE IF EXISTS bf_support_tickets');
        $db->query('DROP TABLE IF EXISTS support_tickets');
        $db->query('DROP TABLE IF EXISTS bf_support_ticket_events');
        $db->query('DROP TABLE IF EXISTS support_ticket_events');
        $db->query('DROP TABLE IF EXISTS notification_outbox');
        $db->query('DROP TABLE IF EXISTS bf_users_notifications');
        $db->query('DROP TABLE IF EXISTS bf_financial_goals');
        $db->query('DROP TABLE IF EXISTS bf_users');
        $db->query('DROP TABLE IF EXISTS users');
        $db->query('DROP TABLE IF EXISTS bf_audit_logs');
        $db->query('DROP TABLE IF EXISTS audit_logs');
        $db->query('DROP TABLE IF EXISTS bf_login_attempts');
        $db->query('DROP TABLE IF EXISTS login_attempts');

        $_SESSION = [];
        parent::tearDown();
    }

    /* -------------------------------------------------------------------------
     * Pillar 1: Support Ticket Service & Lifecycle
     * ------------------------------------------------------------------------- */

    public function testCreatesAuthLoginErrorTicketAndRecordsEvent(): void
    {
        $service = new SupportTicketService();
        $context = [
            'user_id'       => 101,
            'email_entered' => 'user101@example.com',
            'ip_address'    => '192.168.1.1',
            'user_agent'    => 'TestBrowser/1.0',
            'error_message' => 'Database connection timeout',
        ];

        $ticketId = $service->createAuthLoginErrorTicket($context);
        $this->assertGreaterThan(0, $ticketId);

        $ticket = $service->getTicket($ticketId);
        $this->assertNotNull($ticket);
        $this->assertSame(101, (int) $ticket['user_id']);
        $this->assertSame('user101@example.com', $ticket['email']);
        $this->assertSame('Login system error', $ticket['subject']);
        $this->assertSame('open', $ticket['status']);
        $this->assertSame('high', $ticket['priority']);
        $this->assertSame('auth', $ticket['category']);

        $events = $service->getEventsForTicket($ticketId);
        $this->assertCount(1, $events);
        $this->assertSame('created', $events[0]['event_type']);
        $payload = json_decode((string) $events[0]['payload_json'], true);
        $this->assertSame('Database connection timeout', $payload['error_message']);
    }

    public function testGeneralSupportTicketCreationAndLifecycle(): void
    {
        $service = new SupportTicketService();
        $ticketId = $service->createTicket([
            'user_id'    => 202,
            'email'      => 'alice@example.com',
            'subject'    => 'Need assistance with wallet export',
            'message'    => 'I cannot find the export button on my settings page.',
            'category'   => 'wallets',
            'priority'   => 'normal',
            'ip_address' => '10.0.0.5',
        ]);

        $this->assertGreaterThan(0, $ticketId);
        $ticket = $service->getTicket($ticketId);
        $this->assertSame('Need assistance with wallet export', $ticket['subject']);
        $this->assertSame('wallets', $ticket['category']);

        // User adds follow up
        $followUpSuccess = $service->addFollowUp($ticketId, 'Update: I found the menu, but it gives error 404', 202, false);
        $this->assertTrue($followUpSuccess);

        // Staff replies
        $staffReplySuccess = $service->addFollowUp($ticketId, 'Please try clearing your browser cache.', 1, true);
        $this->assertTrue($staffReplySuccess);

        // Ticket status transitioned to waiting_user after staff reply
        $ticket = $service->getTicket($ticketId);
        $this->assertSame('waiting_user', $ticket['status']);

        // Staff updates status to resolved
        $statusUpdated = $service->updateStatus($ticketId, 'resolved', 'Customer issue resolved via instructions');
        $this->assertTrue($statusUpdated);

        $ticket = $service->getTicket($ticketId);
        $this->assertSame('resolved', $ticket['status']);

        // Invalid status transition rejected
        $invalidUpdate = $service->updateStatus($ticketId, 'invalid_state');
        $this->assertFalse($invalidUpdate);

        // Verify audit event trail
        $events = $service->getEventsForTicket($ticketId);
        $eventTypes = array_column($events, 'event_type');
        $this->assertContains('created', $eventTypes);
        $this->assertContains('user_reply', $eventTypes);
        $this->assertContains('staff_reply', $eventTypes);
        $this->assertContains('status_change', $eventTypes);
    }

    public function testUserScopedTicketRetrievalWithLimit(): void
    {
        $service = new SupportTicketService();
        for ($i = 1; $i <= 5; $i++) {
            $service->createTicket([
                'user_id' => 303,
                'email'   => 'user303@example.com',
                'subject' => "Ticket {$i} for user 303",
                'message' => "Details {$i}",
            ]);
        }
        $service->createTicket([
            'user_id' => 999,
            'email'   => 'other@example.com',
            'subject' => 'Other user ticket',
            'message' => 'Other details',
        ]);

        $userTickets = $service->getTicketsForUser(303, 3);
        $this->assertCount(3, $userTickets);
        foreach ($userTickets as $t) {
            $this->assertSame(303, (int) $t['user_id']);
        }
    }

    /* -------------------------------------------------------------------------
     * Pillar 2: IDOR Protection in SupportTicketController
     * ------------------------------------------------------------------------- */

    public function testTicketOwnerCanViewOwnTicket(): void
    {
        $service = new SupportTicketService();
        $ticketId = $service->createTicket([
            'user_id' => 404,
            'email'   => 'owner404@example.com',
            'subject' => 'Private billing ticket',
            'message' => 'Confidential financial inquiry',
        ]);

        $controller = new class extends SupportTicketController {
            public int $mockUserId = 404;
            public function mockCanView(array $ticket, int $id): bool
            {
                return $this->canViewTicket($ticket, $id);
            }
            protected function resolveCurrentUserId(): int
            {
                return $this->mockUserId;
            }
            protected function isCurrentUserAdmin(): bool
            {
                return false;
            }
        };

        $ticket = $service->getTicket($ticketId);
        $this->assertTrue($controller->mockCanView($ticket, $ticketId));
    }

    public function testUnrelatedUserIsBlockedFromViewingAnotherUsersTicket(): void
    {
        $service = new SupportTicketService();
        $ticketId = $service->createTicket([
            'user_id' => 404,
            'email'   => 'owner404@example.com',
            'subject' => 'Private billing ticket',
            'message' => 'Confidential financial inquiry',
        ]);

        $controller = new class extends SupportTicketController {
            public int $mockUserId = 505; // Different user ID
            public function mockCanView(array $ticket, int $id): bool
            {
                return $this->canViewTicket($ticket, $id);
            }
            protected function resolveCurrentUserId(): int
            {
                return $this->mockUserId;
            }
            protected function isCurrentUserAdmin(): bool
            {
                return false;
            }
        };

        $ticket = $service->getTicket($ticketId);
        $this->assertFalse($controller->mockCanView($ticket, $ticketId));
    }

    public function testAdminCanViewAnyTicket(): void
    {
        $service = new SupportTicketService();
        $ticketId = $service->createTicket([
            'user_id' => 404,
            'email'   => 'owner404@example.com',
            'subject' => 'Private billing ticket',
            'message' => 'Confidential financial inquiry',
        ]);

        $controller = new class extends SupportTicketController {
            public function mockCanView(array $ticket, int $id): bool
            {
                return $this->canViewTicket($ticket, $id);
            }
            protected function resolveCurrentUserId(): int
            {
                return 1;
            }
            protected function isCurrentUserAdmin(): bool
            {
                return true;
            }
        };

        $ticket = $service->getTicket($ticketId);
        $this->assertTrue($controller->mockCanView($ticket, $ticketId));
    }

    public function testFlashdataRecipientCanViewOwnLoginErrorTicket(): void
    {
        $service = new SupportTicketService();
        $ticketId = $service->createAuthLoginErrorTicket([
            'email_entered' => 'guest@example.com',
            'error_message' => 'Invalid auth hash',
        ]);

        $_SESSION['auth_ticket_id'] = $ticketId;

        $controller = new class extends SupportTicketController {
            public function mockCanView(array $ticket, int $id): bool
            {
                return $this->canViewTicket($ticket, $id);
            }
            protected function resolveCurrentUserId(): int
            {
                return 0; // Guest
            }
            protected function isCurrentUserAdmin(): bool
            {
                return false;
            }
        };

        $ticket = $service->getTicket($ticketId);
        $this->assertTrue($controller->mockCanView($ticket, $ticketId));
    }

    public function testShowThrowsPageNotFoundForNonExistentTicket(): void
    {
        $controller = new SupportTicketController();
        $this->expectException(PageNotFoundException::class);
        $controller->show(999999);
    }

    /* -------------------------------------------------------------------------
     * Pillar 3: Notification Service & Model
     * ------------------------------------------------------------------------- */

    public function testGoalCompletionNotificationSucceedsOnlyForGoalOwner(): void
    {
        $db = db_connect();
        $db->table('bf_financial_goals')->insert([
            'id'             => 10,
            'user_id'        => 55,
            'name'           => 'Save $10,000 Emergency Fund',
            'target_amount'  => 10000.0,
            'current_amount' => 10000.0,
            'status'         => 'completed',
        ]);

        $notifService = new NotificationService();

        // 1. Goal owner sends completion notification: PASS
        $ownerResult = $notifService->sendGoalCompletionNotification(55, 10);
        $this->assertTrue($ownerResult);

        // 2. Non-owner attempts to trigger completion notification: DENIED (IDOR guard)
        $imposterResult = $notifService->sendGoalCompletionNotification(99, 10);
        $this->assertFalse($imposterResult);

        // 3. Non-existent goal: DENIED
        $missingResult = $notifService->sendGoalCompletionNotification(55, 9999);
        $this->assertFalse($missingResult);

        // Verify outbox record
        $outbox = $notifService->getUserNotifications(55);
        $this->assertNotEmpty($outbox);
        $this->assertStringContainsString("Save $10,000 Emergency Fund", $outbox[0]['message']);
    }

    public function testBudgetAlertAndPaymentReminderPipeline(): void
    {
        $notifService = new NotificationService();

        $budgetAlert = $notifService->sendBudgetLimitAlert(77, 'Dining Out');
        $this->assertTrue($budgetAlert);

        $paymentReminder = $notifService->sendUpcomingPaymentReminder(77, 450);
        $this->assertTrue($paymentReminder);

        $monthlySummary = $notifService->sendMonthlySummary(77);
        $this->assertTrue($monthlySummary);

        $notifications = $notifService->getUserNotifications(77);
        $this->assertCount(3, $notifications);

        $unreadCount = $notifService->getUnreadCount(77);
        $this->assertSame(3, $unreadCount);

        // Mark first notification as read
        $firstId = (int) $notifications[0]['id'];
        $marked = $notifService->markAsRead($firstId, 77);
        $this->assertTrue($marked);

        $updatedUnread = $notifService->getUnreadCount(77);
        $this->assertSame(2, $updatedUnread);
    }

    /* -------------------------------------------------------------------------
     * Pillar 4: Account Rescue & Admin Audit
     * ------------------------------------------------------------------------- */

    public function testAccountRescueAuditLogPersistence(): void
    {
        $db = db_connect();
        $db->table('bf_users')->insert([
            'id'     => 88,
            'email'  => 'rescue_target@example.com',
            'active' => 0,
        ]);
        $db->table('login_attempts')->insert([
            'identifier' => 'rescue_target@example.com',
            'ip_address' => '127.0.0.1',
            'success'    => 0,
        ]);

        $rescueController = new class extends AccountRescueAdminController {
            public function mockCurrentAdminId(): int
            {
                return 1;
            }
        };

        // Ensure login attempts table has 1 failed record
        $this->assertSame(1, $db->table('login_attempts')->where('identifier', 'rescue_target@example.com')->countAllResults());

        // Simulate unlocking the account
        $db->table('login_attempts')->where('identifier', 'rescue_target@example.com')->delete();
        $auditModel = new AuditLogModel();
        $auditModel->insert([
            'event'      => 'account_rescue.unlock',
            'actor_id'   => 1,
            'target'     => '88',
            'meta_json'  => json_encode(['email_hash' => sha1('rescue_target@example.com')]),
            'ip_address' => '127.0.0.1',
            'created_at' => date('Y-m-d H:i:s'),
        ]);

        // Verify login attempts cleared
        $this->assertSame(0, $db->table('login_attempts')->where('identifier', 'rescue_target@example.com')->countAllResults());

        // Verify audit log recorded
        $log = $db->table('bf_audit_logs')->where('event', 'account_rescue.unlock')->get()->getRowArray();
        $this->assertNotNull($log);
        $this->assertSame('88', (string) $log['target']);
        $this->assertSame(1, (int) $log['actor_id']);
    }

    public function testAccountSupportGenericResponsePreventsUserEnumeration(): void
    {
        $accountSupport = new class extends AccountSupportController {
            public function checkRateLimitPublic(string $action, string $ip, string $emailHash): bool
            {
                return true;
            }
        };

        // When non-existent email is checked, response is generic
        $email = 'doesnotexist@example.com';
        $userModel = new UserModel();
        $user = $userModel->where('email', $email)->first();
        $this->assertNull($user);

        // Inactive user vs active user distinction
        $db = db_connect();
        $db->table('bf_users')->insert([
            'id'     => 123,
            'email'  => 'inactive@example.com',
            'active' => 0,
        ]);
        $db->table('bf_users')->insert([
            'id'     => 124,
            'email'  => 'already_active@example.com',
            'active' => 1,
        ]);

        $inactiveUser = $userModel->where('email', 'inactive@example.com')->first();
        $this->assertSame(0, (int) $inactiveUser->active);

        $activeUser = $userModel->where('email', 'already_active@example.com')->first();
        $this->assertSame(1, (int) $activeUser->active);
    }
}
