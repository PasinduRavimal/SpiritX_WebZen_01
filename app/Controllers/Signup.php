<?php

namespace App\Controllers;

class Signup extends BaseController
{
    public function index(): string
    {
        return view('signup');
    }
}
