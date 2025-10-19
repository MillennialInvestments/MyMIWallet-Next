<?php 

namespace App\Modules\Users\Controllers;

use App\Models\TrackerModel;

#[\AllowDynamicProperties]
class TradeTracker extends UserController
{
    private $siteSettings;

    public function __construct()
    {
        parent::__construct();
        helper(['directory', 'form', 'file', 'url']);
        $this->trackerModel = new TrackerModel();
    }
    // -------------------------------------------------------------------------
    // Main Blog Post Page
    // -------------------------------------------------------------------------

    public function index()
    {
        $this->setCurrentUser();
        $data = $this->preparePageData('Automated', 'Dashboard');
        return $this->renderTheme('TradeTracker/Index', $data);
    }

    public function log()
    {
        $this->setCurrentUser();
        $data = $this->preparePageData('Automated', 'Dashboard');
        return $this->renderTheme('TradeTracker/Log', $data);
    }

    public function overview()
    {
        $this->setCurrentUser();
        $data = $this->preparePageData('Automated', 'Dashboard');
        return $this->renderTheme('TradeTracker/Overview', $data);
    }

    public function holdingsManager()
    {
        $this->setCurrentUser();
        $data = $this->preparePageData('Automated', 'Dashboard');
        return $this->renderTheme('Exchange/Order_Buy_Manager', $data);
    }

    public function layoutManager()
    {
        $this->setCurrentUser();
        $data = $this->preparePageData('Automated', 'Dashboard');
        return $this->renderTheme('User/Trade_Tracker/Layout_Manager', $data);
    }

    public function tradeManager()
    {
        $this->setCurrentUser();
        $data = $this->preparePageData('Automated', 'Dashboard');
        return $this->renderTheme('User/Trade_Tracker/Trade_Manager', $data);
    }

    public function tradeTrackerEditor()
    {
        $this->setCurrentUser();
        $data = $this->preparePageData('Automated', 'Dashboard');
        return $this->renderTheme('User/Trade_Tracker/Trade_Tracker_Editor', $data);
    }

    public function search()
    {
        $pageType = 'Automated';
        $pageName = 'Search';
        
        $this->setCurrentUser();

        // CI4 uses the service method to get the request object
        $request = service('request');
        $validation = service('validation');

        // Set validation rules
        $validation->setRules([
            'webpage' => 'trim',
            'url_link' => 'trim',
        ]);

        if (!$validation->withRequest($request)->run()) {
            echo view('User/Trade_Tracker/Search', ['pageType' => $pageType, 'pageName' => $pageName]);
            // Use the CI4 way to render templates
        } else {
            $stock_one = $request->getPost('stock');
            $alert_type = $request->getPost('alert_type');

            // Assuming trackerModel is correctly initialized and add_trade method is available
            if ($this->trackerModel->add_trade(/* parameters */)) {
                return redirect()->to('/Trade-Tracker/Add/' . $stock_one . '/' . $alert_type);
            } else {
                echo view('User/Trade_Tracker/Search', ['pageType' => $pageType, 'pageName' => $pageName, 'error' => 'There was a problem submitting your request. Please try again.']);
            }
        }
    }
    
    public function add()
    {
        $pageType = 'Automated';
        $pageName = 'Add';
        
        $this->setCurrentUser();

        $request = service('request');
        $validation = service('validation');
        // Set validation rules
        $validation->setRules([
            'webpage' => 'trim',
            'url_link' => 'trim',
            // Add other fields as needed
        ]);

        if (!$validation->withRequest($request)->run()) {
            echo view('User/Trade_Tracker/Add', ['pageType' => $pageType, 'pageName' => $pageName]);
        } else {
            // Fetch data from the form
            $submitted_date = $this->request->getPost('submitted_date');
            $submitted_time = $this->request->getPost('submitted_time');
            $trade_date = $this->request->getPost('trade_date');
            $trade_time = $this->request->getPost('trade_time');
            $user_type = $this->request->getPost('user_type');
            $user_id = $this->request->getPost('user_id');
            $username = $this->request->getPost('username');
            $email = $this->request->getPost('email');
            $trading_account = $this->request->getPost('trading_account');
            $trade_type = $this->request->getPost('trade_type');
            $purchase_type = $this->request->getPost('purchase_type');
            $symbol_type = $this->request->getPost('symbol_type');
            $exchange = $this->request->getPost('exchange');
            $symbol = $this->request->getPost('symbol');
            $company = $this->request->getPost('company');
            $link = $this->request->getPost('link');
            $current_price = $this->request->getPost('current_price');
            $sell_price = $this->request->getPost('sell_price');
            $position_size = $this->request->getPost('position_size');
            $total_trade_cost = $this->request->getPost('total_trade_cost');
            $net_gains = $this->request->getPost('net_gains');
            $percent_change = $this->request->getPost('percent_change');
            $option_type = $this->request->getPost('option_type');
            $expiration = $this->request->getPost('expiration');
            $option_price = $this->request->getPost('option_price');
            $strike = $this->request->getPost('strike');
            $details = $this->request->getPost('details');
            // ... [continue fetching other fields] ...

            // Assuming trackerModel is correctly initialized and add_trade method is available
            if ($this->trackerModel->add_trade(/* parameters */)) {
                return redirect()->to('/Wallet-Details/' . $trading_account);
            } else {
                // In case of failure
                echo view('User/Trade_Tracker/Add', ['pageType' => $pageType, 'pageName' => $pageName, 'error' => 'There was a problem submitting your request. Please try again.']);
            }
        }
    }
    
    public function quickTrade() {
        $pageType = 'Automated';
        $pageName = 'Quick_Trade';
        
        $this->setCurrentUser(); // Ensure this method is appropriately defined
    
        $request = service('request');
        $validation = \Config\Services::validation();
    
        // Set validation rules
        $validation->setRules([
            'webpage' => 'trim',
            'url_link' => 'trim',
            // Add other validation rules as needed
        ]);
    
        if (!$validation->withRequest($request)->run()) {
            return $this->renderTheme('User/Trade_Tracker/Quick_Trade', ['pageType' => $pageType, 'pageName' => $pageName]);
        } else {
            // Extract form data
            $submitted_date = $request->getPost('submitted_date');
            $submitted_time = $request->getPost('submitted_time');
            $trade_date = $request->getPost('trade_date');
            $trade_time = $request->getPost('trade_time');
            $user_type = $request->getPost('user_type');
            $user_id = $request->getPost('user_id');
            $username = $request->getPost('username');
            $email = $request->getPost('email');
            $trading_account = $request->getPost('trading_account');
            $trade_type = $request->getPost('trade_type');
            $purchase_type = 'Buy/Sell';
            $symbol_type = $request->getPost('symbol_type');
            $exchange = $request->getPost('exchange');
            $symbol = $request->getPost('symbol');
            $company = $request->getPost('company');
            $link = $symbol_type . '/' . $exchange . '/' . $symbol;
            $current_price = $request->getPost('current_price');
            $sell_price = $request->getPost('sell_price');
            $position_size = $request->getPost('position_size');
            $total_trade_cost = $current_price * $position_size;
            $total_trade_sell = $sell_price * $position_size;
            $net_gains = $sell_price - $current_price;
            $percent_change = round((($total_trade_sell - $total_trade_cost) / $total_trade_cost) * 100, 2);
            $option_type = $request->getPost('option_type') ?? null;
            $expiration = $request->getPost('expiration') ?? null;
            $option_price = $request->getPost('option_price') ?? null;
            $strike = $request->getPost('strike') ?? null;
            $details = $request->getPost('details');
            // Assuming trackerModel is correctly initialized and method add_trade is defined
            if ($this->trackerModel->add_trade($submitted_date, $submitted_time, $trade_date, $trade_time, $user_type, $user_id, $username, $email, $trading_account, $trade_type, $purchase_type, $symbol_type, $exchange, $symbol, $company, $link, $current_price, $sell_price, $position_size, $total_trade_cost, $net_gains, $percent_change, $option_type, $expiration, $option_price, $strike, $details)) {
                // Redirect to Alert Procedures
                return redirect()->to('/Wallet-Details/' . $trading_account)->with('message', 'Trade Submitted Successfully');
            } else {
                // User creation failed, handle the error
                return $this->renderTheme('User/Trade_Tracker/Quick_Trade', [
                    'pageType' => $pageType,
                    'pageName' => $pageName,
                    'error' => 'There was a problem submitting your request. Please try again.'
                ]);
            }
        }
    }
    
    public function sell() {
        $pageType = 'Automated';
        $pageName = 'Sell';
        $this->setCurrentUser(); // Ensure this method is appropriately defined
    
        $request = service('request');
        $validation = \Config\Services::validation();
    
        // Set validation rules
        $validation->setRules([
            'webpage' => 'trim',
            'url_link' => 'trim',
            // Add other validation rules as needed
        ]);
    
        if (!$validation->withRequest($request)->run()) {
            return $this->renderTheme('User/Trade_Tracker/Sell', ['pageType' => $pageType, 'pageName' => $pageName]);
        } else {
            // Extract form data
            $trade_id = $request->getPost('trade_id');
            $submitted_date = $request->getPost('submitted_date');
            $submitted_time = $request->getPost('submitted_time');
            $trade_date = $request->getPost('trade_date');
            $trade_time = $request->getPost('trade_time');
            $user_type = $request->getPost('user_type');
            $user_id = $request->getPost('user_id');
            $username = $request->getPost('username');
            $email = $request->getPost('email');
            $trading_account = $request->getPost('trading_account');
            $trade_type = $request->getPost('trade_type');
            $purchase_type = 'Sell';
            $symbol_type = $request->getPost('symbol_type');
            $exchange = $request->getPost('exchange');
            $symbol = $request->getPost('symbol');
            $company = $request->getPost('company');
            $link = $request->getPost('link');
            $current_price = $request->getPost('current_price');
            $sell_price = $request->getPost('sell_price');
            $position_size = $request->getPost('position_size');
            $total_trade_cost = $sell_price * $position_size;
            $net_gains = $request->getPost('net_gains');
            $percent_change = $request->getPost('percent_change');
            $option_type = $request->getPost('option_type');
            $expiration = $request->getPost('expiration');
            $option_price = $request->getPost('option_price');
            $strike = $request->getPost('strike');
            $details = $request->getPost('details');
    
            // Assuming trackerModel is correctly initialized
            if ($this->trackerModel->sell_trade(/* pass necessary parameters */)) {
                if ($remaining_position === 0) {
                    // Additional logic for closed trades
                    return redirect()->to('/Wallet-Details/' . $trading_account);
                } else {
                    return $this->renderTheme('User/Trade_Tracker/Sell', [
                    'pageType' => $pageType,
                    'pageName' => $pageName,
                    'error' => 'There was a problem submitting your request. Please try again.'
                    ]);
                }
            }
        }
    }

    public function update($stockID) {
        // setup page and user context
        $pageType = 'Automated';
        $pageName = 'Trade_Tracker_Update';
        $this->setCurrentUser(); // Assuming setCurrentUser is properly defined in CI4
        
        $request = service('request');
        $validation = \Config\Services::validation();
        
        // setting validation rules
        $validation->setRules([
            'webpage' => 'trim',
            'url_link' => 'trim',
            // ... [other validation rules as needed]
        ]);
    
        if (!$validation->withRequest($request)->run()) {
            // Load view with errors
            return $this->renderTheme('User/Trade_Tracker/Update', [
                'pageType' => $pageType,
                'pageName' => $pageName,
                'validation' => $validation
            ]);
        } else {
            // Extracting form data
            $id = $request->getPost('id');
            $trading_account = $request->getPost('trading_account');
            $last_updated = $request->getPost('last_updated');
            $last_updated_time = $request->getPost('last_updated_time');
            $category = $request->getPost('category');
            $updateData = [];
    
            if ($category === 'Option Trade') {
                $updateData = [
                    'price_high' => $request->getPost('price_high'),
                    'current_price' => $request->getPost('current_price'),
                    'position' => $request->getPost('position'),
                    'net_gains_per' => ($request->getPost('price_high') - $request->getPost('current_price')) * 100,
                    'total_net_gains' => round(($request->getPost('price_high') - $request->getPost('current_price')) * $request->getPost('position'), 2),
                    'underlying_price' => $request->getPost('underlying_price'),
                    'percent_change' => round((($request->getPost('price_high') - $request->getPost('current_price')) / $request->getPost('current_price')) * 100, 2),
                    'potential_gain' => $request->getPost('potential_gain'),
                    'gain_differential' => $request->getPost('potential_gain') - (($request->getPost('price_high') - $request->getPost('current_price')) / $request->getPost('current_price')),
                    'stop_loss_percent' => 0.05,
                    'stop_loss_differential' => $request->getPost('price_high') * 0.05,
                    'stop_loss' => $request->getPost('price_high') - ($request->getPost('price_high') * 0.05),
                    'updated_details' => $request->getPost('updated_details')
                ];
            } elseif ($category === 'Equity Trade') {
                $updateData = [
                    'price_high' => $request->getPost('price_high'),
                    'current_price' => $request->getPost('current_price'),
                    'total_net_gains' => round(($request->getPost('price_high') - $request->getPost('current_price')) * $request->getPost('position'), 2),
                    'percent_change' => round((($request->getPost('price_high') - $request->getPost('current_price')) / $request->getPost('current_price')) * 100, 2),
                    'potential_gain' => $request->getPost('potential_gain'),
                    'gain_differential' => $request->getPost('potential_gain') - (($request->getPost('price_high') - $request->getPost('current_price')) / $request->getPost('current_price')),
                    'stop_loss_percent' => 0.05,
                    'stop_loss_differential' => $request->getPost('price_high') * 0.05,
                    'stop_loss' => $request->getPost('price_high') - ($request->getPost('price_high') * 0.05),
                    'updated_details' => $request->getPost('updated_details')
                ];
            }
            // Update the trade data using the model
            $result = $this->trackerModel->updateTrade($id, $updateData);
        
            if ($result) {
                // Redirect to the Wallet Details page with a success message
                return redirect()->to('/Wallet-Details/' . $trading_account)->with('message', 'Trade Update Submitted Successfully');
            } else {
                // Display the error view
                return $this->renderTheme('User/Trade_Tracker/Update', [
                    'pageType' => $pageType,
                    'pageName' => $pageName,
                    'error' => 'There was a problem submitting your request. Please try again.'
                ]);
            }
        }
    }

    
    public function close() {
        $pageType = 'Automated';
        $pageName = 'Close';
    
        $this->setCurrentUser();
    
        $validation = \Config\Services::validation();
    
        $validation->setRules([
            'webpage' => 'trim',
            'url_link' => 'trim',
            // Add other necessary validation rules
        ]);
    
        if (!$validation->withRequest($this->request)->run()) {
            return $this->renderTheme('User/Trade_Tracker/Close', ['pageType' => $pageType, 'pageName' => $pageName]);
        } else {
            // Extract form data
            $trade_id = $this->request->getPost('trade_id');
            $submitted_date = $this->request->getPost('submitted_date');
            $submitted_time = $this->request->getPost('submitted_time');
            $trade_date = $this->request->getPost('trade_date');
            $trade_time = $this->request->getPost('trade_time');
            $user_type = $this->request->getPost('user_type');
            $user_id = $this->request->getPost('user_id');
            $username = $this->request->getPost('username');
            $email = $this->request->getPost('email');
            $trading_account = $this->request->getPost('trading_account');
            $trade_type = $this->request->getPost('trade_type');
            $purchase_type = $this->request->getPost('purchase_type', 'Sell');
            $symbol_type = $this->request->getPost('symbol_type');
            $exchange = $this->request->getPost('exchange');
            $symbol = $this->request->getPost('symbol');
            $company = $this->request->getPost('company');
            $link = $this->request->getPost('link');
            $purchase_price = $this->request->getPost('purchase_price');
            $sell_price = $this->request->getPost('sell_price');
            $price_differential = $sell_price - $purchase_price;
            $position_size = $this->request->getPost('position_size');
            $net_gains = $price_differential * $position_size;
            $percent_change = round((($sell_price - $purchase_price) / $purchase_price) * 100, 2);
            $total_trade_cost = $sell_price * $position_size;
            $original_position = $this->request->getPost('original_position');
            $last_remaining_position = $this->request->getPost('last_remaining_position');
            $remaining_position = $original_position - $position_size;
            $underlying_price = $this->request->getPost('underlying_price') ?? null;
            $price_target = $this->request->getPost('price_target');
            $target_differential = $price_target - $sell_price;
            $potential_gain = $this->request->getPost('potential_gain');
            $gain_differential = $potential_gain - $target_differential;
            $stop_loss_percent = $this->request->getPost('stop_loss_percent', 0.05);
            $stop_loss_differential = $sell_price * $stop_loss_percent;
            $stop_loss = $sell_price - $stop_loss_differential;
            $details = $this->request->getPost('details');

            // Prepare the data for trade closing
            $tradeData = [
                'trade_id' => $trade_id,
                'submitted_date' => $submitted_date,
                'submitted_time' => $submitted_time,
                'trade_date' => $trade_date,
                'trade_time' => $trade_time,
                'user_type' => $user_type,
                'user_id' => $user_id,
                'username' => $username,
                'email' => $email,
                'trading_account' => $trading_account,
                'trade_type' => $trade_type,
                'purchase_type' => $purchase_type,
                'symbol_type' => $symbol_type,
                'exchange' => $exchange,
                'symbol' => $symbol,
                'company' => $company,
                'link' => $link,
                'purchase_price' => $purchase_price,
                'sell_price' => $sell_price,
                'price_differential' => $price_differential,
                'position_size' => $position_size,
                'net_gains' => $net_gains,
                'percent_change' => $percent_change,
                'total_trade_cost' => $total_trade_cost,
                'original_position' => $original_position,
                'remaining_position' => $remaining_position,
                'underlying_price' => $underlying_price,
                'price_target' => $price_target,
                'target_differential' => $target_differential,
                'potential_gain' => $potential_gain,
                'gain_differential' => $gain_differential,
                'stop_loss_percent' => $stop_loss_percent,
                'stop_loss_differential' => $stop_loss_differential,
                'stop_loss' => $stop_loss,
                'details' => $details
            ];            

            if ($this->trackerModel->closeTrade($trade_id, $tradeData)) {
                // Close trade logic
                if ($remaining_position === 0) {
                    // Additional logic for fully closed trade
                    return redirect()->to('/Wallet-Details/' . $trading_account)
                                    ->with('message', 'Trade Closed Successfully');
                } else {
                    // Logic for partially closed trade
                    return redirect()->to('/Wallet-Details/' . $trading_account);
                }
            } else {
                // Handling failure
                return $this->renderTheme('User/Trade_Tracker/Close', [
                    'pageType' => $pageType, 
                    'pageName' => $pageName,
                    'error' => 'There was a problem submitting your request. Please try again.'
                ]);
            }
        }
    }
    
    public function delete($tradeID)
    {
        // Assuming deleteTrade() and deleteSubTrades() are methods in the TrackerModel
        if ($this->trackerModel->deleteTrade($tradeID) && $this->trackerModel->deleteSubTrades($tradeID)) {
            session()->setFlashdata('message', 'Deleted Successfully');
            return redirect()->to('/Trade-Tracker');
        } else {
            return $this->renderTheme('User/Trade_Tracker/Delete', ['error' => 'There was a problem deleting the trade.']);
        }
    }
    
    public function addStock()
    {
        $validation = \Config\Services::validation();

        $validation->setRules([
            'type' => 'required',
            'symbol' => 'required',
            'market' => 'required',
            'company' => 'required'
            // Add more validation rules as needed
        ]);

        if (!$validation->withRequest($this->request)->run()) {
            return $this->renderTheme('User/Trade_Tracker/Add_Stock', [
                'validation' => $validation
            ]);
        } else {
            $postData = $this->request->getPost();
            if ($this->trackerModel->addStock($postData)) {
                session()->setFlashdata('message', 'Stock Added Successfully');
                return redirect()->to('/User/Trade_Tracker/Search');
            } else {
                session()->setFlashdata('error', 'There was a problem adding the stock.');
                return redirect()->back()->withInput();
            }
        }
    }
    
    private function saveData($type = 'insert', $id = 0) {
        if ($type != 'insert' && $id == 0) {
            $this->form_validation->set_message('error', 'Invalid ID');
            return false;
        }
    
        $this->form_validation->set_rules($this->dashboard_model->get_validation_rules($type));
        $payload = ['id' => $id, 'data' => $this->input->post()];
        Events::trigger('before_user_validation', $payload);
    
        if ($this->form_validation->run() === false) {
            return false;
        }
    
        $data = $this->dashboard_model->prep_data($this->input->post());
        $result = $type == 'insert' ? $this->dashboard_model->insert($data) : $this->dashboard_model->update($id, $data);
    
        $payload['result'] = $result;
        Events::trigger('save_user', $payload);
        return $result;
    }       
    
    protected function setCurrentUser() {
        if (class_exists('Auth')) {
            if ($this->auth->is_logged_in()) {
                $this->current_user = clone $this->auth->user();
                $this->current_user->user_img = gravatar_link($this->current_user->email, 22, $this->current_user->email, "{$this->current_user->email} Profile");
    
                if (isset($this->current_user->language)) {
                    $this->config->set_item('language', $this->current_user->language);
                }
            } else {
                $this->current_user = null;
            }
    
            if (!class_exists('Template')) {
                $this->load->library('Template');
            }
            Template::set('current_user', $this->current_user);
        }
    }
    
    private function preparePageData($pageType, $pageName)
    {
        $request = service('request');
        return [
            'pageType' => $pageType,
            'pageName' => $pageName,
            'pageURIA' => $request->uri->getSegment(1),
            'pageURIB' => $request->uri->getSegment(2),
            'pageURIC' => $request->uri->getSegment(3),
            'pageURID' => $request->uri->getSegment(4),
            'pageURIE' => $request->uri->getSegment(5),
            // Add other data as needed
        ];
    }
    /* end ./application/controllers/home.php */
}
