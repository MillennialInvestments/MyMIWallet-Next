<?php

declare(strict_types=1);

namespace Tests\Unit\Projects;

use App\Models\ProjectsModel;
use CodeIgniter\Test\CIUnitTestCase;

/**
 * @internal
 */
final class ProjectsModelIntakeTest extends CIUnitTestCase
{
    protected ProjectsModel $model;

    protected function setUp(): void
    {
        parent::setUp();
        $this->model = new ProjectsModel();
    }

    public function testReSaveIntakeSucceedsAndReturnsId(): void
    {
        $id = $this->model->reSaveIntake([
            'user_id'       => 1,
            'source'        => 'zillow',
            'raw_input'     => 'https://www.zillow.com/homedetails/1420-Benton-Rd-Bossier-City-LA-71111/12345678_zpid/',
            'zillow_url'    => 'https://www.zillow.com/homedetails/1420-Benton-Rd-Bossier-City-LA-71111/12345678_zpid/',
            'address_line1' => '1420 Benton Rd',
            'city'          => 'Bossier City',
            'state'         => 'LA',
            'postal_code'   => '71111',
            'status'        => 'queued',
        ]);

        $this->assertIsInt($id);
        $this->assertGreaterThan(0, $id);
    }
}
