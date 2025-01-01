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

        // Validasi input
        if (!$this->validate([
            'username' => 'required',
            'password' => 'required'
        ])) {
            $session->setFlashdata('error', 'Username dan Password harus diisi!');
            return redirect()->back()->withInput(); // Kembali ke form login dengan input sebelumnya
        }

        $username = $this->request->getPost('username');
        $password = $this->request->getPost('password');

        $user = $model->getUserByUsername($username); // Ambil data user berdasarkan username

        if ($user && $user['password'] === $password) { // Bandingkan password dari DB dan input
            $session->set([
                'id_user' => $user['id_user'],
                'nama' => $user['nama'],
                'username' => $user['username'],
                'role' => $user['role'],
                'isLoggedIn' => true
            ]);

            return redirect()->to('dashboard'); // Arahkan ke dashboard jika login berhasil
        } else {
            $session->setFlashdata('error', 'Username atau Password salah!');
            return redirect()->back(); // Kembali ke halaman login dengan pesan error
        }
    }
}
