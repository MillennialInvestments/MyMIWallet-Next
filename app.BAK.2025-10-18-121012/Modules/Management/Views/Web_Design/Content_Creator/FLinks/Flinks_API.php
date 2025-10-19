
<!-- Flinks Connect -->
<?php 
    $cuID                                           = $_SESSION['allSessionData']['userAccount']['cuID'];
    $cuEmail                                        = $_SESSION['allSessionData']['userAccount']['cuEmail'];
    $cuUsername                                     = $_SESSION['allSessionData']['userAccount']['cuUsername'];
    $betaConfig                                     = $this->config->item('beta');
    if ($betaConfig === 1) {
        $beta                                       = 'Yes';
    } else {
        $beta                                       = 'No'; 
    };
    // Set Brokerage
    $broker                                         = 'F Links';
    // Begin TD Ameritrade Process

    // Capture ID (Most Likely "1") from URL
    // $id                                             = $this->uri->segment(4);
    // // Pull "loginID" && "institution" from URL Query Parameters
    // $loginId                                        = $this->input->get('loginId');
    // $institution                                    = $this->input->get('institution');
    
    // Pre-set Configuartions
    $loginId                                        = 'af9c2f59-461f-40cd-d383-08d731541b7b';
    $institution                                    = 'FlinksCapital';


    // Set TD Ameritrade 
    $grant_type                                     = 'authorization_code';
    $access_type                                    = 'offline';
    $refresh_code                                   = '';
    // Decode/Encode (Potentially could be optimized)
    $decode                                         = urldecode($code);
    $newcode                                        = urlencode($code);

    // Set Redirect URL
    $redirect_uri                                   = urlencode('https://www.mymiwallet.com/index.php/Link-Account/TD-Ameritrade/1');
    // Set POST Fields for TD Ameritrade 30-Min Access Code & Refresh Token Generation
    $post_fields                                    = 'grant_type=' . $grant_type . '&refresh=&access_type=' . $access_type . '&code=' . $newcode . '&client_id=' . $client_id . '&redirect_uri=' . $redirect_uri;
    $headers                                        = array();
    $headers[]                                      = 'Content-Type: application/x-www-form-urlencoded';
    // Conduct CURL Requests
    $curl 						                    = curl_init();
    curl_setopt_array($curl, array(
        CURLOPT_URL                                 => 'https://api.tdameritrade.com/v1/oauth2/token',
        CURLOPT_RETURNTRANSFER                      => 1,
        CURLOPT_POST                                => 1,
        CURLOPT_POSTFIELDS                          => $post_fields,
        CURLOPT_HTTPHEADER                          => $headers,
    ));
    $response 					                    = curl_exec($curl);
    $err 						                    = curl_error($curl);

    curl_close($curl);
    // Json_decode $response -> new $response Array
    $response 					                    = json_decode($response, true); //because of true, it's in an array$grant_type                 = 'authorization_code';
    // Identify Refresh Token
    $refresh_token                                  = trim(urlencode($response['refresh_token']), " ");
    // Set 90-Day Access Code Parameters
    $ref_grant_type                                 = 'refresh_token';
    $ref_post_fields                                = 'grant_type=' . $ref_grant_type . '&refresh_token=' . $refresh_token . '&access_type=&code=&client_id=' . $client_id . '&redirect_uri=';
    $ref_headers                                    = array();
    $ref_headers[]                                  = 'Content-Type: application/x-www-form-urlencoded';
    // Initiate 90-Day Access Code Generation via CURL
    $refresh_curl 					                = curl_init();
    curl_setopt_array($refresh_curl, array(
        CURLOPT_URL                                 => 'https://api.tdameritrade.com/v1/oauth2/token',
        CURLOPT_RETURNTRANSFER                      => 1,
        CURLOPT_POST                                => 1,
        CURLOPT_POSTFIELDS                          => $ref_post_fields,
        CURLOPT_HTTPHEADER                          => $ref_headers,
    ));
    $refresh_response 				                = curl_exec($refresh_curl);
    $err 						                    = curl_error($refresh_curl);
    curl_close($refresh_curl);
    // JSON Decode 90-Day Access Code $refresh_response Array
    $refresh_response   		                    = json_decode($refresh_response, true); //because of true, it's in an array
    // Identify the new 90-Day Access Code
    $ref_access_token                               = trim($refresh_response['access_token'], " ");
    // Set Account Retrieval Parameters
    $account_headers                                = array();
    $account_headers[]                              = 'Authorization: Bearer ' . $ref_access_token;
    // Initiate Account Generation via CURL
    $account_curl 					                = curl_init();
    curl_setopt_array($account_curl, array(
        CURLOPT_URL                                 => 'https://api.tdameritrade.com/v1/accounts',
        CURLOPT_RETURNTRANSFER                      => 1,
        CURLOPT_CUSTOMREQUEST                       => 'GET',
        CURLOPT_HTTPHEADER                          => $account_headers,
    ));
    $account_response 				                = curl_exec($account_curl);
    $err 						                    = curl_error($account_curl);
    curl_close($account_curl);
    // JSON Decode Account Retrieval Data
    $account_response   		                    = json_decode($account_response, true); //because of true, it's in an array
    // $account_response               = json_encode($account_response);
    // Foreach Account, Access Array
    foreach ($account_response as $id=>$account) {
        // Convert Account Array to Foreach and Identify Variables
        foreach ($account as $key=>$value) {        
            $accountId                              = $value['accountId'];
            // $accountId                      = '866973162';
            $accountBalance                         = $value['initialBalances']['cashBalance'];
            // Check if current Account ID is an Existing Account in DB or not                
            $this->db->from('bf_users_wallet');
            $this->db->where('user_id', $cuID);
            $this->db->where('account_id', $accountId);
            $getExistingWallets                     = $this->db->get();
            // Count the Rows of the Existing Account Data Query
            $existingWallets                        = $getExistingWallets->num_rows();
            // If Account Does Not Exist
            if ($existingWallets === 0) {
                $accountData                        = array(
                    'active'                        => 'Yes',
                    'beta'                          => $beta,
                    'default_wallet'                => 'No',
                    'exchange_wallet'               => 'No',
                    'premium_wallet'                => 'Yes',
                    'market_pair'                   => null,
                    'market'                        => null,
                    'user_id'                       => $cuID,
                    'user_email'                    => $cuEmail,
                    'username'                      => $cuUsername,
                    'broker'                        => 'TD Ameritrade',
                    'account_id'                    => $accountId,
                    'access_code'                   => $ref_access_token,
                    'refresh_token'                 => $refresh_token,
                    'wallet_type'                   => 'Fiat',
                    'amount'                        => $accountBalance,
                    'initial_value'                 => $accountBalance,
                    'nickname'                      => substr($accountId, 0, 0) . 'xxxxx' . substr($accountId, -4),
                );
                $this->db->insert('bf_users_wallet', $accountData);
                $wallet_id                          = $this->db->insert_id();
            // If the Account does exist, obtain the Database Row ID for the Account from bf_users_wallets
            } else {
                foreach($getExistingWallets->result_array() as $existingWallet) {
                    $wallet_id                      = $existingWallet['id'];
                }
            }
            // Set Parameters for Account Order History Request
            $order_headers                          = array();
            $order_headers[]                        = 'Authorization: Bearer ' . $ref_access_token;
            // Set timespan of Account Order History to request
            $current_date                           = date("Y-m-d");
            $start_date                             = date("Y-m-d", strtotime("-5 year", strtotime($current_date)));
            // Initiate Account Order History Request via CURL
            $order_curl 				            = curl_init();
            curl_setopt_array($order_curl, array(
                CURLOPT_URL                         => 'https://api.tdameritrade.com/v1/accounts/' . $accountId . '/orders?fromEnteredTime=' . $start_date . '&toEnteredTime=' . $current_date . '&status=FILLED',
                CURLOPT_RETURNTRANSFER              => 1,
                CURLOPT_CUSTOMREQUEST               => 'GET',
                CURLOPT_HTTPHEADER                  => $order_headers,
            ));
            $order_response 			            = curl_exec($order_curl);
            $err 						            = curl_error($order_curl);
            curl_close($order_curl);
            // Json Decode Account Order History Response Array
            $order_response   		                = json_decode($order_response, true); //because of true, it's in an array
            // Reverse Account Order History (DESC by id)
            $order_response                         = array_reverse($order_response);
            // $broker                                 = 'TD Ameritrade';
            $open_order_data                        = array();
            $order_data                             = array();
            foreach ($order_response as $key=>$value) {
                $open_date                          = date_create($value['enteredTime']);
                $close_date                         = date_create($value['closeTime']);
                $orderID                            = $value['orderId'];
                // $orderLegType               = $value['orderLegCollection'][0]['instrument'];
                $orderCategory                      = $value['orderLegCollection'][0]['orderLegType'];
                $position                           = $value['orderLegCollection'][0]['positionEffect'];
                if ($position === 'OPENING') {
                    $opp_order_id                   = null;
                    if ($orderCategory === 'OPTION') {
                        $order_trade_type           = $value['orderLegCollection'][0]['instrument']['putCall'];
                        if ($order_trade_type === 'CALL') {
                            $trade_type             = 'call';
                            $category               = 'option_buy';
                        } elseif ($order_trade_type === 'PUT') {
                            $trade_type             = 'put';
                            $category               = 'option_sell';
                        }
                        $contracts                  = $value['filledQuantity'];
                        $shares                     = 0;
                    } elseif ($orderCategory === 'EQUITY') {
                        $instruction                = $value['orderLegCollection'][0]['instruction'];
                        $category                   = 'equity';
                        if ($instruction === 'BUY') {
                            $trade_type             = 'long';
                        } elseif ($instruction === 'SELL') {
                            $trade_type             = 'short';
                        }
                        $shares                     = $value['filledQuantity'];
                        $contracts                  = 0;
                    }
                    $closed                         = 'false';
                    $closing_price                  = 0;
                    if (!empty($value['price'])) {
                        $entry_price                = $value['price'];
                    } elseif (!empty($value['orderActivityCollection'][0]['executionLegs'][0]['price'])) {
                        $entry_price                = $value['orderActivityCollection'][0]['executionLegs'][0]['price'];
                    } else {
                        $entry_price                = 0;
                    }
                    if (!empty($value['stopPrice'])) {
                        $stop_loss                  = $value['stopPrice'];
                    } else {
                        $stop_loss                  = 0;
                    }
                    if (!empty($value['orderLegCollection'][0]['instrument']['cusip'])) {
                        $symbol_id                  = $value['orderLegCollection'][0]['instrument']['cusip'];
                    } else {
                        $symbol_id                  = $value['orderLegCollection'][0]['instrument']['symbol'];
                    }
                    if (!empty($value['orderLegCollection'][0]['instrument']['underlyingSymbol'])) {
                        $symbol                     = $value['orderLegCollection'][0]['instrument']['underlyingSymbol'];
                    } elseif (!empty($value['orderLegCollection'][0]['instrument']['symbol'])) {
                        $symbol                     = $value['orderLegCollection'][0]['instrument']['symbol'];
                    }
                    if (!empty($value['orderLegCollection'][0]['instrument']['description'])) {
                        $description                = $value['orderLegCollection'][0]['instrument']['description'];
                    } else {
                        $description                = 'N/A';
                    }
                    $net_gains                      = 0;
                    if (!empty($symbol)) {
                        $open_order_data            = array(
                            'status'                => 'Active',
                            'submitted_date'        => date("Y-m-d"), 
                            'order_id'              => $orderID,
                            'existing_order_id'     => $opp_order_id,
                            'user_id'               => $cuID,
                            'user_email'            => $cuEmail,
                            'username'              => $cuUsername,
                            'trading_account_id'    => $accountId,
                            'trading_account'       => 'TDA',
                            'trading_account_tag'   => $broker,
                            'order_status'          => $position,
                            'category'              => $category,
                            'trade_type'            => $trade_type,
                            'closed'                => $closed,
                            'symbol_id'             => $symbol_id,
                            'symbol'                => $symbol,
                            'entry_price'           => $entry_price,
                            'close_price'           => $closing_price,
                            'net_gains'             => $net_gains,
                            'open_date'             => date_format($open_date, "Y/m/d"),
                            'open_time'             => date_format($open_date, "h:i:s"),
                            'close_date'            => date_format($close_date, "Y/m/d"),
                            'close_time'            => date_format($close_date, "h:i:s"),
                            'stop_loss'             => $stop_loss,
                            'shares'                => $shares,
                            'remaining_shares'      => $shares,
                            'number_of_contracts'   => $contracts,
                            'total_trade_cost'      => $entry_price * $value['filledQuantity'],
                            'wallet'                => $wallet_id,
                            'details'               => $description,
                        );
                        $this->db->insert('bf_users_trades', $open_order_data);
                    }
                    // $total_trades                   = count($open_order_data);
                    // $tradeCountData                 = array();
                    // array_push($tradeCountData,$accountId,$total_trades); 
                } elseif ($position === 'CLOSING') {
                    if ($orderCategory === 'OPTION') {
                        $order_trade_type           = $value['orderLegCollection'][0]['instrument']['putCall'];
                        if ($order_trade_type === 'CALL') {
                            $trade_type             = 'call';
                            $category               = 'option_buy';
                        } elseif ($order_trade_type === 'PUT') {
                            $trade_type             = 'put';
                            $category               = 'option_sell';
                        }
                        $shares                     = 0;
                        $contracts                  = $value['filledQuantity'];
                    } elseif ($orderCategory === 'EQUITY') {
                        $instruction                = $value['orderLegCollection'][0]['instruction'];
                        $category                   = 'equity';
                        $shares                     = $value['filledQuantity'];
                        $contracts                  = 0;
                        if ($instruction === 'BUY') {
                            $trade_type             = 'long';
                        } elseif ($instruction === 'SELL') {
                            $trade_type             = 'short';
                        }
                    }
                    $entry_price                    = 0;
                    if (!empty($value['price'])) {
                        $closing_price              = $value['price'];
                    } elseif (!empty($value['orderActivityCollection'][0]['executionLegs'][0]['price'])) {
                        $closing_price              = $value['orderActivityCollection'][0]['executionLegs'][0]['price'];
                    } else {
                        $closing_price              = 0;
                    }
                    if (!empty($value['orderLegCollection'][0]['instrument']['cusip'])) {
                        $orig_symbol_id                  = $value['orderLegCollection'][0]['instrument']['cusip'];
                        $this->db->from('bf_users_trades');
                        $this->db->where('symbol_id', $orig_symbol_id);
                        $getOppOrder                    = $this->db->get();
                        if (!empty($getOppOrder)) {
                            foreach ($getOppOrder->result_array() as $oppOrder) {
                                $opp_order_id           = $oppOrder['order_id'];
                                $opp_remaining_shares   = $oppOrder['remaining_shares'];
                                $opp_entry_price        = $oppOrder['entry_price'];
                            }
                        } else {
                            $opp_order_id               = null;
                        }
                    } else {
                        $orig_symbol_id                  = $value['orderLegCollection'][0]['instrument']['symbol'];
                        $this->db->from('bf_users_trades');
                        $this->db->where('symbol_id', $orig_symbol_id);
                        $getOppOrder                    = $this->db->get();
                        if (!empty($getOppOrder)) {
                            foreach ($getOppOrder->result_array() as $oppOrder) {
                                $opp_order_id           = $oppOrder['order_id'];
                                $opp_remaining_shares   = $oppOrder['remaining_shares'];
                                $opp_entry_price        = $oppOrder['entry_price'];
                            }
                        } else {
                            $opp_order_id               = null;
                        }
                    }
                    if ($orderCategory === 'OPTION') {
                        $net_gains                      = ($closing_price - $opp_entry_price) * $contracts;
                    } elseif ($orderCategory === 'EQUITY') {
                        $net_gains                      = ($closing_price - $opp_entry_price) * $shares;
                    } else {
                        $net_gains                      = 0;
                    }
                    $opp_order_data                     = array(
                        'remaining_shares'              => $opp_remaining_shares,
                        'net_gains'                     => $net_gains,
                    );
                    $this->db->where('symbol_id', $orig_symbol_id);
                    $this->db->update('bf_users_trades', $opp_order_data);
                    $closed                             = 'true';
                    if (!empty($value['stopPrice'])) {
                        $stop_loss                      = $value['stopPrice'];
                    } else {
                        $stop_loss                      = 0;
                    }
                    if (!empty($value['orderLegCollection'][0]['instrument']['cusip'])) {
                        $symbol_id                      = $value['orderLegCollection'][0]['instrument']['cusip'];
                    } else {
                        $symbol_id                      = $value['orderLegCollection'][0]['instrument']['symbol'];
                    }
                    if (!empty($value['orderLegCollection'][0]['instrument']['underlyingSymbol'])) {
                        $symbol                         = $value['orderLegCollection'][0]['instrument']['underlyingSymbol'];
                    } elseif (!empty($value['orderLegCollection'][0]['instrument']['symbol'])) {
                        $symbol                         = $value['orderLegCollection'][0]['instrument']['symbol'];
                    }
                    if (!empty($value['orderLegCollection'][0]['instrument']['description'])) {
                        $description                    = $value['orderLegCollection'][0]['instrument']['description'];
                    } else {
                        $description                    = 'N/A';
                    }
            
                    if (!empty($symbol)) {
                        $order_data                     = array(
                            'status'                    => 'Active',
                            'submitted_date'            => date("Y-m-d"), 
                            'order_id'                  => $orderID,
                            'existing_order_id'         => $opp_order_id,
                            'user_id'                   => $cuID,
                            'user_email'                => $cuEmail,
                            'username'                  => $cuUsername,
                            'trading_account_id'        => $accountId,
                            'trading_account'           => 'TDA',
                            'trading_account_tag'       => $broker,
                            'order_status'              => $position,
                            'category'                  => $category,
                            'trade_type'                => $trade_type,
                            'closed'                    => $closed,
                            'symbol_id'                 => $symbol_id,
                            'symbol'                    => $symbol,
                            'entry_price'               => $entry_price,
                            'close_price'               => $closing_price,
                            'open_date'                 => date_format($open_date, "Y/m/d"),
                            'open_time'                 => date_format($open_date, "h:i:s"),
                            'close_date'                => date_format($close_date, "Y/m/d"),
                            'close_time'                => date_format($close_date, "h:i:s"),
                            'stop_loss'                 => $stop_loss,
                            'shares'                    => $shares,
                            'remaining_shares'          => $value['remainingQuantity'],
                            'number_of_contracts'       => $contracts,
                            'total_trade_cost'          => $closing_price * $value['filledQuantity'],
                            'wallet'                    => $wallet_id,
                            'details'                   => $description,
                        );
                        $this->db->insert('bf_users_trades', $order_data);
                    }
                }
            }
        }
    };
?>
<!-- <iframe class="flinksconnect border rounded" height="760"
        src="<?php //echo $url; ?>">
</iframe> -->
<div class="row justify-content-center">
    <div class="col-12 col-md-4">        
        <iframe class="flinksconnect border rounded" height="760"
                src="https://mymiwallet7808.connect.flinks.dev/v2/?closeEnable=true&termsUrl=https%3A%2F%2Fwww.mymiwallet.com%2FTerms-And-Conditions&customerName=MyMI+Wallet&consentEnable=true&features=TransactionHistory%2CAccountNumber&accountSelectorEnable=true&showAllAccounts=true&accountSelectorMultiple=true">
        </iframe>
    </div>
    <div class="col-12 col-md-8">
        <div class="card card-bordered">
            <div class="card-header">
                <h3 class="card-title title">Connect Your Financial Banking Account!</h3>
            </div>
        </div>
    </div>
</div>
<!-- Event Listener -->
<script <?= $nonce['script'] ?? '' ?>>
  window.addEventListener('message', 
    function(e) {
        console.log(e.redirect);
        console.log(e.data);
    }
  );
</script>