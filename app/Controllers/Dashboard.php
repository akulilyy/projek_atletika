<?php

namespace App\Controllers;

class Dashboard extends BaseController
{
    // public function index()
    // {
    //     if (!session()->get('isLoggedIn')) {
    //         return redirect()->to('/login');
    //     }

    //     echo "Selamat datang, " . session()->get('nama') . "!";
    // }

    public function dashboard()
    {
        return view('dashboard/dashboard');
    }
}
