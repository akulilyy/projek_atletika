<?php

namespace App\Controllers;

use App\Models\UserModel;

class User extends BaseController
{
    protected $userModel;

    public function __construct()
    {
        // Menginisialisasi model
        $this->userModel = new UserModel();
    }

    public function index()
    {
        // Mengambil semua data 
        $user = $this->userModel->findAll();

        // Menyiapkan data untuk dikirim ke view
        $data = [
            'title'  => 'Data User',
            'user' => $user
        ];

        // Memanggil view dan mengirim data
        echo view('user/user', $data);
    }
    public function tambah()
    {
        //menambhakan form tambah pada folder 
        $data = [
            'title' => 'Tambah Data User',
        ];
        echo view('user/form_tambah', $data);
    }

    public function simpan()
    {
        $this->userModel->save([
            'nama' => $this->request->getPost('nama'),
            'username' => $this->request->getPost('username'),
            'password' => $this->request->getPost('password'), // Tidak menggunakan password_hash
            'role' => $this->request->getPost('role'),
        ]);
        session()->setFlashdata('success', 'Data berhasil diedit!');
        return redirect()->to('user');
    }

    public function edit($id_us)
    {
        $data['user'] = $this->userModel->find($id_us);
        echo view('user/form_edit', $data);
    }

    public function update($id_us)
    {
        $this->userModel->update($id_us, [
            'nama' => $this->request->getPost('nama'),
            'username' => $this->request->getPost('username'),
            'password' => $this->request->getPost('password'),
            'role' => $this->request->getPost('role'),
        ]);

        session()->setFlashdata('success', 'Data berhasil diedit!');
        return redirect()->to('user');
    }

    public function delete($id_us)
    {
        $this->userModel->delete_data($id_us);
        session()->setFlashdata('success', 'Data berhasil dihapus!');
        return redirect()->to('user');
    }
}
