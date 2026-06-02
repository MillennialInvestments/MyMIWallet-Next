# Solana Runtime Hardening - Phase 03 Token Payload Contract Inspection

- Generated UTC: Tue Jun  2 02:05:22 AM UTC 2026
- Branch: hardening/solana-exchange-runtime-phase-01
- HEAD: 041b8e540

## Objective

Inspect every frontend and backend reference to allSolanaToken/token payloads before normalizing response handling.

## Backend allSolanaToken References

```text
app/Modules/Exchange/Controllers/DigiByteController.php:26:    public function fetchFrontendData()
app/Modules/Exchange/Controllers/ExchangeController.php:295:            'coin_value' => $this->request->getPost('coin_value'),
app/Modules/Exchange/Controllers/ExchangeController.php:307:            'new_coin_value' => ($this->request->getPost('initial_value') + $this->request->getPost('buy_amount')) / ($this->request->getPost('available_coins') - $this->request->getPost('buy_total'))
app/Modules/Exchange/Controllers/ExchangeController.php:341:                'coin_value' => $this->request->getPost('coin_value'),
app/Modules/Exchange/Controllers/ExchangeController.php:353:                'new_coin_value' => ($this->request->getPost('initial_value') + $this->request->getPost('buy_amount')) / ($this->request->getPost('available_coins') - $this->request->getPost('buy_total'))
app/Modules/Exchange/Controllers/ExchangeController.php:395:                'coin_value' => $this->request->getPost('coin_value'),
app/Modules/Exchange/Controllers/ExchangeController.php:407:                'new_coin_value' => ($this->request->getPost('initial_value') + $this->request->getPost('sell_amount')) / ($this->request->getPost('available_coins') - $this->request->getPost('sell_total'))
app/Modules/Exchange/Controllers/ExchangeController.php:485:            'initial_coin_value' => $coinValue['coin_value'],
app/Modules/Exchange/Controllers/ExchangeController.php:486:            'coin_value' => round($coinValue['current_value'] / ($coinValue['new_availability'] - 10000), 8),
app/Modules/Exchange/Controllers/ExchangeController.php:582:                'coin_name' => $tokenName,
app/Modules/Exchange/Controllers/ExchangeController.php:611:            'coin_name' => $this->request->getPost('coin_name'),
app/Modules/Exchange/Controllers/ExchangeController.php:617:            'coin_logo' => $this->request->getPost('coin_logo')
app/Modules/Exchange/Controllers/SolanaController.php:574:    public function fetchFrontendData()
app/Modules/Exchange/Controllers/SolanaController.php:577:            log_message('debug', 'SolanaController L400 - fetchFrontendData() Fetch Started!');
app/Modules/Exchange/Controllers/SolanaController.php:585:            log_message('error', 'fetchFrontendData: missing user context; aborting.');
app/Modules/Exchange/Controllers/SolanaController.php:619:            'fetchFrontendData - $mySolanaData: {a} | $marketData: {b} | $tokens: {c}',
app/Modules/Exchange/Controllers/SolanaController.php:644:            'allSolanaToken' => $allSolanaTok,  // can be { all: [...] } or a plain array
app/Modules/Exchange/Controllers/SolanaController.php:1313:    // public function fetchFrontendData()
app/Modules/Exchange/Controllers/SolanaController.php:1317:    //         log_message('debug', 'SolanaController L400 - fetchFrontendData() Fetch Started!');
app/Modules/Exchange/Controllers/SolanaController.php:1327:    //         log_message('error', 'fetchFrontendData: missing user context; aborting.');
app/Modules/Exchange/Controllers/SolanaController.php:1409:    //     $allSolanaToken = $lib->getSolanaTokens();
app/Modules/Exchange/Controllers/SolanaController.php:1411:    //     if (isset($allSolanaToken[0]) && is_array($allSolanaToken[0])) {
app/Modules/Exchange/Controllers/SolanaController.php:1412:    //         $allSolanaToken = ['all' => $allSolanaToken];
app/Modules/Exchange/Controllers/SolanaController.php:1420:    //             'allSolanaToken' => $allSolanaToken,
app/Modules/Exchange/Views/Application_Manager.php:127:        $coin_name						= $applicationForm['coin_name'];
app/Modules/Exchange/Views/Application_Manager.php:137:            'coin_name'					=> $coin_name,
app/Modules/Exchange/Views/Application_Manager.php:143:            'coin_logo'					=> $coin_logo,
app/Modules/Exchange/Views/Application_Manager.php:161:        $coin_name						= $applicationForm['coin_name'];
app/Modules/Exchange/Views/Application_Manager.php:186:        // $coin_logo 						= $logoUploadData['file_name'];
app/Modules/Exchange/Views/Application_Manager.php:193:            'coin_name'					=> $coin_name,
app/Modules/Exchange/Views/Application_Manager.php:199:            'coin_logo'					=> $coin_logo,
app/Modules/Exchange/Views/Buy/user_fields.php:64:<input class="<?php e($controlInput); ?>" onChange="calculateBuy(); return false;" onClick="clearBuyContent();" type="hidden" id="current_coin_value" name="current_coin_value" value="<?php echo set_value('current_coin_value', isset($user) ? $user->current_coin_value : $current_coin_value); ?>" />
app/Modules/Exchange/Views/Buy/user_fields.php:68:		<input class="<?php e($controlInput); ?>" onClick="clearBuyContent();" type="type" id="buy_coin_value" name="buy_coin_value" placeholder="Enter Coin Price" value="<?php echo set_value('buy_coin_value', isset($user) ? $user->buy_coin_value : ''); ?>" />
app/Modules/Exchange/Views/Buy/user_fields.php:113:	document.getElementById('buy_coin_value').value	= "";
app/Modules/Exchange/Views/Buy/user_fields.php:116:	document.getElementById('buy_coin_value').value	= <?php echo $current_coin_value; ?>
app/Modules/Exchange/Views/Coin_Listing_Asset_Information/create_fields.php:42:        $coin_name					= '';
app/Modules/Exchange/Views/Coin_Listing_Asset_Information/create_fields.php:56:            $coin_name				= $appInfo['coin_name'];
app/Modules/Exchange/Views/Coin_Listing_Asset_Information/create_fields.php:66:        $coin_name					= '';
app/Modules/Exchange/Views/Coin_Listing_Asset_Information/create_fields.php:110:		<input type="text" class="<?php echo $formControl; ?>" name="coin_name" id="coin_name" placeholder="Enter Asset Name" value="<?php echo set_value('coin_name', isset($user) ? $user->coin_name : $coin_name); ?>">	
app/Modules/Exchange/Views/Coin_Listing_Asset_Information/new_fields.php:30:        $coin_name				= $appInfo['coin_name'];
app/Modules/Exchange/Views/Coin_Listing_Asset_Information/new_fields.php:40:    $coin_name					= '';
app/Modules/Exchange/Views/Coin_Listing_Asset_Information/new_fields.php:84:		<input type="text" class="<?php echo $formControl; ?>" name="coin_name" id="coin_name" placeholder="Enter Asset Name" value="<?php echo set_value('coin_name', isset($user) ? $user->coin_name : $coin_name); ?>">	
app/Modules/Exchange/Views/Order_Buy_Manager.php:14:$current_coin_value						= $orderForm['current_coin_value'];
app/Modules/Exchange/Views/Order_Buy_Manager.php:19:$new_coin_value							= round($current_value / $new_availability, 8);
app/Modules/Exchange/Views/Order_Buy_Manager.php:21:// Get Opposite Order Info Where price Equals current_coin_value Where market_pair And market Match
app/Modules/Exchange/Views/Order_Buy_Manager.php:27:$this->db->where('initial_coin_value', $current_coin_value);
app/Modules/Exchange/Views/Order_Buy_Manager.php:66:                'current_price'				=> $oppOrder['initial_coin_value'],
app/Modules/Exchange/Views/Order_Buy_Manager.php:112:        'initial_coin_value'			=> $current_coin_value,
app/Modules/Exchange/Views/Order_Buy_Manager.php:125:        'new_coin_value'				=> $new_coin_value,
app/Modules/Exchange/Views/Order_Buy_Manager.php:164:        'coin_value'					=> $new_coin_value,
app/Modules/Exchange/Views/Order_Buy_Manager.php:189:        'initial_coin_value'			=> $current_coin_value,
app/Modules/Exchange/Views/Order_Buy_Manager.php:202:        'new_coin_value'				=> $new_coin_value,
app/Modules/Exchange/Views/Order_Sell_Manager.php:14:$current_coin_value						= $orderForm['current_coin_value'];
app/Modules/Exchange/Views/Order_Sell_Manager.php:19:$new_coin_value							= round($current_value / $new_availability, 8);
app/Modules/Exchange/Views/Order_Sell_Manager.php:21:// Get Opposite Order Info Where price Equals current_coin_value Where market_pair And market Match
app/Modules/Exchange/Views/Order_Sell_Manager.php:27:$this->db->where('initial_coin_value', $current_coin_value);
app/Modules/Exchange/Views/Order_Sell_Manager.php:66:                'current_price'				=> $oppOrder['initial_coin_value'],
app/Modules/Exchange/Views/Order_Sell_Manager.php:112:        'initial_coin_value'			=> $current_coin_value,
app/Modules/Exchange/Views/Order_Sell_Manager.php:125:        'new_coin_value'				=> $new_coin_value,
app/Modules/Exchange/Views/Order_Sell_Manager.php:164:        'coin_value'					=> $new_coin_value,
app/Modules/Exchange/Views/Order_Sell_Manager.php:189:        'initial_coin_value'			=> $current_coin_value,
app/Modules/Exchange/Views/Order_Sell_Manager.php:202:        'new_coin_value'				=> $new_coin_value,
app/Modules/Exchange/Views/Overview.php:64:        $current_coin_value								= number_format(($current_value / $cur_mark) / $coins_available, 8);
app/Modules/Exchange/Views/Overview.php:87:        $current_coin_value								= number_format(($current_value / $cur_mark) / $coins_available, 8);
app/Modules/Exchange/Views/Overview.php:90:        $current_coin_value								= number_format(($current_value / $MyMIGoldValue) / $total_coins, 8);
app/Modules/Exchange/Views/Overview.php:92:        $current_coin_value								= $_SESSION['allSessionData']['userAccount']['MyMICoinValue'];
app/Modules/Exchange/Views/Overview.php:116:        'current_coin_value'							=> $current_coin_value,
app/Modules/Exchange/Views/Sell/user_fields.php:65:<input class="<?php e($controlInput); ?>" onChange="calculateSell(); return false;" onClick="clearSellContent();" type="hidden" id="current_coin_value" name="current_coin_value" value="<?php echo set_value('current_coin_value', isset($user) ? $user->current_coin_value : $current_coin_value); ?>" />
app/Modules/Exchange/Views/Sell/user_fields.php:66:<div class="<?php e($controlGroup); ?> <?php echo form_error('sell_coin_value') ? $errorClass : ''; ?>">
app/Modules/Exchange/Views/Sell/user_fields.php:69:		<input class="<?php e($controlInput); ?>" onClick="clearSellContent();" type="text" id="sell_coin_value" name="sell_coin_value" placeholder="Enter Coin Price" value="<?php echo set_value('sell_coin_value', isset($user) ? $user->sell_coin_value : ''); ?>" />
app/Modules/Exchange/Views/Sell/user_fields.php:114:	document.getElementById('sell_coin_value').value	= "";
app/Modules/Exchange/Views/Sell/user_fields.php:117:	document.getElementById('sell_coin_value').value	= <?php echo $current_coin_value; ?>
app/Modules/Exchange/Views/Solana/assets.php:168:                                                            <img class="solanaTickerLogo" src="<?= $solanaTP['coin_logo']; ?>" alt="<?= $solanaTP['coin_name'] . ' (' . $solanaTP['symbol'] . ')'; ?>"/>
app/Modules/Exchange/Views/Solana/assets.php:170:                                                        <span class="tb-sub ms-2"><?= $solanaTP['coin_name'] . ' ($' . $solanaTP['symbol'] . ')'; ?> <span class="d-none d-md-inline"></span></span>
app/Modules/Exchange/Views/Solana/assets.php:174:                                                    <span class="tb-sub"><?php echo '$' . number_format($solanaTP['coin_value'],8); ?> <small>(<?php echo ($solanaTP['coin_value'] / $solanaPrice); ?> SOL)</small></span>
app/Modules/Exchange/Views/Solana/assets.php:244:                                                            <img class="solanaTickerLogo" src="<?= $solanaTP['coin_logo']; ?>" onerror="this.onerror=null;this.src='<?php echo base_url('assets/images/MyMI-Wallet.png'); ?>" alt="<?= $solanaTP['coin_name'] . ' (' . $solanaTP['symbol'] . ')'; ?>"/>
app/Modules/Exchange/Views/Solana/assets.php:246:                                                        <span class="tb-sub ms-2"><?= $solanaTP['coin_name'] . ' ($' . $solanaTP['symbol'] . ')'; ?> <span class="d-none d-md-inline"></span></span>
app/Modules/Exchange/Views/Solana/assets.php:250:                                                    <span class="tb-sub"><?php echo '$' . number_format($solanaTP['coin_value'],2); ?></span>
app/Modules/Exchange/Views/Solana/swap-working.php:159:                                                                    <?= esc($token['symbol']) ?> - <?= esc($token['coin_name']) ?>
app/Modules/Exchange/Views/Solana/swap-working.php:167:                                                                <?= esc($token['symbol']) ?> - <?= esc($token['coin_name']) ?>
app/Modules/Exchange/Views/Solana/swap.php:113:                                                $coin_name = isset($token['coin_name']) ? esc($token['coin_name']) : 'Unknown';
app/Modules/Exchange/Views/Solana/swap.php:116:                                                    <?= $symbol ?> - <?= $coin_name ?>
app/Modules/Exchange/Views/Solana/swap.php:156:                                                $coin_name = isset($token['coin_name']) ? esc($token['coin_name']) : 'Unknown';
app/Modules/Exchange/Views/Solana/swap.php:159:                                                    <?= $symbol ?> - <?= $coin_name ?>
app/Modules/Exchange/Views/Solana/token.php:97:                                <img class="solanaTickerLogo" src="<?= $cryptoDetails['coin_logo']; ?>" onerror="this.onerror=null;this.src='https://www.mymiwallet.com/assets/images/MyMI-Wallet.png'" alt="<?= $cryptoDetails['coin_name'] . ' (' . $cryptoDetails['symbol'] . ')'; ?>"/>
app/Modules/Exchange/Views/Solana/token.php:99:                            <span class="amount"><?= esc($cryptoDetails['coin_name']) ?> <span class="currency currency-usd">(<?= esc($cryptoDetails['symbol']) ?>)</span></span>
app/Modules/Exchange/Views/Solana/token.php:105:                                    <div class="amount">$<?= number_format($cryptoDetails['coin_value'], 8) ?> <span class="currency currency-usd">USD</span></div>
app/Modules/Exchange/Views/Solana/token.php:134:                                <?= esc($cryptoDetails['description'] . ' | Overview of ' . esc($cryptoDetails['coin_name']) .' on Solana Blockchain.' ?? 'Overview of ' . esc($cryptoDetails['coin_name']) .' on Solana Blockchain.') ?>
app/Modules/Exchange/Views/Solana/token.php:184:                                    <div class="progress-label">Trade <?= esc($cryptoDetails['coin_name']) ?></div>
app/Modules/Exchange/Views/Solana/token.php:194:                                    <div class="progress-label">Swap <?= esc($cryptoDetails['coin_name']) ?></div>
app/Modules/Exchange/Views/Solana/index.php:571:    url: '/index.php/Exchange/Solana/fetchFrontendData',
app/Modules/Exchange/Views/Solana/index.php:627:    const tokens = extractTokens(data.allSolanaToken);
app/Modules/Exchange/Views/Solana/index.php:657:              <img src="${t?.coin_logo || '/assets/images/avatar-placeholder.png'}"
app/Modules/Exchange/Views/Solana/index.php:658:                   alt="${t?.coin_name || 'Token'}"
app/Modules/Exchange/Views/Solana/index.php:662:              <div class="label">${t?.coin_name || 'Unknown'} (${t?.symbol || ''})</div>
app/Modules/Exchange/Views/Solana/index.php:717:                <img src="${t?.coin_logo || '/assets/images/avatar-placeholder.png'}"
app/Modules/Exchange/Views/Solana/index.php:719:                     alt="${t?.coin_name || 'Token'}"
app/Modules/Exchange/Views/Solana/index.php:721:                <span>${t?.coin_name || 'Unknown'} (${t?.symbol || ''})</span>
app/Modules/Exchange/Views/Solana/index.php:724:            <td>${t?.coin_value ?? 'N/A'}</td>
app/Modules/Exchange/Views/Solana/index.php:867:                            <img src="${mymiSanitizeSolanaTokenLogoUrl(token.coin_logo)}" class="user-avatar bg-light" alt="${token.coin_name}" onerror="this.src='/assets/images/placeholder.png';"/>
app/Modules/Exchange/Views/Solana/index.php:868:                            <span>${token.coin_name} (${token.symbol})</span>
app/Modules/Exchange/Views/Solana/index.php:871:                    <td>${token.coin_value}</td>
app/Modules/Exchange/Views/index.php:115:                    $current_coin_value				= number_format(($current_value / $alt_cur_mark) / $total_coins, 8);
app/Modules/Exchange/Views/index.php:116:                    $coin_value						= ($current_value / $alt_cur_mark) / $total_coins;
app/Modules/Exchange/Views/index.php:140:                    $current_coin_value				= number_format(($current_value / $cur_mark) / $total_coins, 8);
app/Modules/Exchange/Views/index.php:141:                    $coin_value						= ($current_value / $cur_mark) / $total_coins;
app/Modules/Exchange/Views/index.php:145:                    $current_coin_value				= '$' . number_format('1', 2);
app/Modules/Exchange/Views/index.php:146:                    $coin_value						= ($current_value / $MyMIGoldValue) / $total_coins;
app/Modules/Exchange/Views/index.php:148:                    $current_coin_value				= '$' . number_format($current_value / $total_coins, 8);
app/Modules/Exchange/Views/index.php:149:                    $coin_value						= $current_value / $total_coins;
app/Modules/Exchange/Views/index.php:153:                $total_growth						= $coin_value * $total_volume;
app/Modules/Exchange/Views/index.php:174:										<h5 class="card-title display-5 d-none d-md-block">' . $current_coin_value . ' ' . $market_pair . '</h5>
app/Modules/Exchange/Views/index.php:175:										<h6 class="d-block d-md-none">' . $current_coin_value . '</h6>
app/Modules/Exchange/Views/index.php:251:                    //         $current_coin_value				= number_format(($current_value / $alt_cur_mark) / $total_coins, 8) . ' ' . $exchange['market_pair'];
app/Modules/Exchange/Views/index.php:252:                    //         $coin_value						= ($current_value / $alt_cur_mark) / $total_coins;
app/Modules/Exchange/Views/index.php:275:                    //         $current_coin_value				= number_format(($current_value / $cur_mark) / $total_coins, 8);
app/Modules/Exchange/Views/index.php:276:                    //         $coin_value						= ($current_value / $cur_mark) / $total_coins;
app/Modules/Exchange/Views/index.php:279:                    //         $current_coin_value				= '$' . number_format(($current_value / $MyMIGoldValue) / $total_coins, 8);
app/Modules/Exchange/Views/index.php:280:                    //         $coin_value						= ($current_value / $MyMIGoldValue) / $total_coins;
app/Modules/Exchange/Views/index.php:282:                    //         $current_coin_value				= '$' . number_format($current_value / $total_coins, 8);
app/Modules/Exchange/Views/index.php:283:                    //         $coin_value						= $current_value / $total_coins;
app/Modules/Exchange/Views/index.php:287:                    //     $total_growth						= $coin_value * $total_volume;
app/Modules/Exchange/Views/index.php:307:					// 	<td class="text-center pt-4">' . $current_coin_value . '</td>   
app/Models/AnalyticalModel.php:313:                                        ->select('id, first_name, last_name, name_suffix, blockchain, blockchain_name, coin_quantity, coin_address, coin_logo, coin_name, coin_value, listing_type, discord, facebook, telegram, twitter, website, market_cap, symbol, volume, volume_array')
app/Models/APIModel.php:91:            ->select('new_coin_value')
app/Models/AssetsModel.php:47:        return $this->selectSum('coin_value')
app/Models/AssetsModel.php:49:                    ->first()['coin_value'];
app/Models/AssetsModel.php:70:                    ->like('coin_name', $keyword)
app/Models/AssetsModel.php:104:        return $this->selectSum('coin_value')
app/Models/AssetsModel.php:106:                    ->first()['coin_value'];
app/Models/MyMICoinModel.php:44:        $builder->select('coin_value');
app/Models/MyMICoinModel.php:59:        $builder->select('initial_coin_value');
app/Models/MyMIGoldModel.php:65:        $builder->select('initial_coin_value');
app/Models/SolanaModel.php:332:                           ->select('id, coin_address, coin_logo, coin_name, coin_value, discord, facebook, telegram, twitter, website, market_cap, symbol, volume, volume_array')
app/Models/SolanaModel.php:437:                           ->select('id, coin_logo, coin_name, coin_value, discord, facebook, telegram, twitter, website, market_cap, symbol, volume, fdv')
app/Models/SolanaModel.php:493:                           ->select('id, coin_address, coin_logo, coin_name, coin_value, discord, facebook, telegram, twitter, website, market_cap, symbol, volume')
app/Models/SolanaModel.php:597:                    'coin_value' => $data['price'],
app/Models/InvestmentModel.php:723:        $builder->selectSum('coin_value', 'coin_quantity');
app/Models/TbiProjectCoinModel.php:13:    protected $allowedFields = ['project_id', 'coin_key', 'coin_name', 'symbol', 'coin_type', 'unit_value_usd', 'solana_mint_address', 'exchange_asset_id', 'project_exchange_symbol', 'primary_issuance_enabled', 'secondary_trading_enabled', 'compliance_required', 'status', 'metadata_json'];
app/Models/TbiProjectCoinModel.php:22:            'tbi_investment' => ['coin_name' => 'TBI Investment Coin','symbol' => 'TBIINV','coin_type' => 'investment','unit_value_usd' => 1,'primary_issuance_enabled' => 1,'secondary_trading_enabled' => 0,'compliance_required' => 1,'status' => 'draft','metadata_json' => json_encode(['disclaimer' => 'Not publicly approved security. Compliance review required before broader availability.'])],
app/Models/TbiProjectCoinModel.php:23:            'tbi_utility' => ['coin_name' => 'TBI Utility Coin','symbol' => 'TBIUSD','coin_type' => 'utility','unit_value_usd' => 1,'primary_issuance_enabled' => 1,'secondary_trading_enabled' => 0,'compliance_required' => 0,'status' => 'active','metadata_json' => json_encode(['disclaimer' => 'Utility-only credit for approved operational contributions. No ownership or profit-sharing rights.'])],
app/Libraries/MyMIGold.php:137:            $new_coin_value                         = 1;
app/Libraries/MyMIGold.php:145:                'mymig_coin_value'				    => $new_coin_value,
app/Libraries/MyMIGold.php:154:                'mymig_coin_value'                  => $coinInfo['new_coin_value'],
app/Libraries/MyMIGold.php:177:                'coin_value' => '1.00',
app/Libraries/MyMIGold.php:189:        $coin_value = $this->siteSettings->MyMIGCoinValue ?? 1.00;
app/Libraries/MyMIGold.php:194:            $myMIGInitialValue = number_format($coinSum * $getUserCoinTotal['initial_coin_value'], 2);
app/Libraries/MyMIGold.php:199:            $totalValue = number_format($coin_value * $coinSum, 2);
app/Libraries/MyMIGold.php:211:            'coin_value' => $coin_value,
app/Libraries/MyMIGold.php:251:                'initial_coin_value'                => $userLastOrder['initial_coin_value'],
app/Libraries/MyMIGold.php:252:                'new_coin_value'                    => $userLastOrder['new_coin_value'],
app/Libraries/MyMIGold.php:295:                    'initial_coin_value'            => $userLastCompletedOrder['initial_coin_value'],
app/Libraries/MyMIGold.php:296:                    'new_coin_value'                => $userLastCompletedOrder['new_coin_value'],
app/Libraries/MyMIDexScreener.php:51:                    'coin_logo'  => $t['info']['image']   ?? null,
app/Libraries/MyMIDexScreener.php:52:                    'coin_name'  => $t['info']['name']    ?? null,
app/Libraries/MyMIDexScreener.php:54:                    'coin_value' => $t['priceUsd']        ?? 0,
app/Libraries/MyMIDexScreener.php:83:                'coin_logo'  => $t['info']['image']      ?? null,
app/Libraries/MyMIDexScreener.php:84:                'coin_name'  => $t['baseToken']['name']  ?? null,
app/Libraries/MyMIDexScreener.php:86:                'coin_value' => $t['priceUsd']           ?? 0,
app/Libraries/MyMIDexScreener.php:170:            'coin_value' => $pair['priceUsd'] ?? 0,
app/Libraries/MyMIRaydium.php:83:                    'coin_logo'  => $t['logo'] ?? null,
app/Libraries/MyMIRaydium.php:84:                    'coin_name'  => $t['name'] ?? null,
app/Libraries/MyMIRaydium.php:86:                    'coin_value' => $t['price'] ?? null,
app/Libraries/MyMIRaydium.php:113:                'coin_logo'  => $t['logo'] ?? null,
app/Libraries/MyMIRaydium.php:114:                'coin_name'  => $t['name'] ?? null,
app/Libraries/MyMIRaydium.php:116:                'coin_value' => $t['price'] ?? null,
app/Libraries/test.txt:2778:                'coin_name'  => 'required',
app/Libraries/test.txt:2789:                    'coin_name'  => $this->request->getPost('coin_name'),
app/Libraries/test.txt:5149:            log_message('debug', 'MyMIMarketing L117 - $token[symbol] $token[name]: ' . $token['symbol'] . ' ' . $token['coin_name']);
app/Libraries/test.txt:5150:            $googleData = $this->scrapeGoogleSearch($token['symbol'] . ' ' . $token['coin_name']);
app/Libraries/MyMIProjects.php:1076:            'coin_name' => $project['name'] ?? $project['title'] ?? 'MyMI US Oil Fund',
app/Libraries/MyMIProjects.php:1083:            'coin_value' => (float) ($project['nav_per_unit'] ?? 1),
app/Libraries/MyMIPump.php:84:     * @return array<int,array{coin_logo:?string,coin_name:?string,symbol:?string,coin_value:float,market_cap:float,volume:float,website:?string}>
app/Libraries/MyMIPump.php:102:                    'coin_logo'  => $t['image']     ?? null,
app/Libraries/MyMIPump.php:103:                    'coin_name'  => $t['name']      ?? null,
app/Libraries/MyMIPump.php:105:                    'coin_value' => $t['priceUsd']  ?? 0.0,
app/Libraries/MyMIPump.php:134:                'coin_logo'  => $t['image']     ?? null,
app/Libraries/MyMIPump.php:135:                'coin_name'  => $t['name']      ?? null,
app/Libraries/MyMIPump.php:137:                'coin_value' => $t['priceUsd']  ?? 0.0,
app/Libraries/MyMIInvestments.php:1683:        $builder->select('symbol, coin_name, coin_value, market_cap');
app/Libraries/MyMIMarketing.php:1688:            log_message('debug', 'MyMIMarketing L117 - $token[symbol] $token[name]: ' . $token['symbol'] . ' ' . $token['coin_name']);
app/Libraries/MyMIMarketing.php:1689:            $googleData = $this->scrapeGoogleSearch($token['symbol'] . ' ' . $token['coin_name']);
app/Libraries/MyMISolana.php:206:        $allSolanaTokens            = [];
app/Libraries/MyMISolana.php:213:            $allSolanaTokens[] = $token; // Add to the general list
app/Libraries/MyMISolana.php:229:            'all'                       => $allSolanaTokens,
app/Libraries/MyMISolana.php:658:            'currentPrice' => $getMarketData['coin_value'] ?? 0.0,
app/Libraries/MyMISolana.php:806:                    'initial_coin_value' => 0,
app/Libraries/MyMISolana.php:807:                    'new_coin_value' => 0,
app/Libraries/MyMICoin.php:63:        return $getCoinValue['coin_value'] ?? 0.00;  // Default to 0.00 to avoid null issues
app/Libraries/MyMICoin.php:79:            'mymicCoinValue'              => $coinInfo['coin_value'] ?? null,
app/Libraries/MyMICoin.php:106:            $initialCoinValue = (float)($userCoinTotal['initial_coin_value'] ?? 0);
app/Libraries/MyMICoin.php:121:            'mymic_coin_value' => (string)$myMIC_CoinValue,
```

## Frontend Token Rendering References

```text
app/Modules/Exchange/Views/Solana/assets.php:168:                                                            <img class="solanaTickerLogo" src="<?= $solanaTP['coin_logo']; ?>" alt="<?= $solanaTP['coin_name'] . ' (' . $solanaTP['symbol'] . ')'; ?>"/>
app/Modules/Exchange/Views/Solana/assets.php:170:                                                        <span class="tb-sub ms-2"><?= $solanaTP['coin_name'] . ' ($' . $solanaTP['symbol'] . ')'; ?> <span class="d-none d-md-inline"></span></span>
app/Modules/Exchange/Views/Solana/assets.php:174:                                                    <span class="tb-sub"><?php echo '$' . number_format($solanaTP['coin_value'],8); ?> <small>(<?php echo ($solanaTP['coin_value'] / $solanaPrice); ?> SOL)</small></span>
app/Modules/Exchange/Views/Solana/assets.php:244:                                                            <img class="solanaTickerLogo" src="<?= $solanaTP['coin_logo']; ?>" onerror="this.onerror=null;this.src='<?php echo base_url('assets/images/MyMI-Wallet.png'); ?>" alt="<?= $solanaTP['coin_name'] . ' (' . $solanaTP['symbol'] . ')'; ?>"/>
app/Modules/Exchange/Views/Solana/assets.php:246:                                                        <span class="tb-sub ms-2"><?= $solanaTP['coin_name'] . ' ($' . $solanaTP['symbol'] . ')'; ?> <span class="d-none d-md-inline"></span></span>
app/Modules/Exchange/Views/Solana/assets.php:250:                                                    <span class="tb-sub"><?php echo '$' . number_format($solanaTP['coin_value'],2); ?></span>
app/Modules/Exchange/Views/Solana/swap-working.php:159:                                                                    <?= esc($token['symbol']) ?> - <?= esc($token['coin_name']) ?>
app/Modules/Exchange/Views/Solana/swap-working.php:167:                                                                <?= esc($token['symbol']) ?> - <?= esc($token['coin_name']) ?>
app/Modules/Exchange/Views/Solana/swap.php:113:                                                $coin_name = isset($token['coin_name']) ? esc($token['coin_name']) : 'Unknown';
app/Modules/Exchange/Views/Solana/swap.php:116:                                                    <?= $symbol ?> - <?= $coin_name ?>
app/Modules/Exchange/Views/Solana/swap.php:156:                                                $coin_name = isset($token['coin_name']) ? esc($token['coin_name']) : 'Unknown';
app/Modules/Exchange/Views/Solana/swap.php:159:                                                    <?= $symbol ?> - <?= $coin_name ?>
app/Modules/Exchange/Views/Solana/token.php:97:                                <img class="solanaTickerLogo" src="<?= $cryptoDetails['coin_logo']; ?>" onerror="this.onerror=null;this.src='https://www.mymiwallet.com/assets/images/MyMI-Wallet.png'" alt="<?= $cryptoDetails['coin_name'] . ' (' . $cryptoDetails['symbol'] . ')'; ?>"/>
app/Modules/Exchange/Views/Solana/token.php:99:                            <span class="amount"><?= esc($cryptoDetails['coin_name']) ?> <span class="currency currency-usd">(<?= esc($cryptoDetails['symbol']) ?>)</span></span>
app/Modules/Exchange/Views/Solana/token.php:105:                                    <div class="amount">$<?= number_format($cryptoDetails['coin_value'], 8) ?> <span class="currency currency-usd">USD</span></div>
app/Modules/Exchange/Views/Solana/token.php:134:                                <?= esc($cryptoDetails['description'] . ' | Overview of ' . esc($cryptoDetails['coin_name']) .' on Solana Blockchain.' ?? 'Overview of ' . esc($cryptoDetails['coin_name']) .' on Solana Blockchain.') ?>
app/Modules/Exchange/Views/Solana/token.php:184:                                    <div class="progress-label">Trade <?= esc($cryptoDetails['coin_name']) ?></div>
app/Modules/Exchange/Views/Solana/token.php:194:                                    <div class="progress-label">Swap <?= esc($cryptoDetails['coin_name']) ?></div>
app/Modules/Exchange/Views/Solana/index.php:458:    window.mymiSanitizeSolanaTokenLogoUrl = window.mymiSanitizeSolanaTokenLogoUrl || function (value) {
app/Modules/Exchange/Views/Solana/index.php:500:    window.mymiNormalizeSolanaTokenLogoPayload = window.mymiNormalizeSolanaTokenLogoPayload || function (payload) {
app/Modules/Exchange/Views/Solana/index.php:523:                    node[key] = window.mymiSanitizeSolanaTokenLogoUrl(value);
app/Modules/Exchange/Views/Solana/index.php:550:        const safeSrc = window.mymiSanitizeSolanaTokenLogoUrl(currentSrc);
app/Modules/Exchange/Views/Solana/index.php:584:    response = window.mymiNormalizeSolanaTokenLogoPayload
app/Modules/Exchange/Views/Solana/index.php:585:        ? window.mymiNormalizeSolanaTokenLogoPayload(response)
app/Modules/Exchange/Views/Solana/index.php:627:    const tokens = extractTokens(data.allSolanaToken);
app/Modules/Exchange/Views/Solana/index.php:657:              <img src="${t?.coin_logo || '/assets/images/avatar-placeholder.png'}"
app/Modules/Exchange/Views/Solana/index.php:658:                   alt="${t?.coin_name || 'Token'}"
app/Modules/Exchange/Views/Solana/index.php:662:              <div class="label">${t?.coin_name || 'Unknown'} (${t?.symbol || ''})</div>
app/Modules/Exchange/Views/Solana/index.php:717:                <img src="${t?.coin_logo || '/assets/images/avatar-placeholder.png'}"
app/Modules/Exchange/Views/Solana/index.php:719:                     alt="${t?.coin_name || 'Token'}"
app/Modules/Exchange/Views/Solana/index.php:721:                <span>${t?.coin_name || 'Unknown'} (${t?.symbol || ''})</span>
app/Modules/Exchange/Views/Solana/index.php:724:            <td>${t?.coin_value ?? 'N/A'}</td>
app/Modules/Exchange/Views/Solana/index.php:867:                            <img src="${mymiSanitizeSolanaTokenLogoUrl(token.coin_logo)}" class="user-avatar bg-light" alt="${token.coin_name}" onerror="this.src='/assets/images/placeholder.png';"/>
app/Modules/Exchange/Views/Solana/index.php:868:                            <span>${token.coin_name} (${token.symbol})</span>
app/Modules/Exchange/Views/Solana/index.php:871:                    <td>${token.coin_value}</td>
public/assets/js/Level_Two/chart.js:7:		initial_coin_value: "0.0001212",
public/assets/js/Level_Two/chart.js:13:		initial_coin_value: "0.0001312",
public/assets/js/Level_Two/chart.js:19:		initial_coin_value: "0.0003212",
public/assets/js/Level_Two/chart.js:25:		initial_coin_value: "0.000152",
public/assets/js/Level_Two/chart.js:31:		initial_coin_value: "0.00012412",
public/assets/js/Level_Two/chart.js:37:		initial_coin_value: "0.0001512",
public/assets/js/Level_Two/chart.js:43:		initial_coin_value: "0.000412",
public/assets/js/Level_Two/chart.js:49:		initial_coin_value: "0.0001212",
public/assets/js/Level_Two/chart.js:242:						yAxis.push(chartMap.get(date)[0].initial_coin_value);
public/assets/js/Level_Two/chart.js:273:										.get(dateTimeSplit(datetime, false))[0].initial_coin_value
public/assets/js/Level_Two/chart.js:334:// 	$initial_coin_value			= $closedOrders['initial_coin_value'];
public/assets/js/Level_Two/chart.js:336:// 	$datay[] 					= $initial_coin_value; 	// Append Result Array Data to $datay Array for Y-Axis Data Points (Prices)
public/assets/js/Level_Two/script-working-08122021.js:12:const columns = ["initial_coin_value", "amount", "total"];
public/assets/js/Level_Two/script-working-08122021.js:211:							yAxis.push(chartMap.get(date)[0].initial_coin_value);
public/assets/js/Level_Two/script-working-08122021.js:240:											.get(dateTimeSplit(datetime, false))[0].initial_coin_value
public/assets/js/Level_Two/script-working-08122021.js:311:			return b.initial_coin_value - a.initial_coin_value;
public/assets/js/Level_Two/script-working-08122021.js:314:			return a.initial_coin_value - b.initial_coin_value;
public/assets/js/Level_Two/script-working-08122021.js:399:	var cost 															= document.getElementById('current_coin_value').value;
public/assets/js/Level_Two/script-working-08122021.js:412:	//~ document.getElementById('buy_coin_value_display').innerHTML			= cost;
public/assets/js/Level_Two/script-working-08122021.js:413:	//~ document.getElementById('buy_coin_value').value						= cost;
public/assets/js/Level_Two/script-working-08122021.js:434:	document.getElementById('buy_coin_value').value						= "";
public/assets/js/Level_Two/script-working-08122021.js:451:	var cost 															= document.getElementById('current_coin_value').value;
public/assets/js/Level_Two/script-working-08122021.js:464:	//~ document.getElementById('sell_coin_value_display').innerHTM			= cost;
public/assets/js/Level_Two/script-working-08122021.js:465:	//~ document.getElementById('sell_coin_value').value					= cost;
public/assets/js/Level_Two/script-working-08122021.js:486:	document.getElementById('sell_coin_value').value					= "";
public/assets/js/Level_Two/script-working-COMPLETED.js:12:const columns = ["initial_coin_value", "amount", "total"];
public/assets/js/Level_Two/script-working-COMPLETED.js:211:							yAxis.push(chartMap.get(date)[0].initial_coin_value);
public/assets/js/Level_Two/script-working-COMPLETED.js:240:											.get(dateTimeSplit(datetime, false))[0].initial_coin_value
public/assets/js/Level_Two/script-working-COMPLETED.js:311:			return b.initial_coin_value - a.initial_coin_value;
public/assets/js/Level_Two/script-working-COMPLETED.js:314:			return a.initial_coin_value - b.initial_coin_value;
public/assets/js/Level_Two/script-working-COMPLETED.js:399:	var cost 															= document.getElementById('current_coin_value').value;
public/assets/js/Level_Two/script-working-COMPLETED.js:412:	//~ document.getElementById('buy_coin_value_display').innerHTML			= cost;
public/assets/js/Level_Two/script-working-COMPLETED.js:413:	//~ document.getElementById('buy_coin_value').value						= cost;
public/assets/js/Level_Two/script-working-COMPLETED.js:434:	document.getElementById('buy_coin_value').value						= "";
public/assets/js/Level_Two/script-working-COMPLETED.js:451:	var cost 															= document.getElementById('current_coin_value').value;
public/assets/js/Level_Two/script-working-COMPLETED.js:464:	//~ document.getElementById('sell_coin_value_display').innerHTM			= cost;
public/assets/js/Level_Two/script-working-COMPLETED.js:465:	//~ document.getElementById('sell_coin_value').value					= cost;
public/assets/js/Level_Two/script-working-COMPLETED.js:486:	document.getElementById('sell_coin_value').value					= "";
public/assets/js/Level_Two/script.08292021.js:12:const columns = ["initial_coin_value", "amount", "total"];
public/assets/js/Level_Two/script.08292021.js:211:							yAxis.push(chartMap.get(date)[0].initial_coin_value);
public/assets/js/Level_Two/script.08292021.js:240:											.get(dateTimeSplit(datetime, false))[0].initial_coin_value
public/assets/js/Level_Two/script.08292021.js:312:			return b.initial_coin_value - a.initial_coin_value;
public/assets/js/Level_Two/script.08292021.js:315:			return a.initial_coin_value - b.initial_coin_value;
public/assets/js/Level_Two/script.08292021.js:400:	var cost 															= document.getElementById('current_coin_value').value;
public/assets/js/Level_Two/script.08292021.js:413:	//~ document.getElementById('buy_coin_value_display').innerHTML			= cost;
public/assets/js/Level_Two/script.08292021.js:414:	//~ document.getElementById('buy_coin_value').value						= cost;
public/assets/js/Level_Two/script.08292021.js:435:	document.getElementById('buy_coin_value').value						= "";
public/assets/js/Level_Two/script.08292021.js:452:	var cost 															= document.getElementById('current_coin_value').value;
public/assets/js/Level_Two/script.08292021.js:465:	//~ document.getElementById('sell_coin_value_display').innerHTM			= cost;
public/assets/js/Level_Two/script.08292021.js:466:	//~ document.getElementById('sell_coin_value').value					= cost;
public/assets/js/Level_Two/script.08292021.js:487:	document.getElementById('sell_coin_value').value					= "";
public/assets/js/Level_Two/script.js:12:const columns = ["initial_coin_value", "amount", "total"];
public/assets/js/Level_Two/script.js:211:							yAxis.push(chartMap.get(date)[0].initial_coin_value);
public/assets/js/Level_Two/script.js:240:											.get(dateTimeSplit(datetime, false))[0].initial_coin_value
public/assets/js/Level_Two/script.js:312:			return b.initial_coin_value - a.initial_coin_value;
public/assets/js/Level_Two/script.js:315:			return a.initial_coin_value - b.initial_coin_value;
public/assets/js/Level_Two/script.js:401:	var cost 															= document.getElementById('current_coin_value').value;
public/assets/js/Level_Two/script.js:414:	//~ document.getElementById('buy_coin_value_display').innerHTML			= cost;
public/assets/js/Level_Two/script.js:415:	//~ document.getElementById('buy_coin_value').value						= cost;
public/assets/js/Level_Two/script.js:436:	document.getElementById('buy_coin_value').value						= "";
public/assets/js/Level_Two/script.js:453:	var cost 															= document.getElementById('current_coin_value').value;
public/assets/js/Level_Two/script.js:466:	//~ document.getElementById('sell_coin_value_display').innerHTM			= cost;
public/assets/js/Level_Two/script.js:467:	//~ document.getElementById('sell_coin_value').value					= cost;
public/assets/js/Level_Two/script.js:488:	document.getElementById('sell_coin_value').value					= "";
public/assets/documents/Exports/bf_exchanges_assets.csv:1:"id","active","status","unix_timestamp","date","time","partner","user_id","user_email","first_name","middle_name","last_name","name_suffix","phone","company_name","address","city","state","country","zipcode","is_tradable","listing_type","blockchain_id","blockchain","blockchain_name","symbol","coin_name","coin_quantity","coin_value","initial_value","market_cap","purpose","description","coin_file","coin_logo","coin_links"
```

## Known Phase 02 Contract Shape

```json
{"status":"success","data":{"mySolanaData":{},"marketData":{},"allSolanaToken":{"all":[]}},"csrf":"..."}
```

## Phase 03 Target

- Keep backward compatibility with current nested response shape.
- Add frontend helper to normalize token collections from either arrays or grouped objects.
- Add safe token count detection.
- Ensure empty token states render user-safe UI instead of console errors.
- Ensure token logo fallback remains local and consistent.
