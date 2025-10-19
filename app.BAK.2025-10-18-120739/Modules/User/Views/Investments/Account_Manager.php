<?php
$this->load->helper(['date', 'form']);
$this->config->load('User/Investments/trade_type_inputs', TRUE);

$date = date("F jS, Y");
$hostTime = date("g:i A");
$time = date("g:i A", strtotime($hostTime) - 60 * 60 * 5);

log_message('debug', "Account Manager - Date: $date");
log_message('debug', "Account Manager - Host Time: $hostTime");
log_message('debug', "Account Manager - Adjusted Time: $time");

$orderForm = $this->input->raw_input_stream;
$orderForm = json_decode($orderForm, true);

if (!is_array($orderForm)) {
    log_message('error', 'Invalid input format');
    return false;
}

log_message('debug', 'Account Manager - Received Order: ' . print_r($orderForm, true));

// Your existing code for common fields
$status = 1;
$formMode = $orderForm['form_mode'];
// Dynamic fields based on trade type
$trade_date = $orderForm['trade_date'];
$trade_time = $orderForm['trade_time'];
$trade_type = $orderForm['trade_type'];
if ($trade_type !== 'Options') {
    $position_type = $orderForm['position_type'];
} else {
    $position_type = '';
}
$cuID = $orderForm['user_id'];
$cuEmail = $orderForm['user_email'];
$cuUsername = $orderForm['username'];
// ... (other common fields)

function loadDynamicData($dynamicFields, $orderForm, $trade_type) {
    $dynamicData = [];

    if (is_array($dynamicFields) && !empty($dynamicFields)) {
        foreach ($dynamicFields[$trade_type] as $field) {
            $dynamicData[$field] = $orderForm[$field] ?? null;  // Use null coalescing to avoid undefined index
        }
        log_message('debug', 'Account Manager - $dynamicData: ' . print_r($dynamicData, TRUE));
    } else {
        log_message('debug', 'dynamicFields is empty or not an array');
    }

    return $dynamicData;
}

// Load dynamic fields
log_message('debug', 'Config Item: ' . print_r($this->config->item('user_fields'), true));
$dynamicFields = $this->config->item('user_fields', 'trade_type_inputs');
$dynamicData = loadDynamicData($dynamicFields, $orderForm, $trade_type);

// Convert dynamic data to JSON
$json_user_fields = json_encode($dynamicData);
log_message('debug', 'Account Manager - $json_user_fields: ' . print_r($json_user_fields, TRUE));
// Convert trade_type to category and determine option type
$category = $trade_type;
if ($category === 'Options') {
    $trade_type = $orderForm['option_type'];  // Assuming 'option_type' is either 'call' or 'put'
} else {
    $trade_type = $orderForm['position_type'];  // Assuming 'position_type' is either 'short' or 'long'
}

// Determine order_status and closed fields
$order_status = $orderForm['order_status'] ?? 'OPENING';
log_message('debug', "Account Manager - Order Status: $order_status");  // Debugging line
$closed = ($order_status === 'CLOSING') ? 'true' : 'false';
log_message('debug', "Account Manager - Closed Status: " . ($closed ? 'true' : 'false'));  // Debugging line


// Convert date format
$submitted_date = date("Y-m-d", strtotime($date));
$open_date = date("Y/m/d", strtotime($trade_date));
$open_time = $trade_time ?? 'N/A'; 

// Get trading_account from wallet_id
$this->db->where('id', $orderForm['wallet']);
$query = $this->db->get('bf_users_wallet');
$wallet = $query->row();
$trading_account = $wallet->broker ?? 'N/A';

// Debugging: Log the type and value of $closed
log_message('debug', "Account Manager - Closed Type: " . gettype($closed));
log_message('debug', "Account Manager - Closed Value: " . ($closed ? 'true' : 'false'));

// Refactored $investmentData array
$investmentData = [
    'status' => 'Active',
    'active' => 1,
    'submitted_date' => $submitted_date,
    'open_date' => $open_date,
    'open_time' => $open_time,
    'category' => $category,
    'trade_type' => $trade_type,
    'order_status' => $order_status,
    'closed' => $closed,
    'user_id' => $cuID,
    'user_email' => $cuEmail,
    'username' => $cuUsername,
    'symbol' => $orderForm['symbol'],
    'shares' => $orderForm['shares'],
    'entry_price' => $orderForm['price'],
    'total_trade_cost' => $orderForm['cost'],
    'wallet' => $orderForm['wallet'],
    'trading_account' => $trading_account,
    'json_user_fields' => $json_user_fields
];
log_message('debug', 'Account Manager - $investmentData: ' . print_r($investmentData, TRUE));
// Insert data and handle errors
$result = $this->db->insert('bf_users_trades', $investmentData);
if (!$result) {
    log_message('error', 'DB Insert Error: ' . $this->db->error()['message']);
} else {
    log_message('debug', 'Record inserted successfully');
}
log_message('debug', 'Last DB Query: ' .  $this->db->last_query());
log_message('debug', 'Account Manager - Insert Result: ' . ($result ? 'Success' : 'Failure'));

return $result;

// // Database insertion
// if ($formMode === 'Add') {
//    return $this->db->insert('bf_users_investments', $investmentData);
//     // if ($this->db->insert('bf_users_investments', $investmentData)) {
//     //     $investmentID = $this->db->insert_id();
//     //     if (!empty($investmentID)) {
//     //         $responseData = ['investmentID' => $investmentID];
//     //         $responseJSON = json_encode($responseData);
//     //         echo $responseJSON;
//     //     }
//     // }
// } elseif ($formMode === 'Edit') {
//     $this->db->where('id', $investmentID);
//     return $this->db->update('bf_users_investments', $investmentData);
// } elseif ($formMode === 'Copy') {
//     return $this->db->insert('bf_users_investments', $investmentData);
// }
?>
