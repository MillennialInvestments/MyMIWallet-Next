<?php
namespace App\Modules\User\Libraries;

// use App\Libraries\{MyMICoin, MyMIGold, MyMIUser};
use App\Modules\User\Models\{BudgetModel};
use Config\Services;

class DashboardLibrary {
    private $BudgetModel; 
    private $cuID;
    private $db;
    private $session;

    public function __construct() {
        $this->session          = Services::session();
        $this->cuID             = $this->session->get('user_id');
        $this->BudgetModel      = new BudgetModel(); 
    }

    public function getDashboardInfo($cuID) {
        $date                               = date("Y-m-d");
        $thisMonth                          = date("Y-m");
        $getDailyBudgetReq                  = $this->BudgetModel->getDailyBudgetReq($date, $cuID) ?? 0; 
        $getTodaysEarnings                  = $this->BudgetModel->getTodaysEarnings($date, $cuID) ?? 0;
        $getTodaysExpenses                  = $this->BudgetModel->getTodaysExpenses($date, $cuID) ?? 0;
        $getMonthlyEarnings                 = $this->BudgetModel->getMonthlyEarnings($thisMonth, $cuID) ?? 0;
        $getMonthlyExpenses                 = $this->BudgetModel->getMonthlyExpenses($thisMonth, $cuID) ?? 0;
        $dailyRequirements                  = 0;
        $todaysEarnings                     = 0;
        $todaysExpenses                     = 0;
        $todaysOrders                       = 0;
        $totalCustomers                     = 0;
        $totalOrders                        = 0;
        $totalProducts                      = 0;
        $totalServices                      = 0;
        $monthlyEarnings                    = 0; 
        $monthlyExpenses                    = 0; 
        $monthlyOrders                      = 0;
    
        // foreach ($getDailyBudgetReq as $record) {   
        //     $dailyRequirements += $record->amount; // Assuming the amount is accessible like this
        // }
        $dailyRequirements = $getDailyBudgetReq; 

        // foreach ($getTodaysEarnings as $record) {   
        //     $todaysEarnings += $record->amount; // Assuming the amount is accessible like this
        // }
        $todaysEarnings = $getTodaysEarnings; 

        // foreach ($getTodaysExpenses as $record) {
        //     $todaysExpenses += $record->amount; // Assuming the amount is accessible like this
        // }
        
        $todaysExpenses = $getTodaysExpenses; 
    
        // foreach ($getMonthlyEarnings as $record) {
        //     $monthlyEarnings += $record->amount; // Assuming the amount is accessible like this
        // }

        $getMonthlyEarnings = $monthlyEarnings;
        // foreach ($getMonthlyExpenses as $record) {
        //     $monthlyExpenses += $record->amount; // Assuming the amount is accessible like this
        // }

        return [
            'cuID'                          => $this->cuID,
            'date'                          => $date,
            'time'                          => date("g:i A"),
            'dailyRequirements'             => $dailyRequirements, // Now a single value
            'todaysEarnings'                => $todaysEarnings, // Now a single value
            'todaysExpenses'                => $todaysExpenses, // Now a single value
            'totalCustomers'                => $totalCustomers, // Now a single value
            'totalProducts'                 => $totalProducts, // Now a single value
            'totalServices'                 => $totalServices, // Now a single value
            'monthlyEarnings'               => $monthlyEarnings, // Now a single value
            'monthlyExpenses'               => $monthlyExpenses, // Now a single value
        ];
    } 
}
