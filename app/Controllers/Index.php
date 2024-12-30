<?php

namespace App\Controllers;

use App\Models\LoginModel;

class Index extends BaseController
{
    protected $loginModel;

    public function __construct()
    {
        // Menginisialisasi model
        $this->loginModel = new LoginModel();
    }
}
