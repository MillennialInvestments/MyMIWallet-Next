<?php
// Set Form Config
$formGroup				= $siteSettings->formContainer . ' input-group';
$formLabel				= $siteSettings->formLabel;
$formConCol				= $siteSettings->formControlColumn;
$formControl			= $siteSettings->formControl;
$formSelect				= $siteSettings->formSelect;
$formControl		= $siteSettings->formSelectpicker . ' dis-selectpicker';
$formText				= $siteSettings->formText;
$formCustomText			= $siteSettings->formCustomText;
$cuFullName             = $cuFirstName . ' ' .  $cuMiddleName . ' ' . $cuLastName . ' ' . $cuNameSuffix; 
$cuFullAddress          = $cuAddress . ', ' . $cuCity . ', ' . $cuState . ', ' . $cuCountry . ' ' . $cuZipCode; 
?>
<style <?= $nonce['style'] ?? '' ?>>
    .dis-selectpicker{
        display: block !important;
    }
</style>
<div class="card card-bordered h-100">
    <div class="card-inner-group">
        <div class="card-inner card-inner-md">
            <div class="card-title-group">
                <div class="card-title">
                    <h6 class="title">Investment Assessment</h6>
                </div>
                <div class="card-tools me-n1">
                    <div class="drodown">
                        <a href="#" class="dropdown-toggle btn btn-icon btn-trigger full-width" data-bs-toggle="dropdown"><em class="icon ni ni-more-h"></em></a>
                        <div class="dropdown-menu dropdown-menu-end">
                            <ul class="link-list-opt no-bdr">
                                <li><a href="#"><em class="icon ni ni-setting"></em><span>Action Settings</span></a></li>
                                <li><a href="#"><em class="icon ni ni-notify"></em><span>Push Notification</span></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div><!-- .card-inner -->
        <div class="card-inner">
            <div class="nk-wg-action">
                <div class="nk-wg-action-content full-width">
                    <div class="tab-content">
                        <div id="account-checklist" class="tab-pane fade active show">
                            <div class="nk-block-head nk-block-head-lg">
                                <div class="nk-block-between">
                                    <div class="nk-block-head-content">
                                        <h4 class="nk-block-title">Account Setup & Progress</h4>
                                        <div class="nk-block-des">
                                            <p>Complete your Account Setup to access of the MyMI Wallet Features available!</p>
                                        </div>
                                    </div>
                                    <div class="nk-block-head-content align-self-start d-lg-none">
                                        <a href="#" class="toggle btn btn-icon btn-trigger mt-n1" data-bs-target="userAside"><em class="icon ni ni-menu-alt-r"></em></a>
                                    </div>
                                </div>
                            </div><!-- .nk-block-head -->
                            <div class="nk-block">
                                <?php // print_r($userAssessment); ?>
                                <div class="nk-data data-list">
                                    <div class="data-head">
                                        <h6 class="overline-title">Your Current Progress</h6>
                                    </div>            
                                    <!-- Account Information data-item -->
                                    <div class="data-item border-bottom">
                                        <div class="data-col" id="col_pbt">
                                            <span class="data-label w-50"><strong>Stage</strong></span>
                                            <span class="data-value w-50" id="pbt"><strong>Status</strong></span>
                                        </div>
                                        <div class="data-col data-col-end w-25">
                                            <!-- <a class="btn btn-primary btn-md text-white"><em class="icon ni ni-plus px-2 text-white"></em><span class="ml-2">Add Now!</span> </a> -->
                                        </div>
                                    </div>    
                                    <!-- Account Information data-item -->
                                    <div class="data-item border-bottom">
                                        <div class="data-col" id="col_pbt">
                                            <span class="data-label w-50"><strong>Account Information</strong></span>
                                            <span class="data-value w-50" id="pbt"><?php echo $account_informationStatus; ?></span>
                                        </div>
                                        <div class="data-col data-col-end w-25">
                                            <a class="btn btn-primary btn-md text-white" data-bs-toggle="tab" href="#account-information"><em class="icon ni ni-plus px-2 text-white"></em><span class="ml-2">Get Started!</span> </a>
                                        </div>
                                    </div>
                                    <!-- Banking Accounts data-item -->
                                    <div class="data-item border-bottom">
                                        <div class="data-col" id="col_pbt">
                                            <span class="data-label w-50"><strong>KYC Verification</strong></span>
                                            <span class="data-value w-50" id="pbt"><?php echo $kyc_verifiedStatus; ?></span>
                                        </div>
                                        <div class="data-col data-col-end w-25">
                                            <a class="btn btn-primary btn-md text-white" data-bs-toggle="tab" href="#kyc-verification"><em class="icon ni ni-plus px-2 text-white"></em><span class="ml-2">Get Started!</span> </a>
                                        </div>
                                    </div>
                                    <!-- Investment Accounts data-item -->
                                    <div class="data-item border-bottom">
                                        <div class="data-col" id="col_pbt">
                                            <span class="data-label w-50"><strong>Investment Portfolio</strong></span>
                                            <span class="data-value w-50" id="pbt"><?php echo $investment_walletsStatus; ?></span>
                                        </div>
                                        <div class="data-col data-col-end w-25">
                                            <a class="btn btn-primary btn-md text-white" data-bs-toggle="tab" href="#investment-summary"><em class="icon ni ni-plus px-2 text-white"></em><span class="ml-2">Get Started!</span> </a>
                                        </div>
                                    </div>
                                    <!-- Risk Assessment data-item -->
                                    <div class="data-item border-bottom">
                                        <div class="data-col" id="col_pbt">
                                            <span class="data-label w-50"><strong>Risk Assessment</strong></span>
                                            <span class="data-value w-50" id="pbt"><?php echo $risk_assessmentStatus; ?></span>
                                        </div>
                                        <div class="data-col data-col-end w-25">
                                            <a class="btn btn-primary btn-md text-white" data-bs-toggle="tab" href="#risk-assessment"><em class="icon ni ni-plus px-2 text-white"></em><span class="ml-2">Get Started!</span> </a>
                                        </div>
                                    </div>
                                    <!-- Experience & Knowledge data-item -->
                                    <div class="data-item border-bottom">
                                        <div class="data-col" id="col_pbt">
                                            <span class="data-label w-50"><strong>Experience / Knowledge</strong></span>
                                            <span class="data-value w-50" id="pbt"><?php echo $account_informationStatus; ?></span>
                                        </div>
                                        <div class="data-col data-col-end w-25">
                                            <a class="btn btn-primary btn-md text-white" data-bs-toggle="tab" href="#investment-knowledge"><em class="icon ni ni-plus px-2 text-white"></em><span class="ml-2">Get Started!</span> </a>
                                        </div>
                                    </div>
                                    <!-- Experience & Knowledge data-item -->
                                    <div class="data-item border-bottom">
                                        <div class="data-col" id="col_pbt">
                                            <span class="data-label w-50"><strong>Activate Features</strong></span>
                                            <span class="data-value w-50" id="pbt"><?php echo $features_activatedStatus; ?></span>
                                        </div>
                                        <div class="data-col data-col-end w-25">
                                            <a class="btn btn-primary btn-md text-white" data-bs-toggle="tab" href="#investment-knowledge"><em class="icon ni ni-plus px-2 text-white"></em><span class="ml-2">Get Started!</span> </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div id="account-information" class="tab-pane fade">
                            <div class="nk-block-head nk-block-head-lg">
                                <div class="nk-block-between">
                                    <div class="nk-block-head-content">
                                        <h4 class="nk-block-title">Account Information</h4>
                                        <div class="nk-block-des">
                                            <p>Basic info, like your name and address, that you use at MyMI Wallet.</p>
                                        </div>
                                    </div>
                                    <div class="nk-block-head-content align-self-start d-lg-none">
                                        <a href="#" class="toggle btn btn-icon btn-trigger mt-n1" data-bs-target="userAside"><em class="icon ni ni-menu-alt-r"></em></a>
                                    </div>
                                </div>
                            </div><!-- .nk-block-head -->
                            <?php
                                $meta_fields = Template::get('meta_fields');
                                $pageURIA = $this->uri->segment(1);
                                $pageURIB = $this->uri->segment(2);
                                $cuID = $pageURIB;
                                $getUserInfo = $this->user_model->get_user_info($cuID);
                                foreach ($getUserInfo->result_array() as $userInfo) {
                                    $cuEmail = $userInfo['email'];
                                    $cuUsername = $userInfo['username'];
                                }
                                $currentMethod = $this->router->method;
                                $errorClass = empty($errorClass) ? ' error' : $errorClass;
                                $registerClass = $currentMethod == 'register' ? ' required' : '';
                                $editSettings = $currentMethod == 'edit';
                                $defaultLanguage = isset($user->language) ? $user->language : strtolower(settings_item('language'));
                                $defaultTimezone = isset($user->timezone) ? $user->timezone : strtoupper(settings_item('site.default_user_timezone'));
                            ?>
                            <style <?= $nonce['style'] ?? '' ?>>
                                .form-control {
                                    min-height: 40px !important;
                                    margin-top: 0 !important;
                                    background-color: #ededed !important
                                }
                            </style>
                            <input id="user_id" name="user_id" value="<?php echo set_value('user_id', isset($user) ? $user->user_id : $cuID); ?>" type="hidden">
                            <input id="user_email" name="user_email" value="<?php echo set_value('user_email', isset($user) ? $user->user_email : $cuEmail); ?>" type="hidden">
                            <input id="user_username" name="user_username" value="<?php echo set_value('user_username', isset($user) ? $user->user_username : $cuUsername); ?>" type="hidden">
                            <div class="<?php e($formGroup); ?><?php echo form_error('first_name') ? $errorClass : ''; ?>">
                                <label class="<?php e($formLabel); ?>" for="first_name">First Name</label>
                                <div class="<?php e($formConCol); ?>">
                                    <input id="first_name" name="first_name" value="<?php echo set_value('first_name', isset($user) ? $user->first_name : $cuFirstName); ?>" class="<?php e($formControl); ?>" type="tel">
                                    <span class="help-inline"><?php echo form_error('first_name'); ?></span>
                                </div>
                            </div>
                            <div class="<?php e($formGroup); ?><?php echo form_error('middle_name') ? $errorClass : ''; ?>">
                                <label class="<?php e($formLabel); ?>" for="middle_name">Middle Name <small class="text-muted">(Optional)</small></label>
                                <div class="<?php e($formConCol); ?>">
                                    <input id="middle_name" name="middle_name" value="<?php echo set_value('middle_name', isset($user) ? $user->middle_name : $cuMiddleName); ?>" class="<?php e($formControl); ?>" type="tel">
                                    <span class="help-inline"><?php echo form_error('middle_name'); ?></span>
                                </div>
                            </div>
                            <div class="<?php e($formGroup); ?><?php echo form_error('last_name') ? $errorClass : ''; ?>">
                                <label class="<?php e($formLabel); ?>" for="last_name">Last Name</label>
                                <div class="<?php e($formConCol); ?>">
                                    <input id="last_name" name="last_name" value="<?php echo set_value('last_name', isset($user) ? $user->last_name : $cuLastName); ?>" class="<?php e($formControl); ?>" type="tel">
                                    <span class="help-inline"><?php echo form_error('last_name'); ?></span>
                                </div>
                            </div>
                            <div class="<?php e($formGroup); ?><?php echo form_error('name_suffix') ? $errorClass : ''; ?>">
                                <label class="<?php e($formLabel); ?>required" for="name_suffix">Suffix</label>
                                <div class="<?php e($formConCol); ?>">
                                    <select class="<?php echo $formControl; ?>" id="name_suffix" name="name_suffix" required style="height:40px;padding:10px">
                                        <?php
                                        $type_values = array('.' => 'N/A', 'Jr.' => 'Jr.', 'II' => 'II', 'III' => 'III', 'IV' => 'IV', 'V' => 'V',);
                                        foreach ($type_values as $value => $display_text) {
                                            $selected = ($value == $this->input->post('name_suffix')) ? ' selected="selected"' : "";
                                            echo '<option value="' . $value . '" ' . $selected . '>' . $display_text . '</option>';
                                        }
                                        ?>
                                    </select>
                                </div>
                            </div>
                            <div class="<?php e($formGroup); ?><?php echo form_error('phone') ? $errorClass : ''; ?>">
                                <label class="<?php e($formLabel); ?>" for="phone">Phone</label>
                                <div class="<?php e($formConCol); ?>">
                                    <input id="phone" name="phone" value="<?php echo set_value('phone', isset($user) ? $user->phone : $cuPhone); ?>" class="<?php e($formControl); ?>" type="tel">
                                    <span class="help-inline"><?php echo form_error('phone'); ?></span>
                                </div>
                            </div>
                            <div class="<?php e($formGroup); ?><?php echo form_error('address') ? $errorClass : ''; ?>">
                                <label class="<?php e($formLabel); ?>" for="address">Address</label>
                                <div class="<?php e($formConCol); ?>">
                                    <input id="address" name="address" value="<?php echo set_value('address', isset($user) ? $user->address : $cuAddress); ?>" class="<?php e($formControl); ?>">
                                    <span class="help-inline"><?php echo form_error('address'); ?></span>
                                </div>
                            </div>
                            <div class="<?php e($formGroup); ?><?php echo form_error('city') ? $errorClass : ''; ?>">
                                <label class="<?php e($formLabel); ?>" for="city">City</label>
                                <div class="<?php e($formConCol); ?>">
                                    <input id="city" name="city" value="<?php echo set_value('city', isset($user) ? $user->city : $cuCity); ?>" class="<?php e($formControl); ?>">
                                    <span class="help-inline"><?php echo form_error('city'); ?></span>
                                </div>
                            </div>
                            <?php
                                if (!empty($meta_fields)) :
                                    $defaultCountry = 'US';
                                    $defaultState = 'N/A';
                                    $countryFieldId = false;
                                    $stateFieldId = false;
                                    $displayFrontend = isset($frontend_only) ? $frontend_only : false;
                                    $userIsAdmin = isset($current_user) ? ($current_user->role_id == 1) : false;
                                    foreach ($meta_fields as $field) :
                                        $adminField = isset($field['admin_only']) ? $field['admin_only'] : false;
                                        if ($adminField && !$userIsAdmin) {
                                            continue;
                                        }
                                        $frontField = isset($field['frontend']) ? $field['frontend'] : true;
                                        if ($displayFrontend && !$frontField) {
                                            continue;
                                        }
                                        if ($field['form_detail']['type'] == 'dropdown') :
                                            echo form_dropdown($field['form_detail']['settings'], $field['form_detail']['options'], set_value($field['name'], isset($user->{$field['name']}) ? $user->{$field['name']} : ''), $field['label']);
                                        elseif ($field['form_detail']['type'] == 'checkbox') :
                            ?>
                            <div class="<?php e($formGroup); ?><?php echo form_error($field['name']) ? ' error' : ''; ?>">
                                <label class="<?php e($formLabel); ?>" for="<?php echo $field['name']; ?>"><?php echo $field['label']; ?></label>
                                <div class="<?php e($formConCol); ?>">
                                    <?php echo form_checkbox($field['form_detail']['settings'], $field['form_detail']['value'], $field['form_detail']['value'] == set_value($field['name'], isset($user->{$field['name']}) ? $user->{$field['name']} : '')); ?>
                                </div>
                            </div>
                            <?php
                                elseif ($field['form_detail']['type'] == 'state_select' && is_callable('state_select')) :
                                    $stateFieldId = $field['name'];
                                    $stateValue = isset($user->{$field['name']}) ? $user->{$field['name']} : $defaultState;
                            ?>
                            <div class="<?php e($formGroup); ?><?php echo form_error($field['name']) ? ' error' : ''; ?>">
                                <label class="<?php e($formLabel); ?>" for="<?php echo $field['name']; ?>"><?php echo lang('user_meta_state'); ?></label>
                                <div class="<?php e($formConCol); ?>">
                                    <?php echo state_select(set_value($field['name'], $stateValue), $defaultState, $defaultCountry, $field['name'], 'span6 chzn-select form-control full-width'); ?>
                                </div>
                            </div>
                                    <?php
                                    elseif ($field['form_detail']['type'] == 'country_select' && is_callable('country_select')) :
                                        $countryFieldId = $field['name'];
                                        $countryValue = isset($user->{$field['name']}) ? $user->{$field['name']} : $defaultCountry;
                                    ?>
                                        <div class="<?php e($formGroup); ?><?php echo form_error($field['name']) ? ' error' : ''; ?>">
                                            <label class="<?php e($formLabel); ?>" for="<?php echo $field['name']; ?>"><?php echo lang('user_meta_country'); ?></label>
                                            <div class="<?php e($formConCol); ?>">
                                                <?php echo country_select(set_value($field['name'], isset($user->{$field['name']}) ? $user->{$field['name']} : $defaultCountry), $defaultCountry, $field['name'], 'span6 chzn-select form-control full-width'); ?>
                                            </div>
                                        </div>
                                    <?php
                                    else :
                                        $form_method = "form_{$field['form_detail']['type']}";
                                        if (is_callable($form_method)) {
                                            echo $form_method($field['form_detail']['settings'], set_value($field['name'], isset($user->{$field['name']}) ? $user->{$field['name']} : ''), $field['label']);
                                        }
                                    endif;
                                endforeach;
                                if (!empty($countryFieldId) && !empty($stateFieldId)) {
                                    Assets::add_js($this->load->view('country_state_js', array('country_name' => $countryFieldId, 'country_value' => $countryValue, 'state_name' => $stateFieldId, 'state_value' => $stateValue,), true), 'inline');
                                }
                            endif;
                            ?>
                            <div class="<?php e($formGroup); ?><?php echo form_error('zipcode') ? $errorClass : ''; ?>">
                                <label class="<?php e($formLabel); ?>" for="zipcode">Zipcode</label>
                                <div class="<?php e($formConCol); ?>">
                                    <input id="zipcode" name="zipcode" value="<?php echo set_value('zipcode', isset($user) ? $user->zipcode : $cuZipCode); ?>" class="<?php e($formControl); ?>">
                                    <span class="help-inline"><?php echo form_error('zipcode'); ?></span>
                                </div>
                            </div>
                            <div class="<?php e($formGroup); ?><?php echo form_error('timezones') ? $errorClass : ''; ?>">
                                <label class="<?php e($formLabel); ?>required" for="timezones"><?php echo lang('bf_timezone'); ?></label>
                                <div class="<?php e($formConCol); ?>">
                                    <?php echo timezone_menu(set_value('timezones', isset($user) ? $user->timezone : $defaultTimezone), $formControl, 'timezones', array('id' => 'timezones')); ?>
                                    <span class="help-inline"><?php echo form_error('timezones'); ?></span>
                                </div>
                            </div>
                            <div class="<?php e($formGroup); ?><?php echo form_error('language') ? $errorClass : ''; ?>">
                                <label class="<?php e($formLabel); ?>required" for="language">Language</label>
                                <div class="<?php e($formConCol); ?>">
                                    <select class="<?php echo $formControl; ?>" id="language" name="language" required style="height:40px;padding:10px">
                                        <?php
                                        if (!empty($cuLanguage)) {
                                            $language_values = array('English' => 'English (Default)', 'Arabic' => 'Arabic', 'Chinese' => 'Chinese', 'English' => 'English', 'French' => 'French', 'German' => 'German', 'Italian' => 'Italian', 'Japanese' => 'Japanese', 'Polish' => 'Polish', 'Portuguese' => 'Portuguese', 'Russian' => 'Russian', 'Spanish' => 'Spanish', 'Turkisk' => 'Turkisk',);
                                            foreach ($language_values as $value => $display_text) {
                                                $selected = ($value == $this->input->post('language')) ? ' selected="selected"' : "";
                                                echo '<option value="' . $value . '" ' . $selected . '>' . $display_text . '</option>';
                                            }
                                        } else {
                                            $language_values = array('English' => 'English (Default)', 'Arabic' => 'Arabic', 'Chinese' => 'Chinese', 'English' => 'English', 'French' => 'French', 'German' => 'German', 'Italian' => 'Italian', 'Japanese' => 'Japanese', 'Polish' => 'Polish', 'Portuguese' => 'Portuguese', 'Russian' => 'Russian', 'Spanish' => 'Spanish', 'Turkisk' => 'Turkisk',);
                                            foreach ($language_values as $value => $display_text) {
                                                $selected = ($value == $this->input->post('language')) ? ' selected="selected"' : "";
                                                echo '<option value="' . $value . '" ' . $selected . '>' . $display_text . '</option>';
                                           }
                                        }
                                        ?>
                                    </select>
                                </div>
                            </div>
                            <div class="<?php e($formGroup); ?><?php echo form_error('advertisement') ? $errorClass : ''; ?>">
                                <label class="<?php e($formLabel); ?>" for="advertisement">How did you hear about us?</label>
                                <div class="<?php e($formConCol); ?>">
                                    <select class="form-control" id="advertisement" name="advertisement" required>
                                        <option>Select-An-Option</option>
                                        <?php
                                        $type_values = array('Email' => 'Email', 'Discord' => 'Discord', 'Facebook' => 'Facebook', 'Google' => 'Google', 'StockTwits' => 'StockTwits', 'Twitter' => 'Twitter', 'Word-Of-Mouth' => 'Word-Of-Mouth',);
                                        foreach ($type_values as $value => $display_text) {
                                            $selected = ($value == $this->input->post('advertisement')) ? ' selected="selected"' : "";
                                            echo '<option value="' . $value . '" ' . $selected . '>' . $display_text . '</option>';
                                        }
                                        ?>
                                    </select>
                                </div>
                            </div>
                            <hr>
                            <div class="nk-block-head nk-block-head-lg pt-3">
                                <div class="nk-block-between">
                                    <div class="nk-block-head-content">
                                        <h4 class="nk-block-title">Generate MyMI Wallet Address</h4>
                                        <div class="nk-block-des">
                                            <p>Create your MyMI Wallet to handle your transactions and more.</p>
                                        </div>
                                    </div>
                                    <div class="nk-block-head-content align-self-start d-lg-none">
                                        <a href="#" class="toggle btn btn-icon btn-trigger mt-n1" data-bs-target="userAside"><em class="icon ni ni-menu-alt-r"></em></a>
                                    </div>
                                </div>
                            </div><!-- .nk-block-head -->
                            <div class="<?php e($formGroup); ?><?php echo form_error('total') ? $errorClass : ''; ?>">
                                <label class="<?php e($formLabel); ?>" for="zipcode">Click Here To Generate New Wallet Address:</label>
                                <div class="col-9"><a class="btn btn-primary btn-sm text-white" onclick="createWalletAddressDGB()">Generate</a></div>
                            </div>
                            <div class="<?php e($formGroup); ?><?php echo form_error('private_key') ? $errorClass : ''; ?>">
                                <label class="<?php e($formLabel); ?>" for="private_key">Private Key</label>
                                <div class="<?php e($formConCol); ?>">
                                    <input id="private_key" name="private_key" value="<?php echo set_value('private_key', isset($user) ? $user->private_key : $cuPrivateKey); ?>" class="<?php e($formControl); ?>">
                                    <p class="help-text">Store Your Private Key somewhere safe and secure.</p>
                                </div>
                            </div>
                            <div class="<?php e($formGroup); ?><?php echo form_error('public_key') ? $errorClass : ''; ?>">
                                <label class="<?php e($formLabel); ?>" for="public_key">Public Key</label>
                                <div class="<?php e($formConCol); ?>">
                                    <input id="public_key" name="public_key" value="<?php echo set_value('public_key', isset($user) ? $user->public_key : $cuPublicKey); ?>" class="<?php e($formControl); ?>">
                                </div>
                            </div>
                        </div>
                        <div id="kyc-verification" class="tab-pane fade">
                            <?php //echo view('UserModule/Budget/index/Investor_Assessment/personal_information'); ?>
                            <div class="nk-block-head nk-block-head-lg">
                                <div class="nk-block-between">
                                    <div class="nk-block-head-content">
                                        <h4 class="nk-block-title">KYC Verification</h4>
                                        <div class="nk-block-des">
                                            <p>Basic info, like your name and address, that you use at MyMI Wallet.</p>
                                        </div>
                                    </div>
                                    <div class="nk-block-head-content align-self-start d-lg-none">
                                        <a href="#" class="toggle btn btn-icon btn-trigger mt-n1" data-bs-target="userAside"><em class="icon ni ni-menu-alt-r"></em></a>
                                    </div>
                                </div>
                            </div><!-- .nk-block-head -->
                            <div class="nk-block">
                                <form class="form-horizontal" id="updateInvestorProfileForm">
                                    <div class="nk-data data-list">
                                        <div class="data-head">
                                            <h6 class="overline-title">Identification Verification</h6>
                                        </div>            
                                        <input type="hidden" name="user_id" id="user_id" value="<?php echo set_value('user_id', isset($user) ? $user->user_id : $cuID); ?>">                                        
                                        <!-- Full Name data-item -->
                                        <div class="data-item">
                                            <div class="data-col" id="col_fullname">
                                                <span class="data-label w-25">Full Name</span>
                                                <span class="data-value w-100" id="fullname"><?php echo $cuFullName; ?></span>
                                                <input id="fullname" name="fullname" type="hidden" value="<?php echo set_value('fullname', isset($user) ? $user->fullname : $cuFullName); ?>">
                                            </div>
                                            <div class="data-col data-col-end w-15">
                                                <span class="data-more" onclick="fullname_Switch(event, document.getElementById('col_fullname'))"><em class="icon ni ni-forward-ios"></em></span>
                                            </div>
                                        </div>
                                        <script <?= $nonce['script'] ?? '' ?>>
                                            function fullname_Switch(event, element) {
                                                event.stopPropagation();
                                                let txt                 = document.getElementById('fullname').innerText;
                                                let input               = document.getElementById('fullname').innerText;
                                                // let element             = document.getElementById('col_email');

                                                element.innerHTML       = `
                                                    <span class="data-label w-25">Full Name</span>
                                                    <span class="data-value w-100">
                                                        <span class="d-none" id="old-text">${txt}</span>
                                                        <span class="d-none" id="${input}">${input}</span>
                                                        <div class="<?php echo $formGroup; ?>">      
                                                            <div class="<?php echo $formConCol; ?>">       
                                                                <input type="text" class="<?php echo $formControl; ?>" name="fullname" id="fullname" placeholder="Enter Full Name" value="<?php echo set_value('fullname', isset($user) ? $user->fullname : $cuFullName); ?>">	
                                                            </div>
                                                        </div>
                                                    </span>
                                                `;
                                                document.getElementsByTagName('input')[0].focus();
                                                // Change the onClick attribute
                                                element.setAttribute('onClick', 'fullname_Reset(event, this)');
                                                // Add event listener to stop propagation on the select dropdown
                                                document.getElementById('fullname').addEventListener('click', function(e) {
                                                    e.stopPropagation();
                                                });
                                            }

                                            function fullname_Reset(event, element) {
                                                event.stopPropagation();
                                                let txt                 = document.getElementById('old-text').innerHTML;
                                                // let element             = document.getElementById('col_fullname');

                                                element.innerHTML = `
                                                <span class="data-label w-25">Full Name</span>
                                                <span class="data-value w-100" id="fullname"><?php echo $cuEmail; ?></span>
                                                <input type="hidden" name="fullname" id="fullname" value="<?php echo set_value('fullname', isset($user) ? $user->fullname : $cuFullName); ?>">	
                                                `;
                                                // Change the onClick attribute
                                                element.setAttribute('onClick', 'fullname_Switch(event, this)');
                                            }
                                        </script>
                                        <!-- Date of Birth data-item -->
                                        <div class="data-item">
                                            <div class="data-col" id="col_dob">
                                                <span class="data-label w-25">Date of Birth</span>
                                                <span class="data-value w-100" id="dob"><?php echo $cuDOB; ?></span>
                                                <input id="dob" name="dob" type="hidden" value="<?php echo set_value('dob', isset($user) ? $user->dob : $cuDOB); ?>">
                                            </div>
                                            <div class="data-col data-col-end w-15">
                                                <span class="data-more" onclick="dob_Switch(event, document.getElementById('col_dob'))"><em class="icon ni ni-forward-ios"></em></span>
                                            </div>
                                        </div>
                                        <script <?= $nonce['script'] ?? '' ?>>
                                            function dob_Switch(event, element) {
                                                event.stopPropagation();
                                                let txt                 = document.getElementById('dob').innerText;
                                                let input               = document.getElementById('dob').innerText;
                                                // let element             = document.getElementById('col_dob');

                                                element.innerHTML       = `
                                                    <span class="data-label w-25">Date of Birth</span>
                                                    <span class="data-value w-100">
                                                        <span class="d-none" id="old-text">${txt}</span>
                                                        <span class="d-none" id="${input}">${input}</span>
                                                        <div class="<?php echo $formGroup; ?>">      
                                                            <div class="<?php echo $formConCol; ?>">       
                                                                <input type="date" class="<?php echo $formControl; ?>" name="dob" id="dob" placeholder="Enter Date of Birth" value="<?php echo set_value('dob', isset($user) ? $user->dob : $cuDOB); ?>">	
                                                            </div>
                                                        </div>
                                                    </span>
                                                `;
                                                document.getElementsByTagName('input')[0].focus();
                                                // Change the onClick attribute
                                                element.setAttribute('onClick', 'dob_Reset(event, this)');
                                                // Add event listener to stop propagation on the select dropdown
                                                document.getElementById('dob').addEventListener('click', function(e) {
                                                    e.stopPropagation();
                                                });
                                            }

                                            function dob_Reset(event, element) {
                                                event.stopPropagation();
                                                let txt                 = document.getElementById('old-text').innerHTML;
                                                // let element             = document.getElementById('col_dob');

                                                element.innerHTML = `
                                                <span class="data-label w-25">Date of Birth</span>
                                                <span class="data-value w-100" id="dob"><?php echo $cuDOB; ?></span>
                                                <input type="hidden" name="dob" id="dob" value="<?php echo set_value('dob', isset($user) ? $user->dob : $cuDOB); ?>">	
                                                `;
                                                // Change the onClick attribute
                                                element.setAttribute('onClick', 'dob_Switch(event, this)');
                                            }
                                        </script>
                                        <!-- Social Security Number data-item -->	
                                        <div class="data-item">
                                            <div class="data-col" id="col_ssn">
                                                <span class="data-label w-25">Social Security Number</span>
                                                <span class="data-value w-100" id="ssn"><?php echo $cuSSN; ?></span>
                                                <input id="ssn" name="ssn" type="hidden" value="<?php echo set_value('ssn', isset($user) ? $user->ssn : $cuSSN); ?>">
                                            </div>
                                            <div class="data-col data-col-end w-15">
                                                <span class="data-more" onclick="ssn_Switch(event, document.getElementById('col_ssn'))"><em class="icon ni ni-forward-ios"></em></span>
                                            </div>
                                        </div>
                                        <script <?= $nonce['script'] ?? '' ?>>
                                            function ssn_Switch(event, element) {
                                                event.stopPropagation();
                                                let txt                 = document.getElementById('ssn').innerText;
                                                let input               = document.getElementById('ssn').innerText;
                                                // let element             = document.getElementById('col_ssn');

                                                element.innerHTML       = `
                                                    <span class="data-label w-25">Social Security Number</span>
                                                    <span class="data-value w-100">
                                                        <span class="d-none" id="old-text">${txt}</span>
                                                        <span class="d-none" id="${input}">${input}</span>
                                                        <div class="<?php echo $formGroup; ?>">      
                                                            <div class="<?php echo $formConCol; ?>">       
                                                                <input type="password" class="<?php echo $formControl; ?>" name="ssn" id="ssn" placeholder="Enter Social Security Number" value="<?php echo set_value('ssn', isset($user) ? $user->ssn : $cuSSN); ?>">	
                                                            </div>
                                                        </div>
                                                    </span>
                                                `;
                                                document.getElementsByTagName('input')[0].focus();
                                                // Change the onClick attribute
                                                element.setAttribute('onClick', 'ssn_Reset(event, this)');
                                                // Add event listener to stop propagation on the select dropdown
                                                document.getElementById('ssn').addEventListener('click', function(e) {
                                                    e.stopPropagation();
                                                });
                                            }

                                            function ssn_Reset(event, element) {
                                                event.stopPropagation();
                                                let txt                 = document.getElementById('old-text').innerHTML;
                                                // let element             = document.getElementById('col_ssn');

                                                element.innerHTML = `
                                                <span class="data-label w-25">Social Security Number</span>
                                                <span class="data-value w-100" id="ssn"><?php echo $cuSSN; ?></span>
                                                <input type="hidden" name="ssn" id="ssn" value="<?php echo set_value('ssn', isset($user) ? $user->ssn : $cuSSN); ?>">	
                                                `;
                                                // Change the onClick attribute
                                                element.setAttribute('onClick', 'ssn_Switch(event, this)');
                                            }
                                        </script>
                                        <script <?= $nonce['script'] ?? '' ?>>
                                            // $(document).ready(function(){
                                            //     $('#ssn').mask('XXX-XX-XXXX');
                                            // });
                                        </script>
                                        <?php
                                        // !! Use the function below to encrypt this before sending to Database 
                                        // $ssn = $_POST['ssn'];

                                        // // Validate SSN format
                                        // if (!preg_match("/^[0-9]{3}-[0-9]{2}-[0-9]{4}$/", $ssn)) {
                                        //     echo "Invalid SSN format. Please enter a valid SSN.";
                                        //     exit;
                                        // }
                                        
                                        // // Encrypt SSN before storing it
                                        // $encryptedSsn = openssl_encrypt($ssn, 'aes-256-cbc', $encryptionKey, 0, $iv);
                                        
                                        // // Now you can store $encryptedSsn in your database
                                        ?>
                                        <!-- Residential Address data-item -->
                                        <div class="data-item">
                                            <div class="data-col" id="col_address">
                                                <span class="data-label w-25">Residential Address</span>
                                                <span class="data-value w-100" id="address"><?php echo $cuFullAddress; ?></span>
                                                <input id="address" name="address" type="hidden" value="<?php echo set_value('address', isset($user) ? $user->address : $cuFullAddress); ?>">
                                            </div>
                                            <div class="data-col data-col-end w-15">
                                                <span class="data-more" onclick="address_Switch(event, document.getElementById('col_address'))"><em class="icon ni ni-forward-ios"></em></span>
                                            </div>
                                        </div>
                                        <script <?= $nonce['script'] ?? '' ?>>
                                            function address_Switch(event, element) {
                                                event.stopPropagation();
                                                let txt                 = document.getElementById('address').innerText;
                                                let input               = document.getElementById('address').innerText;
                                                // let element             = document.getElementById('col_address');

                                                element.innerHTML       = `
                                                    <span class="data-label w-25">Residential Address</span>
                                                    <span class="data-value w-100">
                                                        <span class="d-none" id="old-text">${txt}</span>
                                                        <span class="d-none" id="${input}">${input}</span>
                                                        <div class="<?php echo $formGroup; ?>">      
                                                            <div class="<?php echo $formConCol; ?>">       
                                                                <input type="text" class="<?php echo $formControl; ?>" name="address" id="address" placeholder="Enter Residential Address" value="<?php echo set_value('address', isset($user) ? $user->address : $cuFullAddress); ?>">	
                                                            </div>
                                                        </div>
                                                    </span>
                                                `;
                                                document.getElementsByTagName('input')[0].focus();
                                                // Change the onClick attribute
                                                element.setAttribute('onClick', 'address_Reset(event, this)');
                                                // Add event listener to stop propagation on the select dropdown
                                                document.getElementById('address').addEventListener('click', function(e) {
                                                    e.stopPropagation();
                                                });
                                            }

                                            function address_Reset(event, element) {
                                                event.stopPropagation();
                                                let txt                 = document.getElementById('old-text').innerHTML;
                                                // let element             = document.getElementById('col_address');

                                                element.innerHTML = `
                                                <span class="data-label w-25">Residential Address</span>
                                                <span class="data-value w-100" id="address"><?php echo $cuFullAddress; ?></span>
                                                <input type="hidden" name="address" id="address" value="<?php echo set_value('address', isset($user) ? $user->address : $cuFullAddress); ?>">	
                                                `;
                                                // Change the onClick attribute
                                                element.setAttribute('onClick', 'address_Switch(event, this)');
                                            }
                                        </script>
                                        <!-- Mailing Address data-item -->
                                        <div class="data-item">
                                            <div class="data-col" id="col_mailing_address">
                                                <span class="data-label w-25">Mailing Address</span>
                                                <span class="data-value w-100" id="mailing_address"><?php echo $cuMailingAddress; ?></span>
                                                <input id="mailing_address" name="mailing_address" type="hidden" value="<?php echo set_value('mailing_address', isset($user) ? $user->mailing_address : $cuMailingAddress); ?>">
                                            </div>
                                            <div class="data-col data-col-end w-15">
                                                <span class="data-more" onclick="mailing_address_Switch(event, document.getElementById('col_mailing_address'))"><em class="icon ni ni-forward-ios"></em></span>
                                            </div>
                                        </div>
                                        <script <?= $nonce['script'] ?? '' ?>>
                                            function mailing_address_Switch(event, element) {
                                                event.stopPropagation();
                                                let txt                 = document.getElementById('mailing_address').innerText;
                                                let input               = document.getElementById('mailing_address').innerText;
                                                // let element             = document.getElementById('col_mailing_address');

                                                element.innerHTML       = `
                                                    <span class="data-label w-25">Mailing Address</span>
                                                    <span class="data-value w-100">
                                                        <span class="d-none" id="old-text">${txt}</span>
                                                        <span class="d-none" id="${input}">${input}</span>
                                                        <div class="<?php echo $formGroup; ?>">      
                                                            <div class="<?php echo $formConCol; ?>">       
                                                                <input type="text" class="<?php echo $formControl; ?>" name="mailing_address" id="mailing_address" placeholder="Enter Mailing Address" value="<?php echo set_value('mailing_address', isset($user) ? $user->mailing_address : $cuMailingAddress); ?>">	
                                                            </div>
                                                        </div>
                                                    </span>
                                                `;
                                                document.getElementsByTagName('input')[0].focus();
                                                // Change the onClick attribute
                                                element.setAttribute('onClick', 'mailing_address_Reset(event, this)');
                                                // Add event listener to stop propagation on the select dropdown
                                                document.getElementById('mailing_address').addEventListener('click', function(e) {
                                                    e.stopPropagation();
                                                });
                                            }

                                            function mailing_address_Reset(event, element) {
                                                event.stopPropagation();
                                                let txt                 = document.getElementById('old-text').innerHTML;
                                                // let element             = document.getElementById('col_mailing_address');

                                                element.innerHTML = `
                                                <span class="data-label w-25">Mailing Address</span>
                                                <span class="data-value w-100" id="mailing_address"><?php echo $cuMailingAddress; ?></span>
                                                <input type="hidden" name="mailing_address" id="mailing_address" value="<?php echo set_value('mailing_address', isset($user) ? $user->mailing_address : $cuMailingAddress); ?>">	
                                                `;
                                                // Change the onClick attribute
                                                element.setAttribute('onClick', 'mailing_address_Switch(event, this)');
                                            }
                                        </script>
                                        <!-- Employment Information data-item -->	
                                        <div class="data-item">
                                            <div class="data-col" id="col_employment_info">
                                                <span class="data-label w-25">Employment Information</span>
                                                <span class="data-value w-100" id="employment_info"><?php echo $cuEmployment; ?></span>
                                                <input id="employment_info" name="employment_info" type="hidden" value="<?php echo set_value('employment_info', isset($user) ? $user->employment_info : $cuEmployment); ?>">
                                            </div>
                                            <div class="data-col data-col-end w-15">
                                                <span class="data-more" onclick="employment_info_Switch(event, document.getElementById('col_employment_info'))"><em class="icon ni ni-forward-ios"></em></span>
                                            </div>
                                        </div>
                                        <script <?= $nonce['script'] ?? '' ?>>
                                            function employment_info_Switch(event, element) {
                                                event.stopPropagation();
                                                let txt                 = document.getElementById('employment_info').innerText;
                                                let input               = document.getElementById('employment_info').innerText;
                                                // let element             = document.getElementById('col_employment_info');

                                                element.innerHTML       = `
                                                    <span class="data-label w-25">Employment Information</span>
                                                    <span class="data-value w-100">
                                                        <span class="d-none" id="old-text">${txt}</span>
                                                        <span class="d-none" id="${input}">${input}</span>
                                                        <div class="<?php echo $formGroup; ?>">      
                                                            <div class="<?php echo $formConCol; ?>">       
                                                                <select class="<?php echo $formControl; ?>" style="display:block !important;" id="employment_info" name="employment_info">
                                                                    <option value="Employed">Employed</option>
                                                                    <option value="Unemployed">Unemployed</option>
                                                                    <option value="Self-Employed">Self-Employed</option>
                                                                </select>	
                                                            </div>
                                                        </div>
                                                    </span>
                                                `;
                                                document.getElementsByTagName('input')[0].focus();
                                                // Change the onClick attribute
                                                element.setAttribute('onClick', 'employment_info_Reset(event, this)');
                                                // Add event listener to stop propagation on the select dropdown
                                                document.getElementById('employment_info').addEventListener('click', function(e) {
                                                    e.stopPropagation();
                                                });
                                            }

                                            function employment_info_Reset(event, element) {
                                                event.stopPropagation();
                                                let txt                 = document.getElementById('old-text').innerHTML;
                                                // let element             = document.getElementById('col_employment_info');

                                                element.innerHTML = `
                                                <span class="data-label w-25">Employment Information</span>
                                                <span class="data-value w-100" id="employment_info"><?php echo $cuEmployment; ?></span>
                                                <input type="hidden" name="employment_info" id="employment_info" value="<?php echo set_value('employment_info', isset($user) ? $user->employment_info : $cuEmployment); ?>">	
                                                `;
                                                // Change the onClick attribute
                                                element.setAttribute('onClick', 'employment_info_Switch(event, this)');
                                            }
                                        </script>                      
                                        <!-- Occupation data-item -->
                                        <div class="data-item">
                                            <div class="data-col" id="col_occupation">
                                                <span class="data-label w-25">Occupation</span>
                                                <span class="data-value w-100" id="occupation"><?php echo $cuOccupation; ?></span>
                                                <input id="occupation" name="occupation" type="hidden" value="<?php echo set_value('occupation', isset($user) ? $user->occupation : $cuOccupation); ?>">
                                            </div>
                                            <div class="data-col data-col-end w-15">
                                                <span class="data-more" onclick="occupation_Switch(event, document.getElementById('col_occupation'))"><em class="icon ni ni-forward-ios"></em></span>
                                            </div>
                                        </div>
                                        <script <?= $nonce['script'] ?? '' ?>>
                                            function occupation_Switch(event, element) {
                                                event.stopPropagation();
                                                let txt                 = document.getElementById('occupation').innerText;
                                                let input               = document.getElementById('occupation').innerText;
                                                // let element             = document.getElementById('col_email');

                                                element.innerHTML       = `
                                                    <span class="data-label w-25">Occupation</span>
                                                    <span class="data-value w-100">
                                                        <span class="d-none" id="old-text">${txt}</span>
                                                        <span class="d-none" id="${input}">${input}</span>
                                                        <div class="<?php echo $formGroup; ?>">      
                                                            <div class="<?php echo $formConCol; ?>">       
                                                                <input type="text" class="<?php echo $formControl; ?>" name="occupation" id="occupation" placeholder="Enter Occupation" value="<?php echo set_value('occupation', isset($user) ? $user->occupation : $cuOccupation); ?>">	
                                                            </div>
                                                        </div>
                                                    </span>
                                                `;
                                                document.getElementsByTagName('input')[0].focus();
                                                // Change the onClick attribute
                                                element.setAttribute('onClick', 'occupation_Reset(event, this)');

                                                // Add event listener to stop propagation on the select dropdown
                                                document.getElementById('occupation').addEventListener('click', function(e) {
                                                    e.stopPropagation();
                                                });
                                            }

                                            function occupation_Reset(event, element) {
                                                event.stopPropagation();
                                                let txt                 = document.getElementById('old-text').innerHTML;
                                                // let element             = document.getElementById('col_occupation');

                                                element.innerHTML = `
                                                <span class="data-label w-25">Occupation</span>
                                                <span class="data-value w-100" id="occupation"><?php echo $cuEmail; ?></span>
                                                <input type="hidden" name="occupation" id="occupation" value="<?php echo set_value('occupation', isset($user) ? $user->occupation : $cuOccupation); ?>">	
                                                `;
                                                // Change the onClick attribute
                                                element.setAttribute('onClick', 'occupation_Switch(event, this)');
                                            }
                                        </script>
                                        <!-- Salary data-item -->	 
                                        <div class="data-item">
                                            <div class="data-col" id="col_salary">
                                                <span class="data-label w-25">Salary</span>
                                                <span class="data-value w-100" id="salary"><?php echo $cuSalary; ?></span>
                                                <input id="salary" name="salary" type="hidden" value="<?php echo set_value('salary', isset($user) ? $user->salary : $cuSalary); ?>">
                                            </div>
                                            <div class="data-col data-col-end w-15">
                                                <a class="data-more" onclick="salary_Switch(event, document.getElementById('col_salary'))"><em class="icon ni ni-forward-ios"></em></a>
                                            </div>
                                        </div>
                                        <script <?= $nonce['script'] ?? '' ?>>
                                            function salary_Switch(event, element) {
                                                event.stopPropagation();
                                                let txt = document.getElementById('salary').innerText;
                                                let input = document.getElementById('salary').innerText;

                                                element.innerHTML = `
                                                    <span class="data-label w-25">Salary</span>
                                                    <span class="data-value w-100">
                                                        <span class="d-none" id="old-text">${txt}</span>
                                                        <span class="d-none" id="${input}">${input}</span>
                                                        <div class="<?php echo $formGroup; ?>">      
                                                            <div class="<?php echo $formConCol; ?>">       
                                                                <select class="<?php echo $formControl; ?>" style="display:block !important;" id="salary" name="salary">
                                                                    <option value="Under $25,000">Under $25,000</option>
                                                                    <option value="$25,000 to $50,000">$25,000 to $50,000</option>
                                                                    <option value="$50,000 to $75,000">$50,000 to $75,000</option>
                                                                    <option value="$75,000 to $100,000">$75,000 to $100,000</option>
                                                                    <option value="$100,000 to $150,000">$100,000 to $150,000</option>
                                                                    <option value="$150,000 to $200,000">$150,000 to $200,000</option>
                                                                    <option value="$200,000 to $250,000">$200,000 to $250,000</option>
                                                                    <option value="$250,000 to $500,000">$250,000 to $500,000</option>
                                                                    <option value="Over $500,000">Over $500,000</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                    </span>
                                                `;
                                                document.getElementsByTagName('input')[0].focus();
                                                // Change the onClick attribute
                                                element.setAttribute('onClick', 'salary_Reset(event, this)');

                                                // Add event listener to stop propagation on the select dropdown
                                                document.getElementById('salary').addEventListener('click', function(e) {
                                                    e.stopPropagation();
                                                });
                                            }

                                            function salary_Reset(event, element) {
                                                event.stopPropagation();
                                                let txt = document.getElementById('old-text').innerHTML;

                                                element.innerHTML = `
                                                <span class="data-label w-25">Salary</span>
                                                <span class="data-value w-100" id="salary"><?php echo $cuSalary; ?></span>
                                                <input type="hidden" name="salary" id="salary" value="<?php echo set_value('salary', isset($user) ? $user->salary : $cuSalary); ?>">	
                                                `;
                                                // Change the onClick attribute
                                                element.setAttribute('onClick', 'salary_Switch(event, this)');
                                            }
                                        </script>
                                        <!-- Proof of Identity data-item -->	 
                                        <div class="data-item">
                                            <div class="data-col" id="col_proof_identity">
                                                <span class="data-label w-25">Proof of Identity</span>
                                                <span class="data-value w-100" id="proof_identity"><?php echo $cuProofIdentity; ?></span>
                                                <input id="proof_identity" name="proof_identity" type="hidden" value="<?php echo set_value('proof_identity', isset($user) ? $user->proof_identity : $cuProofIdentity); ?>">
                                            </div>
                                            <div class="data-col data-col-end w-15">
                                                <span class="data-more" onclick="proof_identity_Switch(event, document.getElementById('col_proof_identity'))"><em class="icon ni ni-forward-ios"></em></span>
                                            </div>
                                        </div>
                                        <script <?= $nonce['script'] ?? '' ?>>
                                            function proof_identity_Switch(event, element) {
                                                event.stopPropagation();
                                                let txt                 = document.getElementById('proof_identity').innerText;
                                                let input               = document.getElementById('proof_identity').innerText;
                                                // let element             = document.getElementById('col_proof_identity');

                                                element.innerHTML       = `
                                                    <span class="data-label w-25">Proof of Identity</span>
                                                    <span class="data-value w-100">
                                                        <span class="d-none" id="old-text">${txt}</span>
                                                        <span class="d-none" id="${input}">${input}</span>
                                                        <div class="<?php echo $formGroup; ?>">      
                                                            <div class="<?php echo $formConCol; ?>">       
                                                                <select class="<?php echo $formControl; ?>" style="display:block !important;" id="proof_identity" name="proof_identity">
                                                                    <option value="Passport">Passport</option>
                                                                    <option value="Driver's License">Driver's License</option>
                                                                    <option value="National ID">National ID</option>
                                                                    <!-- Add more options as needed -->
                                                                </select>
                                                            </div>
                                                        </div>
                                                    </span>
                                                `;
                                                document.getElementsByTagName('input')[0].focus();
                                                // Change the onClick attribute
                                                element.setAttribute('onClick', 'proof_identity_Reset(event, this)');

                                                // Add event listener to stop propagation on the select dropdown
                                                document.getElementById('proof_identity').addEventListener('click', function(e) {
                                                    e.stopPropagation();
                                                });
                                            }

                                            function proof_identity_Reset(event, element) {
                                                event.stopPropagation();
                                                let txt                 = document.getElementById('old-text').innerHTML;
                                                // let element             = document.getElementById('col_proof_identity');

                                                element.innerHTML = `
                                                <span class="data-label w-25">Proof of Identity</span>
                                                <span class="data-value w-100" id="proof_identity"><?php echo $cuProofIdentity; ?></span>
                                                <input type="hidden" name="proof_identity" id="proof_identity" value="<?php echo set_value('proof_identity', isset($user) ? $user->proof_identity : $cuProofIdentity); ?>">	
                                                `;
                                                // Change the onClick attribute
                                                element.setAttribute('onClick', 'proof_identity_Switch(event, this)');
                                            }
                                        </script>
                                        <!-- Proof of Address data-item -->	 
                                        <div class="data-item">
                                            <div class="data-col" id="col_proof_address">
                                                <span class="data-label w-25">Proof of Address</span>
                                                <span class="data-value w-100" id="proof_address"><?php echo $cuProofAddress; ?></span>
                                                <input id="proof_address" name="proof_address" type="hidden" value="<?php echo set_value('proof_address', isset($user) ? $user->proof_address : $cuProofAddress); ?>">
                                            </div>
                                            <div class="data-col data-col-end w-15">
                                                <s class="data-more" onclick="proof_address_Switch(event, document.getElementById('col_proof_address'))"><em class="icon ni ni-forward-ios"></em></s>
                                            </div>
                                        </div>
                                        <script <?= $nonce['script'] ?? '' ?>>
                                            function proof_address_Switch(event, element) {
                                                event.stopPropagation();
                                                let txt                 = document.getElementById('proof_address').innerText;
                                                let input               = document.getElementById('proof_address').innerText;
                                                // let element             = document.getElementById('col_proof_address');

                                                element.innerHTML       = `
                                                    <span class="data-label w-25">Proof of Address</span>
                                                    <span class="data-value w-100">
                                                        <span class="d-none" id="old-text">${txt}</span>
                                                        <span class="d-none" id="${input}">${input}</span>
                                                        <div class="<?php echo $formGroup; ?>">      
                                                            <div class="<?php echo $formConCol; ?>">       
                                                                <select class="<?php echo $formControl; ?>" style="display:block !important;" id="proof_address" name="proof_address">
                                                                    <option value="Passport">Passport</option>
                                                                    <option value="Driver's License">Driver's License</option>
                                                                    <option value="National ID">National ID</option>
                                                                    <!-- Add more options as needed -->
                                                                </select>
                                                            </div>
                                                        </div>
                                                    </span>
                                                `;
                                                document.getElementsByTagName('input')[0].focus();
                                                // Change the onClick attribute
                                                element.setAttribute('onClick', 'proof_address_Reset(event, this)');

                                                // Add event listener to stop propagation on the select dropdown
                                                document.getElementById('proof_address').addEventListener('click', function(e) {
                                                    e.stopPropagation();
                                                });
                                            }

                                            function proof_address_Reset(event, element) {
                                                event.stopPropagation();
                                                let txt                 = document.getElementById('old-text').innerHTML;
                                                // let element             = document.getElementById('col_proof_address');

                                                element.innerHTML = `
                                                <span class="data-label w-25">Proof of Address</span>
                                                <span class="data-value w-100" id="proof_address"><?php echo $cuProofAddress; ?></span>
                                                <input type="hidden" name="proof_address" id="proof_address" value="<?php echo set_value('proof_address', isset($user) ? $user->proof_address : $cuProofAddress); ?>">	
                                                `;
                                                // Change the onClick attribute
                                                element.setAttribute('onClick', 'proof_address_Switch(event, this)');
                                            }
                                        </script>  
                                    </div>
                                </form>
                            </div>
                        </div>
                        <div id="features-activated" class="tab-pane fade">
                            <?php //echo view('UserModule/Budget/index/Investor_Assessment/personal_information'); ?>
                            <div class="nk-block-head nk-block-head-lg">
                                <div class="nk-block-between">
                                    <div class="nk-block-head-content">
                                        <h4 class="nk-block-title">MyMI Features &amp; Services</h4>
                                        <div class="nk-block-des">
                                            <p>Choose the right features and solutions to manage your finances and investments.</p>
                                        </div>
                                    </div>
                                    <div class="nk-block-head-content align-self-start d-lg-none">
                                        <a href="#" class="toggle btn btn-icon btn-trigger mt-n1" data-bs-target="userAside"><em class="icon ni ni-menu-alt-r"></em></a>
                                    </div>
                                </div>
                            </div><!-- .nk-block-head -->
                            <div class="nk-block">
                                <div class="nk-data data-list">
                                    <div class="data-head">
                                        <h6 class="overline-title">Choose Your Features &amp; Services</h6>
                                    </div>            
                                    <!-- Personal Budgeting Tool data-item -->
                                    <div class="data-item border-bottom">
                                        <div class="data-col" id="col_pbt">
                                            <span class="data-label w-35"><strong>Personal Budgeting Tool</strong></span>
                                            <span class="data-value w-50" id="pbt"><?php echo $account_informationStatus; ?></span>
                                        </div>
                                        <div class="data-col data-col-end w-25">
                                            <a class="btn btn-primary btn-md text-white"><em class="icon ni ni-plus px-2 text-white"></em><span class="ml-2">Add Now!</span> </a>
                                        </div>
                                    </div>

                                    <!-- Wallet Integration data-item -->
                                    <div class="data-item border-bottom">
                                        <div class="data-col" id="col_wi">
                                            <span class="data-label w-35"><strong>Wallet Integration</strong></span>
                                            <span class="data-value w-50" id="wi"><?php echo $account_informationStatus; ?></span>
                                        </div>
                                        <div class="data-col data-col-end w-25">
                                            <a class="btn btn-primary btn-md text-white"><em class="icon ni ni-plus px-2 text-white"></em><span class="ml-2">Add Now!</span> </a>
                                        </div>
                                    </div>

                                    <!-- Balance Updates data-item -->
                                    <div class="data-item border-bottom">
                                        <div class="data-col" id="col_bu">
                                            <span class="data-label w-35"><strong>Balance Updates</strong></span>
                                            <span class="data-value w-50" id="bu">5 MyMIG / Month</span>
                                        </div>
                                        <div class="data-col data-col-end w-25">
                                            <a class="btn btn-primary btn-md text-white"><em class="icon ni ni-plus px-2 text-white"></em><span class="ml-2">Add Now!</span> </a>
                                        </div>
                                    </div>

                                    <!-- Investments data-item -->
                                    <div class="data-item border-bottom">
                                        <div class="data-col" id="col_investments">
                                            <span class="data-label w-35"><strong>Investments</strong></span>
                                            <span class="data-value w-50" id="investments">1.36 MyMIG / Account + 1 Monthly Update (0.36 MyMIG per Update)</span>
                                        </div>
                                        <div class="data-col data-col-end w-25">
                                            <a class="btn btn-primary btn-md text-white"><em class="icon ni ni-plus px-2 text-white"></em><span class="ml-2">Add Now!</span> </a>
                                        </div>
                                    </div>

                                    <!-- All-In-One Dashboard data-item -->
                                    <div class="data-item border-bottom">
                                        <div class="data-col" id="col_dashboard">
                                            <span class="data-label w-35"><strong>All-In-One Dashboard</strong></span>
                                            <span class="data-value w-50" id="dashboard">20 MyMIG / Month</span>
                                        </div>
                                        <div class="data-col data-col-end w-25">
                                            <a class="btn btn-primary btn-md text-white"><em class="icon ni ni-plus px-2 text-white"></em><span class="ml-2">Add Now!</span> </a>
                                        </div>
                                    </div>

                                    <!-- Liabilities data-item -->
                                    <div class="data-item border-bottom">
                                        <div class="data-col" id="col_liabilities">
                                            <span class="data-label w-35"><strong>Liabilities</strong></span>
                                            <span class="data-value w-50" id="liabilities">0.6 MyMI Gold / Account per Month</span>
                                        </div>
                                        <div class="data-col data-col-end w-25">
                                            <a class="btn btn-primary btn-md text-white"><em class="icon ni ni-plus px-2 text-white"></em><span class="ml-2">Add Now!</span> </a>
                                        </div>
                                    </div>

                                    <!-- Transactions data-item -->
                                    <div class="data-item border-bottom">
                                        <div class="data-col" id="col_transactions">
                                            <span class="data-label w-35"><strong>Transactions</strong></span>
                                            <span class="data-value w-50" id="transactions">1 MyMIG / Month</span>
                                        </div>
                                        <div class="data-col data-col-end w-25">
                                            <a class="btn btn-primary btn-md text-white"><em class="icon ni ni-plus px-2 text-white"></em><span class="ml-2">Add Now!</span> </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <?php if ($investmentOperations === 1) { ?>
                        <div id="investment-summary" class="tab-pane fade">
                            <?php //echo view('UserModule/Budget/index/Investor_Assessment/personal_information'); ?>
                            <div class="nk-block-head nk-block-head-lg">
                                <div class="nk-block-between">
                                    <div class="nk-block-head-content">
                                        <h4 class="nk-block-title">Investment Summary</h4>
                                        <div class="nk-block-des">
                                            <p>Connect your financial banking and checking accounts to determine your Cash-on-Hand/Liquid Assets.</p>
                                        </div>
                                    </div>
                                    <div class="nk-block-head-content align-self-start d-lg-none">
                                        <a href="#" class="toggle btn btn-icon btn-trigger mt-n1" data-bs-target="userAside"><em class="icon ni ni-menu-alt-r"></em></a>
                                    </div>
                                </div>
                            </div><!-- .nk-block-head -->
                            <div class="nk-block">
                                <div class="nk-data data-list">
                                    <div class="data-head">
                                        <h6 class="overline-title">Connect Your Investment Accounts</h6>
                                    </div>            
                                    <?php 
                                    //print_r($userWallets['getUserWallets']['getUserInvestmentWallets']->result_array());
                                    if (!empty($userWallets['getUserWallets']['getUserInvestmentWallets']->result_array())) {
                                        foreach($userWallets['getUserWallets']['getUserInvestmentWallets']->result_array() as $debtWallets) {
                                            echo '
                                            <!-- Personal Budgeting Tool data-item -->
                                            <div class="data-item border-bottom">
                                                <div class="data-col" id="col_pbt">
                                                    <span class="data-label w-35"><strong>' . $debtWallets['id'] . '</strong></span>
                                                    <span class="data-label w-35"><strong>' . $debtWallets['nickname'] . '</strong></span>
                                                    <span class="data-label w-35"><strong>$' . $debtWallets['amount'] . '</strong></span>
                                                    <span class="data-label w-35"><strong>$' . $debtWallets['net_worth'] . '</strong></span>
                                                </div>
                                                <div class="data-col data-col-end w-25">
                                                    <a class="btn btn-primary btn-md text-white"><em class="icon ni ni-plus px-2 text-white"></em><span class="ml-2">Add Now!</span> </a>
                                                </div>
                                            </div>
                                            ';
                                        }
                                    } else {
                                        echo '
                                        <!-- Personal Budgeting Tool data-item -->
                                        <div class="data-item border-bottom">
                                            <div class="data-col" id="col_pbt">
                                                <span class="data-label w-35"><strong>-- Accounts Not Added --</strong></span>
                                            </div>
                                            <div class="data-col data-col-end w-25">
                                                <a class="btn btn-primary btn-md text-white"><em class="icon ni ni-plus px-2 text-white"></em><span class="ml-2">Add Account!</span> </a>
                                            </div>
                                        </div>
                                        ';
                                    }
                                    ?>
                                </div>
                            </div>
                        </div>
                        <div id="last-investment-update" class="tab-pane fade">
                        Last Investment Update
                        </div>
                        <div id="brokerage-integration" class="tab-pane fade">
                        Brokerage Integration
                        </div>
                        <div id="risk-assessment" class="tab-pane fade">
                        Risk Assessment
                        </div>
                        <div id="financial-goals" class="tab-pane fade">
                        Financial Goals
                        </div>
                        <div id="time-horizon" class="tab-pane fade">
                        Time Horizon
                        </div>
                        <div id="financial-rating" class="tab-pane fade">
                        Financial Rating
                        </div>
                        <div id="investment-experience" class="tab-pane fade">
                        Investment Experience
                        </div>
                        <div id="investment-knowledge" class="tab-pane fade">
                        Investment Knowledge
                        </div>
                        <div id="market-sentiment" class="tab-pane fade">
                        Market Sentiment
                        </div>
                        <div id="investment-availability" class="tab-pane fade">
                        Investment Availability 
                        </div>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
