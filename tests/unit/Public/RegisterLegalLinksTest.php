<?php
namespace Tests\Unit\Public;

use CodeIgniter\Test\CIUnitTestCase;

class RegisterLegalLinksTest extends CIUnitTestCase
{
    public function testLegalLinksPresent()
    {
        $viewContent = file_get_contents(APPPATH . 'Views/Auth/register_form.php');

        $this->assertStringContainsString('Terms-Of-Service', $viewContent);
        $this->assertStringContainsString('Privacy-Policy', $viewContent);
        $this->assertStringNotContainsString('Legal/Terms-And-Conditions', $viewContent);
        $this->assertStringNotContainsString('Legal/Privacy-Policy', $viewContent);
    }
}
