<style <?= $nonce['style'] ?? '' ?>>
	textarea {width: 100%;}
	select {width: 100%;}
</style>
<?php /* /users/views/user_fields.php */
// $cuRedirectURL              = $uri->uri_string(); 
// if (!empty($_SESSION['allSessionData'])) {
//     $userAccount                = $_SESSION['allSessionData']['userAccount'];
//     $cuID 						= $userAccount['cuID'];
//     $cuRoleID					= $userAccount['cuRole'];
//     $cuEmail					= $userAccount['cuEmail'];
//     $cuDisplayName				= $userAccount['cuDisplayName'];
//     $cuUserType 				= $userAccount['cuUserType'];
// } else {
//     $userAccount                = array();
//     $cuID 						= '';
//     $cuRoleID					= '';
//     $cuEmail					= '';
//     $cuDisplayName				= '';
//     $cuUserType 				= '';
// }
$date                       = date("F j, Y");
date_default_timezone_set('UTC');

$errorClass                 = empty($errorClass) ? ' error' : $errorClass;
$controlClass               = empty($controlClass) ? 'span4' : $controlClass;
// $registerClass              = $currentMethod == 'register' ? ' required' : '';
// $editSettings               = $currentMethod == 'edit';
// Set Form Config
$formGroup				= $siteSettings->formContainer;
$formLabel				= $siteSettings->formLabel;
$formConCol				= $siteSettings->formControlColumn;
$formControl			= $siteSettings->formControl;
$formSelect				= $siteSettings->formSelect;
$formControl		    = $siteSettings->formSelectpicker;
$formText				= $siteSettings->formText;
$formCustomText			= $siteSettings->formCustomText;
?>
<div class="nk-block">
    <div class="row">
        <div class="col-md-12 grid-margin stretch-card">
            <div class="card card-bordered">
                <div class="card-body">
                    <h4 class="card-title text-black">Service Request Information</h4>
                    <p class="card-description text-black"> Please fill out information below </p>
                    <input type="hidden" class="<?php echo $formControl; ?>" name="redirect_url" id="redirect_url" placeholder="Enter Your First/Last Name" value="<?php echo set_value('redirect_url', isset($user) ? $user->redirect_url : ''); ?>">
                    <input type="hidden" class="<?php echo $formControl; ?>" name="comm_type" id="comm_type" placeholder="Enter Your First/Last Name" value="<?php echo set_value('comm_type', isset($user) ? $user->comm_type : 'Request'); ?>">
                    <input type="hidden" class="<?php echo $formControl; ?>" name="user_id" id="user_id" placeholder="Enter Your First/Last Name" value="<?php echo set_value('user_id', isset($user) ? $user->user_id : $cuID); ?>">


                    <div class="<?php echo $formGroup; ?>">
                        <label for="name" class="<?php echo $formLabel; ?>">Name</label>
                        <div class="<?php echo $formConCol; ?>">
                            <input type="text" class="<?php echo $formControl; ?>" name="name" id="name" placeholder="Enter Your First/Last Name" value="<?php echo set_value('name', isset($user) ? $user->name : ''); ?>">						
                        </div>
                    </div>
                    <div class="<?php echo $formGroup; ?>">
                        <label for="email" class="<?php echo $formLabel; ?>">Email</label>
                        <div class="<?php echo $formConCol; ?>">
                            <input type="email" class="<?php echo $formControl; ?>" name="email" id="email" placeholder="Enter Your Email" value="<?php echo set_value('email', isset($user) ? $user->email : ''); ?>">						
                        </div>
                    </div>   
                    <!-- <div class="<?php echo $formGroup; ?> mb-2">
                        <label for="topic" class="<?php echo $formLabel; ?>">Department</label>
                        <div class="<?php echo $formConCol; ?>">
                            <?php 
                                // echo '
                                // <select name="topic" class="' . $formControl . '" id="topic" required="required">
                                //     <option>Select-An-Option</option>
                                //     ';  							
                                            
                                //     $department_type_values = array(
                                //         'Account'           => 'Account',
                                //         'Assets'            => 'Assets',
                                //         'Billing'           => 'Billing',
                                //         'Development'       => 'Exchange',
                                //         'Exchange'          => 'Exchange',
                                //         'Investor'          => 'Investor',
                                //         'Partner'           => 'Partner',
                                //         'Security'          => 'Security',
                                //         'Transaction'       => 'Transaction',
                                //     );
                                //     foreach ($department_type_values as $value => $display_text) {
                                //         $selected = old('topic') == $value ? ' selected="selected"' : "";
                                //         echo '<option value="' . esc($value) . '"' . $selected . '>' . esc($display_text) . '</option>';
                                //     } 
                                // echo '</select>';
                            ?>						
                        </div>
                    </div>   -->
                    <div class="<?php echo $formGroup; ?> mb-2">
                        <label for="subject" class="<?php echo $formLabel; ?>">Category</label>
                        <div class="<?php echo $formConCol; ?>">
                            <?php 
                                echo '
                                <select name="subject" class="' . $formControl . '" id="subject" required="required">
                                    <option>Select-An-Option</option>
                                    ';  							
                                            
                                    $categories_type_values = array(
                                        'General'           => 'General',
                                        'Account'           => 'Account',
                                        'Asset Creator'     => 'Asset Creator',
                                        'Asset Exchange'    => 'Asset Exchange',
                                        'Budgeting'         => 'Budgeting',
                                        'Credit/Debt'       => 'Credit/Debt',
                                        'Mobile'            => 'Mobile',
                                        'MyMI Coin'         => 'MyMI Coin',
                                        'MyMI Gold'         => 'MyMI Gold',
                                        'MyMI Projects'     => 'MyMI Projects',
                                        'Portfolio Manager' => 'Portfolio Manager',
                                    );
                                    foreach ($categories_type_values as $value => $display_text) {
                                        $selected = old('subject') == $value ? ' selected="selected"' : "";
                                        echo '<option value="' . esc($value) . '"' . $selected . '>' . esc($display_text) . '</option>';
                                    } 
                                echo '</select>';
                            ?>						
                        </div>
                    </div> 
                    <div class="<?php echo $formGroup; ?>">
                        <label for="details" class="<?php echo $formLabel; ?>">Issue</label>
                        <div class="<?php echo $formConCol; ?>">
                            <textarea type="text" class="<?php echo $formControl; ?>" name="details" id="details" rows="4" placeholder="Enter Details Regarding Your Issue" value="<?php echo set_value('details', isset($user) ? $user->details : ''); ?>"></textarea>						
                        </div>
                    </div>  
                    <?php
                        if ($uri->getSegment(1) === 'Customer-Support') {
                            echo '<input type="hidden" class="g-recaptcha-response" name="g-recaptcha-response">';
                        }
                    ?>
                    <div class="control-group">
                        <div class="controls ml-3 text-right">
                            <input class="btn btn-lg btn-outline-primary" type="submit" name="register" id="submit" value="Get Support Now" />
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
