<?php 
$successData                            = array (
    'success_note'                      => 'Referral Application Submitted<br>Please give our team up to 24-48 hrs<br>to review your application!',
    'success_link'                      => '/Dashboard',
    'success_btn'                       => 'Back to Dashboard',
);
echo view('UserModule/Dashboard/index/success-noto', $successData); 
?>