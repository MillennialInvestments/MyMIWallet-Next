<?php
$this->load->helper(['date', 'form']);
// $this->config->load('User/Investments/trade_type_inputs', TRUE);

$date = date("F jS, Y");
$hostTime = date("g:i A");
$time = date("g:i A", strtotime($hostTime) - 60 * 60 * 5);

$rawInput = $this->input->raw_input_stream;
log_message('debug', 'Raw Input: ' . $rawInput);  // Debugging Line 1
$data = json_decode($rawInput, true);
log_message('debug', 'Parsed Data: ' . print_r($data, true));  // Debugging Line 2

if ($data) {
    extract($data);
    log_message('debug', 'Extracted Variables: ' . print_r(get_defined_vars(), true));  // Debugging Line 3

    $marketingData = [
        'id' => $account_id,
        'status' => 1,
        'escalated' => $escalated,
        'type' => $type,
        'name' => $name,
        'created_on' => $date,
        'created_by' => $user_id,
        'assigned_on' => $date,
        'assigned_to' => $assigned_to,
        'completed_on' => '',
        'description' => $description,
        'in_app' => $notification,
        'email' => $email,
        'discord' => $discord,
        'facebook' => $facebook,
    ];
    log_message('debug', 'Marketing Data: ' . print_r($marketingData, true));  // Debugging Line 4
    $responseMessage = '';
    $logMessage = '';

    if ($this->marketing_model->add_marketing_campaign($marketingData)) {
        log_message('error', 'DB Insert Error: ' . $this->db->error()['message']);  // Debugging Line 5
        $responseMessage = "$configMode created";
        $logMessage = "$configMode created by Team Member: $user_id";
        log_message('debug', $logMessage);
        echo json_encode(['status' => 'success', 'message' => $responseMessage]);
    } else {
        $responseMessage = "An error occurred";
        $logMessage = "ERROR: There was an issue creating the $configMode: $marketingData";
        log_message('error', $logMessage);
        echo json_encode(['status' => 'error', 'message' => $responseMessage]);
    }
} else {
    http_response_code(400);
    echo json_encode(["status" => "bad request"]);
}
