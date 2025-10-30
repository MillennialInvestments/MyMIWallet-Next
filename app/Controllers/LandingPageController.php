<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index(): string
    {
        // return view('themes/public/home', $this->data);
        // return view('temp_landing', $this->data);
        return $this->renderTheme('temp_landing', $this->data);
        // return view('welcome_message', $this->data);
    }
}
