<?php 
namespace App\Modules\Management\Controllers;
use App\Controllers\BaseController;

#[\AllowDynamicProperties]
class TestController extends \App\Controllers\BaseController
{
    public function testITTSend()
    {
        helper('email');

        $testEmail = 'testuser@example.com';
        $testCode = 'ITT-99999';

        sendITTReferralEmail([
            'to'   => $testEmail,
            'name' => 'Test User',
            'code' => $testCode
        ]);

        return "Test ITT email sent to {$testEmail}. Check logs to verify.";
    }
}
