<?php

namespace App\Controllers;

use App\Models\UserModel;

class Login extends BaseController
{
    public function index()
    {
        return view('login');
    }

    public function authenticate()
    {
        $session = session();
        $model = new UserModel();
        $username = $this->request->getPost('username');
        $password = md5($this->request->getPost('password'));

        $user = $model->getUserByUsername($username);

        if ($user && $user['password'] === $password) {
            $session->set([
                'id_user' => $user['id_user'],
                'nama' => $user['nama'],
                'username' => $user['username'],
                'role' => $user['role'],
                'isLoggedIn' => true
            ]);

            return redirect()->to('dashboard');
        } else {
            $session->setFlashdata('error', 'Username atau Password salah!');
            return redirect()->back();
        }
    }

    // public function logout()
    // {
    //     session()->destroy();
    //     return redirect()->to('index/login');
    // }
}
