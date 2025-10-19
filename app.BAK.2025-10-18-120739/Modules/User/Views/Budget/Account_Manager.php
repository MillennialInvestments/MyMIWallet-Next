<?php
$this->load->helper('date');
$date                                               = date("F jS, Y");
$hostTime                                           = date("g:i A");
$time 						                        = date("G:i A");
$orderForm								            = trim(file_get_contents("php://input"));
$orderForm								            = json_decode($orderForm, true);

// GET Request Defined Variables
$status									            = 1;
$beta									            = $orderForm['beta'];
$formMode                                           = $orderForm['form_mode']; 
$user_id								            = $orderForm['user_id'];
$user_email 							            = $orderForm['user_email'];
$username    							            = $orderForm['username'];
$accountID                                          = $orderForm['account_id'];
$account_type  							            = $orderForm['account_type'];
$paid                                               = $orderForm['paid'];

// $date                                               = date_create_from_format("j-M-Y",$orderForm['designated_date']);
// $designated_date                                    = $orderForm['designated_date'];
$nickname    							            = $orderForm['nickname'];
$net_amount							                = str_replace(',', '', $orderForm['net_amount']);
if (!empty($orderForm['gross_amount'])) {
    $gross_amount   	                            = str_replace(',', '', $orderForm['gross_amount']);
} else {
    $gross_amount                                   = 0; 
}
// if (!empty($orderForm['monthly_payment'])) {
//     $monthly_payment   	                                = str_replace(',', '', $orderForm['monthly_payment']);
// } else {
//     $monthly_payment                                   = 0; 
// }
$accountRecurringAccount   	                        = $orderForm['recurring_account'];
$source_type    					                = $orderForm['source_type'];
if ($formMode === 'Add') {
    if (preg_match('(Debt|Loan|Mortgage)', $source_type) === 1) {
        $is_debt                                    = 1; 
    } else {
        $is_debt                                    = 0;
    }
    if ($accountRecurringAccount === 'Yes') {
        $accountRecurringPrimary 	                = 'Yes';
    } else {
        $accountRecurringPrimary 	                = 'No';
    }
    $accountRecurringPrimaryID 	                    = 0;
    $designated_date_override                       = '';
    $dateTranslator                                 = strtotime($orderForm['designated_date']);
    $designated_date                                = date('m/d/Y', $dateTranslator);
    $month                                          = date('m', $dateTranslator);
    $day                                            = date('d', $dateTranslator);
    $year                                           = date('Y', $dateTranslator);
    
} elseif ($formMode === 'Edit') {
    $is_debt                                        = $orderForm['is_debt'];
    $accountRecurringPrimary 	                    = $orderForm['recurring_account'];
    $accountRecurringPrimaryID 	                    = $orderForm['recurring_account_id'];
    // // If Designated Date Override is required or activated
    // $designated_date_override                       = date('m-d-Y', strtotime($orderForm['designated_date_override']));
    // if (!empty($designated_date_override)) {
    //     $dateTranslator                             = strtotime($orderForm['designated_date_override']);
    //     $designated_date                            = date('m-d-Y', $dateTranslator);
    // } else {
    //     $dateTranslator                             = strtotime($orderForm['designated_date']);
    //     $designated_date                            = $orderForm['designated_date'];
    // }
    $designated_date                                = $orderForm['designated_date'];
    $dateTranslator                                 = $orderForm['designated_date'];
    $month                                          = date('m', strtotime($dateTranslator));
    $day                                            = date('d', strtotime($dateTranslator));
    $year                                           = date('Y', strtotime($dateTranslator));
} elseif ($formMode === 'Copy') { 
    $is_debt                                        = $orderForm['is_debt'];
    $accountRecurringPrimary 	                    = $orderForm['recurring_account'];
    $accountRecurringPrimaryID 	                    = $orderForm['recurring_account_id'];
    // // If Designated Date Override is required or activated
    // $designated_date_override                       = date('m-d-Y', strtotime($orderForm['designated_date_override']));
    // if (!empty($designated_date_override)) {
    //     $dateTranslator                             = strtotime($orderForm['designated_date_override']);
    //     $designated_date                            = date('m-d-Y', $dateTranslator);
    // } else {
    //     $dateTranslator                             = strtotime($orderForm['designated_date']);
    //     $designated_date                            = $orderForm['designated_date'];
    // }
    $designated_date                                = $orderForm['designated_date'];
    $dateTranslator                                 = $orderForm['designated_date'];
    $month                                          = date('m', strtotime($dateTranslator));
    $day                                            = date('d', strtotime($dateTranslator));
    $year                                           = date('Y', strtotime($dateTranslator));
}
$intervals    							            = $orderForm['intervals'];
$initial_weeks_left                                 = 0; 
$accountData							            = array(
    'status'							            => $status,
    'beta'								            => $beta,
    'mode'                                          => $formMode,
    'created_by'						            => $user_id,
    'created_by_email'	    			            => $user_email,
    'unix_timestamp'				                => time(),
    'designated_date'			                    => $designated_date,
    // // If Designated Date Override is required or activated, read line
    // 'designated_date_override'			            => $designated_date_override,
    'initial_weeks_left'                            => $initial_weeks_left,
    'month'                                         => $month, 
    'day'                                           => $day,
    'year'                                          => $year,
    'time'                                          => date("H:i:s A"),
    'username'							            => $username,
    'name'							                => $nickname,
    // 'monthly_payment'                               => $monthly_payment,
    'net_amount'						            => $net_amount,
    'gross_amount'						            => $gross_amount,
    'paid'                                          => $paid,
    'recurring_account'				                => $accountRecurringAccount,
    'recurring_account_primary'                     => $accountRecurringPrimary,
    'account_type'					                => $account_type,
    'source_type'					                => $source_type,
    'is_debt'                                       => $is_debt,
    'intervals'							            => $intervals,
);

if ($formMode === 'Add') {
    if ($is_debt === 1) {
        $debtData                                   = array(
            'beta'                                  => $beta,
            'status'                                => $status,
            'date'                                  => $date,
            'time'                                  => $time,
            'user_id'                               => $user_id,
            'user_email'                            => $user_email,
            'username'                              => $username,
            'account_type'                          => $account_type,
            'debtor'                                => $nickname,
            'available_balance'                     => $gross_amount,
            'current_balance'                       => $net_amount,
            // 'monthly_payment'                       => $monthly_payment,
        );
        $this->db->insert('bf_users_debt_accounts', $debtData); 

        if ($this->db->insert('bf_users_budgeting', $accountData)) {
            if ($accountData['recurring_account'] === 'Yes') {
                $accountID                              = $this->db->insert_id(); 
                if (!empty($accountID)) { 
                    // After processing the form data and before returning the response
                    $responseData = array(
                        'accountID' => $accountID,
                        'recurringAccount' => $accountRecurringAccount,
                    );
    
                    // Encode the data as JSON
                    $responseJSON = json_encode($responseData);
    
                    // Return the response JSON
                    echo $responseJSON;
    
                }
            } else {
                $accountID                              = $this->db->insert_id(); 
                if (!empty($accountID)) { 
                    // After processing the form data and before returning the response
                    $responseData = array(
                        'accountID' => $accountID,
                        'recurringAccount' => $accountRecurringAccount,
                    );
    
                    // Encode the data as JSON
                    $responseJSON = json_encode($responseData);
    
                    // Return the response JSON
                    echo $responseJSON;
    
                }
            }
        }
    } else {
        if ($this->db->insert('bf_users_budgeting', $accountData)) {
            if ($accountData['recurring_account'] === 'Yes') {
                $accountID                              = $this->db->insert_id(); 
                if (!empty($accountID)) { 
                    // After processing the form data and before returning the response
                    $responseData = array(
                        'accountID' => $accountID,
                        'recurringAccount' => $accountRecurringAccount,
                    );

                    // Encode the data as JSON
                    $responseJSON = json_encode($responseData);

                    // Return the response JSON
                    echo $responseJSON;

                }
            } else {
                $accountID                              = $this->db->insert_id(); 
                if (!empty($accountID)) { 
                    // After processing the form data and before returning the response
                    $responseData = array(
                        'accountID' => $accountID,
                        'recurringAccount' => $accountRecurringAccount,
                    );
    
                    // Encode the data as JSON
                    $responseJSON = json_encode($responseData);
    
                    // Return the response JSON
                    echo $responseJSON;
    
                }
            }
        }
    }
} elseif ($formMode === 'Edit') {
    // if ($accountRecurringPrimary === 'Yes') {
    //     $this->db->where('id', $accountID); 
    //     return $this->db->update('bf_users_budgeting', $accountData);     
    // } else {        
    //     $this->db->where('id', $accountID); 
    //     return $this->db->update('bf_users_budgeting', $accountData);     
    // }
    $this->db->where('id', $accountID); 
    return $this->db->update('bf_users_budgeting', $accountData);    
    // // Update Other Related Records
    // $updateOriginalRecord                           = $this->db->update('bf_users_budgeting', $accountData);    
    // if ($updateOriginalRecord) {
    //     $this->db->where('name', $nickname); 
    //     $this->db->where('status', 1); 
    //     $this->db->where('paid', 0); 
    //     return $this->db->update('bf_users_budgeting', $accountData); 
    // }  
} elseif ($formMode === 'Copy') {
    return $this->db->insert('bf_users_budgeting', $accountData); 
}
?>
<?php
// !! ChatGPT 4 Auto-generated Refactored Code - 10/15/2023
// header('Content-Type: application/json');
// $this->load->helper('date');

// $date = date("F jS, Y");
// $hostTime = date("g:i A");
// $time = date("g:i A", strtotime($hostTime) - 60 * 60 * 5);

// $orderForm = json_decode(file_get_contents('php://input'), true);

// if ($orderForm) {
//     extract($orderForm);

//     $status = 1;
//     $beta = $orderForm['beta'];
//     $formMode = $orderForm['form_mode'];
//     $user_id = $orderForm['user_id'];
//     $user_email = $orderForm['user_email'];
//     $username = $orderForm['username'];
//     $accountID = $orderForm['account_id'];
//     $account_type = $orderForm['account_type'];
//     $paid = $orderForm['paid'];
//     $nickname = $orderForm['nickname'];
//     $net_amount = str_replace(',', '', $orderForm['net_amount']);
//     $gross_amount = !empty($orderForm['gross_amount']) ? str_replace(',', '', $orderForm['gross_amount']) : 0;
//     $accountRecurringAccount = $orderForm['recurring_account'];
//     $source_type = $orderForm['source_type'];
//     $intervals = $orderForm['intervals'];
//     $initial_weeks_left = 0;

//     $accountData = [
//         'status' => $status,
//         'beta' => $beta,
//         'mode' => $formMode,
//         'created_by' => $user_id,
//         'created_by_email' => $user_email,
//         'unix_timestamp' => time(),
//         'designated_date' => $designated_date,
//         'initial_weeks_left' => $initial_weeks_left,
//         'month' => $month,
//         'day' => $day,
//         'year' => $year,
//         'time' => date("H:i:s A"),
//         'username' => $username,
//         'name' => $nickname,
//         'net_amount' => $net_amount,
//         'gross_amount' => $gross_amount,
//         'paid' => $paid,
//         'recurring_account' => $accountRecurringAccount,
//         'recurring_account_primary' => $accountRecurringPrimary,
//         'account_type' => $account_type,
//         'source_type' => $source_type,
//         'is_debt' => $is_debt,
//         'intervals' => $intervals,
//     ];

//     if ($formMode === 'Add') {
//         // Your existing 'Add' logic here
//         $this->db->insert('bf_users_budgeting', $accountData);
//         if ($accountData['recurring_account'] === 'Yes') {
//             $accountID = $this->db->insert_id();
//             if (!empty($accountID)) {
//                 $responseData = [
//                     'accountID' => $accountID,
//                     'recurringAccount' => $accountRecurringAccount,
//                 ];
//                 echo json_encode($responseData);
//             }
//         }
//     } elseif ($formMode === 'Edit') {
//         // Your existing 'Edit' logic here
//         $this->db->where('id', $accountID);
//         $this->db->update('bf_users_budgeting', $accountData);
//     } elseif ($formMode === 'Copy') {
//         // Your existing 'Copy' logic here
//         $this->db->insert('bf_users_budgeting', $accountData);
//     }

//     echo json_encode(['status' => 'success', 'message' => 'Operation completed successfully']);
// } else {
//     http_response_code(400);
//     echo json_encode(['status' => 'bad request']);
// }
?>
