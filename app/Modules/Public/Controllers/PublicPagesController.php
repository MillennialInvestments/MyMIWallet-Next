<?php

declare(strict_types=1);

namespace App\Modules\Public\Controllers;

use App\Controllers\BaseController;

class PublicPagesController extends BaseController
{
    public function show(string $slug)
    {
        return view('App\\Modules\\Public\\Views\\pages\\container', ['slug' => $slug]);
    }
}
