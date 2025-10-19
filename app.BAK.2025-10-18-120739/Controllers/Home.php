<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index(): string
    {
        return $this->render('themes\public\home');
    }

    public function HowItWorks(): string
    {
        return $this->render('how_it_works');
    }
}
