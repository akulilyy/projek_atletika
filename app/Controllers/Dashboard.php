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
    //     echo "<br> <a href='/logout'>Logout</a>";
    // }

    public function dashboard()
    {
        return view('dashboard/dashboard');
    }
}
