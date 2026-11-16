<?php

declare(strict_types=1);

namespace Tests\App\Security;

use App\Models\InvestmentModel;
use CodeIgniter\Test\CIUnitTestCase;
use CodeIgniter\Test\DatabaseTestTrait;

/**
 * Found by the live staging form run: Investments Account-Manager took the
 * trade owner from the request and updated any trade id.
 *
 * @internal
 */
final class TradeOwnershipTest extends CIUnitTestCase
{
    use DatabaseTestTrait;

    protected $migrate = false;
    protected $refresh = false;

    protected function setUp(): void
    {
        parent::setUp();
        $db = db_connect();
        $db->query('DROP TABLE IF EXISTS ' . $db->prefixTable('users_trades'));
        $db->query('CREATE TABLE ' . $db->prefixTable('users_trades') . ' (id INTEGER PRIMARY KEY AUTOINCREMENT, user_id INTEGER, symbol TEXT, shares TEXT, status TEXT)');
        $db->table('bf_users_trades')->insert(['user_id' => 1, 'symbol' => 'AAA', 'shares' => '1', 'status' => 'Active']);
        $db->resetDataCache();
    }

    protected function tearDown(): void
    {
        $db = db_connect();
        $db->query('DROP TABLE IF EXISTS ' . $db->prefixTable('users_trades'));
        $db->resetDataCache();
        parent::tearDown();
    }

    public function testAnotherUsersTradeCannotBeUpdated(): void
    {
        $model = new InvestmentModel();

        $this->assertFalse($model->saveTrade(['id' => 1, 'user_id' => 2, 'symbol' => 'HACK', 'shares' => '9', 'status' => 'Active']));
        $this->assertSame('AAA', db_connect()->table('bf_users_trades')->where('id', 1)->get()->getRowArray()['symbol']);
    }

    public function testSourceTakesOwnerFromSession(): void
    {
        $src = (string) file_get_contents(APPPATH . 'Modules/User/Controllers/InvestmentsController.php');
        $this->assertStringNotContainsString("\$json['user_id'] ?? \$this->cuID", $src);
    }
}
