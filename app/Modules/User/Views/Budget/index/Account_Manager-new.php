<?php
// Load date helper
$this->load->helper('date');

try {
    initializeDateTime($date, $hostTime, $time);
    log_message('debug', "Initialized date and time variables");

    $orderForm = fetchAndDecodeJSONInput();
    log_message('debug', "Decoded JSON input");

    extractOrderFormVariables($orderForm, $status, $beta, $formMode, $user_id, $user_email, $username, $accountID, $account_type, $paid, $nickname, $net_amount, $gross_amount, $accountRecurringAccount, $source_type, $is_debt, $accountRecurringPrimary, $accountRecurringPrimaryID, $designated_date_override, $designated_date, $month, $day, $year, $intervals, $initial_weeks_left, $accountData);
    log_message('debug', "Extracted variables from the order form");

    switch ($formMode) {
        case 'Add':
            processAddForm($orderForm, $accountData, $is_debt, $debtData);
            log_message('debug', "Processed 'Add' form");
            break;

        case 'Edit':
            processEditForm($orderForm, $accountData, $accountID);
            log_message('debug', "Processed 'Edit' form");
            break;

        case 'Copy':
            processCopyForm($orderForm, $accountData);
            log_message('debug', "Processed 'Copy' form");
            break;

        default:
            throw new Exception("Invalid form mode: $formMode");
    }
} catch (Exception $e) {
    log_message('error', $e->getMessage());
    echo $e->getMessage();  // Only for debugging, remove in production
}

// --- Helper Functions ---

function initializeDateTime(&$date, &$hostTime, &$time) {
    $date = date("F jS, Y");
    $hostTime = date("g:i A");
    $time = date("g:i A", strtotime($hostTime) - 60 * 60 * 5);
}

function fetchAndDecodeJSONInput() {
    $orderForm = trim(file_get_contents("php://input"));
    return json_decode($orderForm, true);
}

// Debug log function
function debugLog($message) {
    // You could integrate this with a more advanced logging system if needed
    log_message('debug', $message);
    // error_log("[DEBUG] $message");
}

// Error log function
function errorLog($message) {
    // Implement real-time alerts here
    // error_log("[ERROR] $message");
    log_message('error', $message);
    // You could also send an email, SMS, or other types of alerts
}

// Extract variables from the order form
function extractOrderFormVariables(&$orderForm, &$status, &$beta, &$formMode, &$user_id, &$user_email, &$username, &$accountID, &$account_type, &$paid, &$nickname, &$net_amount, &$gross_amount, &$accountRecurringAccount, &$source_type, &$is_debt, &$accountRecurringPrimary, &$accountRecurringPrimaryID, &$designated_date_override, &$designated_date, &$month, &$day, &$year, &$intervals, &$initial_weeks_left, &$accountData) {
    // This function directly translates your existing code for variable extraction.
    $formMode = $orderForm['form_mode'];
    $user_id = $orderForm['user_id'];
    $user_email = $orderForm['user_email'];
    $username = $orderForm['username'];
    $accountID = $orderForm['account_id'];
    $account_type = $orderForm['account_type'];
    $paid = $orderForm['paid'];
    $nickname = $orderForm['nickname'];
    $net_amount = str_replace(',', '', $orderForm['net_amount']);
    $gross_amount = !empty($orderForm['gross_amount']) ? str_replace(',', '', $orderForm['gross_amount']) : 0;
    $accountRecurringAccount = $orderForm['recurring_account'];
    $source_type = $orderForm['source_type'];
    $is_debt = ($formMode === 'Add' && preg_match('(Debt|Loan|Mortgage)', $source_type) === 1) ? 1 : $orderForm['is_debt'];
    $accountRecurringPrimary = $accountRecurringAccount === 'Yes' ? 'Yes' : 'No';
    $accountRecurringPrimaryID = $orderForm['recurring_account_id'] ?? 0;
    $designated_date_override = $orderForm['designated_date_override'] ?? '';
    $dateTranslator = strtotime($orderForm['designated_date']);
    $designated_date = date('m/d/Y', $dateTranslator);
    $month = date('m', $dateTranslator);
    $day = date('d', $dateTranslator);
    $year = date('Y', $dateTranslator);
    $intervals = $orderForm['intervals'];
    $initial_weeks_left = 0;
    // ... (add the rest of your variable extraction logic here)
}

// Process 'Add' form
function processAddForm(&$orderForm, &$accountData, &$is_debt, &$debtData) {
    $CI =& get_instance();  // Get CodeIgniter instance for database operations
    
    // Check if the account is a debt account
    if ($is_debt === 1) {
        // Insert the debt information into 'bf_users_debt_accounts'
        $CI->db->insert('bf_users_debt_accounts', $debtData);
        
        // Insert the account information into 'bf_users_budgeting'
        if ($CI->db->insert('bf_users_budgeting', $accountData)) {
            
            // Check if the account is a recurring account
            if ($accountData['recurring_account'] === 'Yes') {
                $accountID = $CI->db->insert_id();
                
                if (!empty($accountID)) {
                    // Your existing logic for handling the response in 'Add' mode can go here
                    // Prepare response data
                    $responseData = array(
                        'accountID' => $accountID,
                        'recurringAccount' => $accountData['recurring_account']
                    );
                    
                    // Encode the response data as JSON
                    $responseJSON = json_encode($responseData);
                    
                    // Return the response JSON
                    echo $responseJSON;
                }
            }
        }
    } else {
        // Handle non-debt accounts
        if ($CI->db->insert('bf_users_budgeting', $accountData)) {
            
            // Check if the account is a recurring account
            if ($accountData['recurring_account'] === 'Yes') {
                $accountID = $CI->db->insert_id();
                
                if (!empty($accountID)) {
                    // Your existing logic for handling the response in 'Add' mode can go here
                    // Prepare response data
                    $responseData = array(
                        'accountID' => $accountID,
                        'recurringAccount' => $accountData['recurring_account']
                    );
                    
                    // Encode the response data as JSON
                    $responseJSON = json_encode($responseData);
                    
                    // Return the response JSON
                    echo $responseJSON;
                }
            }
        }
    }
}

// Process 'Edit' form
function processEditForm(&$orderForm, &$accountData, $accountID) {
    $CI =& get_instance();  // Get CodeIgniter instance for database operations

    // Uncomment this to update other related records
    $updateOriginalRecord = $CI->db->update('bf_users_budgeting', $accountData);
    if ($updateOriginalRecord) {
        $CI->db->where('name', $nickname);
        $CI->db->where('status', 1);
        $CI->db->where('paid', 0);
        return $CI->db->update('bf_users_budgeting', $accountData);
    }
    
}

// Process 'Copy' form
function processCopyForm(&$orderForm, &$accountData) {
    $CI =& get_instance();
    if ($CI->db->insert('bf_users_budgeting', $accountData)) {
        log_message('debug', "Successfully copied account data");
    } else {
        log_message('error', "Failed to copy account data");
    }
}
?>
