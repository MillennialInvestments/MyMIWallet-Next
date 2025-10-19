<?php

namespace Apps\Libraries;

use App\Libraries\{BaseLoader, MyMIUser}; 
use App\Models\InvestorModel; 
use CodeIgniter\Session\Session; 

#[\AllowDynamicProperties]
class MyMIManage
{

    protected $MyMIUser; 

    public function __construct()
    {
        //~ $this->CI->load->library(array('Auth', 'MyMIWallets'));
        $this->MyMIUser                         = new MyMIUser(); 
        $this->cuID                             = $this->session->get('user_id');
    }
    
    // public function user_account_info($userID)
    // {
        
    // }
}
