<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class DigiByteController extends BaseController
{

    public function connectWallet(...$args)
    {
        log_message('warning', 'Unimplemented endpoint accessed: DigiByteController::connectWallet');
        return redirect()->to('/Maintenance');
    }

    public function createWallet(...$args)
    {
        log_message('warning', 'Unimplemented endpoint accessed: DigiByteController::createWallet');
        return redirect()->to('/Maintenance');
    }

    public function disconnectWallet(...$args)
    {
        log_message('warning', 'Unimplemented endpoint accessed: DigiByteController::disconnectWallet');
        return redirect()->to('/Maintenance');
    }

    public function fetchFrontendData(...$args)
    {
        log_message('warning', 'Unimplemented endpoint accessed: DigiByteController::fetchFrontendData');
        return redirect()->to('/Maintenance');
    }

    public function getAssets(...$args)
    {
        log_message('warning', 'Unimplemented endpoint accessed: DigiByteController::getAssets');
        return redirect()->to('/Maintenance');
    }

    public function provisionDefaultWallet(...$args)
    {
        log_message('warning', 'Unimplemented endpoint accessed: DigiByteController::provisionDefaultWallet');
        return redirect()->to('/Maintenance');
    }

    public function refreshWallet(...$args)
    {
        log_message('warning', 'Unimplemented endpoint accessed: DigiByteController::refreshWallet');
        return redirect()->to('/Maintenance');
    }
}
