<?php

namespace App\Controllers;

class PublicPagesController extends BaseController
{

    public function show(...$args)
    {
        log_message('warning', 'Unimplemented endpoint accessed: App\Modules\Public\Controllers\PublicPagesController::show');
        return redirect()->to('/Maintenance');
    }
}
