<?php

namespace App\Services;
use App\Libraries\{BaseLoader};
use App\Models\{AccountsModel, ExchangeModel, WalletModel};

class ExchangeService
{
    protected $accountsModel;
    protected $exchangeModel;
    protected $walletModel;

    public function __construct()
    {
        $this->accountsModel = new AccountsModel();
        $this->exchangeModel = new ExchangeModel();
        $this->walletModel = new WalletModel();
    }

    // Get All Active Exchanges
    public function getExchanges() 
    {
        $getExchanges = $this->exchangeModel->getExchanges(); 
        return $getExchanges;
    }
}