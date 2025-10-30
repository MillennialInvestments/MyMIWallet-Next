<?php
// application/modules/User/views/Budget/Account_Manager.php
header('Content-Type: application/json');
$this->load->helper('date');
$date = date("F jS, Y");
$hostTime = date("g:i A");
$time = date("g:i A", strtotime($hostTime) - 60 * 60 * 5);
$orderForm = trim(file_get_contents("php://input"));
$orderForm = json_decode($orderForm, true);

if (json_last_error() != JSON_ERROR_NONE) {
    log_message('error', 'Error in JSON format: ' . json_last_error_msg());
    echo json_encode(['status' => 'error', 'message' => 'Invalid JSON format']);
    exit;
}

// GET Request Defined Variables
$accountRecurringPrimary                            = '';
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
    if (preg_match('/(Debt|Loan|Mortgage)/', $source_type) === 1) {
        $is_debt = 1; 
    } else {
        $is_debt = 0;
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
    'initial_weeks_left'                            => $initial_weeks_left,
    'month'                                         => $month, 
    'day'                                           => $day,
    'year'                                          => $year,
    'time'                                          => date("H:i:s A"),
    'username'							            => $username,
    'name'							                => $nickname,
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
        $this->db->where('nickname', $nickname);
        $existingRecordCheck = $this->db->get('bf_users_debt_accounts');

        if ($existingRecordCheck->num_rows() > 0) {
            $existingRecord = $existingRecordCheck->row();
            $updateData = array(
                'status' => $status,
                'date' => $date,
                'time' => $time,
                'available_balance' => $gross_amount,
                'current_balance' => $net_amount,
            );

            $this->db->where('nickname', $nickname);
            if (!$this->db->update('bf_users_debt_accounts', $updateData)) {
                log_message('error', 'Database bf_users_debt_accounts update failed: ' . $this->db->error_message());
                echo json_encode(['status' => 'error', 'message' => 'Database bf_users_debt_accounts update failed']);
                exit;
            }
        } else {
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
            if ($this->db->insert('bf_users_budgeting', $accountData)) {
                if ($accountData['recurring_account'] === 'Yes') {
                    // Combine all the response data into a single array
                    $responseData = array(
                        'accountID' => isset($accountID) ? $accountID : '',
                        'redirectURL' => isset($redirectURL) ? $redirectURL : site_url('/Budget'),
                        'status' => 'success',
                        'message' => 'Operation successful'
                    );

                    // Output the final JSON response
                    echo json_encode($responseData);
                    exit;
                } else {
                    // Combine all the response data into a single array
                    $responseData = array(
                        'accountID' => isset($accountID) ? $accountID : '',
                        'redirectURL' => site_url('/Budget'),
                        'status' => 'success',
                        'message' => 'Operation successful'
                    );

                    // Output the final JSON response
                    echo json_encode($responseData);
                    exit;
                }
            } else {
                // Handle failure...
                $responseData = array(
                    'status' => 'error',
                    'message' => 'Database insert failed'
                );

                // Output the final JSON response
                echo json_encode($responseData);
                exit;
            }
            // if (!$this->db->insert('bf_users_debt_accounts', $debtData)) {
            //     log_message('error', 'Database bf_users_debt_accounts insert failed: ' . $this->db->error_message());
            //     echo json_encode(['status' => 'error', 'message' => 'Database bf_users_debt_accounts update failed']);
            // } else {
            //     if ($this->db->insert('bf_users_budgeting', $accountData)) {
            //         if ($accountData['recurring_account'] === 'Yes') {
            //             $accountID                      = $this->db->insert_id(); 
            //             // After processing the form data and before returning the response
            //             log_message('debug', '$accountID Not Empty: ' . $accountID);
            //             $redirectURL = site_url('Budget/Recurring-Schedule/' . $accountID); 
            //             log_message('debug', '$accountID: ' . $accountID);
            //             log_message('debug', '$redirectURL: ' . $redirectURL);
            //             if (!empty($accountID)) { 
            //                 // After processing the form data and before returning the response
            //                 $responseData               = array(
            //                     'accountID'             => $accountID,
            //                     'redirectURL'           => $redirectURL,
            //                 );
            
            //                 // Encode the data as JSON
            //                 $responseJSON = json_encode($responseData);
            
            //                 // Return the response JSON
            //                 echo $responseJSON;
            //                 // exit;
            
            //             } else {
            //                 $responseData               = array(
            //                     'accountID'             => '', 
            //                     'redirectURL'           => site_url('/Budget'),
            //                 );
            
            //                 // Encode the data as JSON
            //                 $responseJSON = json_encode($responseData);
            
            //                 // Return the response JSON
            //                 echo $responseJSON;
            //                 // exit;
            //             }
            //         } else {
            //             $responseData               = array(
            //                 'accountID'             => '', 
            //                 'redirectURL'           => site_url('/Budget'),
            //             );
        
            //             // Encode the data as JSON
            //             $responseJSON = json_encode($responseData);
        
            //             // Return the response JSON
            //             echo $responseJSON;
            //             // exit;
            //         }
            //     } else {
            //         log_message('error', 'Database bf_users_budgeting insert failed: ' . $this->db->error_message());
            //         echo json_encode(['status' => 'error', 'message' => 'Database bf_users_debt_accounts update failed']);
            //     }
            // }
        }
    } else {
        if ($this->db->insert('bf_users_budgeting', $accountData)) {
            if ($accountData['recurring_account'] === 'Yes') {
                $accountID                      = $this->db->insert_id(); 
                // After processing the form data and before returning the response
                log_message('debug', '$accountID Not Empty: ' . $accountID);
                $redirectURL = site_url('Budget/Recurring-Schedule/' . $accountID); 
                log_message('debug', '$accountID: ' . $accountID);
                log_message('debug', '$redirectURL: ' . $redirectURL);
                if (!empty($accountID)) { 
                    // After processing the form data and before returning the response
                    $responseData               = array(
                        'accountID'             => $accountID,
                        'redirectURL'           => $redirectURL,
                    );
    
                    // Encode the data as JSON
                    $responseJSON = json_encode($responseData);
    
                    // Return the response JSON
                    echo $responseJSON;
                    // exit;
    
                } else {
                    $responseData               = array(
                        'accountID'             => '', 
                        'redirectURL'           => site_url('/Budget'),
                    );
    
                    // Encode the data as JSON
                    $responseJSON = json_encode($responseData);
    
                    // Return the response JSON
                    echo $responseJSON;
                    // exit;
                }
            }
        }
    }
} elseif ($formMode === 'Edit') {
    $this->db->where('id', $accountID);
    if (!$this->db->update('bf_users_budgeting', $accountData)) {
        log_message('error', 'Database bf_users_budgeting update failed: ' . $this->db->error_message());
        echo json_encode(['status' => 'error', 'message' => 'Database update failed']);
        exit;
    }
} elseif ($formMode === 'Copy') {
    if (!$this->db->insert('bf_users_budgeting', $accountData)) {
        log_message('error', 'Database bf_users_budgeting insert failed: ' . $this->db->error_message());
        echo json_encode(['status' => 'error', 'message' => 'Database insert failed']);
        exit;
    }
}
// Successful operation response
echo json_encode(['status' => 'success', 'message' => 'Operation successful']);
?>
