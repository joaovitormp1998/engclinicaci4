<?php

namespace App\Controllers;

class Recovery extends BaseController
{
    public function index()
    {
        echo view('recovery/forgot_password');
    }
}
