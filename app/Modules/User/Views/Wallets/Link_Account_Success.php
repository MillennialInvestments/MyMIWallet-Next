<?php
$errorClass                                     = empty($errorClass) ? ' error' : $errorClass;
$controlClass                                   = empty($controlClass) ? 'span6' : $controlClass;
$walletType                                     = $uri->getSegment(2);
$fieldData = array(
    'errorClass'                                => $errorClass,
    'controlClass'                              => $controlClass,
    'walletType'	                            => $walletType,
);

$cuID 					                        = isset($current_user->id) && ! empty($current_user->id) ? $current_user->id : '';
$cuEmail				                        = isset($current_user->email) && ! empty($current_user->email) ? $current_user->email : '';
$cuUsername 			                        = isset($current_user->username) && ! empty($current_user->username) ? $current_user->username : '';
$beta                                           = $siteSettings->beta;
if ($beta === 1) {
    $beta                                       = 'Yes';
} else {
    $beta                                       = 'No';
}
// $id                         = $id;
echo '
<div class="nk-block">
    <div class="row gy-gs">
        <div class="col-md-12 mb-3">  
        </div>
    </div>
</div>
';
?>

